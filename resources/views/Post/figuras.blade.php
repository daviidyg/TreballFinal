@extends('layouts.app')

@section('content')
<main role="main">
        <section  style="background-size:cover; background-image:url('https://img1.goodfon.com/wallpaper/nbig/1/94/warhammer-40k-wh40k-varhammer.jpg'); color: white" class="jumbotron text-center">
          <div class="container">
            <h1 class="jumbotron-heading">Portal de pintura</h1>
            </div>
        </section>
      
        <div class="album py-5 bg-light">
          <div class="container">
      
            <div class="row">
              @foreach ($figura as $figura)
                  
              <div class="col-md-4">
                <div class="card mb-4 shadow-sm">
                <img class="bd-placeholder-img card-img-top" width="100%" height="300" src="{{URL::asset('/miniaturas/'.$figura->minifoto)}}"/>
                  <div class="card-body">
                  <p class="card-text">Nombre: {{$figura->nombre_figuras}}</p>
                  <p class="card-text">Alianza: {{$figura->alianza_figuras}}</p>
                  <p class="card-text">Ejercito: {{$figura->ejercito_figuras}}</p>

                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                      <a href="/figuras/all/{{$figura->id_figuras}}" class="btn btn-primary">Ver</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              @endforeach

            </div>
          </div>
        </div>
      
      </main>
      
@endsection