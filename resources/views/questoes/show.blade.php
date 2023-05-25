@extends('layouts.main')

@section('title', "Show")

@section('subtitle','QUIZZ')

@section('content')


<section class="d-flex flex-wrap w-75 justify-content-evenly m-auto align-items-center mt-4 mb-4">
  <div class="d-flex flex-column align-items-center">

  <img src="/imgs/uploads/{{$figurinha->imgOn}}" alt="{{$figurinha->nome}}">

  <h4 class="text-center text-uppercase">{{$figurinha->nome}}</h4>

  </div>

  @foreach($questoes as $questao)
  <div class="d-none questoes text-center">
    <h1 class="fw-bold">Questão: {{$questao->texto}}</h1>
    @foreach($respostas as $resposta)
        @if($questao->id == $resposta->questao_id)
        <div class="d-flex justify-content-center">
          <button data-correct="{{$resposta->correta}}" class="alternativas btn btn-light text-uppercase">{{$resposta->texto}}</button>
        </div>
        @endif
      @endforeach
      <div class="finish d-flex flex-column align-items-center mt-4">
      <span></span>
      <button class="btn btn-primary text-center fs-5">Reiniciar</button>
      </div>
  </div>
  @endforeach
</section>


<form action="{{route('questoes.validate')}}" method="post" id="quizzForm">
  @csrf
  <input type="hidden" value="{{$figurinha->id}}" name="figurinha_id">
</form>


@endsection 
