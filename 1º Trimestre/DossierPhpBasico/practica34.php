<?php
$text = "Pasando datos diría.. que hay que usar urlencode";

echo "<a href='index.php?prueba=" . urlencode($text) . "&prueba2=$text'>Pasando datos</a><br>";

$recibido = $_GET["prueba"] ?? "nadita";
$recibido2 = $_GET["prueba2"] ?? "nadita";

echo "prueba (con urlencode): " . $recibido . "<br>";
echo "prueba2 (sin urlencode): " . $recibido2 . "<br>";

foreach ($_GET as $clave => $valor) {
    echo "Clave: $clave, Valor: $valor<br>";
}
?>
