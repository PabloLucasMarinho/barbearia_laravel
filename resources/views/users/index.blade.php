@extends('components.app-layout')

@section('title', 'Funcionários')

@section('content')
  <section class="main-container">
    <h1>Funcionários</h1>

    <form action="{{ route('users.index') }}" method="GET" class="search-form">
      @csrf
      <input type="search" name="search" id="search-user"
             placeholder="Pesquisar funcionário..." class="search-input"
             value="{{ request('search') }}">

      <button type="submit">
        <i class="material-symbols-rounded">search</i>
      </button>
    </form>

    <section class="mobile">
      @if ($users->count() === 0)
        <section class="not-find-message">
          <p>Nenhum funcionário encontrado.</p>
          <a href="{{ route('users.create') }}" class="add-btn">
            <i class="material-symbols-rounded">
              add
            </i>
          </a>
        </section>
      @else
        <section class="list">

          <a href="{{ route('users.create') }}" class="add-btn fixed">
            <i class="material-symbols-rounded">
              add
            </i>
          </a>

          <table>
            <tr>
              <th>Nome</th>
            </tr>
            @foreach ($users as $user)
              <tr>
                <td>
                  <a href="{{ route('users.show', $user) }}">
                    <span class="initials"
                          style="background-color: {{$user->color}}; color: {{$user->contrast_color}};">{{$user->initials}}</span>{{ $user->name }}
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
