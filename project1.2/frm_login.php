<!DOCTYPE html>
<html lang="en">
<?php 
include ('menu.php');
    ?>

  <body>


    <!-- Page Content -->
    <div class="container">
     <title>Inloggen</title>
        <br>

<h3>Inloggen</h3>
        <hr>
<table>
<form method="post" action="login.php">
<tr><td>	Gebruikersnaam:</td><td> <input name="naam" type="text"  size="20" ></td></tr>
<tr><td>	Wachtwoord: </td><td><input name="wachtwoord" type="password" size="20" ></td></tr>
</table>
	<hr>
	<input type="submit" name="Submit" value="Inloggen">
	<input name="reset" type="reset" id="reset" value="Leegmaken">
</form><p>
    </div>
    <!-- /.container -->

  </body>

</html>
