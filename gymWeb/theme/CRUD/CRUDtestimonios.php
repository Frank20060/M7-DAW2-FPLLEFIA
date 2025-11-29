<?php
include_once '../db/dbconfig/config.php';

//// AÑADIR, EDITAR Y ELIMINAR TESTIMONIOS

function anadirTestimonio() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // 1. Recogemos los datos del formulario
        $nombre     = $_POST['nombre'];
        $apellido   = $_POST['apellido'];
        $testimonio = $_POST['testimonio'];
        $imagen     = $_POST['imagen'];   // nombre de archivo, p.ej. laura.jpg
        $fecha      = $_POST['fecha'];    // tipo DATE en la BD

        // 2. Preparamos la consulta
        global $mysqli;
        $consulta = 'INSERT INTO TESTIMONIOS (nombre, apellido, testimonio, imagen, fecha)
                     VALUES (?, ?, ?, ?, ?)';
        $stmt = $mysqli->prepare($consulta);

        if (!$stmt) {
            die("Error en prepare: " . $mysqli->error);
        }

        // 3. Bindeamos parámetros y ejecutamos
        $stmt->bind_param("sssss", $nombre, $apellido, $testimonio, $imagen, $fecha);
        $stmt->execute();
        $stmt->close();
    }
}

function editarTestimonio($id_testimonio, $nuevo_nombre, $nuevo_apellido, $nuevo_testimonio, $nueva_imagen, $nueva_fecha) {
    global $mysqli;

    $consulta = 'UPDATE TESTIMONIOS
                 SET nombre = ?, apellido = ?, testimonio = ?, imagen = ?, fecha = ?
                 WHERE id = ?';

    $stmt = $mysqli->prepare($consulta);
    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }

    $stmt->bind_param("sssssi",
        $nuevo_nombre,
        $nuevo_apellido,
        $nuevo_testimonio,
        $nueva_imagen,
        $nueva_fecha,
        $id_testimonio
    );
    $stmt->execute();
    $actualizadas = $stmt->affected_rows;
    $stmt->close();

    return $actualizadas > 0; // true si se actualizó algo
}

function eliminarTestimonio($id_testimonio) {
    global $mysqli;

    $consulta = 'DELETE FROM TESTIMONIOS WHERE id = ?';
    $stmt = $mysqli->prepare($consulta);

    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }

    $stmt->bind_param("i", $id_testimonio);
    $stmt->execute();
    $stmt->close();
}
