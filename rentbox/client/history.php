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
    <title>Historial - RentBox</title>
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
                <a class="nav-link" href="vehicles.php"><i class="bi bi-car-front"></i> Vehicles</a>
                <a class="nav-link active" href="history.php"><i class="bi bi-clock-history"></i> Historial</a>
                <a class="nav-link" href="profile.php"><i class="bi bi-person"></i> Perfil</a>
            </nav>
        </div>
        
        <div class="col-md-10 p-4">
            <h2 class="mb-4"><i class="bi bi-clock-history"></i> El Meu Historial de Lloguers</h2>
            
            <div class="card card-custom">
                <div class="card-body">
                    <table class="table table-custom table-hover">
                        <thead>
                            <tr>
                                <th>Vehicle</th>
                                <th>Data Inici</th>
                                <th>Data Fi</th>
                                <th>Preu Total</th>
                                <th>Estat</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=50&h=50&fit=crop" class="rounded me-2">
                                        <span>Xiaomi Scooter Pro</span>
                                    </div>
                                </td>
                                <td>01/12/2024</td>
                                <td>07/12/2024</td>
                                <td><strong>90€</strong></td>
                                <td><span class="badge badge-actiu">Actiu</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://images.unsplash.com/photo-1532298229144-0ec0c57515c7?w=50&h=50&fit=crop" class="rounded me-2">
                                        <span>Bici Elèctrica Eco</span>
                                    </div>
                                </td>
                                <td>15/11/2024</td>
                                <td>18/11/2024</td>
                                <td><strong>60€</strong></td>
                                <td><span class="badge badge-finalitzat">Finalitzat</span></td>
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
