@extends('layout')

@section('content')
<div class="container">
    <h2>Estadísticas</h2>

    <div class="mb-3">
        <label for="tipoEstadistica" class="form-label">Selecciona el tipo de estadística:</label>
        <select class="form-select" id="tipoEstadistica" onchange="mostrarGrafico()">
            <option value="reservas">Reservas de instalaciones</option>
            <option value="usuarios">Usuarios más activos</option>
            <option value="tercera">Reservas de actividades</option>
        </select>
    </div>

    <div class="mb-4">
        <canvas id="graficaReservas" class="grafica"></canvas>
        <canvas id="graficaUsuarios" class="grafica d-none"></canvas>
        <canvas id="graficaTercera" class="grafica d-none"></canvas>
    </div>
</div>

<script>
    function mostrarGrafico() {
        var tipoEstadistica = document.getElementById("tipoEstadistica").value;
        var graficas = document.getElementsByClassName("grafica");

        for (var i = 0; i < graficas.length; i++) {
            graficas[i].classList.add("d-none");
        }

        if (tipoEstadistica === "reservas") {
            document.getElementById("graficaReservas").classList.remove("d-none");
        } else if (tipoEstadistica === "usuarios") {
            document.getElementById("graficaUsuarios").classList.remove("d-none");
        } else if (tipoEstadistica === "tercera") {
            document.getElementById("graficaTercera").classList.remove("d-none");
        }
    }
</script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var myChartReservas = null;
            var myChartUsuarios = null;
            var myChartTercera = null;

            // Inicializa los gráficos al cargar la página
            initReservasChart();
            initUsuariosChart();
            initTerceraChart();

            // Agrega lógica para mostrar/ocultar el gráfico según la selección del selector
            var tipoEstadisticaSelect = document.getElementById('tipoEstadistica');

            tipoEstadisticaSelect.addEventListener('change', function () {
                // Destruye gráficos existentes antes de inicializar uno nuevo
                if (myChartReservas) {
                    myChartReservas.destroy();
                }
                if (myChartUsuarios) {
                    myChartUsuarios.destroy();
                }
                if (myChartTercera) {
                    myChartTercera.destroy();
                }

                // Inicializa el gráfico correspondiente a la selección
                if (tipoEstadisticaSelect.value === 'reservas') {
                    initReservasChart();
                } else if (tipoEstadisticaSelect.value === 'usuarios') {
                    initUsuariosChart();
                } else if (tipoEstadisticaSelect.value === 'tercera') {
                    initTerceraChart();
                }
            });

            // Función para inicializar el gráfico de reservas
            function initReservasChart() {
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
                                stepSize: 1,
                                callback: function (value) {
                                    if (value % 1 === 0) {
                                        return value;
                                    }
                                }
                            }
                        }
                    }
                });
            }

            // Función para inicializar el gráfico de usuarios
            function initUsuariosChart() {
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
                                stepSize: 1,
                                callback: function (value) {
                                    if (value % 1 === 0) {
                                        return value;
                                    }
                                }
                            }
                        }
                    }
                });
            }

            // Función para inicializar el tercer gráfico
            function initTerceraChart() {
            var ctxTercera = document.getElementById('graficaTercera').getContext('2d');
            var labelsTercera = @json($contadoresReservasActividades->pluck('actividad.nombre'));
            var dataTercera = @json($contadoresReservasActividades->pluck('total_reservas_actividad'));

            myChartTercera = new Chart(ctxTercera, {
                type: 'bar',
                data: {
                    labels: labelsTercera,
                    datasets: [{
                        label: 'Total de Reservas por Actividad',
                        data: dataTercera,
                        backgroundColor: 'rgba(255, 206, 86, 0.2)',
                        borderColor: 'rgba(255, 206, 86, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            stepSize: 1,
                            callback: function (value) {
                                if (value % 1 === 0) {
                                    return value;
                                }
                            }
                        }
                    }
                }
            });
        }
        });
    </script>
@endsection
