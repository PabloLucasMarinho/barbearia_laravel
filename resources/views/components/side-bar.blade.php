<aside class="side-bar closed">
  <button class="material-symbols-rounded side-bar-menu-button" id="menu-button">menu</button>

  <section class="menu">

    <ul>
      <li @class(['menu-item', 'active' => request()->routeIs('dashboard')])>
        <a href="{{ route('dashboard') }}">Dashboard</a>
      </li>

      <li @class(['menu-item', 'active' => request()->routeIs('clients.index')])>
        <a href="{{ route('clients.index') }}">Clientes</a>
      </li>
    </ul>

    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <input type="submit" value="Sair" class="logout-btn">
    </form>

  </section>

</aside>
