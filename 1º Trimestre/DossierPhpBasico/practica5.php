<?php
$foo = 'Bob'; // Asigna el valor 'Bob' a $foo
$bar = &$foo; // Referencia $foo vía $bar.
$bar = "Mi nombre es $bar"; // Modifica $bar...
echo $foo; // $foo también se modifica.
echo $bar;
/**Probar el código anterior. Probar ahora con números ¿también funcionan las
referencias? sí, se guarda la posciion de memoria sin importar el tipo de dato que sea.*/
$foo = 2; // Asigna el valor 'Bob' a $foo
$bar = &$foo; // Referencia $foo vía $bar.
$bar = 33; // Modifica $bar...
echo $foo; // $foo también se modifica.
echo $bar;
?>