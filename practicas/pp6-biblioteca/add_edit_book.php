<?php
include "functions.php";
session_start();

if (!isset($_SESSION['credenciales'])) {
    // Si no hay sesión activa, redirige a login.php
    header("Location: login.php");
    exit(); 
} elseif ($_SESSION['credenciales']['username'] !== 'admin') {
    // Si el usuario NO es admin, lo redirigimos al home
    header("Location: home.php");
    exit(); 
}


// Detectamos el modo y el ID
$modo = $_GET['modo'] ?? 'añadir';
$id = $_GET['id'] ?? null;

// Variables para rellenar el formulario en caso de edición
$titulo = $autor = $descripcion = $imagen = '';

if($modo === 'editar' && isset($id) && isset($_SESSION['libros'][$id])){
    $libro = $_SESSION['libros'][$id];
    $titulo = $libro['titulo'];
    $autor = $libro['autor'];
    $descripcion = $libro['descripcion'];
    $imagen = $libro['imagen'];
}

// Procesamos el formulario comprobando si $_POST tiene los datos
if(isset($_POST['titulo'], $_POST['autor'], $_POST['descripcion'], $_POST['imagen'])){
    $tituloForm = trim($_POST['titulo']);
    $autorForm = trim($_POST['autor']);
    $descripcionForm = trim($_POST['descripcion']);
    $imagenForm = trim($_POST['imagen']);

    if($modo === 'editar' && isset($id)){
        editarLibro($id, $tituloForm, $autorForm, $descripcionForm, $imagenForm);
    } else {
        agregarLibro($tituloForm, $autorForm, $descripcionForm, $imagenForm);
    }

    header("Location: home.php");
    exit();
}
include "header.php";
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca Virtual - <?= ucfirst($modo) ?> Libro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="text-center mb-5">
        <h2 class="fw-bold"><?= $modo === 'editar' ? 'Editar Libro' : 'Añadir Libro' ?></h2>
        <p class="lead"><?= $modo === 'editar' ? 'Modifica la información del libro' : 'Agrega un nuevo libro a la biblioteca' ?></p>
    </div>

    <form method="POST" class="mx-auto" style="max-width: 600px;">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="titulo" name="titulo" value="<?= $titulo ?>" placeholder="Título" required>
            <label for="titulo">Título</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="autor" name="autor" value="<?= $autor?>" placeholder="Autor" required>
            <label for="autor">Autor</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="imagen" name="imagen" value="<?= $imagen ?>" placeholder="URL de la Imagen">
            <label for="imagen">URL de la Imagen</label>
        </div>
        <div class="form-floating mb-4">
            <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" style="height: 150px;"><?= $descripcion ?></textarea>
            <label for="descripcion">Descripción</label>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary btn-lg">
                <?= $modo === 'editar' ? 'Editar' : 'Añadir' ?>
            </button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

