<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 1 PP2b</title>
    <style>
        body{
            justify-items: center;
            justify-content: center;
            padding: 20px;
            padding-left: 50px;
            padding-right: 50px;
            background-color: grey;
            font-family: "Nunito", sans-serif;

            

        }
        h1{
            color: white;
            font-size: 40px;
            text-shadow: 2px 2px 5px black;
        }
        a{

            color: lightblue;
            text-shadow: 2px 2px 5px black;
        }
        .boxEjercicio{
            gap: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;  
            width: 100%;  
            height: fit-content;
        }
        .boxNumeros{

            width: 130px;
            background-color: white;
            border: 2px, solid, black;
            justify-items: center;
            box-shadow: 2px 2px 5px black;
        }
        p{
            width: fit-content;

        }
        .destacado{

            background-color: yellow;
            font-weight: bolder;

        }
        .azulclaro{
            background-color: lightblue;
        }
        .coralclaro{

            background-color: lightcoral;

        }
        .recuento{

            width: fit-content;
            height: fit-content;
            padding: 20px;
            background-color: white;
            border: 2px, solid, black;
            justify-items: center;
            box-shadow: 2px 2px 5px black;
            align-items: center;
            justify-items: center;
            font-weight: bold;
            margin-top: 20px;

        }
    </style>

</head>
<body>
    

    <h1>Lista de pares 50 - 500 clasificados</h1>
    <div class="boxEjercicio">

        <?php
                $totalPares = 0;
                $recuento = 0;
                $sumaTotal = 0;
                for($i = 50; $i < 500; $i+=10){
                    $sumaGrupal  =0;
                    
                    echo "<div class='boxNumeros'>";
                    echo "<h3>De $i a " . ($i + 9) . "</h3>";
                    for ($j = $i; $j < $i + 10; $j +=2){
                        $recuento++;
                        $sumaGrupal += $j;
                        $sumaTotal += $j;

                        if ($j % 12 == 0) {
                            
                            echo "<p class='destacado'>$j</p>";

                        }else if ($j % 4 == 0) {
                            
                            echo "<p class='azulclaro'>$j</p>";

                        }else if ($j % 6 == 0) {

                            echo "<p class='coralclaro'>$j</p>";

                        }else{

                            echo "<p>$j</p>";

                        }
                        

                    }
                    echo "<p>Suma: $sumaGrupal</p>";
                    echo "<p>Recuento: 5</p>"; 
                echo "</div>";

                }
                echo 
                "</div>
                <div class='recuento'>
                <p>Suma total elementos: $sumaTotal </p>
                <p>Recuento total de elementos = $recuento</p>
                "; 
                
            
            ?>
    </div>
    
    
</body>
</html>