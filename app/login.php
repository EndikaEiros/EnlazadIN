<?php
require("db_con.php");
session_start();
?>

<?php
  $emailF= $_GET["email"]; 
  $passF= $_GET["password"];

  $sql = "SELECT Contrasena FROM usuarios WHERE Email=?; ";
  $test= $conn->prepare($sql);
  $test->bind_param("s", $emailF); #s de string
  
  if( $emailF== ""){
    echo '<script> window.location.href="/login.html"</script>';
  }
  if ($test->execute()) {
    $result = $test->get_result();
    $contrasena = $result->fetch_assoc();

    if ( strcmp($contrasena['Contrasena'],$passF) ==0 ){
      $_SESSION['email']  = $emailF;
      echo '<script> window.location.href="/iniciado.html"</script>';

    }else{
      echo '<script> window.location.href="/login.html"</script>';

    } 
  }else{
    echo '<script> window.location.href="/login.html"</script>';
    
  }
?>

<?php

?>
;