<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario Categorias</title>
</head>
<body>
    
    @include('menu')

    <div style="display: flex">
        <div style="width: 70%">
            <div class="form-container">
                <div class="logo-container">
                    Formulario Categoria
                </div>
                <form class="form" action="{{route('cat.insertar')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="text" id="email" name="nom_cat" placeholder="Ingresa el nombre de la categoria" required>
                    </div>
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