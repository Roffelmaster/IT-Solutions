<!DOCTYPE html>
<html lang="en">
<?php 
include ('menu.php');
    ?>

  <body>


    <!-- Page Content -->
    <div class="container">
         <h1 class="mt-5">factuur goedkeruing</h1><hr>
      <p>keur hier de facturen zonodig goed.</p>
     <?php

if ($_SESSION['permissie'] != 5){
echo "je hebt hier geen rechten voor" ;
} elseif ($_SESSION['permissie'] != 6) {
echo "je hebt hier geen rechten voor" ;

}else{
        ?>
    <form action="factuur.php"
          method="post"
          enctype="multipart/form-data">


      <p>

          <label for="factuurid">factuur:</label><br>
          <input type="text"
                   placeholder="voer in factuurid"
                   name="factuurid" id="factuurid"
                   required>
        </p>
           <p>

<br>
          <select name="taskOption">
  <option value="goedkeuring">afwachting</option>
  <option value="betaald">betaald</option>
</select>


        <button name="status-veranderen"> verander de status van factuur</button>

    </form>
    </div>
        <?php


  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST ['status-veranderen'])) {
    $factuurid = mysqli_real_escape_string($db, $_POST['factuurid']);
  	$status = mysqli_real_escape_string($db, $_POST['taskOption']);


  	$sql = "UPDATE factuur SET status = '$status' WHERE idfactuur = '$factuurid'";
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
