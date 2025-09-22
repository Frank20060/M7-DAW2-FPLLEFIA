<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
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
            font-size: 30px;
        }
        #espacioTablas{

            display: flex;
            flex-wrap: wrap;
            gap: 10px;  
            width: fit-content;  
            height: fit-content;
            border: 2px, dotted, brown;
            padding: 10px;
            gap: 20px;
            justify-content: center;

        }
        .tabla{
            padding: 2px;
           font-size: 20px;

        }
    </style>
</head>
<body>
    <h1> Ejercicio 2</h1>
    <h2>Tablas de multiplicar</h2>
    <div id="espacioTablas">

        <?php
            
            for($i=1; $i<=11; $i++){
                echo "<div class= 'tabla'>";
                for($j=1; $j<10; $j++){
                    $resul = $i*$j;
                    echo "$i x $j = $resul";
                    echo "<br>";

                }
                echo "</div>";

            }
        
        ?>



    </div>
</body>
</html>