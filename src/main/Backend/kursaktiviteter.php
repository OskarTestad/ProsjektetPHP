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
include "include/include.php";
$result = mysqli_query($conn,"SELECT * FROM Aktiviteter WHERE startDato >= CURDATE()");
                

                echo "<table border='1'>
                <tr>
                <th>Navn</th>
                <th>Ansvarlig</th>
                <th>StartDato</th>
                <th>SluttDato</th>
                <th>DagensDato</th>
                <th>Legg til medlemmer</th>
                </tr>";

                while($row = mysqli_fetch_array($result))
                {
                echo "<tr>";
                echo "<td>" . $row['navn'] . "</td>";
                echo "<td>" . $row['ansvarlig'] . "</td>";
                echo "<td>" . $row['startDato'] . "</td>";
                echo "<td>" . $row['sluttDato'] . "</td>";
                echo "<td>" . $row['dagensDato'] . "</td>";
                echo "<td><a href='leggtilmedlemaktivitet.php><font color='black'>Legg til medlem</a>";
                echo "</tr>";
                }
                echo "</table>";

                mysqli_close($conn);
?>

<a href="leggtilaktivitet.php"><h3> Legg til nye aktiviteter</h3></a>

<br><br><a href="profil.php">Home</a>