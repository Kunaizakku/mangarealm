<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Páginas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .container {
            width: 80%;
            max-width: 600px;
            background: #fff;
            padding: 20px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .field-group {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }

        .field-group input[type="number"],
        .field-group input[type="file"] {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-top: 5px;
            margin-right: 10px;
            flex-grow: 1;
        }

        .field-group button {
            padding: 10px;
            border: none;
            background-color: #e74c3c;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }

        .field-group button:hover {
            background-color: #c0392b;
        }

        button[type="button"], button[type="submit"] {
            padding: 10px 15px;
            border: none;
            background-color: #3498db;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        button[type="button"]:hover, button[type="submit"]:hover {
            background-color: #2980b9;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var nextIndex = 1; // Inicializar el índice para el próximo conjunto de campos

            function updatePageNumbers() {
                var pageInputs = document.querySelectorAll('input[name^="paginas["][name$="[num_pagina]"]');
                pageInputs.forEach((input, index) => {
                    input.value = index + 1;
                });
            }

            function addFields() {
                var container = document.getElementById("fields-container");
                var newFieldGroup = document.createElement("div");
                newFieldGroup.className = 'field-group';

                newFieldGroup.innerHTML = `
                    <input type="hidden" name="paginas[${nextIndex}][fk_capitulo]" value="{{ $capituloId }}" required>
                    <input type="hidden" name="paginas[${nextIndex}][num_pagina]" placeholder="Número de página" required readonly>
                    <input type="file" name="paginas[${nextIndex}][imagen]" accept="image/*" required>
                    <button type="button" onclick="removeField(this)">Eliminar</button>
                `;

                container.appendChild(newFieldGroup);
                nextIndex++; // Incrementar el índice para el próximo conjunto de campos
                updatePageNumbers();
            }

            function removeField(button) {
                button.parentElement.remove();
                updatePageNumbers();
            }

            document.getElementById('add-field-button').addEventListener('click', addFields);

            window.removeField = removeField; // Hacer la función globalmente accesible
        });
    </script>
</head>
<body>
    @include('menu')
    <div class="space"></div>
    <div class="container">
        <form action="{{ route('submit_form') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div id="fields-container">
                <div class="field-group">
                    <input type="hidden" name="paginas[0][fk_capitulo]" value="{{ $capituloId }}" required>
                    <input type="hidden" name="paginas[0][num_pagina]" placeholder="Número de página" value="1" readonly required>
                    <input type="file" name="paginas[0][imagen]" accept="image/*,.pdf" required>
                    <button type="button" onclick="removeField(this)">Eliminar</button>
                </div>
            </div>
            <button type="button" id="add-field-button">Agregar más</button>
            <button type="submit">Enviar</button>
        </form>
    </div>
</body>
</html>
