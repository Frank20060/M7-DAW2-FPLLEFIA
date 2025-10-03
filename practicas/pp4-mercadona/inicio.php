<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FranKSupermercados</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    
    <?php
    include 'includes/header.php';
    ?>
    <h1>FranKSupermercados</h1>

    <?php
    include 'includes/funciones.php';
    include 'data/productos.php';
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $foto = isset($_POST['imgurl']) ? $_POST['imgurl'] : '';
        $telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';



        echo muestraInfoContacto($nombre, $telefono, $foto);
        echo generarTablaProductos($productos);
    ?>


    <?php
    include 'includes/footer.php';
    ?>

</body>
</html>