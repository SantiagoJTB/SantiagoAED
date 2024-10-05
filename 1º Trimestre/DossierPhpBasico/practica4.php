<?php
declare( strict_types=1);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<?php
function fun( int $a, int $b): int {
$a = "o";
//return $a;
return $b ;
}
print fun(1,2);
print fun(2,3);
echo "</p>"

/**Tomar captura de pantalla de: se muestra un 2, ya que print fun esta imprimiendo la primera funcion con valor de 2. 
- probar el código anterior ¿da error? ¿por qué? 
- quitar el comentario a: return $a; ¿da error ahora? ¿por qué? sí, ya que el tipo de datos que se espera que retorne es entero.
- quitar comentario a: print fun(“e”,3); ¿da error?*/
?>
</body>
</html>