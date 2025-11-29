<?php
include_once __DIR__ . '/../db/dbconfig/config.php';


//// AÑADIR, EDITAR Y ELIMINAR NOTICIAS

function anadirNoticia() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // 1. Recogemos los datos del formulario
        $titulo            = $_POST['titulo'];
        $subtitulo         = $_POST['subtitulo'];
        $cuerpo            = $_POST['cuerpo'];
        $fecha_publicacion = $_POST['fecha_publicacion']; // tipo DATE en la BD

        // 2. Preparamos la consulta
        global $mysqli;
        $consulta = 'INSERT INTO NOTICIAS (titulo, subtitulo, cuerpo, fecha_publicacion)
                     VALUES (?, ?, ?, ?)';
        $stmt = $mysqli->prepare($consulta);

        if (!$stmt) {
            die("Error en prepare: " . $mysqli->error);
        }

        // 3. Bindeamos parámetros y ejecutamos
        $stmt->bind_param("ssss", $titulo, $subtitulo, $cuerpo, $fecha_publicacion);
        $stmt->execute();
        $stmt->close();
    }
}

function editarNoticia($id_noticia, $nuevo_titulo, $nuevo_subtitulo, $nuevo_cuerpo, $nueva_fecha) {
    global $mysqli;

    $consulta = 'UPDATE NOTICIAS
                 SET titulo = ?, subtitulo = ?, cuerpo = ?, fecha_publicacion = ?
                 WHERE id = ?';

    $stmt = $mysqli->prepare($consulta);
    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }

    $stmt->bind_param("ssssi", $nuevo_titulo, $nuevo_subtitulo, $nuevo_cuerpo, $nueva_fecha, $id_noticia);
    $stmt->execute();
    $actualizadas = $stmt->affected_rows;
    $stmt->close();

    return $actualizadas > 0; // true si se actualizó algo
}

function eliminarNoticia($id_noticia) {
    global $mysqli;

    $consulta = 'DELETE FROM NOTICIAS WHERE id = ?';
    $stmt = $mysqli->prepare($consulta);

    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }

    $stmt->bind_param("i", $id_noticia);
    $stmt->execute();
    $stmt->close();
}
