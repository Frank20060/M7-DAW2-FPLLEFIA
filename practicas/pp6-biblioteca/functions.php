<?php
session_start();


function agregarLibro($titulo, $autor, $descripcion, $imagen){
    $nuevo_id = count($_SESSION['libros']);
    array_push($_SESSION['libros'], [
        "id" => $nuevo_id,
        "titulo" => $titulo,
        "autor" => $autor,
        "descripcion" => $descripcion,
        "imagen" => $imagen
    ]);
}


function editarLibro($id, $titulo, $autor, $descripcion, $imagen){
    
    if(isset($_SESSION['libros'][$id])){
        $_SESSION['libros'][$id] = [
            "titulo" => $titulo,
            "autor" => $autor,
            "descripcion" => $descripcion,
            "imagen" => $imagen
        ];
    }
}


function eliminarLibro($id) {
    // Comprobamos que exista la sesión de libros y que el id exista
    if (isset($_SESSION['libros'][$id])) {

        // Eliminamos el libro con ese ID
        unset($_SESSION['libros'][$id]);

        // Reindexamos el array para mantener los índices consecutivos
        $_SESSION['libros'] = array_values($_SESSION['libros']);

        // Volvemos a asignar IDs consecutivos empezando desde 0
        for ($i = 0; $i < count($_SESSION['libros']); $i++) {
            $_SESSION['libros'][$i]['id'] = $i;
        }
    }
}

?>