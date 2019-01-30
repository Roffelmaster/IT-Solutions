<?php
session_start();
include 'database.php';
?>

<html>

    <head>
    <meta charset="UTF-8">
    <title>IT-solutions</title>
    <link rel="stylesheet" type="text/css" href="home.css">


    <div id = 'content'>

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
?>
    </head>

</html>
