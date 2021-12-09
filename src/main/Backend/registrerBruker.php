<html>
<head>
<a href="profil.php">Home</a>
	<br><br>
		<title>Index 6.2</title>
		<meta charset="UTF-8"> 	
	</head>
    <style>

    </style>
<body>
<?php
    include "include/include.php";
    include "include/session.php";
    
        //Hvis knappen "registrer" er trykket på, registerer man en ny bruker med informasjonen om medlemmet. 
        if (isset($_POST["registrer"])) {
            $medlemID = $_POST['medlemID'];
            $fornavn = $_POST['fornavn'];
            $etternavn = $_POST['etternavn'];
            $brukernavn = $_POST['brukernavn'];
            $passord = password_hash($_POST['passord'], PASSWORD_DEFAULT);
            $gateadresse = $_POST['gateadresse'];
            $postnr = $_POST['postnr'];
            $poststed = $_POST['poststed'];
            $epost = $_POST['epost'];
            $tlf = $_POST['telefon'];
            $fdato = $_POST['fødselsdato'];
            $kjønn = $_POST['kjønn'];
            $interesser = $_POST['interesser'];
            $medlemSiden = $_POST['medlemSiden'];
            $kontstat = $_POST['kontigentStatus'];
            $rolle = $_POST['rolle'];
            
            //Dette er en multiquery som INSERT INTO i to ulike tabeller, legger all informasjon inn i medlemtabellen og rolleinformasjon inn i medlemrolle
            $data = "INSERT INTO Medlemmer (medlemID, fornavn, etternavn, brukernavn, passord, gateadresse, postnr, poststed, epost, telefon, fødselsdato, kjønn, interesser, medlemSiden, kontigentStatus)
            VALUES ('$medlemID', '$fornavn', '$etternavn', '$brukernavn', '$passord', '$gateadresse', '$postnr', '$poststed', '$epost', '$tlf', '$fdato', '$kjønn', '$interesser', '$medlemSiden', '$kontstat');
            INSERT INTO medlemrolle (medlemID, rolle_ID) VALUES ('$medlemID', '$rolle');";

            mysqli_multi_query($conn,$data);
            echo "Medlem er registrert <br>";   
        }

       
    ?>

    <h1>Oppgave 2</h1>
    <pre>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Medlem ID: <input type="text" name="medlemID" placeholder="Medlem ID" required><br>
        Fornavn: <input type="text" name="fornavn" placeholder="Fornavn" required><br>
        Etternavn: <input type="text" name="etternavn" placeholder="Etternavn" required><br>
        Brukernavn: <input type="text" name="brukernavn" placeholder="Brukernavn" required><br>
        Passord: <input type="password" name="passord" placeholder="Passord" required><br>
        Gateadresse: <input type="text" name="gateadresse" placeholder = "Gateadresse" required><br>
        Postnummer: <input type="text" name="postnr" placeholder= "Postnummer" required><br>
        Poststed: <input type="text" name="poststed" placeholder= "Poststed" required><br>
        E-post: <input type="email" name="epost" placeholder="E-post" required><br>
        Telefon: <input type="tel" name="telefon" placeholder="Mobilnummer" required><br>
        Fødselsdato: <input type="date" name="fødselsdato" value="<?php echo date('Y-m-d');?>" required><br>
        Kjønn:  <select name="kjønn" value="kjønn" required> 
                <option value="mann">Mann</option>
                <option value="dame">Dame</option>
                <option value="annet">Annet</option>
                </select><br>
        Interesser: <input type="text" name="interesser" placeholder= "Interesser" required><br>
        Velg rolle : <select name="rolle" required> 
                <?php
                ////Her fyller jeg html formet med verdier som eksisterer i databasen, dette gjør det enklere for bruker, og han har ikke mulighet til å hente ut en verdi som ikke eksiterer.
                    $sql = mysqli_query($conn, "SELECT  rolle_ID, roller FROM roller");
                    while ($rad = $sql->fetch_assoc()){
                        ?>
                        <option value="<?php echo $rad['rolle_ID'];?>"><?php echo $rad['roller'];?></option>
                        <?php
                        } 
                        ?>
                        
                </select><br>
        Medlem siden: <input type="date" name="medlemSiden" value="<?php echo date('Y-m-d');?>" required><br>
        Kontigentstatus:  <select name="kontigentStatus" value="Kontigentstatus" required> 
                <option value="Betalt">Betalt</option>
                <option value="Ikke betalt">Ikke betalt</option>
                </select>
        <input type="submit" name="registrer" value="Registrér">
    </form>
    </pre>

    
    
    
</body>
</html>
<html>
<head>	
	<title>Edit Data</title>
</head>

<body>
	
    </body>
</html>