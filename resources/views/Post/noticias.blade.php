@extends('layouts.app')

@section('content')
<section style="background-size:cover; background-image:url('https://images2.alphacoders.com/204/204300.jpg'); color: white"class="jumbotron text-center">
        <div class="container">
          <h1 class="jumbotron-heading">Noticias</h1>
        </div>
      </section>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                   <a href="/noticias/add"> <button type="button" src="noticas/add" class="float-right btn btn-warning"> <span class="fas fa-plus-circle" aria-hidden="true">Añadir nueva noticia</span></button> </a>
            </div>
        </div>
    </div>
    <div class="container">
      <div class="row mb-2 mt-5">
          @foreach ($noticias as $noticia)
            <div class="col-md-6">
              <div class="card flex-md-row mb-4 box-shadow h-md-250">
                <div class="card-body d-flex flex-column align-items-start">
                  <h3 class="mb-0">
                  <a class="text-dark" href="{{url('/noticias/'.$noticia->id_noticias)}}">{{$noticia->titulo_noticia}}</a>
                  </h3> 
                  <div class="mb-1 text-muted">{{$noticia->autor}}</div>
                    <p class="card-text mb-auto">{{$noticia->subtitulo_noticia}}</p>
                  <a href="{{url('/noticias/'.$noticia->id_noticias)}}">Continuar leyendo</a>
                </div>
                <img  class="card-img-right flex-auto d-none d-md-block" style="width: 250px; height: 250px;" src="{{URL::asset('/noticias/'.$noticia->	imagen_contenido_noticia)}}" alt="profile Pic">
            </div>
            </div>
            @endforeach 
        </div>

@endsection