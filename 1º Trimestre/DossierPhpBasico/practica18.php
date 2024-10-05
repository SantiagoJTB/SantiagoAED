<?php $array = ["a", "a", "a", "a", "a"];
$j = count($array);
foreach ($array as $key => $val) {
    $j--;
    $array[$j] .= $j;
    echo "<br>";
    var_dump($array);
    echo "<br> $key => $val";   //esta línea no tiene el efecto deseado            
    echo "<br> $key => $array[$key]"; // aquí sí            
    echo "<br>";
}
?>

<?php
$array = ["a","a","a","a","a"];
$j = count($array);

foreach ($array as $key => $val) {
    $j--;
    $array[$j] .= $j; // Modifica el valor en la posición $j
    echo "<br> --- Iteración con \$key = $key y \$j = $j --- <br>";
    
    echo "Valor antes de modificar: \$key => \$val = $key => $val <br>";
    
    echo "Valor actualizado en el array: \$key => \$array[\$key] = $key => " . $array[$key] . "<br>";
    
    echo "Array actual: <br>";
    var_dump($array);
    
    echo "<br><br>";
}
?>
