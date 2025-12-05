<?php
    session_start();
    include __DIR__ . '../config/databaseConfig.php';



    function getLloguersActiusPorUsuario()
        {
            if (isset($_SESSION['id'])) {
                $id = $_SESSION['id'];
                
                
                global $mysqli;

                $sql = "SELECT l.id AS lloguer_id, v.nom AS vehicle_nom, v.tipus AS vehicle_tipus, v.preu_dia AS vehicle_preu_dia, l.data_inici,
                            l.data_fi, l.preu_total, l.data_creacio FROM lloguers l JOIN vehicles v ON l.vehicle_id = v.id
                            WHERE l.estat = 'actiu' AND l.usuari_id = ? ORDER BY l.data_inici ASC";

                $stmt = $mysqli->prepare($sql);
                if (!$stmt) die("Error en prepare: " . $mysqli->error);

                $stmt->bind_param("i", $id);
                $stmt->execute();
                $res = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                $stmt->close();

                return $res;
            }
            
        }
function getHistorialLloguers()
{


    if (isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        global $mysqli;

        $sql = "SELECT l.id AS lloguer_id, v.nom AS vehicle_nom, v.tipus AS vehicle_tipus, v.preu_dia AS vehicle_preu_dia, l.data_inici, l.data_fi,
                    l.estat, l.preu_total, l.data_creacio FROM lloguers l JOIN vehicles v ON l.vehicle_id = v.id
                WHERE l.usuari_id = ? ORDER BY l.data_inici DESC";

        $stmt = $mysqli->prepare($sql);
        if (!$stmt) die("Error en prepare: " . $mysqli->error);

        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $res;
    }
}


