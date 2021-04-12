<?php
     session_start();
     $id = $_SESSION['id'];
     // echo $id;
    //declaro todos los datos de conexión
    $servidor = "localhost";
    $usuario_bd = "usersapp";
    $pass_bd = "usersapp";
    $basededatos = "usersapp";
    $tabla = "usuarios";

    //recojo los datos del formulario //Saniamiento de campos del formulario
    $name = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
    $lastn = filter_var($_POST['apellido'], FILTER_SANITIZE_STRING);
    $user = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
    //encripto el pass
    $pass = hash('sha256', $pass);

    //Declaro los datos a actualizar
     $editar = "UPDATE $tabla SET `nombre`='$name', `apellido`='$lastn', `usuario`='$user', `password`='$pass', `email`='$email', `actualizacion`=current_timestamp() WHERE id='$id'";
     //Conexión
     $conn = new mysqli($servidor,$usuario_bd,$pass_bd,$basededatos);
    
     //Ejecuto la actualización
     $conn->query($editar);
     //Para editar la imagen
     $imagen_subida = $_FILES['archivo']['name'];//echo $imagen_subida;//compruebo que llega el archivo correctamente
     //si se sube una nueva imagen para actualizar
if($imagen_subida <> null) 
    {//Obtenemos algunOs datos necesarios sobre el archivo
         $tipo = $_FILES['archivo']['type'];
         $tamano = $_FILES['archivo']['size'];
         $temp = $_FILES['archivo']['tmp_name'];
         $ubicacion = "../img/usuarios/";
         //Se comprueba si el archivo a cargar es correcto observando su extensión y tamaño
         if (!((strpos($tipo, "gif") || strpos($tipo, "jpeg") || strpos($tipo, "jpg") || strpos($tipo, "png")) && ($tamano < 130000))) 
             {
                 echo "<div class='mensajes'>";
                 echo '<br><div><b>IMAGEN NO VALIDA, sólo se permiten imágenes .jpg y de 130 kb como máximo.</b></div><br>';
                 echo "</div><br>";
                 header('location:../pag_usuario.php');
                 die();
                 echo '<a href="../pag_usuario.php">A mi página</a>';

             }//Si existe una nueva imagen para actualizar, elimino la anterior
             if(file_exists("../img/usuarios/".$id.".jpg"))
                 {
                     unlink("../img/usuarios/".$id.".jpg");
                 }//Si la imagen es correcta en tamaño y tipo e intenta subir al servidor cambiando la ubicación
             if (move_uploaded_file($temp, $ubicacion.$id.".jpg"))
             //move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfolder.'el_nombre_que_yo_quiera.jpg') 
                 {
                     echo "<br>Nueva imagen.<br>";
                     $img_us = $ubicacion.$id.".jpg";
                     echo "<p><img src='$img_us'></p><br>";
                     header('location:../pag_usuario.php');
                     die();
                     echo '<a href="../pag_usuario.php">A mi página</a>';
                 }else 
                     {//Si no se ha podido subir la imagen, mostramos un mensaje de error
                         echo '<div class="mensajes"><b>Ocurrió algún error al subir el fichero. No pudo guardarse.</b></div><br>';
                         header('location:../pag_usuario.php');
                         die();
                         echo '<a href="../pag_usuario.php">A mi página</a>';
                     }
     }else
         {   //Muestro en pantalla el ok si va bien
             if(file_exists("../img/usuarios/".$id.".jpg"))
                 {
                     $imagen = $id;
                     echo "<img src='../img/usuarios/".$imagen.".jpg'";
                     header('location:../pag_usuario.php');
                     die();
                     echo '<br><a href="../pag_usuario.php">A mi página</a>';
                 }elseif($imagen = 0)
                     {
                         echo "<img src='../img/usuarios/".$imagen.".jpg'<br>";
                         header('location:../pag_usuario.php');
                         die();
                         echo '<br><a href="../pag_usuario.php">A mi página</a>';
                     }
        }
     $conn->close();
?>