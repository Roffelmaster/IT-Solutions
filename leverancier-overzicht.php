<html>

    <head>
    <meta charset="UTF-8">
    <title>Phone Planet</title>
         <link rel="stylesheet" type="text/css" href="home.css">
    </head>  
    
<?php

include 'database.php';
    
// Test of de verbinding werkt!
if (mysqli_connect_errno()) {
die("De verbinding met de database is mislukt: " .
mysqli_connect_error() . " (" .
mysqli_connect_errno() . ")" );
}

    
    
$query = "SELECT * FROM leverancier";
$result = mysqli_query($db, $query) or die('Error querying
database.');
    
 
    
// het tonen van de gegevens
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$row['naam']."</td><br>";
     echo "<td>".$row['address']."</td><br>";
     echo "<td>€".$row['telefoonnummer']."</td><br>";
    echo "<td>".$row['rekeningnummer']."</td><br>";
    
     echo ("<br<td> <a href=\"leverancier-aanpassen.php?leverancier=".$row['idleverancier']."\">
Wijzig</a>");
    echo (" <a href=\"leverancier-verwijderen.php?leverancier=".$row["idleverancier"]."\">
Verwijder</a><br>");
     
    
    }
           
       ; 
    echo "</tr>";
        

 mysqli_free_result($result);
 mysqli_close($db);   
    
?>
</html>