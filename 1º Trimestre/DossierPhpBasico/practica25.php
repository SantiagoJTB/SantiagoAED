<?php
$array = [];

for ($i = 0; $i < 10; $i++) {
    $array[] = rand(20, 25); 
}

echo "Array completo: <br>";
print_r($array);
echo "<br><br>";

$search = array_search(22, $array);

if ($search !== false) {
    echo "El valor 22 fue encontrado en el índice: " . $search;
} else {
    echo "El valor 22 no se encontró en el array.";
}

?>
