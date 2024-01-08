<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            body {
                font-family: 'Nunito', sans-serif;
                background-image: url("/assets/fondo.png");
                background-size: cover;
                background-position: center;
                background-attachment: fixed;

                }
        </style>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'FutNew') }}</title>
    </head>

    <body >

        <nav >
            <div >
                <div >
                    @guest
                    <button type="button" onClick=window.location.href='{{ url('/login') }}' >Login</button>
                    @endguest
                    @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" >LogOut</button>
                   
                    </form>
                    @if(Auth::check())
                    <div >
                        <a href="{{url('/user/')}}">
                            <img   src="{{asset(Auth::user()->picture) }}" alt="Descripción de la imagen">
                            <button>Botón</button>
                        </a>
                    </div>
                    @endif
                    
                    @endauth
                    
                    <button data-collapse-toggle="navbar-sticky" type="button"  aria-controls="navbar-sticky" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                    </button>
                </div>
                
            </div>
        </nav>

        <div>
            @yield('content')
        </div>





    </body>
</html>
