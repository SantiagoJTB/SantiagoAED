<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juego del Número Secreto</title>
</head>
<body>
    <h1>Juego del Número Secreto</h1>

    <form action="juego.php" method="POST">
        <label for="numeroCliente">Adivina el número (0-99):</label>
        <input type="number" name="numeroCliente" id="numeroCliente" required>
        <input type="submit" value="Enviar">
    </form>

    <p style="color:green;">
        <?php
        if (isset($_GET['victoria'])) {
            echo htmlspecialchars($_GET['victoria']);
        }
        ?>
    </p>
    <p style="color:red;">
        <?php
        if (isset($_GET['error'])) {
            echo htmlspecialchars($_GET['error']);
        }
        ?>
    </p>

    <h3>Números intentados:</h3>
    <ul>
        <?php
        if (file_exists("numeros.txt")) {
            $numerosIntentados = file("numeros.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
            foreach ($numerosIntentados as $numero) {
                echo "<li>" . htmlspecialchars($numero) . "</li>";
            }
        } else {
            echo "<li>No hay intentos previos.</li>";
        }
        ?>
    </ul>
</body>
</html>
