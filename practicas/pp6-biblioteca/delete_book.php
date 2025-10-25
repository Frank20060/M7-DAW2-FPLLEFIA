<?php

include "functions.php";
if (!isset($_SESSION['credenciales'])) {
    // Si no hay sesión activa, redirige a login.php
    header("Location: login.php");
    exit(); 
} elseif ($_SESSION['credenciales']['username'] !== 'admin') {
    // Si el usuario NO es admin, lo redirigimos al home
    header("Location: home.php");
    exit(); 
}
$id = $_GET['id'];

eliminarLibro($id);

header("Location: home.php");


?>