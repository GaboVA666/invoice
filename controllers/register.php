<?php

require 'config.php';

// REGISTER USER
if (isset($_POST['registrar'])) {
    $names = $_POST['names'];
    $mail = $_POST['mail'];
    $pwd = $_POST['pwd'];
    $sql = "INSERT INTO users (names, mail, pwd)
    VALUES ('$names', '$mail', '$pwd')";
    
    if (mysqli_query($con, $sql)) {
      echo "New record created successfully";
      header('Location: ../index.php');
    } else {
      echo "<script alert('Algo anda mal')></script>";
    }
    
    mysqli_close($con);
  }

?>