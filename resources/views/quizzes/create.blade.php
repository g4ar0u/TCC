@extends('layouts.main')

@section('title', "Criar")

@section('content')
    <form method="post" action="{{route('quizzes.store')}}" class="d-flex flex-column w-50 m-auto">
        <h1 class="text-center w-100">Criar Quizz</h1>
        @csrf
        <input type="text" name="pergunta">
        <input type="text" name="resposta1">
        <input type="text" name="resposta2">
        <input type="text" name="resposta3">
        <input type="text" name="respostaCerta">

        <a href="{{route('figurinhas.index',['finalizar'=>true])}}">Finalizar</a>

        <button type="submit">Criar</button>
    </form>
@endsection