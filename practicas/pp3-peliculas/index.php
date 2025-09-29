<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CinesFrank</title>

    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <h1>CinesFrank</h1>
        <h3>Cartelera</h3>
    </header>
    <main>
        <div class="cartelera">
        <?php
        include('peliculas.php');
        $i = 0;
        foreach($peliculas as $peli){
            echo "
            <div class='card'>
                <img src='$peli[imagen]' alt='Foto de cartel de la pelicula $peli[nombre]'>
                <div class='overlay'>
                    <h2>$peli[nombre]</h2>
                    <div class='horarios'>
            ";

            foreach($peli['horarios'] as $horas){
                echo "<div>$horas</div>";
            }

            echo "
                    </div>
                    <div class='botones'>
                        <a href='trailer.php?id=$i'><button>Trailer</button></a> 
                        <a href='detalles.php?id=$i'><button>Mas info</button></a> 
                    </div>
                </div>
            </div>
            ";
            $i++;
        }
        
        ?>
    </div>

        
        
    </main>



</body>
</html>