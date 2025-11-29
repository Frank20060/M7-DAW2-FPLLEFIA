<?php
////AÑADIR ELIMINAR Y EDITAR COMENTARIOS


include_once '../db/dbconfig/config.php';

function añadirComentario() {   //habra un formulario en la pagina de admin (CUANDO LLEGE EL MOMENTO REVISAR LAS VARIABLES)

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //Codigo para añadir comentario
    //1. Recogemos los datos
    $comentario = $_POST['comentario'];
    $id_noticia = $_POST['id_noticia'];
    $id_usuario = $_SESSION['id_usuario'];  ///Luego lo mirare bien, pero creo que el id del usuario esta en la sesion

    //Preparamos la consulta
    global $mysqli;
    $consulta = 'INSERT INTO COMENTARIOS (comentario, id_noticia, id_usuario, fecha) VALUES (?, ?, ?, NOW())';
    $stmt = $mysqli->prepare($consulta);

    //2. Validamos los datos
    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }
    
   
    //bindear los parametros
    $stmt->bind_param("sii", $comentario, $id_noticia, $id_usuario);

    //3. Insertamos los datos en la base de datos
    $stmt->execute();
    //4.Cerrar la conexion
    
    $stmt->close();

    }
}

//Editar comentario siempre y cuando sea el mismo usuario quien lo edita

function editarComentario($id_comentario, $nuevo_comentario) {
    global $mysqli;

    if (!isset($_SESSION['id_usuario'])) {
        return false; // usuario no logueado
    }
    $id_usuario = $_SESSION['id_usuario'];

    $consulta = 'UPDATE comentarios
                 SET comentario = ?
                 WHERE id = ? AND id_usuario = ?';

    $stmt = $mysqli->prepare($consulta);
    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }

    $stmt->bind_param("sii", $nuevo_comentario, $id_comentario, $id_usuario);
    $stmt->execute();

    // Sabes si realmente lo ha podido editar
    $actualizados = $stmt->affected_rows;

    $stmt->close();
    return $actualizados > 0; // true si era suyo, false si no
}

//Elliminar comentario (el admin puede eliminar cualquier comentario)

function eliminarComentario($id_comentario) {
    global $mysqli;

    //Preparamos la consulta
    $consulta = 'DELETE FROM COMENTARIOS WHERE id_comentario = ?';
    $stmt = $mysqli->prepare($consulta);

    //2. Validamos los datos
    if (!$stmt) {
        die("Error en prepare: " . $mysqli->error);
    }

    //bindear los parametros
    $stmt->bind_param("i", $id_comentario);

    //3. Ejecutamos la consulta para eliminar el comentario
    $stmt->execute();

    //4.Cerrar la conexion
    $stmt->close();
}