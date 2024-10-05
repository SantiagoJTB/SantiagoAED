<?php
$array = [7,2,8,1,9,4];
var_dump($array);
echo array_search(4,$array),"<br/>";
usort($array, function($a, $b) {
    return $a <=> $b;
});
var_dump($array);
echo array_search(4,$array);

?>
