<?php
    include ("dbconfig/config.php");
    include ("data/data.php");

    $usuariosInfo = returnUsersData();

    var_dump($usuariosInfo);
    


?>