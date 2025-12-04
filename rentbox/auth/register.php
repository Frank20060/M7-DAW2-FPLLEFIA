<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registre - RentBox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
<div class="auth-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card" style="border-radius: 20px; overflow: hidden;">
                    <div style="background: #f6a623; padding: 2rem; text-align: center;">
                        <h2 class="text-white mb-0"><i class="bi bi-car-front-fill"></i> RentBox</h2>
                        <p class="text-white-50 mb-0">Mobility Solutions</p>
                    </div>
                    <div class="card-body p-4">
                        <h4 class="text-center mb-4">Crear Compte</h4>
                        
                        <?php if(isset($_GET['error'])): ?>
                        <div class="alert alert-danger">
                            <i class="bi bi-exclamation-circle"></i> <?php echo htmlspecialchars($_GET['error']); ?>
                        </div>
                        <?php endif; ?>
                        
                        <form action="process_register.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Nom</label>
                                    <input type="text" name="nom" class="form-control" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Cognoms</label>
                                    <input type="text" name="cognoms" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Contrasenya</label>
                                <input type="password" name="password" class="form-control" required minlength="6">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Foto (opcional)</label>
                                <input type="file" name="foto" class="form-control" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-orange w-100 py-2">
                                <i class="bi bi-person-plus"></i> Registrar-se
                            </button>
                        </form>
                        <hr>
                        <p class="text-center mb-0">
                            Ja tens compte? <a href="login.php" style="color: #f6a623;">Inicia sessió</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>