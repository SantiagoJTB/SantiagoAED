<?php
session_start();

// Inicializar las variables
$victoria = "";
$error = ""; 

if (!isset($_SESSION['num'])) {
    $_SESSION['num'] = rand(0, 99);
}

$num = $_SESSION['num'];

if (isset($_POST["numeroCliente"])) {
    $numeroCliente = (int)$_POST["numeroCliente"];

    file_put_contents("numeros.txt", $numeroCliente . "\n", FILE_APPEND);

    if ($numeroCliente == $num) {
        $victoria = "¡Has ganado! El número secreto era: " . $num;
        unset($_SESSION['num']);
    } elseif ($numeroCliente > $num) {
        $error = "El número secreto es menor que " . $numeroCliente . ". Inténtalo de nuevo.";
    } elseif ($numeroCliente < $num) {
        $error = "El número secreto es mayor que " . $numeroCliente . ". Inténtalo de nuevo.";
    }
}

header("Location: index.php?victoria=" . urlencode($victoria) . "&error=" . urlencode($error));
exit();
?>
