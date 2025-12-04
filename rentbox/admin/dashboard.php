<?php 
session_start();
//if(!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
//    header('Location: ../error.php'); exit;
//}
include '../config/database.php';
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - RentBox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><i class="bi bi-car-front-fill me-2"></i>RentBox</a>
        <ul class="navbar-nav ms-auto">
            <li class="nav-item"><span class="nav-link"><i class="bi bi-person-circle"></i> <?php echo $_SESSION['nom'] ?? 'Admin'; ?></span></li>
            <li class="nav-item"><a class="nav-link" href="../auth/logout.php"><i class="bi bi-box-arrow-right"></i> Sortir</a></li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 sidebar p-0">
            <nav class="nav flex-column py-3">
                <a class="nav-link active" href="dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
                <a class="nav-link" href="vehicles.php"><i class="bi bi-car-front"></i> Vehicles</a>
                <a class="nav-link" href="clients.php"><i class="bi bi-people"></i> Clients</a>
                <a class="nav-link" href="rentals.php"><i class="bi bi-calendar-check"></i> Lloguers</a>
            </nav>
        </div>
        
        <div class="col-md-10 p-4">
            <h2 class="mb-4"><i class="bi bi-speedometer2"></i> Dashboard</h2>
            
            <div class="row mb-4">
                <div class="col-md-3">
                    <div class="card card-custom stat-card">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-car-front stat-icon me-3"></i>
                            <div>
                                <h3 class="mb-0">5</h3>
                                <small class="text-muted">Vehicles</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-custom stat-card">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-people stat-icon me-3"></i>
                            <div>
                                <h3 class="mb-0">4</h3>
                                <small class="text-muted">Clients</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-custom stat-card">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-calendar-check stat-icon me-3"></i>
                            <div>
                                <h3 class="mb-0">2</h3>
                                <small class="text-muted">Lloguers Actius</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-custom stat-card">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-check-circle stat-icon me-3"></i>
                            <div>
                                <h3 class="mb-0">4</h3>
                                <small class="text-muted">Disponibles</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card card-custom">
                <div class="card-header card-header-custom">
                    <i class="bi bi-clock-history"></i> Últims Lloguers
                </div>
                <div class="card-body">
                    <table class="table table-custom table-hover">
                        <thead>
                            <tr><th>Client</th><th>Vehicle</th><th>Data Inici</th><th>Estat</th></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Joan Garcia</td>
                                <td>Xiaomi Scooter Pro</td>
                                <td>01/12/2024</td>
                                <td><span class="badge badge-actiu">Actiu</span></td>
                            </tr>
                            <tr>
                                <td>Maria López</td>
                                <td>Bici Urbana City</td>
                                <td>03/12/2024</td>
                                <td><span class="badge badge-pendent">Pendent</span></td>
                            </tr>
                            <tr>
                                <td>Pere Sánchez</td>
                                <td>Moto Elèctrica NIU</td>
                                <td>20/11/2024</td>
                                <td><span class="badge badge-finalitzat">Finalitzat</span></td>
                            </tr>
                            <tr>
                                <td>Laura Rodríguez</td>
                                <td>Patinet Segway Max</td>
                                <td>02/12/2024</td>
                                <td><span class="badge badge-actiu">Actiu</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>