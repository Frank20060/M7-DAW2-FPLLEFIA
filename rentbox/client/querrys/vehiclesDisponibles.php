<?php
    include __DIR__ . '../config/databaseConfig.php';



    function getVehiclesDisponibles(){
        global $mysqli;
        $sql = 'SELECT * FROM vehicles where disponible = 1';
        $stmt = $mysqli->prepare($sql);
        if (!$stmt) {
            die("Error en prepare: " . $mysqli->error);
        }
        $stmt->execute();
        $res = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $res;
    }

