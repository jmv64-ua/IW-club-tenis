@extends('layout')

@section('content')
    <h1>Lista de Actividades</h1>
    <a href="{{ route('admin.actividades.create') }}" class="btn btn-primary">Crear Actividad</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Fin</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($actividades as $actividad)
                <tr>
                    <td>{{ $actividad->id }}</td>
                    <td>{{ $actividad->nombre }}</td>
                    <td>{{ $actividad->fechaI }}</td>
                    <td>{{ $actividad->fechaFin }}</td>
                    <td>
                        <a href="{{ route('admin.actividades.show', $actividad->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('admin.actividades.edit', $actividad->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('admin.actividades.destroy', $actividad->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
