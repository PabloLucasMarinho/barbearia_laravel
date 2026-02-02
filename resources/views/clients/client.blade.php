@extends('components.app-layout')

@section('title', $client->name)

@section('content')
  <section class="main-container">
    <div class="client-title">
      <h1>Cliente</h1>
      <span>
        <hr>
      </span>
    </div>

    <section class="client-info">
      <div>
        <span>{{ $client->initials }}</span>
        <p>{{ $client->name }}</p>
      </div>
      <p>{{ $client->date_of_birth_formatted }}</p>
      <hr>
      <p>{{ $client->document }}</p>
      <hr>
      <p>{{ $client->phone }}</p>
    </section>

  </section>
@endsection
