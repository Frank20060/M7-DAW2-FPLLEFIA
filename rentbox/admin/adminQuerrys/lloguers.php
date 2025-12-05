<?php
include __DIR__ . './../../dataBase/config/databaseConfig.php';


function crearLloguer()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        global $mysqli;

        $usuari_id   = $_POST['usuari_id'];
        $vehicle_id  = $_POST['vehicle_id'];
        $data_inici  = $_POST['data_inici'];
        $data_fi     = $_POST['data_fi'];
        $estat       = $_POST['estat']; // actiu, pendent, finalitzat

        // obtener precio del vehículo
        $sqlVeh = "SELECT preu_dia FROM vehicles WHERE id = ?";
        $stmt = $mysqli->prepare($sqlVeh);
        $stmt->bind_param("i", $vehicle_id);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        if (!$res) {
            die("Vehículo no encontrado");
        }

        $preu_dia = $res['preu_dia'];

        // calcular dias
        $dias = (strtotime($data_fi) - strtotime($data_inici)) / 86400;
        if ($dias <= 0) $dias = 1;

        /////total
        $preu_total = $dias * $preu_dia;

        /////CRear lloguer
        $sql = "INSERT INTO lloguers (usuari_id, vehicle_id, data_inici, data_fi, estat, preu_total)
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $mysqli->prepare($sql);

        if (!$stmt) die("Error prepare: " . $mysqli->error);

        $stmt->bind_param("iisssd",
            $usuari_id,
            $vehicle_id,
            $data_inici,
            $data_fi,
            $estat,
            $preu_total
        );

        $stmt->execute();
        $stmt->close();
    }
}


function getAllLloguers()
{
    global $mysqli;

    $sql = "SELECT l.id, u.nom AS usuari, v.nom AS vehicle, l.data_inici, l.data_fi, l.estat, l.preu_total, l.data_creacio
            FROM lloguers l JOIN usuaris u ON l.usuari_id = u.id JOIN vehicles v ON l.vehicle_id = v.id ORDER BY l.data_creacio DESC";

    $result = $mysqli->query($sql);

    $lloguers = [];
    while ($row = $result->fetch_assoc()) {
        $lloguers[] = $row;
    }

    return $lloguers;
}

function getLloguersActius()
{
    global $mysqli;

    $sql = "SELECT l.id, u.nom AS usuari, v.nom AS vehicle, l.data_inici, l.data_fi, l.estat, l.preu_total, l.data_creacio
            FROM lloguers l JOIN usuaris u ON l.usuari_id = u.id JOIN vehicles v ON l.vehicle_id = v.id WHERE estat = 'actiu' ORDER BY l.data_creacio DESC";

    $result = $mysqli->query($sql);

    $lloguers = [];
    while ($row = $result->fetch_assoc()) {
        $lloguers[] = $row;
    }

    return $lloguers;
}