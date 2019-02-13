<!DOCTYPE html>
<html lang="en">
<?php 
include ('menu.php');
    ?>

  <body>

    <div class="container">
        <br>
     <?php

session_unset(); // alle variabelen vrijgeven
session_destroy(); // sessie afsluiten
// Now remove Cookie (Start new session)
//setcookie(session_name());

?>
<html>
<head>
<title>Uitloggen</title>

</head>

<body>
<h2>Uitloggen</h2>
<hr>
U bent nu uitgelogd. <br>
U kunt hier eventueel opnieuw <a href="frm_login.php">inloggen</a>.
</body>
</html>
    </div>
    <!-- /.container -->


  </body>

</html>
