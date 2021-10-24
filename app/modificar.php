<?php
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
                                    Telefono = '$telf',
                                    MSG = '$mensaje',
                                    WHERE ID LIKE $id;";
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
        echo "<script> window.location.href='/modificar-mensaje.php/?id=${id}'</script>";
    }else {
        echo "Error updating record: " . $conn->error;
    }
?>