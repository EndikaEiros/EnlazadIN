<?php
    require("db_con.php");
    session_start();
    $id = $_SESSION['id'];

    $sql = "DELETE FROM comentarios WHERE ID = {$id}";
  
    if ($mysqli->query($sql)) {
        printf("Se ha borrado correctamente.<br />");
    } 
    else{
        printf("Error inesperado al borrar : %s<br />", $mysqli->error);
    }
?>