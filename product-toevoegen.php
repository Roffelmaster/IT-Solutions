<?php
session_start();
include 'database.php';

?>

<html>

    <head>
    <meta charset="UTF-8">
    <title>Phone Planet</title>
    <link rel="stylesheet" type="text/css" href="home.css">


    <div id = 'content'>

    <form action="product-toevoegen.php"
          method="post"
          enctype="multipart/form-data">


      <p>

          <label for="naam">Product:</label><br>



          <input type="text"
                   placeholder="voer in naam"
                   name="naam" id="naam"
                   required>
        </p>
        <p>

            <label for="omschrijving">Omschrijving:</label><br>

            <textarea type="text" rows="1" cols="60"
                      placeholder="geef een omschrijving"
                      name="beschrijving" id="beschrijving"
                      required></textarea>



        </p>
        <p>
            <label for="prijs"> Prijs:</label><br>
            <input type="number"
                   placeholder="voer een prijs in"
                   name="prijs" id="prijs"
                   required>
        </p>
        <p>
            <label for="foto"> Voeg een foto toe</label>
            <input type="file"
                   name="afbeelding" id="afbeelding">
            <br>

        <?php
        echo "leverancier:<br>";
       $sql1 = "SELECT * FROM leverancier";
        $result1 = mysqli_query($db, $sql1);
            
            echo "<select name='leveranciersid'>";
            while ($row1 = mysqli_fetch_array($result1)) {
                echo "<option value='" . $row1['idleverancier'] . "'>" . $row1['naam'] . "</option>";

            }

           
           

                echo "</select>";




        ?>
        </p>
        

        <button name="product-toevoegen-submit"> Voeg het product toe</button>

    </form>
    </div>
        <?php


  // Initialize message variable
  $msg = "";

  // If upload button is clicked ...
  if (isset($_POST ['product-toevoegen-submit'])) {
    $productnaam = mysqli_real_escape_string($db, $_POST['naam']);
  	$omschrijving = mysqli_real_escape_string($db, $_POST['beschrijving']);
    $prijs = mysqli_real_escape_string($db, $_POST['prijs']);
  	$image = $_FILES['afbeelding']['name'];
      $leveranciersid = mysqli_real_escape_string($db,$_POST['leveranciersid']);
  	// image file directory
  	$target = "images/".basename($image);

  	$sql = "INSERT INTO product (naam, prijs, beschrijving, afbeelding,leverancier_idleverancier)
    VALUES ('$productnaam', '$prijs','$omschrijving',  '$image',$leveranciersid)";
  	// execute query
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($_FILES['afbeelding']['tmp_name'], $target)) {
  		$msg = "Product is toegevoegd!";
  	}else{
  		$msg = "Product kon niet toegevoegd worden!";

  	}
      echo $msg;

  }

?>

    </body>

</html>
