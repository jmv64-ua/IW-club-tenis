<!DOCTYPE html>
@extends('layout')

@section('content')
    <h1>Lista de Monitores</h1>
    
    <ul>
        @foreach($monitores as $monitor)
            <li><a href="{{ route('monitores.show', $monitor->id) }}">{{ $monitor->name }}</a></li>
        @endforeach
    </ul>
@endsection
