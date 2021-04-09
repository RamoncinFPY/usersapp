<?php 
	session_start();//inicia o recupera sesión
	//compruebo que las dos entradas del formulario existan
    if (isset($_SESSION["usuario"]) and isset($_SESSION["correo"]) and isset($_SESSION["password"])) {
        echo "Bienvenido: ".$_SESSION["usuario"]."<br><br>";
    }
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/nav.css">
	<link rel="shortcut icon" href="img/favicon/favicon.png" type="image/x-icon">
</head>
<body>
	<h2>&nbsp;&nbsp;&nbsp;&nbsp;Si aún no estás registrado, hazlo aquí</h2>
		<div>
			&nbsp;&nbsp;&nbsp;&nbsp;<button onclick="window.location.href='registro.php';" class="formulario__btn">Registrarse</button>
		</div><br><br><br>
	<main>
		<h1>Login</h1>
		<form action="action/valida_login.php" method="post"
			  class="formulario" id="formulario">

			  <!-- Grupo: Usuario -->
			<div class="formulario__grupo" id="grupo__usuario">
				<label for="usuario" class="formulario__label">Usuario</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="usuario" id="usuario" placeholder="usuario_123">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
			</div>

			<!-- Grupo: Correo Electronico -->
			<div class="formulario__grupo" id="grupo__correo">
				<label for="correo" class="formulario__label">Correo Electrónico</label>
				<div class="formulario__grupo-input">
					<input type="email" class="formulario__input" name="correo" id="correo" placeholder="email@email.com">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El email solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
			</div>			

			<!-- Grupo: Contraseña -->
			<div class="formulario__grupo" id="grupo__password">
				<label for="password" class="formulario__label">Contraseña</label>
				<div class="formulario__grupo-input">
					<input type="password" class="formulario__input" name="password" id="password">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
			</div>

			<!-- Mensaje si faltan campos -->
			<div class="formulario__mensaje" id="formulario__mensaje">
				<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor ingresa: tu usuario o email, y tu contraseña. </p>
			</div>

			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<button type="submit" class="formulario__btn">Enviar</button>
				<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Login correcto!</p>
			</div><br>
		</form>
	</main>
	<footer class="pie">
		Abril 2021, by Ramón
	</footer>
	<script src="js/login.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>
</html>