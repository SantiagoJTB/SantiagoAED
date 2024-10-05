<?php 
$array = [];
for($i = 0; $i < 10; $i++){

array_push($array, $i);
var_dump($array);
echo "<br/>";

}
for($i = 0; $i < 5; $i++){

    array_pop($array);
    var_dump($array);
    echo "<br/>";
    
    }
?>