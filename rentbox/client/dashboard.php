<?php 
session_start();
if(!isset($_SESSION['ROL']) || $_SESSION['ROL'] !== 'client') {
    header('Location: ../error.php'); exit;
}
include '../dataBase/config/databaseConfig.php';

?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Meu Panell - RentBox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>


<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar p-0">
            <nav class="nav flex-column py-3">
                <a class="nav-link active" href="dashboard.php"><i class="bi bi-house"></i> Inici</a>
                <a class="nav-link" href="vehicles.php"><i class="bi bi-car-front"></i> Vehicles</a>
                <a class="nav-link" href="history.php"><i class="bi bi-clock-history"></i> Historial</a>
                <a class="nav-link" href="profile.php"><i class="bi bi-person"></i> Perfil</a>
            </nav>
        </div>
        
        <div class="col-md-10 p-4">
            <h2 class="mb-4"><i class="bi bi-house"></i> Benvingut/da, <?php echo $_SESSION['nom'] ?? 'Client'; ?>!</h2>
            
            <div class="card card-custom mb-4">
                <div class="card-header card-header-custom">
                    <i class="bi bi-calendar-check"></i> Els Meus Lloguers Actius
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card vehicle-card">
                                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400" class="card-img-top" alt="Vehicle">
                                <div class="card-body">
                                    <h5 class="card-title">Xiaomi Scooter Pro</h5>
                                    <p class="text-muted mb-2"><i class="bi bi-calendar"></i> 01/12/2024 - 07/12/2024</p>
                                    <span class="badge badge-actiu">Actiu</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <h4 class="mb-3"><i class="bi bi-star"></i> Vehicles Disponibles</h4>
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card card-custom vehicle-card">
                        <img src="https://images.unsplash.com/photo-1571068316344-75bc76f77890?w=400" class="card-img-top" alt="Moto">
                        <div class="card-body">
                            <h5 class="card-title">Moto Elèctrica NIU</h5>
                            <p class="text-muted">Moto · 25€/dia</p>
                            <span class="badge badge-disponible mb-2">Disponible</span>
                            <a href="vehicles.php" class="btn btn-orange btn-sm w-100">Veure detalls</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card card-custom vehicle-card">
                        <img src="https://images.unsplash.com/photo-1559320958-5f5179360a8b?w=400" class="card-img-top" alt="Patinet">
                        <div class="card-body">
                            <h5 class="card-title">Patinet Segway Max</h5>
                            <p class="text-muted">Patinet · 18€/dia</p>
                            <span class="badge badge-disponible mb-2">Disponible</span>
                            <a href="vehicles.php" class="btn btn-orange btn-sm w-100">Veure detalls</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card card-custom vehicle-card">
                        <img src="https://images.unsplash.com/photo-1532298229144-0ec0c57515c7?w=400" class="card-img-top" alt="Bici">
                        <div class="card-body">
                            <h5 class="card-title">Bici Elèctrica Eco</h5>
                            <p class="text-muted">Bicicleta · 20€/dia</p>
                            <span class="badge badge-disponible mb-2">Disponible</span>
                            <a href="vehicles.php" class="btn btn-orange btn-sm w-100">Veure detalls</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>