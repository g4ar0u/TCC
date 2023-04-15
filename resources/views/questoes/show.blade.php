@extends('layouts.main')

@section('title', "Show")

@section('content')

@foreach($questoes as $questao)
  <div class="card mt-5 mb-5 d-none questoes" style="width: 18rem;">
    <div class="card-header">
      {{$questao->texto}}?
    </div>

    @foreach($respostas as $resposta)
      @if($questao->id == $resposta->questao_id)
        <div class="d-flex flex-column">
        <button data-correct="{{$resposta->correta}}" class="alternativas">{{$resposta->texto}}</button>
        </div>
      @endif
    @endforeach
    
  </div>
@endforeach

<div class="finish">
  <span></span>
  <button>Reiniciar</button>
</div>

<form action="{{route('questoes.validate')}}" method="post" id="quizzForm">
  @csrf
  <input type="hidden" value="{{$figurinha->id}}" name="figurinha_id">
</form>


@endsection 
