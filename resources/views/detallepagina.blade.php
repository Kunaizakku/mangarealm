<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .title-container {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-top: 20px;
            margin-bottom: 20px;
        }

        h1 {
            color: #333;
            font-weight: bold;
            font-size: 2em;
        }

        .image-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px; /* Espacio entre las imágenes */
        }

        .image-container img {
            width: 700px; /* Ancho fijo para todas las imágenes */
            height: auto; /* Mantiene la relación de aspecto */
            object-fit: cover; /* Ajusta la imagen para que cubra el contenedor */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

    </style>
</head>
<body>
    @include('menu')

    <div class="space"></div>
    <div class="title-container">
        <div class="button-container">
            <a class="button" href="{{ route('detalle_mangas', ['mangaId' => $mangaId]) }}">
                <span class="button_top">
                    Volver a la lista de episodios
                </span>
            </a>
        </div>
    </div>

    <div class="title-container">
        
        <div class="button-container">
            @if ($prevCapitulo)
                <a class="button" href="{{ route('detallepagina', ['capituloId' => $prevCapitulo->id]) }}">
                    <span class="button_top">
                        Capítulo anterior
                    </span>
                </a>
            @else
                <span class="placeholder"></span>
            @endif
        </div>

        <h1>Capítulo {{ $num_capitulo }}</h1>

        <div class="button-container">
            @if ($nextCapitulo)
                <a class="button" href="{{ route('detallepagina', ['capituloId' => $nextCapitulo->id]) }}">
                    <span class="button_top">
                        Capítulo Siguiente
                    </span>
                </a>
            @else
                <span class="placeholder"></span>
            @endif
        </div>
    </div>

    <div class="image-container">
        @foreach ($pag_cap as $cap)
            <img src="{{ asset($cap->imagen) }}" alt="capitulo">
        @endforeach
    </div>

    <div class="button-container">
        @if ($prevCapitulo)
            <a class="button" href="{{ route('detallepagina', ['capituloId' => $prevCapitulo->id]) }}">
                <span class="button_top">
                    Capítulo anterior
                </span>
            </a>
        @endif

        @if ($nextCapitulo)
            <a class="button" href="{{ route('detallepagina', ['capituloId' => $nextCapitulo->id]) }}">
                <span class="button_top">
                    Capítulo Siguiente
                </span>
            </a>
        @endif
    </div>
</body>
</html>
