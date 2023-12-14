<!-- <php
@session_start();

if (!isset($_SESSION['login'])) header('Location: login.php');

include_once '../util/conexao.php';
include_once '../util/funcoes.php';
include_once '../daos/Registro.php';
include_once '../models/Registro.php';

if (isset($_POST['enviado'])) { {
    $idUsuario = $_SESSION['login_id'];
    $titulo = ucfirst(trim($_POST['titulo']));
    $frase = trim($_POST['frase']);
    $texto = trim($_POST['texto']);
    $cor = $_POST['cor'];

    switch ($_GET['op']) {
      case 'alt':
        $value = $_GET['value'];
        $obj = new Models\Registro($value, $titulo, $frase, $texto, $cor);
        DataObjects\Registro::updateRegistro($obj);
        break;

      case 'exc':
        $value = $_GET['value'];
        DataObjects\Registro::deleteRegistro($value);
        break;

      default:
        $obj = new Models\Registro(null, $titulo, $frase, $texto, $cor, $idUsuario);
        DataObjects\Registro::addRegistro($obj);
        break;
    }
  }
  echo "<script>location.replace('viewReg.php');</script>";
}

?> -->

@extends('layouts.main')

@section('content')
<div class="conteudo-form">
  <div class="add-reg-form-container">
    <form action="{{ route('registro.store') }}" method="post" class="add-reg-form">
      @csrf
      <div class="input-container input-container-titulo">
        <label class="label titulo" for="titulo-input">Título</label>
        <input type="text" name="titulo" id="titulo-input" class="input" required>
      </div>
      <div class="input-container input-container-frase">
        <label class="label frase" for="frase-input">Frase do dia</label>
        <input type="text" name="frase" id="frase-input" class="input" required>
      </div>
      <div class="input-container input-container-texto">
        <label class="label text" for="texto-input">Texto</label>
        <textarea name="texto" id="texto-input" class="input" required></textarea>
      </div>
      <div class="input-container input-container-cor">
        <label class="label cor" for="cor-input">Cor</label>
        <input type="color" name="cor" id="cor-input" class="input" required>
      </div>
      <div class="input-container input-container-botoes">
        <button type="submit" class="botao submit">Adicionar</button>
        <button type="reset" class="botao reset">Limpar</button>
        <input type="hidden" name="enviado" value="enviado">
      </div>
    </form>
    <!-- <php if (isset($_GET['op'])) { $value=$_GET['value']; $result=DataObjects\Registro::getRegistroById($value); $disabled=$_GET['op']=='exc' ? 'disabled' : '' ; echo altRegForm($result, $_GET['op'], $disabled); } else { echo '<form action="" method="post" class="add-reg-form">
                        <div class="input-container input-container-titulo">
                            <label class="label titulo" for="titulo-input">Título</label>
                            <input type="text" name="titulo" id="titulo-input" class="input" required>
                        </div>
                        <div class="input-container input-container-frase">
                            <label class="label frase" for="frase-input">Frase do dia</label>
                            <input type="text" name="frase" id="frase-input" class="input" required>
                        </div>
                        <div class="input-container input-container-texto">
                            <label class="label text" for="texto-input">Texto</label>
                            <textarea name="texto" id="texto-input" class="input" required></textarea>
                        </div>
                        <div class="input-container input-container-cor">
                            <label class="label cor" for="cor-input">Cor</label>
                            <input type="color" name="cor" id="cor-input" class="input" required>
                        </div>
                        <div class="input-container input-container-botoes">
                            <button type="submit" class="botao submit">Adicionar</button>
                            <button type="reset" class="botao reset">Limpar</button>
                            <input type="hidden" name="enviado" value="enviado">
                        </div>
                    </form>
                    ' ; } ?> -->
  </div>
</div>
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('css/addReg.css') }}">
@endsection