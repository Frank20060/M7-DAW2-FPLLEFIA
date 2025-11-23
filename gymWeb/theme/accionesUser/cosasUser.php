<?php


session_start();
include_once '../../configuracion.php';


//Si no has iniciado sesion solo puedes leer lo que hay en la pagina web. Si has iniciado sesion puedes hacer acciones de usuario
//Acciones de usuario : leer, crear, borrar sus comentarios, editar sus comentarios

if (!isset($_SESSION['usuario'])) {
    //header("Location: ../login.php");
    //exit();
}