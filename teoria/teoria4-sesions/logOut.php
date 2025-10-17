<?php

session_start();
session_destroy();
$nombre = $_SESSION['user'];
header("Location: pagina2.php");    ///Cuando llega aqui la sesion ya se ha destruido y nos redirige a pagina2.php donde ya no hay sesion activa

//// ¡¡¡¡¡¡¡¡¡¡ Si ponemos esto encima del header no funciona porque en el navegador ya se esta mostrando algo y entonces de enfada PHP :C -- Con lo cual los echos antes del header sobran !!!!!!!!!!

echo "Sesión cerrada.<br>";
echo "<hr><br>";
echo "Hasta luego, " . $nombre . "!<br>";



?>