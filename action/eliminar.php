<?php
     session_start();
     //Recibo el valor del form
     $id = $_POST['id'];
                    
    if(!isset($id))
        {   //Si no hay datos lo regreso al formulario
            header('location:../pag_usuario.php');
            die();
        }else
            {
                //declaro todos los datos de conexión
                $servidor = "localhost";
                $usuario_bd = "usersapp";
                $pass_bd = "usersapp";
                $basededatos = "usersapp";
                $tabla = "usuarios";

                //consulta
                $borrar = "DELETE FROM $tabla WHERE `id` = '$id'";
                //conexión
                $conn = new mysqli($servidor, $usuario_bd, $pass_bd, $basededatos);
                //Si falla la conexión
                if ($conn->connect_error) 
                    {
                        die("Falla en la conexión: ".$conn->connect_error);
                    }
                $result = $conn->query($borrar);
                $conn->close();
            }
    session_destroy();
    header('location:../registro.php');
    exit();
     
?>