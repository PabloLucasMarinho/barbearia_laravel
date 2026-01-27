<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Client extends Model
{
  protected $primaryKey = 'uuid';
  protected $keyType = 'string';
  public $incrementing = false;

  protected $fillable = ['user_uuid', 'name', 'document', 'date_of_birth', 'phone',];

  protected $casts = ['date_of_birth' => 'date'];

  protected static function booted()
  {
    static::creating(function ($model) {
      $model->uuid = (string) Str::uuid();
    });
  }

  public function creator()
  {
    return $this->belongsTo(User::class, 'user_uuid', 'uuid');
  }

  public function getRouteKeyName()
  {
    return 'uuid';
  }

  public function getDateOfBirthFormattedAttribute(): string
  {
    return $this->attributes['date_of_birth'] ? Carbon::parse($this->attributes['date_of_birth'])->format('d/m/Y') : '';
  }
}
