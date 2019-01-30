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

    <form action="manager.php"
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
  <option value="goedgekeurd">goedgekeurd</option>
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

    <head>
    <meta charset="UTF-8">

    <div id = 'content'>

    <form action="manager.php"
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

             <select name="status_bestelling">
     <option value="verwacht">afwachting</option>
     <option value="goedgekeurd">goedgekeurd</option>
   </select>


        <button name="status-veranderend"> verander de status van bestelling</button>

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
?>
    </head>

</html>
