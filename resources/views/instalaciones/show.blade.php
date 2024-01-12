<!-- resources/views/instalaciones/show.blade.php -->

@extends('layout')

@section('content')
    <h1>Detalles de la Instalación</h1>
    
    <p>Tipo: {{ $instalacion->tipo_instalacion }}</p>
    <p>Aforo: {{ $instalacion->aforo }}</p>
    <!-- Agrega más detalles según tus necesidades -->

    <a href="{{ route('instalaciones.index') }}">Volver a la lista de instalaciones</a>
@endsection