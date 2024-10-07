<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="SubirFicheroController.php" enctype='multipart/form-data' method="post">
        @csrf
        <label for="fichero">sube fichero</label>
        <input type="file" name="myfile" id="fichero">
        <input type="submit" value="Subir">
        </form>
</body>
</html>
