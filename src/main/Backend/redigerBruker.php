<?php
include "include/include.php";
include "include/session.php";
    $id = $_GET['medlemID'];

    $result = mysqli_query($conn, "SELECT * FROM Medlemmer WHERE medlemID = $id");

    while($res = mysqli_fetch_array($result))
{
    $medlemID = $res['medlemID'];
	$fornavn = $res['fornavn'];
	$etternavn = $res['etternavn'];
	$brukernavn = $res['brukernavn'];
    $gateadresse = $res['gateadresse'];
	$postnummer = $res['postnr'];
	$poststed = $res['poststed'];
    $epost = $res['epost'];
	$telefon = $res['telefon'];
	$fødselsdato = $res['fødselsdato'];
    $kjønn = $res['kjønn'];
	$interesser = $res['interesser'];
	$interesser2 = $res['interesser2'];
	$medlemSiden = $res['medlemSiden'];
	$kontigentstatus = $res['kontigentStatus'];
}
?>


<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	<a href="profil.php">Home</a>
	<br><br>
	
	<form name="form1" method="post" action="redigerprosess.php">
		<table border="0">
            <tr>
				<td>MedlemID</td>
				<td><input type="hidden" name="medlemID" value="<?php echo $medlemID;?>"></td>
			</tr>
			<tr>
				<td>Fornavn</td>
				<td><input type="text" name="fornavn" value="<?php echo $fornavn;?>"></td>
			</tr>
			<tr>
				<td>Etternavn</td>
				<td><input type="text" name="etternavn" value="<?php echo $etternavn;?>"></td>
			</tr>
		<tr> 
				<td>Brukernavn</td>
				<td><input type="text" name="brukernavn" value="<?php echo $brukernavn;?>"></td>
			</tr>
            <tr>
				<td>Gateadresse</td>
				<td><input type="text" name="gateadresse" value="<?php echo $gateadresse;?>"></td>
			</tr>
            <tr>
				<td>Postnummer</td>
				<td><input type="text" name="postnr" value="<?php echo $postnummer;?>"></td>
			</tr>
            <tr>
				<td>Poststed</td>
				<td><input type="text" name="poststed" value="<?php echo $poststed;?>"></td>
			</tr>
            <tr>
				<td>E-post</td>
				<td><input type="text" name="epost" value="<?php echo $epost;?>"></td>
			</tr>
            <tr>
				<td>Telefon</td>
				<td><input type="text" name="telefon" value="<?php echo $telefon;?>"></td>
			</tr>
            <tr>
				<td>Fødselsdato</td>
				<td><input type="text" name="fødselsdato" value="<?php echo $fødselsdato;?>"></td>
			</tr>
            <tr>
				<td>Kjønn</td>
				<td><input type="text" name="kjønn" value="<?php echo $kjønn;?>"></td>
			</tr>
            <tr>
				<td>Interesser</td>
				<td><input type="text" name="interesser" value="<?php echo $interesser;?>"></td>
			</tr>
            <tr>
				<td>Interesser2</td>
				<td><input type="text" name="interesser2" value="<?php echo $interesser2;?>"></td>
			</tr>
            <tr>
				<td>MedlemSiden</td>
				<td><input type="text" name="medlemSiden" value="<?php echo $medlemSiden;?>"></td>
			</tr>
            <tr>
				<td>Kontigentstatus</td>
				<td><input type="text" name="kontigentStatus" value="<?php echo $kontigentstatus;?>"></td>
			</tr>

			<tr>
				
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>

