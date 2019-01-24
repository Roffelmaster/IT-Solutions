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

    
    
$query = "SELECT * FROM product";
$result = mysqli_query($db, $query) or die('Error querying
database.');
    
 
    
// het tonen van de gegevens
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>".$row['naam']."</td><br>";
    echo "<td>".'<img src="images/'. $row['afbeelding'] .'"height="370" width="370"/>'. "</td><br>";
    echo "<td>".$row['beschrijving']."</td><br>";
      echo "<td>€".$row['prijs']."</td><br>";
    
    }
           
       ; 
    echo "</tr>";
        

 mysqli_free_result($result);
 mysqli_close($db);   
    
?>
</html>