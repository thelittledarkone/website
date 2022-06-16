<?php

session_start();
include('./php/connection.php');
//remember me
include('./php/rememberme.php');
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible"content="IE=edge">
        <meta name="viewport"content="width=device-width, initial-scale=1">
        <title>Account Activation</title>
<!--        CSS-->
        <link href="boot/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
<!--        Icons and Fonts-->
        <link rel="icon" href="css/MBK.ico">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Black+Ops+One&display=swap" rel="stylesheet">
    </head>
    <body>
        <!--        Nav Bar-->
        <?php
        if(isset($_SESSION["user_id"])){
            include("navbarconnected.php");
            include("searchonly.php");
        }else{
            include("navbarnotconnected.php");
        }
        
        ?>
        <!--   Message Body-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-offset-1 col-sm-10">
                    <h1>Account Activation</h1>
        
<?php

//<!--If email or activation key is missing, show error-->
if(!isset($_GET['email']) || !isset($_GET['key'])){
    echo '<div class="alert alert-danger">Error: Please click the activation link in email</div>';
    exit;
}
//<!--    Store them in 2 variables-->
$email = $_GET['email'];
$key = $_GET['key'];
//<!--    Prepare variables for query-->
$email = mysqli_real_escape_string($link, $email);
$key = mysqli_real_escape_string($link, $key);

//<!--    Run query set activation field to activated for the provided email-->
$sql = "UPDATE users SET activation='activated' WHERE (email='$email' AND activation='$key') LIMIT 1";
$result = mysqli_query($link, $sql);

//<!--    If query is successful, show success message and invite user to login-->
if(mysqli_affected_rows($link) > 0){
    echo "<div class='alert alert-success'>Your account has been activated! You can now Login</div>";
    echo '<a href="https://www.thelittledarkone.com/" type="button" class="btn-lg btn-success">Return to Home Screen</a>';
}else{
//<!--        Show error message-->
    echo '<div class="alert alert-danger">Your account could not be activated. Please try again later.</div>';
}            
?>            
                </div>
            </div>
        </div>
<!--        Footer-->
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
        <script src="boot/js/bootstrap.min.js"></script>
         
        <!--Custom scripts-->
      <script src="js/sticky.js"></script>
      <script src="js/nav.js"></script>
      <script src="js/user.js"></script>
    </body>
</html>
