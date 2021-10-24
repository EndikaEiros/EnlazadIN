<?php
require("db_con.php");
session_start();

$maxid = mysqli_fetch_array($id);
$newid = $maxid[0] +1 ;

$nrecep= $_GET["nombre"]; 
$arecep= $_GET["apellidos"]; 
$erecep= $_GET["email"]; 
$telf= (int)$_GET["telefono"]; 
$msg= $_GET["mensaje"]; 
$emisor=$_SESSION['email'];


$sql = "INSERT INTO comentarios VALUES ($newid,'$nrecep','$arecep','$erecep',$telf,'$msg','$emisor');";
  
if ($mysqli->query($sql)) {
} 
else{
    printf("Error inesperado al añadir : %s<br />", $mysqli->error);
}
require('foro.php');


?>