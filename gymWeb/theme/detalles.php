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
                editarNoticia($id, $titulo, $subtitulo, $cuerpo, $fecha_publicacion);
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
                <form method="POST" action="">
                    <!-- tus campos de comentario igual que ya los tienes -->
                    <!-- ... -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" name="accion" value="editar" class="btn btn-dark">Guardar cambios</button>
                        <button type="submit" name="accion" value="eliminar"
                                class="btn btn-danger"
                                onclick="return confirm('¿Seguro que quieres eliminar este comentario?');">
                            Eliminar
                        </button>
                    </div>
                </form>

            <!-- deja el resto de secciones igual que ya las tienes,
                 solo cambiando el action a "" y los botones por:
                 name="accion" value="editar"/"eliminar" -->

            <?php endif; ?>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
