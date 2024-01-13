<!DOCTYPE html>
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
        <a class="btn btn-info">Unirse a Actividad</a>
        <div >
          <div class="row">
            <div class="col-md-4">
              <div class="card">
                  <div class="card-body">
                      <h3 class="card-title">Horario</h3>
                      <p class="card-text">{{$actividad->fecha}} : {{$actividad->hora}}</p>
                  </div>
              </div>
          </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Plazas disponibles</h3>
                        <p class="card-text">{{$actividad->instalacion->aforo}}</p>
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
    
</div>

@endsection