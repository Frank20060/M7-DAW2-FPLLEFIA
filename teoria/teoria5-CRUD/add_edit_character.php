<?php  ///Editar y añadir personajes 

session_start();
require_once "functions.php";

///Primer paso: comprovar si venimos para editar o para añadir

$editMode = false;  // ---> NOS DICE SI ESTAMOS EDITANDO O AÑADIENDO
$id = null;
$nombre = $imagen = $poder = $desc = "";

//SI HAY UN ID EN LA URL ESTAMOS EDITANDO

if(isset($_GET['id'])){
    $id = $_GET['id'];

    if(isset($_SESSION['personajes'][$id])){
        $editMode = true;
        $personaje = $_SESSION['personajes'][$id];

        $nombre = $personaje['nombre'];
        $imagen = $personaje['img'];
        $poder = $personaje['poder'];
        $desc = $personaje['descripcion'];

    }
}

///Segundo paso : PROCESAR EL FORMULARIO (POST)

if($_SERVER['RECUEST_METHOD'] == 'POST'){

    $nombre = $_POST['nombre'];
    $imagen = $_POST['img'];
    $poder = $_POST['poder'];
    $desc = $_POST['descripcion'];
}

if($editMode){
    editarPersonaje($id, $nombre, $imagen, $poder, $desc);
}else{
    agregarPersonaje($nombre, $immagen, $poder, $desc);
}



?>