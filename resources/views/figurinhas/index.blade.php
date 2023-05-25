@extends('layouts.main')

@section('title', "Home")

@section('subtitle','Álbum de figurinhas')

@section('content')
    <h3 class="text-center pb-4 pt-3 w-100 text-uppercase">Clique no botão "Quizz" para saber mais!</h3>
    <div class="d-flex flex-wrap justify-content-evenly m-auto">
    @foreach ($figurinhas as $figurinha)
    <div class="card personagem mt-4">
        @if ($figurinha->imgAtiva=="n")
        <p>vish tem nada</p>
       @else
        <img src="\imgs\uploads\{{$figurinha->imgOn}}" class="card-img-top" alt="{{$figurinha->nome}}">
       @endif
        <div class="card-body figurinha">
          <h5 class="card-title text-uppercase">{{$figurinha->nome}}</h5>
          <p class="card-text">{{$figurinha->desc}}</p>
          @if ($figurinha->imgAtiva=="n")
          <a href="{{route('questoes.show', $figurinha->id)}}" class="btn btn-primary">Quizz</a>
          @else
          
          @endif
        </div>
      </div>
    @endforeach
    </div>
@endsection

