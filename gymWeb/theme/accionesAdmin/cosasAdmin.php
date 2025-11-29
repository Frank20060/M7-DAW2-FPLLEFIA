<?php

session_start();
include_once '../db/dbconfig/config.php';



//Si no hay sesión activa o el rol no es admin, redirigir a login porque ese usuario no puede acceder a la pagina de control del admin
if (!isset($_SESSION['usuario']) && !$_SESSION['rol'] == 'admin') {
    //header("Location: ../login.php");
    //exit();
}


//funciones de crear cosas (pero solo lo que puede hacer el admin)
//Cosas que puede hacer el admin: Afegir, Eliminar, Editar, Llegir: tots els usuaris, testimonis, projectes, notícies, comentaris… (CRUD con control total (intentare hecr una interfaz chula para el panel de admin))

///Acciones Comentarios (CONIDERO QUE EL ADMIN PUEDE AÑADIR Y ELIMINAR COMENTARIOS, Y EDITAR PERO SOLO LOS COMENTARIOS QUE HACE EL (como los usuarios))

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

