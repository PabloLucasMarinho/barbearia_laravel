<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

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

  public function getAuthIdentifierName()
  {
    return 'uuid';
  }

  public function permissions()
  {
    return $this->role->permissions();
  }

  public function roles()
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
