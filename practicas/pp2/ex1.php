<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1</title>
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
        #numBox{
            display: flex;
            flex-wrap: wrap;
            gap: 10px;  
            width: 100%;  
            height: fit-content;
            border: 2px, dotted, brown;
            padding: 5px;
            font-size: 1.5em;
            

        }

    </style>
</head>
<body>
    <h1>Numeros pares entre 50 y 500</h1>
    <div id="numBox">
        <?php

            for($num = 50; $num <=500; $num+= 2){

                echo "<div>$num</div>";

            }
        
        ?>
    </div>
</body>
</html>