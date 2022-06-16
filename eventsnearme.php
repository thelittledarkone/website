<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}

include('./php/connection.php');

//Get user id
$user_id = $_SESSION['user_id'];
$_SESSION['uri'] = $_SERVER['REQUEST_URI'];

unset($_SESSION['radius']);

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
        
        <!--      Event Calender-->
    <div class='eventCalenderExpandable' id="eventcalenderid">
        <div class="innereventcalenderexpandable">
            <div class="container">	
                <div class="row inlineButtons">
                    <div class="col-xs-6">
                        <h2>Events Near Me</h2>
                    </div>
                    <div class="col-xs-offset-1 col-xs-5">
                        <div class="eventclosecalenderbutton pull-right" id="eventclosecalenderbutton" data-toggle="tooltip" title="Close Event Calendar">
                            <button class="btn btnDone"><i class="fa fa-calendar"></i></button>
                        </div>
                    </div>
                </div>
                
                <div class="page-header">
                    <div class="pull-right form-inline">
                        <div class="btn-group">
                            <button class="btn btnDone" data-calendar-view="year">Year</button>
                            <button class="btn btnDone active" data-calendar-view="month">Month</button>
                            <button class="btn btnDone" data-calendar-view="week">Week</button>
                        </div>
                        <div class="btn-group">
                            <button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
                            <button class="btn cancelBtn" data-calendar-nav="today">Today</button>
                            <button class="btn btn-primary" data-calendar-nav="next">Next >></button>
                        </div>
                    </div>
                    <h3></h3>
                </div>
                <div class="row">
                    <div class="col-md-9">
                        <div id="showEventCalendar"></div>
                    </div>
                    <div class="col-md-3">
                        <h4>All Events List</h4>
                        <ul id="eventlist" class="nav nav-list"></ul>
                        <div class='myCalendarKey' style='border-top:solid 1px slategray;margin-top:30px;'>
                            <h5>Events Key</h5>
                            <span style='color:#800080;'>⬤</span> Limited Event<br /><span style='color:#e3bc08;'>⬤</span> Open Event
                        </div>
                    </div>
                </div>	
            </div>
        </div>
    </div>
        
<!--        Main Content-->
        <div class="jumbotron" id="myContainer">
            <div class="container" id="nearEventContainer">
                <div id="alert" class="alert alert-danger collapse">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <p id="alertContentNear"></p>
                </div>
                <div class="eventContainerTitles">
                    <p class="eventTitle">Events Near Me:</p>
                    <p class="eventTitlePhone">Events<br> Near Me:</p>
                    <form class="radiusForm">
                        <label for="radius" id="radiusLabel">Radius:</label>
                        <select name="radius" id="radius">
                          <option value="" selected>Default</option>
                          <option value="5">5 Miles</option>
                          <option value="10">10 Miles</option>
                          <option value="15">15 Miles</option>
                          <option value="20">20 Miles</option>
                          <option value="30">30 Miles</option>
                          <option value="50">50 Miles</option>
                          <option value="80">80 Miles</option>
                          <option value="100">100 Miles</option>
                        </select>
                        <button class="btn btn-sm btnColor radiusBtn" id="radiusBtn" type="button">&#x1F50E;&#xFE0E;</button>
                    </form>
                    <div class="eventcalenderbutton" id="eventcalenderbutton" data-toggle="tooltip" title="Open Event Calendar">
                        <button class="btn btnDone radiusBtn"><i class="fa fa-calendar"></i></button>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div id="myNearbyEvents" class="events"></div>
                        <div id="radiusmessage"></div>
                    </div>
                </div>
            </div>
        </div>

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
        <script src="js/eventcalendar.js"></script>
        <script src="js/eventsnearme.js"></script>
        <script>
            $(function(){
                $("#search").addClass('active');
            });
        </script>
    </body>