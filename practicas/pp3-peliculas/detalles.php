<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles CinesFrank</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body class="bodyDetalles">

    <div class="mainDetalles">
    
    <?php
        include('peliculas.php');

            $i = $_GET["id"];
            echo "
                <div class='izquierda'>
                    <img src='" . $peliculas[$i]['imagen'] . "' alt='foto de cartel de la pelicula ". $peliculas[$i]['nombre'] ."'>
                    <a href='trailer.php?id=$i'><button>Trailer</button></a>
                </div>
                <div class='derecha'>
                    <h1>" . $peliculas[$i]['nombre'] . "</h1>
                    <p> " . $peliculas[$i]['sinopsis'] . " </p>
                    <p><span>Duración: </span>" . $peliculas[$i]['duracion'] . "</p>
                    <p><span>Director: </span>" . $peliculas[$i]['director'] . "</p>
                    <p><span>Reparto: </span>";
                    foreach($peliculas[$i]['reparto'] as $actor){

                        echo $actor . ", ";

                    };
                    echo "<p>";
            echo"
                <p><span>Calificacion: </span>" . $peliculas[$i]['calificacion'] . "</p>   
                <p><span>Género: </span>" . $peliculas[$i]['genero'] . "</p> 
            ";

            ///Horarios 
            echo "<div class='horariosDetalles'>";
            foreach($peliculas[$i]['horarios'] as $horas){
                echo "<div>$horas </div>";
            }
            echo "
            </div>
            <a href='index.php'><button>Inicio</button></a>
            </div>
            ";
        
        ?>
        </div>
</body>
</html>