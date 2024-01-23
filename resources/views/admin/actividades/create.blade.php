@extends('layout')

@section('content')
    <h1>Crear Actividad</h1>
    <form action="{{ route('admin.actividades.store') }}" method="post">
        @csrf
        <div class="form-group">
            <label for="instalacion_id">Instalación:</label>
            <input type="number" name="instalacion_id" id="instalacion_id" class="form-control" value="{{ old('instalacion_id') }}" required>
        </div>

        <div class="form-group">
            <label for="user_id">Monitor:</label>
            <input type="number" name="user_id" id="user_id" class="form-control" value="{{ old('user_id') }}" required>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ old('nombre') }}" required>
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" class="form-control" value="{{ old('precio') }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ old('descripcion') }}" required>
        </div>

        <div class="form-group">
            <label for="fechaI">Fecha de Inicio:</label>
            <input type="date" name="fechaI" id="fechaI" class="form-control" value="{{ old('fechaI') }}" required>
        </div>

        <div class="form-group">
            <label for="fechaFin">Fecha de Fin:</label>
            <input type="date" name="fechaFin" id="fechaFin" class="form-control" value="{{ old('fechaFin') }}" required>
        </div>

        <button type="submit" class="btn btn-success">Guardar Actividad</button>
    </form>
@endsection
