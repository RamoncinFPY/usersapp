<?php
session_start(); //inicia o recupera sesión

if(isset($_SESSION["usuario"]))
    {//si existe el usuario y devuelve el valor true
        if(session_destroy() == true)
            {   //regresa a la página que le indique
                header('Location: ../index.php');
                die();//mata esta sección
            }
    }else
        {
            header('location:../index.php');
        }
?>