<?php

/** 
*$un_bool = TRUE; // un valor booleano
*$un_str = "foo"; // una cadena de caracteres
*$un_str2 = 'foo'; // una cadena de caracteres
*$un_int = 12; // un número entero
*echo gettype($un_bool); // imprime: boolean
*echo gettype($un_str); // imprime: string
* Si este valor es un entero, incrementarlo en cuatro
*if (is_int($un_int)) {
*$un_int += 4;
*}
* Si $un_bool es una cadena, imprimirla
* (no imprime nada)
*if (is_string($un_bool)) {
*echo "Cadena: $un_bool";
*}
 * Crear el script anterior. Modificarlo para sumar a $un_str el valor de $un_int y
 * mostrarlo en pantalla ¿qué ocurre?. Nada, no muestra nada por pantalla.
 * Sumar $un_str con $un_str2 ¿qué ocurre? ¿se puede concatenar una cadena con comillas
 * simples con una con comillas dobles?
 */

$un_str = "foo";
$un_int = 12;
$un_str2 = 'foo';
$suma = $un_str + $un_int;
echo $suma;
$suma2 = $un_str.$un_str2;
echo $suma2;
echo $un_str2;
?>