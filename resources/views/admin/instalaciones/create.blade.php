@extends('layout')

@section('content')
    <h1>Crear Instalación</h1>
    <form action="{{ route('admin.instalaciones.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="tipo_instalacion">Tipo de instalación:</label>
            <input type="text" name="tipo_instalacion" id="tipo_instalacion" class="form-control" value="{{ old('tipo_instalacion') }}" required>
        </div>

        <div class="form-group">
            <label for="aforo">Aforo:</label>
            <input type="number" name="aforo" id="aforo" class="form-control" value="{{ old('aforo') }}" required>
        </div>

        <div class="form-group">
            <label for="bloqueado">Bloqueada:</label>
            <select name="bloqueado" id="bloqueado" class="form-control" required>
                <option value="0">No bloqueado</option>
                <option value="1">Bloqueado</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Guardar Instalación</button>
    </form>
@endsection
