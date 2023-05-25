@extends('layouts.main')

@section('title','Personagens')

@section('subtitle','Personagens')

@section('content')
  <div class="d-flex justify-content-between m-auto caixa-personagem">
        <div class="d-flex flex-column align-items-center personagem">
            <img src="/imgs/chibo.png" alt="Chibo">
            <article class="fw-bold fs-5 text-center">Chibo</article>
            <p class="text-center w-75">Chibo tem 9 anos, gosta de brincar na grama e correr pela floresta, ensinando todos a preservar sua casa, o ambiente terrestre!</p>
        </div>

        <div class="d-flex flex-column align-items-center personagem">
            <img src="/imgs/martin.png" alt="Martin">
            <article class="fw-bold fs-5 text-center">Martin</article>
            <p class="text-center w-75">Martin tem 8 anos, ama nadar em rios e conversar com sua amiga polvo, Pérola. Ambos ajudam a preservar o meio ambiente aquático!</p>
        </div>
  </div>

  <div class="d-flex justify-content-between m-auto caixa-personagem">
        <div class="d-flex flex-column align-items-center personagem">
            <img src="/imgs/loa.png" alt="Loa">
            <article class="fw-bold fs-5 text-center">Loa</article>
            <p class="text-center w-75">Loa tem 10 anos, ama voar por todo o céu, ajuda a todos a preservar sua cara, o ambiente aéreo, onde brinca com seus amigos pássaros!</p>
        </div>

        <div class="d-flex flex-column align-items-center personagem">
            <img src="/imgs/techo.png" alt="Techo">
            <article class="fw-bold fs-5 text-center">Techo</article>
            <p class="text-center w-75">Techo tem 9 anos, ama cuidar da natureza e ajudar seus amigos a usarem a tecnologia de um jeito mais sustentável e divertido! </p>
        </div>
  </div>
@endsection