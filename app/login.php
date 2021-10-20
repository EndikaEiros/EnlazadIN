<?php


  $mysqli = new mysqli($hostname,$username,$password,$db);

  $sql = "SELECT FROM usuarios WHERE Contrasena='$contraseña'";
  $email=$mysqli->query($sql)


?>