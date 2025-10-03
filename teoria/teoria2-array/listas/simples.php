<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listas Simples</title>
</head>
<body>
    <h1>Listas Simples</h1>
    <?php
    
    $dias = ["Lunes ", "Martes ", "Miercoles ", "Jueves ", "Viernes "];
    echo $dias[0];  //Lunes 
    echo $dias[1];  //Martes
    echo $dias[2];  
    echo $dias[3];
    
    $dias[] = "Sabado ";
    array_push($dias, "Domingo");    //Añadir
    array_pop($dias);   //Eliminar el ultimo elemento añadido



    echo "<br>";

    //Bucle foreach
    foreach($dias as $dia){

        echo $dia;

    }



    ?>
</body>
</html>