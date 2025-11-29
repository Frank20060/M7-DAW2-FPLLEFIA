<?php
session_start();
include_once './db/dbconfig/config.php';

//Recojemos los datos por post y comprovamos si esta en la base de datos, y guardamos en la sesion los datos del usuario

//1. Verificar si el formulario ha sido enviado

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $mysqli->prepare("SELECT id, nombre, email, password, rol FROM USUARIOS WHERE email = ?");
    if (!$stmt) {
        die("Error al preparar la consulta: " . $mysqli->error);
    }

    $stmt->bind_param('s', $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $user = $resultado->fetch_assoc();

        // Verificar contraseña
        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
           	$_SESSION['usuario'] = $user['nombre'];
			$_SESSION['rol']     = $user['rol'];



				
            header('Location: index.php');
            exit;
        }
    }

    // Si llega aquí, login incorrecto
    echo "Credenciales incorrectas 😬";
    $stmt->close();
}



?>


<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
	<div class="container">
		<div class="row min-vh-100 justify-content-center align-items-center">
			<div class="col-12 col-sm-8 col-md-6 col-lg-4">
				<div class="card shadow-sm">
					<div class="card-body p-4">
						<h5 class="card-title mb-3 text-center">Iniciar sesión</h5>
						<form method="POST" action="">
							<div class="mb-3">
								<label for="email" class="form-label small">Correo electrónico</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="correo@ejemplo.com" required>
							</div>

							<div class="mb-3">
								<label for="password" class="form-label small">Contraseña</label>
								<div class="input-group">
									<input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" required>
									<button class="btn btn-outline-secondary" type="button" id="togglePassword" aria-label="Mostrar contraseña" title="Mostrar contraseña">
										<i class="bi bi-eye" id="toggleIcon"></i>
									</button>
								</div>
							</div>

							<div class="d-grid">
								<button type="submit" class="btn btn-primary">Login</button>
							</div>
						</form>

						<!-- Mensajes de ayuda / enlaces opcionales -->
						<div class="mt-3 text-center small text-muted">
							¿No tienes cuenta? <a href="./registro.php" class="link-primary">Regístrate</a>
						</div>
					</div>
				</div>
				<div class="text-center mt-3 small text-muted">GymWeb</div>
			</div>
		</div>
	</div>

	<script>
		// Toggle mostrar/ocultar contraseña
		(function(){
			const pwd = document.getElementById('password');
			const btn = document.getElementById('togglePassword');
			const icon = document.getElementById('toggleIcon');

			if (!pwd || !btn || !icon) return;

			btn.addEventListener('click', function () {
				const type = pwd.getAttribute('type') === 'password' ? 'text' : 'password';
				pwd.setAttribute('type', type);
				// alternar icono
				if (type === 'text') {
					icon.classList.remove('bi-eye');
					icon.classList.add('bi-eye-slash');
					btn.setAttribute('aria-pressed', 'true');
				} else {
					icon.classList.remove('bi-eye-slash');
					icon.classList.add('bi-eye');
					btn.setAttribute('aria-pressed', 'false');
				}
			});
		})();
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
