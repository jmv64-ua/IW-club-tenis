<!DOCTYPE html>
@extends('layout')

@section('content')
    <h1>Lista de Instalaciones</h1>
    
    <ul>
        @foreach($instalaciones as $instalacion)
            <li><a href="{{ route('instalaciones.show', $instalacion->id) }}">{{ $instalacion->tipo_instalacion }}</a></li>
        @endforeach
    </ul>
@endsection
