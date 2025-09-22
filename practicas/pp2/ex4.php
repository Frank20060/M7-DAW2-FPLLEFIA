<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio extr1</title>
    <style>
        body{
            justify-items: center;
            justify-content: center;
            padding: 20px;
            padding-left: 50px;
            padding-right: 50px;
            background-color: beige;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        h1{
            color: brown;
            font-size: 40px;
        }
        h2{
            color: brown;
            font-size: 35px;
            font-weight: normal;

        }
        .divisores{

            display: flex;
            gap: 20px;
            font-size: 25px;

        }
        .rojo{

            color: red;

        }
        .verde{

            color: green;

        }
    </style>
</head>
<body>
    <h1>Divisores de un numero random</h1>
    <?php
        $numAleatorio = rand( 1, 100);
        $cont = 0;
        echo "
        <h2>Numero aleatorio: $numAleatorio</h2>
        <h3>Divisores del num $numAleatorio: </h3>
        <div class='divisores'>";
        for ($i = 1; $i <= $numAleatorio ; $i++){
            if(($numAleatorio % $i) == 0){
                echo "<p>$i</p>";
                $cont +=1;
            };

        };
        echo"</div>";
        if($cont == 2 || $cont == 1){

            echo "<h3 class='verde'>El numero $numAleatorio es un numero primo</h3>";

        }else{

            echo "<h3 class='rojo'>El numero no $numAleatorio es un numero primo</h3>";

        };
    ?>
</body>
</html>