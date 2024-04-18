@extends('layouts.app')

@section('title', 'Inicio')

@section('content')
  @include('admin.modal.reserva')
    <!-- PESTAÑA DE INICIO ADMINISTRADOR -->
    <h1 class="text-5xl">administrador</h1>

    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="col-md-11 offset-1 mt-5 mb-5">

                    <div id="calendar">

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var booking = @json([
            [
                "title"=> "Ejemplo 1",
                "start"=> "2024-04-19 10:33:05",
                "end"=> "2024-04-19 10:33:05"
            ]
        ]);
        

        const calendarEl = document.getElementById('calendar');
        const calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'timeGridDay dayGridMonth timeGridWeek',
          },
          events: booking,
          selectable: true,
          selectHelper: true,
          select: function(start, end, allDays){
            //console.log(start);
            $('#reservaModal').modal('toggle');
          }
        });
        calendar.render();
      });

    </script>
@endsection