<?php

session_start();
//Si no hay sesión activa o el rol no es admin, redirigir a login porque ese usuario no puede acceder a la pagina de control del admin


//if (!isset($_SESSION['usuario']) && !$_SESSION['rol'] == 'admin') {
    //header("Location: ../login.php");
    //exit();
//}

include_once ('./db/dbconfig/config.php');

function getSectionHtml(string $section): string {
	// Contenido de ejemplo para cada sección. Reemplazar con lógica real.
	switch ($section) {
		case 'comentarios':
			return '<h2>Comentarios</h2><p>Listado y moderación de comentarios.</p>';
		case 'faqs':
			return '<h2>FAQs</h2><p>Preguntas frecuentes y gestión.</p>';
		case 'noticias':
			return '<h2>Noticias</h2><p>Crear y editar noticias.</p>';
		case 'portafolio':
			return '<h2>Portafolio</h2><p>Entradas del portafolio.</p>';
		case 'testimonios':
			return '<h2>Testimonios</h2><p>Opiniones y testimonios de clientes.</p>';
		case 'usuarios':
			return '<h2>Usuarios</h2><p>Lista y gestión de usuarios.</p>';
		case 'panel':
		default:
			return '<h2>Panel</h2><p>Resumen y estadísticas generales.</p>';

	}
}

$section = isset($_GET['section']) ? $_GET['section'] : 'panel';

