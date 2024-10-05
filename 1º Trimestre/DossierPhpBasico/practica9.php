<?php

/**Crear un script que muestre las potencias del número 2 desde 2¹ hasta 2⁹ hacer
uso del operador: **
Ir concatenando las salidas en pantalla de las potencias en una string mediante el operador de
concatenación y asignación: .=*/

for($i = 1; $i <= 9; $i++){
   $resultado = 2**$i;
   echo $resultado.", ";
}

?>