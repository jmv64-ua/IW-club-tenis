@extends('layout')

@section('content')
    <h1>Lista de Instalaciones</h1>
    <a href="{{ route('admin.instalaciones.create') }}" class="btn btn-primary">Crear Instalación</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo de instalación</th>
                <th>Aforo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($instalaciones as $instalacion)
                <tr>
                    <td>{{ $instalacion->id }}</td>
                    <td>{{ $instalacion->tipo_instalacion }}</td>
                    <td>{{ $instalacion->aforo }}</td>
                    <td>
                        <a href="{{ route('admin.instalaciones.show', $instalacion->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('admin.instalaciones.edit', $instalacion->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('admin.instalaciones.destroy', $instalacion->id) }}" method="post" style="display:inline">
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
