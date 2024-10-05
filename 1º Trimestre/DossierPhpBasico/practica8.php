<?php

/**Ejecutar el script anterior ¿ hay alguna diferencia antes y después del cast ? si, se convierte al tipo que se le indicó.
Tomar captura de pantalla*/

$unavar = 1.3;
var_dump($unavar);
echo "<br>";
$unavar = (int) $unavar;
var_dump($unavar);

?>