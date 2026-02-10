@php
  use \App\Models\User;
@endphp

<button class="material-symbols-rounded menu-btn" id="menu-btn">menu</button>
<aside class="side-bar closed">

  <section class="menu">
    <ul>
      <li @class(['menu-item', 'active' => request()->routeIs('dashboard')])>
        <a href="{{ route('dashboard') }}">
          <i class="material-symbols-rounded">
            home
          </i>
          Início
        </a>
      </li>

      <li @class(['menu-item', 'active' => request()->routeIs('clients.*')])>
        <a href="{{ route('clients.index') }}">
          <i class="material-symbols-rounded">
            group
          </i>
          Clientes
        </a>
      </li>

      @can('viewAny', User::class)
        <li @class(['menu-item', 'active' => request()->routeIs('users.*')])>
          <a href="{{ route('users.index') }}">
            <i class="material-symbols-rounded">
              badge
            </i>
            Funcionários
          </a>
        </li>
      @endcan
    </ul>

    <form class="logout-form" action="{{ route('logout') }}" method="POST">
      @csrf
      <button type="submit">
        <i class="material-symbols-rounded">
          power_settings_circle
        </i>
      </button>
    </form>
  </section>

</aside>
