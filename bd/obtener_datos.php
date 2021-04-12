<?php
     // session_start();
     $id = $_SESSION['id'];
     //declaro todos los datos de conexión
     $servidor = "localhost";
     $usuario_bd = "usersapp";
     $pass_bd = "usersapp";
     $basededatos = "usersapp";
     $tabla = "usuarios";
 
     //establece la conexión
     $conn = new mysqli($servidor,$usuario_bd,$pass_bd,$basededatos);
     //consulta
     $obtener_datos = "SELECT * FROM $tabla WHERE `id` = '$id'";
     
    //  echo "ESTA ES LA CONEXIÓN<BR>";
    //  var_dump($logear); 
     // Compruebo la conexión
     if ($conn->connect_error) die("Falla en la conexión: ".$conn->connect_error);
    //  echo "<br>ESTe es el mensaje de error<BR>";
    //  var_dump($conn->connect_error);
     //para obtener los daros de la bd
    $result = $conn->query($obtener_datos);

    if ($result->num_rows > 0)
        {
            while ($row = $result->fetch_assoc()) 
               {
                    $id = $row["id"];
                    $user = $row["usuario"];
                    $name = $row["nombre"];
                    $lastn = $row["apellido"];
                    $email = $row["email"];
                    $pass = $row["password"];
                    $status = $row["estatus"];
               }
               $datos = [$id,$user,$name,$lastn,$email,$pass]; 
               // print_r($datos);
            $conn->close();
        }
?>