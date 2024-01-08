<!DOCTYPE html>
@extends('layout')

@section('content')

<div>
    @foreach($actividades as $actividad)
    <div class="card">
        <div>{{ $actividad->nombre}}</div>
    </div>
    @endforeach
</div>