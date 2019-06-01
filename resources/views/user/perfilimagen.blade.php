@extends('layouts.app')

@section('content')
<div style=" border-bottom:1px solid black ; background-size: cover; background-image: url('/noticias/1559037403portada.jpg')"
class="col-12">
<div class="row">
    <div class="col-12 col-md-2">
        <img class="m-4 " style="height:20vh; width:25vh; border-radius:50%"
            src="/noticias/1559037403portada.jpg" />
            <div class="dropdown">
                <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 Ajustes
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">Datos de la cuenta</a>
                  <a class="dropdown-item" href="/profile/cambiarimage">Cambiar imagen</a>
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
<div class="col-12 m-4">
    <div class="row">
        <div class="col-12 mt-5 ">
            <h2 style="text-align:center">CAMBIO DE IMAGEN</h2>
        </div>
    </div>
</div>

@endsection