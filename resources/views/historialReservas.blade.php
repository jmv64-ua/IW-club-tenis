@extends('layout')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4 display-4">Historial de Reservas</h1>

        <div class="mb-4">
            <h2 class="text-center">Reservas de Actividades</h2>
            @foreach($reservas->whereNotNull('actividad_id') as $reserva)
                <div class="card mb-4">
                    <div class="card-body d-flex justify-content-between align-items-center">
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
                    </div>
                </div>
            @endforeach
        </div>

        <div>
            <h2 class="text-center">Reservas de Instalaciones</h2>
            @foreach($reservas->whereNotNull('instalacion_id') as $reserva)
                <div class="card mb-4">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <h5 class="card-title">Instalación: {{ $reserva->instalacion->tipo_instalacion }}</h5>
                            <p>Fecha de Reserva: {{ $reserva->fecha_reserva }}</p>
                            <!-- Agrega otros detalles de la instalación que desees mostrar -->
                        </div>

                        <!-- Agrega un botón con un enlace a la URL /instalacion/{id} -->
                        <a href="{{ url('/instalaciones/' . $reserva->instalacion->id) }}" class="btn btn-primary">Ver Instalación</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
