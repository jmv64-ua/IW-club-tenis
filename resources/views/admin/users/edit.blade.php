@extends('layout')

@section('content')
    <h1>Editar Usuario</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')
        
        <label for="name">Nombre:</label>
        <input type="text" name="name" value="{{ old('name', $user->name) }}" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email', $user->email) }}" required>
        
        <label for="password">Nueva Contraseña (opcional):</label>
        <input type="password" name="password">
        
        <label for="password_confirmation">Confirmar Nueva Contraseña:</label>
        <input type="password" name="password_confirmation">
        
        <label for="saldo">Saldo:</label>
        <input type="text" name="saldo" value="{{ old('saldo', $user->saldo) }}" required>
        
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" value="{{ old('direccion', $user->direccion) }}" required>
        
        <label for="codigo_postal">Código Postal:</label>
        <input type="text" name="codigo_postal" value="{{ old('codigo_postal', $user->codigo_postal) }}" required>
        
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" value="{{ old('telefono', $user->telefono) }}" required>
        
        <button type="submit">Guardar Cambios</button>
    </form>
    
    <a href="{{ route('admin.users.index') }}">Volver a la lista de usuarios</a>
@endsection
