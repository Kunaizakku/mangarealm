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
    @if (session('id'))
    @else
        <script>window.location = "{{ route('login') }}"</script>
        
    @endif
    <div class="navbar">
        <a href="{{ route('welcome') }}">
            <div class="logo">
                M A N G A R E A L M
            </div>
        </a>
        
        <div class="menu">
            <a href="{{ route('welcome') }}">Inicio</a>
            <a href="{{ route('cat.listas') }}">Generos</a>
            <a href="{{ route('mangas') }}">Directorio</a>
            @if (session('rol')==2)
            <a href="{{ route('formularios') }}">forms</a>
            @endif
            <a href="{{ route('logout') }}">Cerrar Sesión</a>
        </div>
    </div>
</body>
</html>