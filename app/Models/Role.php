<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  public function permissions()
  {
    return $this->belongsToMany(
      User::class,
      'user_role',
      'role_uuid',
      'user_uuid',
      'uuid',
      'uuid'
    );
  }
}
