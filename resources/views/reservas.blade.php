@extends('layout')

@section('content')
    <div id="mensajeReservaExitosa" class="alert alert-success" style="display: none;">
        <strong>¡Enhorabuena!</strong> Reserva confirmada exitosamente.
    </div>

    <div id="mensajeAforoCompleto" class="alert alert-danger" style="display: none;">
        <strong>Error:</strong> No hay suficiente aforo en la instalación.
    </div>

    <div id="mensajeReservaDuplicada" class="alert alert-warning" style="display: none;">
        <strong>Aviso:</strong> Ya has reservado esta actividad.
    </div>

    <div id="calendar"></div>
    <div class="modal fade" id="reservaModal" tabindex="-1" aria-labelledby="reservaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reservaModalLabel">Confirmar Reserva</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ¿Quieres reservar esta actividad?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var currentEvent;

        function confirmarReserva() {
            if (!currentEvent) {
                console.error('No se ha seleccionado ningún evento.');
                return;
            }

            var eventId = currentEvent.id;

            $.ajax({
                url: '/reservar/' + eventId,
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'evento_id': eventId,
                },
                success: function(response) {
                    console.log(response);

                    $('#reservaModal').modal('hide');

                    if (response.message === "Reserva confirmada exitosamente") {
                        $('#mensajeReservaExitosa').fadeIn();
                        setTimeout(function() {
                            $('#mensajeReservaExitosa').fadeOut();
                        }, 4000);
                    } else if (response.message === "No hay suficiente aforo en la instalación") {
                        $('#mensajeAforoCompleto').fadeIn();
                        setTimeout(function() {
                            $('#mensajeAforoCompleto').fadeOut();
                        }, 4000);
                    } else if (response.message === "Ya tienes una reserva para esta actividad") {
                        $('#mensajeReservaDuplicada').fadeIn();
                        setTimeout(function() {
                            $('#mensajeReservaDuplicada').fadeOut();
                        }, 4000);
                    }
                },
                error: function(error) {
                    console.error('Error en la solicitud AJAX:', error.responseText);
                }
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'timeGridWeek',
                slotMinTime: '07:00',
                slotMaxTime: '22:00',
                events: @json($actividades),
                eventClick: function(info) {
                    currentEvent = info.event;
                    mostrarCajaConfirmacion(info.event);
                },
            });
            calendar.render();

            function mostrarCajaConfirmacion(event) {
                var nombreActividad = event.title;
                var fechaInicio = event.start;
                var fechaFin = event.end;

                $('#reservaModal .modal-body').html('¿Quieres reservar la actividad "' + nombreActividad + '"?<br>' +
                    'Fecha de inicio: ' + fechaInicio.toLocaleString() + '<br>' +
                    'Fecha de fin: ' + fechaFin.toLocaleString());

                $('#reservaModal').modal('show');
            }

            $('#reservaModal .modal-footer .btn-primary').on('click', function() {
                confirmarReserva();
            });
        });
    </script>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
@endpush
