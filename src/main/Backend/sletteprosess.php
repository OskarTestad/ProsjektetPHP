<?php
include "include/include.php";
include "include/session.php";
$sql = "DELETE FROM medlemmer WHERE medlemID='" . $_GET["medlemID"] . "'";
if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
mysqli_close($conn);?>
<br><br>
<a href="eksisterendebrukere.php">Gå tilbake</a>