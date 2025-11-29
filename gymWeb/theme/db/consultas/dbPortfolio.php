<?php


include_once __DIR__ . "/../dbconfig/config.php";

function getProyectos() {
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT * FROM PORTAFOLIO");
    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }
    $stmt->execute();
    $res = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $res;
}


function getProyectoById($id) {
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT * FROM PORTAFOLIO WHERE id = ? LIMIT 1");
    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }

    $stmt->bind_param("i", $id);   // i = integer
    $stmt->execute();

    $res = $stmt->get_result()->fetch_assoc(); // un solo registro
    $stmt->close();

    return $res; // array asociativo o null si no existe
}