<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
   
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css"> --}}
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" /> --}}
    <link href="{{ asset('css/jquery.dynatable.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{asset ('css/bootstrap.min.css')}}" rel="stylsheet">

    
    <style>
        .navbar{background:#222222;}
        .nav-item::after{content:'';display:block;width:0px;height:2px;background:#fec400;transition: 0.2s;}
        .nav-item:hover::after{width:100%;}
        .navbar-dark .navbar-nav .active > .nav-link, .navbar-dark .navbar-nav .nav-link.active, .navbar-dark .navbar-nav .nav-link.show, .navbar-dark .navbar-nav .show > .nav-link,.navbar-dark .navbar-nav .nav-link:focus, .navbar-dark .navbar-nav .nav-link:hover{color:#fec400;}
        .nav-link{padding:15px 5px;transition:0.2s;}
        .dropdown-item.active, .dropdown-item:active{color:#212529;}
        .dropdown-item:focus, .dropdown-item:hover{background:#fec400;}

</style>
</head>
<body style="background-size:cover; background-image:url('https://images8.alphacoders.com/868/868072.jpg')">
    <div id="">
          <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img class="m-0" height="80px" width="80px" src="/logosvg.svg" alt="">
                  </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                         
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        
                      
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
			@endguest
                        
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="/profile">
                                   Tú perfil
                                </a>
                                <a class="dropdown-item" href="/profile/datos">
                                    Ajustes 
                                </a>
                                @if(Auth::user()->admin==1)
                                <a class="dropdown-item" href="/add/figuras/">
                                    Añadir miniaturas 
                                </a>
                                <a class="dropdown-item" href="/add/pinturas">
                                    Añadir pinturas 
                                </a>
  				<li class="nav-item">
                                <a class="nav-link" href="/noticias/all">{{ __('Noticias') }}</a>
                            </li>
                            <li class="nav-item">
                                    <a class="nav-link" href="/figuras">{{ __('Figuras') }}</a>
                                </li>
                                @endif           
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                            </div>
                        </li>
                        
                        
                    </ul>
                </div>
            </div>
        </nav>
        <main class="">
            @yield('content')
        </main>
    </div>

    <script src="{{ asset('/js/bootstrap.min.js') }}" ></script>
    <script src="{{ asset('/js/jquery-3.4.1.min.js') }}"></script>
    <script type="text/javascript" src="/js/jquery.dynatable.js"></script>   
    {{-- <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> --}}
    <script src="{{ asset('/js/popper.min.js') }}" ></script>
    <script src="{{ asset('/js/app.js') }}" ></script> 
</body>
</html>
