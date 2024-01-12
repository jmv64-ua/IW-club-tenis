@extends('layout')

@section('content')
    <h1>Lista de Usuarios</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('admin.users.show', $user->id) }}">Ver</a>
                        <a href="{{ route('admin.users.edit', $user->id) }}">Editar</a>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No hay usuarios registrados.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <a href="{{ route('admin.users.create') }}">Crear nuevo usuario</a>
@endsection
