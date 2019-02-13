
<!DOCTYPE html>
<html lang="en">

  <?php 
include ('menu.php');
    ?>

  <body>

 

    <!-- Page Content -->
    <div class="container">
        <h1 class="mt-5">facturen</h1><hr>
      <p>Op deze pagina vind u de lijst met de facturen.</p>

<?php

if($_SESSION['permissie'] == 1){
echo "je hebt hier geen rechten voor 1" ;
}
elseif ($_SESSION['permissie'] == 2){
echo "je hebt hier geen rechten voor 2" ;
}
elseif ($_SESSION['permissie'] == 3){
echo "je hebt hier geen rechten voor 6" ;
}
elseif ($_SESSION['permissie'] == 4){
echo "je hebt hier geen rechten voor 6" ;
}
else{

if (mysqli_connect_errno()) {
die("De verbinding met de database is mislukt: " .
mysqli_connect_error() . " (" .
mysqli_connect_errno() . ")" );
}

$query = "SELECT * FROM factuur";
$result = mysqli_query($db, $query) or die('Error querying
database.');

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>"."factuurid:".$row['idfactuur']."</td><br>";
    echo "<td>"."bestellingid:".$row['bestelling_idbestelling']."</td><br>";
    echo "<td>"."status:".$row['status']."</td><br>";

  }

  ;
  echo "</tr>";
}
 ?>
    </div>
    <!-- /.container -->



  </body>

</html>
