@extends('layouts.registro')

@section('content')
<section style="background-size:cover; background-image:url('https://images2.alphacoders.com/204/204300.jpg'); color: white"class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Añadir noticia</h1>
    </div>
  </section>
  <div class="container">
      <div class="row">
          <div class="col-12">
                {!! Form::open(array('url' => 'noticias/add/new', 'files' => true, 'method' => 'POST')) !!}
                <div class="form-group">
                    {{form::hidden('id_usuario',Auth::user()->id)}}
                    {{form::label('titulo_noticia','Titulo noticia'),['class'=>' mt-4']}}
                    {{form::text('titulo_noticia','',['class' =>'form-control', 'placeholder' => 'Escribe el titulo de la noticia'])}}
                </div>
                <div class="form-group">
    
                    {{form::label('subtitulo_noticia','Subtitulo'),['class'=>' mt-4']}}
                    {{form::text('subtitulo_noticia','',['class' =>'form-control', 'placeholder' => 'Añade un pequeño resumen de la noticia'])}}
                </div>
                <div class="form-group">
    
                        {{form::label('portada_imagen','Imagen de portada'),['class'=>' mt-4']}}
                        {{form::file('portada_imagen')}}
                    </div>
                <div class="form-group">
    
                    {{form::label('contenido_noticia','Escribe el contenido'),['class'=>' mt-4']}}
                    {{form::textarea('contenido_noticia','',['class' =>'form-control', 'placeholder' => 'Nombre del ejercito'])}}
                </div>
                <div class="form-group">
    
                        {{form::label('imagen_contenido_noticia','Foto noticia'),['class'=>' mt-4']}}
                        {{form::file('imagen_contenido_noticia')}}

                    </div>
                    
                <div class="form-group">
    
                        {{form::label('pie_de_imagen_noticia','Escribe el contenido'),['class'=>' mt-4']}}
                        {{form::text('pie_de_imagen_noticia','',['class' =>'form-control', 'placeholder' => 'Nombre del ejercito'])}}
                    
                </div>
                        {{form::submit('Añadir noticia', ['class' => 'btn-primary btn-lg mt-4 mb-4'])}}

                {!! Form::close() !!}
          </div>
      </div>
  </div>
@endsection