<?php
    include "include/include.php";
    include "include/session.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
  
require 'vendor/autoload.php';  


    //Hvis knappen "registrer" er valgt så vil medlemmer bli sortert etter den valgte interessen
    if (isset($_REQUEST["registrer"])) {
        
        $interesse = $_REQUEST['Interesser'];

        $result = mysqli_query($conn, "SELECT medlemID, epost FROM Medlemmer WHERE interesser = '$interesse'");
    
        if($result->num_rows == 0) {
            echo "Det finnes ingen medlemmer med denne interessen";
       } 
       
       $mail = new PHPMailer(true);
       while($row = mysqli_fetch_array($result))
       {
           $email = $row['epost'];
       
        try {

            $mail->SMTPDebug = 1; // debugging: 1 = feil og melding, 2 = kun meldinger                                       
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com;';                    
            $mail->SMTPAuth   = true;                             
            $mail->Username   = 'oski1011@gmail.com';                 
            $mail->Password   = 'Oskar1011';                        
            $mail->SMTPSecure = 'tls';                              
            $mail->Port       = 587;  
          
            

                $mail->SMTPDebug = 2;                                       
                $mail->isSMTP();                                            
                $mail->Host       = 'smtp.gmail.com;';                    
                $mail->SMTPAuth   = true;                             
                $mail->Username   = 'oski1011@gmail.com';                 
                $mail->Password   = 'Oskar1011';                        
                $mail->SMTPSecure = 'tls';                              
                $mail->Port       = 587;  
            
                $mail->setFrom('oski1011@gmail.com', 'Oskar');
               // $mail->AddEmbeddedImage('C:/Xampp/htdocs/IS-115-PHP/Modul 9/default.jpg', "logo");
                
        
                    /* Meldingstekst for HTML-mottakere */
                
                $mld  = "Kjære bruker<br><br>";
                $mld  = '<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley">Bekreft din registrering</a> <br><br>';
                $mld .= "Dette er en test<br><br>";
        
                $footer = "Regards<br/><br/>";
                $footer .= '<table style="width: 95%">';
                $footer .= '<tr>';
                $footer .= '<td>';
                $footer .= "<strong><span style='font-size: 15px'>NamDimes Team</span></strong><br/>
                                NamDimes<br/>
                                Contact Number: 12345678 <br/>
                                Email: Organisasjon@gmail.com <br/>
                                Website: https//:organsiasjon.no<br/>";
                $footer .= '</td>';
                $footer .= '<td style="text-align:right">';
                $footer .= '</td>';
                $footer .= '</tr>';
                $footer .= '</table>';
        
                /* Meldingstekst for de som ikke kan motta HTML-epost */
                $amld  = "Kjære bruker <br><br>";
                $amld .= "Dette er en test<br><br>";
                
                 
                $mail->isHTML(true);
                $mail->FromName = "Ikke svar";
                $mail->addAddress($email);
                $mail->Subject = "Registrering: kun ett steg unna nå!";
                $mail->Body = "<img src=\"cid:logo\" /><br>" . $mld . $footer;
                $mail->AltBody = $amld;
                echo "E-post er sendt<br>";
                } catch(Exception $e) {
                echo "Noe gikk galt: " . $e->getMessage();
                }
            }
            $mail->send();
            } 
       
       
                       
            
    //Hvis knappen "kontigentStatus" er valgt så vil medlemmer bli sortert etter den valgte kontigentstatusen.     
    if (isset($_REQUEST["kontigentStatus"])) {
        $Kontstat = $_REQUEST['KontigentStatus'];

        $result = mysqli_query($conn, "SELECT medlemID, epost FROM Medlemmer WHERE kontigentStatus = '$Kontstat'");
    
        if($result->num_rows == 0) {
            echo "Det finnes ingen medlemmer med denne kontigentStatus";
       } 
       
       $mail = new PHPMailer(true);
       while($row = mysqli_fetch_array($result))
       {
           $email = $row['epost'];
       
        try {

            $mail->SMTPDebug = 1; // debugging: 1 = feil og melding, 2 = kun meldinger                                       
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com;';                    
            $mail->SMTPAuth   = true;                             
            $mail->Username   = 'oski1011@gmail.com';                 
            $mail->Password   = 'Oskar1011';                        
            $mail->SMTPSecure = 'tls';                              
            $mail->Port       = 587;  
          
            

                $mail->SMTPDebug = 2;                                       
                $mail->isSMTP();                                            
                $mail->Host       = 'smtp.gmail.com;';                    
                $mail->SMTPAuth   = true;                             
                $mail->Username   = 'oski1011@gmail.com';                 
                $mail->Password   = 'Oskar1011';                        
                $mail->SMTPSecure = 'tls';                              
                $mail->Port       = 587;  
            
                $mail->setFrom('oski1011@gmail.com', 'Oskar');
               // $mail->AddEmbeddedImage('C:/Xampp/htdocs/IS-115-PHP/Modul 9/default.jpg', "logo");
                
        
                    /* Meldingstekst for HTML-mottakere */
                
                $mld  = "Kjære bruker<br><br>";
                $mld  = '<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley">Bekreft din registrering</a> <br><br>';
                $mld .= "Dette er en test<br><br>";
        
                $footer = "Regards<br/><br/>";
                $footer .= '<table style="width: 95%">';
                $footer .= '<tr>';
                $footer .= '<td>';
                $footer .= "<strong><span style='font-size: 15px'>NamDimes Team</span></strong><br/>
                                NamDimes<br/>
                                Contact Number: 12345678 <br/>
                                Email: Organisasjon@gmail.com <br/>
                                Website: https//:organsiasjon.no<br/>";
                $footer .= '</td>';
                $footer .= '<td style="text-align:right">';
                $footer .= '</td>';
                $footer .= '</tr>';
                $footer .= '</table>';
        
                /* Meldingstekst for de som ikke kan motta HTML-epost */
                $amld  = "Kjære bruker <br><br>";
                $amld .= "Dette er en test<br><br>";
                
                 
                $mail->isHTML(true);
                $mail->FromName = "Ikke svar";
                $mail->addAddress($email);
                $mail->Subject = "Registrering: kun ett steg unna nå!";
                $mail->Body = "<img src=\"cid:logo\" /><br>" . $mld . $footer;
                $mail->AltBody = $amld;
                echo "E-post er sendt<br>";
                } catch(Exception $e) {
                echo "Noe gikk galt: " . $e->getMessage();
                }
            }
            $mail->send();
            }     
                
            
    ?>


<form method="post">
        <h1>Send mail utifra interesse</h1>
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


        <h1>Send mail utifra kontigentstatus</h1>
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
<br><br><a href="eksisterendebrukere.php">Tilbake</a>