@extends('components.app-layout')

@section('title', $user->name)

@include('components.back-btn')

@section('content')
  <section class="main-container">
    <h1>Dados do Funcionário</h1>

    <section class="info-section">
      <div class="info-header">
        <span class="initials"
              style="background-color: {{$user->color}};
              color: {{$user->contrast_color}};">
          {{$user->initials}}
        </span>
        <h2>{{$user->name}}</h2>
      </div>

      <div class="info-content">
        <p>
          <span>
            <i class="material-symbols-rounded">calendar_month</i>
            Nascimento
          </span>
          <strong>{{$user->details->date_of_birth_formatted}}</strong>
        </p>

        <p>
          <span>
            <i class="material-symbols-rounded">phone</i>
            Telefone
          </span>
          <strong>{{$user->details->phone}}</strong>
        </p>

        <p>
          <span>
            <i class="material-symbols-rounded">id_card</i>
            CPF
          </span>
          <strong>{{$user->details->document}}</strong>
        </p>

        <hr>

        <p>
          <span>
            <i class="material-symbols-rounded">alternate_email</i>
            E-mail
          </span>
          <strong>{{$user->email}}</strong>
        </p>

        <p>
          <span>
            <i class="material-symbols-rounded">attach_money</i>
            Salário
          </span>
          <strong>R${{$user->details->salary}}</strong>
        </p>

        <p>
          <span>
            <i class="material-symbols-rounded">calendar_month</i>
            Admissão
          </span>
          <strong>{{$user->details->admission_date_formatted}}</strong>
        </p>

        <hr>

        <p>
          <span>
            <i class="material-symbols-rounded">home</i>
            Endereço
          </span>
          <strong>{{$user->details->address}},
            {{$user->details->address_complement}} -
            {{$user->details->neighborhood}},
            {{$user->details->city}} -
            {{$user->details->zip_code}}
          </strong>
        </p>
      </div>

      <div class="info-footer">
        <a class="material-symbols-rounded">schedule</a>
        @can('update', $user)
          <a href="{{route('clients.edit', $user)}}"
             class="material-symbols-rounded">
            edit
          </a>
        @endcan
        @can('delete', $user)
          <a class="material-symbols-rounded"
             data-action="{{route('clients.destroy', $user)}}"
             data-name="{{$user->name}}"
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
