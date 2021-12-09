
<?php
    include "include/session.php";
    include "include/include.php";
    include "../View/Leggtilaktivitet.html";
        //Hvis "registrer" knappen er trykket så legger man til en ny aktivitet i aktivitettabellen der verdiene er, det bruker har lagt inn. 
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