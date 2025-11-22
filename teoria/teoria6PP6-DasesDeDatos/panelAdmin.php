<?php 
session_start();
if(isset($_SESSION['user_role'])&& $_SESSION['user_rol'] === 'administrador'){


}else{
    header('Location: index.php');
    exit();
}


include_once("dbconfig/config.php");


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
</head>
<body>
    <h1>Panel Admin</h1>
    <ul>
        <li><a href="./admin/news/adminNews.php">Gestionar Noticias</a></li>
        <li><a href=""></a></li>
        <li><a href=""></a></li>
        <li><a href=""></a></li>
    </ul>
    
</body>
</html>
