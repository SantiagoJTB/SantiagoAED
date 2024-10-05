<?php

$num = rand(0, 99);

file_put_contents("fichero.txt", $num. "\n", FILE_APPEND);

echo"se introdujo el numero en el fichero <br/>";

$numObtenido[] = file_get_contents("fichero.txt");

echo "el numero aleatorio es ".$numeroObtenido[end()]."<br/>";

echo "registro:".$numObtenido."<br/>";

for($i = 0; $i <= count($numObtenido); $i++){

}

echo "se actualizo el fichero <br/>".obtener_elemento();



?>