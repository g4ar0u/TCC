@extends('layouts.admin')

@section('title', "Criar Figurinha")

@section('subtitle', 'CRIE SUA FIGURINHA')

@section('content')
    <form method="post" action="{{route('figurinhas.store')}}" enctype="multipart/form-data" class="d-flex flex-column w-50 m-auto">
        @csrf
        <label class="form-label fs-5 mt-3">Nome:</label>
        <input class="form-control form-control-lg" type="text" name="nome">

        <label class="form-label fs-5 mt-3">Descrição:</label>
        <input class="form-control form-control-lg" type="text" name="desc">

        <label class="form-label fs-5 mt-3">Imagem:</label>
        <input class="form-control form-control-lg" type="file" name="imgOn">

        <button type="submit" class="btn btn-success btn-lg mt-3 adm">Criar</button>
    </form>
@endsection