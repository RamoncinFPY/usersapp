<?php
session_start();
function datos_usuario()
    { 
    //declaro todos los datos de conexión
     $servidor = "localhost";
     $usuario_bd = "usersapp";
     $pass_bd = "usersapp";
     $basededatos = "usersapp";
     $tabla = "usuarios";                   //ESTO FALLA
     if(($_POST == null) or ($_POST == "")) header("location:RAMON.PHP");          
     //validación del formulario
     if(!isset($_POST['password'])) echo "El campo es obligatotio!<br>";
     if(!isset($_POST['correo'])) echo "El campo es obligatotio!<br>";
     if(!isset($_POST['usuario'])) echo "El campo es obligatotio!<br>";
 
     //Saniamiento de campos del formulario
     $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
     $correo = filter_var($_POST['correo'], FILTER_SANITIZE_EMAIL);
     $usuario = filter_var($_POST['usuario'], FILTER_SANITIZE_STRING);
    //echo $password .$correo .$usuario; //si me llegan bien los datos
     #Encripto la contraseña
     $password = hash('sha256', $password);
    //echo $password;//Si encripta la contraseña

    //consulta
    $sql = "SELECT * FROM $tabla WHERE `usuario` = '$usuario' AND `email` = '$correo' AND `password` = '$password'";
    //conexión
    $conn = new mysqli($servidor,$usuario_bd,$pass_bd,$basededatos);
    //Si falla la conexión
    if ($conn->connect_error) die("Falla en la conexión: ".$conn->connect_error);

    //hago la consulta de la tabla 
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
        { 
            while($row = $result->fetch_assoc()) 
                {//creo variables para los datos
                    $id = $row["id"];
                    $user = $row["usuario"];
                    $name = $row["nombre"];
                    $lastn = $row["apellido"];
                    $email = $row["email"];
                    $pass = $row["password"];
                    $status = $row["estatus"];

                //Compruebo si existe la imagen con su respectiva ID
                    $th_imagen = "../img/usuarios/".$id.".jpg";
                    if(file_exists($th_imagen))
                        {$imagen = $th_imagen;
                        }else{ $imagen = "../img/usuarios/0.jpg";}
                
                    //Muestro la información de cada fila de la base de datos
                    $imprimir = "<section class='container1'>
                                <article class='articulos'>
                                <p>Id: ".$id."</p>
                                <h2>Nombre y apellido: ".$name."&nbsp; ".$lastn."</h2>
                                <img src='".$imagen."'>
                                <p>Usuario: <span> ".$user."</span></p>
                                <p> Correo Electrónico: ".$email."</p>
                                <p>Contraseña: ".$pass."</p>
                                <p>Estatus: ".$status."</p>
                                </article></section><br><br>
                                <a class='salir' href='../sesiones/destroy.php'>Salir</a>";
                    echo $imprimir;
                }
            $conn->close();
            //retorno de mi función            
             return $imprimir;
        }
    }
?>
<!-- <!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Usuario</title>
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="../css/nav.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
	<link rel="stylesheet" href="../css/estilos.css">
	<link rel="shortcut icon" href="../img/favicon/favicon.png" type="image/x-icon">
</head>
<body>
    <div class="topnav" id="myTopnav">
		<a href="index.php">Login</a>
		<a href="registro.php">Registro</a>
		<a href="editar.php">Editar</a>
		<a href="eliminar.php">Eliminar</a>
		<a href="about.php">About</a>
		<a href="javascript:void(0);" class="icon" onclick="myFunction()">
			<i class="fa fa-bars"></i>
		</a>
	</div>

	<main>
		<h1>Bienvenido</h1>
		<?php datos_usuario();?>		
	</main>
	<footer class="pie">
		Abril 2021, by Ramón
	</footer>

	<script src="../js/login.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>
</html> -->