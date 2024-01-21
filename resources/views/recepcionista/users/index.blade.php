@extends('layout')

@section('content')
    <h1>Lista de Usuarios</h1>

    <a href="{{ route('recepcionista.users.create') }}" class="btn btn-primary mb-3">Dar de alta Usuario</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>

                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
