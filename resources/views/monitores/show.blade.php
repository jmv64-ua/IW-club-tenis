@extends('layout')

@section('content')
    <h1>Detalles de {{ $monitor->name }}</h1>
    
    <p>Nombre: {{ $monitor->name }}</p>
    <p>Email: {{ $monitor->email }}</p>
    <!-- Agrega más detalles según tus necesidades -->

    <a href="{{ route('monitores.index') }}">Volver al listado de monitores</a>
@endsection