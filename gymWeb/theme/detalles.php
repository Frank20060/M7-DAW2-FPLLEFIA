<?php
session_start();
include_once './db/dbconfig/config.php';
include_once './db/consultas/dbUsuarios.php';
include_once './db/consultas/dbComentarios.php';
include_once './db/consultas/dbFAQS.php';
include_once './db/consultas/dbPortfolio.php';
include_once './db/consultas/dbNoticias.php';
include_once './db/consultas/dbTestimonios.php';
// if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'admin') {
//     header("Location: ../login.php");
//     exit();
// }

$seccion = isset($_GET['seccion']) ? $_GET['seccion'] : '';
$id      = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($seccion === '' || $id <= 0) {
    die('Parámetros inválidos');
}

// Cargar datos según sección usando tus funciones de consultas
$registro = null;

switch ($seccion) {
    case 'usuarios':
        include_once './db/consultas/dbUsuarios.php';
        // Crea una función getUsuarioById($id) si no la tienes
        $registro = getUsuarioById($id);
        break;

    case 'comentarios':
        include_once './db/consultas/dbComentarios.php';
        // Crea getComentarioById($id)
        $registro = getComentarioById($id);
        break;

    case 'faqs':
        include_once './db/consultas/dbFAQS.php';
        // Crea getFAQById($id)
        $registro = getFAQById($id);
        break;

    case 'portafolio':
        include_once './db/consultas/dbPortfolio.php';
        // Crea getProyectoById($id)
        $registro = getProyectoById($id);
        break;

    case 'noticias':
        include_once './db/consultas/dbNoticias.php';
        // Crea getNoticiaById($id)
        $registro = getNoticiaById($id);
        break;

    case 'testimonios':
        include_once './db/consultas/dbTestimonios.php';
        // Crea getTestimonioById($id)
        $registro = getTestimoniosById($id);
        break;

    default:
        die('Sección no válida');
}

