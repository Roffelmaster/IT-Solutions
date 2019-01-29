<html>

<head>
<meta charset="UTF-8">
<title>Phone Planet</title>
     <link rel="stylesheet" type="text/css" href="home.css">
</head>

<?php

session_start();
include 'database.php';

if (mysqli_connect_errno()) {
die("De verbinding met de database is mislukt: " .
mysqli_connect_error() . " (" .
mysqli_connect_errno() . ")" );
}

$query = "SELECT * FROM bestelling";
$result = mysqli_query($db, $query) or die('Error querying
database.');

while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>"."bestellingid:".$row['idbestelling']."</td><br>";
    echo "<td>"."product:".$row['product_idproduct']."</td><br>";
    echo "<td>"."werknemer:".$row['werknemer_idwerknemer']."</td><br>";
    echo "<td>"."status:".$row['status']."</td><br>";

  }

  ;
  echo "</tr>";

 ?>
 </html>
