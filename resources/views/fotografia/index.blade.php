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
  <div class="nenhum-container">
    <span id="nenhum">Nenhuma fotografia</span>
  </div>
  <!-- <php
        if (!empty($_GET['value'])) {

          $value = $_GET['value'];

          $result = DataObjects\Fotografia::getFotografiaById($value);

          echo fotoContainer($result);
        } else {

          $result = DataObjects\Fotografia::getAllFotografias($_SESSION['login_id']);

          if (count($result) > 0) {
            echo '<div class="foto-row">';
            foreach ($result as $row) {
              echo fotoCell($row);
            }
            echo '</div>';
          } else {
            echo '<div class="nenhum-container">
            <span id="nenhum">Nenhuma fotografia</span>
          </div>';;
          }
        }
        ?> -->
</div>
@endsection

@section('style')
<link rel="stylesheet" href="../css/viewFoto.css">
<link rel="stylesheet" href="../css/clickFoto.css">
@endsection