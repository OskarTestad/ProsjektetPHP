<?php
include "include/include.php";
include "include/session.php";
$id = $_GET['medlemID'];

$result = mysqli_query($conn, "SELECT * FROM Medlemmer WHERE medlemID = $id");

if(isset($_POST['update']))
{
$id = mysqli_real_escape_string($conn, $_POST['medlemID']);
$fornavn = mysqli_real_escape_string($conn, $_POST['fornavn']);
$etternavn = mysqli_real_escape_string($conn, $_POST['etternavn']);
$brukernavn = mysqli_real_escape_string($conn, $_POST['brukernavn']);
$gateadresse = mysqli_real_escape_string($conn, $_POST['gateadresse']);
$postnummer = mysqli_real_escape_string($conn, $_POST['postnr']);
$poststed = mysqli_real_escape_string($conn, $_POST['poststed']);
$epost = mysqli_real_escape_string($conn, $_POST['epost']);
$telefon = mysqli_real_escape_string($conn, $_POST['telefon']);
$fødselsdato = mysqli_real_escape_string($conn, $_POST['fødselsdato']);
$kjønn = mysqli_real_escape_string($conn, $_POST['kjønn']);
$interesser = mysqli_real_escape_string($conn, $_POST['interesser']);
$interesser2 = mysqli_real_escape_string($conn, $_POST['interesser2']);
$medlemSiden = mysqli_real_escape_string($conn, $_POST['medlemSiden']);
$kontigentstatus = mysqli_real_escape_string($conn, $_POST['kontigentStatus']);

if(empty($fornavn) || empty($etternavn) || empty($epost)) {	
if(empty($fornavn)) {
echo '<font color="red">Name field is empty.</font><br>';
}
if(empty($etternavn)) {
echo '<font color="red">Age field is empty.</font><br>';
}
if(empty($epost)) {
echo '<font color="red">Email field is empty.</font><br>';
}		
} else {
    echo "Medlem oppdatert";
$result = mysqli_query($conn, "UPDATE medlemmer SET fornavn = '$fornavn' , etternavn ='$etternavn', brukernavn ='$brukernavn', gateadresse = '$gateadresse', postnr ='$postnummer', poststed ='$poststed', epost ='$epost', telefon ='$telefon',
fødselsdato ='$fødselsdato', kjønn ='$kjønn', interesser ='$interesser', interesser2 ='$interesser2', medlemSiden ='$medlemSiden', kontigentStatus ='$kontigentstatus' WHERE medlemID= $id");
header("Location: eksisterendeBrukere.php");
}
}
?>

