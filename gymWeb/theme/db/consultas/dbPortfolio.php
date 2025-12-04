<?php


include_once __DIR__ . "/../dbconfig/config.php";

function getProyectos() {
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT * FROM PORTAFOLIO");
    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }
    $stmt->execute();
    $res = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $res;
}


function getProyectoById($id) {
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT * FROM PORTAFOLIO WHERE id = ? LIMIT 1");
    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }

    $stmt->bind_param("i", $id);   // i = integer
    $stmt->execute();

    $res = $stmt->get_result()->fetch_assoc(); // un solo registro
    $stmt->close();

    return $res; // array asociativo o null si no existe
}


function renderProyectosList($proyectos) {
    $html  = '<div class="container my-4">';
    $html .= '<h2 class="mb-4">Proyectos</h2>';
    $html .= '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">';

    foreach ($proyectos as $proyecto) {
        $html .= '<div class="col">';
        $html .= '<div class="card h-100 shadow-sm">';

        // Si tienes imagen en la BD
        if (!empty($proyecto['imagen_url'])) {
            $html .= '<img src="' . $proyecto['imagen_url'] . '" class="card-img-top" alt="' . $proyecto['titulo'] . '">';
        }

        $html .= '<div class="card-body">';
        $html .= '<h5 class="card-title">' . $proyecto['titulo'] . '</h5>';
        $html .= '<p class="card-text">' . $proyecto['descripcion'] . '</p>';
        $html .= '</div>';

        $html .= '<div class="card-footer d-flex justify-content-end">';
        $html .= '<a href="proyecto.php?id=' . (int)$proyecto['id'] . '" class="btn btn-sm btn-primary">';
        $html .= 'Ver proyecto';
        $html .= '</a>';
        $html .= '</div>';

        $html .= '</div>'; // .card
        $html .= '</div>'; // .col
    }

    $html .= '</div>'; // .row
    $html .= '</div>'; // .container

    return $html;
}


function renderProyectoDetail($proyecto) {
    $html  = '<div class="container my-4">';
    $html .= '<div class="row">';
    $html .= '<div class="col-lg-10 mx-auto">';

    $html .= '<div class="card shadow-sm">';

    if (!empty($proyecto['imagen_url'])) {
        $html .= '<img src="' . $proyecto['imagen_url'] . '" class="card-img-top" alt="' . $proyecto['titulo'] . '">';
    }

    $html .= '<div class="card-body">';
    $html .= '<h1 class="card-title h3">' . $proyecto['titulo'] . '</h1>';
    $html .= '<p class="card-text">' . $proyecto['descripcion'] . '</p>';

    // Si tienes más campos, por ejemplo: tecnologia, enlace_demo, enlace_github
    if (!empty($proyecto['tecnologia'])) {
        $html .= '<p class="mb-1"><strong>Tecnologías:</strong> ' . $proyecto['tecnologia'] . '</p>';
    }

    $html .= '<div class="mt-3 d-flex gap-2 flex-wrap">';

    if (!empty($proyecto['enlace_demo'])) {
        $html .= '<a href="' . $proyecto['enlace_demo'] . '" target="_blank" class="btn btn-sm btn-success">Ver demo</a>';
    }

    if (!empty($proyecto['enlace_github'])) {
        $html .= '<a href="' . $proyecto['enlace_github'] . '" target="_blank" class="btn btn-sm btn-dark">Código en GitHub</a>';
    }

    $html .= '<a href="works.php" class="btn btn-outline-secondary btn-sm mt-3">Volver a Trabajos</a>';

    $html .= '</div>'; // botones
    $html .= '</div>'; // card-body

    $html .= '</div>'; // card
    $html .= '</div>'; // col
    $html .= '</div>'; // row
    $html .= '</div>'; // container

    return $html;
}

