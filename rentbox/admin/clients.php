<?php 
session_start();
//if(!isset($_SESSION['rol']) || $_SESSION['rol'] !== 'admin') {
//    header('Location: ../error.php'); exit;
//}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients - RentBox Admin</title>
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
                <a class="nav-link active" href="clients.php"><i class="bi bi-people"></i> Clients</a>
                <a class="nav-link" href="rentals.php"><i class="bi bi-calendar-check"></i> Lloguers</a>
            </nav>
        </div>
        
        <div class="col-md-10 p-4">
            <h2 class="mb-4"><i class="bi bi-people"></i> Gestió de Clients</h2>
            
            <div class="card card-custom mb-4">
                <div class="card-body">
                    <form class="row g-3">
                        <div class="col-md-8">
                            <input type="text" class="form-control" placeholder="Cercar per nom o email...">
                        </div>
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-primary-custom">Cercar</button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="card card-custom">
                <div class="card-body">
                    <table class="table table-custom table-hover">
                        <thead>
                            <tr><th>ID</th><th>Nom Complet</th><th>Email</th><th>Data Registre</th><th>Lloguers</th><th>Accions</th></tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2</td>
                                <td>Joan Garcia Martínez</td>
                                <td>joan@email.com</td>
                                <td>01/11/2024</td>
                                <td><span class="badge bg-primary">2</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalEditClient"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bi bi-eye"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Maria López Fernández</td>
                                <td>maria@email.com</td>
                                <td>05/11/2024</td>
                                <td><span class="badge bg-primary">1</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bi bi-eye"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Pere Sánchez Vila</td>
                                <td>pere@email.com</td>
                                <td>10/11/2024</td>
                                <td><span class="badge bg-primary">1</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-sm btn-outline-info"><i class="bi bi-eye"></i></button>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Laura Rodríguez Costa</td>
                                <td>laura@email.com</td>
                                <td>15/11/2024</td>
                                <td><span class="badge bg-primary">1</span></td>
                                <td>
                                    <button class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></button>
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

<div class="modal fade" id="modalEditClient" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background: #1e3a5f; color: white;">
                <h5 class="modal-title"><i class="bi bi-pencil"></i> Editar Client</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <form action="process_client.php" method="POST">
                <div class="modal-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Nom</label>
                            <input type="text" name="nom" class="form-control" value="Joan" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Cognoms</label>
                            <input type="text" name="cognoms" class="form-control" value="Garcia Martínez" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="joan@email.com" required>
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