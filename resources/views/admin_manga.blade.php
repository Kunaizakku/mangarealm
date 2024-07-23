<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Manga</title>
</head>
<body>
    @include('menu')

    <div class="containerform">

        <div class="card">
            <div class="card-details">
                <p style="text-align: center" class="text-title">Lista de Mangas</p>
                <p class="text-body">Hola Tonotos</p>
            </div>
            <a type="button" href="{{ route('man.admin') }}" class="card-button" style="text-decoration: none; color: initial;">Ingresar</a>
        </div>
        <div class="card">
            <div class="card-details">
                <p style="text-align: center" class="text-title">Lista de Usuarios</p>
                <p class="text-body">Hola Tonotos</p>
            </div>
            <a type="button" href="{{ route('user.admin') }}" class="card-button" style="text-decoration: none; color: initial;">Ingresar</a>
        </div> 
    </div> 
    
</body>
</html>