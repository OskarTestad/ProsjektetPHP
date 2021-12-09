<?php
include "include/include.php";
include "include/session.php";
	//Henter inn verdier fra databasen og fyller html formsene med verdier som tilhører medlemmet valgt
    $id = $_GET['medlemID'];

    $result = mysqli_query($conn, "SELECT * FROM Medlemmer WHERE medlemID = $id");

    while($res = mysqli_fetch_array($result))
{
	$fornavn = $res['fornavn'];
	$etternavn = $res['etternavn'];
    $epost = $res['epost'];
	$kontigentstatus = $res['kontigentStatus'];
}
?>





<!DOCTYPE html>
<head>
<title>Form submission</title>
</head>
<body>
<a href="eksisterendeBrukere.php">Home</a><br><br>
<a href="sendEpostTilFlere.php"><h1>Send epost til ulike grupper</h1></a><br><br>
<form name="form1" method="post" action="sendepostprosess.php">
		<table border="0">
            <tr>
				<td>Fornavn</td>
				<td><input type="text" name="fornavn" value="<?php echo $fornavn;?>"></td>
			</tr>
			<tr>
				<td>Etternavn</td>
				<td><input type="text" name="etternavn" value="<?php echo $etternavn;?>"></td>
			</tr>
			<tr>
				<td>Epost</td>
				<td><input type="text" name="epost" value="<?php echo $epost;?>"></td>
			</tr>
            <tr>
				<td>Kontigentstatus</td>
				<td><input type="text" name="kontigentStatus" value="<?php echo $kontigentstatus;?>"></td>
			</tr>

            <tr>
				<td>Melding</td>
				<td><textarea rows="5" name="melding" cols="30"></textarea></td>
			</tr>

            <input type="submit" name="submit" value="Submit">
</body>
</html>