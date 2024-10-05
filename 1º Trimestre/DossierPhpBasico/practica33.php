<?php
$text = "Pasando datos diría.. que hay que usar urlencode";

echo "<a href='index.php?prueba=" . urlencode($text) . "&prueba2=$text'>Pasando datos</a>";

$recibido = $_GET["prueba"] ?? "nadita";
$recibido2 = $_GET["prueba2"] ?? "nadita";

echo "<h3>Se ha recibido:</h3>";
echo "prueba (con urlencode): " . $recibido . "<br>";
echo "prueba2 (sin urlencode): " . $recibido2 . "<br>";
?>
