@extends('layouts.main')

@section('title', "Criar")

@section('content')
    <form method="post" action="{{route('figurinhas.store')}}" enctype="multipart/form-data" class="d-flex flex-column w-50 m-auto">
        <h1 class="text-center w-100">Criar Figurinha</h1>
        @csrf
        <input type="text" name="nome">
        <input type="text" name="desc">
        <input type="file" name="imgOff">
        <input type="file" name="imgOn">
        <button type="submit">criar</button>
    </form>

@endsection

