<?php
session_start();
include_once './db/dbconfig/config.php';

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'admin') {
    //header("Location: ../login.php");
    //exit();
}

$seccion = isset($_GET['seccion']) ? $_GET['seccion'] : '';

// Procesar alta
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $seccion !== '') {
    switch ($seccion) {
        case 'usuarios':
            include_once './CRUD/CRUDusuarios.php';
            anadirUsuario();
            break;

        case 'noticias':
            include_once './CRUD/CRUDnoticia.php';
            anadirNoticia();
            break;

        case 'comentarios':
            include_once './CRUD/CRUDcomentarios.php';
            anadirComentario();
            break;

        case 'faqs':
            include_once './CRUD/CRUDfaqs.php';
            anadirFAQ();
            break;

        case 'portafolio':
            include_once './CRUD/CRUDtrabajos.php';
            anadirProyecto();
            break;

        case 'testimonios':
            include_once './CRUD/CRUDtestimonios.php';
            anadirTestimonio();
            break;
    }

    header('Location: admin.php?section=' . urlencode($seccion));
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir registro</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <h1 class="mb-4 text-center">
        Añadir registro - Sección: <?php echo htmlspecialchars(strtoupper($seccion)); ?>
    </h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <?php if ($seccion == 'usuarios'): ?>
                <form method="POST" action="" class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Contraseña</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Rol</label>
                        <select name="rol" class="form-select" required>
                            <option value="usuario">Usuario</option>
                            <option value="administrador">Administrador</option>
                        </select>
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Guardar usuario</button>
                    </div>
                </form>

            <?php elseif ($seccion == 'noticias'): ?>
                <form method="POST" action="" class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Título</label>
                        <input type="text" name="titulo" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Subtítulo</label>
                        <input type="text" name="subtitulo" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Cuerpo</label>
                        <textarea name="cuerpo" class="form-control" rows="5" required></textarea>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Fecha publicación</label>
                        <input type="date" name="fecha_publicacion" class="form-control" required>
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Guardar noticia</button>
                    </div>
                </form>

            <?php elseif ($seccion == 'comentarios'): ?>
                <form method="POST" action="" class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">ID noticia</label>
                        <input type="number" name="id_noticia" class="form-control" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">ID usuario</label>
                        <input type="number" name="id_usuario" class="form-control" required>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">ID respuesta (opcional)</label>
                        <input type="number" name="id_respuesta" class="form-control">
                    </div>

                    <div class="col-12">
                        <label class="form-label">Comentario</label>
                        <textarea name="comentario" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Fecha</label>
                        <input type="date" name="fecha" class="form-control" required>
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Guardar comentario</button>
                    </div>
                </form>

            <?php elseif ($seccion == 'faqs'): ?>
                <form method="POST" action="" class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Pregunta</label>
                        <input type="text" name="pregunta" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Respuesta</label>
                        <textarea name="respuesta" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Guardar FAQ</button>
                    </div>
                </form>

            <?php elseif ($seccion == 'portafolio'): ?>
                <form method="POST" action="" class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Título</label>
                        <input type="text" name="titulo" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Categoría</label>
                        <input type="text" name="categoria" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Descripción</label>
                        <textarea name="descripcion" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Imagen (nombre de archivo o subida)</label>
                        <input type="text" name="imagen" class="form-control" placeholder="diseno_web.jpg" required>
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Guardar proyecto</button>
                    </div>
                </form>

            <?php elseif ($seccion == 'testimonios'): ?>
                <form method="POST" action="" class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Apellido</label>
                        <input type="text" name="apellido" class="form-control" required>
                    </div>

                    <div class="col-12">
                        <label class="form-label">Testimonio</label>
                        <textarea name="testimonio" class="form-control" rows="4" required></textarea>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Imagen (nombre de archivo)</label>
                        <input type="text" name="imagen" class="form-control" placeholder="laura.jpg" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Fecha</label>
                        <input type="date" name="fecha" class="form-control" required>
                    </div>

                    <div class="col-12 text-end">
                        <button type="submit" class="btn btn-primary">Guardar testimonio</button>
                    </div>
                </form>

            <?php else: ?>
                <div class="alert alert-warning mb-0">
                    Sección no válida. Asegúrate de pasar un valor correcto en <code>?seccion=...</code>.
                </div>
            <?php endif; ?>
        </div>
    </div>

    <div class="mt-3">
        <a href="admin.php" class="btn btn-secondary">Volver al panel</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
