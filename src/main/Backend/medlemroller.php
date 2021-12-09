<h1>Medlemsroller</h1>
<a href="eksisterendeBrukere.php">Home</a><br><br>
<?php
        include "include/include.php";
        include "include/session.php";
        //Henter medlemID fra URL og definerer medlemID
        $medlemID = $_GET['medlemID'];

        /*Henter ut verier fra 2 ulike tabeller, ved å bruke LEFT OUTER JOIN gjennom vår "rollehub" medlemrolle. Dette er for å kunne printe ut rolleID og selve rollen.
        Denne queryen kjøres dersom inputten fra html formet nedenfor er av samme verdi som finnes i databasen.*/ 
        $resultat = mysqli_query($conn, "SELECT medlemmer.medlemID, roller.rolle_ID, medlemmer.fornavn, medlemmer.etternavn, roller.roller FROM medlemmer 
        LEFT OUTER JOIN medlemrolle ON medlemmer.medlemID = medlemrolle.medlemID LEFT OUTER JOIN roller ON medlemrolle.rolle_ID = roller.rolle_ID WHERE medlemrolle.medlemID = $medlemID");


                echo "<table border='1'>
                <tr>
                <th>MedlemID</th>
                <th>RolleID</th>
                <th>Fornavn</th>
                <th>Etternavn</th>
                <th>Rolle</th>
                </tr>";

                while($rad = mysqli_fetch_array($resultat))
                {
                echo "<tr>";
                echo "<td>" . $rad['medlemID'] . "</td>";
                echo "<td>" . $rad['rolle_ID'] . "</td>";
                echo "<td>" . $rad['fornavn'] . "</td>";
                echo "<td>" . $rad['etternavn'] . "</td>";
                echo "<td>" . $rad['roller'] . "</td>";
                echo "</tr>";
                }
                echo "</table>";


?>