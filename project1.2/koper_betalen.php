<!DOCTYPE html>
<html lang="en">

<?php 
include ('menu.php');
    ?>


  <body>

    <!-- Page Content -->
    <div class="container">
         <h1 class="mt-5">Bestellingen (KOPER) </h1><hr>
      <p> </p>
     <?php


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

  </body>

</html>
