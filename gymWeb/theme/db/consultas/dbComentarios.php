<?php
include_once __DIR__ . "/../dbconfig/config.php";


function getComentarios() {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM COMENTARIOS");
    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }
    $stmt->execute();
    $res = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $res;
}

///Comentario de noticia
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

//Comentario de comentarioç


function getComentariosComentario($id) {
    global $mysqli;

    $consulta =
    '
    SELECT c.id, c.comentario, c.fecha, c.id_respuesta, u.id AS id_user, u.nombre, u.apellido, u.imagen
    FROM COMENTARIOS c
    JOIN USUARIOS u ON c.id_usuario = u.id
    WHERE c.id_respuesta = ?
    ORDER BY c.fecha
    ';

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

function getComentarioById($id) {
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT * FROM COMENTARIOS WHERE id = ? LIMIT 1");
    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }

    $stmt->bind_param("i", $id);   // i = integer
    $stmt->execute();

    $res = $stmt->get_result()->fetch_assoc(); // un solo registro
    $stmt->close();

    return $res; // array asociativo o null si no existe
}
