<?php

namespace App\Models;

use App\Models\Traits\UserClientDefaults;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
  use Notifiable, UserClientDefaults;

  protected $primaryKey = 'uuid';
  protected $keyType = 'string';
  public $incrementing = false;

  protected $fillable = [
    'name',
    'email',
    'password',
    'user_uuid',
    'document',
    'date_of_birth',
    'phone',
    'address',
    'address_complement',
    'neighborhood',
    'city',
    'salary',
    'admission_date',
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

  public function details(): HasOne
  {
    return $this->hasOne(UserDetail::class, 'user_uuid', 'uuid');
  }
}
