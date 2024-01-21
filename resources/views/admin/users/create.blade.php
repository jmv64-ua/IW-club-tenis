@extends('layout')

@section('content')
    <h1>Crear Usuario</h1>
    <form action="{{ route('admin.users.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
        </div>

        <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" name="password" id="password" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="password_confirmation">Confirmar Contraseña:</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="saldo">Saldo:</label>
            <input type="number" name="saldo" id="saldo" class="form-control" value="{{ old('saldo') }}" required>
        </div>

        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion" class="form-control" value="{{ old('direccion') }}" required>
        </div>

        <div class="form-group">
            <label for="codigo_postal">Código Postal:</label>
            <input type="text" name="codigo_postal" id="codigo_postal" class="form-control" value="{{ old('codigo_postal') }}" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ old('telefono') }}" required>
        </div>

        <div class="form-group">
            <label for="Validado">Validado:</label>
            <select name="Validado" id="Validado" class="form-control" required>
                <option value="0">No Validado</option>
                <option value="1">Validado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar Usuario</button>
    </form>
@endsection
