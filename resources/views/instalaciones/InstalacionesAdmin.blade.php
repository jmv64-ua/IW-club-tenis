@extends('layout')

@section('content')

<style>
    .container {
        position: relative;
        width: 100%;
        padding: 3%;
    }

    .image {
        width: 50%;
        height: auto;
        display: block;
    }
</style>
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
                <img class="image" class="image" src="{{ asset($instalacion->urlphoto) }}" alt="Descripción de la imagen">

                <form method="POST" action="{{ route('instalaciones.bloquear', $instalacion->id) }}">
                    @csrf
                    @method('PUT') {{-- Opcionalmente, puedes usar @method('PATCH') --}}
                    @if($instalacion->bloqueado)
                        <button class="btn btn-info" type="submit">Desbloquear Instalación</button>
                    @endif
                    @if(!$instalacion->bloqueado)
                        <button class="btn btn-danger" type="submit">bloquear Instalación</button>
                    @endif

                </form>
            </li>
        @endforeach
    </ul>
@endsection
