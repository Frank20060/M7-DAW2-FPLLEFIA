<?php 
    session_start();
    include ("dbconfig/config.php");
    

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        //1. Recogemos los datos
        
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $rol = 'usuario';

        //2. Hasheamos la password

        $password_hasheada = password_hash($password, PASSWORD_DEFAULT);


        //3.Preparamos la consulta para insertar el nuevo usuario

        $stmt = $mysqli->prepare("INSERT INTO USUARIOS (nombre, email, password, rol, fecha_registro) VALUES (?, ?, ?, 'usuario', NOW())");

        //4. Comprobar la preparación

        if(!$stmt){
            die('Error en la preparacion: ' . $mysqli->error);
        }

        //5. Bindeamos los parametros 
        $stmt -> bind_param('sss', $nom, $email, $password_hasheada);

        //6. Ejecutamos la consulta

        if($stmt->execute()){
            echo 'Usuario registrado correctamente .<a href="login.php">Iniciar sesión</a>';
        }else{
            echo 'Error al registrar el usuario' . $stmt->error;
        }

        //7.cerramos la conexion

        $stmt->close();
        $mysqli->close();


    }

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
    <h2>Registro de Usuario</h2>
    <form method="POST" action="registro.php">
        <label for="nom">Nombre:</label><br>
        <input type="text" id="nom" name="nom" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Registrar">
</body>
</html>

