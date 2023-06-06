@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>
        Dashboard
        <small>Painel de Controle</small>
    </h1>
@stop

@section('content')
    {{-- <p>Olá Candidato, bem-vindo ao painel do Desafio Vercan.</p> --}}
    <div class="row">
        <section class="invoice">
            <div class="row">
                <div class="col-xs-12">
                    <h2 class="page-header">
                        Olá Visitante, bem-vindo!
                        <small class="" styles="margin-right: 50%;text-align: right;">Hoje é {{ date('d/m/Y') }}</small>
                    </h2>
                </div>
            </div>
            
        </section>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    {{-- @vite([ 'resources/sass/app.scss',   'resources/css/app.css',   'resources/js/app.js']) --}}
@stop

@section('js')
    <script> console.log('Olá!'); </script>
@stop
