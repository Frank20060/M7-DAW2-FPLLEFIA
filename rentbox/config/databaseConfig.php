<?php

    $host="mysql-frank20060.alwaysdata.net";
    $dbuser="439411";
    $dbpassword="Frank2006VillRed";
    $dbname="frank20060_rentbox";

    $mysqli = new mysqli($host, $dbuser, $dbpassword, $dbname);

    if($mysqli -> connect_error){

        die("Error de conexion" . $mysqli->connect_error);
        
    }else{
        echo "Conexión exitosa con la base de datos.";
    }

