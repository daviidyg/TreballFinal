@extends('layouts.registro')
@section('scripts')
@endsection
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">

<div class="container mt-4 mb-3" style="background-color:white">
    <div class="row">
        <div class="col-12">
            <h1 class="mt-5" style="text-align:center">Añadir miniatura </h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {!! Form::open(['action' => 'FigurasController@store', 'method' => 'POST']) !!}
            <div class="form-group">
                {{form::label('nombre_figuras','Nombre Figura'),['class'=>' mt-4']}}
                {{form::text('nombre_figuras','',['class' =>'form-control', 'placeholder' => 'Nombre de la figura'])}}
            </div>
            <div class="form-group">

                {{form::label('alianza_figuras','Alianza'),['class'=>' mt-4']}}
                {{form::text('alianza_figuras','',['class' =>'form-control', 'placeholder' => 'Selecciona su alianza'])}}
            </div>

            <div class="form-group">

                {{form::label('ejercito_figuras','Ejercito'),['class'=>' mt-4']}}
                {{form::text('ejercito_figuras','',['class' =>'form-control', 'placeholder' => 'Nombre del ejercito'])}}
            </div>

            <div class="form-group">

                {{form::label('precio_figuras','Precio'),['class'=>' mt-4']}}
                {{form::text('precio_figuras','',['class' =>'form-control', 'placeholder' => '  miniatura'])}}
                {{form::submit('Añadir figura', ['class' => 'btn-primary btn-lg mt-4 mb-4'])}}
            </div>

            {!! Form::close() !!}
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <table id="test" class="display table">
                        <thead>
                            <tr>
                                <th>Nombre </th>
                                <th>Alianza</th>
                                <th>Ejercito</th>
                                <th>Precio</th>
                                <th>Imagen</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($figuras as $figura)
                            @if ($figura ? $figura : '')
                            <tr id="{{$figura->id_figuras}}">
                                <td>{{$figura->nombre_figuras}}</td>
                                <td>{{$figura->alianza_figuras}}</td>
                                <td>{{$figura->ejercito_figuras}}</td>
                                <td>{{$figura->precio_figuras}} €</td>
                                <td>{{$figura->minifoto}}</td>
                                <td>
                                    <button data-toggle="modal" data-target=".bd-example-modal-lg" class="edit"><i
                                            class="fas fa-palette"></i></button>
                                    <button data-id="{{$figura->id_figuras}}" data-toggle="modal" id="EditarMiniatura"
                                        data-target="#EditarMiniatura"><i class="fas fa-pencil-alt"></i></button>
                                    
                                    <button  data-id="{{$figura->id_figuras}}" data-toggle="modal" data-target="#pdf" class="edit" id="btn-pdf"
                                        type="submit"><i class="fas fa-file-upload"></i></button>
                                        <button data-id="{{$figura->id_figuras}}"  data-toggle="modal" data-target="#Procedimiento" class="edit" id="btn-pdf"
                                        type="submit"><i class="fas fa-font"></i></button>
                                        <button data-id="{{$figura->id_figuras}}" id="Eliminarminiatura" type="submit"><i
                                            class="fas fa-times"></i></button>
                                </td>
                            </tr>
                            <!-- Modal -->
<div class="modal fade" id="Procedimiento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Procedimiento</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                    {!! Form::open(array('url' => 'add/figuras/procedimiento/', 'enctype' => 'multipart/form-data')) !!}
                    <div class="form-group">

                            {{Form::label('procedmiento','Explica como puedes pintarla')}}
                            {{form::textarea('procedmiento','',['class' =>'form-control', 'placeholder' => ''])}}
                        </div>
                    {{form::submit('Añadir Procedimiento', ['class' => 'btn-danger btn'])}}
                    {!! Form::close() !!}
                </div>
             </div>
        </div>
      </div>
      <div class="modal fade" id="Procedimiento" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Procedimiento</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                        {!! Form::open(array('url' => 'add/figuras/procedimiento/', 'enctype' => 'multipart/form-data')) !!}
                        <div class="form-group">
    
                                {{Form::label('procedmiento','Explica como puedes pintarla')}}
                                {{form::textarea('procedmiento','',['class' =>'form-control', 'placeholder' => ''])}}
                            </div>
                        {{form::submit('Añadir Procedimiento', ['class' => 'btn-danger btn'])}}
                        {!! Form::close() !!}
                    </div>
                 </div>
            </div>
          </div>
                            <!-- Modal -->
                            <div class="modal fade" id="pdf" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Subir PDF</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                                {!! Form::open(array('url' => 'add/figuras/pdf/upload/', 'enctype' => 'multipart/form-data')) !!}
                                                <div class="form-group">
                                                        {{Form::label('normativaspdf','PDF Figura')}}
                                                        {{Form::file('normativaspdf')}}
                                                    </div>
                                                {{form::submit('Subir archivo', ['class' => 'SubirPDF btn-danger btn'])}}
                                                {!! Form::close() !!}

                                        </div> 
                                    </div>
                                </div>
                            </div>
</div>
{{-- <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
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
                                              <tr id="">
                                                  <td></td>
                                                  <td></td>
                                                  <td style="background-color:"></td>
                                                  <td><button data-id="" id="Eliminarinventario">Eliminar</button></td>  
                                                </tr> 
                                            </tbody>
                                          </table>
                            </div>        </div>
    </div>
</div> --}}

{{-- ACABA 1 MODAL --}}
{{-- MODAL 2 --}}
<!-- Modal -->
<div class="modal fade" id="EditarMiniatura" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar miniatura</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                {!! Form::open(array('url' => 'add/figuras/update/', 'enctype' => 'multipart/form-data')) !!}
                {{Form::hidden('_method','POST')}}
                <div class="form-group">
                    {{Form::hidden('id','', ['class' => 'id'])}}                    {{Form::label('Nombre','Nombre miniatura')}}
                    {{Form::text('Nombre',$figura->nombre_figuras,['class' => 'form-control Nombre'])}}
                </div>
                <div class="form-group">
                    {{Form::label('Alianza','Alianza')}}
                    {{Form::text('Alianza',$figura->alianza_figuras,['class' => 'form-control Alianza'])}}
                </div>
                <div class="form-group">
                    {{Form::label('Ejercito','Ejercito')}}
                    {{Form::text('Ejercito',$figura->ejercito_figuras,['class' => 'form-control Ejercito'])}}
                </div>
                <div class="form-group">
                    {{Form::label('Precio','Precio')}}
                    {{Form::text('Precio',$figura->precio_figuras,['class' => 'form-control Precio' ])}}
                </div>
                <div class="form-group">
                    {{Form::label('minifoto','Foto miniatura')}}
                    {{Form::file('minifoto')}}
                </div>
                <div class="mb-3">
                    {{form::submit('Editar', ['class' => 'btn-danger btn'])}}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endif
@endforeach

</tbody>
</table>
</div>
</div>
</div>


</div>
</div>

@endsection