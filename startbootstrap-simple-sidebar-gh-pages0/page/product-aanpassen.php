<?php
include 'database.php';
include 'layout_nav.php';


$id = $_GET['idproduct'];
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


$query = "SELECT * FROM product WHERE idproduct='" .$_GET["idproduct"] ."'";
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
$productnaam = $row["naam"];
$omschrijving = $row["beschrijving"];
$prijs = $row["prijs"];
$image = $row["afbeelding"];
}}

    ?>

        <h3>Let op: Deze gegevens wijzigen?</h3>
<form action="product-aanpassen2.php" method="post">
<input type="hidden" name="confirmation" value="1">
<input type="hidden" name="idproduct" value="<?php echo $id;?>">



    <table>
<input type="hidden" name ="id" id="id" value='<?php echo "$id"?> '>
<tr><td>Productnaam:</td><td><input type="text" name="naam" value="<?php echo($productnaam);?>"
size="30"></td></tr>
<tr><td>Omschrijving:</td><td><input type="text" name="beschrijving" value="<?php
echo($omschrijving);?>" size="30"></td></tr>
<tr><td>prijs: </td><td><input type="text" name="prijs" value="<?php
echo($prijs);?>" size="30"></td></tr>

</table>
<hr>
<input type="Submit" value="Wijzigen" >
<input type="reset" value="Leegmaken">
<input type="Button" value="Nee, terug" onclick="javascript:history.back();">
    </form>


    </body>
</html>
