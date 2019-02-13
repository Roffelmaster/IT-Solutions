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

   
  </body>

</html>
