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
         <h1 class="mt-5">Bestellingen (KOPER) </h1><hr>
      <p> </p>
     <?php

session_start();
include 'database.php';
if($_SESSION['permissie'] == 1){
echo "je hebt hier geen rechten voor 1" ;
}
elseif ($_SESSION['permissie'] == 2){
echo "je hebt hier geen rechten voor 2" ;
}
elseif ($_SESSION['permissie'] == 6){
echo "je hebt hier geen rechten voor 6" ;
}
else{





   ?>
       <form action="koper_betalen.php"
          method="post"
          enctype="multipart/form-data">
        <p>

        <select name="bestellingid">
        <?php
            $query = "SELECT * FROM bestelling";
$result2 = mysqli_query($db, $query) or die('Error querying
database.');
while($row = mysqli_fetch_array($result2)) {
  ?>

                       <option value="<?php echo $row['idbestelling'] ?>"> <?php echo "ID_BESTELLING:  ". $row['idbestelling'] .
      " |    STATUS :  ".$row['status']."   |   PRODUCT_ID:  ". $row['product_idproduct'] ?> </option>
<?php
                       }

    ?>

            </select>

        </p>

              <select name="status_bestelling">
  <option value="Bestelling verwerkt door Koper">Accepteren</option>
  <option value="In afwachting door Koper">Afwachting</option>
</select>


        <button name="status-veranderen"> Status bestelling voltooien</button>

    </form>

      <?php

      // Initialize message variable
  $msg = "bestelling is veranderd";

  // If upload button is clicked ...
  if (isset($_POST ['status-veranderen'])) {

      $bestellingid = mysqli_real_escape_string($db, $_POST['bestellingid']);
  	$status1 = mysqli_real_escape_string($db, $_POST['status_bestelling']);


  	$sql = "UPDATE bestelling SET status = '$status1' WHERE idbestelling = '$bestellingid'";
    $sql3 = "INSERT into factuur (status,bestelling_idbestelling)VALUES('wachtend op goedkeuring','$bestellingid')";
  	// execute query
  	mysqli_query($db, $sql) or die('Error querying
    database.');
      mysqli_query($db, $sql3) or die('Error querying
    database.');

  }


//while($row = mysqli_fetch_array($result)) {

}
//}

?>
    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
