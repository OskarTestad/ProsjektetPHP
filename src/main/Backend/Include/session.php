<?php
//Session fil som brukes på de filene som krever innlogging, dette blir i vårt tilfelle alle filene etter logg inn siden
    session_start();
    
    if(isset($_SESSION["brukernavn"]) !== true) {
        header("Location: index.php");
        exit();
    }
    // Sjekker om loggut knappen er trykket, hvis den er det så ødelegges session og man blir sendt til index der man må logge inn på på nytt
    if (isset($_REQUEST['loggut'])) {
        session_start();
        session_unset();
        session_destroy();
        header("Location: index.php");
        exit();
    }
?>