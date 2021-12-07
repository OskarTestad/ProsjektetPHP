<?php
include "include/include.php";

$id = $_GET['aktivitetID'];

$result = mysqli_query($conn, "SELECT * FROM aktiviteter WHERE aktivitetID = $id");

    while($res = mysqli_fetch_array($result))
{
    $aktivitetID = $res['aktivitetID'];
}

if (isset($_POST["velg"])) {

    

$aktivitetID = $_POST['aktivitetID'];
$medlemID = $_POST['medlem'];


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

