@extends('layouts.main')
@section('content')
<div class="conteudo-login">
  <div class="titulo">
    <h1>Diário Digital</h1>
  </div>
  <br>
  <br>
  <br>
  <p>Bem-vindo ao Diário Digital. Aqui, você pode adicionar e ver os seus registros, além de adicionar e visualizar fotografias que foram subidas nas partes devidas. Para experimentar, clique nos ícones ao lado ou no do menu para abrir o menu (não muda nada).</p>
  @if (session('login') !== null)
    <p>Não estás logado. Loga-te ↳<a id="login-link" href="login">aqui</a>↲</p>
  @else
    <p>Você está logado como {{ session('login') }}
  @endif
</div>
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection