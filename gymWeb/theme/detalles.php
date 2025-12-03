<?php

session_start();
include_once './db/dbconfig/config.php';

if (!isset($_SESSION['usuario']) || $_SESSION['rol'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

$seccion = isset($_GET['seccion']) ? $_GET['seccion'] : '';
$id      = isset($_GET['id']) ? (int) $_GET['id'] : 0;

if ($seccion === '' || $id <= 0) {
    die('Parámetros inválidos');
}

/* ========= 1. PROCESAR POST (EDITAR / ELIMINAR) ========= */

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $accion = isset($_POST['accion']) ? $_POST['accion'] : 'editar';

    switch ($seccion) {
        case 'usuarios':
            include_once './CRUD/CRUDusuarios.php';
            if ($accion === 'eliminar') {
                eliminarUsuario($id);
            } else {
                $nombre  = $_POST['nombre'];
                $email   = $_POST['email'];
                $rol     = $_POST['rol'];
                $passNew = $_POST['password'] ?? null; // opcional
                $passNew = trim($passNew) === '' ? null : $passNew;
                editarUsuario($id, $nombre, $email, $rol, $passNew);
            }
            break;

        case 'comentarios':
            include_once './CRUD/CRUDcomentarios.php';
            if ($accion === 'eliminar') {
                eliminarComentario($id);
            } else {
                $id_noticia = $_POST['id_noticia'];
                $id_usuario = $_POST['id_usuario'];
                $comentario = $_POST['comentario'];
                $fecha      = $_POST['fecha'];
                editarComentario($id, $id_noticia, $id_usuario, $comentario, $fecha);
                // crea esta función admin si quieres cambiar todos los campos
            }
            break;

        case 'faqs':
            include_once './CRUD/CRUDfaqs.php';
            if ($accion === 'eliminar') {
                eliminarFAQ($id);
            } else {
                $pregunta  = $_POST['pregunta'];
                $respuesta = $_POST['respuesta'];
                editarFAQ($id, $pregunta, $respuesta);
            }
            break;

        case 'portafolio':
            include_once './CRUD/CRUDtrabajos.php';
            if ($accion === 'eliminar') {
                eliminarProyecto($id);
            } else {
                $titulo      = $_POST['titulo'];
                $descripcion = $_POST['descripcion'];
                $imagen      = $_POST['imagen'];
                $categoria   = $_POST['categoria'];
                editarProyecto($id, $titulo, $descripcion, $imagen, $categoria);
            }
            break;

        case 'noticias':
            include_once './CRUD/CRUDnoticia.php';
            if ($accion === 'eliminar') {
                eliminarNoticia($id);
            } else {
                $titulo            = $_POST['titulo'];
                $subtitulo         = $_POST['subtitulo'];
                $cuerpo            = $_POST['cuerpo'];
                $fecha_publicacion = $_POST['fecha_publicacion'];
                $imagen            = $_POST['imagen']; // nueva ruta de imagen
                editarNoticia($id, $titulo, $subtitulo, $cuerpo, $fecha_publicacion, $imagen);
            }
            break;


        case 'testimonios':
            include_once './CRUD/CRUDtestimonios.php';
            if ($accion === 'eliminar') {
                eliminarTestimonio($id);
            } else {
                $nombre     = $_POST['nombre'];
                $apellido   = $_POST['apellido'];
                $testimonio = $_POST['testimonio'];
                $imagen     = $_POST['imagen'];
                $fecha      = $_POST['fecha'];
                editarTestimonio($id, $nombre, $apellido, $testimonio, $imagen, $fecha);
            }
            break;

        default:
            die('Sección no válida');
    }

    // Después de editar o eliminar, volver al listado de esa sección
    header('Location: admin.php?section=' . urlencode($seccion));
    exit();
}

/* ========= 2. CARGAR REGISTRO PARA MOSTRAR FORM ========= */

$registro = null;

switch ($seccion) {
    case 'usuarios':
        include_once './db/consultas/dbUsuarios.php';
        $registro = getUsuarioById($id);
        break;
    case 'comentarios':
        include_once './db/consultas/dbComentarios.php';
        $registro = getComentarioById($id);
        break;
    case 'faqs':
        include_once './db/consultas/dbFAQS.php';
        $registro = getFAQById($id);
        break;
    case 'portafolio':
        include_once './db/consultas/dbPortfolio.php';
        $registro = getProyectoById($id);
        break;
    case 'noticias':
        include_once './db/consultas/dbNoticias.php';
        $registro = getNoticiaById($id);
        break;
    case 'testimonios':
        include_once './db/consultas/dbTestimonios.php';
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
                <!-- ========== USUARIOS ========== -->
                <form method="POST" action="">
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
                    <div class="mb-3">
                        <label class="form-label">Nueva contraseña (opcional)</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" name="accion" value="editar" class="btn btn-dark">Guardar cambios</button>
                        <button type="submit" name="accion" value="eliminar"
                                class="btn btn-danger"
                                onclick="return confirm('¿Seguro que quieres eliminar este usuario?');">
                            Eliminar
                        </button>
                    </div>
                </form>

            <?php elseif ($seccion === 'comentarios'): ?>
                <!-- ========== COMENTARIOS ========== -->
                <form method="POST" action="">
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
                        <input type="datetime-local" name="fecha" class="form-control"
                            value="<?= htmlspecialchars($registro['fecha']) ?>" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" name="accion" value="editar" class="btn btn-dark">Guardar cambios</button>
                        <button type="submit" name="accion" value="eliminar"
                                class="btn btn-danger"
                                onclick="return confirm('¿Seguro que quieres eliminar este comentario?');">
                            Eliminar
                        </button>
                    </div>
                </form>

            <?php elseif ($seccion === 'faqs'): ?>
                <!-- ========== FAQS ========== -->
                <form method="POST" action="">
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
                        <button type="submit" name="accion" value="editar" class="btn btn-dark">Guardar cambios</button>
                        <button type="submit" name="accion" value="eliminar"
                                class="btn btn-danger"
                                onclick="return confirm('¿Seguro que quieres eliminar esta FAQ?');">
                            Eliminar
                        </button>
                    </div>
                </form>

            <?php elseif ($seccion === 'portafolio'): ?>
                <!-- ========== PORTAFOLIO / PROYECTOS ========== -->
                <form method="POST" action="">
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
                        <label class="form-label">URL / Ruta de imagen</label>
                        <input type="text" name="imagen" class="form-control"
                            value="<?= htmlspecialchars($registro['imagen']) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Categoría</label>
                        <input type="text" name="categoria" class="form-control"
                            value="<?= htmlspecialchars($registro['categoria']) ?>" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" name="accion" value="editar" class="btn btn-dark">Guardar cambios</button>
                        <button type="submit" name="accion" value="eliminar"
                                class="btn btn-danger"
                                onclick="return confirm('¿Seguro que quieres eliminar este proyecto?');">
                            Eliminar
                        </button>
                    </div>
                </form>

            <?php elseif ($seccion === 'noticias'): ?>
                <!-- ========== NOTICIAS ========== -->
                <form method="POST" action="">
                    <div class="mb-3">
                        <label class="form-label">Título</label>
                        <input type="text" name="titulo" class="form-control"
                            value="<?= htmlspecialchars($registro['titulo']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Subtítulo</label>
                        <input type="text" name="subtitulo" class="form-control"
                            value="<?= htmlspecialchars($registro['subtitulo']) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cuerpo</label>
                        <textarea name="cuerpo" class="form-control" rows="6" required><?= htmlspecialchars($registro['cuerpo']) ?></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha publicación</label>
                        <input type="date" name="fecha_publicacion" class="form-control"
                            value="<?= htmlspecialchars($registro['fecha_publicacion']) ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">URL / Ruta de imagen</label>
                        <input type="text" name="imagen" class="form-control"
                            value="<?= htmlspecialchars($registro['imagen'] ?? '') ?>">
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" name="accion" value="editar" class="btn btn-dark">Guardar cambios</button>
                        <button type="submit" name="accion" value="eliminar"
                                class="btn btn-danger"
                                onclick="return confirm('¿Seguro que quieres eliminar esta noticia?');">
                            Eliminar
                        </button>
                    </div>
                </form>

            <?php elseif ($seccion === 'testimonios'): ?>
                <!-- ========== TESTIMONIOS ========== -->
                <form method="POST" action="">
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
                        <label class="form-label">URL / Ruta de imagen</label>
                        <input type="text" name="imagen" class="form-control"
                            value="<?= htmlspecialchars($registro['imagen']) ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha</label>
                        <input type="date" name="fecha" class="form-control"
                            value="<?= htmlspecialchars($registro['fecha']) ?>" required>
                    </div>

                    <div class="d-flex justify-content-between">
                        <button type="submit" name="accion" value="editar" class="btn btn-dark">Guardar cambios</button>
                        <button type="submit" name="accion" value="eliminar"
                                class="btn btn-danger"
                                onclick="return confirm('¿Seguro que quieres eliminar este testimonio?');">
                            Eliminar
                        </button>
                    </div>
                </form>

            <?php endif; ?>


        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
