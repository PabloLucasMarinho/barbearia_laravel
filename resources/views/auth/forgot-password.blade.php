<x-app-layout pageTitle='Recuperar senha'>
  <section class="auth-container">


    <img src="{{ asset('assets/images/logo-min.png') }}" alt="Logo da barbearia" class="auth-logo">

    @if (!session('status'))
      <form action="{{ route('password.email') }}" method="POST" class="form-auth">
        @csrf
        <div class="input-wrapper">
          <label for="email">E-mail<span class="required">*</span></label>
          <input type="email" name="email" id="email" autocomplete="email" required />
        </div>

        <div class="submit-wrapper">
          <input type="submit" value="Recuperar senha">
          <small><a href="{{ route('login') }}">Já sabe a sua senha?</a></small>
        </div>
      </form>
    @else
      <section class="reset-message">
        <p>
          Você irá receber um e-mail com instruções de para recuperar sua senha.<br><br>
          Por favor, verifique a sua caixa de
          correio.
        </p>
        <a href="{{ route('login') }}" class="button">Voltar ao login</a>
      </section>
    @endif

  </section>
</x-app-layout>
