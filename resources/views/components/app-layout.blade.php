<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  <title>{{ env('APP_NAME') }} @isset($pageTitle)
      - {{ $pageTitle }}
    @endisset
  </title>
</head>

<body>

  {{ $slot }}

  <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
