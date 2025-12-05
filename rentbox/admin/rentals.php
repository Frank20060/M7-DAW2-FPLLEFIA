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
    <title>Lloguers - RentBox Admin</title>
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
                <a class="nav-link" href="vehicles.php"><i class="bi bi-car-front"></i> Vehicles</a>
                <a class="nav-link" href="clients.php"><i class="bi bi-people"></i> Clients</a>
                <a class="nav-link active" href="rentals.php"><i class="bi bi-calendar-check"></i> Lloguers</a>
            </nav>
        </div>
        
        <div class="col-md-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="bi bi-calendar-check"></i> Gestió de Lloguers</h2>
                <button class="btn btn-orange" data-bs-toggle="modal" data-bs-target="#modalRental">
                    <i class="bi bi-plus-lg"></i> Nou Lloguer
                </button>
            </div>
            
            <div class="card card-custom mb-4">
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-md-3">
                            <select class="form-select">
                                <option value="">Tots els clients</option>
                                <option>Joan Garcia</option>
                                <option>Maria López</option>
                                <option>Pere Sánchez</option>
                                <option>Laura Rodríguez</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select">
                                <option value="">Tots els vehicles</option>
                                <option>Xiaomi Scooter Pro</option>
                                <option>Bici Urbana City</option>
                                <option>Moto Elèctrica NIU</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select class="form-select">
                                <option value="">Tots els estats</option>
                                <option>Actiu</option>
                                <option>Pendent</option>
                                <option>Finalitzat</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary-custom w-100">Filtrar</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="card card-custom">
                <div class="card-body">
                    <table class="table table-custom table-hover">
                        <thead>
                            <tr><th>ID</th><th>Client</th><th>Vehicle</th><th>Data Inici</th><th>Data Fi</th><th>Preu</th><th>Estat</th><th>Accions</th></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Joan Garcia</td>
                                <td>Xiaomi Scooter Pro</td>
                                <td>01/12/2024</td>
                                <td>07/12/2024</td>
                                <td>90€</td>
                                <td><span class="badge badge-actiu">Actiu</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-sm btn-outline-success"><i class="bi bi-check-lg"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Maria López</td>
                                <td>Bici Urbana City</td>
                                <td>03/12/2024</td>
                                <td>05/12/2024</td>
                                <td>20€</td>
                                <td><span class="badge badge-pendent">Pendent</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-sm btn-outline-success"><i class="bi bi-check-lg"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Pere Sánchez</td>
                                <td>Moto Elèctrica NIU</td>
                                <td>20/11/2024</td>
                                <td>25/11/2024</td>
                                <td>125€</td>
                                <td><span class="badge badge-finalitzat">Finalitzat</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-info"><i class="bi bi-eye"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Laura Rodríguez</td>
                                <td>Patinet Segway Max</td>
                                <td>02/12/2024</td>
                                <td>09/12/2024</td>
                                <td>126€</td>
                                <td><span class="badge badge-actiu">Actiu</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-sm btn-outline-success"><i class="bi bi-check-lg"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Joan Garcia</td>
                                <td>Bici Elèctrica Eco</td>
                                <td>15/11/2024</td>
                                <td>18/11/2024</td>
                                <td>60€</td>
                                <td><span class="badge badge-finalitzat">Finalitzat</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-info"><i class="bi bi-eye"></i></button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalRental" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #1e3a5f; color: white;">
                <h5 class="modal-title"><i class="bi bi-calendar-plus"></i> Nou Lloguer</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="process_rental.php" method="POST">
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Client</label>
                        <select name="client_id" class="form-select" required>
                            <option value="">Selecciona un client...</option>
                            <option value="2">Joan Garcia Martínez</option>
                            <option value="3">Maria López Fernández</option>
                            <option value="4">Pere Sánchez Vila</option>
                            <option value="5">Laura Rodríguez Costa</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Vehicle</label>
                        <select name="vehicle_id" class="form-select" required>
                            <option value="">Selecciona un vehicle...</option>
                            <option value="1">Xiaomi Scooter Pro - 15€/dia</option>
                            <option value="3">Moto Elèctrica NIU - 25€/dia</option>
                            <option value="4">Patinet Segway Max - 18€/dia</option>
                            <option value="5">Bici Elèctrica Eco - 20€/dia</option>
                        </select>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Data Inici</label>
                            <input type="date" name="data_inici" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Data Fi</label>
                            <input type="date" name="data_fi" class="form-control" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estat</label>
                        <select name="estat" class="form-select" required>
                            <option value="pendent">Pendent</option>
                            <option value="actiu">Actiu</option>
                            <option value="finalitzat">Finalitzat</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel·lar</button>
                    <button type="submit" class="btn btn-orange">Crear Lloguer</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>