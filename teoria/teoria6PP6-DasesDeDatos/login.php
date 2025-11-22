<?php 

session_start();
include_once("dbconfig/config.php");

//1. Verificar si el formulario ha sido enviado

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //2. recogemos los datos del formulario
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $mysqli->prepare("SELECT id, nombre, email, password, rol FROM USUARIOS WHERE email = ?");
    //4.comprobar que la preparacion tuvo exito

    if(!$stmt){
        die("Error en la preparación" . $mysqli->error);
    }

    //5. Bindear los parametros

    $stmt->bind_param('s', $email);

    //6. Ejecutar la consulta

    $stmt->execute();
    //7.guardamos el resultado
    $resultado = $stmt->get_result();

    ///var_dump($resultado);

    //8. Comprobar si se encontró un usuario

    if($resultado->num_rows ===1){
        $user = $resultado->fetch_assoc();
        //print_r($user);
    }

    //9.Verificar la contraseña

    if(password_verify($password, $user['password'])){
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['nombre'];
        $_SESSION['user_email'] = $user['email'];
        $_SESSION['user_role'] = $user['rol'];
        //Redirigir a una pagina

        header('Location: index.php');
    }


}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario tonto para comprobar username y password</title>
</head>
<body>
    <h2>Login de Usuario</h2>
    <form method="POST" action="login.php">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        
        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        
        <input type="submit" value="Iniciar Sesión">
</body>
</html>
