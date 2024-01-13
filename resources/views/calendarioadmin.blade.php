@extends('layout')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario de Actividades</title>

    <!-- FullCalendar CSS -->
    <!-- FullCalendar CSS -->
<link rel="stylesheet" href="{{ asset('node_modules/@fullcalendar/core/main.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/@fullcalendar/daygrid/main.css') }}">

</head>
<body>

    <div id="calendario"></div>

    <!-- FullCalendar JS -->
    <!-- FullCalendar JS -->
<script src="{{ asset('node_modules/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('node_modules/@fullcalendar/core/main.js') }}"></script>
<script src="{{ asset('node_modules/@fullcalendar/daygrid/main.js') }}"></script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendario');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid'],
                events: [
                    @foreach($actividades as $actividad)
                        {
                            title: '{{ $actividad->nombre }}',
                            start: '{{ $actividad->fecha }}T{{ $actividad->hora }}',
                            // Otros campos necesarios
                        },
                    @endforeach
                ]
            });

            calendar.render();
        });
    </script>

</body>
</html>

@endsection
