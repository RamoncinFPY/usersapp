<?php 

    echo '<link rel="stylesheet" href="../css/nav.css" type="text/css" media="all" />';
    echo '<div class="topnav" id="myTopnav">
                <a href="../index.php">Login</a>
                <a href="../about.php">About</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div><br><br>';
   
     //declaro todos los datos de conexión
    $servidor = "localhost";
    $usuario_bd = "usersapp";
    $pass_bd = "usersapp";
    $basededatos = "usersapp";
    $tabla = "usuarios";

    if(($_POST == null) or ($_POST == ""))
        {
            session_destroy();
            header("location:../registro.php");
            die();
        }
         
    //validación del formulario
    if(!isset($_POST['nombre'])) echo "El campo es obligatotio!<br>";
    if(!isset($_POST['apellido'])) echo "El campo es obligatotio!<br>";
    if(!isset($_POST['password'])) echo "El campo es obligatotio!<br>";
    if(!isset($_POST['correo'])) echo "El campo es obligatotio!<br>";
    if(!isset($_POST['usuario'])) echo "El campo es obligatotio!<br>";

    //Saniamiento de campos del formulario
    $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $apellido = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
    $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
    $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);

    #Encripto la contraseña
    $password = hash('sha256', $password);

    //consulta
    $registrar = "INSERT INTO $tabla (`usuario`,`nombre`,`apellido`,`password`,`email`) VALUES ('$usuario','$nombre','$apellido','$password','$correo')";
    //establece la conexión
    $conn = new mysqli($servidor,$usuario_bd,$pass_bd,$basededatos);
    // Compruebo la conexión
    if ($conn->connect_error) die("Falla en la conexión: ".$conn->connect_error);
    //realizo el registro(insert)
    $conn->query($registrar);

    //para obtener el id
    $result = $conn->query("SELECT `id` FROM $tabla ORDER BY `id` DESC LIMIT 1");
    
    if($result->num_rows>0)
        {while($row = $result->fetch_assoc())//para obtener el id 
            {   
                $id = $row['id'];
                // echo "Id: ".$id;
            }
        //Al darle click al botón
        if (isset($_POST['enviar'])) 
            {
                //Recogemos el archivo enviado por el formulario
                $archivo = $_FILES['archivo']['name'];
                //Si el archivo contiene algo y es diferente de vacio
                if ($archivo != null) 
                    {
                        //Obtenemos algunos datos necesarios sobre el archivo
                        $tipo = $_FILES['archivo']['type'];
                        $tamano = $_FILES['archivo']['size'];
                        $temp = $_FILES['archivo']['tmp_name'];
                        $ubicacion = "../img/usuarios/";
                        //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
                        if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 130000))) 
                            {   
                                $imagen_uruario = '../img/usuarios/0.jpg'; 
                                echo '<link rel="stylesheet" href="../css/estilo_form.css" type="text/css" media="all" />';
                                echo "<div class='mensajes'>";
                                echo '<br><div><b>IMAGEN NO VALIDA, se usará una por defecto<br/>';
                                echo "<p><img src='.$imagen_usuario'</p><br>
                                     +Sólo se permiten imágenes .jpg y de 130 kb como máximo.+</b></div><br>";
                                echo "</div>";
                                header('location:../index.php');
                                die();
                            }else 
                                {   //Si la imagen es correcta en tamaño y tipo e intenta subir al servidor cambiando la ubicación
                                    if (move_uploaded_file($temp, $ubicacion.$id.".jpg"))
                                    //move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfolder.'el_nombre_que_yo_quiera.jpg') 
                                        {
                                            $imagen_uruario = $ubicacion.$id.".jpg";
                                            echo "<p><img src='$imagen_uruario'></p>";
                                            header('location:../index.php');
                                            die();
                                        }else 
                                            {   //Si no se ha podido subir la imagen, mostramos un mensaje de error
                                                echo '<div class="mensajes"><b>Ocurrió algún error al subir su.</b></div>';
                                                header('location:../registro.php');
                                                die();
                                            }
                                }
                    }else{echo "<br>Seleccionar un archivo<br>";}
            }
        }
    echo '<link rel="stylesheet" href="../css/nav.css" type="text/css" media="all" />';

    echo '<footer class="pie">
            Abril 2021, by Ramón
        </footer>';
    $conn->close();
?>