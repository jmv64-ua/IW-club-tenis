<!DOCTYPE html>
@extends('layout')

@section('content')
    <div style="font-family: 'Arial', sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">

        <header style="background-color: #333; color: #fff; text-align: center; padding: 1em 0;">
            <h1>Detalles de la Instalación</h1>
        </header>

        <section style="max-width: 600px; margin: 20px auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <p>Tipo: {{ $instalacion->tipo_instalacion }}</p>
            <p>Aforo: {{ $instalacion->aforo }}</p>
            
            @if($instalacion->urlphoto)
                <img src="{{ $instalacion->urlphoto }}" alt="{{ $instalacion->tipo_instalacion }}" style="max-width: 100%; height: auto; border-radius: 8px; margin-bottom: 15px;">
            @endif
            
            <a href="{{ route('instalaciones.index') }}" style="text-decoration: none; color: #007BFF; font-weight: bold; display: block; margin-top: 15px;">Volver a la lista de instalaciones</a>
        </section>

    </div>
@endsection
