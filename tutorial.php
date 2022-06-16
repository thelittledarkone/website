<?php
session_start();
include('./php/connection.php');

//remember me
include('./php/rememberme.php');

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Help Centre - Tutorials</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <meta name="description" content="#">
        <link rel="icon" href="#">
        <!-- Bootstrap & Fonts CSS -->
        <link rel="stylesheet" href="boot/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css2?family=Frijole&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Ceviche+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Waiting+for+the+Sunrise&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <!--        JQuery & Bootstrap JS Scripts-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="boot/js/bootstrap.min.js"></script>
<!--        JQuery UI-->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/eggplant/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!--        Custom Styling-->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/forumstyle.css">
        
        
    </head>
    <body>
        <!--    Header-->
      <div class="jumbotron">
        <div class="container headerContainer">
            <img src="css/images/angel.png" class="logo">
            <h1 id="forumHeader">Seraphim Help Centre</h1>  
        </div>
      </div>
<!--        Navigation-->
        <?php
        if(isset($_SESSION["user_id"])){
            include("navbarconnected.php");
            include("searchonly.php");
        }else{
            include("navbarnotconnected.php");
        }
        
        ?>

        <div class="container">
            <div class="row">
                <div class="col-sm-3 sidebarContainer" id="sidebarPhone">
                    <nav role="navigation" class="navbar navbar-collapse navbar-sidebar-collapse navbar-sidebar-custom" aria-expanded="false">
                        <div class="container-fluid">
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-target="#navbarCollapseSidebar" data-toggle="collapse">
                                    <span class="sr-only"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div>
                            <div class="navbar-collapse collapse" id="navbarCollapseSidebar">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <ul class="nav navbar-nav">
                                            <li class="dropdown">
                                                <a class="dropdown-toggle dropdown-hover" id="sidebarDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <h3>Account Tutorials <span class="caret"></span></h3>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="tutorial/how-to-signup.php">How to Sign Up</a>
                                                    </li>
                                                    <li>
                                                        <a href="tutorial/how-to-login.php">How to Log In</a>
                                                    </li>
                                                    <li>
                                                        <a href="tutorial/how-to-recover-my-password.php">How to Recover My Password</a>
                                                    </li>
                                                    <li>
                                                        <a href="tutorial/how-to-navigate-the-profilebar.php">How to Navigate The Profile Bar</a>
                                                    </li>
                                                    <li>
                                                        <a href="tutorial/how-to-change-my-profile-picture.php">How to Change My Profile Picture</a>
                                                    </li>
                                                    <li>
                                                        <a href="tutorial/how-to-change-my-privacy-settings.php">How to Change My Privacy Settings</a>
                                                    </li>
                                                    <li>
                                                        <a href="tutorial/how-to-update-my-details.php">How to Update My Details</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-toggle dropdown-hover" id="sidebarDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <h3>Messages <span class="caret"></span></h3>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="tutorial/how-to-send-a-message.php">How to Send a Message</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-toggle dropdown-hover" id="sidebarDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <h3>Friends <span class="caret"></span></h3>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="tutorial/how-to-send-a-friend-request.php">How to Send a Friend Request</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-toggle dropdown-hover" id="sidebarDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <h3>Bookings <span class="caret"></span></h3>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="tutorial/how-to-send-a-booking-request.php">How to Send a Booking Request</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-toggle dropdown-hover" id="sidebarDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <h3>T.L.D.O. Adventures (The Shop) <span class="caret"></span></h3>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="tutorial/how-to-navigate-my-library.php">How to Navigate My Library</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-toggle dropdown-hover" id="sidebarDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <h3>Detect Adventure <span class="caret"></span></h3>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="tutorial/how-to-create-an-event.php">How to Create an Event</a>
                                                    </li>
                                                    <li>
                                                        <a href="tutorial/how-to-navigate-my-events-manager.php">How to Navigate My Events Manager</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="dropdown">
                                                <a class="dropdown-toggle dropdown-hover" id="sidebarDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <h3>Adventure Manager <span class="caret"></span></h3>
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a href="tutorial/how-to-create-a-character.php">How to Create a Character</a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
                <div class="col-sm-3 sidebarContainer" id="sidebarDesk">
                    <div role="navigation" class="navbar navbar-collapse collapse navbar-sidebar-collapse navbar-sidebar-custom" aria-expanded="false">
                            <div class="sidebar-header">
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div role="heading" class="sectionHeader">
                                        <h4>Account Tutorials</h4>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="tutorial/how-to-signup.php">How to Sign Up</a>
                                        </li>
                                        <li>
                                            <a href="tutorial/how-to-login.php">How to Log In</a>
                                        </li>
                                        <li>
                                            <a href="tutorial/how-to-recover-my-password.php">How to Recover My Password</a>
                                        </li>
                                        <li>
                                            <a href="tutorial/how-to-navigate-the-profilebar.php">How to Navigate The Profile Bar</a>
                                        </li>
                                        <li>
                                            <a href="tutorial/how-to-change-my-profile-picture.php">How to Change My Profile Picture</a>
                                        </li>
                                        <li>
                                            <a href="tutorial/how-to-change-my-privacy-settings.php">How to Change My Privacy Settings</a>
                                        </li>
                                        <li>
                                            <a href="tutorial/how-to-update-my-details.php">How to Update My Details</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-12">
                                    <div role="heading" class="sectionHeader">
                                        <h4>Messages</h4>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="tutorial/how-to-send-a-message.php">How to Send a Message</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-12">
                                    <div role="heading" class="sectionHeader">
                                        <h4>Friends</h4>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="tutorial/how-to-send-a-friend-request.php">How to Send a Friend Request</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-12">
                                    <div role="heading" class="sectionHeader">
                                        <h4>Bookings</h4>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="tutorial/how-to-send-a-booking-request.php">How to Send a Booking Request</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-12">
                                    <div role="heading" class="sectionHeader">
                                        <h4>T.L.D.O. Adventures (The Shop)</h4>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="tutorial/how-to-navigate-my-library.php">How to Navigate My Library</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-12">
                                    <div role="heading" class="sectionHeader">
                                        <h4>Detect Adventure</h4>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="tutorial/how-to-create-an-event.php">How to Create an Event</a>
                                        </li>
                                        <li>
                                            <a href="tutorial/how-to-navigate-my-events-manager.php">How to Navigate My Events Manager</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-sm-12">
                                    <div role="heading" class="sectionHeader">
                                        <h4>Adventure Manager</h4>
                                    </div>
                                    <ul>
                                        <li>
                                            <a href="tutorial/how-to-create-a-character.php">How to Create a Character</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-sm-9">
                    <div class="" id="lessonContainer">
                        <h1>Welcome to the Seraphim Help Centre</h1>
                        
                        <h2>Click on the links in the toolbar to navigate to a tutorial</h2>
                        
                        <h4>Each tutorial page has a step by step breakdown of how to use the features found in thelittledarkone.com</h4>
                        
                        <h4>Alternatively, you can use the Help Centre Forum (link located in the footer under the Help dropdown) where users can offer advice to one another regarding the various uses of the tools offered by thelittledarkone.com</h4>
                        
                        <h4>If you are still having trouble with using all of the features offered here, you can always contact us directly by using the contact form located on the Contact page (link located in the footer under the Contact link)</h4>
                    </div>
                </div>
            </div>
        </div>
        
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
        
        <script src="js/sticky.js"></script>
        <script src="js/nav.js"></script>
      <script src="js/user.js"></script>
    
      </body>
</html>