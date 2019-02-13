<?php
include 'database.php';
session_start();
?>
<html>
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
        <a class="navbar-brand" href="index.php">
          <img src="images/logo.jpg" width="150" height="30" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
              <?php
              // inkoop
               if($_SESSION['permissie'] == 2){
                   ?>
            <li class="nav-item">
              <a class="nav-link" href="product-toevoegen.php">product toevoegen</a>
            </li>

              <?php
               }
              
              // inkoop en werknemer
              if(($_SESSION['permissie'] == 1) || ($_SESSION['permissie'] == 2)) {
                  
                   ?>
            
            <li class="nav-item">
              <a class="nav-link" href="product-overzicht.php">Producten</a>
            </li>
                
                
              <?php
              }
                
                
               if($_SESSION['permissie'] == 2){
                   ?>
              
              <li class="nav-item">
              <a class="nav-link" href="leverancier-overzicht.php">leveranciers</a>
            </li>
              
              
               <li class="nav-item">
              <a class="nav-link" href="leverancier-toevoegen.php">leverancier toevoegen</a>
              </li>
               <?php
                   
                   
                   
               }
               if(($_SESSION['permissie'] == 5) || ($_SESSION['permissie'] == 2)) {
              
                   ?>
                    <li class="nav-item">
              <a class="nav-link" href="bestelling_lijst.php">Bestelling lijst</a>
            </li>
              <?php
              
               }
              
              
              if(($_SESSION['permissie'] == 6) || ($_SESSION['permissie'] == 5)) {
              
              ?>
              
              <li class="nav-item">
              <a class="nav-link" href="factuur.php">Goedkeuring Factuur</a>
            </li>
            
              
              
              <li class="nav-item">
              <a class="nav-link" href="factuur_lijst.php">Facturenlijst</a>
            </li>
              <?php
                  
              }
              
              if($_SESSION['permissie'] == 4) {
                  
                  
              ?>
              
               <li class="nav-item">
              <a class="nav-link" href="logistiek.php">logistiek</a>
            </li>
              
              <?php
              }
                 
                   if($_SESSION['permissie'] == 5) {
                  ?>
             <li class="nav-item">
            <a class="nav-link" href="manager.php">manager</a>
          </li>
              
              <?php
                       
                   }
              
              if(!isset($_SESSION['permissie'])){
              ?>
            <li class="nav-item">
              <a class="nav-link" href="frm_login.php">login</a>
            </li>
              <?php
              }
                  
              
                  ?>
              
              <li class="nav-item">
              <a class="nav-link" href="logout.php">Uitloggen</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>




      <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
