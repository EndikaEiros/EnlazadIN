<?php
require("db_con.php");
$nombre= $_POST["nombre"]; 
$apellidos= $_POST["apellidos"]; 
$email= $_POST["email"]; 
$dni= (int) $_POST["dni"]; 
$tel= (int)$_POST["telefono"]; 
$fnac= $_POST["nacimiento"]; 
$con= $_POST["password"]; 

echo "test"."<br>";
echo $nombre."<br>"; 
echo $apellidos."<br>"; 
echo $email."<br>"; 
echo $dni."<br>"; 
echo $tel."<br>"; 
echo $fnac."<br>"; 
echo $con."<br>"."<br>"; 

echo "fin TEST"."<br>"."<br>"; 

$mysqli = new mysqli($hostname,$username,$password,$db);
$sql = "INSERT INTO usuarios VALUES ('$nombre','$apellidos','$email',$dni,$tel,'$fnac','$con')";
  
if ($mysqli->query($sql)) {
    printf("Se ha añadido correctamente.<br />");
    echo "Se ha añadido correctamente.<br />"; 
} 
else{
    printf("Error inesperado al añadir : %s<br />", $mysqli->error);
}
require('admin.php');


?>