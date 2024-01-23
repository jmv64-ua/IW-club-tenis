@extends('layout')

@section('content')
    <h1>Lista de Usuarios</h1>
    <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Crear Usuario</a>
    
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('admin.users.show', $user->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                        </form>
                        @if(!$user->Validado)
                            <a href="{{ route('admin.users.validate', $user->id) }}" class="btn btn-primary">Validar</a>
                        @endif
                        <a href="{{ route('admin.users.bloquear', $user->id) }}" class="btn btn-warning">
                            @if(!$user->bloqueado)
                                Bloquear
                            @else
                                Desbloquear
                            @endif
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
