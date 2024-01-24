<!DOCTYPE html>
@extends('layout')

@section('content')
    <!-- Mensajes de reserva -->
    <div id="mensajeReservaExitosa" class="alert alert-success" style="display: none;">
        <strong>¡Enhorabuena!</strong> Reserva confirmada exitosamente.
    </div>

    <!-- Mensaje de instalación ya reservada por otro usuario -->
    <div id="mensajeInstalacionYaReservada" class="alert alert-danger" style="display: none;">
        <strong>Error:</strong> La instalación ya está reservada en este horario.
    </div>

    <!-- Mensaje de instalación ya reservada por el mismo usuario -->
    <div id="mensajeInstalacionReservadaPorUsuario" class="alert alert-warning" style="display: none;">
        <strong>Aviso:</strong> Ya tienes una reserva para esta instalación.
    </div>

    <!-- Mensaje de saldo insuficiente -->
    <div id="mensajeSaldoInsuficiente" class="alert alert-danger" style="display: none;">
        <strong>Error:</strong> Saldo insuficiente para realizar la reserva.
    </div>

    <h1>Lista de Instalaciones</h1>
    
    <!-- Lista de instalaciones -->
    <ul>
        @foreach($instalaciones as $instalacion)
            <li>
                <a href="#" data-bs-toggle="modal" data-bs-target="#reservaModal{{ $instalacion->id }}">
                    {{ $instalacion->tipo_instalacion }}
                </a>

                <!-- Modal para cada instalación -->
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
            </li>
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
                        $('#mensajeReservaExitosa').fadeIn().delay(4000).fadeOut();
                    } else if (response.message === "La instalación ya está reservada en este horario") {
                        $('#mensajeInstalacionYaReservada').fadeIn().delay(4000).fadeOut();
                    } else if (response.message === "Ya tienes una reserva para esta instalación") {
                        $('#mensajeInstalacionReservadaPorUsuario').fadeIn().delay(4000).fadeOut();
                    } else if (response.message === "Saldo insuficiente") {
                        $('#mensajeSaldoInsuficiente').fadeIn().delay(4000).fadeOut();
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
