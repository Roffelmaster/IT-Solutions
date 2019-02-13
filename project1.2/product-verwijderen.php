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
$id = $_GET['idproduct'];
?>

<body>
    <div align="center">
        <?php

$query = "SELECT * FROM product WHERE idproduct=".$id.";";

$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
echo "<h3>Verwijder dit record?</h3>" . "<p />";
echo "<table>";
echo "<tr><td>naam:</td><td> " . $row["naam"]. "</td></tr> ";
echo "<tr><td>omschrijving:</td><td> ".$row["beschrijving"]. "</td></tr> " ;
echo "<tr><td>prijs:</td><td> ".$row["prijs"]. "</td></tr> " ;
echo "<tr><td>foto:</td><td> ".'<img src="images/'. $row['afbeelding'] .'"/>'."</td></tr>";
echo "</table><p>"; }

}
    ?>
  <html>

    <form action="product-verwijderen2.php" method="post">
<input type="hidden" name="confirmation" value="1">
<input type="hidden" name="idproducts" value="<?php echo $id;?>">

<input type="Submit" value="verwijderen" >
<input type="Button" value="Nee, terug" onclick="javascript:history.back();">

</form>
        </html>

</div>

    </body>
</html>
<?php
}
 ?>
    </div>
    <!-- /.container -->

   

  </body>

</html>
