<!DOCTYPE html>
@extends('layout')

@section('content')
    <div>
        <div class="col">
            <h2>Listado de monitores</h2>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <table class="table">
                <thead>
                    <tr>
                        <th>Foto</th>
                        <th>Nombre</th>
                        <th>Resumen</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($monitores as $monitor)
                        <tr>
                            <td>
                                <img class="image" src="{{ asset($monitor->urlphoto) }}" alt="Foto del monitor">
                            </td>
                            <td>{{ $monitor->name }}</td>
                            <td>{{ $monitor->resumen }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('monitores.show', $monitor->id) }}">Ver detalles</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

<style>
    .image {
        border-radius: 50%;
        max-width: 14%;
        max-height: 14%;
    }
</style>
@endsection
