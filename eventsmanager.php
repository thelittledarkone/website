<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}

include('./php/connection.php');

//Get user id
$user_id = $_SESSION['user_id'];
$_SESSION['uri'] = $_SERVER['REQUEST_URI'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Detect Adventure - Events Near Me</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <meta name="description" content="#">
        <link rel="icon" href="#">
        <!-- Bootstrap & Fonts CSS -->
        <link rel="stylesheet" href="boot/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css2?family=Frijole&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Ceviche+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Waiting+for+the+Sunrise&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <!--        JQuery & Bootstrap JS Scripts-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="boot/js/bootstrap.min.js"></script>
<!--        JQuery UI-->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/eggplant/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!--        Custom Styling-->
        <link rel="stylesheet" href="calendar/css/calendar.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/detectadventurestyle.css">
        <link rel="stylesheet" href="css/headerless.css">
        
        
    </head>
    <body>
        
<!--        Navigation-->
        <?php
        if(isset($_SESSION["user_id"])){
            include("navbarconnected.php");
            include("calendarsearch.php");
        }else{
            include("navbarnotconnected.php");
        }
        
        ?>
        
<!--        Main Content-->
        <div class="jumbotron" id="myContainer">
            
                <div class="container" id="myEventContainer">
                    <div id="alert" class="alert alert-danger collapse">
                        <a class="close" data-dismiss="alert">&times;</a>
                        <p id="alertContent"></p>
                    </div>
                    <div class="eventContainerTitles">
                        <p class="eventTitle">Events I'm Hosting:</p>
                        <p class="eventTitlePhone">Events<br> I'm Hosting:</p>
                        <form class="addEventForm">
                            <button type="button" id="addEvent" class="btn btn-lg btnDone" data-toggle="modal" data-target="#addEventModal">Add Event</button>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="myEvents" class="events">
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>

        <!--        Add Events Modal-->
        <form method="post" id="addEventForm">
            <div class="modal" id="addEventModal" role="dialog" aria-labelledby="addEventModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <h4 id="addEventModalLabel">New Event:</h4>
                        </div>
                        <div class="modal-body">
<!--                            Add Event message for php file-->
                            <div id="addEventMessage"></div>
<!--                            Create Event form-->
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="eventAddress" id="home" value="H">
                                    Use Home Address                          
                                </label>
                                <label>
                                    <input type="radio" name="eventAddress" id="venue" value="V">
                                    Use Venue Address                           
                                </label>
                            </div>
                            <div class="form-group venue">
                                <label for="venueAddress1" class="sr-only">Address 1</label>
                                <input class="form-control" type="text" id="venueAddress1" name="venueAddress1" placeholder="Address" maxlength="50">
                            </div>
                            <div class="form-group venue">
                                <label for="venueAddress2" class="sr-only">Address 2</label>
                                <input class="form-control" type="text" id="venueAddress2" name="venueAddress2" placeholder="Address Line 2" maxlength="50">
                            </div>
                            <div class="form-group venue">
                                <label for="venueDistrict" class="sr-only">District</label>
                                <input class="form-control" type="text" id="venueDistrict" name="venueDistrict" placeholder="District" maxlength="20">
                            </div>
                            <div class="form-group venue">
                                <label for="venueCity" class="sr-only">City</label>
                                <input class="form-control" type="text" id="venueCity" name="venueCity" placeholder="City" maxlength="20">
                            </div>
                            <div class="form-group venue">
                                <label for="venuePostcode" class="sr-only">Postcode</label>
                                <input class="form-control" type="text" id="venuePostcode" name="venuePostcode" placeholder="Post/Zip Code" maxlength="10">
                            </div>
                            <div class="form-group">
                                <label for="name" class="sr-only">Name</label>
                                <input class="form-control" type="text" id="name" name="name" placeholder="Name of Event" maxlength="50">  
                            </div> 
                            <div class="form-group">
                                <label for="game" class="sr-only">Game</label>
                                <input class="form-control" type="text" id="game" name="game" placeholder="Game you are Playing" maxlength="50">  
                            </div> 
                            <div class="form-group">
                                <label for="edition" class="sr-only">Edition</label>
                                <input class="form-control" type="text" id="edition" name="edition" placeholder="What Edition/Set? (Optional)" maxlength="50">  
                            </div> 
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="eventtype" id="open" value="o" checked>
                                    Open Event                                
                                </label>
                                <label>
                                    <input type="radio" name="eventtype" id="limited" value="l">
                                    Limited Seating                                
                                </label>
                            </div>
                            <div class="form-group limitedSeats">
                                <label for="seats" class="sr-only">Places</label>
                                <input class="form-control" type="number" id="seats" name="seats" placeholder="Seats Available (Max: 8)">  
                            </div>
                            <div class="form-group">
                                <label for="moreEventInfo">About the Event: </label>
                                <textarea name="moreEventInfo" class="form-control" id="moreEventInfo" rows="5" maxlength="300"></textarea>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="regular" id="yes" value="Y">
                                    Regular                                
                                </label>
                                <label>
                                    <input type="radio" name="regular" id="no" value="N">
                                    One-off                                
                                </label>
                            </div>
                            <div class="checkbox checkbox-inline regular">
                                <label>
                                    <input type="checkbox" name="monday" id="monday" value="1">
                                    Monday                               
                                </label>
                                <label>
                                    <input type="checkbox" name="tuesday" id="tuesday" value="1">
                                    Tuesday                               
                                </label>
                                <label>
                                    <input type="checkbox" name="wednesday" id="wednesday" value="1">
                                    Wednesday                              
                                </label>
                                <label>
                                    <input type="checkbox" name="thursday" id="thursday" value="1">
                                    Thursday                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="friday" id="friday" value="1">
                                    Friday                               
                                </label>
                                <label>
                                    <input type="checkbox" name="saturday" id="saturday" value="1">
                                    Saturday                              
                                </label>
                                <label>
                                    <input type="checkbox" name="sunday" id="sunday" value="1">
                                    Sunday                               
                                </label>
                            </div>
                            <div class="form-group oneOff">
                                <label for="date" class="sr-only">Date</label>
                                <input class="form-control" readonly="readonly" id="date" name="date">
                                <input type="hidden" id="dbDate" name="dbDate">
                            </div>
                            <div class="form-group regular oneOff">
                                <label for="time" class="sr-only">Time</label>
                                <input class="form-control" type="time" id="time" name="time">  
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="createTrip" type="submit" value="Create Event">
                            <button type="button" class="btn cancelBtn" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
        <!--        Edit Events Modal-->
        <form method="post" id="editEventsForm">
            <div class="modal" id="editEventModal" role="dialog" aria-labelledby="editEventModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <h4 id="editEventModalLabel">Edit Event:</h4>
                        </div>
                        <div class="modal-body">
<!--                            Edit Trip message for php file-->
                            <div id="editEventMessage"></div>
                            
<!--                            Edit Trip form-->
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="editEventAddress" id="editHome" value="H">
                                    Use Home Address                          
                                </label>
                                <label>
                                    <input type="radio" name="editEventAddress" id="editVenue" value="V">
                                    Use Venue Address                           
                                </label>
                            </div>
                            <div class="form-group editVenue">
                                <label for="editVenueAddress1" class="sr-only">Address 1</label>
                                <input class="form-control" type="text" id="editVenueAddress1" name="editVenueAddress1" placeholder="Address" maxlength="50">
                            </div>
                            <div class="form-group editVenue">
                                <label for="editVenueAddress2" class="sr-only">Address 2</label>
                                <input class="form-control" type="text" id="editVenueAddress2" name="editVenueAddress2" placeholder="Address Line 2" maxlength="50">
                            </div>
                            <div class="form-group editVenue">
                                <label for="editVenueDistrict" class="sr-only">District</label>
                                <input class="form-control" type="text" id="editVenueDistrict" name="editVenueDistrict" placeholder="District" maxlength="20">
                            </div>
                            <div class="form-group editVenue">
                                <label for="editVenueCity" class="sr-only">City</label>
                                <input class="form-control" type="text" id="editVenueCity" name="editVenueCity" placeholder="City" maxlength="20">
                            </div>
                            <div class="form-group editVenue">
                                <label for="editVenuePostcode" class="sr-only">Postcode</label>
                                <input class="form-control" type="text" id="editVenuePostcode" name="editVenuePostcode" placeholder="Post/Zip Code" maxlength="10">
                            </div>
                            <div class="form-group">
                                <label for="editName" class="sr-only">Name</label>
                                <input class="form-control" type="text" id="editName" name="editName" placeholder="Name of Event" maxlength="50">  
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="editEventGame" id="editChangeGame" value="C">
                                    Change Game                        
                                </label>
                                <label>
                                    <input type="radio" name="editEventGame" id="editLeaveGame" value="L">
                                    Leave Game as is                           
                                </label>
                            </div>
                            <div class="form-group editGame">
                                <label for="editGame" class="sr-only">Game</label>
                                <input class="form-control" type="text" id="editGame" name="editGame" placeholder="Game you are Playing" maxlength="50">  
                            </div>
                            <div class="form-group editGame">
                                <label for="editEdition" class="sr-only">Edition</label>
                                <input class="form-control" type="text" id="editEdition" name="editEdition" placeholder="What Edition/Set? (Optional)" maxlength="50">  
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="editeventtype" id="editOpen" value="o">
                                    Open Event                                
                                </label>
                                <label>
                                    <input type="radio" name="editeventtype" id="editLimited" value="l">
                                    Limited Seating                                
                                </label>
                            </div>
                            <div class="form-group editLimitedSeats">
                                <label for="editSeats">Seats Left</label>
                                <input class="form-control" type="number" id="editSeats" name="editSeats" placeholder="Seats Available (Max: 8)">  
                            </div>
                            <div class="form-group">
                                <label for="editEventInfo">About the Event: </label>
                                <textarea name="editEventInfo" class="form-control" id="editEventInfo" rows="5" maxlength="300"></textarea>
                            </div>
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="editRegular" id="editYes" value="Y">
                                    Regular                                
                                </label>
                                <label>
                                    <input type="radio" name="editRegular" id="editNo" value="N">
                                    One-off                                
                                </label>
                            </div>
                            <div class="checkbox checkbox-inline regularEdit">
                                <label>
                                    <input type="checkbox" name="editMonday" id="editMonday" value="1">
                                    Monday                               
                                </label>
                                <label>
                                    <input type="checkbox" name="editTuesday" id="editTuesday" value="1">
                                    Tuesday                               
                                </label>
                                <label>
                                    <input type="checkbox" name="editWednesday" id="editWednesday" value="1">
                                    Wednesday                              
                                </label>
                                <label>
                                    <input type="checkbox" name="editThursday" id="editThursday" value="1">
                                    Thursday                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="editFriday" id="editFriday" value="1">
                                    Friday                               
                                </label>
                                <label>
                                    <input type="checkbox" name="editSaturday" id="editSaturday" value="1">
                                    Saturday                              
                                </label>
                                <label>
                                    <input type="checkbox" name="editSunday" id="editSunday" value="1">
                                    Sunday                               
                                </label>
                            </div>
                            <div class="form-group oneOffEdit">
                                <label for="editDate" class="sr-only">Date</label>
                                <input class="form-control" readonly="readonly" id="editDate" name="editDate">
                                <input type="hidden" id="editdbDate" name="dbDate">
                            </div>
                            <div class="form-group regularEdit oneOffEdit">
                                <label for="editTime" class="sr-only">Time</label>
                                <input class="form-control" type="time" id="editTime" name="editTime">  
                            </div>
                            <div class="form-group attendeeEdit">
                                <label for="editattendee" class="sr-only">Attendees</label>
                                <input class="form-control" type="number" id="editattendee" name="editattendee">  
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="editEvent" type="submit" value="Edit Event">
                            <input class="btn btn-danger" name="deleteEvent" id="deleteEvent" value="Delete" type="button">
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
        
        <!--        Calender CDN-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
        <script src="calendar/js/calendar.js"></script>

<!--        Custom JS        -->
        <script src="js/sticky.js"></script>
        <script src="js/nav.js"></script>
        <script src="js/mycalendar.js"></script>
        <script src="js/eventsmanager.js"></script>
        <script>
            $(function(){
                $("#search").addClass('active');
            });
        </script>
    </body>