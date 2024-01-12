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
        <div class="text-overlay">
            <div class="row">
              <div class="col-xs-1-12">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Title</h3>
                    <p class="card-text">Text</p>
                  </div>
                </div>
              </div>
              <div class="col-xs-1-12">
                <div class="card">
                  <div class="card-body">
                    <h3 class="card-title">Title</h3>
                    <p class="card-text">Text</p>
                  </div>
                </div>
              </div>
            </div>
            
        </div>
        
    </div>
    
</div>

@endsection