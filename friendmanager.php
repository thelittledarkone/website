<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
//<!--Connect to database-->
include('./php/connection.php');
//Get user id
$user_id = $_SESSION['user_id'];


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Messages</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <meta name="description" content="#">
        <link rel="icon" href="#">
        <!-- Bootstrap & Fonts CSS -->
        <link rel="stylesheet" href="boot/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Ceviche+One&display=swap" rel="stylesheet">
        <!--        JQuery & Bootstrap JS Scripts-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="boot/js/bootstrap.min.js"></script>
<!--        JQuery UI-->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/eggplant/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!--        Custom Styling-->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/profilestyle.css">
        <link rel="stylesheet" href="css/damanagerstyle.css">
        <link rel="stylesheet" href="css/headerless.css">
    </head>
    <body>
<!--        Navigation-->
        <?php
        include("navbarconnected.php");
        include("searchonly.php");
        ?>
        
<!--        Main Content-->
        <div class="container" id="messageContainer">
            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <h2>Friend Manager</h2>
                        <ul class="nav nav-pills pillsContainer">
                            <li class="active"><a data-toggle="pill" href="#friends">Friends</a></li>
                            <li><a data-toggle="pill" href="#all">Unread</a></li>
                            <li><a data-toggle="pill" href="#unresolved">Unresolved</a></li>
                            <li><a data-toggle="pill" href="#complete">Completed</a></li>
                            <li><a data-toggle="pill" href="#friendRequests">My Requests</a></li>
                            <li><a data-toggle="pill" href="#friendResponses">Responses</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="friends" class="tab-pane fade in active">
                            <h3>My Friends</h3>
                                <div class="row">
                                    <div id="allFriends"></div>
                                </div>
                          </div>
                            <div id="all" class="tab-pane fade">
                                <button class='btn btn-danger pull-right deleteAllBookings' id='f' name='deletemessage' type='button'>Delete ALL</button>
                            <h3>All Unread Friend Requests</h3>
                              <div id="allFriendRequests"></div>
                          </div>
                            <div id="unresolved" class="tab-pane fade">
                                <button class='btn btn-danger pull-right deleteAllUnresolvedBookings' id='f' name='deletemessage' type='button'>Delete ALL</button>
                            <h3>Unresolved Requests</h3>
                              <div id="unresolvedFR"></div>
                          </div>
                            <div id="complete" class="tab-pane fade">
                                <button class='btn btn-danger pull-right deleteAllCompletedBookings' id='f' name='deletemessage' type='button'>Delete ALL</button>
                            <h3>Completed Requests</h3>
                                <div id="completeFR"></div>
                          </div>
                            <div id="friendRequests" class="tab-pane fade">
                                <button class='btn btn-danger pull-right deleteAllBookingRequests' id='f' name='deletemessage' type='button'>Delete ALL</button>
                            <h3>My Friend Requests</h3>
                              <div id="myFriendRequests"></div>
                          </div>
                            <div id="friendResponses" class="tab-pane fade">
                                <button class='btn btn-danger pull-right deleteAllBookingResponses' id='r' name='deletemessage' type='button'>Delete ALL</button>
                            <h3>Responses to My Friend Requests</h3>
                              <div id="myFriendResponses"></div>
                          </div>
                        </div>
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
        
        <script src="js/sticky.js"></script>
        <script src="js/nav.js"></script>
        <script src="js/friendmanager.js"></script>
        <script>
            $(function(){
                $("#profile").addClass('active');
            });
        </script>
    </body>
</html>