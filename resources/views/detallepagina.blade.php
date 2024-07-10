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

    <h1>Capitulo {{ $num_capitulo }}</h1>

    @foreach ($pag_cap as $cap)
        <img src="{{ asset($cap->imagen) }}" alt="capitulo">
    @endforeach

</body>
</html>