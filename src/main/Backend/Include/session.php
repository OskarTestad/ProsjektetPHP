<?php
    session_start();
    
    if(isset($_SESSION["brukernavn"]) !== true) {
        header("Location: logginn.php");
        exit();
    } 
    if (isset($_REQUEST['loggut'])) {
        session_start();
        session_unset();
        session_destroy();
        header("Location: logginn.php");
        exit();
    }
?>