<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles CinesFrank</title>
</head>
<body>
    <?php
        include('peliculas.php');

            $i = $_GET["id"];
            echo "
            <div class='card'>
                    <h2>" . $peliculas[$i]['nombre'] . "</h2>
                    <div class='horarios'>
            ";
            foreach($peliculas[$i]['horarios'] as $horas){
                echo "<div>$horas</div>";
            }
            echo "
            </div>
            ";
        
        ?>
</body>
</html>