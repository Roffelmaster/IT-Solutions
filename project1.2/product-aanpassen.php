<?php

include 'menu.php';
?>
<!DOCTYPE html>
<html lang="en">
<?php
/*
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
*/?>
    <!-- Page Content -->
    <div class="container">


<?php

if($_SESSION['permissie'] != 2){
echo "je hebt hier geen rechten voor" ;
}else{

$id = $_GET['idproduct'];
?>
<body>
    <div align="center">
    <?php


$query = "SELECT * FROM product WHERE idproduct='" .$_GET["idproduct"] ."'";
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
$productnaam = $row["naam"];
$omschrijving = $row["beschrijving"];
$prijs = $row["prijs"];
$image = $row["afbeelding"];
}}

    ?>

        <h3>Let op: Deze gegevens wijzigen?</h3>
<form action="product-aanpassen2.php" method="post">
<input type="hidden" name="confirmation" value="1">
<input type="hidden" name="idproduct" value="<?php echo $id;?>">



    <table>
<input type="hidden" name ="id" id="id" value='<?php echo "$id"?> '>
<tr><td>Productnaam:</td><td><input type="text" name="naam" value="<?php echo($productnaam);?>"
size="30"></td></tr>
<tr><td>Omschrijving:</td><td><input type="text" name="beschrijving" value="<?php
echo($omschrijving);?>" size="30"></td></tr>
<tr><td>prijs: </td><td><input type="text" name="prijs" value="<?php
echo($prijs);?>" size="30"></td></tr>

</table>
<hr>
<input type="Submit" value="Wijzigen" >
<input type="reset" value="Leegmaken">
<input type="Button" value="Nee, terug" onclick="javascript:history.back();">
    </form>
    </div>

    </body>
    <?php
}
     ?>
</html>

    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
-->
  </body>

</html>
