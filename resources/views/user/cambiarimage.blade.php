@extends('layouts.app')

@section('section')
<div style=" border-bottom:1px solid black ; background-size: cover; background-image: url('/noticias/1559037403portada.jpg')"
class="col-12">
<div class="row">
    <div class="col-12 col-md-2">
        <img class="m-4 " style="height:20vh; width:25vh; border-radius:50%"
            src="/noticias/1559037403portada.jpg" />
        </div>

            <div style="color:white" class="col-12 col-md-10 mt-5">
        <h1>{{Auth::user()->name}}</h1>
        <h5>{{Auth::user()->email}}</h5>
    </div>
</div>
</div>
@endsection