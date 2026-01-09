<aside class="side-bar open">
  <button class="material-symbols-rounded side-bar-menu-button" id="menu-button">menu</button>

  <section class="menu">

    <ul>
      <li @class(['menu-item', 'active' => request()->routeIs('dashboard')])><a href="{{ route('dashboard') }}">Dashboard</a></li>

      <li @class(['menu-item', 'active' => request()->routeIs('clients')])><a href="{{ route('clients') }}">Clientes</a></li>
    </ul>

    <form action="{{ route('logout') }}" method="POST">
      <input type="submit" value="Sair">
    </form>

  </section>

</aside>
