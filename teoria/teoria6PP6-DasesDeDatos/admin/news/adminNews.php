<!-- LEEREMOS LAS NOTICIAS -->

<?php 


session_start();
include ("../../dbconfig/config.php");


if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'administrador'){
}else{
    header('Location: login.php');
    exit();
}

///Recogemos las noticias de las bases de datos 

$result = $mysqli->query("SELECT * FROM NOTICIAS ORDER BY fecha_publicacion DESC");

$news = $result->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEWS ADMIN PANEL</title>
</head>
<body>
    <!-- TABLA CON LAS NOTICIAS Y LAS ACCIONES ELIMINAR // EDITAR -->
    <h1>Gestión de noticias</h1>
    <a href="createNew.php">Crear Nueva Noticia</a>
    
    <table>
        <tr>
            <th>ID</th>
            <th>TITULO</th>
            <th>SUBTITULO</th>
            <th>CUERPO</th>
            <th>FECHA DE PUBLICACION</th>
            <th>ACCIONES</th>
        </tr>
        <?php foreach($news as $noticia): ?>
            <tr>
                <td><?php echo htmlspecialchars($noticia['id']); ?></td>
                <td><?php echo htmlspecialchars($noticia['titulo']); ?></td>
                <td><?php echo htmlspecialchars($noticia['subtitulo']); ?></td>
                <td><?php echo htmlspecialchars($noticia['cuerpo']); ?></td>
                <td><?php echo htmlspecialchars($noticia['fecha_publicacion']); ?></td>
                <td><?php echo htmlspecialchars($new['data_publicacio']); ?></td>
                <td>
                    <a href="editNews.php?id=<?php echo $new['id']; ?>">Editar</a> |
                    <a href="deleteNews.php?id=<?php echo $new['id']; ?>" onclick="return confirm('¿Estás seguro de que deseas eliminar esta noticia?');">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
    </table>
</body>
</html>

