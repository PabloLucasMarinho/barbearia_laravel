@extends('components.app-layout')

@section('title', 'Clientes')

@section('content')
  <section class="main-container">
    <h1>Clientes</h1>

    <form action="" method="POST" class="search-form">
      @csrf
      <input type="search" name="search-client" id="search-client" class="search-client">
      <input type="submit" value="Procurar" class="btn">
    </form>

    <section class="mobile">
      @if ($clients->count() === 0)
        <section class="add-btn">
          <p>Nenhum cliente cadastrado.</p>
          <a href="{{ route('clients.new-client') }}" class="btn">
            <i class="material-symbols-rounded">
              add
            </i>
          </a>
        </section>
      @else
        <section class="card-grid">
          {{-- <div class="add-btn-wrap"> --}}
          <a href="{{ route('clients.new-client') }}" class="add-btn">
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
                  {{ $client->birth_date }}
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
                <a href="" class="btn">Editar</a>
                <a href="" class="btn">Excluir</a>
              </div>
            </div>
          @endforeach
        </section>
      @endif
    </section>

    <section class="desktop">
      @if ($clients->count() === 0)
        <section class="table">
          <p>Nenhum cliente cadastrado.</p>
          <a href="{{ route('clients.new-client') }}" class="btn">
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
