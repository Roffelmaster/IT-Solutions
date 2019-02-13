<!DOCTYPE html>
<html lang="en">
<?php 
include ('menu.php');
    ?>

  <body>

      <?php

if($_SESSION['permissie'] != 4){
echo "je hebt hier geen rechten voor" ;
}else{
?>
    <div class="container">
        <h1 class="mt-5">Status bestelling</h1><hr>
      <p>wijzig hier de status van een bestelling.</p>
     <form action="logistiek.php"
          method="post"
          enctype="multipart/form-data">


      <p>

          <label for="bestellingid">bestelling:</label><br>
          <input type="text"
                   placeholder="voer in bestellingid"
                   name="bestellingid" id="bestellingid"
                   required>
        </p>
           <p>

             <select name="status">
     <option value="verwacht">afwachting</option>
     <option value="bezorgd">bezorgd</option>
     <option value="afgeleverd">afgeleverd</option>
   </select>


        <button name="status-veranderen"> verander de status van bestelling</button>

    </form>
    </div>
        <?php


  // Initialize message variable
  $msg = "bestelling is veranderd";

  // If upload button is clicked ...
  if (isset($_POST ['status-veranderen'])) {
    $bestellingid = mysqli_real_escape_string($db, $_POST['bestellingid']);
  	$status = mysqli_real_escape_string($db, $_POST['status']);


  	$sql = "UPDATE bestelling SET status = '$status' WHERE idbestelling = '$bestellingid'";
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
