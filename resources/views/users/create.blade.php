@extends('components.app-layout')

@section('title', 'Cadastrar funcionário')

@include('components.back-btn')

@section('content')
  <section class="main-container">
    <h1>Cadastrar Funcionário</h1>

    <form action="{{ route('users.store') }}" method="POST" class="form">
      @csrf

      <div class="input-container">
        <label for="name" class="dynamic-label">
          Nome:
        </label>
        <input type="text" name="name" id="name"
               minlength="2" maxlength="255" autocomplete="name"
               value="{{ old('name') }}"
               class="dynamic-input"
               placeholder="p.ex. João da Silva"
               required
        >
      </div>

      <div class="input-container">
        <label for="email" class="dynamic-label">
          E-mail:
        </label>
        <input type="email" name="email" id="email"
               minlength="2" maxlength="255" autocomplete="email"
               value="{{ old('email') }}"
               class="dynamic-input"
               placeholder="p.ex. joao@gmail.com"
               required
        >
      </div>

      <div class="input-container">
        <label for="salary" class="dynamic-label">
          Salário: R$
        </label>
        <input type="text" name="salary" id="salary"
               maxlength="13" autocomplete="off"
               value="{{ old('salary') }}" inputmode="decimal"
               class="dynamic-input"
               placeholder="p.ex. 2.500,00"
        >
      </div>

      <div class="input-container">
        <label for="admission_date" class="dynamic-label">
          Data de Admissão:
        </label>
        <input type="text" inputmode="numeric"
               name="admission_date" id="admission_date"
               autocomplete="off" maxlength="10"
               oninput="this.value = this.value
                .replace(/\D/g, '')
                .replace(/^(\d{2})(\d)/, '$1/$2')
                .replace(/^(\d{2}\/\d{2})(\d)/, '$1/$2')
                .slice(0, 10)"
               value="{{ old('admission_date') }}"
               class="dynamic-input"
               placeholder="p.ex. 01/01/2000"
               required
        >
      </div>

      <div class="input-container">
        <label for="date_of_birth" class="dynamic-label">
          Nascimento:
        </label>
        <input type="text" inputmode="numeric"
               name="date_of_birth" id="date_of_birth"
               autocomplete="bday" maxlength="10"
               oninput="this.value = this.value
                .replace(/\D/g, '')
                .replace(/^(\d{2})(\d)/, '$1/$2')
                .replace(/^(\d{2}\/\d{2})(\d)/, '$1/$2')
                .slice(0, 10)"
               value="{{ old('date_of_birth') }}"
               class="dynamic-input"
               placeholder="p.ex. 01/01/2000"
               required
        >
      </div>

      <div class="input-container">
        <label for="phone" class="dynamic-label">
          Telefone:
        </label>
        <input type="text" name="phone" id="phone"
               inputmode="numeric" autocomplete="tel-national"
               maxlength="15"
               oninput="this.value = this.value
                .replace(/\D/g, '')
                .replace(/^(\d{2})(\d)/, '($1) $2')
                .replace(/(\d{4,5})(\d{4})$/, '$1-$2')"
               value="{{ old('phone') }}"
               class="dynamic-input"
               placeholder="p.ex. (00) 91234-5678"
               required
        >
      </div>

      <div class="input-container">
        <label for="document" class="dynamic-label">
          CPF:
        </label>
        <input type="text" name="document" id="document"
               inputmode="numeric" maxlength="14" autocomplete="on"
               oninput="this.value = this.value
                .replace(/\D/g, '')
                .replace(/(\d{3})(\d)/, '$1.$2')
                .replace(/(\d{3})(\d)/, '$1.$2')
                .replace(/(\d{3})(\d{1,2})$/, '$1-$2')"
               value="{{ old('document') }}"
               class="dynamic-input"
               placeholder="p.ex. 123.456.789-00"
               required
        >
      </div>

      <div class="input-container">
        <label for="zip_code" class="dynamic-label">
          CEP:
        </label>
        <input type="text" name="zip_code" id="zip_code"
               maxlength="9" autocomplete="postal_code"
               value="{{ old('zip_code') }}"
               class="dynamic-input"
               oninput="this.value = this.value
                .replace(/\D/g, '')
                .replace(/^(\d{5})(\d)/, '$1-$2')
                .replace(/(-\d{3})\d+?$/, '$1')"
               placeholder="p.ex. 21123-123"
        >
      </div>

      <div class="input-container">
        <label for="address" class="dynamic-label">
          Endereço:
        </label>
        <input type="text" name="address" id="address"
               maxlength="100" autocomplete="address-line1"
               value="{{ old('address') }}"
               class="dynamic-input"
               placeholder="p.ex. Rua da Feira, 123"
               required
        >
      </div>

      <div class="input-container">
        <label for="address_compliment" class="dynamic-label">
          Complemento:
        </label>
        <input type="text" name="address_compliment" id="address_compliment"
               maxlength="50" autocomplete="address-line2"
               value="{{ old('address_compliment') }}"
               class="dynamic-input"
               placeholder="p.ex. Casa 1"
        >
      </div>

      <div class="input-container">
        <label for="neighborhood" class="dynamic-label">
          Bairro:
        </label>
        <input type="text" name="neighborhood" id="neighborhood"
               maxlength="50" autocomplete="address-line3"
               value="{{ old('neighborhood') }}"
               class="dynamic-input"
               placeholder="p.ex. Realengo"
        >
      </div>

      <div class="input-container">
        <label for="city" class="dynamic-label">
          Cidade:
        </label>
        <input type="text" name="city" id="city"
               maxlength="50" autocomplete="address-level2"
               value="{{ old('city') }}"
               class="dynamic-input"
               placeholder="p.ex. Realengo"
        >
      </div>

      <div class="submit-container">
        <small>Todos os campos são obrigatórios</small>
        <input type="submit" value="Cadastrar">
      </div>

    </form>

    @if ($errors->any())
      <section class="errors">
        @foreach ($errors->all() as $message)
          <small>{{ $message }}</small>
        @endforeach
      </section>
    @endif

  </section>
@endsection
