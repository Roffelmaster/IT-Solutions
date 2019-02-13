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
        <a class="navbar-brand" href="index.php">
          <img src="images/logo.jpg" width="150" height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
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
            <a class="nav-link" href="manager.php">manager</a>
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
session_start();
include 'database.php';
if($_SESSION['permissie'] != 2){
  echo "je hebt hier geen rechten voor" ;
  }else{
?>

<html>
     <h1 class="mt-5">Leverancier toevoegen</h1><hr>
      <p>Via deze pagina kunt u een leverancier toevoegen, vul hiervoor de volgende velden in: </p>

    <form action="leverancier-toevoegen.php"
          method="post"
          enctype="multipart/form-data">


      <p><br>

          <label for="naam">leverancier:</label><br>
          <input type="text"
                   placeholder="voer in naam"
                   name="naam" id="naam"
                   required>
        </p>
           <p>

          <label for="address">address:</label><br>
          <input type="text"
                   placeholder="voer address in"
                   name="address" id="address"
                   required>
        </p>
           <p>

          <label for="naam">telefoonnummer:</label><br>
          <input type="text"
                   placeholder="voer telefoonnummer in"
                   name="telefoonnummer" id="telefoonnummer"
                   required>
        </p>
           <p>

          <label for="naam">rekeningnummer:</label><br>
          <input type="text"
                   placeholder="voer rekeningnummer in"
                   name="rekeningnummer" id="rekeningnummer"
                   required>
        </p>


        <button name="leverancier-toevoegen-submit"> Voeg de leverancier toe</button>

    </form>
    </div>
        <?php


  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST ['leverancier-toevoegen-submit'])) {
    $naam = mysqli_real_escape_string($db, $_POST['naam']);
  	$address = mysqli_real_escape_string($db, $_POST['address']);
    $telefoonnummer = mysqli_real_escape_string($db, $_POST['telefoonnummer']);
    $rekeningnummer = mysqli_real_escape_string($db, $_POST['rekeningnummer']);

  	$sql = "INSERT INTO leverancier (naam, address, telefoonnummer, rekeningnummer)
    VALUES ('$naam', '$address','$telefoonnummer', '$rekeningnummer')";
  	// execute query
  	mysqli_query($db, $sql);

  }
}
?>
    </head>

</html>
    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
