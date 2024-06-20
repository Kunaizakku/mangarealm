<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
    <title>Document</title>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            M A N G A R E A L M
        </div>
        <div class="menu">
            <a href="{{ route('welcome') }}">Inicio</a>
            <a href="#about">Ejemplo 1</a>
            <a href="{{ route('formularios') }}">forms</a>
            <a href="{{ route('form_cat') }}">cat</a>
            <a href="{{ route('login') }}">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>