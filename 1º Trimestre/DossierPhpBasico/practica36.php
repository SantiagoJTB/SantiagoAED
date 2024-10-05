<?php
$numeros = [];
$impares = [];
$pares = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entrada = $_POST['numeros'];
    $numeros = explode(" ", $entrada); 

    foreach ($numeros as $numero) {
        if (is_numeric($numero)) { 
            if ((int)$numero % 2 !== 0) {
                $impares[] = (int)$numero; 
            } else {
                $pares[] = (int)$numero; 
            }
        }
    }

    usort($impares, fn($a, $b) => $a - $b);
    usort($pares, fn($a, $b) => $a - $b);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Números</title>
</head>
<body>
    <h1>Introduce una cadena de números</h1>
    <form method="post" action="">
        <label for="numeros">Números (separados por espacios):</label>
        <input type="text" id="numeros" name="numeros" required>
        <input type="submit" value="Mostrar Números">
    </form>

    <?php if (!empty($impares) || !empty($pares)): ?>
        <h2>Números impares:</h2>
        <ul>
            <?php foreach ($impares as $numero): ?>
                <li><?php echo $numero; ?></li>
            <?php endforeach; ?>
        </ul>

        <h2>Números pares:</h2>
        <ul>
            <?php foreach ($pares as $numero): ?>
                <li><?php echo $numero; ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
