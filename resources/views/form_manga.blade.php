<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario Mangas</title>
</head>
<body>

    @include('menu')

    <div style="display: flex">
        <div style="width: 70%">
            <div class="form-container">
                <div class="logo-container">
                    Formulario Mangas
                </div>
                <form class="form" action="{{route('man.insertar')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" id="fk_cat" name="fk_categoria" placeholder="Selecciona una categoria" required>
                        <input type="text" id="titulo" name="titulo" placeholder="Ingresa el nombre del titulo" required>
                        <input type="text" id="descripcion" name="descripcion" placeholder="Escribe la descripcion del manga" required>
                        <input type="text" id="autor" name="autor" placeholder="Ingresa el nombre del autor" required>
                        <input type="text" id="genero" name="genero" placeholder="Ingresa el genero del manga" required>
                        <input style="display: none" type="text" id="estatus" name="estatus" placeholder="Ingresa el estatus" required>
                    </div>fk_categoria	titulo	descripcion	autor	genero	estatus
                    <button class="form-submit-btn" type="submit">Guardar</button>
                </form>
            </div>
        </div>
        <div style="width: 70%; margin-left: 20px">
            <div class="table_cat">
                <table>
                    <thead>
                        <tr>
                            <th>Categorias existentes</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos_cat as $dato)
                            <tr>
                                <td>{{ $dato->nom_cat }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


</body>
</html>
