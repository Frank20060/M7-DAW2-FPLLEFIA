<?php
session_start();
$userName  = trim($_POST['userName'] ?? '');
$userPass = trim($_POST['userpass'] ?? '');
include 'usuarios.php';



$_SESSION['user'] = $userName;
$_SESSION['password'] = $userPass;

if(isset($_POST['nombrePersonaje'])){$nombre = trim($_POST['nombrePersonaje']);}
if(isset($_POST['habilidadPersonaje'])){$nombre = trim($_POST['habilidadPersonaje']);}
if(isset($_POST['imgPersonaje'])){$nombre = trim($_POST['imgPersonaje']);}


if (($nombre || $habil  || $img )) {
    $nuevo = [
        'nombrePersonaje'     => $nombre,
        'habilidadPersonaje'  => $habil,
        'urlImgPersonaje'     => $img,
    ];
    $_SESSION['personajes'][] = $nuevo;

    header('Location: home.php'); //pa que no se vuelva a enviar dos vezes si F5
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    
    <?php
        include 'header.php';
        
    ?>
    <form action="home.php" method="post">
        <h2>Introduce un personaje que te guste</h2>
        <input type="text" id="nombrePersonaje" name="nombrePersonaje" placeholder="Nombre del personaje">
        <input type="text" id="habilidadPersonaje" name="habilidadPersonaje" placeholder="Habilidad del personaje">
        <input type="text" id="imgPersonaje" name="imgPersonaje" placeholder="URL de la foto del personaje">
        <button>submit</button>

    </form>

    <a href="personaje.php">Ver personajes</a>

</body>
</html>