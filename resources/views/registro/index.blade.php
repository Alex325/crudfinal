
@extends('layouts.main')

@section('content')
@if (count($regs) !== 0)
  @foreach ($regs as $reg)
  <a href="{{route('registro.show', $reg->id)}}" class='reg-cell-anchor'>
        <div class='reg-cell'>
            <div class='reg-cell-cor' style='background-color: {{ $reg->cor }}'></div>
            <div class='reg-cell-bg'>
                <div class='reg-cell-text' id='reg-cell-titulo'>
                    <span>{{ $reg->titulo }}</span>
                </div>
                <div class='reg-cell-text' id='reg-cell-pensamento'>
                    <span>“{{ $reg->frase_do_dia }}...”</span>
                </div>
            </div>
        </div>
    </a>
  @endforeach
  @else
  <div class="conteudo-regs">
  <div class="nenhum-container">
    <span id="nenhum">Nenhum registro</span>
  </div>
  @endif

</div>
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('css/viewReg.css') }}">
<link rel="stylesheet" href="{{ asset('css/clickReg.css') }}">
@endsection