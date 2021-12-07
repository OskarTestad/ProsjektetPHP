<?php
  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
  
require 'C:/Xampp/htdocs/Prosjektet/ProsjektPHP/src/main/Backend/vendor/autoload.php';  
$mail = new PHPMailer(true);

if(isset($_POST['submit'])){

try {
    $mail->SMTPDebug = 1; // debugging: 1 = feil og melding, 2 = kun meldinger                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com;';                    
    $mail->SMTPAuth   = true;                             
    $mail->Username   = 'oski1011@gmail.com';                 
    $mail->Password   = 'Oskar1011';                        
    $mail->SMTPSecure = 'tls';                              
    $mail->Port       = 587;  
  
    $fnavn = $_POST['fornavn'];
    $enavn = $_POST['etternavn']; 
    $epost = $_POST['epost']; 
    $kontstat = $_POST['kontigentStatus'];
    $melding = $_POST['melding']; 
    

        $mail->SMTPDebug = 2;                                       
        $mail->isSMTP();                                            
        $mail->Host       = 'smtp.gmail.com;';                    
        $mail->SMTPAuth   = true;                             
        $mail->Username   = 'oski1011@gmail.com';                 
        $mail->Password   = 'Oskar1011';                        
        $mail->SMTPSecure = 'tls';                              
        $mail->Port       = 587;  
    
        $mail->setFrom('oski1011@gmail.com', 'Oskar');
        $mail->AddEmbeddedImage('C:/Xampp/htdocs/IS-115-PHP/Modul 9/default.jpg', "logo");
        

            /* Meldingstekst for HTML-mottakere */
        
        $mld  = "Kjære " . $fnavn . ". <br><br>";
        $mld  = '<a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&ab_channel=RickAstley">Bekreft din registrering</a> <br><br>';
        $mld .= $melding . "<br><br>";

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
        $amld  = "Kjære " . $fnavn . ". <br><br>";
        $amld .= $melding . "<br><br>";
        

        $mail->isHTML(true);
        $mail->FromName = "Ikke svar";
        $mail->addAddress($epost, $fnavn . " " . $enavn);
        $mail->Subject = "Registrering: kun ett steg unna nå!";
        $mail->Body = "<img src=\"cid:logo\" /><br>" . $mld . $footer;
        $mail->AltBody = $amld;
        $mail->send();

        echo "E-post er sendt";
        } catch(Exception $e) {
        echo "Noe gikk galt: " . $e->getMessage();
        }
    
        
    }
?>