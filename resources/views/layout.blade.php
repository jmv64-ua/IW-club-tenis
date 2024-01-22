<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>{{ config('app.name', 'FutNew') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&display=swap" rel="stylesheet">

    <link href="{{ asset('css/styles-welcome.css') }}" rel="stylesheet">


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

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 700;
            color: #fff; /* Cambiado el color del texto a blanco */
        }

        .navbar {
        background-color: #155724; /* Cambia el color de fondo de la barra de navegación según tus preferencias */
        }

        .navbar img {
            max-width: 40px;
            border-radius: 50%;
            margin-right: 10px;
        }

        .navbar-nav .nav-link {
            color: #fff; /* Cambiado el color del texto a blanco */
        }

        .navbar-toggler-icon {
            background-color: #fff; /* Cambiado el color del ícono del botón de navegación a blanco */
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

            <div class="collapse navbar-collapse justify-content-end" id="navbar-sticky">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/monitores') }}">Monitores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/actividades') }}">Actividades</a>
                    </li>

                    <li class="nav-item">
                        @if(auth()->check())
                            <a class="nav-link" href="{{ url('/reservas/' . auth()->user()->id) }}">Mis reservas</a>
                        @endif
                    </li>

                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/login') }}">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/register') }}">Register</a>
                        </li>
                    @endguest

                    @auth
                    @if(Auth::user()->rol == 'administrador')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.users.index') }}">CRUD Usuarios</a>
                        </li>
                    @endif
                        @if(Auth::check())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" id="userDropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @if(Auth::check())
                                    <img src="{{ asset(Auth::user()->urlphoto) }}" alt="User Image" class="rounded-circle" width="30" height="30">
                                @endif
                            </a>
                            <div class="dropdown-menu" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ url('/user/') }}">
                                    Ver Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </div>
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
    @stack('scripts')

    <!-- Bootstrap JS (popper.js included) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
