<?php

/**Probar el script anterior y observar que ocurre. ¿ qué mensaje de error se observa ?
 * Parse error: syntax error, unexpected string content "", 
 * expecting "-" or identifier or variable or number in 
 * C:\Users\santi\Desktop\SantiagoTorresAED-main\SantiagoTorresAED-main\1º Trimestre\DossierPhpBasico\practica12.php on line 5
*/
$array = array('uno' => 1, 'dos' => 2, 'tres' => 40, 'cuatro' => 55);        
$cadena = "La posición 'tres' contiene el dato {$array['tres']}";        
echo $cadena;    
?>