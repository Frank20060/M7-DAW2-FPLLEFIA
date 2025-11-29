<?php
include_once __DIR__ . '/../db/dbconfig/config.php';


//// AÑADIR, EDITAR Y ELIMINAR TRABAJOS DE PORTAFOLIO

function anadirProyecto() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // 1. Recogemos los datos del formulario
        $titulo      = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $imagen      = $_POST['imagen'];     // nombre de archivo, p.ej. diseno_web.jpg
        $categoria   = $_POST['categoria'];

        // 2. Preparamos la consulta
        global $mysqli;
        $consulta = 'INSERT INTO PORTAFOLIO (titulo, descripcion, imagen, categoria)
                     VALUES (?, ?, ?, ?)';
        $stmt = $mysqli->prepare($consulta);

        if (!$stmt) {
            die("Error en prepare: " . $mysqli->error);
        }

        // 3. Bindeamos parámetros y ejecutamos
        $stmt->bind_param("ssss", $titulo, $descripcion, $imagen, $categoria);
        $stmt->execute();
        $stmt->close();
    }
}

function editarProyecto($id_proyecto, $nuevo_titulo, $nueva_descripcion, $nueva_imagen, $nueva_categoria) {
    global $mysqli;

    $consulta = 'UPDATE PORTAFOLIO
                 SET titulo = ?, descripcion = ?, imagen = ?, categoria = ?
                 WHERE id = ?';

    $stmt = $mysqli->prepare($consulta);
    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }

    $stmt->bind_param("ssssi",
        $nuevo_titulo,
        $nueva_descripcion,
        $nueva_imagen,
        $nueva_categoria,
        $id_proyecto
    );
    $stmt->execute();
    $actualizadas = $stmt->affected_rows;
    $stmt->close();

    return $actualizadas > 0; // true si se actualizó algo
}

function eliminarProyecto($id_proyecto) {
    global $mysqli;

    $consulta = 'DELETE FROM PORTAFOLIO WHERE id = ?';
    $stmt = $mysqli->prepare($consulta);

    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }

    $stmt->bind_param("i", $id_proyecto);
    $stmt->execute();
    $stmt->close();
}
