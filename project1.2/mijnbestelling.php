<?php



include 'menu.php';
?>
<!DOCTYPE html>
<html lang="en">


    <!-- Page Content -->
    <div class="container">
         <h1 class="mt-5">Bestellingen</h1><hr>
      <p>Op deze pagina vind u de lijst met geplaatste bestellingen.</p>
     <?php



if($_SESSION['permissie'] != 1){
echo "Dit is alleen voor werknemers" ;
}

else{

if (mysqli_connect_errno()) {
die("De verbinding met de database is mislukt: " .
mysqli_connect_error() . " (" .
mysqli_connect_errno() . ")" );
}
$id = $_SESSION["id"];

$query = "SELECT * FROM bestelling WHERE werknemer_idwerknemer ='$id' ;";

$result = mysqli_query($db, $query) or die('Error querying
database.');




while($row = mysqli_fetch_array($result)) {

    echo "<tr>";
    echo "<td>"."ID : ".$row['idbestelling']."</td><br>";
    echo "<td>"."product:".$row['product_idproduct']."</td><br>";
    echo "<td>"."werknemer:".$row['werknemer_idwerknemer']."</td><br>";
    echo "<td>"."status: ".$row['status']."</td><br>";
    echo "</br>";
  }

  ;
  echo "</tr>";
}
 ?>
    </div>
    <!-- /.container -->

    <div class="container">
        <h1 class="mt-5">Status bestelling</h1><hr>
      <p>wijzig hier de status van een bestelling.</p>
     <form action="mijnbestelling.php"
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
     <option value="incompleet">incompleet</option>
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

  </body>

</html>
