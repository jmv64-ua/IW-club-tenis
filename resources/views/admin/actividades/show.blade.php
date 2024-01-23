@extends('layout')

@section('content')
    <h1>Detalles de la actividad {{ $actividad->nombre }}</h1>
    
    <p><strong>ID:</strong> {{ $actividad->id }}</p>
    <p><strong>Nombre:</strong> {{ $actividad->nombre }}</p>
    <p><strong>Instalación:</strong> {{ $actividad->instalacion_id }}</p>
    <p><strong>Monitor:</strong> {{ $actividad->user_id }}</p>
    <p><strong>Precio:</strong> {{ $actividad->precio }}</p>
    <p><strong>Descripción:</strong> {{ $actividad->descripcion }}</p>
    <p><strong>Fecha de Inicio:</strong> {{ $actividad->fechaI }}</p>
    <p><strong>Fecha de Fin:</strong> {{ $actividad->fechaFin }}</p>

    <a href="{{ route('admin.actividades.index') }}" class="btn btn-primary">Volver</a>
@endsection
