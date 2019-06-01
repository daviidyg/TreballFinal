@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        @if ($message = Session::get('success'))

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

            <strong>{{ $message }}</strong>

        </div>

        @endif

        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    <div style=" border-bottom:1px solid black ; background-size: cover; background-image: url('perfiles/{{Auth::user()->banner}}')"
            class="col-12">
            <div class="row">
                <div class="col-12 col-md-2">
                    <img class="m-4 " style="height:20vh; width:25vh; border-radius:50%"
                        src="perfiles/{{Auth::user()->avatar}}" />
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
       
        <div class="col-12 mt-3 mb-5">
            <div class="row">
                <div class="col-12 mt-5 ">
                    <h2 style="text-align:center">INVENTARIO</h2>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                        <table id="TableInventario" class="table">
                                <thead>
                                  <tr>
                                      <th scope="col">Nombre pintura</th>
                                      <th scope="col">Tipo pintura</th>
                                      <th scope="col">Color</th>
                                      <th scope="col">Precio</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach($inventario as $inventario)
                                  <tr id="{{$inventario->id}}">
                                      <td>{{$inventario->nombre_pintura}}</td>
                                      <td>{{$inventario->tipo_pintura}}</td>
                                      <td style="background-color:{{$inventario->color}}"></td>
                                      <td>{{$inventario->precio}}</td>
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