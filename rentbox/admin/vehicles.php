<?php 
session_start();
//if(!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
//    header('Location: ../error.php'); exit;
//}
include_once '../dataBase/config/databaseConfig.php';

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
                            <tr>
                                <td><img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=60&h=40&fit=crop" class="rounded"></td>
                                <td>Xiaomi Scooter Pro</td>
                                <td>Patinet</td>
                                <td>15€</td>
                                <td><span class="badge badge-disponible">Disponible</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="https://images.unsplash.com/photo-1485965120184-e220f721d03e?w=60&h=40&fit=crop" class="rounded"></td>
                                <td>Bici Urbana City</td>
                                <td>Bicicleta</td>
                                <td>10€</td>
                                <td><span class="badge badge-no-disponible">No disponible</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="https://images.unsplash.com/photo-1571068316344-75bc76f77890?w=60&h=40&fit=crop" class="rounded"></td>
                                <td>Moto Elèctrica NIU</td>
                                <td>Moto</td>
                                <td>25€</td>
                                <td><span class="badge badge-disponible">Disponible</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="https://images.unsplash.com/photo-1559320958-5f5179360a8b?w=60&h=40&fit=crop" class="rounded"></td>
                                <td>Patinet Segway Max</td>
                                <td>Patinet</td>
                                <td>18€</td>
                                <td><span class="badge badge-disponible">Disponible</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td><img src="https://images.unsplash.com/photo-1532298229144-0ec0c57515c7?w=60&h=40&fit=crop" class="rounded"></td>
                                <td>Bici Elèctrica Eco</td>
                                <td>Bicicleta</td>
                                <td>20€</td>
                                <td><span class="badge badge-disponible">Disponible</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
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
            <form action="process_vehicle.php" method="POST" enctype="multipart/form-data">
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
                        <label class="form-label">Imatge</label>
                        <input type="file" name="imatge" class="form-control" accept="image/*">
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