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
          <div class="carousel-caption d-none d-md-block">
              <a style="color:white; text-decoration: none;" href="noticias/all"> <h3 class="display-4">Noticias</h3></a>
            <p class="lead">Encontraremos las últimas noticias en el mundo de warhammer</p>
          </div>
        </div>
        <!-- Slide Two - Set the background image for this slide in the line below -->
        <div class="carousel-item" style=" background-size: cover; background-image: url('https://www.warhammer-community.com/wp-content/uploads/2018/05/AoSNighthauntFF-May14-Battleshot15fo.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3 class="display-4">Acceder al portal de pintura</h3>
            <p class="lead">Aquí podrás buscar los tutoriales para poder pintar tus miniaturas</p>
          </div>
        </div>
        <!-- Slide Three - Set the background image for this slide in the line below -->
        <div class="carousel-item" style="background-image: url('http://pressover.news/wp-content/uploads/2018/08/warhammer-40-000-space-marines-29325-1920x1080.jpg')">
          <div class="carousel-caption d-none d-md-block">
            <h3 class="display-4">¿Eres nuevo?</h3>
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
  
  <!-- Page Content -->
  <section class="py-5">
    <div class="container">
      <h1 class="font-weight-light">Half Page Image Slider</h1>
      <p class="lead">The background images for the slider are set directly in the HTML using inline CSS. The images in this snippet are from <a href="https://unsplash.com">Unsplash</a>!</p>
    </div>
  </section>
    
@endsection
