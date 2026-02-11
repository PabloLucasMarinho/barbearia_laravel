@extends('components.app-layout')

@section('title', 'Cadastrar funcionário')

@include('components.back-btn')

@section('content')
  <section class="main-container">
    <h1>Cadastrar Funcionário</h1>

    <form action="{{ route('users.store') }}" method="POST"
          class="register-client-form">
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
        <label for="date_of_birth" class="dynamic-label">
          Nascimento:
        </label>
        <input type="text" inputmode="numeric"
               name="date_of_birth" id="date_of_birth"
               autocomplete="bday"
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
