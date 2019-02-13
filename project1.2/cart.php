<?php


include 'menu.php';
?>
<!DOCTYPE html>
<html lang="en">

  
    <!-- Page Content -->
    <div class="container">
     <?php

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
 
<h1>Uw Bestelling</h1> 
 
<form method="post" action="cart.php">
 <table> 
     
          
        <tr> 
            <th>Naam</th> 
            <th> </th>
            <th>Aantal</th>
            
            <th>Prijs</th>
            <th> </th>
            <th>Sub-Totaal</th> 
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
                            <td> &nbsp;  </td>
                            <td>
                            <input type="text" name="quantity[<?php echo  $row['idproduct'] ?>]" size="5" value="<?php echo $_SESSION['cart'][$row['idproduct']]['quantity'] ?>" /></td> 
                            
                            <td>&euro;<?php echo $row['prijs'] ?></td> 
                            <td>    &nbsp;   </td>
                            <td> &euro;<?php echo $_SESSION['cart'][$row['idproduct']]['quantity']*$row['prijs'] ?></td> 
                        </tr> 
                        
                        
                        
                     <?php }
                   }
   
     ?>
                        
                        
                        
                        
                        
                        
<tr> 
                        <td colspan="4">Totaal: &euro; <?php echo $totalprice  ?> </td> 

                    </tr> 
       <tr>
     <td> 
   </td>
    
     </tr>
 
    </table>
 
 

<br /> 

   <p>
   
        <button style="border-radius: 12px;"><a href="product-overzicht.php" style="color:black;">Terug </a>  </button>
        <button style="border-radius: 12px;" type="submit" name="submit">Update </button>
      <?php
    
    // kan alleen uitchecken wnr totalprijs > 0
    
    if ($totalprice > 0)
    {
        ?>
       
       <button style="border-radius: 12px;"><a href="cart2.php" style="color:black;">Doorgaan </a>  </button>
    <?php 
       }
       else {
       
       }
    ?>

      </p> 
    </form> 
   <?php
    
    if($totalprice > 499) {
        echo '<p style="color:red">Bestellingen boven de 500 euro dienen gecontroleerd te worden door uw huidige department manager </p>';
    }
 ?>   
</div>

    </div>
    <!-- /.container -->

  

  </body>

</html>



      