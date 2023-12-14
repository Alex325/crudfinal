<!-- <php
@session_start();

if (!isset($_SESSION['login'])) header('Location: login.php');

include_once '../util/conexao.php';
include_once '../daos/Registro.php';
include_once '../util/funcoes.php';
> -->
@extends('layouts.main')

@section('content')
<div class="conteudo-regs">
  <div class="nenhum-container">
    <span id="nenhum">Nenhum registro</span>
  </div>
  <!-- <php
        if (!empty($_GET['value'])) {

          $value = $_GET['value'];

          $result = DataObjects\Registro::getRegistroById($value);

          echo regContainer($result);
        } else {
          $result = DataObjects\Registro::getAllRegistros($_SESSION['login_id']);

          if (count($result) <= 0) {
            echo '<div class="nenhum-container">
              <span id="nenhum">Nenhum registro</span>
            </div>';
            exit;
          }

          foreach ($result as $row) {
            echo regCell($row);
          }
        }
        > -->
</div>
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('css/viewReg.css') }}">
<link rel="stylesheet" href="{{ asset('css/clickReg.css') }}">
@endsection