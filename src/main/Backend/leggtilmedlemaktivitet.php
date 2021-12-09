<?php
include "include/include.php";
include "include/session.php";
//Henter aktivitetID fra URL og definerer id
$id = $_GET['aktivitetID'];

//Query som henter all informasjon fra aktiviteter tabellen der $id er lik aktivitetID, dette resultatet blir lagt inn i variabelen $aktivitetID som senere vil bli brukt 
$result = mysqli_query($conn, "SELECT * FROM aktiviteter WHERE aktivitetID = $id");

    while($res = mysqli_fetch_array($result))
{
    $aktivitetID = $res['aktivitetID'];
}


if (isset($_POST["velg"])) {

$aktivitetID = $_POST['aktivitetID'];
$medlemID = $_POST['medlem'];

//Query som legger til et nytt medlem i medaktivitet tabellen, med verdiene som bruker har valgt. 
$resultat = mysqli_query($conn, "INSERT INTO medaktivitet (medlemID, aktivitetID) VALUES ('$medlemID', '$aktivitetID')");
header("Location: kursaktiviteter.php");
}

?>



<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="profil.php">Home</a>
	<br><br>
	
	<form name="form1" method="post">

            <br><br>
            <tr>
				<td><input type="hidden" name="aktivitetID" value="<?php echo $aktivitetID;?>"></td>
			</tr>

            Velg medlem:  <select name="medlem" required> 
                <?php
                //Her fyller jeg html formet med verdier som eksisterer i databasen, dette gjør det enklere for bruker, og han har ikke mulighet til å hente ut en verdi som ikke eksiterer.
                    $sql = mysqli_query($conn, "SELECT  medlemID, fornavn FROM medlemmer");
                    while ($rad = $sql->fetch_assoc()){
                        ?>
                        <option value="<?php echo $rad['medlemID'];?>"><?php echo $rad['fornavn'];?></option>
                        <?php
                        } 
                        ?>
                        
                </select><br>

			<tr>
				
				<td><input type="submit" name="velg" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>

