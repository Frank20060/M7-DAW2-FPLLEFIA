<?php 
    session_start();
    if(!isset($_SESSION['ROL']) || $_SESSION['ROL'] !== 'admin') {
        header('Location: ../error.php'); 
        exit;
    }

    include_once '../dataBase/config/databaseConfig.php';
    include_once './adminQuerrys/vehicles.php';

    // Solo crear si viene del formulario POST
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        crearVehicle();
        header('Location: ../admin/vehicles.php'); 
        exit;
    }