<?php

include 'database.php';



    if (isset($_POST["confirmation"])){

        
        
$query="UPDATE product SET
naam = '". $_POST["naam"] ."',
beschrijving = '". $_POST["beschrijving"] ."',
prijs = '". $_POST["prijs"] ."'

WHERE idproduct='" .$_POST["idproduct"] ."'";
        $result = mysqli_query($db, $query) or die (mysqli_error());
        if ($result){
            
header("location:product-overzicht.php");
  
}} 
        
                            
     
    
?>