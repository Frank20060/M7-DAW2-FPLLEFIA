<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio extr2</title>
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
        h3{
            font-size: 25px;
            font-weight: normal;

        }
        .temperaturas{

            display: flex;
            flex-wrap: wrap;
            gap: 20px;  
            width: 65%;  
            height: fit-content;
            padding: 5px;
            font-size: 1.5em;
            

        }
        .temperaturas div{

            justify-items: center;
            text-align: center;
            border: 2px, solid, black;
            padding: 10px;
            width: 150px;
        }
        .frio{

            background-color: lightblue;

        }
        .suave{

            background-color: yellow;

        }
        .calor{

            background-color: lightcoral;

        }


    </style>
</head>
<body>
    <h1>El Tiempo</h1>

    <div class="temperaturas">

        <?php
        
            for($i =0; $i<=11; $i++){   ///Pongo 12 que queda mas cuadradito y mas estetico

                $numAleatorio = rand( -10, 40);
                if($numAleatorio > 25){

                    echo "
                        <div class='calor'>
                            <h3>$numAleatorio</h3>
                            <p>Calor</p>
                        </div>
                    ";

                }else if( $numAleatorio < 25 &&  $numAleatorio > 10){
                    echo "
                        <div class='suave'>
                            <h3>$numAleatorio</h3>
                            <p>Temperatura Suave</p>
                        </div>
                    ";
                }else{
                    echo "
                        <div class='frio'>
                            <h3>$numAleatorio</h3>
                            <p>Frio</p>
                        </div>
                    ";
                };

            }
        
        ?>

    </div>

</body>
</html>