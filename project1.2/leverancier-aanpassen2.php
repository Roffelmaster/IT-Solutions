<?php

include ('menu.php');
    



    if (isset($_POST["confirmation"])){

        
        
$query="UPDATE leverancier SET
naam = '". $_POST["naam"] ."',
address = '". $_POST["address"] ."',
telefoonnummer = '". $_POST["telefoonnummer"] ."',
rekeningnummer = '". $_POST["rekeningnummer"] ."'

WHERE idleverancier='" .$_POST["idleverancier"] ."'";
        $result = mysqli_query($db, $query) or die (mysqli_error($db));
        if ($result){
            
header("location:leverancier-overzicht.php");
  
}} 
        
                            
     
    
?>