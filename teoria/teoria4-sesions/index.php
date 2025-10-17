<?php


//PRIMERA CLASE CON SESIONES
session_start();
$_SESSION['user']="Frank";
$_SESSION['rol']="Admin";

echo "Sessió iniciada. <br>";
echo "Usuario: ".$_SESSION['user']."<br>";
echo "Rol: ".$_SESSION['rol']."<br>";
echo "<hr><br>";
echo '<a href="pagina2.php">Ir a la página 2</a><br><br>';
echo '<a href="logOut.php">Cerrar sesión</a><br>';
?>