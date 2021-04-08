<?php
    //para ver los datos que recojo
    print_r($_POST); 
    //veo si los datos recogidos no son nulos
    if(($_POST["usuario"] == null) or ($_POST["correo"]== null) or ($_POST["password"]== null))
        {
            header('location:../index.php');       
        }else
            {//compruebo si los datos introducidos son iguales a los de mi base de datos
                if(($_POST["usuario"] == "admin") && ($_POST["correo"] == "admin@admin.com") && ($_POST["password"] == 1234))
                    {   //si es correcto inicia o recupera sesión
                        session_start();
                        echo "<br>Hola: ".$_POST['usuario']."<br> <br>";
                        header('location:../pag_usuario.php');       
                        echo "<a href='destroy.php'>Salir</a>";//enlace para cerrar la sesión
                    }else
                        {
                            echo "Usuario NO AUTORIZADO!";//si no es correcto
                            echo "<a href='../index.php'>Login</a>"; 
                        }
            }
?>