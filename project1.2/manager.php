<!DOCTYPE html>
<html lang="en">

<?php 
include ('menu.php');
    ?>

  <body>


    <!-- Page Content -->
    <div class="container">
        <?php

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
    <br>
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



  </body>

</html>
