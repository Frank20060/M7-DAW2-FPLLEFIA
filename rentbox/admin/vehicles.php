<?php 
session_start();
if(!isset($_SESSION['ROL']) || $_SESSION['ROL'] !== 'admin') {
    header('Location: ../error.php'); exit;
}
include_once '../dataBase/config/databaseConfig.php';

include_once './adminQuerrys/vehicles.php';


$carros = getVehicle();


?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicles - RentBox Admin</title>
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
                <a class="nav-link" href="dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
                <a class="nav-link active" href="vehicles.php"><i class="bi bi-car-front"></i> Vehicles</a>
                <a class="nav-link" href="clients.php"><i class="bi bi-people"></i> Clients</a>
                <a class="nav-link" href="rentals.php"><i class="bi bi-calendar-check"></i> Lloguers</a>
            </nav>
        </div>
        
        <div class="col-md-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="bi bi-car-front"></i> Gestió de Vehicles</h2>
                <button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#modalVehicle">
                    <i class="bi bi-plus-lg"></i> Nou Vehicle
                </button>
            </div>
            
            <div class="card card-custom mb-4">
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-md-4">
                            <input type="text" class="form-control" placeholder="Cercar per nom...">
                        </div>
                        <div class="col-md-3">
                            <select class="form-select">
                                <option value="">Tots els tipus</option>
                                <option>Patinet</option>
                                <option>Bicicleta</option>
                                <option>Moto</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select">
                                <option value="">Tots els estats</option>
                                <option>Disponible</option>
                                <option>No disponible</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary-custom w-100">Filtrar</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="card card-custom">
                <div class="card-body">
                    <table class="table table-custom table-hover">
                        <thead>
                            <tr><th>Imatge</th><th>Nom</th><th>Tipus</th><th>Preu/Dia</th><th>Estat</th><th>Accions</th></tr>
                        </thead>
                        <tbody>

                        <?php foreach($carros as $carro): ?>
                            <tr>
                                <td><img src="<?= $carro['imatge'] ?>" class="rounded"></td>
                                <td><?= $carro['nom'] ?></td>
                                <td><?= $carro['tipus'] ?></td>
                                <td><?= $carro['preu_dia'] ?>€</td>
                                <td>
                                    <span class="badge <?= $carro['disponible'] ? 'bg-success' : 'bg-danger' ?>">
                                        <?= $carro['disponible'] ? 'Disponible' : 'No Disponible' ?>
                                    </span>
                                </td>
                                <td>
                                    <a href="modificar.php"><button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button></a>
                                    <a href="eliminarVehiculo.php?id=<?php echo $carro['id']; ?>">
                                        <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalVehicle" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #1e3a5f; color: white;">
                <h5 class="modal-title"><i class="bi bi-car-front"></i> Nou Vehicle</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="./crear_vhicle.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Nom del Vehicle</label>
                        <input type="text" name="nom" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tipus</label>
                        <select name="tipus" class="form-select" required>
                            <option value="patinet">Patinet</option>
                            <option value="bicicleta">Bicicleta</option>
                            <option value="moto">Moto elèctrica</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Preu per dia (€)</label>
                        <input type="number" name="preu" class="form-control" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Imatge URL</label>
                        <input type="text" name="imatge" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripció</label>
                        <textarea name="descripcio" class="form-control" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel·lar</button>
                    <button type="submit" class="btn btn-orange">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>