if (!$registro) {
    die('Registro no encontrado');
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Detalles - <?= htmlspecialchars(ucfirst($seccion)) ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-4">
    <a href="admin.php?section=<?= htmlspecialchars($seccion) ?>" class="btn btn-secondary mb-3">&laquo; Volver</a>

    <div class="card shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Detalles <?= htmlspecialchars(ucfirst($seccion)) ?> (ID: <?= $id ?>)</h4>
        </div>
        <div class="card-body">
            <?php if ($seccion === 'usuarios'): ?>
                <form method="POST" action="procesar_editar.php?seccion=usuarios&id=<?= $id ?>">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control"
                               value="<?= htmlspecialchars($registro['nombre']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control"
                               value="<?= htmlspecialchars($registro['email']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Rol</label>
                        <select name="rol" class="form-select" required>
                            <option value="usuario" <?= $registro['rol']=='usuario'?'selected':'' ?>>Usuario</option>
                            <option value="administrador" <?= $registro['rol']=='administrador'?'selected':'' ?>>Administrador</option>
                        </select>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-dark">Guardar cambios</button>
                        <a href="procesar_eliminar.php?seccion=usuarios&id=<?= $id ?>"
                           class="btn btn-danger"
                           onclick="return confirm('¿Seguro que quieres eliminar este usuario?');">
                            Eliminar
                        </a>
                    </div>
                </form>

            <?php elseif ($seccion === 'comentarios'): ?>
                <form method="POST" action="procesar_editar.php?seccion=comentarios&id=<?= $id ?>">
                    <div class="mb-3">
                        <label class="form-label">ID Noticia</label>
                        <input type="number" name="id_noticia" class="form-control"
                               value="<?= htmlspecialchars($registro['id_noticia']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ID Usuario</label>
                        <input type="number" name="id_usuario" class="form-control"
                               value="<?= htmlspecialchars($registro['id_usuario']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Comentario</label>
                        <textarea name="comentario" class="form-control" rows="4" required><?= htmlspecialchars($registro['comentario']) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="date" name="fecha" class="form-control"
                               value="<?= htmlspecialchars($registro['fecha']) ?>" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-dark">Guardar cambios</button>
                        <a href="procesar_eliminar.php?seccion=comentarios&id=<?= $id ?>"
                           class="btn btn-danger"
                           onclick="return confirm('¿Seguro que quieres eliminar este comentario?');">
                           Eliminar
                        </a>
                    </div>
                </form>

            <?php elseif ($seccion === 'faqs'): ?>
                <form method="POST" action="procesar_editar.php?seccion=faqs&id=<?= $id ?>">
                    <div class="mb-3">
                        <label class="form-label">Pregunta</label>
                        <input type="text" name="pregunta" class="form-control"
                               value="<?= htmlspecialchars($registro['pregunta']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Respuesta</label>
                        <textarea name="respuesta" class="form-control" rows="4" required><?= htmlspecialchars($registro['respuesta']) ?></textarea>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-dark">Guardar cambios</button>
                        <a href="procesar_eliminar.php?seccion=faqs&id=<?= $id ?>"
                           class="btn btn-danger"
                           onclick="return confirm('¿Seguro que quieres eliminar esta FAQ?');">
                           Eliminar
                        </a>
                    </div>
                </form>

            <?php elseif ($seccion === 'portafolio'): ?>
                <form method="POST" action="procesar_editar.php?seccion=portafolio&id=<?= $id ?>">
                    <div class="mb-3">
                        <label class="form-label">Título</label>
                        <input type="text" name="titulo" class="form-control"
                               value="<?= htmlspecialchars($registro['titulo']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea name="descripcion" class="form-control" rows="4" required><?= htmlspecialchars($registro['descripcion']) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Imagen</label>
                        <input type="text" name="imagen" class="form-control"
                               value="<?= htmlspecialchars($registro['imagen']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoría</label>
                        <input type="text" name="categoria" class="form-control"
                               value="<?= htmlspecialchars($registro['categoria']) ?>" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-dark">Guardar cambios</button>
                        <a href="procesar_eliminar.php?seccion=portafolio&id=<?= $id ?>"
                           class="btn btn-danger"
                           onclick="return confirm('¿Seguro que quieres eliminar este proyecto?');">
                           Eliminar
                        </a>
                    </div>
                </form>

            <?php elseif ($seccion === 'noticias'): ?>
                <form method="POST" action="procesar_editar.php?seccion=noticias&id=<?= $id ?>">
                    <div class="mb-3">
                        <label class="form-label">Título</label>
                        <input type="text" name="titulo" class="form-control"
                               value="<?= htmlspecialchars($registro['titulo']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subtítulo</label>
                        <input type="text" name="subtitulo" class="form-control"
                               value="<?= htmlspecialchars($registro['subtitulo']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contenido</label>
                        <textarea name="cuerpo" class="form-control" rows="5" required><?= htmlspecialchars($registro['cuerpo']) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de publicación</label>
                        <input type="date" name="fecha_publicacion" class="form-control"
                               value="<?= htmlspecialchars($registro['fecha_publicacion']) ?>" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-dark">Guardar cambios</button>
                        <a href="procesar_eliminar.php?seccion=noticias&id=<?= $id ?>"
                           class="btn btn-danger"
                           onclick="return confirm('¿Seguro que quieres eliminar esta noticia?');">
                           Eliminar
                        </a>
                    </div>
                </form>

            <?php elseif ($seccion === 'testimonios'): ?>
                <form method="POST" action="procesar_editar.php?seccion=testimonios&id=<?= $id ?>">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control"
                               value="<?= htmlspecialchars($registro['nombre']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido</label>
                        <input type="text" name="apellido" class="form-control"
                               value="<?= htmlspecialchars($registro['apellido']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Testimonio</label>
                        <textarea name="testimonio" class="form-control" rows="4" required><?= htmlspecialchars($registro['testimonio']) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Imagen</label>
                        <input type="text" name="imagen" class="form-control"
                               value="<?= htmlspecialchars($registro['imagen']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="date" name="fecha" class="form-control"
                               value="<?= htmlspecialchars($registro['fecha']) ?>" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-dark">Guardar cambios</button>
                        <a href="procesar_eliminar.php?seccion=testimonios&id=<?= $id ?>"
                           class="btn btn-danger"
                           onclick="return confirm('¿Seguro que quieres eliminar este testimonio?');">
                           Eliminar
                        </a>
                    </div>
                </form>

            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
