<?php
session_start();

//<!--Connect to database-->
include('./php/connection.php');
//Get user id
$user_id = $_SESSION['user_id'];

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Payment - Success</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <meta name="description" content="#">
        <link rel="icon" href="#">
        <!-- Bootstrap & Fonts CSS -->
        <link rel="stylesheet" href="boot/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Ceviche+One&display=swap" rel="stylesheet">
<!--        Custom Styling-->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/profilestyle.css">
        <link rel="stylesheet" href="css/headerless.css">
    </head>
    <body>
<!--        Navigation-->
        <?php
        include("navbarconnected.php");
        ?>
        
<!--        Main Content-->
        <div class="container" id="profileContainer">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <p>Thank you for your payment. You'll find your items in your library by clicking <a href="library.php">HERE!</a>. Or you can continue shopping by clicking <a href="shop.php">HERE!</a></p>
                    <p>A receipt has been sent to your email address from cs@thelittledarkone.com. If you can't find it in your inbox don't forget to check you spam/junk folder.</p>
                </div>
            </div>
        </div>
        <!--    Footer-->
       <?php include("footer.php"); ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!--Include all compiled plugins (below), or include individual files as needed -->
        <script src="boot/js/bootstrap.min.js"></script>
        
        <script src="js/sticky.js"></script>
        <script src="js/nav.js"></script>
        <script src="js/profile.js"></script>
        <script>
            $(function(){
                $("#profile").addClass('active');
            });
        </script>
    </body>
</html>