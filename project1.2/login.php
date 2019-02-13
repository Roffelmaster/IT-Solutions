<!DOCTYPE html>
<html lang="en">

<?php 
include ('menu.php');
    ?>
  <body>

    <!-- Page Content -->
    <div class="container">
     <?php

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
                header("Location:index.php");
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
    <a href=\"index.php\">Naar homepage</a><br>";
			die($tekst);
		}
}else{
	// pagina was incorrect aangeroepen, direct doorsturen naar login.php
	header("Location:index.php");
}

?>
    </div>
    <!-- /.container -->

  </body>

</html>
