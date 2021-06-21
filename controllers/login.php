<?php
require 'config.php';

session_start();

$usuario = $_POST['mail'];
$pwd = $_POST['pwd'];

$query = "SELECT COUNT(*) AS contar FROM users WHERE mail = '$usuario' AND pwd = '$pwd'";

$consulta = mysqli_query($db, $query);
$array = mysqli_fetch_array($consulta);
var_dump($query);
if ($array['contar'] > 0) {
   $_SESSION['mail'] = $usuario;
   header('Location: ../main.php');
}
else{
   echo "Datos incorrectos";
   header('Location: ../index.php');
   var_dump($query);
}
?>