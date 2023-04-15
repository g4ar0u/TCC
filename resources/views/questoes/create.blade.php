@extends('layouts.main')

@section('title', "Criar")

@section('content')
    <form method="post" action="{{route('questoes.store')}}" class="d-flex flex-column w-50 m-auto">
        <h1 class="text-center w-100">Criar questão</h1>
        @csrf
        <label for="">Texto:</label>
        <input type="text" name="texto">
        <label for="">Resposta:</label>
        <input type="text" name="resposta[]">
        <label for="">Resposta:</label>
        <input type="text" name="resposta[]">
        <label for="">Resposta:</label>
        <input type="text" name="resposta[]">
        <label for="">Resposta certa:</label>
        <input type="text" name="respostaCerta">

        <a href="{{route('figurinhas.index',['finalizar'=>true])}}">Finalizar</a>

        <button type="submit">Criar</button>
    </form>
@endsection