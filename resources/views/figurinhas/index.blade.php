@extends('layouts.main')

@section('title', "Home")

@section('content')
    <h1>Home</h1>
    @foreach ($figurinhas as $figurinha)
    <div class="card" style="width: 18rem;">
        @if ($figurinha->imgAtiva=="n")
        <p>vish tem nada</p>
       @else
        <img src="\imgs\uploads\{{$figurinha->imgOn}}" class="card-img-top" alt="...">
       @endif
        <div class="card-body">
          <h5 class="card-title">{{$figurinha->nome}}</h5>
          <p class="card-text">{{$figurinha->desc}}</p>
          <a href="{{route('questoes.show', $figurinha->id)}}" class="btn btn-primary">Go somewhere</a>
        </div>
      </div>
    @endforeach
@endsection

