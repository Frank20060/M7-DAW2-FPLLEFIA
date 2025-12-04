<?php


include_once __DIR__ . "/../dbconfig/config.php";

function getNoticias() {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM NOTICIAS ORDER BY fecha_publicacion DESC");
    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }
    $stmt->execute();
    $res = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $res;
}

function getNoticiaById($id) {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM NOTICIAS WHERE id = ?");
    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result()->fetch_assoc();
    $stmt->close();
    return $res;
}

function getTreeLatestNews() {
    global $mysqli;
    $stmt = $mysqli->prepare("SELECT * FROM NOTICIAS ORDER BY fecha_publicacion DESC LIMIT 3");
    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }
    $stmt->execute();
    $res = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    $stmt->close();
    return $res;
}




/// Mostrar las noticias normal (A lo react pero con php). Me parece mas limpio y me da pereza hacerle su propio archivo, creo que asi es mejor y mas limpio

function renderNoticiasList($noticias) {
    $html = '<div class="container my-4">';
    $html .= '<div class="row g-3">';

    foreach ($noticias as $noticia) {
        $html .= '<div class="col-md-4">';
        $html .= '<div class="card h-100 shadow-sm">';

        $html .= '<div class="card-body">';
        $html .= '<h5 class="card-title">' . $noticia['titulo'] . '</h5>';
        $html .= '<p class="card-text">' . $noticia['subtitulo'] . '</p>';
        $html .= '<img src="' . $noticia['imagen'] . '" alt="noticia-image" class="img-fluid mb-3">';
        
        $html .= '</div>';

        $html .= '<div class="card-footer d-flex justify-content-between align-items-center">';
        $html .= '<small class="text-muted">' . $noticia['fecha_publicacion'] . '</small>';
        $html .= '<a href="blog-single.php?id=' . (int)$noticia['id'] . '" class="btn btn-sm btn-primary">Ver más</a>';
        $html .= '</div>';

        $html .= '</div>'; // .card
        $html .= '</div>'; // .col
    }

    $html .= '</div>'; // .row
    $html .= '</div>'; // .container

    return $html;
}


///Para usarlo tienes que hacer lo siguiente:
/// $noticias = getNoticias();
/// echo renderNoticiasList($noticias);

///Mostrar una unica noticia, con sus comentarios debajo, para que se vea tanto la noticia como los comentarios
function renderNoticiaWithComments($noticia, $comments) {
    $html  = '<div class="container my-4">';
    $html .= '<div class="row">';
    $html .= '<div class="col-lg-8 mx-auto">';

    $html .= '<div class="card mb-4 shadow-sm">';
    $html .= '<div class="card-body">';
    $html .= '<h2 class="card-title">' . $noticia['titulo'] . '</h2>';
    $html .= '<h4 class="card-subtitle mb-3 text-muted">' . $noticia['subtitulo'] . '</h4>';
    $html .= '<img src="' . $noticia['imagen'] . '" alt="noticia-image" class="img-fluid mb-4">';
    $html .= '<p class="card-text">' . $noticia['cuerpo'] . '</p>';
    $html .= '</div>';
    $html .= '<div class="card-footer text-muted">';
    $html .= 'Publicado el ' . $noticia['fecha_publicacion'];
    $html .= '</div>';
    $html .= '</div>'; // .card

    $html .= '<div class="card shadow-sm">';
    $html .= '<div class="card-body">';
    $html .= '<h3 class="h5 mb-3">Comentarios</h3>';

    if (empty($comments)) {
        $html .= '<p class="text-muted mb-0">No hay comentarios aún.</p>';
    } else {
        $html .= '<p class="small text-muted">Total de comentarios: ' . count($comments) . '</p>';
        $html .= '<ul class="list-group list-group-flush">';
        foreach ($comments as $comment) {
            $html .= '<li class="list-group-item">';
            $html .= '<p class="mb-1">' . htmlspecialchars($comment['comentario']) . '</p>';
            $html .= '<small class="text-muted">' . htmlspecialchars($comment['fecha']) . '</small>';
            $html .= '</li>';
        }
        $html .= '</ul>';
    }

    $html .= '</div>'; // .card-body
    $html .= '</div>'; // .card

    $html .= '</div>'; // .col
    $html .= '</div>'; // .row
    $html .= '</div>'; // .container

    return $html;
}

///Para usarlo tienes que hacer lo siguiente:
/// $noticia = getNoticiaById($id);
/// $comments = getComentariosNoticia($id) ; 
/// echo renderNoticiaWithComments($noticia, $comments);




