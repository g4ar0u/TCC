@extends('layouts.admin')

@section('title','Editar Figurinha')

@section('subtitle', 'EDITE SUA FIGURINHA')

@section('content')

<form action="{{route('figurinhas.update', $figurinha->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label class="form-label fs-5 mt-3">Nome:</label>
    <input class="form-control form-control-lg" value="{{$figurinha->nome}}" type="text" name="nome">

    <label class="form-label fs-5 mt-3">Descrição:</label>
    <input class="form-control form-control-lg" value="{{$figurinha->desc}}" type="text" name="desc">

    <label class="form-label fs-5 mt-3">Imagem:</label>
    <input class="form-control form-control-lg" type="file" name="imgOn">

    <button type="submit" class="btn btn-success btn-lg mt-3 adm">Editar</button>
</form>
@endsection