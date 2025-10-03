<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teoria3 - Formularios</title>
</head>
<body>
    <h1>Teoria 3 - Formularios</h1>

    <form action="index.php" method="post">

        <input type="text" name="nombre" placeholder="Nombre">
        <input type="number" name="edad" placeholder="Edad">
        <input type="submit" value="Enviar">

    </form>

    <?php
        ///Con GET
        /*echo $_GET['nombre'];
        echo '<br>';
        echo $_GET['edad'];
        echo '<br>';*/

        ///Ahora con POST
        echo $_POST['nombre'];
        echo '<br>';
        echo $_POST['edad'];
        echo '<br>';

        
    ?>


    <h1>LogIn</h1>
    <form action="index.php" method="post">

        <input type="text" name="nombre" placeholder="Nombre">
        <input type="pass" name="contrasena" placeholder="Edad">
        <input type="submit" value="Enviar">

    </form>
    <?php
        $datos = [
            ['nombre' => 'Frank', 'contrasena' => '1234'],
            ['nombre' => 'Ana', 'contrasena' => 'abcd'],
            ['nombre' => 'Luis', 'contrasena' => '5678'],
        ];
        $nombre = $_POST['nombre'];
        $contrasena = $_POST['contrasena'];
        if(isset($nombre) && isset($contrasena)){
            $encontrado = false;
            foreach($datos as $usuario){
                if($usuario['nombre'] === $nombre && $usuario['contrasena'] === $contrasena){
                    $encontrado = true;
                    
                }
            }
            if($encontrado){
                echo "<h2>Bienvenido, $nombre</h2>";
            } else {
                echo "<h2>Usuario o contraseña incorrectos</h2>";
            }
        }
    ?>

</body>
</html>