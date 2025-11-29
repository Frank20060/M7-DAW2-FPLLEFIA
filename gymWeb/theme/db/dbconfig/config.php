<?php

$host="mysql-frank20060.alwaysdata.net";
$dbuser="439411";
$dbpassword="Frank2006VillRed";
$dbname="frank20060_pp6";

$mysqli = new mysqli($host, $dbuser, $dbpassword, $dbname);

if($mysqli -> connect_error){

    die("Error de conexion" . $mysqli->connect_error);

}




?>