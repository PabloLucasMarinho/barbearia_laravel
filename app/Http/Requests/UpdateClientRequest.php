<?php

namespace App\Http\Requests;

use App\Rules\Cpf;
use App\Rules\DateOfBirth;
use App\Rules\Phone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateClientRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    $client = $this->route('client');

    return [
      'name' => 'required|string|min:2|max:255',
      'document' => ['required', new Cpf, Rule::unique('clients', 'document')->ignore($client)],
      'date_of_birth' => ['required', new DateOfBirth],
      'phone' => ['required', new Phone]
    ];
  }

  public function messages(): array
  {
    return [
      'name.required' => 'O :attribute é obrigatório.',
      'document.required' => 'O :attribute é obrigatório.',
      'document.unique' => 'Este :attribute já foi cadastrado.',
      'date_of_birth.required' => 'A :attribute é obrigatória.',
      'phone.required' => 'O :attribute é obrigatório.',
    ];
  }

  public function attributes(): array
  {
    return [
      'name' => 'nome',
      'document' => 'CPF',
      'date_of_birth' => 'data de nascimento',
      'phone' => 'telefone',
    ];
  }
}
