<?php
session_start();
include __DIR__ . './../dataBase/config/databaseConfig.php';

$error = '';

// Si ya está logueado, redirigir según rol
if (isset($_SESSION['USER']) && isset($_SESSION['ROL'])) {
    if ($_SESSION['ROL'] === 'client') {
        header('Location: ../client/dashboard.php');
        exit;
    } elseif ($_SESSION['ROL'] === 'admin') {
        header('Location: ../admin/dashboard.php');
        exit;
    }
}

// Procesar login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT id, nom, cognoms, email, password, rol FROM usuaris WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    if (!$stmt) die("Error en prepare: " . $mysqli->error);

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuari = $result->fetch_assoc();
    $stmt->close();

    if ($usuari) {
        // Verificar password
        if (password_verify($password, $usuari['password'])) {
            // Login OK
            $_SESSION['USER'] = $usuari['id'];
            $_SESSION['ROL'] = $usuari['rol'];
            $_SESSION['NOM'] = $usuari['nom'];

            if ($usuari['rol'] === 'client') {
                header('Location: ../client/dashboard.php');
            } else {
                header('Location: ../admin/dashboard.php');
            }
            exit;
        } else {
            $error = "Contrasenya incorrecta.";
        }
    } else {
        $error = "Usuari no trobat.";
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - RentBox</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
<div class="auth-container">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card auth-card">
                    <div class="auth-header" style="background: #f6a623; padding: 2rem; text-align: center;">
                        <h2 class="text-white mb-0">
                            <i class="bi bi-car-front-fill"></i> RentBox
                        </h2>
                        <p class="text-white-50 mb-0">Mobility Solutions</p>
                    </div>
                    <div class="card-body p-4">
                        <h4 class="text-center mb-4">Iniciar Sessió</h4>

                        <?php if($error): ?>
                            <div class="alert alert-danger"><?php echo $error; ?></div>
                        <?php endif; ?>

                        <form action="" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Contrasenya</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                    <input type="password" name="password" class="form-control" required>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-orange w-100 py-2">
                                <i class="bi bi-box-arrow-in-right"></i> Entrar
                            </button>
                        </form>
                        <hr>
                        <p class="text-center mb-0">
                            No tens compte? <a href="register.php" style="color: #f6a623;">Registra't</a>
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
