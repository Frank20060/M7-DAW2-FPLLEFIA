<?php


include_once __DIR__ . "/../dbconfig/config.php";

function getTestimonios() {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM TESTIMONIOS");
    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }
    $stmt->execute();
    $res = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $res;
}

function getTreeLatestTestimonios() {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM TESTIMONIOS ORDER BY fecha DESC LIMIT 3");
    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }
    $stmt->execute();
    $res = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $res;
}


function getTestimoniosById($id) {
    global $mysqli;

    $stmt = $mysqli->prepare("SELECT * FROM TESTIMONIOS WHERE id = ? LIMIT 1");
    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }

    $stmt->bind_param("i", $id);   // i = integer
    $stmt->execute();

    $res = $stmt->get_result()->fetch_assoc(); // un solo registro
    $stmt->close();

    return $res; // array asociativo o null si no existe
}




function renderTestimoniosList($testimonios) {
    $html  = '<div class="container my-4">';
    $html .= '<h2 class="mb-4 text-center">Testimonios</h2>';
    $html .= '<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">';

    foreach ($testimonios as $testimonio) {
        $html .= '<div class="col">';
        $html .= '<div class="card h-100 shadow-sm border-0">';

        if (!empty($testimonio['imagen_url'])) {
            $html .= '<div class="text-center mt-3">';
            $html .= '<img src="' . $testimonio['imagen_url'] . '" alt="' . $testimonio['nombre'] . '" class="rounded-circle" style="width:80px;height:80px;object-fit:cover;">';
            $html .= '</div>';
        }

        $html .= '<div class="card-body text-center">';
        $html .= '<p class="card-text fst-italic">"' . $testimonio['testimonio'] . '"</p>';
        $html .= '<h5 class="card-title mb-0">' . $testimonio['nombre'] . '</h5>';

        if (!empty($testimonio['cargo'])) {
            $html .= '<small class="text-muted d-block">' . $testimonio['cargo'] . '</small>';
        }

        $html .= '</div>'; // card-body

        $html .= '</div>'; // card
        $html .= '</div>'; // col
    }

    $html .= '</div>'; // row
    $html .= '</div>'; // container

    return $html;
}




function renderTestimonioDetail($testimonio) {
    $html  = '<div class="container my-5">';
    $html .= '<div class="row">';
    $html .= '<div class="col-lg-8 mx-auto">';

    $html .= '<div class="card shadow-sm border-0">';
    
    if (!empty($testimonio['imagen_url'])) {
        $html .= '<div class="text-center mt-4">';
        $html .= '<img src="' . $testimonio['imagen_url'] . '" alt="' . $testimonio['nombre'] . '" class="rounded-circle" style="width:100px;height:100px;object-fit:cover;">';
        $html .= '</div>';
    }

    $html .= '<div class="card-body text-center">';
    $html .= '<h3 class="card-title mb-1">' . $testimonio['nombre'] . '</h3>';

    if (!empty($testimonio['cargo'])) {
        $html .= '<p class="text-muted mb-3">' . $testimonio['cargo'] . '</p>';
    }

    $html .= '<p class="card-text fs-5 fst-italic">"' . $testimonio['testimonio'] . '"</p>';

    $html .= '<a href="testimonios.php" class="btn btn-outline-secondary btn-sm mt-3">Volver a testimonios</a>';

    $html .= '</div>'; // card-body
    $html .= '</div>'; // card

    $html .= '</div>'; // col
    $html .= '</div>'; // row
    $html .= '</div>'; // container

    return $html;
}
