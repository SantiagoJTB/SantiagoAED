<?php

/**Visualizar lo anterior ¿ se encuentran diferencias entre null y unset() ? 
 * No, se muestran igual
 * Tomar captura de pantalla*/

$variable = null;
var_dump($variable);
unset($variable);
var_dump($variable);

?>