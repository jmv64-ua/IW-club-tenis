@extends('layout')

@section('content')
    <h1>Crear Nuevo Usuario</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.users.store') }}" method="post">
        @csrf
        <label for="name">Nombre:</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
        
        <label for="email">Email:</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
        
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        
        <label for="password_confirmation">Confirmar Contraseña:</label>
        <input type="password" name="password_confirmation" required>
        
        <label for="saldo">Saldo:</label>
        <input type="text" name="saldo" value="{{ old('saldo') }}" required>
        
        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion" value="{{ old('direccion') }}" required>
        
        <label for="codigo_postal">Código Postal:</label>
        <input type="text" name="codigo_postal" value="{{ old('codigo_postal') }}" required>
        
        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" value="{{ old('telefono') }}" required>
        
        <button type="submit">Guardar</button>
    </form>
    
    <a href="{{ route('admin.users.index') }}">Volver a la lista de usuarios</a>
@endsection
