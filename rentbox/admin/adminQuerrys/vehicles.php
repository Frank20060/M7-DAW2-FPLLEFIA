<?php
include __DIR__ . './../../dataBase/config/databaseConfig.php';

function getVehicle()
{
    global $mysqli;

    $sql = "SELECT * FROM vehicles";

    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }
    
    $stmt->execute();
    $result = $stmt->get_result();

    $vehicles = $result->fetch_all(MYSQLI_ASSOC); // <-- devuelve todas las filas

    $stmt->close();
    return $vehicles;
}



function crearVehicle()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nom = $_POST['nom'];
        $tipus = $_POST['tipus'];
        $descripcio = $_POST['descripcio'];
        $preu_dia = floatval($_POST['preu']); // convierte a decimal
        $imatge = $_POST['imatge'];
        $disponible = 1;  // boolean 0/1

        global $mysqli;

        $sql = 'INSERT INTO vehicles (nom, tipus, descripcio, preu_dia, imatge, disponible)
                VALUES (?, ?, ?, ?, ?, ?)';
        
        $stmt = $mysqli->prepare($sql);

        if (!$stmt) {
            die("Error en prepare: " . $mysqli->error);
        }

        $stmt->bind_param("sssdsi", $nom, $tipus, $descripcio, $preu_dia, $imatge, $disponible);
        $stmt->execute();
        $stmt->close();
    }
}

function editarVehiculo($id)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nom = $_POST['nom'];
        $tipus = $_POST['tipus'];
        $descripcio = $_POST['descripcio'];
        $preu_dia = $_POST['preu_dia'];
        $imatge = $_POST['imatge'];
        $disponible = $_POST['disponible'];

        global $mysqli;

        $sql = 'UPDATE vehicles SET nom = ?, tipus = ?, descripcio = ?, preu_dia = ?, imatge = ?, disponible = ? WHERE id = ?';
        
        $stmt = $mysqli->prepare($sql);

        if (!$stmt) {
            die("Error en prepare: " . $mysqli->error);
        }

        $stmt->bind_param("sssd sii", $nom, $tipus, $descripcio, $preu_dia, $imatge, $disponible, $id);
        $stmt->bind_param("sssd sii", $nom, $tipus, $descripcio, $preu_dia, $imatge, $disponible, $id);

        // CORRECTO → "sssdsii"
        $stmt->bind_param("sssdsii", $nom, $tipus, $descripcio, $preu_dia, $imatge, $disponible, $id);

        $stmt->execute();
        $stmt->close();
    }
}

function eliminarVehiculo($id)
{
    global $mysqli;

    $sql = 'DELETE FROM vehicles WHERE id = ?';
    $stmt = $mysqli->prepare($sql);

    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();

}

function getVehiclesDisponibles()
{
    global $mysqli;

    $sql = "SELECT * FROM vehicles WHERE disponible = 'Disponible'";
    $result = $mysqli->query($sql);

    $vehicles = [];
    while ($row = $result->fetch_assoc()) {
        $vehicles[] = $row;
    }
    return $vehicles;
}


/////Cambiar el estadooooo

function cambiarEstadoVehiculo($id)
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        global $mysqli;

        $sqlSelect = "SELECT disponible FROM vehicles WHERE id = ?";
        $stmt = $mysqli->prepare($sqlSelect);

        if (!$stmt) {
            die("Error en prepare (select): " . $mysqli->error);
        }

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $vehiculo = $result->fetch_assoc();
        $stmt->close();

        if (!$vehiculo) {
            die("Vehículo no encontrado");
        }

        $nuevoEstado = $vehiculo['disponible'] == 1 ? 0 : 1;

        $sqlUpdate = "UPDATE vehicles SET disponible = ? WHERE id = ?";
        $stmt = $mysqli->prepare($sqlUpdate);

        if (!$stmt) {
            die("Error en prepare (update): " . $mysqli->error);
        }

        $stmt->bind_param("ii", $nuevoEstado, $id);
        $stmt->execute();
        $stmt->close();
    }
}

