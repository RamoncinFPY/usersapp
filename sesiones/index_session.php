<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sessions</title>
</head>

<body>
    <!--2.	Fes una adaptació de l’anterior però ara canvia el camp nom per USER i afegeix el camp PASSWORD. Quan l’usuari envia el USER admin i la contrasenya 12345 es generarà una sessió i es donarà un enllaç per tancar la sessió. Si l’usuari i/o la contrasenya son incorrectes apareixerà el missatge indicant que no és correcte.-->

    <fieldset><legend>Sessions ejercicio 2</legend>

        <form action="start.php" method="post">
            USER: <input type="text" name="user" id="user">
            PASSWORD: <input type="password" name="pass" id="pass">
            <input type="submit">
        </form>

    </fieldset>
        
            <?php 
                
                session_start();//inicia o recupera sesión

                //compruebo que las dos entradas del formulario existan
                if(isset($_SESSION["user"]) and isset($_SESSION["pass"])){

                    echo "Bienvenido: " . $_SESSION["user"] . "<br>";
                    echo "<a href='destroy.php'>CERRAR SESIÓN</a>";//enlace para destruir la sesión

                }else{//si no existe 
                    echo "Usuario DESCONOCIDO";
                }
            ?>
        
</body>
</html>