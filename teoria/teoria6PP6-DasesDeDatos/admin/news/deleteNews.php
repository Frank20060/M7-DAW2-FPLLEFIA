<?php 

    session_start();
    include ("../../dbconfig/config.php");
    //Verificamos si el usuario es administrador
    if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'administrador'){
    }else{
        header('Location: login.php');
        exit();
    }

    //Recogemos el ID de la noticia a eliminar
    if(isset($_GET['id']) || empty($_GET['id'])){
        $news_id = $_GET['id'];

        //Preparamos la consulta para eliminar la noticia
        $stmt = $mysqli->prepare("DELETE FROM NOTICIAS WHERE id = ?");

        //Comprobamos la preparación
        if(!$stmt){
            die('Error en la preparación: ' . $mysqli->error);
        }

        //Bindeamos el parámetro
        $stmt->bind_param('i', $news_id);

        //Ejecutamos la consulta
        if($stmt->execute()){
            header('Location: adminNews.php');
            exit();
        }else{
            echo 'Error al eliminar la noticia: ' . $stmt->error;
        }

        //Cerramos la conexión
        $stmt->close();
        $mysqli->close();
    }

?>