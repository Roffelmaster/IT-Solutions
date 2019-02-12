<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>IT-Solutions</title>

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
include "database.php";
session_start();


echo "<br><br>";
?>


 
      
      <?php
unset ($_SESSION['cart'][0]);

//if (!empty($id)){
if(isset($_GET['action']) && $_GET['action']=="add"){ 
          if(array_key_exists('id', $_GET)){
        $id= $_GET['id']; 


          }
}


if(array_key_exists('action', $_GET)){
    
 if(isset($_GET['action']) && $_GET['action']=="add"){
     
          if(array_key_exists('id', $_GET)){
        $id= ($_GET['id']); 
        
        
            echo "</br>";
       
              $_SESSION ['cart'] [$id] = array (
              'quantity' => 0 
            
              );
              
            
      
  //  $_SESSION['cart'][$id]['quantity'] += 0 ;
      // $_SESSION['cart'] = array ($id);
             
       
             
            
              
       $_SESSION['cart'][$id]['quantity'] ++;
      
           //   $ip = 1 - $id ;
       // header("location:cart.php?&action=add&id=$ip");
                     
  
   
     
      /*if (empty($_SESSION['cart'])){
  
          $sql_s=("SELECT * FROM product 
                WHERE idProduct={$id}"); 
            $query_s=mysqli_query($db,$sql_s); 
            
           
            if(mysqli_num_rows($query_s)!=0){ 
                $row_s=mysqli_fetch_array($query_s,MYSQLI_ASSOC); 
                  
                $_SESSION['cart'][$row_s['idProduct']]=array( 
                        "quantity" => 1, 
                        "price" => $row_s['Prijs'] 
                    ); 
         
            }
                  
    } */
 
              
          }

 
 }
}



   
//}

// hier  kun je de aantal aanpassen

if(isset($_POST['submit'])){ 
          
        foreach($_POST['quantity'] as $key => $val) { 
            if($val==0) { 
                unset($_SESSION['cart'][$key]); 
                header("location:cart.php");
            }else{ 
                $_SESSION['cart'][$key]['quantity']=$val; 
            } 
        } 
          
    } 
  

// Database connectie met localhost

    
// Test of de verbinding werkt!
if (mysqli_connect_errno()) {
die("De verbinding met de database is mislukt: " .
mysqli_connect_error() . " (" .
mysqli_connect_errno() . ")" );
}





//include "header.php";






// Haal add to cart op

       

    ?>

<div id="container">
 
<h1>Winkelmand</h1> 
 
<form method="post" action="cart.php">
 <table> 
     
          
        <tr> 
            <th>Naam Product</th> 
            <th>Aantal</th> 
            <th> Enkel Prijs</th> 
            <th>Totaal</th> 
        </tr> 





<?php
// View Cart

$sql="SELECT * FROM product WHERE idproduct IN ("; 
                      
                    foreach($_SESSION['cart'] as $id => $value) { 
                        $sql.=$id.","; 
                       
                    } 
                      
                    $sql=substr($sql, 0, -1).") ORDER BY beschrijving ASC"; 
                   
    $query= mysqli_query($db,$sql);
     
   
  
                    $totalprice=0; 
           
      
            
                   if (!empty($query)) {
                       while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){ 
                         $subtotal=$_SESSION['cart'][$row['idproduct']]['quantity']*$row['prijs']; 
                        $totalprice+=$subtotal; 
                    ?> 
     
     
                        <tr> 
                            <td><?php echo $row['naam'] ?></td> 
                            <td>
                            <input type="text" name="quantity[<?php echo  $row['idproduct'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['idproduct']]['quantity'] ?>" /></td> 
                            <td>&euro;<?php echo $row['prijs'] ?></td> 
                            <td> &euro;<?php echo $_SESSION['cart'][$row['idproduct']]['quantity']*$row['prijs'] ?></td> 
                        </tr> 
                        
                        
                        
                     <?php }
                   }
   
     ?>
                        
                        
                        
                        
                        
                        
<tr> 
                        <td colspan="4">Totaal Totaal: &euro; <?php echo $totalprice ?> </td> 
                    </tr> 
          
 
    </table>
 
 

<br /> 

   <p>
   
        <button><a href="product-overzicht.php">Klik hier om Verder te shoppen</a>  </button>
        <button type="submit" name="submit">Update Winkelmand!</button>
      <?php
    
    // kan alleen uitchecken wnr totalprijs > 0
    
    if ($totalprice > 0)
    {
        ?>
       
       <button><a href="cart2.php">Klik hier om uit te checken </a>  </button>
    <?php 
       }
       else {
       
       }
    ?>

      </p> 
    </form> 
     <p>Als u iets wilt verwijderen pas het aantal naar 0 en klik vervolgens op Update knopje! </p>
</div>

    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>



      