<?php

namespace App\Rules;

use Carbon\Carbon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DateOfBirth implements ValidationRule
{
  /**
   * Run the validation rule.
   *
   * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
   */
  public function validate(string $attribute, mixed $value, Closure $fail): void
  {
    try {
      // Força o formato esperado
      $date = Carbon::createFromFormat('Y-m-d', $value);

      // Data futura
      if ($date->isFuture()) {
        $fail('A data de nascimento não pode ser futura.');
        return;
      }

      // Idade máxima (120 anos)
      if ($date->lt(now()->subYears(120))) {
        $fail('A data de nascimento é inválida.');
        return;
      }
    } catch (\Exception $e) {
      $fail('A data de nascimento é inválida.');
    }
  }
}
