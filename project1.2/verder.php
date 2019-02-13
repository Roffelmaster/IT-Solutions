<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Logo Nav - Start Bootstrap Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/logo-nav.css" rel="stylesheet">

  </head>

  <body>
<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="index.html">
          <img src="images/logo.jpg" width="150" height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="product-toevoegen.php">product toevoegen</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="product-overzicht.php">Producten</a>
            </li>
              <li class="nav-item">
              <a class="nav-link" href="leverancier-overzicht.php">leveranciers</a>
            </li>
               <li class="nav-item">
              <a class="nav-link" href="leverancier-toevoegen.php">leverancier toevoegen</a>
              </li>
                    <li class="nav-item">
              <a class="nav-link" href="bestelling_lijst.php">Bestelling lijst</a>
            </li>
              <li class="nav-item">
              <a class="nav-link" href="factuur.php">Goedkeuring Factuur</a>
            </li>
              <li class="nav-item">
              <a class="nav-link" href="factuur_lijst.php">Facturenlijst</a>
            </li>
               <li class="nav-item">
              <a class="nav-link" href="logistiek.php">logistiek</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="frm_login.php">login</a>
            </li>
              <li class="nav-item">
              <a class="nav-link" href="logout.php">Uitloggen</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Page Content -->
    <div class="container">
     <?php
session_start();


echo "<br><br>";
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
<h1>

Uw bestelling is geplaatst.

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

     
$getWerknemersid = $_SESSION['id'];

                           
                           
    foreach ($id as $aantal) {
            
     $idproduct = $row['idproduct'];
     $prijs = $row['prijs'];
    
        
   //  $sql2 = "INSERT INTO bestellingen (idProduct,Prijs,Aantal) Values('$idproduct','$prijs','$aantal')
       
      //  ;";
        
       
  // toevoegen van order naar de database      
    
        
   
        $array[1] = $row['idproduct'];
       
      //  echo "</br>";
        //echo  "Productnaam:  " . $row['naam'];
        
       // echo "</br>";
       // echo "Omschrijving: " .$row['beschrijving'];
       // echo "</br>";
        
       // echo "prijs per stuk :";
      //  echo "&#8364";
     //   echo " " . $row["prijs"];
       
       // echo "</br>";
      //   echo "aantal: ".$aantal;
        $array[2] = $aantal;
       // echo "</br>";
        
      //  echo "Totaal :";
      //  echo "&#8364";
        
        
     //   echo " ";
        $array[0] = $aantal * $row['prijs'];
       // echo $aantal * $row['prijs'];
       // echo "</br>";
       // echo "</br>";
        // echo "<td>".'<img  src="images/'. $row['afbeelding'] .'"/>'. "</td>";
        
    }
        
                           
     if ($array[0] > 499) {
        $sql2 = "INSERT INTO bestelling
        (status,product_idproduct,aantal,werknemer_idwerknemer)Values('goedkeuring vereist','$array[1]','$array[2]','$getWerknemersid');" ;
          mysqli_query($db, $sql2);  
         
         
     }
       else {
           $sql2 = "INSERT INTO bestelling
       
        (status,product_idproduct,aantal,werknemer_idwerknemer)Values('Automatische Goedgekeurd','$array[1]','$array[2]','$getWerknemersid');" ;
          mysqli_query($db, $sql2);  
           $sqltemp = "SELECT idbestelling FROM bestelling WHERE status ='Automatische Goedgekeurd' AND product_idproduct ='$array[1]' AND aantal ='$array[2]' AND werknemer_idwerknemer ='$getWerknemersid'";
           
           
        $sqltemp2 = mysqli_query($db,$sqltemp);
           while ($row = mysqli_fetch_array($sqltemp2)){
               
          $red = $row['idbestelling'];
           $sql3 = "INSERT INTO factuur (status,bestelling_idbestelling)Values('wachtend op goedkeuring','$red');";
              
             
           
          mysqli_query($db,$sql3);
         
           
         
       }
                          
        
                       }
      

                       
                       }
  }

  

?>



<p>
    
  
</p>
<p>
    
 
    <button style="border-radius: 12px;"><a href="product-overzicht.php" style="color:black;">Accept</a>  </button>
    
   
    
    
</p>




    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>



