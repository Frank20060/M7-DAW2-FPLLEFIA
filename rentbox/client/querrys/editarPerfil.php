<?php
    session_start();
    include __DIR__ . '../config/databaseConfig.php';
    
    function editarUsuari()
    {

        if (isset($_SESSION['id'])) {
            $id = $_SESSION['id'];
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {

                $nom = $_POST['nom'];
                $cognoms = $_POST['cognoms'];
                $email = $_POST['email'];
                $password = $_POST['password']; 
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
    }