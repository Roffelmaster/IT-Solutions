<?php

include ('menu.php');

if($_SESSION['permissie'] > 0){
?>


<html lang="en">

<body>
    <!-- Page Content -->
    <div class="container">
      <h1 class="mt-5">IT-Solutions Homepage</h1><hr>
      <p>Op deze pagina vind u alles wat u nodig heeft voor uw dagelijkse werkzaamheden.</p>
    </div>
    <!-- /.container -->

   

  </body>
<?php
}
else {
    header("location:frm_login.php");
}
    ?>
</html>
