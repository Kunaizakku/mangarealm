<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Categorias</title>
</head>
<body>

    @include('menu')

    <div class="contenedor-cards">

        @foreach ($cats as $dato)
            <a style="text-decoration: none" href="{{ route('cat.manga', ['categoriaId' => $dato->id]) }}">
                <div class="card-manga">
                    <div class="card-manga__content">
                        <h1 style="margin: auto">{{ $dato->nom_cat }}</h1>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

    

</body>
</html>