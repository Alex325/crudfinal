@extends('layouts.main')

@section('content')
<div class="conteudo-fotos">
    <div class="full-foto">
        <div class="full-foto-altdel-container">
            <div class="full-foto-altdel-container-2">
                <a href="{{route('fotografia.edit', $foto->id)}}" id="reg-alt">
                    <svg width="45px" height="45px" viewBox="-1.44 -1.44 26.88 26.88" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000">
                        <g id="SVGRepo_bgCarrier" stroke-width="0">
                            <rect x="-1.44" y="-1.44" width="26.88" height="26.88" rx="13.44" class="option-bg" fill="#030207" strokewidth="0"></rect>
                        </g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M15.8787 3.70705C17.0503 2.53547 18.9498 2.53548 20.1213 3.70705L20.2929 3.87862C21.4645 5.05019 21.4645 6.94969 20.2929 8.12126L18.5556 9.85857L8.70713 19.7071C8.57897 19.8352 8.41839 19.9261 8.24256 19.9701L4.24256 20.9701C3.90178 21.0553 3.54129 20.9554 3.29291 20.7071C3.04453 20.4587 2.94468 20.0982 3.02988 19.7574L4.02988 15.7574C4.07384 15.5816 4.16476 15.421 4.29291 15.2928L14.1989 5.38685L15.8787 3.70705ZM18.7071 5.12126C18.3166 4.73074 17.6834 4.73074 17.2929 5.12126L16.3068 6.10738L17.8622 7.72357L18.8787 6.70705C19.2692 6.31653 19.2692 5.68336 18.8787 5.29283L18.7071 5.12126ZM16.4477 9.13804L14.8923 7.52185L5.90299 16.5112L5.37439 18.6256L7.48877 18.097L16.4477 9.13804Z" fill="#ffffff"></path>
                        </g>
                    </svg>
                </a>
                <a href="{{route('fotografia.delete', $foto->id)}}" id="reg-del">
                    <svg fill="#ffffff" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45px" height="45px" viewBox="-100.6 -100.6 704.22 704.22" xml:space="preserve">
                        <g id="SVGRepo_bgCarrier" stroke-width="0">
                            <rect x="-100.6" y="-100.6" width="704.22" height="704.22" rx="352.11" class="option-bg" fill="#030207" strokewidth="0"></rect>
                        </g>
                        <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                        <g id="SVGRepo_iconCarrier">
                            <g>
                                <g>
                                    <path d="M491.613,75.643l-64.235-64.235c-15.202-15.202-39.854-15.202-55.056,0L251.507,132.222L130.686,11.407 c-15.202-15.202-39.853-15.202-55.055,0L11.401,75.643c-15.202,15.202-15.202,39.854,0,55.056l120.821,120.815L11.401,372.328 c-15.202,15.202-15.202,39.854,0,55.056l64.235,64.229c15.202,15.202,39.854,15.202,55.056,0l120.815-120.814l120.822,120.814 c15.202,15.202,39.854,15.202,55.056,0l64.235-64.229c15.202-15.202,15.202-39.854,0-55.056L370.793,251.514l120.82-120.815 C506.815,115.49,506.815,90.845,491.613,75.643z"></path>
                                </g>
                            </g>
                        </g>
                    </svg>
                </a>
            </div>
        </div>
        <div class="full-foto-imagem-container">
            <img class="full-foto-imagem" src="{{$foto->referencia}}" alt="">
        </div>
        <div class="full-foto-dados">
            <div class="full-foto-titulo-container">
                <span class="full-foto-titulo">
                    {{$foto->titulo}}
                    </span>
            </div>
            <div class="full-foto-legenda-container">
                <span class="full-foto-legenda ">
                    {{$foto->legenda}}
                    </span>
            </div>
            <div class="full-foto-datas">
                <span class="full-foto-data">Adicionada em: {{ $data }}</span>
                <span class="full-foto-data-da-foto">Tirada em: {{ $tiradaem }}</span>
            </div>
        </div>
    </div>
</div>
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('css/clickFoto.css')}}">
@endsection