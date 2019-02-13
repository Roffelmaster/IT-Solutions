<!DOCTYPE html>
<html lang="en">
    
<?php 
include ('menu.php');
    ?>
  <body>

    <!-- Page Content -->
    <div class="container">
     <?php
        
if($_SESSION['permissie'] != 2){
  echo "je hebt hier geen rechten voor" ;
  }else{
?>

<html>
     <h1 class="mt-5">Leverancier toevoegen</h1><hr>
      <p>Via deze pagina kunt u een leverancier toevoegen, vul hiervoor de volgende velden in: </p>

    <form action="leverancier-toevoegen.php"
          method="post"
          enctype="multipart/form-data">


      <p><br>

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
}
?>
    </head>

</html>
    </div>
    <!-- /.container -->



  </body>

</html>
