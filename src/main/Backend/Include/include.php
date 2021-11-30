<?php
$servername = "localhost";
$username = "root";
$password = "12345";
$dbname = "oppgave";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Tilkobling feilet: " . mysqli_connect_error());
}
?>

