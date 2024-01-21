@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Historial de Reservas</h1>

        @foreach($reservas as $reserva)
            <div class="card mb-4">
                <div class="card-body d-flex justify-content-between align-items-center">
                    @if($reserva->actividad)
                        <div>
                            <h5 class="card-title">Actividad: {{ $reserva->actividad->nombre }}</h5>
                            <p>Fecha y Hora de Inicio: {{ $reserva->actividad->fechaI }}</p>
                            
                            @if($reserva->actividad->fechaFin)
                                @php
                                    $fechaInicio = new DateTime($reserva->actividad->fechaI);
                                    $fechaFin = new DateTime($reserva->actividad->fechaFin);
                                    $duracion = $fechaInicio->diff($fechaFin);
                                @endphp
                                <p>Duración: {{ $duracion->format('%H horas %I minutos') }}</p>
                            @endif

                            <!-- Agrega otros detalles de la actividad que desees mostrar -->
                        </div>

                        <!-- Agrega un botón con un enlace a la URL /actividad/{id} -->
                        <a href="{{ url('/actividad/' . $reserva->actividad->id) }}" class="btn btn-primary">Ver Actividad</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
