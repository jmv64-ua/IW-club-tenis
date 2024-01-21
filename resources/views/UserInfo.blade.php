@extends('layout')

@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="{{ asset($usuario->urlphoto) }}" class="card-img-top" alt="Foto de perfil">
                <div class="card-body">
                    <h5 class="card-title">{{ $usuario->name }}</h5>
                    <p class="card-text">{{ $usuario->descripcion }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Información del Usuario</h5>
                    <div id="infoSection">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><strong>Email:</strong> {{ $usuario->email }}</li>
                            <li class="list-group-item"><strong>Dirección:</strong> {{ $usuario->direccion }}</li>
                            <li class="list-group-item"><strong>Código Postal:</strong> {{ $usuario->codigo_postal }}</li>
                            <li class="list-group-item"><strong>Teléfono:</strong> {{ $usuario->telefono }}</li>
                            <li class="list-group-item"><strong>Rol:</strong> {{ $usuario->rol }}</li>
                            
                            <li class="list-group-item"><strong>Saldo:</strong> {{ number_format($usuario->saldo, 2) }} €</li>
                        </ul>
                        <div>
                            <a class="btn btn-info" id="editButton">Editar Información</a>
                        </div>
                    </div>
                    <form id="editForm" enctype="multipart/form-data" method="POST" action="{{ route('Usuarioedit') }}" style="display: none;">
                        @csrf
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <strong>Email:</strong>
                                <input type="text" class="form-control" name="email" value="{{ $usuario->email }}">
                            </li>
                            <li class="list-group-item">
                                <strong>Dirección:</strong>
                                <input type="text" class="form-control" name="direccion" value="{{ $usuario->direccion }}">
                            </li>
                            <li class="list-group-item">
                                <strong>Código Postal:</strong>
                                <input type="text" class="form-control" name="codigo_postal" value="{{ $usuario->codigo_postal }}">
                            </li>
                            <li class="list-group-item">
                                <strong>Teléfono:</strong>
                                <input type="text" class="form-control" name="telefono" value="{{ $usuario->telefono }}">
                            </li>
                            <li class="list-group-item">
                                <strong for="imagen" class="form-label">Imagen:</strong>
                                <input type="file" class="form-control" name="imagen" accept="image/png">
                            </li>
                            <li class="list-group-item">
                                <strong>Cambiar contraseña:</strong>
                                <input type="password" class="form-control" name="password" >
                            </li>
                            <li class="list-group-item">
                                <strong>Repite Nueva contraseña:</strong>
                                <input type="password" class="form-control" name="Rpassword" >
                            </li>
                            <!-- Otros campos de formulario similares para otros atributos -->
                        </ul>
                        <button type="button" class="btn btn-primary" id="saveChanges">Guardar Cambios</button>
                        <a class="btn btn-info" id="SeeData">Ver Datos</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('editButton').addEventListener('click', function () {
            // Mostrar el formulario de edición y ocultar la información estática
            document.getElementById('infoSection').style.display = 'none';
            document.getElementById('editForm').style.display = 'block';
        });
        document.getElementById('SeeData').addEventListener('click', function () {
            // Mostrar el formulario de edición y ocultar la información estática
            document.getElementById('editForm').style.display = 'none';
            document.getElementById('infoSection').style.display = 'block';
        });

        
    });
</script>

@endsection
