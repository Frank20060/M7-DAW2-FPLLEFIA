<?php 
session_start();
//if(!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'client') {
//    header('Location: ../error.php'); exit;
//}
include_once '../dataBase/config/databaseConfig.php';

?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicles - RentBox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="bi bi-car-front-fill me-2"></i>RentBox</a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><span class="nav-link"><i class="bi bi-person-circle"></i> <?php echo $_SESSION['nom'] ?? 'Client'; ?></span></li>
            <li class="nav-item"><a class="nav-link" href="../auth/logout.php"><i class="bi bi-box-arrow-right"></i> Sortir</a></li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar p-0">
            <nav class="nav flex-column py-3">
                <a class="nav-link" href="dashboard.php"><i class="bi bi-house"></i> Inici</a>
                <a class="nav-link active" href="vehicles.php"><i class="bi bi-car-front"></i> Vehicles</a>
                <a class="nav-link" href="history.php"><i class="bi bi-clock-history"></i> Historial</a>
                <a class="nav-link" href="profile.php"><i class="bi bi-person"></i> Perfil</a>
            </nav>
        </div>
        
        <div class="col-md-10 p-4">
            <h2 class="mb-4"><i class="bi bi-car-front"></i> Vehicles Disponibles</h2>
            
            <div class="card card-custom mb-4">
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-md-5">
                            <input type="text" class="form-control" placeholder="Cercar per nom...">
                        </div>
                        <div class="col-md-4">
                            <select class="form-select">
                                <option value="">Tots els tipus</option>
                                <option>Patinet</option>
                                <option>Bicicleta</option>
                                <option>Moto</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary-custom w-100">Filtrar</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="card card-custom vehicle-card h-100">
                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400" class="card-img-top" alt="Patinet">
                        <div class="card-body">
                            <h5 class="card-title">Xiaomi Scooter Pro</h5>
                            <p class="text-muted">Patinet elèctric amb 45km autonomia</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 text-primary mb-0">15€/dia</span>
                                <span class="badge badge-disponible">Disponible</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card card-custom vehicle-card h-100">
                        <img src="https://images.unsplash.com/photo-1571068316344-75bc76f77890?w=400" class="card-img-top" alt="Moto">
                        <div class="card-body">
                            <h5 class="card-title">Moto Elèctrica NIU</h5>
                            <p class="text-muted">Moto elèctrica amb 80km autonomia</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 text-primary mb-0">25€/dia</span>
                                <span class="badge badge-disponible">Disponible</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card card-custom vehicle-card h-100">
                        <img src="https://images.unsplash.com/photo-1559320958-5f5179360a8b?w=400" class="card-img-top" alt="Patinet">
                        <div class="card-body">
                            <h5 class="card-title">Patinet Segway Max</h5>
                            <p class="text-muted">Patinet robust amb suspensió i 65km</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 text-primary mb-0">18€/dia</span>
                                <span class="badge badge-disponible">Disponible</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card card-custom vehicle-card h-100">
                        <img src="https://images.unsplash.com/photo-1532298229144-0ec0c57515c7?w=400" class="card-img-top" alt="Bici">
                        <div class="card-body">
                            <h5 class="card-title">Bici Elèctrica Eco</h5>
                            <p class="text-muted">Bicicleta elèctrica amb bateria 50km</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 text-primary mb-0">20€/dia</span>
                                <span class="badge badge-disponible">Disponible</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card card-custom vehicle-card h-100" style="opacity: 0.6;">
                        <img src="https://images.unsplash.com/photo-1485965120184-e220f721d03e?w=400" class="card-img-top" alt="Bici">
                        <div class="card-body">
                            <h5 class="card-title">Bici Urbana City</h5>
                            <p class="text-muted">Bicicleta urbana amb canvi de 21 velocitats</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="h5 text-primary mb-0">10€/dia</span>
                                <span class="badge badge-no-disponible">No disponible</span>
                            </div>
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