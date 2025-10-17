<?php
session_start();
// Comprobar si se han enviado nombre y foto por POST
if(isset($_POST['userName'])){

    $_SESSION['name'] = $_POST['userName'];
}
$bienvenida = isset($_SESSION['name']) ? "Bienvenido ". $_SESSION['name'] :"No hay una sesion iniciada";


if(isset($_SESSION['name'])){


    echo '<div class="header">';
    echo '<div>';
    echo '<h1>' . $bienvenida .'</h1>';
    echo  '<div><a href="logout.php">Cerrar Sesion</a></div>';


}else{
echo '<div class="header">';
echo '<div>';
echo '<h1>iniciar Sesion</h1>';
}
?>