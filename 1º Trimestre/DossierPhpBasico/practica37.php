<?php
$nombre = $correo = $genero = "";
$errores = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $genero = $_POST['genero'];

    if (empty($nombre)) {
        $errores[] = "El nombre no puede estar vacío.";
    }

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo no es válido.";
    }

    if (empty($genero)) {
        $errores[] = "Debes seleccionar un género.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Validación</title>
</head>
<body>
    <h1>Formulario de Validación</h1>
    <form method="post" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo htmlspecialchars($nombre); ?>" required>
        <br>

        <label for="correo">Correo:</label>
        <input type="email" id="correo" name="correo" value="<?php echo htmlspecialchars($correo); ?>" required>
        <br>

        <label for="genero">Género:</label>
        <select id="genero" name="genero" required>
            <option value="">Selecciona</option>
            <option value="masculino" <?php echo ($genero == 'masculino') ? 'selected' : ''; ?>>Masculino</option>
            <option value="femenino" <?php echo ($genero == 'femenino') ? 'selected' : ''; ?>>Femenino</option>
        </select><br>

        <input type="submit" value="Enviar">
    </form>

    <?php if (!empty($errores)): ?>
        <h3 >Errores:</h3>
        <ul>
            <?php foreach ($errores as $error): ?>
                <li><?php echo $error; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php elseif ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h3>Datos ingresados:</h3>
        <p>Nombre: <?php echo htmlspecialchars($nombre); ?></p>
        <p>Correo: <?php echo htmlspecialchars($correo); ?></p>
        <p>Género: <?php echo htmlspecialchars($genero); ?></p>
    <?php endif; ?>
</body>
</html>
