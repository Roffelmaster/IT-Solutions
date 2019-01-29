<?php
include 'database.php';


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
    
    
$query = "SELECT * FROM leverancier WHERE idleverancier='" .$_GET["idleverancier"] ."'";
$result = mysqli_query($db, $query);
if (mysqli_num_rows($result) > 0) {
// output data of each row
while($row = mysqli_fetch_assoc($result)) {
$naam = $row["naam"];
$address = $row["address"];
$telefoonnummer = $row["telefoonnummer"];
$rekeningnummer = $row["rekeningnummer"];
}}
    
    ?>
        
        <h3>Let op: Deze gegevens wijzigen?</h3>
<form action="leverancier-aanpassen2.php" method="post">
<input type="hidden" name="confirmation" value="1">
<input type="hidden" name="idleverancier" value="<?php echo $id;?>">


    
    <table>
<input type="hidden" name ="id" id="id" value='<?php echo "$id"?> '>
<tr><td>leveranciernaam:</td><td><input type="text" name="naam" value="<?php echo($naam);?>"
size="30"></td></tr>
<tr><td>address:</td><td><input type="text" name="beschrijving" value="<?php
echo($address);?>" size="30"></td></tr>
<tr><td>telefoonnummer: </td><td><input type="text" name="prijs" value="<?php
echo($telefoonnummer);?>" size="30"></td></tr>
 <tr><td>rekeningnummer: </td><td><input type="text" name="prijs" value="<?php
echo($rekeningnummer);?>" size="30"></td></tr>


</table>
<hr>
<input type="Submit" value="Wijzigen" >
<input type="reset" value="Leegmaken">
<input type="Button" value="Nee, terug" onclick="javascript:history.back();">
    </form>
 

    </body>
</html>
