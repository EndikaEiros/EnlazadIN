<?php
  $hostname = "db";
  $username = "admin";
  $password = "test";
  $db = "database";

  $conn = mysqli_connect($hostname,$username,$password,$db);
  if ($conn) {
    echo "Conexion establecida <br />";
  }

  $datos = mysqli_query($conn, 'SELECT * FROM usuarios ORDER BY DNI')
   or die (mysqli_error($conn));

  mysqli_close($conn);
?>
