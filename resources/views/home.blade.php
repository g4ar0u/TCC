@extends('layouts.main')

@section('title','EcoQuizzo')

@section('subtitle', 'Página inicial')

@section('content')


<div class="d-flex flex-column">

<div class="d-flex flex-wrap justify-content-center home">
    <img src="/imgs/3.png" alt="">
    <img src="/imgs/4.png" alt="">
    <img src="/imgs/5.png" alt="">
</div>

<div class="d-flex align-items-center justify-content-center sobre mt-5">

<img src="/imgs/chiboyey.png" alt="">

<div class="d-flex flex-column align-items-center w-50">

<h2 class="fs-1">Quem Somos?</h2>

<p class="text-center">Somos uma equipe que busca agregar no conhecimento ambiental das crianças, por meio de álbum de figurinhas colecionáveis dentro do site.
Com a ajuda dos nossos amiguinhos, Chibo, Loa, Martin e Techo, vamos colecionar!</p>

<a class="btn btn-primary btn-lg w-25 azul" href="{{route('figurinhas.index')}}">Comece</a>

</div>


</div>

</div>


@endsection