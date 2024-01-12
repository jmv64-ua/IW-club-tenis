<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>{{ config('app.name', 'FutNew') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Styles -->
    <style>
        body {
            margin-top: 20px;
            font-family: 'Nunito', sans-serif;
            background-image: url("/assets/fondo.png");
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        .navbar {
            background-color: #6eece8; /* Cambia el color de fondo de la barra de navegación según tus preferencias */
        }

        .navbar img {
            max-width: 40px; /* Establece un ancho máximo para la imagen del usuario en la barra de navegación */
            border-radius: 50%; /* Añade un borde redondeado a la imagen del usuario */
            margin-right: 10px; /* Añade un margen derecho para separar la imagen del botón */
        }
    </style>

    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">FutNew</a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-sticky" aria-controls="navbar-sticky" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbar-sticky">
                <ul class="navbar-nav ml-auto">
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login') }}">Login</a>
                        </li>
                    @endguest

                    @auth
                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-link">Logout</button>
                            </form>
                        </li>

                        @if(Auth::check())
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/user/') }}">
                                    <img src="{{ asset(Auth::user()->picture) }}" alt="User Image">
                                    <button class="btn btn-link">Profile</button>
                                </a>
                            </li>
                        @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS (popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
