<?php
 require("db_con.php");
 
 foreach($foro as $comentario) :
  $ID = $comentario['ID'];

  $NRECEP = $comentario['NRECEP']; 
  $ARECEP = $comentario['ARECEP']; 
  $ERECEP = $comentario['ERECEP'];
  $Telefono = $comentario['Telefono'];
  $MSG = $comentario['MSG'];
    echo
    "<!DOCTYPE html>
    <html lang='es'>
    <body>
      <table>
        
              <main>
                  <form name='datos' method='post'>
                      <h1>Cambio de datos de comentarop</h1>
                      ID: <input type='text' name='ID' value={$ID}><br>
                      NRECEP: <input type='text' name='NRECEP' value={$NRECEP}><br>
                      ARECEP: <input type='text' name='ARECEP' value={$ARECEP}><br>
                      ERECEP: <input type='text' name='ERECEP' value={$ERECEP}><br>
                      Telefono: <input type='text' name='Telefono' value={$Telefono}><br>
                      MSG: <input type='text' name='MSG' value={$MSG}><br>
                      <input type='submit' name='Cambiardatos' class='button' value='Cambiar Datos' />
                  </form>
                  <form action='iniciado.html'>
                      <button id='volver' class='button'>Volver</button> <!-- Botón que vuelve atras. -->
                  </form>
              </main>

        </table>
      </body>
    </html>";
endforeach;

?>