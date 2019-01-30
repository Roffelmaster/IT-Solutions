


<?php
session_start();


include "database.php";



    
// Test of de verbinding werkt!
if (mysqli_connect_errno()) {
die("De verbinding met de database is mislukt: " .
mysqli_connect_error() . " (" .
mysqli_connect_errno() . ")" );
}


?>
<html>
    <body>
<div id="container">
<h1>

Uw order overzicht

</h1>

<?php 


echo "</br>";

$sql="SELECT * FROM product Where idproduct IN (" ;

foreach ($_SESSION['cart'] as $key => $v1 )
{
    $sql .= $key. ",";
    
    
}

 $sql=substr($sql, 0, -1).") ORDER BY beschrijving ASC"; 

 $query= mysqli_query($db,$sql);

  if (!empty($query)) {
                       while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){ 
echo "</br>";


 
foreach ( $_SESSION['cart'] as $key => $id){
    
   echo "<p>";
   if(
    $row['idproduct'] == $key )
   {
      
    //   echo  "Productnaam:  " . $row['Productnaam'];
       
  //  $sql2 = "INSERT INTO bestelregel (idProduct, omschrijving, prijs, foto) Values ('$key',)
       
       
   }
  
}
  
$array = array();

     
$getWerknemersid = $_COOKIE['login'];
                           
                           
    foreach ($id as $aantal) {
            
     $idproduct = $row['idproduct'];
     $prijs = $row['prijs'];
    
        
   //  $sql2 = "INSERT INTO bestellingen (idProduct,Prijs,Aantal) Values('$idproduct','$prijs','$aantal')
       
      //  ;";
        
       
  // toevoegen van order naar de database      
    
        
   
        $array[1] = $row['idproduct'];
       
        echo "</br>";
        echo  "Productnaam:  " . $row['naam'];
        
        echo "</br>";
        echo "Omschrijving: " .$row['beschrijving'];
        echo "</br>";
        
        echo "prijs per stuk :";
        echo "&#8364";
        echo " " . $row["prijs"];
       
        echo "</br>";
         echo "aantal: ".$aantal;
        $array[2] = $aantal;
        echo "</br>";
        
        echo "Totaal :";
        echo "&#8364";
        
        
        echo " ";
        $array[0] = $aantal * $row['prijs'];
        echo $aantal * $row['prijs'];
        echo "</br>";
        echo "</br>";
         echo "<td>".'<img  src="images/'. $row['afbeelding'] .'"/>'. "</td>";
        
    }
        
                           
    /* if ($array[0] > 499) {
        $sql2 = "INSERT INTO bestelling
        (status,product_idproduct,aantal,werknemer_idwerknemer)Values('goedkeuring','$array[1]','$array[2]','$getWerknemersid');" ;
          mysqli_query($db, $sql2);                  
     }
       else {
           $sql2 = "INSERT INTO bestelling
       
        (status,product_idproduct,aantal,werknemer_idwerknemer)Values('goedgekeurd','$array[1]','$array[2]','$getWerknemersid');" ;
          mysqli_query($db, $sql2);  
         
       }
      */                    
        
                       }
      

                       }
  

  

?>



<p>
    
  
</p>
<p>
    
 <button><a href="cart.php">Winkelmandje aanpassen </a>  </button>
    <button><a href="product-overzicht.php">Klik hier om terug te gaan naar de Telefoons</a>  </button>
    
    <button><a href="verder.php">Verder </a>  </button>
    
    
</p>





    </div>
    
    
    
    </body>


</html>

