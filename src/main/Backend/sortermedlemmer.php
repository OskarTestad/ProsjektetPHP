<?php
    include "include/include.php";
    include "include/session.php";

    //Hvis knappen "registrer" er valgt så vil medlemmer bli sortert etter den valgte interessen
    if (isset($_REQUEST["registrer"])) {
                    
                    $interesse = $_REQUEST['Interesser'];

                    $result = mysqli_query($conn, "SELECT fornavn, etternavn, interesser FROM Medlemmer WHERE interesser = '$interesse'");
                
                    if($result->num_rows == 0) {
                        echo "Det finnes ingen medlemmer med denne interessen";
                   } else {
                    echo "<table border='1'>
                    <tr>
                    <th>Fornavn</th>
                    <th>Etternavn</th>
                    <th>Interesse</th>
                    </tr>";
    
                    while($row = mysqli_fetch_array($result))
                    {
                    echo "<tr>";
                    echo "<td>" . $row['fornavn'] . "</td>";
                    echo "<td>" . $row['etternavn'] . "</td>";
                    echo "<td>" . $row['interesser'] . "</td>";
                    echo "</tr>";
                    }
                    echo "</table>";
    
                   }    
            }
    //Hvis knappen "kontigentStatus" er valgt så vil medlemmer bli sortert etter den valgte kontigentstatusen.     
    if (isset($_REQUEST["kontigentStatus"])) {
                    
                $kontigentStatus = $_REQUEST['KontigentStatus'];

                $result = mysqli_query($conn, "SELECT fornavn, etternavn, kontigentStatus FROM Medlemmer WHERE kontigentStatus = '$kontigentStatus'");
            
                if($result->num_rows == 0) {
                    echo "Det finnes ingen medlemmer med denne interessen";
               } else {
                echo "<table border='1'>
                <tr>
                <th>Fornavn</th>
                <th>Etternavn</th>
                <th>Kontigentstatus</th>
                </tr>";

                while($row = mysqli_fetch_array($result))
                {
                echo "<tr>";
                echo "<td>" . $row['fornavn'] . "</td>";
                echo "<td>" . $row['etternavn'] . "</td>";
                echo "<td>" . $row['kontigentStatus'] . "</td>";
                echo "</tr>";
                }
                echo "</table>";

               }
            }
    ?>


<form method="post">
        <h1>Sorter etter interesse</h1>
        Interesser:  <select name="Interesser" required> 
                <?php
                //Her fyller jeg html formet med verdier som eksisterer i databasen, dette gjør det enklere for bruker, og han har ikke mulighet til å hente ut en verdi som ikke eksiterer.
                    $sql = mysqli_query($conn, "SELECT  interesser, fornavn, etternavn FROM medlemmer");
                    while ($rad = $sql->fetch_assoc()){
                        ?>
                        <option value="<?php echo $rad['interesser'];?>"><?php echo $rad['interesser'];?></option>
                        <?php
                        } 
                        ?>
                        
                </select><br>
                <input type="submit" name="registrer" value="Velg">


        <h1>Sorter etter kontigentstatus</h1>
        Kontigentstatus:  <select name="KontigentStatus" required> 
                <?php
                //Her fyller jeg html formet med verdier som eksisterer i databasen, dette gjør det enklere for bruker, og han har ikke mulighet til å hente ut en verdi som ikke eksiterer.
                    $sql = mysqli_query($conn, "SELECT  kontigentStatus, fornavn, etternavn FROM medlemmer");
                    while ($rad = $sql->fetch_assoc()){
                        ?>
                        <option value="<?php echo $rad['kontigentStatus'];?>"><?php echo $rad['kontigentStatus'];?></option>
                        <?php
                        } 
                        ?>
                        
                </select><br>
                <input type="submit" name="kontigentStatus" value="Velg">
</form>
<br><br><a href="profil.php">Tilbake</a>