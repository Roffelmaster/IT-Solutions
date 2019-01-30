<!--

formulier inlogpagina

login.php -> login-action.php



-->
<?php

//include "header.php";

if (!isset($_COOKIE['login'])) {

?>
<!DOCTYPE html>
<html lang="en">


    <body>


    <div id="content">
 <h1>Inloggen</h1>
<form method="post" action="login-action.php">
    <p>
        <label for="name">Inlognaam: </label>
        <input type="text" name="username" id="inlognaam" />
    </p>
    <p>
        <label for="password">Wachtwoord: </label>
        <input type="password" name="password" id="password" />
    </p>

    <p>
        <button name="login-submit">Inloggen</button>
    </p>
</form>


    </div>


    </body>
</html>

<?php
}

else {
    header("location:product-overzicht.php");
}
?>
