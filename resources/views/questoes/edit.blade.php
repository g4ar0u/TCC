@extends('layouts.admin')

@section('title','Editar Questão')

@section('subtitle', 'EDITE SUA QUESTÃO')

@section('content')
<form action="{{route('questoes.update', $questao->id)}}" method="post">
    @csrf
    @method('PUT')
    
    <label class="form-label fs-5 mt-3">Texto:</label>
    <input class="form-control form-control-lg" value="{{$questao->texto}}" type="text" name="texto">

    @foreach ($respostas as $resposta)

    @if ($resposta->correta)
    <label class="form-label fs-5 mt-3">Resposta certa:</label>
    <input class="form-control form-control-lg" type="text" value="{{$resposta->texto}}" name="resposta[]">
    @else
    <label class="form-label fs-5 mt-3">Resposta:</label>
    <input class="form-control form-control-lg" type="text" value="{{$resposta->texto}}" name="resposta[]">
    @endif
    @endforeach

    <button type="submit" class="btn btn-success btn-lg mt-3 adm">Editar</button>
</form>    
@endsection