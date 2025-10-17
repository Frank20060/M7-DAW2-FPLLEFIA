<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<body>
    <div>
        <?php
            include 'header.php';
        ?>
        <?php
        
        if($_GET['incorrecto']){

            echo 'Contraseña o usuario Incorrectos';

        }

        ?>
        <form action="home.php" method="post">
            <input type="text" name="userName" id="userName" placeholder="Nombre Usuario" require>
            <input type="password" name="userpass" id="userpass" placeholder="Contraseña" require>
            <button>Submit</button>
        </form>
    </div>
    
</body>
</html>