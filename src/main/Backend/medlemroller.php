<h1>Medlemsroller</h1>
<?php
        include "include/include.php";
        include "include/session.php";
        $medlemID = $_GET['medlemID'];


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