<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IT-Solutions</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/logo-nav.css" rel="stylesheet">

  </head>

  <body>
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <img src="images/logo.jpg" width="150" height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="product-toevoegen.php">product toevoegen</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="product-overzicht.php">Producten</a>
            </li>
              <li class="nav-item">
              <a class="nav-link" href="leverancier-overzicht.php">leveranciers</a>
            </li>
               <li class="nav-item">
              <a class="nav-link" href="leverancier-toevoegen.php">leverancier toevoegen</a>
              </li>
                    <li class="nav-item">
              <a class="nav-link" href="bestelling_lijst.php">Bestelling lijst</a>
            </li>
              <li class="nav-item">
              <a class="nav-link" href="factuur.php">Goedkeuring Factuur</a>
            </li>
              <li class="nav-item">
              <a class="nav-link" href="factuur_lijst.php">Facturenlijst</a>
            </li>
               <li class="nav-item">
              <a class="nav-link" href="logistiek.php">logistiek</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="frm_login.php">login</a>
            </li>
              <li class="nav-item">
              <a class="nav-link" href="logout.php">Uitloggen</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Page Content -->
    <div class="container">
     <?php
session_start(); // sessie beginnen
include ('database.php');
// controleren of pagina correct is aangeroepen.
if (!empty($_POST)){

	$gebruiker = mysqli_real_escape_string($db, $_POST['naam']);
    
	$wachtwoord = mysqli_real_escape_string($db, $_POST['wachtwoord']);
	$query = 	"SELECT * FROM werknemer
				WHERE naam ='" . $_POST["naam"] ."'
				AND wachtwoord='" . $_POST["wachtwoord"] ."'";
	$result = mysqli_query($db, $query) or die("FOUT : " . mysqli_error());

	if (mysqli_num_rows($result) > 0){
        // gebruikersnaam gevonden, registreer gegevens in session
				$_SESSION["auth"]=true; //auth controleert of een klant is ingelogd
				$_SESSION["timeout"]=time() + 120;
                header("Location:index.html");
				$_SESSION["gebruiker"]=$gebruiker;


    while($row = mysqli_fetch_assoc($result)) {
      $_SESSION["permissie"] = $row['permissie'];
    $_SESSION["id"] = $row['idwerknemer'];
	}
		// Doorsturen naar beveiligde pagina


}else{
	// geen e-mail adres gevonden, of ongeldig wachtwoord.
  	$tekst = "<br><br>U hebt geen geldige combinatie van e-mailadres en wachtwoord opgegeven.<br>
	Maak een keuze: <br>
	<a href=\"frm_login.php\">Opnieuw inloggen</a><br>
    <a href=\"index.html\">Naar homepage</a><br>";
			die($tekst);
		}
}else{
	// pagina was incorrect aangeroepen, direct doorsturen naar login.php
	header("Location:index.html");
}

?>
    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
