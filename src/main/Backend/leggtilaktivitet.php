<html>
<head>
		<title>Index 6.2</title>
		<meta charset="UTF-8"> 	
	</head>
    <style>

    </style>
<body>
<?php
    include "include/session.php";
    include "include/include.php";
    
        if (isset($_POST["registrer"])) {
            
            $navn = $_POST['navn'];
            $ansvarlig = $_POST['ansvarlig'];
            $startdato = $_POST['startdato'];
            $sluttdato = $_POST['sluttdato'];
            $dagensdato = $_POST['dagensdato'];
    
            
            $data = "INSERT INTO aktiviteter (navn, ansvarlig, startDato, sluttDato, dagensDato)
            VALUES ('$navn', '$ansvarlig', '$startdato', '$sluttdato', '$dagensdato')";

            mysqli_query($conn,$data);

            echo "Aktivitet er registrert <br>";
        
            
        }
        
        
            
            

       
    ?>

    

    <h1>Oppgave 2</h1>
    <pre>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Aktivitetsnavn: <input type="text" name="navn" placeholder="Aktivitetsnavn" required><br>
        Aktivitetsansvarlig: <input type="text" name="ansvarlig" placeholder="Aktivitetsansvarlig" required><br>
        Start Dato: <input type="date" name="startdato" value="2011-05-05" required><br>
        Slutt Dato: <input type="date" name="sluttdato" value="2011-05-05" required><br>
        Dagens Dato: <input type="date" name="dagensdato" value="2011-05-05" required><br>
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