<x-app-layout page-title='Login'>
  <section class="auth-container">

    <img src="{{ asset('assets/images/logo-min.png') }}" alt="Logo da barbearia" class="auth-logo">

    <form action="" method="POST" class="form-auth">
      @csrf
      <div class="input-wrapper">
        <label for="email">E-mail<span class="required">*</span></label>
        <input type="email" name="email" id="email" autocomplete="email" required />
      </div>

      <div class="input-wrapper">
        <label for="password">Senha<span class="required">*</span></label>
        <div class="password">
          <input type="password" name="password" id="password" autocomplete="current-password" required />
          <span class="material-symbols-rounded show">
            visibility
          </span>
        </div>

        <div class="remember-me-wrapper">
          <label for="remember-me">
            <input type="checkbox" name="remember-me" id="remember-me"> <small>Lembrar de mim</small>
          </label>
        </div>
      </div>

      <div class="submit-wrapper">
        <input type="submit" value="Entrar">
        <small><a href="{{ route('password.request') }}">Esqueceu sua senha?</a></small>
      </div>
    </form>

  </section>
</x-app-layout>
