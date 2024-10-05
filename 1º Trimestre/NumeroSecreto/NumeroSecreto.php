<?php

$num = rand(0, 99); //inicializo el numero random
$victoria =""; //inicializo mensajes
$error = "";
$errorDeTipo ="";
echo $num."<br/>";

file_put_contents("fichero.txt", $num. "\n", FILE_APPEND); //introduce el nuevo aleatorio en el fichero

$numObtenido = explode("\n",trim(file_get_contents("fichero.txt"))); //obtener los numeros del fichero

if(isset($_POST["numeroCliente"])){
    $numeroCliente = (int)$_POST["numeroCliente"];
    if($numeroCliente == $num){
        $victoria = "Has ganado, el numero secreto era:".$num;
    }else if($numeroCliente > $num){
         
    }
}

for($i = 0; $i < count($numObtenido); $i++){
     echo $numObtenido[$i]."</br>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="NumeroSecreto.php">
        <input type="text" name="numeroCliente"/>
        <input type="submit" name="Enviar">
    </form>
    <p><?php echo htmlspecialchars($victoria) ?></p>
</body>
</html>
