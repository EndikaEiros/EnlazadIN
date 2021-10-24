<?php
 require("db_con.php");
 echo
 "
 <!DOCTYPE html>
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
      <body>";

 foreach($foro as $comentario) :
  $ID = $comentario['ID'];

  $NRECEP = $comentario['NRECEP']; 
  $ARECEP = $comentario['ARECEP']; 
  $ERECEP = $comentario['ERECEP'];
  $Telefono = $comentario['Telefono'];
  $MSG = $comentario['MSG'];
    echo
    "
          <div id={$ID}>
            <p>{$ERECEP}</p>
            <p>{$MSG}</p>
                <form action=''>
                   <button id='modificar' class='button'>Modificar mensaje</button> <!-- Botón que lleva a modificar el mensaje. -->
                </form>
                <form action=''>
                   <button id='eliminar' class='button'>Eliminar mensaje</button> <!-- Botón que elimina el mensaje. -->
                </form>
            </div>
    ";
endforeach;
echo
"
  </body>
</html>
";

function borrarmsg($ID){


   

    require("db_con.php");
    
    $sql = "DELETE FROM comentarios WHERE ID = {$ID}";
  
    if ($mysqli->query($sql)) {
        printf("Se ha borrado correctamente.<br />");
        echo "Se ha borrado correctamente.<br />"; 
    } 
    else{
        printf("Error inesperado al borrar : %s<br />", $mysqli->error);
    }

}





?>