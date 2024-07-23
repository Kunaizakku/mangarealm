<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $manga->titulo }}</title>
</head>
<body>
    <div class="containermanga">
        
        @include('menu')
        <div class="containerq">
            @if ($manga)
                <div id="manga-info">
                    
                    <div class="nha">
                        <img class="a" src="{{ asset('portadas/' . $manga->portada) }}" alt="manga" class="manga-cover">
                        <div class="e">
                            <div id="main-header">
                                <h1>{{ $manga->titulo }}</h1>
                            </div>
                            <div class="o">
                                <div class="details u">
                                    <h3>Autor: {{ $manga->autor }}</h3>
                                </div>
                                <div class="details u">
                                    <h3>Genero: {{ $manga->genero }}</h3>
                                </div>
                                <div class="details u">
                                    <h3>Estado: {{ $manga->estatus }}</h3>
                                </div>
                            </div>
                            <div class="details">
                                <h2>Sinopsis</h2>
                                <p>{{ $manga->descripcion }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="chapters">
                    <h3>Capítulos:</h3>
                    @if ($capitulos->isEmpty())
                        <a class="chapter-link">
                            No hay capítulos disponibles.
                        </a>
                    @else
                        @foreach ($capitulos as $capitulo)
                            <a href="{{ route('detallepagina', ['capituloId' => $capitulo->id]) }}" class="chapter-link">
                                Capítulo {{ $capitulo->num_capitulo }}
                            </a>
                        @endforeach
                    @endif
                </div>
            @else
                <p>No se encontró el manga.</p>
            @endif
        </div>
    </div>
</body>
</html>
