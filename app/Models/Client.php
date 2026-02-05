<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Client extends Model
{
  protected $primaryKey = 'uuid';
  protected $keyType = 'string';
  public $incrementing = false;

  protected $fillable = ['user_uuid', 'name', 'document', 'date_of_birth', 'phone',];

  protected $casts = ['date_of_birth' => 'date'];

  protected static function booted(): void
  {
    static::saving(function ($user) {
      if ($user->isDirty('name')) {
        $user->initials = self::generateInitials($user->name);
      }
    });

    static::creating(function ($model) {
      $model->uuid = (string)Str::uuid();
    });

    static::creating(function ($client) {
      $r = str_pad(dechex(mt_rand(50, 200)), 2, '0', STR_PAD_LEFT);
      $g = str_pad(dechex(mt_rand(50, 200)), 2, '0', STR_PAD_LEFT);
      $b = str_pad(dechex(mt_rand(50, 200)), 2, '0', STR_PAD_LEFT);

      $client->color = "#$r$g$b";
    });
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

  public function creator(): BelongsTo
  {
    return $this->belongsTo(User::class, 'user_uuid', 'uuid');
  }

  public function getRouteKeyName(): string
  {
    return 'uuid';
  }

  public function getDateOfBirthFormattedAttribute(): string
  {
    return $this->attributes['date_of_birth'] ? Carbon::parse($this->attributes['date_of_birth'])->format('d/m/Y') : '';
  }

  public function getContrastColor($hexColor): string
  {
    $hexColor = str_replace('#', '', $hexColor);
    $r = hexdec(substr($hexColor, 0, 2));
    $g = hexdec(substr($hexColor, 2, 2));
    $b = hexdec(substr($hexColor, 4, 2));

    // Fórmula de luminosidade YIQ
    $yiq = (($r * 299) + ($g * 587) + ($b * 114)) / 1000;

    return ($yiq >= 128) ? 'var(--dark)' : 'var(--bg-light)';
  }
}
