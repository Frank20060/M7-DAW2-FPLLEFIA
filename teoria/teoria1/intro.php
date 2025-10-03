<!-- php -S 0.0.0.0:8000 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pp1 php</title>
    <style>
        .num-box{

            background-color: red;
            padding: 2rem;

        }
        .div-padre{
            padding: 1em;
            background-color: green;
            gap: 1em;
            display: flex;
            flex-wrap: wrap;

        }
        table, td, tr, th{
            border: 1px, solid,  black;
            border-collapse: collapse;
        }
        th, td{

            padding: 5px;


        }
        th{

            background-color: yellow

        }
        .red{

            background-color: red;

        }
        .green{

            background-color: greenyellow;

        }

    </style>
</head>
<body>
    <h1>hola pp1 php</h1>

    
    
    <?php
        echo "<h2>hola subtitulo</h2>";
        echo 'hola mundo con comillas simples';
        echo "<br>";

        $nombre = 'Frank';
        $apellido = "Villar";
        $edad = 19;
        $frase = "hola soy $nombre $apellido y tengo $edad años";   ///Esto es nuevo, la forma antigua seria l siguiente
        $frase2 = "hola soy " . $nombre ." ". $apellido . " y tengo " . $edad . " años";
        
        $frase3 = "hola soy {$nombre} {$apellido} y tengo {$edad}  años";

        echo $frase;
        echo "<br>";
        echo $frase2;
        echo "<br>";
        echo $frase3;
        echo "<br>";


        ////Condicionales
        
        //if

        if($edad<22){
            echo "eres mayor de edad";          
        }else{
            echo "eres menor de edad";
        }   

    
    ?>
    <!-- Bucles -->
    <section class="div-padre">
        <h1>Numeros del 0 - 10 usando un bucle</h1>
        <?php

        //for
        for($i=0; $i<=10;$i++){
            //Dos formas de poner comillas dentro de comillas (cambiarlas o poner contrabarra)
            echo "<div class='num-box'>Numero: {$i} <br></div>";
            //echo "<div class=\"num-box\">Numero: {$i} <br></div>";

        }

        ?>
    </section>



    <h1>Mis peliculas favoritas</h1>
    <table>
        <tr>
            <th></th>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Valoración</th>
        </tr>

        <?php
            $peliculas = ["Men in black", "Acero puro", "los simpson la pelicula", "F1", "Green Book"];
            $img  = ["https://m.media-amazon.com/images/I/71f-ox9ZYiL._UF1000,1000_QL80_.jpg", "https://m.media-amazon.com/images/M/MV5BYTliNThhNWYtY2E3Yi00ZmE4LWFjOTMtNmRmNzdkZDZlNGQwXkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg", "https://m.media-amazon.com/images/M/MV5BOTY1ZTBjNmUtZTM0Yi00YzNhLThiNmEtM2UyYmMyYTAyMjVjXkEyXkFqcGc@._V1_.jpg", "https://m.media-amazon.com/images/M/MV5BZTYwYjJhNzYtY2ZiZS00ZmYxLWJkZjctYjRlNGIxYjI3ZTU0XkEyXkFqcGc@._V1_FMjpg_UX1000_.jpg", "https://es.web.img3.acsta.net/pictures/18/11/20/17/37/0426155.jpg"];
            $valoraciones = [ 7.3, 7.1, 7.3, 7.8, 8.1]; 
            for( $i=0; $i<5; $i++){
                $posicion = $i + 1;
                

                if($valoraciones[$i] < 5){

                    echo "
                    <tr>
                        <td class='red'>$posicion</td>
                        <td class='red'>$peliculas[$i]</td>
                        <td class='red'><img src='$img[$i]' alt='imagen' width='80'></td>
                        <td class='red'>$valoraciones[$i]</td>
                    </tr>
                    "; 

                }else{

                    echo "
                    <tr>
                        <td class='green'>$posicion</td>
                        <td class='green'>$peliculas[$i]</td>
                        <td class='green'> <img src='$img[$i]' alt='imagen' width='80'></td>
                        <td class='green'>$valoraciones[$i]</td>
                    </tr>
                    ";

                }

            }
        ?>
    </table>

</body>
</html>