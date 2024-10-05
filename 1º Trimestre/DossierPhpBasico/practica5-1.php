<?php

/**var_dump($mivar) nos muestra el contenido de la variable $mivar Crear un
array: $mivar = []; Introducir datos: array_push($mivar,”uno”); y hacer una
asignación a otras variables. Una por referencia y la otra por valor:
$arr1 = $mivar;
$arr2 = &$mivar;
modificar la posición cero de esas variable: $arr1[0] = “una variación”; $arr2[0] =
“variando array2 ”;
y mostrar el contenido de $mivar[0] y $arr1[0]
¿qué es lo que ha ocurrido? ( tomar captura de pantalla y explicarlo)

*/
$mivar = [];
var_dump($mivar);
$arr1 = $mivar;
$arr2 = &$mivar;
$arr1[0] = "una variación"; 
$arr2[0] ="variando array2";
echo $mivar[0];
echo $arr1[0];
?>