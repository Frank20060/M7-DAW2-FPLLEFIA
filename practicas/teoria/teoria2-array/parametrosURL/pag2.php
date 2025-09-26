<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina 2</title>
</head>
<body>
    <h1>Esto es la pagina 2 - Recibir datos</h1>

    <?php
        


        echo $_GET['nombre'];
        echo "<br>";
        echo $_GET["edad"];
    
        
        ///isset, se usa para comprovar que existe un parametro con ese nombre
        echo "<hr><h3>ISSET</h3>";
        if(isset($_GET['nombre'])) {

            $n = $_GET['nombre'];   ///Para trabajar mejor guardamos el contenido de lo que pasamos en la url en una variable

            echo "<br>El nombre es: " . $_GET['nombre'];
            echo "<br>El nombre es: $n";
        } else {
            echo "<br>No se ha recibido el nombre";

        }



    ?>

</body>
</html>