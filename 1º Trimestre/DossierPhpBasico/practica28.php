<?php
function sumar($a, $b, $print): float { // Quitar valor por defecto
    $suma = $a + $b;
    if ($print) {
        echo "resultado suma: $suma <br>";
    }
    return $suma;
}

$sum1 = sumar(1, 2);
$sum2 = sumar(4, 5, true); 

echo "las operaciones para sum1 y sum2 dan: $sum1 , $sum2";
/**Se detiene el programa y se genera un error, ya que no 
 * se está proporcionando un valor para el parámetro */
?>
