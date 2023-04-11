@extends('layouts.main')

@section('title', "Show")

@section('content')

<form method="post" action="{{route('quizzes.store')}}" class="d-flex flex-column w-50 m-auto">
@csrf
@foreach($quizzes as $quizz)
<div class="card" style="width: 18rem;">
  <div class="card-header">
    {{$quizz->pergunta}}
  </div>
<input type="hidden" value="" name="respostas[]" class="inputResposta">
  <ul class="list-group list-group-flush">
    <li onclick="preencherInput('{{$quizz->resposta1}}')" class="list-group-item">{{$quizz->resposta1}}</li>
    <li class="list-group-item">{{$quizz->resposta2}}</li>
    <li class="list-group-item">{{$quizz->resposta3}}</li>
    <li class="list-group-item">{{$quizz->respostaCerta}}</li>
  </ul>
</div>
@endforeach

<button type="submit">Enviar</button>
</form>

@endsection 
