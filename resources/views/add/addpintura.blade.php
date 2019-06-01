@extends('layouts.registro')
@section('content')
<div class="container mt-4 mb-3" style="background-color:white">
    <div class="row">
        <div class="col-12">
        <h1 class="mt-5" style="text-align:center">Añadir pinturas </h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
            <form id = 'addpintura' method="post" action="{{ route('pinturas.store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label for="exampleInputEmail1">Nombre pintura</label>
                      <input type="text" class="form-control" name="nombre_pintura" placeholder="Ejemplo: Abbadon Black">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tipo pintura</label>
                        <input type="text" class="form-control" name="tipo_pintura" placeholder="(Base, layer...)">
                    </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Precio pintura</label>
                        <input type="number"  step="any"  class="form-control" name="precio" placeholder="(Número decimal (ejemplo: 3.60) )">
                        
                    </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Color pintura</label>
                        <input type="text" class="form-control" name="color" placeholder="Ejemplo: #000000 (Negro)">
                    </div>
                    <button type="submit" class="mt-5 mb-4 btn btn-primary btn-lg btn-block">Añadir pintura</button>
                </form>
                <div class="container">
                        <div class="row">
                            <div class="col-12">
                                    <table id="table_id" class="display table">
                                            <thead>
                                                <tr>
                                                    <th>Nombre </th>
                                                    <th>Tipo</th>
                                                    <th>Precio</th>
                                                    <th>Color</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    @foreach ($pintura as $pintura)
                                                    <tr id="{{$pintura->id_pintura}}">
                                                    <td>{{$pintura->nombre_pintura}}</td>
                                                    <td>{{$pintura->tipo_pintura}}</td>
                                                    <td>{{$pintura->precio}}</td>
                                                    <td>{{$pintura->color}}</td>
                                                    <td><button data-id="{{$pintura->id_pintura}}" id="EliminarPintura" type="submit"><i class="fas fa-times"></i></button></td>
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