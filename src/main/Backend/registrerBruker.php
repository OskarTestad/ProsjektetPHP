<html>
<head>
		<title>Index 6.2</title>
		<meta charset="UTF-8"> 	
	</head>
    <style>

    </style>
<body>
<?php
    include "include/include.php";
    
        if (isset($_POST["registrer"])) {
            
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
            $interesser2 = $_POST['interesser2'];
            $fagak = $_POST['fagAktiviteter'];
            $medlemSiden = $_POST['medlemSiden'];
            $kontstat = $_POST['kontigentStatus'];
            
            $data = "INSERT INTO Medlemmer (fornavn, etternavn, brukernavn, passord, gateadresse, postnr, poststed, epost, telefon, fødselsdato, kjønn, interesser, interesser2, fagAktiviteter, medlemSiden, kontigentStatus)
            VALUES ('$fornavn', '$etternavn', '$brukernavn', '$passord', '$gateadresse', '$postnr', '$poststed', '$epost', '$tlf', '$fdato', '$kjønn', '$interesser', '$interesser2', '$fagak', '$medlemSiden', '$kontstat')";

            mysqli_query($conn,$data);

            echo "Medlem er registrert <br>";
        
            
        }

       
    ?>

    <h1>Oppgave 2</h1>
    <pre>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Fornavn: <input type="text" name="fornavn" placeholder="Fornavn" required><br>
        Etternavn: <input type="text" name="etternavn" placeholder="Etternavn" required><br>
        Brukernavn: <input type="text" name="brukernavn" placeholder="Brukernavn" required><br>
        Passord: <input type="text" name="passord" placeholder="Passord" required><br>
        Gateadresse: <input type="text" name="gateadresse" placeholder = "Gateadresse" required><br>
        Postnummer: <input type="text" name="postnr" placeholder= "Postnummer" required><br>
        Poststed: <input type="text" name="poststed" placeholder= "Poststed" required><br>
        E-post: <input type="email" name="epost" placeholder="E-post" required><br>
        Telefon: <input type="tel" name="telefon" placeholder="Mobilnummer" required><br>
        Fødselsdato: <input type="date" name="fødselsdato" value="2011-05-05" required><br>
        Kjønn:  <select name="kjønn" value="kjønn" required> 
                <option value="mann">Mann</option>
                <option value="dame">Dame</option>
                <option value="annet">Annet</option>
                </select>
        Interesser: <input type="text" name="interesser" placeholder= "Interesser" required><br>
        Interesser 2: <input type="text" name="interesser2" placeholder= "Interesser" required><br>
        Fag aktiviteter: <input type="text" name="fagAktiviteter" placeholder= "Fag Aktiviteter" required><br>
        Medlem siden: <input type="date" name="medlemSiden" value="2011-05-05" required><br>
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
	<a href="profil.php">Home</a>
	<br><br>
    </body>
</html>