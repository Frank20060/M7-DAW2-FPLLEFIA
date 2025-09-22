<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 3</title>
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
        .par, .impar{
            width: 100px;
            height: 100px;
            justify-items: center;
            align-items: center;
        }
        .par p, .impar p{
            margin: 10px;
            font-size: 60px;
        }
        .par{
            border: 10px solid red;
        }
        .impar{
            border: 10px solid blue;
        }

    </style>
</head>
<body>

    <h1>Número aleatorio ¿PAR O IMPAR?</h1>
    <h3>Se genera un número del 1 al 100 y determinamos si es par (borde rojo) o impar (borde azul)</h3>
    <?php
    
        $numAleatorio = rand( 1, 100);
        if ($numAleatorio % 2 == 0){
            echo"
            <div class='par'>
                <p>$numAleatorio</p>
            </div>";
        }else{
            echo"
            <div class='impar'>
                <p>$numAleatorio</p>  
            </div>";
        }

    
    ?>
</body>
</html>