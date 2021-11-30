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
<!DOCTYPE html>
<html>
	<head>
		<title>Index 6.1</title>
		<meta charset="utf-8"> 	
	</head>
    <style>

    </style>
        
	<body>
        <h1>Eksisterende brukere</h1>
        
        
        <?php
            
                include "include/include.php";

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
                <th>Fag Aktiviteter</th>
                <th>Medlem Siden</th>
                <th>Kontigent Status</th>
                <th>Rediger</th>
                <th>Send epost</th>
                </tr>";

                while($row = mysqli_fetch_array($result))
                {
                    
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
                echo "<td>" . $row['fagAktiviteter'] . "</td>";
                echo "<td>" . $row['medlemSiden'] . "</td>";
                echo "<td>" . $row['kontigentStatus'] . "</td>";
                echo "<td><a href='redigerBruker.php?medlemID=$row[medlemID]'><font color='black'>Edit</a>";
                echo "<td><a href='sendepost.php?medlemID=$row[medlemID]'><font color='black'>Send epost</a>";
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
	<a href="profil.php">Home</a>
	<br><br>
    </body>
</html>