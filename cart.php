<?php
session_start();
if(!isset($_SESSION['cart'])){
    header("location: shop.php");
}
//<!--Connect to database-->
include('./php/connection.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="boot/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
    
    <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Frijole&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ceviche+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Waiting+for+the+Sunrise&display=swap" rel="stylesheet">
      
      <!--        JQuery & Bootstrap JS Scripts-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="boot/js/bootstrap.min.js"></script>
<!--        JQuery UI-->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/eggplant/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
      
      <!--      Custom Styling-->
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/shopstyle.css">
      <link rel="stylesheet" href="css/headerless.css">

    <title>thelittledarkone - Cart</title>
  </head>
  <body>

<!--    Nav Bar-->
      <?php
        if(isset($_SESSION["user_id"])){
            include("navbarconnected.php");
            include("shopsearch.php");
        }else{
            include("navbarnotconnected.php");
        }
        
        ?>
      
        <div class="signuptop">
      <?php
            if(!isset($_SESSION["user_id"])){
                echo "<button type='button' class='btn btn-lg btnColor btnSignup' data-target='#signupModal' data-toggle='modal'>Sign Up, It's Free!</button>";
            }
            ?>
      </div>
      
      <div class="container" id="cartContainer">
          <div class="row">
              <div class="col-md-7">
                    <div class="shopping-cart">
                        <h6 class="cartTitle">My Cart</h6>
                        <div id="cartItems"></div>
                        
                    </div>
              </div>
              <div class="col-md-4 col-md-offset-1 totalContainer">
                  <div>
                      <h6 id="totalPriceHeader">Total</h6>
                      <div class="row price-details">
                          <div class="col-xs-6">
                              <?php
                                if(isset($_SESSION['cart'])){
                                    $count = count($_SESSION['cart']);
                                    echo "<h6 class='totals'>Price ($count items)</h6>";
                                }else{
                                    echo "<h6 class='totals'>Price (0 items)</h6>";
                                }
                              ?>
                          </div>
                          <div class='col-xs-6 totals'>
                              <h6 class="totalNo totalCost"></h6>
                          </div>
                      </div>
                  </div>
                  <div class="freeButton"></div>
                  <div class="paymentTitle"></div>
                  <div id="smart-button-container">
                      <div style="text-align: center;">
                        <div id="paypal-button-container"></div>
                      </div>
                  </div>
                  <div class="payErrors"></div>
              </div>
          </div>
      </div>
      
    <!--    Footer-->
       <?php include("footer.php"); ?>

      <!--        Spinner-->
        <div id="spinner">
            <img src="css/images/ajax-loader.gif" width="64" height="64"/>
            <br /> Loading ...
        </div>  
      
<!--      Here Maps API Java-->
      <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
      <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
      <script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
      <script src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
    
<!--      Paypal Script-->
      <script src="https://www.paypal.com/sdk/js?client-id=AeYwyIQN2VWGPL-kQvYvPQZzznhSNtfMslBrBuPJydnT64f5-A1Gwpmwn18VYnfKWrDG4vhj8YESEHNa&currency=GBP" data-sdk-integration-source="button-factory"></script>
      
      
      <!--Custom scripts-->
      <script src="js/sticky.js"></script>
      <script src="js/nav.js"></script>
      <script src="js/user.js"></script>
      <script src="js/shop.js"></script>
      <script src="js/paypal.js"></script>
      
    
      </body>
</html>