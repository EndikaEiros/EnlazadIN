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
    <?php foreach($foro as $comentario) : ?> 
    <tr>
        <td><?php echo $comentario['ID'];?></td>
        <td><?php echo $comentario['NRECEP']; ?></td>
        <td><?php echo $comentario['ARECEP']; ?></td>
        <td><?php echo $comentario['ERECEP']; ?></td>
        <td><?php echo $comentario['Telefono']; ?></td>
        <td><?php echo $comentario['MSG']; ?></td>
        <!-- <td><?php echo $comentario['EMISOR']; ?></td> -->
    </tr>
    <?php endforeach; ?>
    </table>
  </body>
</html>
