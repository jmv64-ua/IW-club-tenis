<!DOCTYPE html>
@extends('layout')

@section('content')
    <!-- Mensajes de reserva -->
    <div id="mensajeReservaExitosa" class="alert alert-success" style="display: none;">
        <strong>¡Enhorabuena!</strong> Reserva confirmada exitosamente.
    </div>

    <!-- Nuevo bloque para el mensaje de instalación ya reservada -->
    <div id="mensajeInstalacionReservada" class="alert alert-danger" style="display: none;">
        <strong>Error:</strong> La instalación ya está reservada.
    </div>

    <h1>Lista de Instalaciones</h1>
    
    <ul>
        @foreach($instalaciones as $instalacion)
            <li>
                <a href="#" data-bs-toggle="modal" data-bs-target="#reservaModal{{ $instalacion->id }}">
                    {{ $instalacion->tipo_instalacion }}
                </a>
            </li>

            <!-- Modal -->
            <div class="modal fade" id="reservaModal{{ $instalacion->id }}" tabindex="-1" aria-labelledby="reservaModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="reservaModalLabel">Confirmar Reserva</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                              ¿Quieres reservar la instalación "{{ $instalacion->tipo_instalacion }}" el {{ \Carbon\Carbon::parse($fecha)->format('d/m H:i') }}?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" onclick="confirmarReservaInstalacion({{ $instalacion->id }})">Confirmar Reserva</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </ul>

    <script>
        function confirmarReservaInstalacion(instalacionId) {
            $.ajax({
                url: '/reservarInstalacion/' + instalacionId,
                method: 'POST',
                data: {
                    '_token': '{{ csrf_token() }}',
                    'instalacion_id': instalacionId,
                    'fecha': '{{ $fecha }}',
                },
                success: function(response) {
                    console.log(response);

                    $('#reservaModal' + instalacionId).modal('hide');
                    // Mostrar mensaje según la respuesta del servidor
                    if (response.message === "Reserva de instalación exitosa") {
                        $('#mensajeReservaExitosa').fadeIn();
                        setTimeout(function() {
                            $('#mensajeReservaExitosa').fadeOut();
                        }, 4000);
                    } else if (response.message === "Instalacion ya reservada") {
                        $('#mensajeAforoCompleto').fadeIn();
                        setTimeout(function() {
                            $('#mensajeAforoCompleto').fadeOut();
                        }, 4000);

                        // Mostrar el mensaje de instalación ya reservada
                        $('#mensajeInstalacionReservada').fadeIn();
                    }
                },
                error: function(error) {
                    console.error('Error en la solicitud AJAX:', error.responseText);
                }
            });
        }
    </script>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
@endpush
