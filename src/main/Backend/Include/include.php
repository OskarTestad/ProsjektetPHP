<?php
// Etablerer database connection
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "prosjektet";

$conn = mysqli_connect($servername, $username, $password, $dbname);
//Hvis det ikke oppstår er connection så skal den avsluttes
if (!$conn) {
    die("Tilkobling feilet: " . mysqli_connect_error());
}
?>

