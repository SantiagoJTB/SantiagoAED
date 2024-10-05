<?php $array = array('perro', 'gato', 'avestruz');
foreach ($array as $key => $val) {
    print "<br>array[ $key ] = $val";
} 
?>

<?php
$array = array('perro', 'gato', 'avestruz');

// Cambiando $key y $val por $indice y $animal
foreach ($array as $indice => $animal) {
    print "<br>array[$indice] = $animal";
}
?>
