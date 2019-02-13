<!DOCTYPE html>
<html lang="en">

<?php 
include ('menu.php');
    ?>

  <body>
    <!-- Page Content -->
    <div class="container">
        <?php




echo "<br><br>";



// Test of de verbinding werkt!
if (mysqli_connect_errno()) {
die("De verbinding met de database is mislukt: " .
mysqli_connect_error() . " (" .
mysqli_connect_errno() . ")" );
}


?>
     <h1>

Volledige overzicht

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
                     $nummer = 1;


      $tester = array();

$array = array();
      $i = 0;
/* !!! */ while($row=mysqli_fetch_array($query,MYSQLI_ASSOC)){
echo "</br>";



foreach ( $_SESSION['cart'] as $key => $id){

    $tester[] = $id;

   echo "<p>";
   if(
    $row['idproduct'] == $key )
   {

    //   echo  "Productnaam:  " . $row['Productnaam'];

  //  $sql2 = "INSERT INTO bestelregel (idProduct, omschrijving, prijs, foto) Values ('$key',)


   }

}



$getWerknemersid = $_COOKIE['login'];



    $tester4 = array();
    foreach ($tester as $key => $aantal) {
$a = 0;

        $tester4[] = $aantal['quantity'][$a];

     $idproduct = $row['idproduct'];
     $prijs = $row['prijs'];
        $a ++;
    }


   //  $sql2 = "INSERT INTO bestellingen (idProduct,Prijs,Aantal) Values('$idproduct','$prijs','$aantal')

      //  ;";


  // toevoegen van order naar de database




        $array[1] = $row['idproduct'];

        echo "<h5> Product $nummer </h5>";



         echo "<td>".'<img  src="images/'. $row['afbeelding'] .'"height="250" width="250"/>'. "</td>";
        echo "</br>";

        echo  "Naam:  " . $row['naam'];

        echo "</br>";
        echo "Omschrijving: " .$row['beschrijving'];
        echo "</br>";

        echo "prijs per stuk :";
        echo "&#8364";
        echo " " . $row["prijs"];

        echo "</br>";
         echo "aantal: ".$tester4[$i];
        $array[2] = $aantal;
        echo "</br>";

        echo "Totaal :";
        echo "&#8364";


        echo " ";
        $array[0] = $tester4[$i] * $row['prijs'];
        echo $tester4[$i] * $row['prijs'];
        echo "</br>";
        echo "</br>";

     $nummer++;
    $i++;
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







?>



<p>


</p>
<p>

 <button style="border-radius: 12px;"><a href="cart.php" style="color:black;">Terug</a>  </button>
    <button style="border-radius: 12px;"><a href="product-overzicht.php" style="color:black;">Helemaal Terug</a>  </button>

    <button style="border-radius: 12px;"><a href="verder.php" style="color:black;">Verder </a>  </button>


</p>





    </div>



    </body>


</html>
    </div>
    <!-- /.container -->

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
