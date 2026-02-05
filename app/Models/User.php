<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
  use Notifiable;

  protected $primaryKey = 'uuid';
  protected $keyType = 'string';
  public $incrementing = false;

  protected $fillable = [
    'name',
    'email',
    'password',
  ];

  protected $hidden = [
    'password',
    'remember_token',
  ];

  protected function casts(): array
  {
    return [
      'email_verified_at' => 'datetime',
      'password' => 'hashed',
    ];
  }

  protected function name(): Attribute
  {
    return Attribute::make(
      set: fn($value) => trim($this->formatName($value))
    );
  }

  protected function formatName(string $name): string
  {
    $name = mb_convert_case(trim($name), MB_CASE_TITLE, 'UTF-8');

    $lower = [' De ', ' Da ', ' Do ', ' Dos ', ' Das ', ' E '];

    return str_replace($lower, array_map('mb_strtolower', $lower), " $name ");
  }

  protected static function booted(): void
  {
    static::saving(function ($user) {
      if ($user->isDirty('name')) {
        $user->initials = self::generateInitials($user->name);
      }
    });
  }

  private static function generateInitials(string $name): string
  {
    $parts = preg_split('/\s+/', trim($name));

    return strtoupper(
      Str::ascii(
        mb_substr($parts[0], 0, 1) .
        mb_substr(end($parts), 0, 1)
      )
    );
  }

  public function getAuthIdentifierName(): string
  {
    return 'uuid';
  }

  public function permissions()
  {
    return $this->role->permissions();
  }

  public function roles(): BelongsToMany
  {
    return $this->belongsToMany(
      Role::class,
      'user_role',
      'user_uuid',
      'role_uuid',
      'uuid',
      'uuid'
    );
  }

  public function hasRole(string $role): bool
  {
    return $this->roles()->where('name', $role)->exists();
  }
}
