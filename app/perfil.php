<?php
    require("db_con.php");
    session_start();
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
        list($ano,$mes,$dia) = explode("/", $Fecha_nacimiento);
        $Fecha_nacimiento= $dia."-".$mes."-".$ano;
        
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
            <link rel='stylesheet' href='../css/perfil.css'>
        </head>
        <header>
            <div id='menu'>
                <ul>
                    <li id='logo'>
                        <a href='index.html'>
                            <img src='img/briefcase.png' width='50'>
                        </a>
                    </li>
                    <li id='nombre-pagina'>
                        <h1>EnlazadIN</h1>
                    </li>
                </ul>
            </div>
        </header>
        <body>
            <main>
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
            </main>
            <div id='imagen'>
                <img src='img/undraw_Control_panel_re_y3ar.svg'>
            </div>
            <footer>
                Icons made by <a href='' title='juicy_fish'>juicy_fish</a> from <a href='https://www.flaticon.com/' title='Flaticon'>www.flaticon.com</a>
            </footer>
        </body>
    </html>";
    
    if(array_key_exists('Cambiardatos', $_POST)) {
        
        $nom=$_POST['nombre'];
        $ape=$_POST['apellidos'];
        $mail=$_POST['email'];
        $dni=$_POST['dni'];
        $telf=$_POST['telefono'];
        
        $fnac=$_POST['nacimiento'];
        list($dia,$mes,$ano) = explode("-", $fnac);
        $fnac= $ano."/".$mes."/".$dia;
        
        $pasw=$_POST['password'];

        $sql = "UPDATE usuarios SET Nombre = '$nom',
                                    Apellidos = '$ape',
                                    Email = '$mail',
                                    DNI = '$dni',
                                    Telefono = '$telf',
                                    Fecha_nacimiento = '$fnac',
                                    Contrasena = '$pasw'
                                                        WHERE Email LIKE '$email';";

        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
            $_SESSION['email'] = $mail;
            echo '<script> window.location.href="/perfil.php"</script>';
        }else {
            echo "Error updating record: " . $conn->error;
          }
        }
?>