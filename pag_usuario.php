<?php
	include('bd/consulta.php');
  include('bd/obtener_datos.php');
  include('bd/obtener_datos.php');
  $datos = [$id,$user,$name,$lastn,$email,$pass];
  //Para que no puedan ingresar si no han hecho login 
  $id = $_SESSION['id'];
  if(!isset($id)) header('location:index.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Usuario</title>
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/nav.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
</head>
<body>
	<section class="cajas">
		<div class="caja1">
     		<main>
				<h1>Bienvenido</h1>
				<?php datos_usuario($id);?>

        <a href='sesiones/destroy.php'>
        <button class="anclas" type="button">Salir</button></a>
        &nbsp;&nbsp;
        <button class="anclas" type="button" 
            onclick = "caja2()">Editar</button>
        &nbsp;&nbsp;
        <button class="anclas" type="button" 
            onclick= "caja3()" >Eliminar</button>
        &nbsp;&nbsp;
        <button class="anclas"
            onclick="window.print()">Imprimir</button>

	
			</main>
		</div>
		<div class="caja2" id="caja2">
				<h1 id="editar">¿Deseas actualizar tus datos?</h1>
				<fieldset>
            <form action="action/editar.php" enctype="multipart/form-data" method="POST">

                        <input type="hidden"
                               name="id"
                                 id="id"
                                 value="<?php echo $id;?>">
                        <?php $th_imagen = "img/usuarios/".$id.".jpg";
                            if(file_exists($th_imagen))
                                {
                                  echo '<img class="img_usuario" src="img/usuarios/'.$id.'.jpg"<br><br>';
                                }else
                                    {
                                        echo '<img class="img_usuario" src="img/usuarios/0.jpg"<br><br>';
                                    }
                        ?>
                        Nombre <br><input type="text"
                                          name="nombre"
                                            id="nombre"
                                     value="<?php echo $datos[2];?>"><br>

                        Apellido <br><input type="text"
                                            name="apellido"
                                              id="apellido"
                                       value="<?php echo $datos[3];?>"><br>

                        Usuario <br><input type="text"
                                       name="usuario"
                                         id="usuario"
								                      value="<?php echo $datos[1];?>"><br>

                        Email<br><input type="text"
                                             name="email"
                                               id="email"
                                        value="<?php echo $datos[4];?>"><br>

					              Contraseña<br><input type="text"
                                             name="pass"
                                               id="pass"
                                        value="<?php $datos[5];?>"><br>
                        
                        Cambiar imagen <br><input name="archivo"
                                                   id="archivo"
                                                 type="file">
                                                <br>

                        <input type="hidden" name="MAX_FILE_SIZE" value="130000"><br>
                        <input type="submit" class="anclas" value="Actualizar">
                        &nbsp;&nbsp;&nbsp;
                        <button type="reset"
                               class="anclas"
                             onclick="quita2()">Cancelar</button>
                </form>
            </fieldset>	
		</div>

    <div class="cajas" id="caja3">
      <h2>¿Seguro que deseas eliminar tu usuario?</h2>
      <form action="action/eliminar.php" 
            enctype="multipart/form-data" 
            method="POST">

            <input type="hidden" 
                   name="id" 
                     id="id"
                  value="<?php echo $id;?>">
                  &nbsp;&nbsp;&nbsp;
            <input class="anclas"
                   type="submit" 
                   value="Confirmar">
                   &nbsp;&nbsp;&nbsp;
            <button type="reset"
                   class="anclas"
                 onclick="quita3()"
                   >Cancelar</button>
      </form>
    </div>
	</section>
	<footer class="pie">
		Abril 2021, by Ramón
	</footer>

	<script src="js/login.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>
</html>