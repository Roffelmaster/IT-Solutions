
<?php 
include ('menu.php');
    


$id2 = $_POST['idleverancier'];

if (isset($_POST["confirmation"])){
$query="DELETE FROM leverancier WHERE idleverancier=".$id2.";";
$result = mysqli_query($db, $query) or die (mysqli_error());

if ($result){
echo ("de leverancier " .$id2. " is verwijderd.<p>\n");
    header("location:leverancier-overzicht.php");
}} 

?>