<!DOCTYPE html>
<html lang="en">
<?php 
include ('menu.php');
    ?>

  <body>


    <!-- Page Content -->
    <div class="container">
         <h1 class="mt-5">Bestellingen (KOPER) </h1><hr>
      <p>Op deze pagina staan de goedgekeurde bestellingen die nog doorgevoerd moeten worden</p>
     <?php

if($_SESSION['permissie'] == 1){
echo "je hebt hier geen rechten voor 1" ;
}
elseif ($_SESSION['permissie'] == 2){
echo "je hebt hier geen rechten voor 2" ;
}
elseif ($_SESSION['permissie'] == 6){
echo "je hebt hier geen rechten voor 6" ;
}
else{

if (mysqli_connect_errno()) {
die("De verbinding met de database is mislukt: " .
mysqli_connect_error() . " (" .
mysqli_connect_errno() . ")" );
}

$query = "SELECT * FROM bestelling";
$result = mysqli_query($db, $query) or die('Error querying
database.');
$nummer = 1;
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "</br>";
    echo "Nummer: $nummer";
    echo "</br>";
    echo "<td>"."ID: ".$row['idbestelling']."</td><br>";
    echo "<td>"."PRODUCT ID: ".$row['product_idproduct']."</td><br>";
    echo "<td>"."WERKNEMER ID: ".$row['werknemer_idwerknemer']."</td><br>";
    echo "<td>"."status: ".$row['status']."</td><br>";

    if ($row['status'] == "Geaccepteerd"){

    echo '<button style="border-radius: 12px;">';
     echo ("<br<td> <a href=\"koper_betalen.php?id=".$row['idbestelling'].'"style="color:black;""'."\">
Bestel</a>");
    echo "</button>";

    echo "</br>";
    }
    $nummer++;



  echo "</tr>";
}
    echo "</br>";
}
 ?>
    </div>
    <!-- /.container -->

   

  </body>

</html>
