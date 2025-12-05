<?php
session_start();
if (!isset($_SESSION['ROL']) || $_SESSION['ROL'] !== 'admin') {
    header('Location: ../error.php'); exit;
}

include __DIR__ . './../dataBase/config/databaseConfig.php';
include_once './adminQuerrys/lloguers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    crearLloguer(); // la función que ya tienes
    header('Location: ./rentals.php'); 
    exit;
}
?>
