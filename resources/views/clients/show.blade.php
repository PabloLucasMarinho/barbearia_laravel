@extends('components.app-layout')

@section('title', $client->name)

@section('content')
  <section class="main-container">
    <h1>Dados do Cliente</h1>

    <section class="info-section">
      <div class="info-header">
        <span class="initials"
              style="background-color: {{$client->color}};
              color: {{$client->getContrastColor($client->color)}};">
          {{$client->initials}}
        </span>
        <h2>{{$client->name}}</h2>
      </div>

      <div class="info-content">
        <p>
          <span>
            <i class="material-symbols-rounded">calendar_month</i>
            Nascimento
          </span>
          <strong>{{$client->date_of_birth_formatted}}</strong>
        </p>

        <p>
          <span>
            <i class="material-symbols-rounded">phone</i>
            Telefone
          </span>
          <strong>{{$client->phone}}</strong>
        </p>

        <p>
          <span>
            <i class="material-symbols-rounded">id_card</i>
            CPF
          </span>
          <strong>{{$client->document}}</strong>
        </p>
      </div>

      <div class="info-footer">
        <a class="material-symbols-rounded">schedule</a>
        @can('update', $client)
          <a href="{{route('clients.edit', $client)}}"
             class="material-symbols-rounded">
            edit
          </a>
        @endcan
        @can('delete', $client)
          <a class="material-symbols-rounded"
             data-action="{{route('clients.destroy', $client)}}"
             data-name="{{$client->name}}"
             onclick="openDeleteModal(this)"
          >
            delete
          </a>
        @endcan
      </div>
    </section>

    <dialog id="delete-dialog">
      <div class="dialog-content">
        <h2 id="dialog-title"></h2>
        <p>Essa ação é permanente e não poderá ser desfeita.</p>

        <div class="dialog-choose">
          <form id="delete-form" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Sim</button>
            <button type="button" autofocus class="btn" onclick="closeDeleteModal()">Não</button>
          </form>
        </div>
      </div>
    </dialog>

  </section>
@endsection
