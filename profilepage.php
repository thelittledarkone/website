<?php
session_start();
//<!--Connect to database-->
include('./php/connection.php');
include('./php/rememberme.php');

//Get user id
$user_id = $_SESSION['user_id'];
$profile_name = $_GET["username"];
$_SESSION['profile_name'] = $profile_name;

if($profile_name == 'Not Yet Registered'){
    if(isset($_SERVER["HTTP_REFERER"])){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Profile</title>
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
        
<!--        Main Content-->
        <div class="container" id="profileContainer">
            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <div id="profilePageDetails" class=""></div>
                    
                    <?php
            if(isset($_SESSION["user_id"])){
                echo "<h3>Upcoming One-Off Events $profile_name is <strong>HOSTING:</strong></h3>
                    <div>
                        <div class='expandable__btn__wrapper' data-js-expander>
                            <button class='btn expandable__btn'></button>
                        </div>
                        <div class='expandable profileAttendingContainer' data-js-expandable>
                            <div class='innerContent' data-js-expandable-inner>
                                <div id='myEvents' class='events'></div>
                            </div>
                        </div>
                    </div>
                    <h3>Upcoming One-Off Events $profile_name is <strong>ATTENDING</strong></h3>
                    <div>
                        <div class='expandable__btn__wrapper' data-js-expander>
                            <button class='btn expandable__btn'></button>
                        </div>
                        <div class='expandable profileAttendingContainer' data-js-expandable>
                            <div class='innerContent' data-js-expandable-inner>
                                <div id='myAttendEvents' class='events'></div>
                                <div id='myOpenAttendEvents' class='events'></div>
                            </div>
                        </div>
                    </div>
                    <h3>Latest Regular Events $profile_name is <strong>HOSTING:</strong></h3>
                    <div>
                        <div class='expandable__btn__wrapper' data-js-expander>
                            <button class='btn expandable__btn'></button>
                        </div>
                        <div class='expandable profileAttendingContainer' data-js-expandable>
                            <div class='innerContent' data-js-expandable-inner>
                                <div id='myRegEvents' class='events'></div>
                            </div>
                        </div>
                    </div>
                    <h3>Latest Regular Events $profile_name is <strong>ATTENDING</strong></h3>
                    <div>
                        <div class='expandable__btn__wrapper' data-js-expander>
                            <button class='btn expandable__btn'></button>
                        </div>
                        <div class='expandable profileAttendingContainer' data-js-expandable>
                            <div class='innerContent' data-js-expandable-inner>
                                <div id='myRegAttendEvents' class='events'></div>
                                <div id='myRegOpenAttendEvents' class='events'></div>
                            </div>
                        </div>
                    </div>";
                    }else{
                echo "<div class='alert alert-info'>Please Login or Sign Up for free to see events near you</div>";
            }
            ?>
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
        
        <!--        Send Friend Request Modal-->
        <form method="post" id="sendFriendRequestForm">
            <div class="modal" id="sendFriendRequestModal" role="dialog" aria-labelledby="sendFriendRequestModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <h4 id="sendFriendRequestModalLabel">Friend Request:</h4>
                        </div>
                        <div class="modal-body">
<!--                            Add Event message for php file-->
                            <div id="sendFriendRequestMessage"></div>
<!--                            Send Message form-->
                            <div class="form-group">
                                <label for="friendMessage">Add Message? <i>(optional)</i> </label>
                                <textarea name="friendMessage" class="form-control" id="friendMessage" rows="5"></textarea>
                            </div>
                            <div>By clicking the 'Send Friend Request' button, you are accepting that you wish to become friends with the user. You will only be messaged by the system if your friend request is successfully accepted.</div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="friendrequest" type="submit" value="Send Friend Request">
                            <button type="button" class="btn cancelBtn" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
        
        <!--        Send Booking Request Modal-->
        <form method="post" id="sendBookingRequestForm">
            <div class="modal" id="sendBookingRequestModal" role="dialog" aria-labelledby="sendBookingRequestModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <h4 id="sendBookingRequestModalLabel">Request Seat:</h4>
                        </div>
                        <div class="modal-body">
<!--                            Add Event message for php file-->
                            <div id="sendBookingRequestMessage"></div>
<!--                            Send Message form-->
                            <div class="form-group">
                                <label for="bookingMessage">Add Message? <i>(optional)</i> </label>
                                <textarea name="bookingMessage" class="form-control" id="bookingMessage" rows="5"></textarea>
                            </div>
                            <div>By clicking the 'Request Seat' button, you are accepting that you wish to book a seat to this event. The event organiser will be in contact with you to let you know if you have been assigned a seat at the table.</div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="bookseat" type="submit" value="Request Seat">
                            <button type="button" class="btn cancelBtn" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
        
        <!--        Send Message Modal-->
        <form method="post" id="sendMessageForm">
            <div class="modal" id="sendMessageModal" role="dialog" aria-labelledby="sendMessageModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <h4 id="sendMessageModalLabel">Send Message:</h4>
                        </div>
                        <div class="modal-body">
<!--                            Add Event message for php file-->
                            <div id="sendMessageMessage"></div>
<!--                            Send Message form-->
                            <div class="form-group">
                                <label class="input-group-text" for="messageType">Message Type:</label>
                                <select class="custom-select" id="messageType" name="messageType">
                                    <option selected>Choose...</option>
                                    <option value="q">Question</option>
                                    <option value="z">Feedback</option>
                                    <option value="o">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="messageSubject" class="sr-only">Subject</label>
                                <input class="form-control" type="text" id="messageSubject" name="messageSubject" placeholder="Subject" maxlength="50">  
                            </div> 
                            <div class="form-group">
                                <label for="messageContent">Message: </label>
                                <textarea name="messageContent" class="form-control" id="messageContent" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="sendMessage" type="submit" value="Send Message">
                            <button type="button" class="btn cancelBtn" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
        
        
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
        <script src="js/profilepage.js"></script>
<!--        <script src="profile.js"></script>-->
        <script>
            $(function(){
                $("#profile").addClass('active');
            });
        </script>
    </body>
</html>