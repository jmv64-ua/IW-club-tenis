@extends('layout')

@section('content')

<div class="container mt-5">
    <h2>Recargar Saldo</h2>
    <h3>Saldo Actual: {{$usuario->saldo}}€</h3>
    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    
    <form method="POST" action="{{ route('recargarSaldo') }}">
        @csrf
        
        <div class="mb-3">
            <label for="nombre_tarjeta" class="form-label">Nombre en la Tarjeta</label>
            <input type="text" class="form-control" id="nombre_tarjeta" name="nombre_tarjeta" required>
        </div>

        <div class="mb-3">
            <label for="numero_tarjeta" class="form-label">Número de Tarjeta</label>
            <input type="text" class="form-control" id="numero_tarjeta" name="numero_tarjeta" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="anyo" class="form-label">Año de Expiración</label>
                <input type="text" class="form-control" id="anyo" name="anyo" placeholder="AAAA" required pattern="\d{4}">
            </div>
            <div class="col-md-6 mb-3">
                <label for="mes" class="form-label">Mes de Expiración</label>
                <input type="text" class="form-control" id="mes" name="mes" placeholder="MM" required pattern="\d{2}" maxlength="2">
            </div>

            <div class="col-md-6 mb-3">
                <label for="codigo_seguridad" class="form-label">Código de Seguridad (CVV)</label>
                <input type="text" class="form-control" id="codigo_seguridad" name="codigo_seguridad" required pattern="\d{3}" maxlength="3">
            </div>
        </div>

        <div class="mb-3">
            <label for="monto_recarga" class="form-label">Monto a Recargar</label>
            <input type="number" class="form-control" id="monto_recarga" placeholder="00.00" name="monto_recarga" min="1" required>
        </div>

        <button type="submit" class="btn btn-primary">Recargar Saldo</button>
    </form>
</div>

@endsection
