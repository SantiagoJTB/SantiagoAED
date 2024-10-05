<?php
$username = $_POST["username"];
$_SESSION["username"] = $username;
echo "algo";
header("location:algo.php");
?>