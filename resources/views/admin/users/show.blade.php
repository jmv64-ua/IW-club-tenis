@extends('layout')

@section('content')
    <h1>Detalles de Usuario</h1>
    
    <p>ID: {{ $user->id }}</p>
    <p>Nombre: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
    <p>Saldo: {{ $user->saldo }}</p>
    <p>Dirección: {{ $user->direccion }}</p>
    <p>Código Postal: {{ $user->codigo_postal }}</p>
    <p>Teléfono: {{ $user->telefono }}</p>
    
    <a href="{{ route('admin.users.index') }}">Volver a la lista de usuarios</a>
@endsection
