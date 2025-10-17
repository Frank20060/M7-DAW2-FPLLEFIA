<?php
session_start();
session_destroy();
if(!$_GET['incorrecto']){

    header("Location: index.php");  

}
else{
    header("Location: index.php?incorrecto=true");
}   






