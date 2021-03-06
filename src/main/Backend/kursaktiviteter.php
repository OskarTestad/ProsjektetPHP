<html>
<head>	
	<title>Oversikt over  kommende kursaktiviteter</title>
</head>

<body>
<h1> Oversikt over  kommende kursaktiviteter</h1>
	
	<br><br>
    </body>
</html>
<?php
include "include/session.php";
include "include/include.php";
//Henter ut alle fremtigdige aktiviteter fra aktivitetstabellen
$result = mysqli_query($conn,"SELECT * FROM Aktiviteter WHERE startDato >= CURDATE()");
                

                echo "<table border='1'>
                <tr>
                <th>AktivitetID</th>
                <th>Navn</th>
                <th>Ansvarlig</th>
                <th>StartDato</th>
                <th>SluttDato</th>
                <th>DagensDato</th>
                <th>Legg til medlemmer</th>
                </tr>";

                while($row = mysqli_fetch_array($result))
                {
                //Printer verdiene fra queryen inn en html tabell som blir synlig for brukeren, den siste kolonnenen i tabellen sender brukeren videre til en funksjon som gjør det mulig å legge til et medlem på den valgte aktiviteten
                echo "<tr>";
                echo "<td>" . $row['aktivitetID'] . "</td>";
                echo "<td>" . $row['navn'] . "</td>";
                echo "<td>" . $row['ansvarlig'] . "</td>";
                echo "<td>" . $row['startDato'] . "</td>";
                echo "<td>" . $row['sluttDato'] . "</td>";
                echo "<td>" . $row['dagensDato'] . "</td>";
                echo "<td><a href='leggtilmedlemaktivitet.php?aktivitetID=$row[aktivitetID]'><font color='black'>Legg til medlem</a>";
                echo "</tr>";
                }
                echo "</table>";
            
?>
<br><br>

<h3>Se liste over alle medlemmer i den valgte aktiviteten</h3>

<?php
    //Sjekker om knappen "velg" er trykket
    if (isset($_POST["velg"])) {

        $aktivitet = $_POST['Aktiviteter'];

        /*Henter ut verier fra 2 ulike tabeller, ved å bruke LEFT OUTER JOIN gjennom vår "aktivitetshub" medaktivitet. Dette er for å kunne printe ut navnet på aktiviteten. 
        Denne queryen kjøres dersom inputten fra html formet nedenfor er av samme verdi som finnes i databasen.*/ 
        $resultat = mysqli_query($conn, "SELECT medlemmer.medlemID, aktiviteter.aktivitetID, medlemmer.fornavn, medlemmer.etternavn, aktiviteter.navn FROM medlemmer 
        LEFT OUTER JOIN medaktivitet ON medlemmer.medlemID = medaktivitet.medlemID LEFT OUTER JOIN aktiviteter ON medaktivitet.aktivitetID = aktiviteter.aktivitetID WHERE medaktivitet.aktivitetID = $aktivitet");


                echo "<table border='1'>
                <tr>
                <th>MedlemID</th>
                <th>AktivitetID</th>
                <th>Fornavn</th>
                <th>Etternavn</th>
                <th>Aktivitetsnavn</th>
                </tr>";

                while($rad = mysqli_fetch_array($resultat))
                {
                echo "<tr>";
                echo "<td>" . $rad['medlemID'] . "</td>";
                echo "<td>" . $rad['aktivitetID'] . "</td>";
                echo "<td>" . $rad['fornavn'] . "</td>";
                echo "<td>" . $rad['etternavn'] . "</td>";
                echo "<td>" . $rad['navn'] . "</td>";
                echo "</tr>";
                }
                echo "</table>";

}
?>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <br>
    Aktivitet:  <select name="Aktiviteter" required> 
                <?php
                //Her fyller jeg html formet med verdier som eksisterer i databasen, dette gjør det enklere for bruker, og han har ikke mulighet til å hente ut en verdi som ikke eksiterer. 
                    $sql = mysqli_query($conn, "SELECT  aktivitetID, navn FROM aktiviteter WHERE startDato >= CURDATE()");
                    while ($rad = $sql->fetch_assoc()){
                        ?>
                        <option value="<?php echo $rad['aktivitetID'];?>"><?php echo $rad['navn'];?></option>
                        <?php
                        } 
                        ?>
                        
                </select><br>
        <input type="submit" name="velg" value="Velg">
</form>

<a href="leggtilaktivitet.php"><h3> Legg til nye aktiviteter</h3></a>

<br><br><a href="profil.php">Home</a>