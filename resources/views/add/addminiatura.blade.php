@extends('layouts.registro')

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
                    <table id="table_id" class="display table">
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
                            <tr>
                                <td>{{$figura->nombre_figuras}}</td>
                                <td>{{$figura->alianza_figuras}}</td>
                                <td>{{$figura->ejercito_figuras}}</td>
                                <td>{{$figura->precio_figuras}} €</td>
                                <td>{{$figura->minifoto}}</td>
                                <td>
                                    <div class="m-0">
                                        <button data-toggle="modal" data-target="#exampleModal" class="edit"><i
                                                class="fas fa-palette"></i></button>
                                        <button data-toggle="modal" data-target="#EditarMiniatura"><i
                                                class="fas fa-pencil-alt"></i></button>
                                        {{ Form::open(array('url' => 'add/figuras/delete/' . $figura->id_figuras, 'class' => 'pull-right')) }}
                                        {{ Form::hidden('_method', 'DELETE')     }}
                                        <button type="submit"><i class="fas fa-times"></i></button>
                                        {{ Form::close() }}
                                    </div>
                                </td>
                            </tr>
                            {{-- MODAL --}}
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Añadir Pintura</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/test/pintura" method="post">
                                                <select class="selectpicker" multiple  data-live-search="true">
                                                    @foreach ($pinturas as $pintura)        
                                                    <option data-tokens="{{$pintura->id_pintura}}">{{$pintura->nombre_pintura}}</option>
                                                    @endforeach
                                            </select>
                                            <button type="submit">Añadir pintura</button>
                                        </form>                                                           
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            {{-- ACABA 1 MODAL --}}
                            {{-- MODAL 2 --}}
                            <!-- Modal -->
                            <div class="modal fade" id="EditarMiniatura" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Editar miniatura</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                                {!! Form::open(array('url' => 'add/figuras/edit/'.$figura->id_figuras, 'enctype' => 'multipart/form-data')) !!}
                                                {{Form::hidden('_method','POST')}}
                                                    <div class="form-group">
                                                        {{Form::label('Nombre','Nombre miniatura')}}
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