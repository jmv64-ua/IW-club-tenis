@extends('layout')

@section('content')
    <h1>Editar Usuario</h1>
    <form action="{{ route('admin.users.update', $user->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
        </div>

        <div class="form-group">
            <label for="email">Correo Electrónico:</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>

        <div class="form-group">
            <label for="saldo">Saldo:</label>
            <input type="number" name="saldo" id="saldo" class="form-control" value="{{ $user->saldo }}" required>
        </div>

        <div class="form-group">
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" id="direccion" class="form-control" value="{{ $user->direccion }}" required>
        </div>

        <div class="form-group">
            <label for="codigo_postal">Código Postal:</label>
            <input type="text" name="codigo_postal" id="codigo_postal" class="form-control" value="{{ $user->codigo_postal }}" required>
        </div>

        <div class="form-group">
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" id="telefono" class="form-control" value="{{ $user->telefono }}" required>
        </div>

        <div class="form-group">
            <label for="rol">Rol:</label>
            <select name="rol" id="rol" class="form-control" required>
                <option value="administrador" {{ $user->rol == 'administrador' ? 'selected' : '' }}>Administrador</option>
                <option value="socio" {{ $user->rol == 'socio' ? 'selected' : '' }}>Socio</option>
                <option value="monitor" {{ $user->rol == 'monitor' ? 'selected' : '' }}>Monitor</option>
                <option value="recepcionista" {{ $user->rol == 'recepcionista' ? 'selected' : '' }}>Recepcionista</option>
            </select>
        </div>

        <div class="form-group">
            <label for="Validado">Validado:</label>
            <select name="Validado" id="Validado" class="form-control" required>
                <option value="0" {{ $user->Validado == 0 ? 'selected' : '' }}>No Validado</option>
                <option value="1" {{ $user->Validado == 1 ? 'selected' : '' }}>Validado</option>
            </select>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion" class="form-control">{{ $user->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label for="bloqueado">Bloqueado:</label>
            <select name="bloqueado" id="bloqueado" class="form-control" required>
                <option value="0" {{ $user->bloqueado == 0 ? 'selected' : '' }}>No Bloqueado</option>
                <option value="1" {{ $user->bloqueado == 1 ? 'selected' : '' }}>Bloqueado</option>
            </select>
        </div>

        <div class="form-group">
            <label for="resumen">Resumen:</label>
            <input type="text" name="resumen" id="resumen" class="form-control" value="{{ $user->resumen }}">
        </div>

        <div class="form-group">
            <label for="urlphoto">Seleccionar Foto:</label>
            <input type="file" name="urlphoto" id="urlphoto" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
    </form>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
