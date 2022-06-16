<?php
session_start();
include('./php/connection.php');
//remember me
include('./php/rememberme.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Signup - Success</title>
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
        if(isset($_SESSION["user_id"])){
            include("navbarconnected.php");
            include("searchonly.php");
        }else{
            include("navbarnotconnected.php");
        }
        
        ?>
        
<!--        Main Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 thankyouForm">
                    <h1>Thank You</h1>
                    <div class='alert alert-success'>Thank for your registering! A confirmation email has been sent to you. Please click on the activation link to activate your account.<br />If the email doesn't show in your inbox, don't forget to check your spam/junk folder.</div>
                </div>
            </div>
        </div>
        <!--    Footer-->
       <?php include("footer.php"); ?>

        <!--        Login-->
        <form method="post" id="loginForm">
            <div class="modal" id="loginModal" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a class="close" data-dismiss="modal">&times;</a>
                            <h4 id="myModalLabel">Login:</h4>
                        </div>
                        <div class="modal-body">
<!--                            login message for php file-->
                            <div id="loginMessage"></div>
<!--                            Sign up form-->
                            <div class="form-group">
                                <label for="loginemail" class="sr-only">Email</label>
                                <input class="form-control" type="email" id="loginemail" name="loginemail" placeholder="Email" maxlength="50">
                                <label for="loginpassword" class="sr-only">Password</label>
                                <input class="form-control" type="password" id="loginpassword" name="loginpassword" placeholder="Password" maxlength="30">        
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="rememberme" id="rememberme">
                                    Remember Me
                                </label>
                                <a class="pull-right" style="cursor: pointer" data-dismiss="modal" data-target="#passwordModal" data-toggle="modal">Forgot Password?</a>
                            </div>
                            
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="login" type="submit" value="Login">
                            <button type="button" class="btn cancelBtn" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn cancelBtn pull-left" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">Register</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
        
        <!--        Forgot password form-->
        <form method="post" id="passwordForm">
            <div class="modal" id="passwordModal" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a class="close" data-dismiss="modal">&times;</a>
                            <h4 id="myModalLabel">Enter your email address below to recover your account and set a new password:</h4>
                        </div>
                        <div class="modal-body">
<!--                            forgot password message for php file-->
                            <div id="passwordMessage"></div>
<!--                            Forgot Password form-->
                            <div class="form-group">
                                <label for="passwordemail" class="sr-only">Email</label>
                                <input class="form-control" type="email" id="passwordemail" name="passwordemail" placeholder="Email" maxlength="50">  
                            </div>                       
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="forgotpassword" type="submit" value="Submit">
                            <button type="button" class="btn cancelBtn" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn cancelBtn pull-left" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">Register</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!--Include all compiled plugins (below), or include individual files as needed -->
        <script src="boot/js/bootstrap.min.js"></script>
        
        <!--Custom scripts-->
      <script src="js/sticky.js"></script>
      <script src="js/nav.js"></script>
      <script src="js/user.js"></script>
    </body>
</html>
