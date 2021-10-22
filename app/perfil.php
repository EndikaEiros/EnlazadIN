<?php
require("db_con.php");
session_start();
?>
<?php
    require("db_con.php");
    $email= $_SESSION['email'];

    $sql = "SELECT * FROM usuarios WHERE Email=?";
    $test= $conn->prepare($sql);
    $test->bind_param('s', $email); #s de string

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

    echo 
    "<!DOCTYPE html>
    <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Document</title>
            <link rel='stylesheet' href='../css/registro.css'>
        </head>
        <body>
            <form name='datos' method='post'>
                <h1>Cambio de datos</h1>
                Nombre: <input type='text' name='nombre' value={$Nombre}><br>
                Apellidos: <input type='text' name='apellidos' value={$Apellidos}><br>
                Email: <input type='text' name='email' value={$Email}><br>
                DNI: <input type='text' name='dni' value={$DNI}><br>
                Teléfono: <input type='text' name='telefono' value={$Telefono}><br>
                Fecha de nacimiento: <input type='text' name='nacimiento' value={$Fecha_nacimiento}><br>
                Introducir contraseña: <input type='text' name='password' value={$Contrasena}><br>
                <input type='submit' name='Cambiardatos' class='button' value='Cambiar Datos' />
            </form>
        </body>
    </html>";


    if(array_key_exists('Cambiardatos', $_POST)) {
        $a=$_POST['nombre'];
        $sql = "UPDATE usuarios SET Nombre = '$a' WHERE Email LIKE '$email';";
        echo $sql;
        #$test= $conn->prepare($sql);
        #$test->execute();
        #mysqli_query($conn, $sql)or die (mysqli_error($conn));
        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
            echo '<script> window.location.href="/perfil.php"</script>';
        }else {
            echo "Error updating record: " . $conn->error;
          }
        
    }

?>