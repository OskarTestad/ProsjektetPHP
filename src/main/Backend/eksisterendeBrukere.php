<!DOCTYPE html>
<html>
	<head>
		<title>Index 6.1</title>
		<meta charset="utf-8"> 	
	</head>
    <style>

    </style>
        
	<body>
        <h1>Alle medlemmer</h1>
        
        
        <?php
            
                include "include/include.php";
                include "include/session.php";

                //Query som henter inn all informasjon om medlemmet i Medlemtabellen
                $result = mysqli_query($conn,"SELECT * FROM Medlemmer");

                echo "<table border='1'>
                <tr>
                <th>MedlemID</th>
                <th>Fornavn</th>
                <th>Etternavn</th>
                <th>Brukernavn</th>
                <th>Gateadresse</th>
                <th>Postnummer</th>
                <th>Poststed</th>
                <th>E-post</th>
                <th>Telefon</th>
                <th>Fødselsdato</th>
                <th>Kjønn</th>
                <th>Interesser</th>
                <th>Medlem Siden</th>
                <th>Kontigent Status</th>
                <th>Rediger</th>
                <th>Slett medlem</th>
                <th>Send epost</th>
                <th>Se medlemsroller</th>
                </tr>";

                while($row = mysqli_fetch_array($result))
                {
                //Printer verdiene fra queryen inn en html tabell som blir synlig for brukeren, de siste 4 kolonnene i tabellen sender brukeren videre til andre funskjoner, som rediger, slett, send epost og se medlemsroller     
                echo "<tr>";
                echo "<td>" . $row['medlemID'] . "</td>";
                echo "<td>" . $row['fornavn'] . "</td>";
                echo "<td>" . $row['etternavn'] . "</td>";
                echo "<td>" . $row['brukernavn'] . "</td>";
                echo "<td>" . $row['gateadresse'] . "</td>";
                echo "<td>" . $row['postnr'] . "</td>";
                echo "<td>" . $row['poststed'] . "</td>";
                echo "<td>" . $row['epost'] . "</td>";
                echo "<td>" . $row['telefon'] . "</td>";
                echo "<td>" . $row['fødselsdato'] . "</td>";
                echo "<td>" . $row['kjønn'] . "</td>";
                echo "<td>" . $row['interesser'] . "</td>";
                echo "<td>" . $row['medlemSiden'] . "</td>";
                echo "<td>" . $row['kontigentStatus'] . "</td>";
                echo "<td><a href='redigerBruker.php?medlemID=$row[medlemID]'><font color='black'>Edit</a>";
                echo "<td><a href='sletteprosess.php?medlemID=$row[medlemID]'><font color='black'>Slett</a>";
                echo "<td><a href='sendepost.php?medlemID=$row[medlemID]'><font color='black'>Send epost</a>";
                echo "<td><a href='medlemroller.php?medlemID=$row[medlemID]'><font color='black'>Se medlemroller</a>";
                echo "</tr>";
                }
                echo "</table>";

                mysqli_close($conn);
                

                
                
                

?>
           
	</body>
</html>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
<br><br>

	<a href="profil.php">Tilbake</a>
	<br><br>
    </body>
</html>