<?php
session_destroy()
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error - RentBox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<div class="auth-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <div class="card card-custom p-5">
                    <i class="bi bi-shield-x text-danger" style="font-size: 5rem;"></i>
                    <h2 class="mt-4" style="color: #1e3a5f;">Accés Denegat</h2>
                    <p class="text-muted fs-5">No tens permisos per accedir a aquesta secció.</p>
                    <a href="auth/login.php" class="btn btn-orange mt-3">
                        <i class="bi bi-box-arrow-in-right"></i> Tornar al Login
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
