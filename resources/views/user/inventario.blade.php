@extends('layouts.app')
@section('content')
<div style=" border-bottom:1px solid black ; background-size: cover; background-image: url('perfiles/{{Auth::user()->banner}}')"
  class="col-12">
  <div class="row">
      <div class="col-12 col-md-2">
          <img class="m-4 " style="height:20vh; width:25vh; border-radius:50%"
              src="/perfiles/{{Auth::user()->avatar}}" />
              <div class="dropdown">
                  <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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

<div class="col-12 m-4">
        <div class="row">
            <div class="col-12 mt-5 ">
                <h2 style="text-align:center">INVENTARIO</h2>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6 mb-5">
                    <h1 style="text-align:center">Lista de pinturas</h1>
                    <table class="table">
                            <thead>
                              <tr>
                                  <th scope="col">Nombre pintura</th>
                                  <th scope="col">Tipo pintura</th>
                                  <th scope="col">Color</th>
                                </tr>
                            
                             
                            </thead>
                            <tbody>
                                @foreach ($pinturas as $pintura)

                                 <tr>
                                 <td id="nombre">{{$pintura->nombre_pintura}}</td>
                                 <td id="tipo">{{$pintura->tipo_pintura}}</td>
                                 <td id="{{$pintura->color}}" style="background-color:{{$pintura->color}}"></td>
                                 <td><button data-id="{{$pintura->id_pintura}}" id="Añadirinventario">Añadir</button></td>  
                                </tr>
                                @endforeach
                            </tbody>
                          </table>
            </div>
            <div class="col-12 col-md-6">
                    <h1 style="text-align:center">Pinturas en el inventario</h1>
                    <table id="TableInventario" class="table">
                            <thead>
                              <tr>
                                  <th scope="col">Nombre pintura</th>
                                  <th scope="col">Tipo pintura</th>
                                  <th scope="col">Color</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($inventario as $inventario)
                              <tr id="{{$inventario->id}}">
                                  <td>{{$inventario->nombre_pintura}}</td>
                                  <td>{{$inventario->tipo_pintura}}</td>
                                  <td style="background-color:{{$inventario->color}}"></td>
                                  <td><button data-id="{{$inventario->id}}" id="Eliminarinventario">Eliminar</button></td>  
                                </tr> 
                              @endforeach
                            </tbody>
                          </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection