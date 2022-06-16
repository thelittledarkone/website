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
                    <h2>Messages</h2>
                        <ul class="nav nav-pills pillsContainer">
                          <li class="active"><a data-toggle="pill" href="#all">Unread</a></li>
                          <li><a data-toggle="pill" href="#questions">Questions</a></li>
                          <li><a data-toggle="pill" href="#feedback">Feedback</a></li>
                          <li><a data-toggle="pill" href="#other">Other</a></li>
                          <li><a data-toggle="pill" href="#read">Read</a></li>
                          <li><a data-toggle="pill" href="#sent">Sent</a></li>
                          <li><a data-toggle="pill" href="#saved">Saved</a></li>
                        </ul>
                        <div class="tab-content">
                          <div id="all" class="tab-pane fade in active">
                              <button class='btn btn-danger pull-right deleteAll' id='0' name='deletemessage' type='button'>Delete ALL</button>
                            <h3>All Unread Messages</h3>
                              <div id="allMessages"></div>
                          </div>
                            <div id="questions" class="tab-pane fade">
                                <button class='btn btn-danger pull-right deleteAllQuestions' id='q' name='deletemessage' type='button'>Delete ALL</button>
                            <h3>Questions</h3>
                              <div id="allQuestions"></div>
                          </div>
                            <div id="feedback" class="tab-pane fade">
                                <button class='btn btn-danger pull-right deleteAllQuestions' id='z' name='deletemessage' type='button'>Delete ALL</button>
                            <h3>Feedback</h3>
                              <div id="allFeedback"></div>
                          </div>
                            <div id="other" class="tab-pane fade">
                                <button class='btn btn-danger pull-right deleteAllQuestions' id='o' name='deletemessage' type='button'>Delete ALL</button>
                            <h3>Other Messages</h3>
                                <div id="otherMessages"></div>
                          </div>
                            <div id="read" class="tab-pane fade">
                                <button class='btn btn-danger pull-right deleteAll' id='1' name='deletemessage' type='button'>Delete ALL</button>
                            <h3>Read Messages</h3>
                                <div id="readMessages"></div>
                          </div>
                            <div id="sent" class="tab-pane fade">
                                <button class='btn btn-danger pull-right deleteAllSent' name='deletemessage' type='button'>Delete ALL</button>
                            <h3>Sent Messages</h3>
                                <div id="sentMessages"></div>
                          </div>
                            <div id="saved" class="tab-pane fade">
                            <h3>Saved Messages</h3>
                                <div id="savedMessages"></div>
                          </div>
                        </div>
                </div>
            </div>
        </div>
            
 <div id="all" class="tab-pane fade">
                                
                            <h3>All Unread Friend Requests</h3>
                              <div id="allFriendRequests"></div>
                          </div>
                            <div id="unresolved" class="tab-pane fade">
                                
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
        
        <!--    Footer-->
       <?php include("footer.php"); ?>

        <!--        Spinner-->
        <div id="spinner">
            <img src="css/images/ajax-loader.gif" width="64" height="64"/>
            <br /> Loading ...
        </div>  
        
        <script src="js/sticky.js"></script>
        <script src="js/nav.js"></script>
        <script src="js/messages.js"></script>
        <script>
            $(function(){
                $("#profile").addClass('active');
            });
        </script>
    </body>
</html>