<?php $os = array("Mac", "NT", "Irix", "Linux");
if (in_array("Irix", $os)) {
    echo "Existe Irix";
}
if (in_array("mac", $os)) {
    echo         "Existe mac";
}

/**Existe Irix */


$a = array('1.10', '12.4', '1.13'); 

if (in_array('12.4', $a, true)) {
    echo "Se encontró '12.4' con comprobación estricta<br/>";
}

if (in_array('1.13', $a, true)) {
    echo "Se encontró '1.13' con comprobación estricta<br/>";
}

/**Se encontró '12.4' con comprobación estricta
 Se encontró '1.13' con comprobación estricta */

 $array = array(0 => 'azul', 1 => 'rojo', 2 => 'verde', 3 => 'rojo');
 $clave = array_search ('verde', $array);
 echo $clave . "<br>"; 
 $clave = array_search ('marrón', $array);  
 if( $clave === FALSE) 
 echo "no se ha localizado el valor"; 
else echo $clave; ?>



