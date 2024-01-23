@extends('layout')

@section('content')
    <div class="container">
        <h2>Estadísticas</h2>

        {{-- Agrega un selector de Bootstrap --}}
        <div class="mb-3">
            <label for="tipoEstadistica" class="form-label">Selecciona el tipo de estadística:</label>
            <select class="form-select" id="tipoEstadistica">
                <option value="todos">Todos</option>
                <option value="reservas">Reservas de instalaciones</option>
                <option value="usuarios">Usuarios más activos</option> {{-- Nueva opción --}}
                {{-- Puedes agregar más opciones según tus necesidades --}}
            </select>
        </div>

        {{-- Agrega un contenedor para la gráfica --}}
        <div id="graficaContainer" style="display: none;">
            <canvas id="graficaReservas"></canvas>
        </div>

        {{-- Agrega un contenedor para la gráfica de usuarios más activos --}}
        <div id="graficaUsuariosContainer" style="display: none;">
            <canvas id="graficaUsuarios"></canvas>
        </div>

    </div>

    {{-- Agrega el script para inicializar la gráfica --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // ... (código previo)

            var myChartReservas = null;
    var myChartUsuarios = null;

    // Agrega lógica para mostrar/ocultar el gráfico según la selección del selector
    var tipoEstadisticaSelect = document.getElementById('tipoEstadistica');
    var graficaContainer = document.getElementById('graficaContainer');
    var graficaUsuariosContainer = document.getElementById('graficaUsuariosContainer');

    tipoEstadisticaSelect.addEventListener('change', function () {
        // Destruir gráficos existentes antes de inicializar uno nuevo
        if (myChartReservas) {
            myChartReservas.destroy();
        }
        if (myChartUsuarios) {
            myChartUsuarios.destroy();
        }

        if (tipoEstadisticaSelect.value === 'reservas') {
            graficaContainer.style.display = 'block';
            graficaUsuariosContainer.style.display = 'none';

            var ctxReservas = document.getElementById('graficaReservas').getContext('2d');
            var labelsReservas = @json($contadoresReservas->pluck('instalacion.tipo_instalacion'));
            var dataReservas = @json($contadoresReservas->pluck('total_reservas'));

            myChartReservas = new Chart(ctxReservas, {
                type: 'bar',
                data: {
                    labels: labelsReservas,
                    datasets: [{
                        label: 'Número de Reservas',
                        data: dataReservas,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            stepSize: 1, // Configura el tamaño del paso para que vaya de 1 en 1
                            callback: function (value) {
                                if (value % 1 === 0) {
                                    return value; // Muestra el valor si es un número entero
                                }
                            }
                        }
                    }
                }
            });
        } else if (tipoEstadisticaSelect.value === 'usuarios') {
            graficaContainer.style.display = 'none';
            graficaUsuariosContainer.style.display = 'block';

            // Lógica para inicializar el gráfico de usuarios más activos
            var ctxUsuarios = document.getElementById('graficaUsuarios').getContext('2d');
            var labelsUsuarios = @json($usuariosConMasReservas->pluck('name'));
            var dataUsuarios = @json($usuariosConMasReservas->pluck('total_reservas'));

            myChartUsuarios = new Chart(ctxUsuarios, {
                type: 'bar',
                data: {
                    labels: labelsUsuarios,
                    datasets: [{
                        label: 'Número de Reservas',
                        data: dataUsuarios,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            stepSize: 1, // Configura el tamaño del paso para que vaya de 1 en 1
                            callback: function (value) {
                                if (value % 1 === 0) {
                                    return value; // Muestra el valor si es un número entero
                                }
                            }
                        }
                    }
                }
            });
        } else {
            graficaContainer.style.display = 'none';
            graficaUsuariosContainer.style.display = 'none';
        }
    });
});

    </script>
@endsection