?>
<!doctype html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin - GymWeb</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>
		/* simple layout: contenido principal a izquierda, menú fijo a la derecha */
		body { padding-top: 56px; }
		.right-menu { position: fixed; right: 0; top: 56px; width: 260px; height: calc(100% - 56px); overflow:auto; border-left:1px solid #e9ecef; background:#fff; }
		.main-content { margin-right: 280px; padding: 20px; }
		.nav-link.active { font-weight:600; }

	</style>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container-fluid">
			<a class="navbar-brand" href="admin.php">GymWeb Admin</a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNav" aria-controls="topNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="topNav">
				<ul class="navbar-nav ms-auto">
					<li class="nav-item"><a class="nav-link" href="/">Ver web</a></li>
					<li class="nav-item"><a class="nav-link" href="?section=settings">Ajustes</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<main class="main-content">
		<div id="content">
			<?php echo getSectionHtml($section);?>
            
            <?php
            
            if($section == 'panel'){
                echo "<h3>Bienvenido al panel de administración</h3>";
                echo '<table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>TABLA</th>
                            <th>NUMERO DE REGISTROS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Fila para USUARIOS -->
                        <tr>
                            <td><a class="nav-link" href="?section=usuarios">USUARIOS</a></td>
                            <td>';
                                include_once ('./db/consultas/dbUsuarios.php');
                                $count = getUsuarios();
                                echo count($count);
                echo '    </td>
                        </tr>
                        <!-- Fila para COMENTARIOS -->
                        <tr>
                            <td><a class="nav-link" href="?section=comentarios">COMENTARIOS</a></td>
                            <td>';
                                include_once ('./db/consultas/dbComentarios.php');
                                $count = getComentarios();
                                echo count($count);
                echo '    </td>
                        </tr>
                        <!-- Fila para NOTICIAS -->
                        <tr>
                            <td><a class="nav-link" href="?section=noticias">NOTICIAS</a></td>
                            <td>';
                                include_once ('./db/consultas/dbComentarios.php');
                                $count = getComentarios();
                                echo count($count);
                echo '    </td>
                        </tr>
                        <!-- Fila para FAQS -->
                        <tr>
                            <td><a class="nav-link" href="?section=faqs">FAQS</a></td>
                            <td>';
                                include_once ('./db/consultas/dbFAQS.php');
                                $count = getFAQS();
                                echo count($count);
                echo '    </td>
                        </tr>
                        <!-- Fila para Trabajos -->
                        <tr>
                            <td><a class="nav-link" href="?section=faqs">TRABAJOS</a></td>
                            <td>';
                                include_once ('./db/consultas/dbPortfolio.php');
                                $count = getProyectos();
                                echo count($count);
                echo '    </td>
                        </tr>
                        <!-- Fila para TEstimonios -->
                        <tr>
                            <td><a class="nav-link" href="?section=testimonios">TESTIMONIOS</a></td>
                            <td>';
                                include_once ('./db/consultas/dbTestimonios.php');
                                $count = getTestimonios();
                                echo count($count);
                echo '    </td>
                        </tr>
                    </tbody>
                </table>';
            }else if($section == 'usuarios'){
                include_once ('./db/consultas/dbUsuarios.php');
                $usuarios = getUsuarios();
                
                echo '<table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Rol</th>
                        </tr>
                    </thead>
                    <tbody>';
                
                foreach($usuarios as $usuario){
                    echo '<tr>
                        <td>' . $usuario['id'] . '</td>
                        <td>' . $usuario['nombre']  . '</td>
                        <td>' . $usuario['email'] . '</td>
                        <td>' . $usuario['rol'] . '</td>
                    </tr>';
                }
                
                echo '</tbody></table>';
            }else if($section == 'comentarios'){
                include_once ('./db/consultas/dbComentarios.php');
                $comentarios = getComentarios();
                
                echo '<table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Comentario</th>
                            <th>Fecha</th>
                            <th>ID Usuario</th>
                        </tr>
                    </thead>
                    <tbody>';
                
                foreach($comentarios as $comentario){
                    echo '<tr>
                        <td>' . $comentario['id'] . '</td>
                        <td>' . $comentario['comentario'] . '</td>
                        <td>' . $comentario['fecha'] . '</td>
                        <td>' . $comentario['id_usuario'] . '</td>
                    </tr>';
                }
                
                echo '</tbody></table>';
            }else if($section == 'faqs'){
                include_once ('./db/consultas/dbFAQS.php');
                $FAQS = getFAQS();
                echo '<table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                             <th>ID</th>
                            <th>Pregunta</th>
                            <th>Respuesta</th>
                        </tr>
                    </thead>
                    <tbody>';
                
                foreach($FAQS as $FAQ){
                    echo '<tr>
                        <td>' . $FAQ['id'] . '</td>
                        <td>' . $FAQ['pregunta'] . '</td>
                        <td>' . $FAQ['respuesta'] . '</td>
                    </tr>';
                }
                
                echo '</tbody></table>';
            }else if($section == 'portafolio'){
                include_once ('./db/consultas/dbPortfolio.php');
                $proyectos = getProyectos();
                
                echo '<table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Descripción</th>
                        </tr>
                    </thead>
                    <tbody>';
                
                foreach($proyectos as $proyecto){
                    echo '<tr>
                        <td>' . $proyecto['id'] . '</td>
                        <td>' . $proyecto['titulo'] . '</td>
                        <td>' . $proyecto['descripcion'] . '</td>
                    </tr>';
                }
                
                echo '</tbody></table>';
            }else if($section == 'noticias'){
                include_once ('./db/consultas/dbNoticias.php');
                $noticias = getNoticias();
                echo '<table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Título</th>
                            <th>Subtítulo</th>
                            <th>Contenido</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <tbody>';
                foreach($noticias as $noticia){
                    echo '<tr>
                            <td>' . $noticia['id'] . '</td>
                            <td>' . $noticia['titulo'] . '</td>
                            <td>' . $noticia['subtitulo'] . '</td>
                            <td>' . $noticia['cuerpo'] . '</td>
                            <td>' . $noticia['fecha_publicacion'] . '</td>
                        </tr>';
                    
            }
            echo '</tbody></table>';
        }else if($section == 'testimonios'){
                include_once ('./db/consultas/dbTestimonios.php');
                $testimonios = getTestimonios();
                
                echo '<table class="table table-striped table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Testimonio</th>
                        </tr>
                    </thead>
                    <tbody>';
                
                foreach($testimonios as $testimonio){
                    echo '<tr>
                        <td>' . $testimonio['id'] . '</td>
                        <td>' . $testimonio['nombre'] . '</td>
                        <td>' . $testimonio['testimonio'] . '</td>
                    </tr>';
                }
                
                echo '</tbody></table>';
            }else{
                echo "<h3>Sección no encontrada</h3>";
            }
            
            ?>

            
		</div>
	</main>

	<aside class="right-menu">
		<div class="p-3">
			<h5>Secciones</h5>
			<nav class="nav flex-column">
				<a class="nav-link active" href="?section=panel">Panel</a>
                <a class="nav-link" href="?section=comentarios">Comentarios</a>
                <a class="nav-link" href="?section=faqs">FAQs</a>
                <a class="nav-link" href="?section=noticias">Noticias</a>
                <a class="nav-link" href="?section=portafolio">Portafolio</a>
                <a class="nav-link" href="?section=testimonios">Testimonios</a>
                <a class="nav-link" href="?section=usuarios">Usuarios</a>
			</nav>
			<hr>
		</div>
	</aside>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>