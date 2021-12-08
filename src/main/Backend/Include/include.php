<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prosjektet";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Tilkobling feilet: " . mysqli_connect_error());
}
?>

