<!DOCTYPE html>
@extends('layout')

@section('content')
<style>
    .container {
        position: relative;
        width: 100%;
        padding: 3%;
    }

    .text-overlay {
        position: absolute;
        top: 20%;
        left: 40%;
        transform: translate(-50%, -50%);
        color: white;
        text-align: center;
    }
    .button-overlay {
        position: absolute;
        top: 80%;
        left: 50%;
        transform: translate(-50%, -50%);
        color: white;
        text-align: center;
    }

    .image {
        width: 100%;
        height: auto;
        display: block;
    }
</style>
<div>
    @foreach($actividades as $actividad)
    <div class="container">
        <img class="image" src="{{ asset($actividad->urlphoto) }}" alt="Descripción de la imagen">
        <div class="text-overlay">
            <h1>{{$actividad->nombre}}</h1>
            <p>{{$actividad->descripcion}}</p>
        </div>
        <div class="button-overlay">
            <a class="btn btn-info" href="{{ route('Actividad', $actividad->id) }}">Detalles<a>
        </div>
    </div>
    @endforeach
</div>


@endsection