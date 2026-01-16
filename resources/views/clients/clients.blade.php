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

    <section class="list client">
      @if ($clients->count() === 0)
        <section class="table">
          <p>Nenhum cliente cadastrado.</p>
          <a href="" class="btn">Adicionar</a>
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
              <td>{{ $client->date_of_birth }}</td>
              <td>{{ $client->phone }}</td>
              <td>{{ $client->document }}</td>
            </tr>
          @endforeach
        </table>
      @endif
    </section>
  </section>
@endsection
