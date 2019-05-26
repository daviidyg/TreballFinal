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
        <div style=" border-bottom:1px solid black ; background-size: cover; background-image: url('/miniaturas/155868951922.jpg')"
            class="col-12">
            <div class="row">
                <div class="col-12 col-md-2">
                    <img class="m-4 " style="height:20vh; width:25vh; border-radius:50%"
                        src="/miniaturas/1558686776.jpg" />
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
                    <h2 style="text-align:center">INVENTARIO</h2><a class="fas fa-plus"></a>
                </div>
                <div class="d-flex justify-content-center col-12 mt-5 mb-5">
                                <form class="form-inline">
                                  <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                  <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                                </form>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 mb-5">
                        <h1 style="text-align:center">Pinturas en el inventario</h1>
                        <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                  </tr>
                                </tbody>
                              </table>
                </div>
                <div class="col-12 col-md-6">
                        <h1 style="text-align:center">Lista de pinturas</h1>
                        <table class="table">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                  </tr>
                                </tbody>
                              </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection