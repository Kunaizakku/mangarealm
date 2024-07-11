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
    <div>

    @if ($manga)
        <h1>{{ $manga->titulo }}</h1>
        <h2>{{ $manga->descripcion }}</h2>
        <img src="{{ asset('portadas/' . $manga->portada) }}" alt="manga">

        <h3>Capítulos:</h3>
        @if ($capitulos->isEmpty())
            <p>No hay capítulos disponibles.</p>
        @else
            @foreach ($capitulos as $capitulo)
                <a href="{{ route('detallepagina', ['capituloId' => $capitulo->id]) }}"><h3>Capítulo {{ $capitulo->num_capitulo }}</h3></a>
            @endforeach
        @endif
    @else
        <p>No se encontró el manga.</p>
    @endif
</div>
    

</body>
</html>