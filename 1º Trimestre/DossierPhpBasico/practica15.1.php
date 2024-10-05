<?php
$array = [];
$array["clave1"] = "valor1";
$array["clave2"] = "valor2";  
$array[] = "valor3";          

var_dump($array);

for ($i = 0; $i < count($array); $i++) {
    echo $array[$i] . "<br>";
}
?>
