@extends('layout')

@section('content')
<style>
    .container {
        position: relative;
        width: 100%;
        padding: 3%;
    }

    .image {
        width: 100%;
        height: auto;
        display: block;
    }
</style>
<div>
    
   
    <div class="container">
        <h1 class="">Clases de {{$actividad->nombre}}</h1>
        <img class="image" src="{{ asset($actividad->urlphoto) }}" alt="Descripción de la imagen">
        <p>{{$actividad->descripcion}}</p>
        @auth
            <form id="reservaForm" enctype="multipart/form-data" method="POST" action="{{ route('reservar', $actividad->id) }}">
                @csrf
                @method('POST')
                <button class="btn btn-info" type="button" onclick="confirmarReserva()">Reservar</button>
            </form>
        @endauth
        @guest
        <div>Registrate para Reservar!!!</div>
        @endguest
        
        <div >
          <div class="row">
            <div class="col-md-4">
              <div class="card">
                  <div class="card-body">
                      <h3 class="card-title">Horario</h3>
                      <p class="card-text">{{$actividad->fechaI}} hasta {{$actividad->fechaFin}} </p>
                  </div>
              </div>
          </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Plazas disponibles</h3>
                        <p class="card-text">{{$actividad->instalacion->aforo - $Reservas}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Precio</h3>
                        <p class="card-text">{{$actividad->precio}}</p>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
</div>

<script>
    function confirmarReserva() {
        if (confirm('¿Estás seguro de que quieres reservar?')) {
            // Si el usuario confirma, envía el formulario
            document.getElementById('reservaForm').submit();
        }
    }
</script>

@endsection
