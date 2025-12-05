<?php 
session_start();
if(!isset($_SESSION['ROL']) || $_SESSION['ROL'] !== 'client') {
    header('Location: ../error.php'); exit;
}
include_once '../dataBase/config/databaseConfig.php';

?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil - RentBox</title>
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
                <a class="nav-link" href="history.php"><i class="bi bi-clock-history"></i> Historial</a>
                <a class="nav-link active" href="profile.php"><i class="bi bi-person"></i> Perfil</a>
            </nav>
        </div>
        
        <div class="col-md-10 p-4">
            <h2 class="mb-4"><i class="bi bi-person"></i> El Meu Perfil</h2>
            
            <div class="row">
                <div class="col-md-8">
                    <div class="card card-custom">
                        <div class="card-header card-header-custom">
                            <i class="bi bi-pencil"></i> Editar Dades
                        </div>
                        <div class="card-body">
                            <form action="update_profile.php" method="POST" enctype="multipart/form-data">
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Nom</label>
                                        <input type="text" name="nom" class="form-control" value="<?php echo $_SESSION['nom'] ?? ''; ?>" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label">Cognoms</label>
                                        <input type="text" name="cognoms" class="form-control" value="<?php echo $_SESSION['cognoms'] ?? ''; ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control" value="<?php echo $_SESSION['email'] ?? ''; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Nova Contrasenya (deixar en blanc si no vols canviar)</label>
                                    <input type="password" name="password" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Foto de Perfil</label>
                                    <input type="file" name="foto" class="form-control" accept="image/*">
                                </div>
                                <button type="submit" class="btn btn-orange">
                                    <i class="bi bi-check-lg"></i> Guardar Canvis
                                </button>
                            </form>
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
