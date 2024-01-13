@extends('layout')

@section('content')
    <h1>Lista de Instalaciones</h1>

    {{-- Mensajes de éxito --}}
    @if(session('mensaje'))
        <div class="alert alert-success">
            {{ session('mensaje') }}
        </div>
    @endif

    {{-- Mensajes de error --}}
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    
    <ul>
        @foreach($instalaciones as $instalacion)
            <li>
                <a href="{{ route('instalaciones.show', $instalacion->id) }}">{{ $instalacion->tipo_instalacion }}</a>
                <img class="image" src="{{ asset($instalacion->urlphoto) }}" alt="Descripción de la imagen">

                <form method="POST" action="{{ route('instalaciones.bloquear', $instalacion->id) }}">
                    @csrf
                    @method('PUT') {{-- Opcionalmente, puedes usar @method('PATCH') --}}
                    @if($instalacion->bloqueado)
                        <button type="submit">Bloquear Instalación</button>
                    @endif
                    @if(!$instalacion->bloqueado)
                        <button type="submit">Desbloquear Instalación</button>
                    @endif

                </form>
            </li>
        @endforeach
    </ul>
@endsection
