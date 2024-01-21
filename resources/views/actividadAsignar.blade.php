@extends('layout')

@section('content')

<div class="container mt-5">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form enctype="multipart/form-data" method="POST" action="{{ route('createActividad') }}">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" name="nombre">
                </div>
                <div class="mb-3">
                    <label for="Descripcion" class="form-label">Descripción</label>
                    <textarea class="form-control" id="Descripcion" name="Descripcion"></textarea>
                </div>
                <div class="mb-3">
                    <label for="Precio" class="form-label">Precio (en euros)</label>
                    <input type="text" class="form-control" id="Precio" name="Precio">
                </div>
                <div class="mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" class="form-control" name="imagen" accept="image/png">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="fecha" class="form-label">Fecha Inicio</label>
                    <input type="date" class="form-control" id="fecha" name="fecha" value="{{ $fecha }}">
                </div>
                <div class="mb-3">
                    <label for="hora" class="form-label">Hora</label>
                    <input type="text" readonly class="form-control" id="hora" name="hora" value="{{$hora}}">
                </div>
                <div class="mb-3">
                    <label for="duracion" class="form-label">duracion</label>
                    <select class="form-select" id="duracion" name="duracion">
                        <option value="1">1 hora</option>
                        <option value="1.5">1 hora y media</option>
                        <option value="2">2 horas</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="monitor" class="form-label">Monitores</label>
                    <select class="form-select" id="monitor" name="monitor">
                        @foreach($monitores as $monitor)
                            <option value="{{ $monitor->id }}">{{ $monitor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="instalacion" class="form-label">Instalaciones</label>
                    <select class="form-select" id="instalacion" name="instalacion">
                        @foreach($instalaciones as $instalacion)
                            <option value="{{ $instalacion->id }}">{{ $instalacion->tipo_instalacion }}</option>
                        @endforeach
                    </select>
                </div>
                
            </div>
        </div>

        @csrf

        <button type="submit" class="btn btn-primary">Crear Actividad</button>
    </form>
</div>

@endsection
