<?php
// Comprobar si se han enviado nombre y foto por POST
$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
$foto = isset($_POST['imgurl']) ? $_POST['imgurl'] : '';

if ($nombre && $foto) {
	echo '<div class="header">';
	echo '<img src="' . $foto . '" alt="Foto de perfil">';
	echo '<span>Bienvenido, <strong>' . $nombre . '</strong>!</span>';
	echo '</div>';
}
?>
