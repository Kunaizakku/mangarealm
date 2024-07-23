<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/normalize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
   <div class="wrapper">
      <!-- Login form here -->
      @if(session('success'))
          <script>
              Swal.fire({
                  title: 'Éxito',
                  text: '{{ session('success') }}',
                  icon: 'success',
                  confirmButtonText: 'Ok'
              });
          </script>
      @endif

      @if(session('error_credentials'))
          <script>
              Swal.fire({
                  title: 'Error',
                  text: '{{ session('error_credentials') }}',
                  icon: 'error',
                  confirmButtonText: 'Ok'
              });
          </script>
      @endif

      @if(session('error_retry'))
          <script>
              Swal.fire({
                  title: 'Intento Fallido',
                  text: '{{ session('error_retry') }}',
                  icon: 'warning',
                  confirmButtonText: 'Ok'
              });
          </script>
      @endif

      @if(session('error_status'))
          <script>
              Swal.fire({
                  title: 'Cuenta Desactivada',
                  text: '{{ session('error_status') }}',
                  icon: 'warning',
                  confirmButtonText: 'Ok'
              });
          </script>
      @endif
      <div class="wrapper">
         <div class="card-switch">
            <label class="switch">
               <input type="checkbox" class="toggle">
               <span class="slider"></span>
               <span class="card-side"></span>
               <div class="flip-card__inner">
                  <div class="flip-card__front">
                     <div class="title">Inicia Sesión</div>
                     <form class="flip-card__form" action="{{route('usuario.login') }}" method="POST">
                        @csrf
                        <input class="flip-card__input" name="user" placeholder="Usuario" type="text">
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
   </div>
</body>
</html>
