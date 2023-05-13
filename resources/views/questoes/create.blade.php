@extends('layouts.admin')

@section('title', "Criar Questões")

@section('subtitle', "CRIE SUA QUESTÃO")

@section('content')
    <form method="post" action="{{route('questoes.store')}}" class="d-flex flex-column w-50 m-auto">
        @csrf
        <label class="form-label fs-5 mt-3">Texto:</label>
        <input class="form-control form-control-lg" type="text" name="texto">

        <label class="form-label fs-5 mt-3">Resposta:</label>
        <input class="form-control form-control-lg" type="text" name="resposta[]">

        <label class="form-label fs-5 mt-3">Resposta:</label>
        <input class="form-control form-control-lg" type="text" name="resposta[]">

        <label class="form-label fs-5 mt-3">Resposta:</label>
        <input class="form-control form-control-lg" type="text" name="resposta[]">

        <label class="form-label fs-5 mt-3">Resposta certa:</label>
        <input class="form-control form-control-lg" type="text" name="respostaCerta">

        <a href="{{route('figurinhas.index')}}">Finalizar</a>

        <button type="submit" class="btn btn-success btn-lg mt-3 adm">Criar</button>
    </form>
@endsection