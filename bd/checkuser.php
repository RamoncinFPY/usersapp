<?php
//declaro todos los datos de conexión
$servidor = "localhost";
$usuario_bd = "usersapp";
$pass_bd = "usersapp";
$basededatos = "usersapp";
$tabla = "usuarios";

sleep(1); //temps d’espera. Es pot comentar si vols que sigui 0

//connexió a la base de dades
$conn = new mysqli($servidor,$usuario_bd,$pass_bd,$basededatos);

//comprovem connexió
if ($conn->connect_error) {
  return "DATABASE ERROR: ".$conn->connect_error;
  die();
}

if(!empty($_POST["usuario"])) { //si s’han enviat dades pel post
  $usuario = $_POST["usuario"];
  $sql = "SELECT * FROM $tabla WHERE `usuario` = '$usuario'"; //construïm consulta

  //llancem la consulta
  $result = $conn->query($sql);
// print_r($result)
  if ($result->num_rows == 0) { //si no hi ha resultats, el nom d’usuari està disponible
    echo "ok";
  }else{ //si no, es que ja està utilitzat.
    echo "nook";
  }
}

//close connection
$conn->close();
?>