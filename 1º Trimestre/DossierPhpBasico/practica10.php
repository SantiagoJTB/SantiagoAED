<?php

/**Crear un programa en php que obtenga la descomposición de un número que
esté almacenado en la variable: $numero Por ejemplo: $numero = 3102 Se pretende que
se utilicen en el programa los operadores: .= , **
Para el ejemplo anterior se debe mostrar en pantalla: 2 * 1 + 0 * 10 + 1 * 100 + 3 * 1000*/

$numero = 3102;
$numeroStr = strval($numero);
$longitud = strlen($numeroStr);
$cadena_invertida = strrev($numero);
$numeroArray = $cadena_invertida;
$potencia = 1;

for($i = 0; $i < $longitud; $i++){

    $caracter = $cadena_invertida[$i];
    echo $caracter ."*". $potencia ."+" ;
    $potencia = $potencia*10;
}

?>