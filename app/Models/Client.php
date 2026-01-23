<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
  protected $fillable = ['name', 'document', 'date_of_birth', 'phone',];

  protected $casts = ['date_of_birth' => 'date'];

  public function getBirthDateAttribute(): string
  {
    return $this->date_of_birth?->format('d/m/Y') ?? '';
  }
}
