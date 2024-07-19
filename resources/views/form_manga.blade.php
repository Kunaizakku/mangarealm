<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario Mangas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 100px;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
       }

        .container {
            width: 90%;
            max-width: 800px;
            background: url('images/ojosmanga2.png') no-repeat center center; /* Imagen de fondo */
            background-size: cover; /* Ajusta la imagen para cubrir el área */
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            position: relative; /* Asegura que el contenedor se posicione correctamente */
            z-index: 1; /* Hace que el contenedor esté encima de la imagen de fondo */
        }

        .logo-container {
            font-size: 2em;
            margin-bottom: 20px;
            text-align: center;
            color: #333;
            font-weight: bold;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            background-color: rgba(255, 255, 255, 0.7); /* Fondo blanco semitransparente */
            padding: 10px;
            border-radius: 5px;
            display: flex;
            justify-content: center;
            align-items: center;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
        }

        .form {
            display: flex;
            flex-direction: column;
            background: rgba(255, 255, 255, 0.5); /* Fondo semitransparente para el formulario */
            border-radius: 10px;
            padding: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group select,
        .form-group input {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
            margin-bottom: 10px;
        }

        .form-submit-btn {
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #28a745;
            color: white;
            font-size: 1em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-submit-btn:hover {
            background-color: #218838;
        }

        .animated-button {
            position: relative;
            display: inline-block;
            padding: 12px 24px;
            border: none;
            font-size: 16px;
            background-color: inherit;
            border-radius: 100px;
            font-weight: 600;
            color: black;
            box-shadow: 0 0 0 2px #f65e22;
            cursor: pointer;
            overflow: hidden;
            transition: all 0.6s cubic-bezier(0.23, 1, 0.320, 1);
        }

        .animated-button span:last-child {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 20px;
            height: 20px;
            background-color: #f65e22;
            border-radius: 50%;
            opacity: 0;
            transition: all 0.8s cubic-bezier(0.23, 1, 0.320, 1);
        }

        .animated-button span:first-child {
            position: relative;
            z-index: 1;
        }

        .animated-button:hover {
            box-shadow: 0 0 0 2.5px black;
            color: black;
        }

        .animated-button:active {
            scale: 0.95;
        }

        .animated-button:hover span:last-child {
            width: 800px;
            height: 800px;
            opacity: 1;
        }
        .btn {
 padding: 1.1em 2em;
 background: none;
 border: 2px solid #fff;
 font-size: 15px;
 color: #131313;
 cursor: pointer;
 position: relative;
 overflow: hidden;
 transition: all 0.3s;
 border-radius: 12px;
 background-color: #ecd448;
 font-weight: bolder;
 box-shadow: 0 2px 0 2px #000;
}

.btn:before {
 content: "";
 position: absolute;
 width: 100px;
 height: 120%;
 background-color: #ff6700;
 top: 50%;
 transform: skewX(30deg) translate(-150%, -50%);
 transition: all 0.5s;
}

.btn:hover {
 background-color: #4cc9f0;
 color: #fff;
 box-shadow: 0 2px 0 2px #0d3b66;
}

.btn:hover::before {
 transform: skewX(30deg) translate(150%, -50%);
 transition-delay: 0.1s;
}

.btn:active {
 transform: scale(0.9);
}
    </style>
</head>
<body>

    @include('menu')

    <div class="container">
        <div class="logo-container">
            Formulario Mangas
        </div>

                <form class="form" action="{{route('man.insertar')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <select id="fk_cat" name="fk_categoria" required>
                            <option value="" disabled selected>Selecciona una categoría</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">{{ $categoria->nom_cat }}</option>
                            @endforeach
                        </select>

                        <input type="text" id="titulo" name="titulo" placeholder="Ingresa el nombre del titulo" required>
                        <input type="text" id="descripcion" name="descripcion" placeholder="Escribe la descripcion del manga" required>
                        <input type="text" id="autor" name="autor" placeholder="Ingresa el nombre del autor" required>
                        <input type="text" id="genero" name="genero" placeholder="Ingresa el genero del manga" required>
                        <input type="file" id="portada" name="portada" required>

                    </div>
                    <button class="btn">Guardar</button></button>
                    </div>

                    
                </form>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
