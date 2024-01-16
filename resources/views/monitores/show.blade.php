@extends('layout')

@section('content')
    <h2>Información sobre {{ $monitor->name }}</h2>
    
    <p>{{ $monitor->descripcion }}</p>
    
    <p>
        <h2>Información extra</h2>
    </p>
    <p>Email: {{ $monitor->email }}</p>

    <a class="btn btn-primary" href="{{ route('monitores.index') }}">Volver al listado</a>

<style>
    .image {
        border-radius: 50%;
        max-width: 20%;
        max-height: 20%;
    }
</style>
@endsection