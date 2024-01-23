@extends('layout')

@section('content')
    <h1>Editar Instalación</h1>
    <form action="{{ route('admin.instalaciones.update', $instalacion->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="tipo_instalacion">Tipo de instalación:</label>
            <input type="text" name="tipo_instalacion" id="tipo_instalacion" class="form-control" value="{{ $instalacion->tipo_instalacion }}" required>
        </div>

        <div class="form-group">
            <label for="aforo">Aforo:</label>
            <input type="number" name="aforo" id="aforo" class="form-control" value="{{ $instalacion->aforo }}" required>
        </div>

        <div class="form-group">
            <label for="bloqueado">Bloqueado:</label>
            <select name="bloqueado" id="bloqueado" class="form-control" required>
                <option value="0" {{ $instalacion->bloqueado == 0 ? 'selected' : '' }}>No bloqueado</option>
                <option value="1" {{ $instalacion->bloqueado == 1 ? 'selected' : '' }}>Bloqueado</option>
            </select>
        </div>

        <div class="form-group">
            <label for="urlphoto">Seleccionar Foto:</label>
            <input type="file" name="urlphoto" id="urlphoto" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Instalación</button>
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
