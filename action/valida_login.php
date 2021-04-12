<?php
    //Inicio la sesión
    session_start();
    //declaro todos los datos de conexión
     $servidor = "localhost";
     $usuario_bd = "usersapp";
     $pass_bd = "usersapp";
     $basededatos = "usersapp";
     $tabla = "usuarios";
 
    if(($_POST == null) or ($_POST == "")) header("location:../registro.php");          
     //validación del formulario
     if(!isset($_POST['password'])) echo "El campo es obligatotio!<br>";
     if(!isset($_POST['correo'])) echo "El campo es obligatotio!<br>";
     if (!isset($_POST['usuario'])) echo "El campo es obligatotio!<br>";
       
            //Saniamiento de campos del formulario
            $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
            $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
            //echo $password .$correo .$usuario; //si me llegan bien los datos
            #Encripto la contraseña
            $password = hash('sha256', $password);
            //echo $password;//Si encripta la contraseña
        
            //consulta
            $logear = "SELECT * FROM $tabla WHERE `usuario` = '$usuario' AND `email` = '$correo' AND `password` = '$password'";
            //establece la conexión
            $conn = new mysqli($servidor, $usuario_bd, $pass_bd, $basededatos);
            //  echo "ESTA ES LA CONEXIÓN<BR>";
            //  var_dump($logear);
            // Compruebo la conexión
            if ($conn->connect_error) {
                die("Falla en la conexión: ".$conn->connect_error);
            }
            //  echo "<br>ESTe es el mensaje de error<BR>";
            //  var_dump($conn->connect_error);
            //para obtener los daros de la bd
            $result = $conn->query($logear);
            // echo "<br>ESTe ES el result<BR>";
            // var_dump($result);
            if($result && $result->num_rows > 0) 
                { //HASTA AQUI ES LA COMPROBACION
                    while ($row = $result->fetch_assoc()) 
                        {
                            $id = $row["id"];
                        }
                    //aqui creo la variable de sesión
                    $_SESSION["id"] = $id;
                    $conn->close();
                    header('location:../pag_usuario.php');
                } else {
                    session_destroy();
                    header('location:../index.php');
                }
        
?>