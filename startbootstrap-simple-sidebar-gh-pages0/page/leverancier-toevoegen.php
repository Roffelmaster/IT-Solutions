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

    <form action="leverancier-toevoegen.php"
          method="post"
          enctype="multipart/form-data">


      <p>

          <label for="naam">leverancier:</label><br>
          <input type="text"
                   placeholder="voer in naam"
                   name="naam" id="naam"
                   required>
        </p>
           <p>

          <label for="address">address:</label><br>
          <input type="text"
                   placeholder="voer address in"
                   name="address" id="address"
                   required>
        </p>
           <p>

          <label for="naam">telefoonnummer:</label><br>
          <input type="text"
                   placeholder="voer telefoonnummer in"
                   name="telefoonnummer" id="telefoonnummer"
                   required>
        </p>
           <p>

          <label for="naam">rekeningnummer:</label><br>
          <input type="text"
                   placeholder="voer rekeningnummer in"
                   name="rekeningnummer" id="rekeningnummer"
                   required>
        </p>


        <button name="leverancier-toevoegen-submit"> Voeg de leverancier toe</button>

    </form>
    </div>
        <?php


  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST ['leverancier-toevoegen-submit'])) {
    $naam = mysqli_real_escape_string($db, $_POST['naam']);
  	$address = mysqli_real_escape_string($db, $_POST['address']);
    $telefoonnummer = mysqli_real_escape_string($db, $_POST['telefoonnummer']);
    $rekeningnummer = mysqli_real_escape_string($db, $_POST['rekeningnummer']);

  	$sql = "INSERT INTO leverancier (naam, address, telefoonnummer, rekeningnummer)
    VALUES ('$naam', '$address','$telefoonnummer', '$rekeningnummer')";
  	// execute query
  	mysqli_query($db, $sql);

  }

?>
    </head>

</html>
