<!DOCTYPE html>
@extends('layout')

@section('content')
    <div>
        <div class="col">
            <h2>Listado de usuarios extensivo</h2>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th>Validado</th>
                        <th>Bloqueado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->name }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->rol }}</td>
                            <td>{{ $usuario->Validado }}</td>
                            <td>{{ $usuario->bloqueado }}</td>
                            @if(!$usuario->Validado)
                                <td>
                                    <a class="btn btn-primary" href="{{ route('admin.users.validar', $usuario->id) }}">Validar</a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection