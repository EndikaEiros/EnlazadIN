<?php
require('db_con.php');

$nombre="test02";
$apellidos="test02";
$email= "test2@gmail.com";
$dni= 11111112;
$tel= 111111112;
$fnac="2000/01/01";
$con="contrasena";

$hostname = "db";
$username = "admin";
$password = "test";
$db = "database";
$mysqli = new mysqli($hostname,$username,$password,$db);

$sql = "INSERT INTO usuarios VALUES ('$nombre','$apellidos','$email',$dni,$tel,'$fnac','$con')";

if ($mysqli->query($sql)) {
    printf("Record inserted successfully.<br />");
} 
else{
    printf("Could not insert record into table: %s<br />", $mysqli->error);
}
require("admin.php")
?>