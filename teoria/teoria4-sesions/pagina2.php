<?php

session_start(); ///Tiene que ser lo primero, sino se enfada PHP :C

echo "Página 2<br>";

echo "Usuario: ". $_SESSION['user'] ."<br>";
echo "Rol: ". $_SESSION['rol'] ."<br>";
echo "<hr><br>";
echo '<a href="index.php">Volver a la página inicial</a><br><br>';
echo '<a href="logOut.php">Cerrar sesión</a><br><br>';

?>