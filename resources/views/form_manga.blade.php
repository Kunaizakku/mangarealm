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
                {{-- cambio --}}
                <form class="form" action="{{route('man.insertar')}}" method="POST" >
                    @csrf
                    <div class="form-group">
                        <select id="fk_cat" name="fk_categoria" required>
                            <option value="" disabled selected>Selecciona una categoría</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nom_cat }}</option>
                            @endforeach
                        </select>
                        {{-- <input type="text" id="fk_categoria" name="fk_categoria" placeholder="Ingresa el nombre de la categoria" required> --}}
                        <input type="text" id="titulo" name="titulo" placeholder="Ingresa el nombre del titulo" required>
                        <input type="text" id="descripcion" name="descripcion" placeholder="Escribe la descripcion del manga" required>
                        <input type="text" id="autor" name="autor" placeholder="Ingresa el nombre del autor" required>
                        <input type="text" id="genero" name="genero" placeholder="Ingresa el genero del manga" required>

                    </div>
                    <button class="form-submit-btn" type="submit">Guardar</button>
                </form>
            </div>
        </div>

    </div>

</body>
</html>
