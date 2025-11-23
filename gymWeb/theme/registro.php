<?php

session_start();
include_once './db/dbconfig/config.php';

//Recojemos los datos por post y los insertamos en la base de datos para registrar un nuevo usuario
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    //1. Recogemos los datos
    
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rol = 'usuario';

    //2. Hasheamos la password

    $password_hasheada = password_hash($password, PASSWORD_DEFAULT);


    //3.Preparamos la consulta para insertar el nuevo usuario

    $stmt = $mysqli->prepare("INSERT INTO USUARIOS (nombre, email, password, rol, fecha_registro) VALUES (?, ?, ?, 'usuario', NOW())");

    //4. Comprobar la preparación

    if(!$stmt){
        die('Error en la preparacion: ' . $mysqli->error);
    }

    //5. Bindeamos los parametros 
    $stmt -> bind_param('sss', $nombre, $email, $password_hasheada);

    //6. Ejecutamos la consulta

    if($stmt->execute()){
        echo 'Usuario registrado correctamente .<a href="login.php">Iniciar sesión</a>';
    }else{
        echo 'Error al registrar el usuario' . $stmt->error;
    }

    //7.cerramos la conexion

    $stmt->close();
    $mysqli->close();


}


?>



<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Registro</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
	<div class="container">
		<div class="row min-vh-100 justify-content-center align-items-center">
			<div class="col-12 col-sm-8 col-md-6 col-lg-4">
				<div class="card shadow-sm">
					<div class="card-body p-4">
						<h5 class="card-title mb-3 text-center">Registro</h5>
						<form method="POST" action="">
							<div class="mb-3">
								<label for="nombre" class="form-label small">Nombre</label>
								<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre" required>
							</div>
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
							<div class="mb-3">
								<label for="confirm_password" class="form-label small">Confirmar contraseña</label>
								<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Repite la contraseña" required>
							</div>
							<div class="d-grid">
								<button type="submit" class="btn btn-primary">Registrarse</button>
							</div>
						</form>
						<div class="mt-3 text-center small text-muted">
							¿Ya tienes cuenta? <a href="./login.php" class="link-primary">Inicia sesión</a>
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
