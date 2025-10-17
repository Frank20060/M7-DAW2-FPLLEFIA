<?php
session_start();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personaje</title>
</head>
<body>  
    <?php
    
        include 'header.php';

    ?>
    <h1>Personajes</h1>
    <?php
        //Que muetre cards las cards !!!!!!!!!!!PENDIENTE
        if (!empty($_SESSION['personajes']) && is_array($_SESSION['personajes'])) {
            foreach ($_SESSION['personajes'] as $personaje) {
                // sanitizar antes de mostrar
                $nombre = htmlspecialchars($personaje['nombrePersonaje'] ?? '', ENT_QUOTES, 'UTF-8');
                $habil = htmlspecialchars($personaje['habilidadPersonaje'] ?? '', ENT_QUOTES, 'UTF-8');
                $img   = htmlspecialchars($personaje['urlImgPersonaje'] ?? '', ENT_QUOTES, 'UTF-8');

                echo '<article>';
                echo '<h2>' . $nombre . '</h2>';
                if ($img !== '') {
                    echo '<img src="' . $img . '" alt="' . $nombre . '" style="max-width:200px;">';
                }
                if ($habil !== '') {
                    echo '<p>Habilidad: ' . $habil . '</p>';
                }
                echo '</article>';
            }
        } else {
            echo '<p>No hay personajes.</p>';
        }

    ?>
</body>
</html>