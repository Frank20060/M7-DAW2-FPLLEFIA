<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listas asociativas</title>
</head>
<body>
    <h1>Listas asociativas</h1>
    <?php
    
        $alumno= [
            "nombre" => "Frank",
            "apellido" => "Villar",
            "edad" => 19,
            "curso" => "DAW2",
            "Inteligente" => true
        ];
    
        echo $alumno;   ///Con este no va porque el echo no sirve para este tipo de cosas

        var_dump($alumno);  ///Este muestra demasiado
        echo "<br>";
        print_r($alumno);   //Este es el bueno si queremos mostrar el contenido del array pero muestra mucho
        echo "<br>";
        echo $alumno["nombre"];
        echo $alumno["edad"];
        echo $alumno["Inteligente"];

        //Añadir un elemento

        $alumno["email"] = "ejemplo@gmail.com";
        echo "<br>";
        echo $alumno["email"];


        foreach($alumno as $clave => $valor){

            echo "<p>$clave: $valor</p>";

        }



    ?>
</body>
</html>