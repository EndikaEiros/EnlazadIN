<?php

  $mysqli = new mysqli("db","admin","test","database");
  $conn = mysqli_connect("db","admin","test","database");
  
  #if ($conn) {
   #  echo "Conexion establecida <br />";
   #}
  
  $datos = mysqli_query($conn, 'SELECT * FROM usuarios ORDER BY DNI;')
   or die (mysqli_error($conn));

  #mysqli_close($conn);
?>
