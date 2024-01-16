@extends('layout')

@section('content')
    <!-- Sección de Encabezado con Foto Grande -->
    <div class="jumbotron d-flex align-items-center text-center position-relative overflow-hidden">
        <img src="/images/instalaciones_fondo_home.jpg" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="Foto de fondo">
        <div class="w-100 mx-3 text-white position-absolute top-50 start-50 translate-middle">
            <h1 class="display-4 mb-5">Bienvenido a FutNew</h1>
        </div>
    </div>

    <!-- Sección de Tres Fotos con Titulo y Descripción -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4">
                <a href="/actividades">
                    <img src="/images/dif-deporte.jpg" alt="Foto 1" class="img-fluid">
                    <h3 class="mt-2">Variedad de Actividades y Deportes</h3>
                </a>
                <p>Ofrecemos una amplia gama de actividades y deportes para satisfacer todos los gustos y niveles de habilidad.</p>
            </div>
            <div class="col-md-4">
                <a href="/instalaciones">
                    <img src="/images/install-peq.jpg" alt="Foto 2" class="img-fluid">
                    <h3 class="mt-2">Instalaciones Espaciosas</h3>
                </a>
                <p>Disfruta de amplias áreas para entrenamiento, pistas de última generación y entornos abiertos que te permitirán alcanzar tus metas fitness.</p>
            </div>
            <div class="col-md-4">
                <a href="/monitores">
                    <img src="/images/personal-trainer.jpg" alt="Foto 3" class="img-fluid">
                    <h3 class="mt-2">Monitores Cualificados</h3>
                </a>
                <p>Desde entrenadores personales hasta instructores especializados, nuestro equipo está dedicado a ayudarte a alcanzar tus objetivos de forma segura y efectiva.</p>
            </div>
        </div>
    </div>

    <!-- Sección de Últimas Noticias con Carousel -->
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12 text-center">
                <h2>Últimas Noticias</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="carouselNoticias" class="carousel slide " data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="card">
                                <img src="/images/new-tenis.jpg" class="card-img-top img-thumbnail mx-auto my-2" alt="Noticia 1" style="width: 500px;">
                                <div class="card-body">
                                    <h5 class="card-title">¡Inauguración de Nuevas Pistas!</h5>
                                    <p class="card-text">Celebra con nosotros la inauguración de nuestras nuevas pistas de tenis. ¡Ven y sé el primero en experimentarlas!</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                                <img src="/images/yoga-outdoor.jpg" class="card-img-top img-thumbnail mx-auto my-2" alt="Noticia 2" style="width: 500px;">
                                <div class="card-body">
                                    <h5 class="card-title">Nueva Clase de Yoga al Aire Libre</h5>
                                    <p class="card-text">Descubre la tranquilidad y el bienestar en nuestra nueva clase de yoga al aire libre. ¡Conéctate con la naturaleza mientras cuidas de tu cuerpo y mente!</p>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="card">
                            <img src="/images/foot-tour.jpg" class="card-img-top img-thumbnail mx-auto my-2" alt="Noticia 3" style="width: 500px;">
                                <div class="card-body">
                                    <h5 class="card-title">Exitoso Torneo de Futbol</h5>
                                    <p class="card-text">El reciente torneo de fútbol fue un gran éxito. Gracias a todos los participantes y fanáticos por hacerlo posible. ¡Esperamos verlos en el próximo!</p>
                                </div>
                            </div>
                        </div>
                        <!-- Puedes agregar más noticias según sea necesario -->
                    </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselNoticias" data-bs-slide="prev" style="color: black;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselNoticias" data-bs-slide="next" style="color: black;">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
            </div>
        </div>
    </div>

    <!-- Sección de Reservas -->
    <div class="container mt-4 text-center position-relative">
        <h2>Reserva tu plaza en las clases</h2>
        <p>Reserva ahora para disfrutar de nuestras instalaciones y actividades.</p>
        <!-- Añade una foto apaisada -->
        <div style="position: relative; overflow: hidden;">
            <img src="/images/GroupFitness.jpg" alt="Foto Reserva" class="img-fluid mb-3">
            <div class="shake-animation-container" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <a href="{{ url('/reservas') }}" id="btnReserva" class="btn btn-primary btn-lg">Hacer Reserva</a>
            </div>
        </div>
    </div>


    <!-- Sección de Únete a Nosotros -->
    <div class="container mt-4 text-center">
        <h2>Únete a Nosotros</h2>
        <p>Regístrate para acceder a todas las funciones y ofertas exclusivas.</p>
        @guest
            <a href="{{ url('/register') }}" class="btn btn-success">Registrarse</a>
        @endguest
    </div>
<!-- Footer con Iconos de Redes Sociales -->
    <footer class="container-fluid bg-dark text-white mt-4 p-3">
        <div class="text-center">
            <h4>Síguenos en Redes Sociales</h4>
            <a href="#" class="text-white mx-2"><i class="fas fa-envelope fa-2x"></i></a>
            <a href="#" class="text-white mx-2"><i class="fas fa-phone fa-2x"></i></a>
            <a href="#" class="text-white mx-2"><i class="fas fa-map-marker-alt fa-2x"></i></a>
        </div>
    </footer>

    <!-- Enlace al CDN de FontAwesome 5 -->
    <script src="https://kit.fontawesome.com/YOUR_FONTAWESOME_KIT_CODE.js" crossorigin="anonymous"></script>


    <!-- Script para desplazar automáticamente el Carousel cada 2.5 segundos -->
    <script>
        setInterval(function () {
            $('#carouselNoticias').carousel('next');
        }, 3000);
        
        function shakeButton() {
            var button = document.getElementById('btnReserva');
            button.classList.add('shake-animation');
            setTimeout(function() {
                button.classList.remove('shake-animation');
            }, 500); // La animación dura 0.5 segundos
        }

        setInterval(shakeButton, 3000); // Hacer que el botón tiemble cada 3 segundos

        // Asegurarse de que el botón de reserva se agite al cargar la página
        document.addEventListener("DOMContentLoaded", function() {
            shakeButton();
        });        

    </script>
@endsection
