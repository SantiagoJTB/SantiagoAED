<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variables de $_SERVER</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
    </style>
</head>
<body>

    <h1>Valores de $_SERVER</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre de la Variable</th>
                <th>Valor</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($_SERVER as $key => $value) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($key) . "</td>"; 
                echo "<td>" . htmlspecialchars($value) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>
