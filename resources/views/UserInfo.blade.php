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
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Email:</strong> {{ $usuario->email }}</li>
                        <li class="list-group-item"><strong>Dirección:</strong> {{ $usuario->direccion }}</li>
                        <li class="list-group-item"><strong>Código Postal:</strong> {{ $usuario->codigo_postal }}</li>
                        <li class="list-group-item"><strong>Teléfono:</strong> {{ $usuario->telefono }}</li>
                        <li class="list-group-item"><strong>Rol:</strong> {{ $usuario->rol }}</li>
                        <li class="list-group-item"><strong>Validado:</strong> {{ $usuario->Validado ? 'Sí' : 'No' }}</li>
                        <li class="list-group-item"><strong>Bloqueado:</strong> {{ $usuario->bloqueado ? 'Sí' : 'No' }}</li>
                        <li class="list-group-item"><strong>Resumen:</strong> {{ $usuario->resumen }}</li>
                        <li class="list-group-item"><strong>Saldo:</strong> {{ number_format($usuario->saldo, 2) }} €</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
