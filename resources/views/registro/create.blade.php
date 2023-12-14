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
  </div>
</div>
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('css/addReg.css') }}">
@endsection