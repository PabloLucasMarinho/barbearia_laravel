@extends('components.app-layout')

@section('title', 'Clientes')

@section('content')
  <section class="main-container">
    <h1>Clientes</h1>

    <form action="" method="POST" class="search-form">
      @csrf
      <input type="search" name="search-client" id="search-client" class="search-client">
      <input type="submit" value="Procurar" class="btn neutral-btn">
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
        <section class="card-grid">
          {{-- <div class="add-btn-wrap"> --}}
          <a href="{{ route('clients.create') }}" class="add-btn success-btn">
            <i class="material-symbols-rounded">
              add
            </i>
          </a>
          {{-- </div> --}}
          @foreach ($clients as $client)
            <div class="client-card">
              <div>
                <p>{{ $client->name }}</p>

                <p>
                  <i class="material-symbols-rounded">calendar_month</i>
                  {{ $client->date_of_birth_formatted }}
                </p>
              </div>

              <hr>

              <div>
                <p>
                  <i class="material-symbols-rounded">id_card</i>
                  {{ $client->document }}
                </p>
                <p>
                  <i class="material-symbols-rounded">phone_enabled</i>
                  {{ $client->phone }}
                </p>
              </div>

              <div>
                <a href="" class="btn">Agendar</a>

                @can('update', $client)
                  <a href="{{ route('clients.edit', $client) }}" class="btn neutral-btn">Editar</a>
                @endcan

                @can('delete', $client)
                  <button type="button" class="btn danger-btn" data-action="{{ route('clients.destroy', $client) }}"
                    data-name="{{ $client->name }}" onclick="openDeleteModal(this)">
                    Excluir
                  </button>
                @endcan
              </div>
            </div>
          @endforeach
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
