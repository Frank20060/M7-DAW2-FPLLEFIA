<?php

session_start();
include_once '../../configuracion.php';


//Si no hay sesión activa o el rol no es admin, redirigir a login porque ese usuario no puede acceder a la pagina de control del admin
if (!isset($_SESSION['usuario']) && !$_SESSION['rol'] == 'admin') {
    //header("Location: ../login.php");
    //exit();
}


//funciones de crear cosas (pero solo lo que puede hacer el admin)
//Cosas que puede hacer el admin: Afegir, Eliminar, Editar, Llegir: tots els usuaris, testimonis, projectes, notícies, comentaris… (CRUD con control total (intentare hecr una interfaz chula para el panel de admin))

///Acciones Comentarios (CONIDERO QUE EL ADMIN PUEDE AÑADIR Y ELIMINAR COMENTARIOS, Y EDITAR PERO SOLO LOS COMENTARIOS QUE HACE EL (como los usuarios))

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

