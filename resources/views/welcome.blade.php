<!-- resources/views/welcome.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a Mi Aplicación</title>
    <!-- Agrega aquí tus estilos CSS si los tienes -->
</head>
<body>
    <div>
        <h1>Bienvenido a Mi Aplicación</h1>
        <p>Descubre todo lo que tenemos para ofrecer.</p>
        <div>
            <a href="{{ route('login') }}">Iniciar Sesión</a>
            <a href="{{ route('register') }}">Registrarse</a>
        </div>
    </div>
    <!-- Agrega aquí tus scripts JS si los tienes -->
</body>
</html>
