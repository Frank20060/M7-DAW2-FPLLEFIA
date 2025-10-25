<?php
session_start();


function getBooks(){
    if(!isset($_SESSION['libros'])){
    $_SESSION['libros'] = [
    [
        "id" => 1,
        "titulo" => "El Quijote",
        "autor" => "Miguel de Cervantes",
        "descripcion" => "Una novela sobre aventuras de un caballero.",
        "imagen" => "https://m.media-amazon.com/images/I/91CIwR3QU1L._UF1000,1000_QL80_.jpg"
    ],
    [
        "id" => 2,
        "titulo" => "1984",
        "autor" => "George Orwell",
        "descripcion" => "Novela distópica sobre vigilancia y control.",
        "imagen" => "https://www.libreriaalberti.com/media/img/portadas/_visd_0000JPG02I0T.jpg"
    ]
];

    $libros = $_SESSION['libros'];
    
}else{
    $libros = $_SESSION['libros'];

}
return $libros;
};



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