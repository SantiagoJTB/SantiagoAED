<?php
function modify(array $arr): void {
    $arr[] = 4; // Intenta agregar un elemento al array
}

$a = [1]; // Array inicial
modify($a); // Llamada a la función
print_r($a); // Imprime el array

function modify2(array &$arr): void {
    $arr[] = 4; // Agrega 4 al array
}

$a = [1]; // Array inicial
modify2($a); // Llamada a la función
print_r($a); // Imprime el array
?>

