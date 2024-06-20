<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Login</title>
</head>
<body>
    <div class="wrapper">
        <div class="card-switch">
            <label class="switch">
               <input type="checkbox" class="toggle">
               <span class="slider"></span>
               <span class="card-side"></span>
               <div class="flip-card__inner">
                  <div class="flip-card__front">
                     <div class="title">Inicia Sesión</div>
                     <form class="flip-card__form" action="">
                        <input class="flip-card__input" name="email" placeholder="Correo" type="email">
                        <input class="flip-card__input" name="password" placeholder="Contraseña" type="password">
                        <button class="flip-card__btn">Entar!</button>
                     </form>
                  </div>
                  <div class="flip-card__back">
                     <div class="title">Registrate</div>
                     <form class="flip-card__form" action="{{route('usuario.insertar')}}" method="POST">
                        @csrf
                        <input class="flip-card__input" name="username" placeholder="Username" type="username">
                        <input class="flip-card__input" name="email" placeholder="Correo" type="email">
                        <input class="flip-card__input" name="password" placeholder="Contraseña" type="password">
                        <button type="submit" class="flip-card__btn">Confirmar!</button>
                     </form>
                  </div>
               </div>
            </label>
        </div>   
   </div>
</body>
</html>
