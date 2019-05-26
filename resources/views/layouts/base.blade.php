<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Laravel</title>
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">    
    </head>
    <body>
        <!--NAVBAR-->
       {{-- <nav class="navbar fixed-top navbar-light bg-light">
           <p>hola<p>
       </nav> --}}
        <!--FIN NAVBAR-->
        @yield('content')
        <!--SCRIPTS-->
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/popper.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
