<?php

include "functions.php";

$id = $_GET['id'];

eliminarLibro($id);

header("Location: home.php");


?>