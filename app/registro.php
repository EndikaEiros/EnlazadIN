<?php
require("db_con.php");
$nombre= $_GET["nombre"]; 
$apellidos= $_GET["apellidos"]; 
$email= $_GET["email"]; 
$dniLetra= $_GET["dni"]; 
$tel= (int)$_GET["telefono"]; 
$fnac= $_GET["nacimiento"]; 
$con= $_GET["password"]; 

list($dia,$mes,$ano) = explode("-", $fnac);
$fnac= $ano."/".$mes."/".$dia;

list($dni, $letra)= explode("-", $dniLetra);

echo "test"."<br>";
echo $nombre."<br>"; 
echo $apellidos."<br>"; 
echo $email."<br>"; 
echo $dni."<br>"; 
echo $tel."<br>"; 
echo $fnac."<br>"; 
echo $con."<br>"."<br>"; 

echo "fin TEST"."<br>"."<br>"; 

$sql = "INSERT INTO usuarios VALUES ('$nombre','$apellidos','$email',$dni,$tel,'$fnac','$con');";
  
if ($mysqli->query($sql)) {
    printf("Se ha añadido correctamente.<br />");
    echo "Se ha añadido correctamente.<br />"; 
} 
else{
    printf("Error inesperado al añadir : %s<br />", $mysqli->error);
}
require('admin.php');


?>