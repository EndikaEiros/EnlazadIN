<?php
    require("db_con.php");
    session_start();   
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
            <title>EnlazadIn modificar mensaje</title>
            <link rel='shortcut icon' href='img/briefcase.png' type='image/x-icon'> <!-- Selecciona el ícono que aparece en la pestaña del navegador. -->
            <link rel='stylesheet' href='../css/mensaje.css'>
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
                <form name='mensaje'>
                    <h1>Cambio de datos</h1>
                    Nombre: <input type='text' name='nombre' value={$NombreR}><br>
                    Apellidos: <input type='text' name='apellidos' value={$ApellidosR}><br>
                    Email: <input type='text' name='email' value={$EmailR}><br>
                    Telefono: <input type='text' name='telefono' value={$TelefonoR}><br>
                    Mensaje: <textarea name='mensaje' rows='6' cols='35'>{$Mensaje}</textarea><br>
                    <button id='modificar' onclick='modificar({$ID})' class='button'>Modificar mensaje</button> <!-- Botón que lleva a modificar el mensaje. -->
                </form>
                <form action='foro.php'>
                    <button id='volver' class='button'>Volver</button> <!-- Botón que vuelve atras. -->
                </form>
            </main>
            <div id='imagen'>
                <img src=''>
            </div>
            <footer>
                Icons made by <a href='' title='juicy_fish'>juicy_fish</a> from <a href='https://www.flaticon.com/' title='Flaticon'>www.flaticon.com</a>
            </footer>
            <script src='js/modificar-mensaje.js'></script> <!-- Esta etiqueta hace referencia al script que valida los datos del formulario antes de mandarlos. -->
        </body>
    </html>";
    
?>