@extends('layouts.main')

@section('content')
<div class="add-foto-form-container">
    <form action="{{route('fotografia.destroy', $foto->id)}}" method="post" class="add-foto-form" enctype="multipart/form-data">
        @csrf
        @METHOD("DELETE")
        <div class="input-container input-container-titulo">
            <label class="label titulo" for="titulo-input">Título</label>
            <input type="text" value="{{$foto->titulo}}" name="titulo" id="titulo-input" class="input" disabled>
        </div>
        <div class="input-container input-container-legenda">
            <label class="label legenda" for="legenda-input">Legenda</label>
            <input type="text" value="{{$foto->legenda}}" name="legenda" id="legenda-input" class="input"  disabled>
        </div>
        <div class="input-container input-container-data">
            <label class="label data" for="data-input">Data da Foto</label>
            <input type="date" value="{{$foto->data_da_foto}}" name="data" id="data-input" class="input" disabled>
        </div>
        <div class="input-container input-container-botoes">
            <button type="submit" class="botao submit">Excluir</button>
            <button type="reset" class="botao reset">Limpar</button>
            <input type="hidden" name="enviado" value="enviado">
        </div>
    </form>
</div>
</div>
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('css/addFoto.css') }}">
@endsection