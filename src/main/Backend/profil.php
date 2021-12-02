<?php
    session_start();
    
    if(isset($_SESSION["brukernavn"]) !== true) {
        header("Location: logginn.php");
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
        header("Location: logginn.php");
        exit();
    }
?>

<head>
    <meta charset="UTF-8">
    <title>Admin Panel css html</title>

</head>

<body>

    <div id="container">

        <div class="content">
            <h1>Dashboard</h1>
            <p>Here you can do stuff</p>

            <div id="box">
                <div class="box-top">Registrer ny bruker</div>
                <div class="box-panel"><a href="registrerBruker.php">Ny bruker</a></div>
            </div>

            <div id="box">
                <div class="box-top">Se eksisterende brukere</div>
                <div class="box-panel"><a href="eksisterendeBrukere.php">Alle brukere</a></div>
            </div>


            <div id="box">
                <div class="box-top">Aktiviteter</div>
                <div class="box-panel"><a href="kursaktiviteter.php">Aktiviteter</a></div>
            </div>


        </div>

    </div>
    
    <style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html,body {
  font-family: 'Open Sans';
  height: 100%;
}


div#header {
  width: 100%;
  height: 8%;
  background-color: #2c3e50; 
  margin: 0 auto;
}

.logo{
  float: left;
  margin-top: .2ex; 
  margin-left: 10px;
}

.logo a {
  font-size: 1.6em;
  color: #fff;
}

.logo a span {
  font-weight: 300;
}

div#container {
  height: 92%;
  width: 100%;
  margin: 0 auto;
}

.content {
  width: auto;
  height: 100%;
  background: #95a5a6;
  margin-left: 250px;
  padding: 15px;
}

.content p {
  color: #424242;
  font-size: 0.8em;
}

div#box {
  margin-top: 15px;
}

div#box .box-top {
  color: #fff;
  text-shadow: 0 1px #000;
  background: #2980b9;
  padding: 5px;
  padding-left: 15px;
  font-weight: 300;
} 

div#box .box-panel {
  padding: 15px;
  background: #fff;
  color: #333;
}



@media only screen and (max-width: 480px) {

  a.mobile {
    display: block;
    color: #fff;
    background: #000;
    text-align: center;
    padding: 7px; 
    cursor: pointer;
  }

  a.mobile:active{
    background: #474747;
  }


  .sidebar {
    width: 100%;
    display: none;
    height: auto;
  }

  .content {
    margin-left: 0;
  }


}



@media only screen and (min-width: 480px) {
  .sidebar {
    height: 92%;
    left: 0;
    display: block;
    position: absolute;
  }
  a.mobile {
    display: none;
  }
}
    </style>


</body>


    
<form action ="<?php echo $_SERVER['PHP_SELF'];?>" method="request">
<input type="submit" name="loggut" value="Logg Ut">
</form>