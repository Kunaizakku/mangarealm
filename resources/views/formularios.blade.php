<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @include('menu')

    <div class="card">
        <div class="card-details">
            <p class="text-title">Form Cat</p>
            <p class="text-body">Hola Tonotos</p>
        </div>
        <a type="button" href="{{ route('cat.mostrar') }}" class="card-button" style="text-decoration: none; color: initial;">Ingresar</a>
    </div>
    <div class="card">
        <div class="card-details">
            <p class="text-title">Form Manga</p>
            <p class="text-body">Hola Tonotos</p>
        </div>
        <a type="button" href="{{ route('man.create') }}" class="card-button" style="text-decoration: none; color: initial;">Ingresar</a>
        <a type="button" href="{{ route('man.mostrar') }}" class="card-button" style="text-decoration: none; color: initial;">Ingresar</a>
    </div>
    <div class="card">
        <div class="card-details">
            <p class="text-title">Form Episodio</p>
            <p class="text-body">Hola Tonotos</p>
        </div>
        <a type="button" href="{{ route('form_cap') }}" class="card-button" style="text-decoration: none; color: initial;">Ingresar</a>
        <a type="button" href="{{ route('man.mostrarMangaCap') }}" class="card-button" style="text-decoration: none; color: initial;">Ingresar</a>
    </div>
    <div class="card">
        <div class="card-details">
            <p class="text-title">Form paginas</p>
            <p class="text-body">Hola Tonotos</p>
        </div>
        <a type="button" href="#" class="card-button" style="text-decoration: none; color: initial;">Ingresar</a>
    </div>

</body>
</html>
