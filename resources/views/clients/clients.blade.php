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
          <p>Nenhum cliente cadastrado.</p>
          <a href="{{ route('clients.create') }}" class="success-btn">
            <i class="material-symbols-rounded">
              add
            </i>
          </a>
        </section>
      @else
        <section class="clients-list">

          <a href="{{ route('clients.create') }}" class="add-btn success-btn">
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
                    {{ $client->name }}
                  </a>
                </td>
              </tr>
            @endforeach
          </table>

        </section>
      @endif
    </section>

    <dialog id="delete-dialog">
      <div class="dialog-content">
        <h2 id="dialog-title"></h2>
        <p>Essa ação é permanente e não poderá ser desfeita.</p>

        <div class="dialog-choose">
          <form id="delete-form" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn danger-btn">Sim</button>
          </form>
          <button autofocus class="btn neutral-btn" onclick="closeDeleteModal()">Não</button>
        </div>
      </div>
    </dialog>

    <section class="desktop">
      @if ($clients->count() === 0)
        <section class="table">
          <p>Nenhum cliente cadastrado.</p>
          <a href="{{ route('clients.create') }}" class="btn success-btn">
            <span class="material-symbols-rounded">
              add
            </span>
          </a>
        </section>
      @else
        <table>
          <tr>
            <th>Nome</th>
            <th>Data de Nascimento</th>
            <th>Telefone</th>
            <th>Documento</th>
          </tr>

          @foreach ($clients as $client)
            <tr>
              <td>{{ $client->name }}</td>
              <td>{{ $client->birth_date }}</td>
              <td>{{ $client->phone }}</td>
              <td>{{ $client->document }}</td>
            </tr>
          @endforeach
        </table>
      @endif
    </section>
  </section>
@endsection
