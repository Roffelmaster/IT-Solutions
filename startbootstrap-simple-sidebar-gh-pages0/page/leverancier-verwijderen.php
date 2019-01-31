<?php
session_start();
include 'database.php';
include 'layout_nav.php';
$id = $_GET['idleverancier'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Phone Planet</title>
    <link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>

        <?php

$query = "SELECT * FROM leverancier WHERE idleverancier=".$id.";";

$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
echo "<h3>Verwijder dit record?</h3>" . "<p />";
echo "<table>";
echo "<tr><td>naam:</td><td> " . $row["naam"]. "</td></tr> ";
echo "<tr><td>address:</td><td> ".$row["address"]. "</td></tr> " ;
echo "<tr><td>telefoonnummer:</td><td> ".$row["telefoonnummer"]. "</td></tr> " ;
echo "<tr><td>rekeningnummer:</td><td> ". $row['rekeningnummer'] .'"/>'."</td></tr>";
echo "</table><p>"; }

}
    ?>
  <html>

    <form action="leverancier-verwijderen2.php" method="post">
<input type="hidden" name="confirmation" value="1">
<input type="hidden" name="idleverancier" value="<?php echo $id;?>">

<input type="Submit" value="verwijderen" >
<input type="Button" value="Nee, terug" onclick="javascript:history.back();">

</form>
</html>


    </body>
</html>
