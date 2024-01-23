@extends('layout')

@section('content')
    <h1>Detalles de la instalación {{ $instalacion->id }}</h1>
    
    <p><strong>ID:</strong> {{ $instalacion->id }}</p>
    <p><strong>Tipo de instalacion:</strong> {{ $instalacion->tipo_instalacion }}</p>
    <p><strong>Aforo:</strong> {{ $instalacion->aforo }}</p>

    <p><strong>Bloqueada:</strong> {{ $instalacion->bloqueada ? 'Sí' : 'No' }}</p>

    <a href="{{ route('admin.instalaciones.index') }}" class="btn btn-primary">Volver</a>
@endsection
