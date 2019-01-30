<?php


// Check op ingelogd zijn




if (isset($_COOKIE['login'])) {
    // Zet cookies op een datum in het verleden
    // Zodat de browser ze direct verwijderd
    setcookie('login', NULL, 1, '/');
    setcookie('naam', NULL, 1, '/');
}






// 
//Terug naar de hoofdpagina
// 
// 

header('location:product-overzicht.php');
?>