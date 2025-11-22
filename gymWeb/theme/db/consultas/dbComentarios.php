<?php
include_once __DIR__ . "/../dbconfig/config.php";

///Consulta para obtener los comentarios de una noticia junto con la información del usuario que los hizo


function getComentariosNoticia($id) {
    global $mysqli;

    $consulta = 
    'SELECT c.id, c.comentario, c.fecha, c.id_respuesta, u.id AS id_user, u.nombre, u.apellido, u.imagen 
    FROM COMENTARIOS c
    JOIN USUARIOS u ON c.id_usuario = u.id
    WHERE c.id_noticia = ?
    ORDER BY c.fecha';

    $stmt = $mysqli->prepare($consulta);

    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $res;
}

