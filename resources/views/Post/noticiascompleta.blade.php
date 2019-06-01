@extends('layouts.app')

@section('content')
<style>
section{width:100%; float:left;}
.banner-section{ background-size:cover; height: 380px; left: 0; position: absolute;}
.post-title-block{padding:100px 0;}
.post-title-block h1 {color: #fff; font-size: 55px;}
.post-title-block li{font-size:20px; color: #fff;}
.image-block{float:left; width:100%; margin-bottom:10px;}
.footer-link{float:left; width:100%; background:#222222; text-align:center; padding:30px;}
.footer-link a{color:#A9FD00; font-size:18px; text-transform:uppercase;}
</style>
@foreach ($noticias as $noticia)
{{-- <section style="background-size:cover; background-image:url({{url('noticias/'.$noticia->portada_imagen)}}); color: white"class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">{{$noticia->titulo_noticia}}</</h1>
      <h5 class="cursive m-3">{{$noticia->subtitulo_noticia}}</h5>
    </div>
  </section>    
<div class="container">
    <div class="row">
        <div style="word-break:break-all" class="col-12  mt-5">
        <h5 class="m-2">{{$noticia->contenido_noticia}}</h5>
        </div>
        <div class="mt-5 col-12">
                <figure class="figure">
                <img src="{{URL::asset('/noticias/'.$noticia->	imagen_contenido_noticia)}}" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
                <figcaption class="figure-caption text-right">{{$noticia->pie_de_imagen_noticia}}</figcaption>
                </figure>
        </div>
    </div>
</div> --}}
<section style ="background-image:url('/noticias/{{$noticia->portada_imagen}}');" class="banner-section">
  </section>
  <section class="post-content-section">
      <div class="container">
  
          <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 post-title-block">
                 
                  <h1 class="text-center">{{$noticia->titulo_noticia}}
                  </h1>

              </div>
           
  
      </div> <!-- /container -->
  </section>
  
        
@endforeach
@endsection