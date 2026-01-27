@extends('components.app-layout')

@section('title', 'Editar cliente')

@section('content')
  <section class="main-container">
    <h1>Editar</h1>

    <form action="{{ route('clients.update', $client) }}" method="POST" class="register-client-form">
      @csrf
      @method('PUT')

      <div class="input-container">
        <label for="name">Nome<span class="required">*</span></label>
        <input type="text" name="name" id="name" minlength="2" maxlength="255" autocomplete="name"
          value="{{ $client->name }}" required>
      </div>

      <div class="input-container">
        <label for="document">CPF<span class="required">*</span></label>
        <input type="text" name="document" id="document" inputmode="numeric" maxlength="14" autocomplete="on"
          oninput="this.value = this.value
            .replace(/\D/g, '')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d)/, '$1.$2')
            .replace(/(\d{3})(\d{1,2})$/, '$1-$2')"
          value="{{ $client->document }}" required>
      </div>

      <div class="input-container">
        <label for="date_of_birth">Nascimento<span class="required">*</span></label>
        <input type="date" name="date_of_birth" id="date_of_birth" autocomplete="bday"
          value="{{ $client->date_of_birth->format('Y-m-d') }}" required>
      </div>

      <div class="input-container">
        <label for="phone">Telefone<span class="required">*</span></label>
        <input type="text" name="phone" id="phone" inputmode="numeric" autocomplete="tel-national" maxlength="15"
          oninput="this.value = this.value
            .replace(/\D/g, '')
            .replace(/^(\d{2})(\d)/, '($1) $2')
            .replace(/(\d{4,5})(\d{4})$/, '$1-$2')"
          value="{{ $client->phone }}" required>
      </div>

      <div class="input-container">
        <input type="submit" value="Cadastrar" class="btn neutral-btn">
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
