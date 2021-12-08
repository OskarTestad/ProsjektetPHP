

    <?php
    include "include/include.php";
    include "include/session.php";

    if (isset($_REQUEST["Aktiviteter"])) {
                    
                    $interesse = $_REQUEST['interesse'];

                    $result = mysqli_query($conn, "SELECT medlemmer.medlemID, aktiviteter.aktivitetID, medlemmer.fornavn, medlemmer.etternavn, aktiviteter.navn FROM medlemmer 
                    LEFT OUTER JOIN medaktivitet ON medlemmer.medlemID = medaktivitet.medlemID LEFT OUTER JOIN aktiviteter ON medaktivitet.aktivitetID = aktiviteter.aktivitetID WHERE medaktivitet.navn = $interesse");
                
                    if($result->num_rows == 0) {
                        echo "Det finnes ingen medlemmer med denne interessen";
                   } else {
                    echo "<table border='1'>
                    <tr>
                    <th>Fornavn</th>
                    <th>Etternavn</th>
                    <th>Aktivitet</th>
                    </tr>";
    
                    while($row = mysqli_fetch_array($result))
                    {
                    echo "<tr>";
                    echo "<td>" . $row['fornavn'] . "</td>";
                    echo "<td>" . $row['etternavn'] . "</td>";
                    echo "<td>" . $row['navn'] . "</td>";
                    echo "</tr>";
                    }
                    echo "</table>";
    
                    mysqli_close($conn);
                   }    
            } elseif (isset($_REQUEST["interesser"])) {
                    
                $interesse = $_REQUEST['interesse'];

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

                mysqli_close($conn);
               }    
        }
?>  


<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <br>
    Aktivitet:  <select name="Aktiviteter" required> 
                <?php
                    $sql = mysqli_query($conn, "SELECT  aktivitetID, navn FROM aktiviteter WHERE startDato >= CURDATE()");
                    while ($rad = $sql->fetch_assoc()){
                        ?>
                        <option value="<?php echo $rad['aktivitetID'];?>"><?php echo $rad['navn'];?></option>
                        <?php
                        } 
                        ?>
                        
                </select><br>
        <input type="submit" name="Aktiviteter" value="Velg">
</form>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Interesser:  <select name="Interesser" required> 
                <?php
                    $sql = mysqli_query($conn, "SELECT  interesser, fornavn, etternavn FROM medlemmer");
                    while ($rad = $sql->fetch_assoc()){
                        ?>
                        <option value="<?php echo $rad['interesser'];?>"><?php echo $rad['interesser'];?></option>
                        <?php
                        } 
                        ?>
                        
                </select><br>
                <input type="submit" name="interesser" value="Velg">
</form>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Kontigentstatus:  <select name="Kontigentstatus" required> 
                <?php
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