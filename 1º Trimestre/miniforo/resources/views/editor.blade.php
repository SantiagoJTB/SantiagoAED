<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejemplo Editor</title>

    <script src="https://cdn.tiny.cloud/1/uib4mpg7fler2clxjjt2tnehu9s6qxjwy7eb3obmyc70l3lp/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
        tinymce.init({
            selector: 'textarea',
            plugins: [
                'anchor', 'autolink', 'charmap', 'codesample', 'emoticons', 'image', 'link', 'lists', 'media', 'searchreplace', 'table', 'visualblocks', 'wordcount',
            ],
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>

</head>
<body>

    <form action="editorpost" method="post">
        @csrf
        <input type="hidden" name="contenido" id="contenido">
        <textarea id="editor">{{ $contenido }}</textarea><br />

        <input type="text" name="nombreFichero" placeholder="Introduce el nombre" required>
        <input type="submit" value="Guardar"><br />
    </form>

    <script>
        // Obtener el contenido del editor al enviar el formulario
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault();
            document.getElementById('contenido').value = tinymce.activeEditor.getContent();
            this.submit();
        });
    </script>
</body>
</html>
