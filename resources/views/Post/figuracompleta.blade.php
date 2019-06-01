@extends('layouts.app')

@section('content')
<section  style="background-size:cover; background-image:url('https://img1.goodfon.com/wallpaper/nbig/1/94/warhammer-40k-wh40k-varhammer.jpg'); color: white" class="jumbotron text-center">
    <div class="container">
        <div class="row">
    @foreach ($figuras as $figura)
    <div class="col-12">
    <h1 class="jumbotron-heading">{{$figura->nombre_figuras}}</h1>
    </div>
    {{-- <div class="col-6">
    <img src="/miniaturas/alianzas/chaos.png" height="50%" width="50%" />
</div> --}}
    @endforeach  
    </div>
    </div>
  </section>
  <div class="container">
      <div class="row">
            @foreach ($figuras as $figura)
          <div class="col-md-6 col-12">
          <img src="/miniaturas/{{$figura->minifoto}}" height="90%" width="90%" />          
           </div>
           <div class="mt-5 col-md-6 col-12" >
            <div class=""> 
                <h2 style="text-align:center">Perfil figura</h2>
                <div class="mt-5">
                <h4 class="p-2">Nombre: {{$figura->nombre_figuras}}</h4>
                <h4 class="p-2">Alianza: {{$figura->alianza_figuras}}</h4>
                <h4 class="p-2">Ejercito: {{$figura->ejercito_figuras}}</h4>
                <h4 class="p-2">Precio: {{$figura->precio_figuras}} €</h4>
                <a href="/normas/{{$figura->normas}}"> <button type="button" src="/normas/{{$figura->normas}}"class="btn btn-info"> <span class="fas fa-file-pdf" aria-hidden="true"> Ver ficha</span></button> </a>
    
            </div>
            </div>
            </div>
            <div class="col-md-12 col-12" style="text-align:center">
                    <div class="mt-2"> 
                        <h2>PINTURAS QUE NECESITAMOS</h2>
                    </div>
                    </div>
            <div class="col-md-12 col-12" style="text-align:center">
                    <div class="mt-2"> 
                            <h2>TUTORIAL PARA PINTARLOS</h2>
                        {{-- @foreach ($procedimiento as $procedimiento) --}}
                            {{-- <h4>{{$procedimiento->contenido_noticia}}</h4> --}}
                        {{-- @endforeach --}}
                    </div>
                    </div>
    
                @endforeach
           
        </div>
  </div>
</div>

@endsection