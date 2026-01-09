@extends('components.app-layout')

@section('title', 'Recuperar senha')

@section('content')
  <section class="auth-container">

    <img src="{{ asset('assets/images/logo-min.png') }}" alt="Logo da barbearia" class="auth-logo">

    <form action="{{ route('password.update') }}" method="POST" class="form-auth">
      @csrf
      <input type="hidden" name="token" value="{{ $token }}">

      <div class="input-wrapper">
        <label for="email">E-mail<span class="required">*</span></label>
        <input type="email" name="email" id="email" autocomplete="email" value="{{ $email }}" required />
        @error('email')
          <small class="error-message">{{ $message }}</small>
        @enderror
      </div>

      <div class="input-wrapper">
        <label for="password">Nova senha<span class="required">*</span></label>
        <div class="password">
          <input type="password" name="password" id="password" autocomplete="new-password" class="input-password"
            required />
          <span class="material-symbols-rounded show">
            visibility
          </span>
        </div>
        @error('password')
          <small class="error-message">{{ $message }}</small>
        @enderror
      </div>

      <div class="input-wrapper">
        <label for="password_confirmation">Confirmar senha<span class="required">*</span></label>
        <div class="password">
          <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password"
            class="input-password" required />
        </div>
      </div>

      <div class="submit-wrapper">
        <input type="submit" class="auth-btn" value="Definir senha">
        <small><a href="{{ route('login') }}">Já sabe sua senha?</a></small>
      </div>
    </form>

  </section>
  </x-app-layout>
@endsection
