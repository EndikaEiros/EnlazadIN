<?php
  require("db_con.php");
  $emailF= $_GET["email"]; 
  $passF= $_GET["password"];

  echo "Enviado :"."<br>";
  echo "$emailF"."<br>";
  echo "$passF"."<br>";

  $sql = "SELECT Contrasena FROM usuarios WHERE Email=?; ";
  $test= $conn->prepare($sql);
  $test->bind_param("s", $emailF);
  
  if ($test->execute()) {
    $result = $test->get_result();
    $contrasena = $result->fetch_assoc();
    echo $contrasena['Contrasena']."<br>";


    if ( strcmp($contrasena['Contrasena'],$passF) ==0 ){
        echo 'contraseña correcto'."<br>";
        redirect('http://localhost:81/perfil.html');

    }else{
        echo "sale mal";
    } 
  }
?>

<?php
function redirect($url)
{
    header('Location: '.$url);
    exit();
}
?>
;