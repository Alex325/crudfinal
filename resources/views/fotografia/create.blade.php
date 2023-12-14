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
<link rel="stylesheet" href="{{ asset('css/addFoto.css') }}">
@endsection