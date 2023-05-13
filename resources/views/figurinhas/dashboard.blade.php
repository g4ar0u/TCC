@extends('layouts.admin')

@section('title', 'Dashboard de figurinhas')

@section('subtitle', 'DASHBOARD DE FIGURINHAS')

@section('content')
      
<a class="btn btn-success btn-lg adm" href="{{route('figurinhas.create')}}">Adicionar Figurinha</a>

@foreach ($figurinhas as $figurinha)

<div class="d-flex justify-content-around align-items-center m-5 dashboard">

    <a class="w-25 text-dark text-decoration-none fs-3">{{$figurinha->nome}}</a>

    <a class="text-dark text-decoration-underline fs-3" href="{{route('dashboard.questoes', $figurinha->id)}}">Questões</a>
    
    <img src="/imgs/uploads/{{$figurinha->imgOn}}" alt="{{$figurinha->nome}}">

    <form action="{{route('figurinhas.destroy',$figurinha->id)}}" method="post">
    @csrf
    @method('delete')
    <button type="submit" class="btn btn-danger">Deletar</button>
    </form>

    <button type="button" class="btn btn-primary"><a class="text-white text-decoration-none" href="{{route('figurinhas.edit',$figurinha->id)}}">Editar</a></button>
</div>

@endforeach
@endsection
