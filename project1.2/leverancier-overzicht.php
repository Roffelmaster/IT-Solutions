<!DOCTYPE html>
<html lang="en">

<?php 
include ('menu.php');
    ?>
  <body>


    <!-- Page Content -->
    <div class="container">
        <h1 class="mt-5">Leveranciers</h1><hr>
      <p>Hier vind u al de nodige informatie over onze leveranciers.</p>
     <?php
echo"<br>";


// Test of de verbinding werkt!
if (mysqli_connect_errno()) {
die("De verbinding met de database is mislukt: " .
mysqli_connect_error() . " (" .
mysqli_connect_errno() . ")" );
}



$query = "SELECT * FROM leverancier";
$result = mysqli_query($db, $query) or die('Error querying
database.');


$nummer  = 1;
// het tonen van de gegevens
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "Leverancier: $nummer";
    $nummer++;
    echo "</br>";
    echo "<td>"."Naam: ".$row['naam']."</td><br>";
     echo "<td>"."Adres: ".$row['address']."</td><br>";
     echo "<td>"."Telefoonnummer: ".$row['telefoonnummer']."</td><br>";
    echo "<td>"."Rekeningnummer: ".$row['rekeningnummer']."</td><br>";


    echo ("<br<td> <a href=\"leverancier-aanpassen.php?idleverancier=".$row['idleverancier']."\">
Wijzig</a>");
    //afdeling die leveranciers mag wijzigen mag alleen dit zien.
    echo (" <a href=\"leverancier-verwijderen.php?idleverancier=".$row["idleverancier"]."\">
Verwijder</a><br>");
echo "</br>";
    }

       ;
    echo "</tr>";


 mysqli_free_result($result);
 mysqli_close($db);

?>
</html>
    </div>
    <!-- /.container -->



  </body>

</html>
