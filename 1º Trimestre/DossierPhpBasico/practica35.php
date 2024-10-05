<?php
// Inicializar la variable para el número
$numero = null;

// Comprobar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el número introducido y validar
    $numero = $_POST['numero'];

    // Comprobar si el número es un entero positivo
    if (is_numeric($numero) && (int)$numero == $numero && $numero > 0) {
        $numero = (int)$numero; // Convertir a entero
    } else {
        $numero = null; // Invalidar el número si no es positivo
        $error = "Por favor, introduce un número entero positivo.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Multiplicar</title>
</head>
<body>
    <h1>Tabla de Multiplicar</h1>
    <form method="post" action="">
        <label for="numero">Introduce un número entero positivo:</label>
        <input type="text" id="numero" name="numero" required>
        <input type="submit" value="Mostrar Tabla">
    </form>

    <?php if ($numero !== null): ?>
        <h2>Tabla de multiplicar del <?php echo $numero; ?>:</h2>
        <table>
            <tr>
                <th>Multiplicador</th>
                <th>Resultado</th>
            </tr>
            <?php for ($i = 1; $i <= 10; $i++): ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $numero * $i; ?></td>
                </tr>
            <?php endfor; ?>
        </table>
    <?php elseif (isset($error)): ?>
        <p><?php echo $error; ?></p>
    <?php endif; ?>
</body>
</html>
