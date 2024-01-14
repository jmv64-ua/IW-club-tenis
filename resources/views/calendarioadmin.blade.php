@extends('layout')

@section('content')


    <div id="calendar"></div>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'timeGridWeek',
            slotMinTime:'07:00',
            slotMaxTime:'22:00',
            
            events:@json($actividades),
            dateClick: function (info) {
                // info.date contiene la fecha y hora de la celda clicada
                // Puedes redirigir a otra página aquí
                window.location.href = '/actividadNew/nueva?fecha=' + info.date.toISOString();
            }
          });
          calendar.render();
        });
  
      </script>



@endsection

@push('scripts')
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.10/index.global.min.js'></script>
@endpush
