@extends('layouts.admin')

@section('title', 'Dashboard de questões')

@section('subtitle', 'DASHBOARD DE QUESTÕES')

@section('content')

<a href="{{route('questoes.create',["addQuestao" => $figurinha->id])}}" class="btn btn-success btn-lg adm">Adicionar Questão</a>

@foreach ($questoes as $questao)

<div class="d-flex justify-content-around align-items-center m-5">

    <a class="w-25 text-dark text-decoration-none fs-3">{{$questao->texto}}</a>
    
    <form action="{{route('questoes.destroy',$questao->id)}}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Deletar</button>
    </form>

    <button type="button" class="btn btn-primary"><a class="text-white text-decoration-none" href="{{route('questoes.edit',$questao->id)}}">Editar</a></button>
</div>

@endforeach
@endsection
