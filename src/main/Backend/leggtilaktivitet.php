
<?php
    include "include/session.php";
    include "include/include.php";
    include "../View/Leggtilaktivitet.html";
    
        if (isset($_POST["registrer"])) {
            
            $navn = $_POST['navn'];
            $ansvarlig = $_POST['ansvarlig'];
            $startdato = $_POST['startdato'];
            $sluttdato = $_POST['sluttdato'];
            $dagensdato = $_POST['dagensdato'];
    
            
            $data = "INSERT INTO aktiviteter (navn, ansvarlig, startDato, sluttDato, dagensDato)
            VALUES ('$navn', '$ansvarlig', '$startdato', '$sluttdato', '$dagensdato')";

            mysqli_query($conn,$data);

            echo "Aktivitet er registrert <br>";
        
            
        }
        
        ?>