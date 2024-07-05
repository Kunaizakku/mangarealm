<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario Captitulo</title>
</head>
<body>
    @include('menu')
    <div class="form-cap-container">
        <div class="h1_form_cap">
            <h1>Selecciona el manga a agregar el capitulo</h1>
        </div>
        <div class="container_card">
            <a href="{{ route('man.mostrarMangaCap') }}" style="text-decoration: none">

            @foreach ($mangas as $manga)
        <a href="{{ route('cap.mostrar', ['id' => $manga->id]) }}" style="text-decoration: none">
                <article class="article-wrapper">
                    <div class="rounded-lg container-project">
            <img class="img_form_cap" src="{{ asset('portadas/' . $manga->portada) }}" alt="Portada de {{ $manga->titulo }}">
        </div>
        <div class="project-info">
            <div class="flex-pr">
                <div class="project-title text-nowrap">{{ $manga->titulo }}</div>
                <div class="project-hover">
                    <svg class="svg_form_cap" xmlns="http://www.w3.org/2000/svg" stroke-linejoin="round" stroke-linecap="round" viewBox="0 0 24 24" stroke-width="2" fill="none" stroke="currentColor">
                        <line y2="12" x2="19" y1="12" x1="5"></line>
                        <polyline points="12 5 19 12 12 19"></polyline>
                    </svg>
                </div>
            </div>
        </div>
        </article>
        </a>
            @endforeach


        </a>




        </div>
    </div>
</body>
</html>
