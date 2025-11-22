<?php 
    include __DIR__ . "/../dbconfig/config.php";


    $users = $mysqli->query("SELECT * from USUARIOS");
    echo "</br>";
    
    echo "</br>";
    $resultUser = $users -> fetch_all(MYSQLI_ASSOC);

    
    echo "</br>";
    
    

    function returnUsersData(){
        global $mysqli;
        $users = $mysqli->query("SELECT * from USUARIOS");
        $resultUser = $users -> fetch_all(MYSQLI_ASSOC);
        return $resultUser;

    }
    


