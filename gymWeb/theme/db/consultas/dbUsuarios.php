<?php


include_once __DIR__ . "/../dbconfig/config.php";

function getUsuarios() {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM USUARIOS");
    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }
    $stmt->execute();
    $res = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $res;
}