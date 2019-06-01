@extends('layouts.app')

@section('content')
<div style=" border-bottom:1px solid black ; background-size: cover; background-image: url('perfiles/{{Auth::user()->banner}}')"
    class="col-12">
    <div class="row">
        <div class="col-12 col-md-2">
            <img class="m-4 " style="height:20vh; width:25vh; border-radius:50%"
                src="/perfiles/{{Auth::user()->avatar}}" />
                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     Ajustes
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" href="/profile/datos">Datos de la cuenta</a>
                      <a class="dropdown-item" href="/profile/inventario">Inventario</a>
                    </div>
                  </div>
            </div>
            <div style="color:white" class="col-12 col-md-10 mt-5">
            <h1>{{Auth::user()->name}}</h1>
            <h5>{{Auth::user()->email}}</h5>
            </div>
        </div>
</div>

<div>
<div class="col-12 m-4">
    <div class="row">
        <div class="col-12 mt-5 ">
            <h2 style="text-align:center">DATOS DE LA CUENTA</h2>
        </div>
    </div>
</div>

<div class="container " style="background-color:white">
    <div class="row">
        <div class="col-6">
              {!! Form::open(array('url' => 'profile/datos/edit', 'files' => true, 'method' => 'POST')) !!}
              <div class="form-group">
                  {{form::label('nombre_usuario','Nombre de usuario'),['class'=>' mt-4']}}
                  {{form::text('nombre_usuario','',['class' =>'form-control', 'placeholder' => Auth::user()->name])}}
              </div>
              <div class="form-group">
                {{form::label('correo_electronico','Nombre de usuario'),['class'=>' mt-4']}}
                {{form::text('correo_electronico','',['class' =>'form-control', 'placeholder' => Auth::user()->email])}}
              </div>        
              {{form::submit('Editar información', ['class' => 'btn-primary btn-lg mt-4 mb-4'])}}

              {!! Form::close() !!}
        </div>
        <div class="col-6">
                  {!! Form::open(array('url' => 'profile/datos/fotos', 'files' => true, 'method' => 'POST')) !!}
                  <div class="form-group col-6 ">
                      {{form::label('image_perfil','Foto perfil'),['class'=>' mt-4']}}
                      {{form::file('image_perfil')}}
                  </div>
                  <div class="form-group col-6">
                      {{form::label('image_banner','Foto banner'),['class'=>' mt-4']}}
                      {{form::file('image_banner')}}
                  </div>        
                  {{form::submit('Subir imagenes', ['class' => 'btn-primary btn-lg mt-4 mb-4'])}}

                  {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
</div>
@endsection