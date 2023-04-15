@extends('layouts.main')

@section('title', "Criar")

@section('content')
    <form method="post" action="{{route('figurinhas.store')}}" enctype="multipart/form-data" class="d-flex flex-column w-50 m-auto">
        <h1 class="text-center w-100">Criar Figurinha</h1>
        @csrf
        <label for="">Nome:</label>
        <input type="text" name="nome">
        <label for="">Descrição:</label>
        <input type="text" name="desc">
        <label for="">Imagem:</label>
        <input type="file" name="imgOn">
        <button type="submit">criar</button>
    </form>

@endsection

