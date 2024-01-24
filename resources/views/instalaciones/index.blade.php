<!DOCTYPE html>
@extends('layout')

@section('content')
    <div style="font-family: 'Arial', sans-serif; background-color: #f4f4f4; margin: 0; padding: 0;">

        <header style="background-color: #333; color: #fff; text-align: center; padding: 1em 0;">
            <h1>Lista de Instalaciones</h1>
        </header>

        <section style="max-width: 800px; margin: 20px auto; background-color: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
            <ul style="list-style-type: none; padding: 0;">

                @foreach($instalaciones as $instalacion)
                    <li style="margin-bottom: 10px;">
                        <a href="{{ route('instalaciones.show', $instalacion->id) }}" style="text-decoration: none; color: #007BFF; font-weight: bold; display: block; padding: 10px; border: 1px solid #ddd; border-radius: 8px; overflow: hidden;">
                            <h2>{{ $instalacion->tipo_instalacion }}</h2>
                            <img src="{{ $instalacion->urlphoto }}" alt="{{ $instalacion->tipo_instalacion }}" style="max-width: 100%; height: auto; border-radius: 8px;">
                            <p>Aforo: {{ $instalacion->aforo }}</p>
                        </a>
                    </li>
                @endforeach

            </ul>
        </section>

    </div>
@endsection
