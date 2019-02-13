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
session_start();
include 'database.php';
if($_SESSION['permissie'] != 5){
echo "je hebt hier geen rechten voor" ;
}else{
?>

<html>

    <head>
    <meta charset="UTF-8">
    <title>IT-solutions</title>
    <link rel="stylesheet" type="text/css" href="home.css">


    <div id = 'content'>

    <form action="manager.php"
          method="post"
          enctype="multipart/form-data">

<p>
        </p>
      <p>
          <select name="factuurid">
<?php
            $query = "SELECT * FROM factuur";
$result2 = mysqli_query($db, $query) or die('Error querying
database.');
while($row = mysqli_fetch_array($result2)) {
  ?>
                       
                       <option value="<?php echo $row['idfactuur'] ?>"> <?php echo "ID_FACTUUR:  ". $row['idfactuur'] .
      " |    STATUS :  ".$row['status']."   |   BESTELLING_ID:  ". $row['bestelling_idbestelling'] ?> </option>
<?php
                       }

    ?>
     
     
   </select>
        </p> 
          
          <!--
          <label for="factuurid">factuur:</label><br>
          <input type="text"
                   placeholder="voer in factuurid"
                   name="factuurid" id="factuurid"
                   required>
        </p>
-->
           <p>


          <select name="taskOption">
  <option value="factuur afgewezen">Afwijzen</option>
  <option value="factuur goedgekeurd">Accepteren</option>
</select>


        <button name="status-veranderen"> verander de status van factuur</button>

    </form>
    </div>
        <?php


  // Initialize message variable
  $msg = "factuur is veranderd";

  // If upload button is clicked ...
  if (isset($_POST ['status-veranderen'])) {
    $factuurid = mysqli_real_escape_string($db, $_POST['factuurid']);
  	$status = mysqli_real_escape_string($db, $_POST['taskOption']);


  	$sql = "UPDATE factuur SET status = '$status' WHERE idfactuur = '$factuurid'";
  	// execute query
  	mysqli_query($db, $sql) or die('Error querying
    database.');

  }
?>

    <form action="manager.php"
          method="post"
          enctype="multipart/form-data">


      <p>
     <!--     
          <label for="bestellingid">bestelling:</label><br>
          <input type="text"
                   placeholder="voer in bestellingid"
                   name="bestellingid" id="bestellingid"
                   required>
          -->
                   <select name="bestellingid">
            <?php
    if (mysqli_connect_errno()) {
die("De verbinding met de database is mislukt: " .
mysqli_connect_error() . " (" .
mysqli_connect_errno() . ")" );
    }
        $query = "SELECT * FROM bestelling";
$result = mysqli_query($db, $query) or die('Error querying
database.');
while($row = mysqli_fetch_array($result)) {
  ?>
                       
                       <option value="<?php echo $row['idbestelling'] ?>"> <?php echo "ID_BESTELLING:  ". $row['idbestelling'] .
      " |    STATUS :  ".$row['status']."   |   PRODUCT_ID:  ". $row['product_idproduct']."| AANTAL:  ". $row['aantal'] ?> </option>
<?php
                       }

    ?>
     
     
   </select>
        </p>
           <p>

             <select name="status_bestelling">
     <option value="In afwachting">afwachting </option>
     <option value="Geaccepteerd">Accepteren</option>
    <option value="Afgewezen">Afwijzen</option>
   </select>


        <button name="status-veranderend"> Verander de status van bestelling</button>

    </form>
    </div>
        <?php


  // Initialize message variable
  $msg = "bestelling is veranderd";

  // If upload button is clicked ...
  if (isset($_POST ['status-veranderend'])) {
    $bestellingid = mysqli_real_escape_string($db, $_POST['bestellingid']);
  	$status1 = mysqli_real_escape_string($db, $_POST['status_bestelling']);


  	$sql = "UPDATE bestelling SET status = '$status1' WHERE idbestelling = '$bestellingid'";
  	// execute query
  	mysqli_query($db, $sql) or die('Error querying
    database.');

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

