<?php 
session_start();
if(!isset($_SESSION['ROL']) || $_SESSION['ROL'] !== 'admin') {
    header('Location: ../error.php'); exit;
}
include_once '../dataBase/config/databaseConfig.php';
include_once './adminQuerrys/vehicles.php';
$carros = getVehicle();

include_once './adminQuerrys/lloguers.php';
$llogers = getAllLloguers();

include_once './adminQuerrys/clients.php';
$usuarios = getUsuaris();

include_once './adminQuerrys/vehicles.php';
$llogersActius = getLloguersActius();


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
                                <h3 class="mb-0"><?php echo count($carros);?></h3>
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
                                <h3 class="mb-0"><?php echo count($usuarios);?></h3>
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
                                <h3 class="mb-0"><?php echo count($llogers);?></h3>
                                <small class="text-muted">Lloguers historic</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card card-custom stat-card">
                        <div class="card-body d-flex align-items-center">
                            <i class="bi bi-check-circle stat-icon me-3"></i>
                            <div>
                                <h3 class="mb-0"><?php echo count($llogersActius);?></h3>
                                <small class="text-muted">Lloguers actius</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card card-custom">
                <div class="card-header card-header-custom">
                    <i class="bi bi-clock-history"></i> Lloguers Actius
                </div>
                <div class="card-body">
                    <table class="table table-custom table-hover">
                        <thead>
                            <tr>
                                <th>Usuari</th>
                                <th>Vehicle</th>
                                <th>Data Inici</th>
                                <th>Data Fi</th>
                                <th>Estat</th>
                                <th>Preu Total</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach($llogersActius as $lloguer): ?>
                            <tr>
                                <td><?= $lloguer['usuari'] ?></td>
                                <td><?= $lloguer['vehicle'] ?></td>
                                <td><?= $lloguer['data_inici'] ?></td>
                                <td><?= $lloguer['data_fi'] ?></td>
                                <td>
                                    <span class="badge <?= $lloguer['estat'] === 'actiu' ? 'bg-success' : 'bg-secondary' ?>">
                                        <?= $lloguer['estat'] ?>
                                    </span>
                                </td>
                                <td><?= $lloguer['preu_total'] ?>€</td>
                            </tr>
                        <?php endforeach; ?>

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