<!DOCTYPE html>
<html lang="en">
<?php 
include ('menu.php');
    ?>

  <body>



    <!-- Page Content -->
    <div class="container">
       <?php

if($_SESSION['permissie'] != 2){
echo "je hebt hier geen rechten voor" ;
}else{
$id = $_GET['idleverancier'];
?>
            <br><br>
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
echo "<tr><td>rekeningnummer:</td><td> ". $row['rekeningnummer'] ."</td></tr>";
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
    <?php
  }
     ?>
</html>

    </div>

  </body>

</html>
