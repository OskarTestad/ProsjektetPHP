<?php
    session_start();
    
    if(isset($_SESSION["brukernavn"]) !== true) {
        header("Location: index.php");
        exit();
    } 
    if (isset($_REQUEST['loggut'])) {
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }
?>