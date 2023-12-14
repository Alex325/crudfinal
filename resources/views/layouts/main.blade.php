<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('style')
    <link rel="stylesheet" href="{{ asset('css/principal.css') }}">
    <link href="{{ asset('css/sideMenu.css') }}" rel="stylesheet"></script>
    <link rel="shortcut icon" href="{{ asset('icons/favicon64x64.svg') }}" sizes="64x64" type="image/x-icon">
    <script src="{{ asset('js/sideMenu.js') }}" defer></script>
    <title>Diário</title>
</head>

@include('util.sideMenu')
<div class="principal">
  <div class="conteudo">
    @include('util.banner')
        @yield('content')
    </div>
</div>