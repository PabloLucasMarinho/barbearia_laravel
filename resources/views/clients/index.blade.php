@extends('components.app-layout')

@section('title', 'Clientes')

@section('content')
  <section class="main-container">
    <h1>Clientes</h1>

    <form action="{{ route('clients.index') }}" method="GET" class="search-form">
      @csrf
      <input type="search" name="search" id="search-client"
             placeholder="Pesquisar cliente..." class="search-client"
             value="{{ request('search') }}">

      <button type="submit">
        <i class="material-symbols-rounded">search</i>
      </button>
    </form>

    <section class="mobile">
      @if ($clients->count() === 0)
        <section class="no-client-message">
          <p>Nenhum cliente encontrado.</p>
          <a href="{{ route('clients.create') }}" class="add-btn">
            <i class="material-symbols-rounded">
              add
            </i>
          </a>
        </section>
      @else
        <section class="clients-list">

          <a href="{{ route('clients.create') }}" class="add-btn fixed">
            <i class="material-symbols-rounded">
              add
            </i>
          </a>

          <table>
            <tr>
              <th>Nome</th>
            </tr>
            @foreach ($clients as $client)
              <tr>
                <td>
                  <a href="{{ route('clients.show', $client) }}">
                    <span class="initials"
                          style="background-color: {{$client->color}};
                          color: {{$client->getContrastColor($client->color)}};">
                      {{$client->initials}}
                    </span>
                    {{ $client->name }}
                  </a>
                </td>
              </tr>
            @endforeach
          </table>

        </section>
      @endif
    </section>

    <section class="desktop"></section>
  </section>
@endsection
