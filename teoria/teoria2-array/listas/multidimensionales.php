<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listas multidimensionales</title>
</head>
<body>
    <h1>Listas multidimensionales</h1>


    <?php
    
        $alumnos = [
            [
                "nombre" => "Frank",
                "apellido" => "Villar",
                "edad" => 19,
                "curso" => "DAW2",
                "Inteligente" => true
            ],
            [
                "nombre" => "Ana",
                "apellido" => "Lopez",
                "edad" => 20,
                "curso" => "DAW1",
                "Inteligente" => false
            ],
            [
                "nombre" => "Luis",
                "apellido" => "Martinez",
                "edad" => 21,
                "curso" => "DAW2",
                "Inteligente" => true
            ]
        ];

        ///var_dump($alumnos)

        foreach($alumnos as $alumno){

            echo "<h2>{$alumno["nombre"]} {$alumno["apellido"]}</h2>";
            echo "<p>Edad: {$alumno["edad"]}  </p> ";
            echo "<p>Curso: {$alumno["curso"]}</p>";

            echo "<hr>";

        }
    
    ?>

</body>
</html>