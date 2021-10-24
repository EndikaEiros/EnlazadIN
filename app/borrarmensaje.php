<?php
    require("db_con.php");
    $id = $_GET['id'];

    $sql = "DELETE FROM comentarios WHERE ID = {$id}";
  
    if ($mysqli->query($sql)) {
        printf("Se ha borrado correctamente.<br />");
        echo '<script> window.location.href="/foro.php"</script>';
    } 
    else{
        printf("Error inesperado al borrar : %s<br />", $mysqli->error);
    }
?>