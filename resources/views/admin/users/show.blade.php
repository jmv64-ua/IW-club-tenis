@extends('layout')

@section('content')
    <h1>Detalles del Usuario</h1>
    
    <p><strong>ID:</strong> {{ $user->id }}</p>
    <p><strong>Nombre:</strong> {{ $user->name }}</p>
    <p><strong>Correo Electrónico:</strong> {{ $user->email }}</p>
    <!-- Otros campos similares a los del formulario de creación -->

    <p><strong>Validado:</strong> {{ $user->Validado ? 'Sí' : 'No' }}</p>

    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Volver</a>
@endsection
