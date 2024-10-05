<?php $array = [];
$array[2] = "mensaje";
$array[7] = "lalala!";
$array[] = "yepa yepa!!.<br/>";
var_dump($array);
$array[2] = array("mensaje");
$array[7] = array("lalala!");
$array[] = "yepa yepa!!";
var_dump($array);
?>