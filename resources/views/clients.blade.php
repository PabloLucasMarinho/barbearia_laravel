@extends('components.app-layout')

@section('title', 'Clientes')

@section('content')
  <section class="main-container">
    <h1>Clientes</h1>

    <form action="" method="POST" class="search-form">
      @csrf
      <input type="search" name="search-client" id="search-client" class="search-client">
      <input type="submit" value="Procurar" class="search-btn">
      <a href="">Adicionar</a>
    </form>

    <section class="list client">
      @if ($clients->count() === 0)
        Sem clientes
      @else
        <ul>

        </ul>
      @endif
    </section>
  </section>
@endsection
