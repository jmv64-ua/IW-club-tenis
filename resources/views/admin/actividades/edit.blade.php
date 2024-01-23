@extends('layout')

@section('content')
    <h1>Editar Actividad</h1>
    <form action="{{ route('admin.actividades.update', $actividad->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="instalacion_id">Instalación:</label>
            <input type="number" name="instalacion_id" id="instalacion_id" class="form-control" value="{{ $actividad->instalacion_id }}" required>
        </div>

        <div class="form-group">
            <label for="user_id">Monitor:</label>
            <input type="number" name="user_id" id="user_id" class="form-control" value="{{ $actividad->user_id }}" required>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $actividad->nombre }}" required>
        </div>

        <div class="form-group">
            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" class="form-control" value="{{ $actividad->precio }}" required>
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{ $actividad->descripcion }}" required>
        </div>

        <div class="form-group">
            <label for="fechaI">Fecha de Inicio:</label>
            <input type="date" name="fechaI" id="fechaI" class="form-control" value="{{ $actividad->fechaI }}" required>
        </div>

        <div class="form-group">
            <label for="fechaFin">Fecha de Fin:</label>
            <input type="date" name="fechaFin" id="fechaFin" class="form-control" value="{{ $actividad->fechaFin }}" required>
        </div>

        <div class="form-group">
            <label for="urlphoto">Seleccionar Foto:</label>
            <input type="file" name="urlphoto" id="urlphoto" class="form-control-file">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Actividad</button>
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
