<?php 
$array = [];
for($i = 0; $i < 10; $i++){

array_unshift($array, $i);
var_dump($array);
echo "<br/>";

}
for($i = 0; $i < 5; $i++){

    array_shift($array);
    var_dump($array);
    echo "<br/>";
    
    }
?>