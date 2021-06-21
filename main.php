<?php
//Reanudamos la sesión
session_start();

//Comprobamos si el usario está logueado
//Si no lo está, se le redirecciona al index
//Si lo está, definimos el botón de cerrar sesión y la duración de la sesión
if(!isset($_SESSION['mail'])) {
	header('Location: index.php');
} else {
	$estado = $_SESSION['mail'];
	$salir = '<a href="controllers/logout.php" target="_self">Cerrar sesión</a>';
	require('controllers/sesiones.php');
};
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <h1 class="my-5">Hola, <b><?php echo htmlspecialchars($_SESSION["mail"]); ?></b>. Bienvenido a INVOICE.EXE.</h1>
    <p>
        <a href="invoice.php" class="btn btn-warning">Crear Invoice</a>
        <a href="controllers/logout.php" class="btn btn-danger ml-3">Cerrar Sesión</a>
    </p>
</body>
</html>