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
<?php
session_start();
include 'database.php';
if($_SESSION['permissie'] != 2){
echo "je hebt hier geen rechten voor" ;
}else{
 ?>
    <div class="container">
         <form action="product-toevoegen.php"
          method="post"
          enctype="multipart/form-data">
             <h1 class="mt-5">Product toevoegen</h1><hr>
      <p>Via deze pagina kunt u producten toevoegen, vul hiervoor de volgende velden in: </p>


      <p><br>

          <label for="naam">Product:</label><br>



          <input type="text"
                   placeholder="voer in naam"
                   name="naam" id="naam"
                   required>
        </p>
        <p>

            <label for="omschrijving">Omschrijving:</label><br>

            <textarea type="text" rows="1" cols="60"
                      placeholder="geef een omschrijving"
                      name="beschrijving" id="beschrijving"
                      required></textarea>



        </p>
        <p>
            <label for="prijs"> Prijs:</label><br>
            <input type="number"
                   placeholder="voer een prijs in"
                   name="prijs" id="prijs"
                   required>
        </p>
        <p>
            <label for="foto"> Voeg een foto toe</label>
            <input type="file"
                   name="afbeelding" id="afbeelding">
            <br>

        <?php
        echo "leverancier:<br>";
       $sql1 = "SELECT * FROM leverancier";
        $result1 = mysqli_query($db, $sql1);

            echo "<select name='leveranciersid'>";
            while ($row1 = mysqli_fetch_array($result1)) {
                echo "<option value='" . $row1['idleverancier'] . "'>" . $row1['naam'] . "</option>";

            }




                echo "</select>";




        ?>
        </p>


        <button name="product-toevoegen-submit"> Voeg het product toe</button>

    </form>
    </div>
        <?php


  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST ['product-toevoegen-submit'])) {
    $productnaam = mysqli_real_escape_string($db, $_POST['naam']);
  	$omschrijving = mysqli_real_escape_string($db, $_POST['beschrijving']);
    $prijs = mysqli_real_escape_string($db, $_POST['prijs']);
  	$image = $_FILES['afbeelding']['name'];
      $leveranciersid = mysqli_real_escape_string($db,$_POST['leveranciersid']);
  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO product (naam, prijs, beschrijving, afbeelding,leverancier_idleverancier)
    VALUES ('$productnaam', '$prijs','$omschrijving',  '$image',$leveranciersid)";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['afbeelding']['tmp_name'], $target)) {
  		$msg = "Product is toegevoegd!";
  	}else{
  		$msg = "Product kon niet toegevoegd worden!";

  	}
      echo $msg;

  }
}
?>
      </div>


    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
