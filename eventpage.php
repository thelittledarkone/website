<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
//<!--Connect to database-->
include('./php/connection.php');
//Get user id
$user_id = $_SESSION['user_id'];
$event_id = $_GET["event_id"];
$_SESSION['event_id'] = $event_id;

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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Ceviche+One&display=swap" rel="stylesheet">
        <!--        JQuery & Bootstrap JS Scripts-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="boot/js/bootstrap.min.js"></script>
<!--        JQuery UI-->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/eggplant/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!--        Custom Styling-->
        <link rel="stylesheet" href="calendar/css/calendar.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/profilestyle.css">
        <link rel="stylesheet" href="css/damanagerstyle.css">
        <link rel="stylesheet" href="css/headerless.css">
    </head>
    <body>
<!--        Navigation-->
        <?php
        include("navbarconnected.php");
        include("calendarsearch.php");
        ?>
        
<!--        Main Content-->
        <div class="container" id="messageContainer">
            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <div id="eventPageDetails" class=""></div>
                </div>
                <div id="eventMessage"></div>
            </div>
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
        
<!--        Create Party Preferences-->
        <form method="post" id="createPartyForm">
            <div class="modal" id="createPartyModal" role="dialog" aria-labelledby="createPartyLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a class="close" data-dismiss="modal">&times;</a>
                            <h4 id="createPartyLabel">Fill in your rules preferences for the game. These rules will be applied to all player's characters during the event.</h4>
                        </div>
                        <div class="modal-body">

                            <div id="createPartyMessage"></div>
                            
                            <div class="form-group">
                                <label for="gamePlaying">Game Playing</label>
                                <select name="gamePlaying" id="gamePlaying">
                                  <option value="5e" selected>DnD 5th Ed</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="roll">Rolling Preferences</label>
                                <select name="roll" id="roll">
                                  <option value="0" selected>Manual</option>
                                  <option value="1">Random Number Generator</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="ability">Ability Score Generation</label>
                                <select name="ability" id="ability">
                                  <option value="0" selected>Standard Array</option>
                                  <option value="1">Standard Roll</option>
                                  <option value="2">Roll and Subtract</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="hp">Hit Point Leveling</label>
                                <select name="hp" id="hp">
                                  <option value="0" selected>Average HP</option>
                                  <option value="1">Roll for HP</option>
                                  <option value="2">Max HP</option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="createParty" type="submit" value="Create Party">
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
        
<!--        Calender CDN-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
        <script src="calendar/js/calendar.js"></script>

<!--        Custom JS        -->
        <script src="js/sticky.js"></script>
        <script src="js/nav.js"></script>
        <script src="js/mycalendar.js"></script>
        <script src="js/eventpage.js"></script>
<!--        <script src="profile.js"></script>-->
        
    </body>
</html>