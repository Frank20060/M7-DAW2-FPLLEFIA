<?php
include __DIR__ . './../../dataBase/config/databaseConfig.php';

function getUsuaris()
{
    global $mysqli;

    $sql = "SELECT * FROM usuaris";

    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }

    $stmt->execute();

    $result = $stmt->get_result();
    $usuari = $result->fetch_all(MYSQLI_ASSOC);

    $stmt->close();

    return $usuari; // devuelve null si no existe
}



function getUsuari($id)
{
    global $mysqli;

    $sql = "SELECT * FROM usuaris WHERE id = ?";

    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $usuari = $result->fetch_assoc();

    $stmt->close();

    return $usuari; // devuelve null si no existe
}



function crearUsuari()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nom = $_POST['nom'];
        $cognoms = $_POST['cognoms'];
        $email = $_POST['email'];
        $password = $_POST['password'];   // cifrar fuera o aquí, como quieras
        $rol = 'client';
        $foto = $_POST['foto'] ?? null;

        global $mysqli;

        $sql = "INSERT INTO usuaris (nom, cognoms, email, password, rol, foto)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $mysqli->prepare($sql);

        if (!$stmt) {
            die("Error en prepare: " . $mysqli->error);
        }

        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt->bind_param("ssssss", $nom, $cognoms, $email, $hash, $rol, $foto);
        $stmt->execute();
        $stmt->close();
    }
}

function editarUsuari($id)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nom = $_POST['nom'];
        $cognoms = $_POST['cognoms'];
        $email = $_POST['email'];
        $password = $_POST['password'];   // opcionalmente puedes no actualizar
        $rol = $_POST['rol'];
        $foto = $_POST['foto'] ?? null;

        global $mysqli;

        $sql = "UPDATE usuaris 
                SET nom = ?, 
                    cognoms = ?, 
                    email = ?, 
                    password = ?, 
                    rol = ?, 
                    foto = ?
                WHERE id = ?";

        $stmt = $mysqli->prepare($sql);

        if (!$stmt) {
            die("Error en prepare: " . $mysqli->error);
        }

        $stmt->bind_param("ssssssi", $nom, $cognoms, $email, $password, $rol, $foto, $id);
        $stmt->execute();
        $stmt->close();
    }
}

function eliminarUsuari($id)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        global $mysqli;

        $sql = "DELETE FROM usuaris WHERE id = ?";
        $stmt = $mysqli->prepare($sql);

        if (!$stmt) {
            die("Error en prepare: " . $mysqli->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
