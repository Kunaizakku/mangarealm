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

    <div class="container_table">
        <h1 class="title_table">Lista de mangas</h1>
        @if(session('success'))
            <script>
                Swal.fire({
                    title: '¡Éxito!',
                    text: '{{ session('success') }}',
                    icon: 'success'
                });
            </script>
        @endif
        <table>
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Rol</th>
                    <th>Estatus</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            @foreach ($usuario as $dato)
            <tbody>
                <tr>
                    <td>{{ $dato->username }}</td>
                    <td>{{ $dato->email }}</td>
                    <td>@if ($dato->rol == 2)
                            Admin
                        @else
                            User
                        @endif
                    </td>
                    <td>@if ($dato->estatus == 1)
                            Activo
                        @else
                            Inactivo
                        @endif
                    </td>
                    <td>

                        <a href="{{route('user.act', ['id' => $dato->id, 'rol' => '2'])}}">
                            <i title="Ver detalles"  class="boton-guardar">Admin</i>
                        </a>

                        <a href="{{route('user.act', ['id' => $dato->id, 'rol' => '1'])}}">
                            <i title="Ver detalles"  class="boton-guardar">User</i>
                        </a>

                        @if ($dato->estatus == 1)
                            <a href="{{route('user.act.est', ['id' => $dato->id, 'estatus' => '0'])}}">
                                <i title="Ver detalles"  class="boton-guardar">Desactivar cuenta</i>
                            </a>
                        @else
                            <a href="{{route('user.act.est', ['id' => $dato->id, 'estatus' => '1'])}}">
                                <i title="Ver detalles"  class="boton-guardar">Activar Cuenta</i>
                            </a>
                        @endif

                        

                    </td>
                </tr>

                <!-- Repite esta estructura para cada viático del usuario -->
            </tbody>
            @endforeach
        </table>
    </div>


</body>
</html>