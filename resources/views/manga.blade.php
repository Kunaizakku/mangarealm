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
    <div class="space"></div>

    <div class="container_card">
    
        @foreach ($mangas as $dato)
            <a href="{{ route('detalle_mangas', ['mangaId' => $dato->id]) }}">
                <div class="flip-card">
                    <div class="flip-card-inner">
                        <div class="flip-card-front">
                            <div class="profile-image">
                                <img clas="pfp" src="{{ asset('portadas/' . $dato->portada) }}" alt="">
                                <div class="name">
                                    {{ $dato->titulo }}
                                </div>
                            </div>
                        </div>
                        <div class="flip-card-back">
                            <div class="Description">
                                <p class="description">
                                    {{ $dato->descripcion }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>    
            </a>  
        @endforeach
    </div>

</body>
</html>