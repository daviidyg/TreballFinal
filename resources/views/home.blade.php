@extends('layouts.app')

@section('content')
<style>
.carousel-item {
  height: 65vh;
  min-height: 350px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  @media screen and (max-width: 767px) {
  /* Hide captions */
  .carousel-caption {
     display: none
  }
}
</style>
<header>
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        
      </ol>
      <div class="carousel-inner" role="listbox">
        <!-- Slide One - Set the background image for this slide in the line below -->
    
        <div  class="carousel-item active" style="background-image: url('https://img.wallpapersafari.com/desktop/1920/1080/54/12/AxvL24.jpg')">
          <div class="carousel-caption">
              <a style="color:white; text-decoration: none;" href="noticias/all"> <h3 class="display-4">Noticias</h3></a>
            <p class="lead">Encontraremos las últimas noticias en el mundo de warhammer</p>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style=" background-size: cover; background-image: url('https://www.warhammer-community.com/wp-content/uploads/2018/05/AoSNighthauntFF-May14-Battleshot15fo.jpg')">
          <div class="carousel-caption">
            <a style="color:white; text-decoration: none;" href="figuras"> <h3 class="display-4">Portal figuras</h3></a>
            <p class="lead">Aquí podrás buscar los tutoriales para poder pintar tus miniaturas</p>
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('http://pressover.news/wp-content/uploads/2018/08/warhammer-40-000-space-marines-29325-1920x1080.jpg')">
          <div class="carousel-caption ">
           <a style="color:white; text-decoration: none;" href="/profile/inventario"> <h3 class="display-4">¿Eres nuevo?</h3></a>
            <p class="lead">Antes de comenzar, configura tu inventario.</p>
          </div>
        </div>

      </div>
     
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
    </div>
  </header>
  <div class="container">
      <div class="col-12 mt-5">
        <h1 style="text-align:center">ÚLTIMA NOTICIA AÑADIDA</h1>
      </div>
    </div>
  <div style="background-color:white" class="container mt-5">
      <div class="row featurette">
          <div class="mt-5 col-md-7">
            <h2 class="featurette-heading">{{$noticiaencontrada->titulo_noticia}} </h2>
            <p class="lead">{{$noticiaencontrada->subtitulo_noticia}}</p>
            <p>Autor: {{$noticiaencontrada->autor}}</p>
            <p>{{$noticiaencontrada->contenido_noticia}}</p>
          </div>
          <div class="col-md-5">
            <img class="featurette-image img-fluid mx-auto" style="width: 550px; height:300px;" src="/noticias/{{$noticiaencontrada->portada_imagen}}" data-holder-rendered="true">
          </div>
        </div>

  </div>

  <div class="container">
    <div class="col-12 mt-5">
      <h1 style="text-align:center">ÚLTIMAS FIGURAS AÑADIDAS</h1>
    </div>
  </div>

  <!-- Page Content -->
  <div class="container  mt-5">
      <!-- Three columns of text below the carousel -->
      <div class="row">
        @foreach ($figuras as $figura)
        <div class="col-12 col-md-4">
            <div class="card" style="width: 22 rem;">
            <img style="height:60vh; width:100%" class="card-img-top" src="miniaturas/{{$figura->minifoto}}" alt="Card image cap">
                <div class="card-body">
                <h5 class="card-title">{{$figura->nombre_figuras}}</h5>
                  <p class="card-text">Alianza: {{$figura->alianza_figuras}}</p>
                  <p class="card-text">Ejercito: {{$figura->ejercito_figuras}}</p>
                  <a href="/figuras/all/{{$figura->id_figuras}}" class="btn btn-primary">Ver</a>
                </div>
              </div>
            </div>
        @endforeach
          
      </div>

   
@endsection
