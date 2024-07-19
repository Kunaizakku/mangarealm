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
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        #main-header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding-top: 30px;
            padding-bottom: 30px;
        }
        #main-header h1 {
            margin: 0;
        }
        #manga-info {
            background: #fff;
            padding: 20px;
            margin-top: 20px;
            display: flex;
        }
        #manga-info img {
            max-width: 200px;
            margin-right: 20px;
        }
        #manga-info .details {
            flex: 1;
        }
        #manga-info .details h2, 
        #manga-info .details p {
            margin: 0;
            margin-bottom: 10px;
        }
        #chapters {
            background: #fff;
            padding: 20px;
            margin-top: 20px;
        }
        #chapters h3 {
            margin: 0;
            margin-bottom: 10px;
        }
        #chapters a {
            display: block;
            color: #333;
            text-decoration: none;
            margin-bottom: 5px;
            padding: 10px;
            background: #f4f4f4;
            border-radius: 5px;
        }
        #chapters a:hover {
            background: #ddd;
        }
    </style>
</head>
<body>
    <header id="main-header">
        <h1>{{ $manga->titulo }}</h1>
    </header>
    @include('menu')
    <div class="container">
        @if ($manga)
            <div id="manga-info">
                <img src="{{ asset('portadas/' . $manga->portada) }}" alt="manga">
                <div class="details">
                    <h2>{{ $manga->descripcion }}</h2>
                </div>
            </div>
            <div id="chapters">
                <h3>Capítulos:</h3>
                @if ($capitulos->isEmpty())
                    <p>No hay capítulos disponibles.</p>
                @else
                    @foreach ($capitulos as $capitulo)
                        <a href="{{ route('detallepagina', ['capituloId' => $capitulo->id]) }}">Capítulo {{ $capitulo->num_capitulo }}</a>
                    @endforeach
                @endif
            </div>
        @else
            <p>No se encontró el manga.</p>
        @endif
    </div>
</body>
</html>
