<?php
   session_start();
    
   if(isset($_SESSION["brukernavn"]) !== true) {
       header("Location: index.php");
       exit();
   } else {
       echo '<div id="header">';
       echo '<div class="logo">';
       echo '<h1>Velkommen  <span></span>' . $_SESSION["brukernavn"] . '</h1>';
       echo '</div>';
       echo '</div>';
   }
   if (isset($_REQUEST['loggut'])) {
       session_start();
       session_unset();
       session_destroy();
       header("Location: index.php");
       exit();
   }
   include "../View/htmlprofil.html";
?>


<style>
<?php 
include "../View/ForsideStyle.css"; ?>
</style>

                


  
<form action ="

<?php /*Logut knappen*/ echo $_SERVER['PHP_SELF'];?>

" method="request"><input type="submit" name="loggut" value="Logg Ut">

</form>