<?php
session_start();
include 'database.php';
include 'layout_nav.php';
?>

<html>

    <head>
    <meta charset="UTF-8">
    <title>IT-solutions</title>
    <link rel="stylesheet" type="text/css" href="home.css">


    <div id = 'content'>

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
?>
    </head>

</html>
