<?php
//Iniciamos la sesión
session_start();

//Pedimos el archivo que controla la duración de las sesiones
require('controllers/sesiones.php');
?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hello World</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/index.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <body>
    <!-- navbar-->
    <nav class="navbar navbar-light navbar-expand-lg fixed-top shadow-sm bg-white"><a href="index.html" class="navbar-brand">INVOICE.EXE</a>
      <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>
      <div id="navbarSupportedContent" class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a href="#" class="nav-link">Creditos</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Otras cosas</a></li>
          <li class="nav-item"><a href="registrar.php" class="nav-link">Registrarse</a></li>
        </ul>
        <div class="navbar-text ml-lg-3">   <a onclick="document.getElementById('id01').style.display='block'" style="width:auto;" href="#" class="btn btn-primary text-white shadow">Acceder</a></div>
      </div>
    </nav>
    <!-- Hero Section-->
    <section class="bg-light">
      <div class="container"> 
        <div class="row">
          <div class="col-lg-6 order-2 order-lg-1">
            <h1>Bienvenido a Invoice.exe</h1>
            <p class="lead">Un producto creado por Gabo.exe de Develobeer.exe </p>
            <p><a href="#" class="btn btn-primary shadow mr-2">Descubre más</a><a href="#" class="btn btn-outline-primary">¿De que trata?</a></p>
          </div>
          <div class="col-lg-6 order-1 order-lg-2"><img src="https://3.bp.blogspot.com/-_7vaKiNZPXk/XCWoF-0xj7I/AAAAAAAAAMk/Bx7Ne5WLEvINHPDoG1jwY6rGO2d62pprwCKgBGAs/s1600/ux-design.jpeg" alt="..." class="img-fluid"></div>
        </div>
      </div>
    </section>
    
    <!--MODAL -->
    <div id="id01" class="modal">
  
  <form class="modal-content animate" id="acceso" action="controllers/login.php" method="post">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
      <img src="helmet.jpeg" alt="Rockman" class="avatar">
    </div>

    <div class="container">
      <label for="uname"><b>Nombre de usuario o correo</b></label>
      <input type="text" id="mail" placeholder="Ingresa tus datos" name="mail" required>

      <label for="psw"><b>Contraseña</b></label>
      <input type="password" id="pwd" placeholder="*********" name="pwd" required>
        
      <button name="btn_submit" type="submit">ACCEDER</button>
      
    </div>

    
  </form>
</div>
    <!-- JavaScript files-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
  </body>
</html>