<?php

namespace App\Http\Requests;

use App\Rules\Cep;
use App\Rules\Cpf;
use App\Rules\DateOfBirth;
use App\Rules\Phone;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
  public function authorize(): bool
  {
    return true;
  }

  public function rules(): array
  {
    return [
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|string|min:8|confirmed',

      'document' => ['required', new Cpf, Rule::unique('users', 'document')],
      'date_of_birth' => ['required', new DateOfBirth],
      'phone' => ['required', new Phone],
      'address' => 'required|string|max:100',
      'address_complement' => 'nullable|string|max:50',
      'zip_code' => ['required', new Cep],
      'neighborhood' => 'required|string|max:50',
      'city' => 'required|string|max:50',
      'salary' => 'required|numeric|min:0|max:999999.99',
      'admission_date' => 'required|date|before:tomorrow',
    ];
  }

  public function messages(): array
  {
    return [
      'name.required' => 'O :attribute é obrigatório.',
      'email.required' => 'O :attribute é obrigatório.',
      'email.unique' => 'Este :attribute já está cadastrado.',
      'password.required' => 'A :attribute é obrigatória.',
      'password.min' => 'A :attribute deve ter no mínimo 8 caracteres.',
      'password.confirmed' => 'As senhas não conferem.',
      'document.required' => 'O :attribute é obrigatório.',
      'document.unique' => 'Este :attribute já está cadastrado.',
      'date_of_birth.required' => 'A :attribute é obrigatória.',
      'phone.required' => 'O :attribute é obrigatório.',
      'address.required' => 'O :attribute é obrigatório',
      'zip_code.required' => 'O :attribute é obrigatório.',
      'salary.required' => 'O :attribute é obrigatório.',
      'admission_date.required' => 'A :attribute é obrigatória.',
    ];
  }

  public function attributes(): array
  {
    return [
      'name' => 'nome',
      'email' => 'e-mail',
      'password' => 'senha',
      'document' => 'CPF',
      'date_of_birth' => 'data de nascimento',
      'phone' => 'telefone',
      'address' => 'endereço',
      'address_complement' => 'complemento',
      'zip_code' => 'CEP',
      'neighborhood' => 'bairro',
      'city' => 'cidade',
      'salary' => 'salário',
      'admission_date' => 'data de admissão'
    ];
  }

  protected function prepareForValidation(): void
  {
    $dateOfBirth = $this->input('date_of_birth');

    if (!is_string($dateOfBirth)) {
      return;
    }

    try {
      if (preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $dateOfBirth)) {
        $this->merge([
          'date_of_birth' => Carbon::createFromFormat(
            'd/m/Y',
            $dateOfBirth
          )->format('Y-m-d'),
        ]);
      }
    } catch (\Throwable) {
      // Não faz nada → a validação vai falhar depois
    }
  }
}
