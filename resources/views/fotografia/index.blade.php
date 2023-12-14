<!-- <php
@session_start();

if (!isset($_SESSION['login'])) header('Location: login.php');

include_once '../util/conexao.php';
include_once '../daos/Fotografia.php';
include_once '../util/funcoes.php';
?> -->

@extends('layouts.main')

@section('content')
<div class="conteudo-fotos">

  @if (count($fotos) !== 0)
  @foreach ($fotos as $foto)
  <div class="foto-row">
    <a class="foto-container" href="{{route('fotografia.show', $foto->id)}}">
      <div class="foto-bg">
        <span class="foto-titulo">{{ $foto->titulo }}</span>
        <img class="foto-imagem" src="{{ $foto->referencia }}" alt="a">
        <span class="foto-legenda">{{ $foto->legenda }}</span>
      </div>
    </a>
  </div>
  @endforeach
  @else
  <div class="nenhum-container">
    <span id="nenhum">Nenhuma fotografia</span>
  </div>
  @endif

</div>
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('css/viewFoto.css')}}">
@endsection