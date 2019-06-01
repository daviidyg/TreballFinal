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
		<div class="container">
			<div class="row">
				<div class="col-12 mt-5">	
					<h1 style="text-align: center">AJUSTES</h1>
				</div>
			</div>
		</div>
      </div>
    </div>
@endsection