<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trailer</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <h1>Trailer</h1>
    </header>
    <main class="mainTrailer">
        <?php
        include('peliculas.php');
        $i = $_GET["id"];
        echo "<iframe width='1120' height='630' src='". $peliculas[$i]['trailer'] ."' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share' referrerpolicy='strict-origin-when-cross-origin' allowfullscreen></iframe>"; 
        ?>
        <a href="index.php"><button>Inicio</button></a>
    </main>
</body>
</html>