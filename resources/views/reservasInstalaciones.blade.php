@extends('layout')

@section('content')

    <h2 class="text-center">Reserva de instalaciones</h2>
    
    <p class="text-center small">Selecciona una hora para reservar una instalación</p>

    <div id="calendar"></div>

    <!-- Contenedor para actualizar las actividades -->
    <div id="filteredActivities"></div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                slotMinTime: '07:00',
                slotMaxTime: '22:00',
                dateClick: function (info) {
                    // info.date contiene la fecha y hora de la celda clicada
                    var localDate = new Date(info.date);
                    
                    // Obtener la diferencia de minutos entre la zona horaria local y UTC
                    var offsetMinutes = localDate.getTimezoneOffset();
                    
                    // Ajustar la fecha y hora restando la diferencia
                    localDate.setMinutes(localDate.getMinutes() - offsetMinutes);
                    
                    // Formatear la fecha y hora
                    var formattedDate = localDate.toISOString().slice(0, -1);
                    
                    // Puedes redirigir a otra página aquí
                    window.location.href = '/asignarInstalacion?fecha=' + formattedDate;
                }
            });

            calendar.render();
        });
    </script>
@endsection

@push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
@endpush
