<!-- resources/views/form_pagina.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Páginas</title>
    <script>
        var nextIndex = 1; // Inicializar el índice para el próximo conjunto de campos
        function addFields() {
            var container = document.getElementById("fields-container");
            var newFieldGroup = document.createElement("div");

            newFieldGroup.innerHTML = `
                <div class="field-group">
                    <input type="hidden" name="paginas[${nextIndex}][fk_capitulo]" value="{{ $capituloId }}" required>
                    <input type="number" name="paginas[${nextIndex}][num_pagina]" placeholder="Número de página" required>
                    <input type="file" name="paginas[${nextIndex}][imagen]" accept="image/*" required>
                    <button type="button" onclick="removeField(this)">Eliminar</button>
                </div>
            `;

            container.appendChild(newFieldGroup);
            nextIndex++; // Incrementar el índice para el próximo conjunto de campos

        }

        function removeField(button) {
            button.parentElement.remove();
        }
    </script>
</head>
<body>
    @include('menu');
    <form action="{{ route('submit_form') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div id="fields-container">
            <div class="field-group">
                <input type="hidden" name="paginas[0][fk_capitulo]" value="{{ $capituloId }}" required>
                <input type="number" name="paginas[0][num_pagina]" placeholder="Número de página" required>
                <input type="file" name="paginas[0][imagen]" accept="image/*" required>
            </div>
        </div>
        <button type="button" onclick="addFields()">Agregar más</button>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
