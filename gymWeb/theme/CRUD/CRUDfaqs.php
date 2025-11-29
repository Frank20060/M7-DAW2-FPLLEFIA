<?php
include_once __DIR__ . '/../db/dbconfig/config.php';


//// AÑADIR, EDITAR Y ELIMINAR FAQS

function anadirFAQ() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // 1. Datos del formulario
        $pregunta  = $_POST['pregunta'];
        $respuesta = $_POST['respuesta'];

        // 2. Consulta preparada
        global $mysqli;
        $consulta = 'INSERT INTO FAQS (pregunta, respuesta)
                     VALUES (?, ?)';
        $stmt = $mysqli->prepare($consulta);

        if (!$stmt) {
            die("Error en prepare: " . $mysqli->error);
        }

        // 3. Ejecutar
        $stmt->bind_param("ss", $pregunta, $respuesta);
        $stmt->execute();
        $stmt->close();
    }
}

function editarFAQ($id_faq, $nueva_pregunta, $nueva_respuesta) {
    global $mysqli;

    $consulta = 'UPDATE FAQS
                 SET pregunta = ?, respuesta = ?
                 WHERE id = ?';

    $stmt = $mysqli->prepare($consulta);
    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }

    $stmt->bind_param("ssi", $nueva_pregunta, $nueva_respuesta, $id_faq);
    $stmt->execute();
    $actualizadas = $stmt->affected_rows;
    $stmt->close();

    return $actualizadas > 0; // true si se actualizó algo
}

function eliminarFAQ($id_faq) {
    global $mysqli;

    $consulta = 'DELETE FROM FAQS WHERE id = ?';
    $stmt = $mysqli->prepare($consulta);

    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }

    $stmt->bind_param("i", $id_faq);
    $stmt->execute();
    $stmt->close();
}
