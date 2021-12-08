<?php
     include "../View/logginn.html";  
	

            if (isset($_REQUEST["logginn"])) {

                $brukernavn = $_REQUEST["bnavn"];
                $passord = $_REQUEST["pword"];
            
                require_once 'Include/include.php';

                $sql = "SELECT * FROM medlemmer WHERE brukernavn = ?";
                $stmt = mysqli_stmt_init($conn);
                if (!mysqli_stmt_prepare($stmt, $sql)){
                    echo "Tilfeldig feil";
                    exit(); 
                }

                mysqli_stmt_bind_param($stmt, "s", $brukernavn);
                mysqli_stmt_execute($stmt);


                $medlem = mysqli_stmt_get_result($stmt);

               
                $bruker = mysqli_fetch_assoc($medlem);
                

                $hashedpassord = $bruker["passord"];
                $sjekkpassord = password_verify($passord, $hashedpassord);

                if ($sjekkpassord === false) {
                    echo "Brukernavn og/eller passord er ikke riktig";
                } else if ($sjekkpassord === true) {
                    session_start();
                    $_SESSION["brukernavn"] = $bruker["brukernavn"];
                    $_SESSION["etternavns"] = $bruker["etternavn"];
                    header("Location: profil.php");
                    exit();
                }

                mysqli_stmt_close($stmt);
            }
        ?>
		<style>
<?php 
include "../View/Loginn.css"; ?>
</style>