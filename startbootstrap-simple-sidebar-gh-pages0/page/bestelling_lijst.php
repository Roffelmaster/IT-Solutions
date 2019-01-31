<html>

<head>
<meta charset="UTF-8">
<title>Phone Planet</title>
     <link rel="stylesheet" type="text/css" href="home.css">
</head>

<?php

session_start();
include 'database.php';
include 'layout_nav.php';

if (mysqli_connect_errno()) {
die("De verbinding met de database is mislukt: " .
mysqli_connect_error() . " (" .
mysqli_connect_errno() . ")" );
}

$query = "SELECT idbestelling FROM bestelling ";
$query1 = "SELECT product.naam FROM bestelling INNER JOIN product where bestelling.product_idproduct = product.idproduct";
$query2 = "SELECT werknemer.naam FROM bestelling INNER JOIN werknemer WHERE bestelling.werknemer_idwerknemer = werknemer.idwerknemer";
$query3 = "SELECT aantal FROM bestelling ";
$query4 = "SELECT status FROM bestelling ";
$result = mysqli_query($db, $query) or die('Error querying
database1.');
$result1= mysqli_query($db, $query1) or die('Error querying
database2.');
$result2= mysqli_query($db, $query3) or die('Error querying
database3.');
$result3 = mysqli_query($db, $query2) or die('Error querying
database4.');
$result4 = mysqli_query($db, $query4) or die('Error querying
database4.');

?>

<table class="striped">
            <tr class="header">
                <td>Id</td>
            </tr>
            <?php
            while($row = mysqli_fetch_array($result))
             {
                echo "<tr>";
                echo "<td>".$row['idbestelling']."</td>";
                echo "</tr>";
              }
            ?>
        </table>

        <table class="striped">
                    <tr class="header">
                        <td>werknemer</td>
                    </tr>
                    <?php
                    while($row1 = mysqli_fetch_array($result1))
                    {
                       echo "<tr>";
                       echo "<td>"."product:".$row1['naam']."</td>";
                       echo "</tr>";
                     }

                    ?>
                </table>

                <table class="striped">
                            <tr class="header">
                                <td>aantal</td>
                            </tr>
                            <?php
                            while($row2 = mysqli_fetch_array($result2))
                             {
                                echo "<tr>";
                                echo "<td>"."product:".$row2['aantal']."</td>";
                                echo "</tr>";
                              }

                            ?>
                        </table>

                        <table class="striped">
                                    <tr class="header">
                                        <td>product</td>
                                    </tr>
                                    <?php
                                    while($row3 = mysqli_fetch_array($result3))
                                    {
                                       echo "<tr>";
                                       echo "<td>"."product:".$row3['naam']."</td>";
                                       echo "</tr>";
                                     }

                                    ?>
                                </table>

                                <table class="striped">
                                            <tr class="header">
                                                <td>status</td>
                                            </tr>
                                            <?php
                                            while($row4 = mysqli_fetch_array($result4))
                                             {
                                                echo "<tr>";
                                                echo "<td>"."product:".$row4['status']."</td>";
                                                echo "</tr>";
                                              }

                                            ?>
                                        </table>
 </html>
