<!-- <php

@session_start();

if (!isset($_SESSION['login'])) header('Location: login.php');

require_once '../util/conexao.php';
include_once '../models/Fotografia.php';
include_once '../daos/Fotografia.php';

if (isset($_POST['enviado'])) {

  $titulo = ucfirst(trim($_POST['titulo']));
  $legenda = trim($_POST['legenda']);
  $data = empty($_POST['data']) ? null : $_POST['data'];
  $idUsuario = $_SESSION['login_id'];

  if (isset($_GET['op'])) {
    $value = $_GET['value'];
    switch ($_GET['op']) {
      case 'alt':
        $obj = new Models\Fotografia($value, $titulo, null, $legenda, $data);
        DataObjects\Fotografia::updateFotografia($obj);
        break;

      case 'exc':
        $referencia = DataObjects\Fotografia::getReferenciaById($value);
        unlink($referencia);

        $diretorio = "../images/" . $_SESSION['login_id'];

        $files = scandir($diretorio);

        if ((count($files) - 2) <= 0)
          rmdir($diretorio);

        DataObjects\Fotografia::deleteFotografia($value);
        break;
    }
  } else {

    $extension = pathinfo($_FILES['imagem']['name'], PATHINFO_EXTENSION);

    $diretorio = "../images/" . $_SESSION['login_id'] . "/";

    $referencia = $diretorio . (new DateTime('now', (new DateTimeZone('America/Sao_Paulo'))))->format('YmdHis') . ".$extension";

    if (!file_exists($diretorio))
      mkdir($diretorio);

    $obj = new Models\Fotografia(null, $titulo, $referencia, $legenda, $data, $idUsuario);

    if (move_uploaded_file($_FILES['imagem']['tmp_name'], $referencia))
      DataObjects\Fotografia::addFotografia($obj);
  }
  echo "<script>location.replace('viewFoto.php');</script>";
}
?> -->

@extends('layouts.main')

@section('content')
<div class="conteudo-form">
  <div class="add-foto-form-container">
    <form action="{{ route('fotografia.store') }}" method="post" class="add-foto-form" enctype="multipart/form-data">
      @csrf
      <div class="input-container input-container-titulo">
        <label class="label titulo" for="titulo-input">Título</label>
        <input type="text" name="titulo" id="titulo-input" class="input" required>
      </div>
      <div class="input-container input-container-legenda">
        <label class="label legenda" for="legenda-input">Legenda</label>
        <input type="text" name="legenda" id="legenda-input" class="input" required>
      </div>
      <div class="input-container input-container-texto">
        <label class="label imagem" for="imagem-input">Foto</label>
        <input type="file" accept="image/*" name="imagem" id="imagem-input" class="input" required>
      </div>
      <div class="input-container input-container-data">
        <label class="label data" for="data-input">Data da Foto</label>
        <input type="date" name="data" id="data-input" class="input">
      </div>
      <div class="input-container input-container-botoes">
        <button type="submit" class="botao submit">Adicionar</button>
        <button type="reset" class="botao reset">Limpar</button>
        <input type="hidden" name="enviado" value="enviado">
      </div>
    </form>
  </div>

  <!-- <php
        if (isset($_GET['op'])) {
          $value = $_GET['value'];

          $result = DataObjects\Fotografia::getFotografiaById($value);

          $disabled = $_GET['op'] == 'exc' ? 'disabled' : '';

          echo altFotoForm($result, $_GET['op'], $disabled);
        } else {
          echo '<div class="add-foto-form-container">
                    <form action="" method="post" class="add-foto-form" enctype="multipart/form-data">
                        <div class="input-container input-container-titulo">
                            <label class="label titulo" for="titulo-input">Título</label>
                            <input type="text" name="titulo" id="titulo-input" class="input" required>
                        </div>
                        <div class="input-container input-container-legenda">
                            <label class="label legenda" for="legenda-input">Legenda</label>
                            <input type="text" name="legenda" id="legenda-input" class="input" required>
                        </div>
                        <div class="input-container input-container-texto">
                            <label class="label imagem" for="imagem-input">Foto</label>
                            <input type="file" accept="image/*" name="imagem" id="imagem-input" class="input" required>
                        </div>
                        <div class="input-container input-container-data">
                            <label class="label data" for="data-input">Data da Foto</label>
                            <input type="date" name="data" id="data-input" class="input">
                        </div>
                        <div class="input-container input-container-botoes">
                            <button type="submit" class="botao submit">Adicionar</button>
                            <button type="reset" class="botao reset">Limpar</button>
                            <input type="hidden" name="enviado" value="enviado">
                        </div>
                    </form>
                </div>';
        }
        ?> -->
</div>
@endsection

@section('style')
<link rel="stylesheet" href="../css/addFoto.css">
@endsection