<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario Categorias</title>
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
            display: flex;
            justify-content: space-between;
            width: 90%;
            max-width: 1200px;
            gap: 60px; /* Incrementa el espacio entre los cuadros */
        }

        .form-section, .table-section {
            flex: 1;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9); /* Fondo blanco semitransparente */
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        .form-section {
            background: url('images/ace2.png') no-repeat bottom right;
            background-size: 100% 150%;
        }

        .table-section {
            background: url('images/ojosmanga2.png') no-repeat bottom right;
            background-size: 100% 150%; /* Ajusta el tamaño para cubrir toda el área */
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
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group input {
            width: 96%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1em;
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

        .table_cat table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table_cat th, .table_cat td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        .table_cat th {
            background-color: #f2f2f2;
        }

        .error, .success {
            padding: 10px;
            margin-top: 10px;
            border-radius: 4px;
            color: white;
        }

        .error {
            background-color: #dc3545;
        }

        .success {
            background-color: #28a745;
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
            width: 540px;
            height: 540px;
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
        <div class="form-section">
            <div class="logo-container">
                Formulario Categoría
            </div>
            <form class="form" action="{{route('cat.insertar')}}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" id="email" name="nom_cat" placeholder="Ingresa el nombre de la categoría" required>
                </div>
                <button class="btn">Guardar</button>
            </form>
        </div>

        <div class="table-section">
            <div class="logo-container">
                Categorías existentes
            </div>
            <div class="table_cat">
                <table>
                    <thead>
                        <tr>
                            <th>Categorías existentes</th>
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

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>Esta categoría ya existe</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

</body>
</html>
