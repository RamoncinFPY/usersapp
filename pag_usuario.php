<?php
	include('bd/consulta.php');
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

	<script src="js/login.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>
</html>