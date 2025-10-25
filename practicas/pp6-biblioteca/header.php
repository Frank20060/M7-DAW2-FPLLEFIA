<?php session_start()?>

<header class="bg-light py-2 px-4 shadow-sm">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Izquierda: foto + usuario + rol -->
        <div class="d-flex align-items-center">
            <img src="<?= $_SESSION['credenciales']['img'] ?>" alt="Foto de perfil" class="rounded-circle me-3" style="width:50px; height:50px; object-fit:cover;">
            <div class="d-flex flex-column">
                <span class="fw-bold">👋 Bienvenido, <?= $_SESSION['credenciales']['username'] ?>!</span>
                <?php if($_SESSION['credenciales']['rol'] === 'admin'): ?>
                    <small class="text-success"><i class="fas fa-user-shield"></i>✏️ Admin </small>
                <?php else: ?>
                    <small class="text-muted">📚 Lector </small>
                <?php endif; ?>
            </div>
        </div>

        <!-- Derecha: botón logout -->
        
        <?php if(!isset($_GET['modo'])): ?>
            <a href="logout.php" class="btn btn-warning btn-sm">Cerrar sesión ❌</a>
        <?php else: ?>
            <a href="home.php" class="btn btn-warning btn-sm">Ir a la Biblioteca</a>
        <?php endif; ?>
    </div>
</header>