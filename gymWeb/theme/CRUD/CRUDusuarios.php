<?php
include_once '../db/dbconfig/config.php';

//// AÑADIR, EDITAR Y ELIMINAR USUARIOS

function anadirUsuario() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // 1. Recogemos los datos del formulario
        $nombre   = $_POST['nombre'];
        $email    = $_POST['email'];
        $password = $_POST['password'];
        $rol      = $_POST['rol']; // 'usuario' o 'administrador'

        // Opcional: hashear contraseña
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // 2. Preparamos la consulta
        global $mysqli;
        $consulta = 'INSERT INTO USUARIOS (nombre, email, password, rol, fecha_registro)
                     VALUES (?, ?, ?, ?, NOW())';
        $stmt = $mysqli->prepare($consulta);

        if (!$stmt) {
            die("Error en prepare: " . $mysqli->error);
        }

        // 3. Bindeamos parámetros y ejecutamos
        $stmt->bind_param("ssss", $nombre, $email, $hash, $rol);
        $stmt->execute();
        $stmt->close();
    }
}

function editarUsuario($id_usuario, $nuevo_nombre, $nuevo_email, $nuevo_rol, $nueva_password = null) {
    global $mysqli;

    // Si se pasa nueva contraseña, la actualizamos; si no, solo nombre/email/rol
    if (!empty($nueva_password)) {
        $hash = password_hash($nueva_password, PASSWORD_DEFAULT);
        $consulta = 'UPDATE USUARIOS
                     SET nombre = ?, email = ?, password = ?, rol = ?
                     WHERE id = ?';
        $stmt = $mysqli->prepare($consulta);
        if (!$stmt) {
            die("Error en prepare: " . $mysqli->error);
        }
        $stmt->bind_param("ssssi", $nuevo_nombre, $nuevo_email, $hash, $nuevo_rol, $id_usuario);
    } else {
        $consulta = 'UPDATE USUARIOS
                     SET nombre = ?, email = ?, rol = ?
                     WHERE id = ?';
        $stmt = $mysqli->prepare($consulta);
        if (!$stmt) {
            die("Error en prepare: " . $mysqli->error);
        }
        $stmt->bind_param("sssi", $nuevo_nombre, $nuevo_email, $nuevo_rol, $id_usuario);
    }

    $stmt->execute();
    $actualizadas = $stmt->affected_rows;
    $stmt->close();

    return $actualizadas > 0; // true si se actualizó algo
}

function eliminarUsuario($id_usuario) {
    global $mysqli;

    $consulta = 'DELETE FROM USUARIOS WHERE id = ?';
    $stmt = $mysqli->prepare($consulta);

    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }

    $stmt->bind_param("i", $id_usuario);
    $stmt->execute();
    $stmt->close();
}
