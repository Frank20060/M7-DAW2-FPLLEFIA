<!--    Mostramos los personajes de la sesion con un for each --->
<?php
session_start();


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Marvel CRUD</title>
    <!--Boodstrap--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body class="bg-dark">

    
    <div class="container py-4">
        <h1 class="text-white">Marvel personajes</h1>
        <!-- Boton añadir personajes -->
        <a href="add_edit_character.php" class="btn btn-warning">Añadir personaje</a>
    </div>    
        <!-- Mostramos los personajes -->

    <div class="row g-3">
        <?php foreach ($_SESSION['personaje'] as $personaje): ?> <!-- Para hacer un foreach usando html -->
            <div class="col-md-4">
                <div class="card h-100 shadow-sm border-md bg-primary">
                    


                </div>
            </div>
        <?php endforeach?><!-- Cerrar el foreach -->


    </div>




    





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>