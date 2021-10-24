<?php

  $mysqli = new mysqli("db","admin","test","database");
  $conn = mysqli_connect("db","admin","test","database");
  
#  if ($conn) {
#     echo "Conexion establecida <br />";
#   }else {
#    echo $conn->error;
#  }
  
  $datos = mysqli_query($conn, 'SELECT * FROM usuarios ORDER BY DNI;')or die (mysqli_error($conn));
  #$foro = mysqli_query($conn, 'SELECT * FROM comentarios ORDER BY RAND() LIMIT 5;')or die (mysqli_error($conn));
  $foro = mysqli_query($conn, 'SELECT * FROM comentarios ORDER BY ID;')or die (mysqli_error($conn));
  $id = mysqli_query($conn, 'SELECT MAX(ID) FROM comentarios;')or die (mysqli_error($conn));

  #mysqli_close($conn);
?>