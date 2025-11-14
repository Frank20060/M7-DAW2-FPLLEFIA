<?php 
    include __DIR__ . "/../dbconfig/config.php";


    $users = $mysqli->query("SELECT * from USUARIOS");
    echo "</br>";
    var_dump($users);
    echo "</br>";
    $resultUser = $users -> fetch_all(MYSQLI_ASSOC);

    var_dump($resultUser);
    echo "</br>";
    
    print_r($resultUser);

    function returnUsersData(){
        global $mysqli;
        $users = $mysqli->query("SELECT * from USUARIOS");
        $resultUser = $users -> fetch_all(MYSQLI_ASSOC);
        return $resultUser;

    }
    


