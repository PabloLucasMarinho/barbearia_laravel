<?php

namespace App\Models;

use App\Models\Traits\UserDetailDefaults;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDetail extends Model
{
  use UserDetailDefaults;

  protected $table = 'user_details';

  protected $primaryKey = 'uuid';
  public $incrementing = false;
  protected $keyType = 'string';

  protected $fillable = [
    'user_uuid',
    'address',
    'address_complement',
    'zip_code',
    'neighborhood',
    'city',
    'phone',
    'salary',
    'admission_date',
  ];

  protected $casts = [
    'admission_date' => 'date',
    'salary' => 'decimal:2',
  ];

  public function user(): BelongsTo
  {
    return $this->belongsTo(User::class, 'user_uuid', 'uuid');
  }
}
