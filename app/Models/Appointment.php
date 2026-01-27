<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
  protected $primaryKey = 'uuid';
  protected $keyType = 'string';
  public $incrementing = false;

  public function creator()
  {
    return $this->belongsTo(User::class, 'user_uuid', 'uuid');
  }
}
