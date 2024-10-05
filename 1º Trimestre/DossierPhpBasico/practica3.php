<?php
declare( strict_types=1);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<header>texto</header>
<body>
<?php
function sum( int $a, int $b): int {
return $a + $b;
}
echo "<p> la suma de uno más dos es: ";
$resultado = sum(1,2);
print sum(1,2);
echo "</p>"


/**Realizar el código anterior y tomar captura de pantalla del resultado. ¿qué es lo
que ha ocurrido?. Muestra: la suma de uno más dos es: 3
Poner código html antes de la declaración de strict_types y probar de
nuevo ¿qué ocurre ahora? No permite lanzarlo*/


?>
</body>
</html>