<?php
 require("db_con.php");
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>PHP TEST</title>
  </head>
  <body>
    <table>
    <?php foreach($datos as $usuario) : ?> 
    <tr>
        <td><?php echo $usuario['Nombre'] . ' ' . $usuario['Apellidos']; ?></td>
        <td><?php echo $usuario['Email']; ?></td>
        <td><?php echo $usuario['DNI']; ?></td>
        <td><?php echo $usuario['Telefono']; ?></td>
        <td><?php echo $usuario['Fecha_nacimiento']; ?></td>
        <td><?php echo $usuario['Contrasena']; ?></td>
    </tr>
    <?php endforeach; ?>
    </table>
  </body>
</html>


