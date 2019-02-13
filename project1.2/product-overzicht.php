<?php


include 'menu.php';
?>
<!DOCTYPE html>
<html lang="en">

  

    <!-- Page Content -->
    <div class="container">
        <h1 class="mt-5">Producten Overzicht</h1><hr>

<html>
<div align="center">
<?php

if(($_SESSION['permissie'] != 1) &&($_SESSION['permissie'] != 2)){
echo "je hebt hier geen rechten voor" ;
}else{

// Test of de verbinding werkt!
if (mysqli_connect_errno()) {
die("De verbinding met de database is mislukt: " .
mysqli_connect_error() . " (" .
mysqli_connect_errno() . ")" );
}



$query = "SELECT * FROM product";
$result = mysqli_query($db, $query) or die('Error querying
database.');



// het tonen van de gegevens
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".'<img src="images/'. $row['afbeelding'] .'"height="250" width="250"/>'. "</td><br>";
     echo "<td>"."Product Naam: ".$row['naam']."</td><br>";
     echo "<td>"."Prijs: €".$row['prijs']."</td><br>";
    echo "<td>"."Beschrijving: ".$row['beschrijving']."</td><br>";
    if($_SESSION['permissie'] == 1){
    echo '<button style="border-radius: 12px;" >';
    echo "<a href=\"cart.php?&action=add&id=" .$row['idproduct'].'"style="color:black;""'. "\">Add to cart</a>";
    echo "</button>";
    }
    // Hier komt permission
    if($_SESSION['permissie'] == 2){
    echo '<button style="border-radius: 12px;">';
     echo ("<br<td> <a href=\"product-aanpassen.php?idproduct=".$row['idproduct'].'"style="color:black;""'."\">
Wijzig</a>");
    echo "</button>";
    echo '<button style="border-radius: 12px;" >';
    echo (" <a href=\"product-verwijderen.php?idproduct=".$row["idproduct"].'"style="color:black;""'."\">
Verwijder</a>");
    echo "</button>";
    }
   echo "<br>";
    
echo "</tr>";
    }

       
    


 mysqli_free_result($result);
 mysqli_close($db);

?>
    </div>
    <?php
}
     ?>
</html>
    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
   

  </body>

</html>
