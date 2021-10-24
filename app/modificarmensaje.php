<?php
    require("db_con.php");
    session_start();   
    $id = $_SESSION['id'];
    
    $id= $_GET["id"];
    
    $sql = "SELECT * FROM comentarios WHERE ID=?";
    $test= $conn->prepare($sql);
    $test->bind_param('i', $id); #i de int

    if ($test->execute()) {
        $result = $test->get_result();
        $usuario = $result->fetch_assoc();

        $NombreR= $usuario['NRECEP'];
        $ApellidosR= $usuario['ARECEP']; 
        $EmailR =$usuario['ERECEP']; 
        $TelefonoR =$usuario['Telefono']; 
        $Mensaje =$usuario['MSG']; 
    }
   
    echo 
    "<!DOCTYPE html>
    <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>EnlazadIn perfil</title>
            <link rel='shortcut icon' href='img/briefcase.png' type='image/x-icon'> <!-- Selecciona el ícono que aparece en la pestaña del navegador. -->
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
                    Nombre: <input type='text' name='nombre' value={$NombreR}><br>
                    Apellidos: <input type='text' name='apellidos' value={$ApellidosR}><br>
                    Email: <input type='text' name='email' value={$EmailR}><br>
                    Teléfono: <input type='text' name='telefono' value={$TelefonoR}><br>
                    Mensaje: <textarea name='mensaje' rows='6' cols='35'>{$Mensaje}</textarea><br>
                    
                    <input type='submit' name='modificar' class='button' value='Modificar' />
                </form>
                <form action='foro.php'>
                    <button id='volver' class='button'>Volver</button> <!-- Botón que vuelve atras. -->
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
    
    if(array_key_exists('modificar', $_POST)) {
        
        require("db_con.php");

    $id=$_GET['id'];
    $nom=$_GET['nombre'];
    $ape=$_GET['apellidos'];
    $mail=$_GET['email'];
    $telf=$_GET['telefono'];
    $mensaje=$_GET['mensaje'];

    $sql = "UPDATE comentarios SET NRECEP = '$nom',
                                    ARECEP = '$ape',
                                    ERECEP = '$mail',
                                    Telefono = $telf,
                                    MSG = '$mensaje'
                                    WHERE ID = $id ;";
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
        echo "<script> window.location.href='/modificarmensaje.php/?id=${id}'</script>";
    }else {
        echo "Error updating record: " . $conn->error;
    }
}
?>