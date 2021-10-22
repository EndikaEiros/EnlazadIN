<?php
require("db_con.php");
session_start();
$email= $_SESSION['email'];
echo $email;

$sql = "SELECT * FROM usuarios WHERE Email=?";
$test= $conn->prepare($sql);
$test->bind_param('s', $email); #s de string
$usuario = mysqli_query($conn, 'SELECT * FROM usuarios WHERE Email LIKE '. $email.';');
echo $usuario['Nombre'];

if ($test->execute()) {
    $result = $test->get_result();
    $usuario = $result->fetch_assoc();

    

    $Nombre= $usuario['Nombre'];
    $Apellidos= $usuario['Apellidos']; 
    $Email =$usuario['Email']; 
    $DNI =$usuario['DNI']; 
    $Telefono =$usuario['Telefono']; 
    $Fecha_nacimiento =$usuario['Fecha_nacimiento']; 
    $Contrasena =$usuario['Contrasena'];
  }



echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='stylesheet' href='../css/registro.css'>
</head>
<body>
    <form name='datos'>
        <h1>Cambio de datos</h1>
        Nombre: <input type='text' name='nombre' value={$Nombre}><br>
        Apellidos: <input type='text' name='apellidos' value={$Apellidos}><br>
        Email: <input type='text' name='email' value={$Email}><br>
        DNI: <input type='text' name='dni' value={$DNI}><br>
        Teléfono: <input type='text' name='telefono' value={$Telefono}><br>
        Fecha de nacimiento: <input type='text' name='nacimiento' value={$Fecha_nacimiento}><br>
        Introducir contraseña: <input type='password' name='password' value={$Contrasena}><br>
        <button type='button' onclick = 'return redireccion()' value='Enviar'>Modificar datos</button>
     </form>
     <script src='js/registro.js'></script>
</body>
</html>";

?>
