<?php
//
//Verbinding met database 
//Connectie maken
//POST ophalen van login.php
//Query waar row is > 0 -> cookie maken -> daarna door naar index.php
//Query row geen result -> username /password is fout
// Later kun  isset $_COOKIE['login'] doen en daarna //$_COOKIE ['permission'] == M of A waarbij je dus rechten //hebt
//

/*

function connect_mysql($mysql_host = '127.0.0.1', $mysql_user = 'root', $mysql_password = '', $mysql_database = 'geelhart2'
            ) {
// Connectie maken 
                if (FALSE !== ( $db_connect = @mysql_connect($mysql_host, $mysql_user, $mysql_password) ) || die(mysql_error())
                ) { 
// Stopt SQl connectie bij errror
//
// Verbind met Database
//           
                 if (FALSE !== @mysql_select_db($mysql_database) || die(mysql_error())) {
                        // Succesvolle connectie met database return de connectie
                        return $db_connect;
                    }
                }
                return FALSE;

}

*/
?>






<?php

include "functions.php";
//include "header.php";


//Verbinding database check functions.php


// isset checkt of button is ingedrukt
    // alles gebeurd binnen die isset 
 if (isset($_POST["login-submit"])) {
     
// input type name = "" wordt hier ontvangen
     $name = $_POST["username"];
     $password = $_POST ["password"];
     
         
        
//Verbinding database check functions.php
     $dbhandle = connect_mysql();
     // FALSE = controle 
     // FALSE is gelijk aan 0
     if (FALSE !== $dbhandle) {
                    // Maak sql-query
                    $query = "SELECT * FROM werknemer
                  WHERE naam = '$name' AND wachtwoord = '$password'
                  LIMIT 1
                  ;
                  ";
//QUERY met FALSE controle
         
                 if (FALSE !== ( $result = @mysql_query($query) ) || die(mysql_error())) {
     
// Hier wordt gekeken of die rij wel bestaat
                     if (mysql_num_rows($result) === 1 ) {
// Fetch gegevens in array
                      while( $gegevens = mysql_fetch_assoc($result) ){
                                $permission = $gegevens['permissie'];
                            
                        
// Cookie wordt hier gemaakt
                            $bewaar_tijd = time() + 60 * 60 * 24 * 7 * 52 * 3;
// LOGIN wordt opgeslagen
                            setcookie('login',TRUE, $bewaar_tijd, '/');
// Naam wordt opgeslagen in cookie
                            setcookie('name', $name,$bewaar_tijd,'/');
                            
// Permission wordt opgeslagen in cookie                           
                            setcookie('permission', $permission, $bewaar_tijd, '/');
                        
                        
                        
                        
                        }
                            
 // als alles klaar is wordt je doorverwezen naar index.php                  
                       
                        
                       header('location: product-overzicht.php');
                        
// Als die geen rij vind geef melding 
                     }else {
                            echo "</br>";
                            echo "Gebruikersnaam en/of wachtwoord is incorrect ";
                            echo "</br>";
                              echo "</br>";
                            echo 'Klik <a href="login.php"> hier</a> om naar de inlogpagina te gaan.';
                            echo "</br>";
                            
                        }
                 }
     }
 }



?>


<?php
                     
   
                     
                     ?>