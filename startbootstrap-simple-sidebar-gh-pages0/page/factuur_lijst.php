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

 ?>
 </html>
