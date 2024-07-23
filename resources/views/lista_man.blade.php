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
                    <th>Titulo</th>
                    <th>Estatus</th>
                    <th>Cambiar estatus</th>
                </tr>
            </thead>
            @foreach ($manga as $dato)
            <tbody>
                <tr>
                    <td>{{ $dato->titulo }}</td>
                    <td>{{ $dato->estatus }}</td>
                    <td>

                        <a href="{{route('man.act', ['id' => $dato->id, 'estatus' => 'En emision'])}}">
                            <i title="Ver detalles"  class="boton-guardar">En emision</i>
                        </a>

                        <a href="{{route('man.act', ['id' => $dato->id, 'estatus' => 'Pausado'])}}">
                            <i title="Ver detalles"  class="boton-guardar">Pausado</i>
                        </a>

                        <a href="{{route('man.act', ['id' => $dato->id, 'estatus' => 'Finalizado'])}}">
                            <i title="Ver detalles"  class="boton-guardar">Finalizado</i>
                        </a>

                    </td>
                </tr>

                <!-- Repite esta estructura para cada viático del usuario -->
            </tbody>
            @endforeach
        </table>
    </div>

</body>
</html>