<?php
session_start();
include('./php/connection.php');
//remember me
include('./php/rememberme.php');
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
<!--Google Tags-->
      <script data-ad-client="ca-pub-2412968567788840" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
      <script src="https://www.google.com/recaptcha/api.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="boot/css/bootstrap.min.css">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css2?family=Frijole&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ceviche+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Waiting+for+the+Sunrise&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
      
      <!--        JQuery & Bootstrap JS Scripts-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="boot/js/bootstrap.min.js"></script>
<!--        JQuery UI-->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/eggplant/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
      
      <link rel="stylesheet" href="css/style.css">

    <title>thelittledarkone</title>
  </head>
  <body>
<!--    Header-->
      <div class="jumbotron pageHeader" id="indexPageHead">
        <div class="container headerContainer">
            <img src="css/images/reddit_avatar.png" class="logo">
            <h1>thelittledarkone</h1>  
        </div>
      </div>
<!--    Nav Bar-->
      <?php
        if(isset($_SESSION["user_id"])){
            include("navbarconnected.php");
            include("searchonly.php");
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
<!--    Icons with Text-->
      <div class="container" id="serviceContainer">
          <div class="row singleService">
              <div class="col-sm-3 col-md-offset-1 detectAdventure">
                <img src="css/images/pngfind.com-map-png-545029.png" class="bodyImage">
                <h2>Detect Adventure</h2>
              </div>
              <div class="col-sm-offset-1 col-sm-8 col-md-7 col-md-offset-0 serviceDescription">
                <h2>thelittledarkone's <br />Detect Adventure</h2>
                <p>Find friends to play boardgames with near you! Sign up to our free webapp and start posting events or joining other gamers events and start building a boardgame community near you.</p>
                <p><a class="btn btnColor" href="detectadventure.php">Click Here!</a><br /> to check out our detect adventure webapp! <br />Find friends near you and arrange your own TTRPG games!</p>
              </div>
           </div>
           <div class="row singleService">
              <div class="col-sm-3 col-md-offset-1 ldoA">
                <img src="css/images/kisspng-dragonvale-symbol-dragon-5ad22b28c84534.6640012915237230488203.png" class="bodyImage">
                <h2>T.L.D.O. Adventures</h2>
              </div>
              <div class="col-sm-offset-1 col-sm-8 col-md-7 col-md-offset-0 serviceDescription">
                <h2>thelittledarkone's <br />Adventures</h2>
                <p>Take a look at our ever expanding range of supplements and adventures for sale. All documents are suppled as both, standard pdf files as well as printer friendly pdf files for you to print at home.</p>
                <p><a class="btn btnColor" href="shop.php">Click Here!</a><br /> to browse and shop for 5e Maps, Adventures and Supplements!</p>
              </div>
           </div>
            <div class="row singleService">
              <div class="col-sm-3 col-md-offset-1 adventurerManager">
                <img src="css/images/angel.png" class="bodyImage">
                <h2>Adventurer Manager</h2>
              </div>
              <div class="col-sm-offset-1 col-sm-8 col-md-7 col-md-offset-0 serviceDescription">
                <h2>thelittledarkone's <br />Adventurer Manager</h2>
                <p><i>COMING SOON!</i> Take your event management to the next level with our Adventure Manager tool. Assign character slots to your players and manage their progression through your campaign remotely. Fully customizable and fully integrated to work with T.L.D.O. Adventures supplements as well as the Detect Adventure webapp. <br /><i>Watch this space for its release very soon!</i></p>
<!--                <p><a class="btn btnColor" href="adventurermanager.php">Click Here!</a><br /> to check out our detect adventure webapp! <br />Find friends near you and arrange your own TTRPG games!</p>-->
              </div>
           </div>
            <div class="row singleService">
              <div class="col-sm-3 col-md-offset-1 patreon">
                <img src="css/images/patreon_mini_logo.png" class="bodyImage">
                <h2>Patreon</h2>
              </div>
              <div class="col-sm-offset-1 col-sm-8 col-md-7 col-md-offset-0 serviceDescription">
                <h2>thelittledarkone's <br />Patreon</h2>
                <p>Check us out on Patreon if you want to support any of the projects on thelittledarkone.com. As the site grows, so too will the tiered rewards, but until then, if you want to by us a beer, then check out Patreon!</p>
                <p><a class="btn btnColor" href="https://www.patreon.com/thelittledarkone?fan_landing=true" target="_blank">Click Here!</a><br /> to support us on Patreon!</p>
              </div>
           </div>             
        </div>
<!--    Signup Button-->
      <div class="signup">
      <?php
            if(!isset($_SESSION["user_id"])){
                echo "<button type='button' class='btn btn-lg btnColor btnSignup' data-target='#signupModal' data-toggle='modal'>Sign Up For Free!</button>";
                include("signupmodals.php");
            }
            ?>
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
   
      <!--Custom scripts-->
      <script src="js/sticky.js"></script>
      <script src="js/nav.js"></script>
      <script src="js/user.js"></script>
      
  </body>
</html>