@extends('layout')

@section('content')
    @if(Auth::user()->rol == 'monitor')
        <button id="filterByMonitorBtn">Mis actividades</button>
    @endif

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
                events: @json($actividades),
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
                    window.location.href = '/actividadNew/nueva?fecha=' + formattedDate;
                }
                  });

            // Agregar el manejo del botón
            var filterByMonitorBtn = document.getElementById('filterByMonitorBtn');
            if (filterByMonitorBtn) {
                filterByMonitorBtn.addEventListener('click', function() {
                    // Realizar una solicitud AJAX al servidor
                    fetch('/actividades-por-usuario')
                        .then(response => response.json())
                        .then(data => {
                            // Actualizar el calendario con las nuevas actividades
                            calendar.removeAllEvents();
                            calendar.addEventSource(data);

                            // También puedes mostrar un mensaje de carga mientras se actualiza
                            document.getElementById('filteredActivities').innerHTML = '';
                        })
                        .catch(error => {
                            console.error('Error al cargar las actividades:', error);
                            document.getElementById('filteredActivities').innerHTML = 'Error al cargar las actividades.';
                        });
                });
            }

            calendar.render();
        });
    </script>
@endsection

@push('scripts')
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
@endpush

