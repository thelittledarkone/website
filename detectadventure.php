<?php
session_start();
include('./php/connection.php');
//remember me
include('./php/rememberme.php');

$_SESSION['uri'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Detect Adventure - Find a Boardgame Group Near You!</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <meta name="description" content="thelittledarkone's Detect Adventure. Find friends to play boardgames with near you! Sign up to our free webapp and start posting events or joining other gamers at events and start building a boardgame community near you. Find friends near you and arrange your own tabletop boardgame events!">
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
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
        <script src="boot/js/bootstrap.min.js"></script>
<!--        JQuery UI-->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/eggplant/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!--        Custom Styling-->
        <link rel="stylesheet" href="calendar/css/calendar.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/detectadventurestyle.css">
        
        
    </head>
    <body>
        <!--    Header-->
      <div class="jumbotron pageHeader" id="daPageHead">
        <div class="container headerContainer">
            <img src="css/images/pngfind.com-map-png-545029.png" class="logo">
            <h1>Detect Adventure</h1>  
        </div>
      </div>
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
                            <span style='color:#800080;'>⬤</span> Limited Event<br /><span style='color:#e3bc08;'>⬤</span> Open Event <br /><span style='color:#1e90ff;'>⬤</span> Tournaments
                        </div>
                    </div>
                </div>	
            </div>
        </div>
    </div>
        
<!--        Main Content-->
        <div class="jumbotron" id="myContainer">
            <div id="tester"></div>
            <div id="intro" class="container-fluid">
                        <div class="carousel slide d-none d-md-block" id="myCarousel" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="myCarousel" data-slide-to="1"></li>
                                <li data-target="myCarousel" data-slide-to="2"></li>
                                <li data-target="myCarousel" data-slide-to="3"></li>
                                <li data-target="myCarousel" data-slide-to="4"></li>
                                <li data-target="myCarousel" data-slide-to="5"></li>
                                <li data-target="myCarousel" data-slide-to="6"></li>
                                <li data-target="myCarousel" data-slide-to="7"></li>
                                <li data-target="myCarousel" data-slide-to="8"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="daicon" src="css/images/pngfind.com-map-png-545029.png">
                                    <h1>Welcome to <i class="tldoCarousel">thelittledarkone's</i> Detect Adventure!</h1>
                                </div>
                                <div class="item">
                                    <img src="css/images/nearme.jpg">
                                    <h2>Find Events Near You!</h2>
                                </div>
                                <div class="item">
                                    <img src="css/images/nearme.jpg">
                                    <h2>Make New Friends With Similar Interests!</h2>
                                </div>
                                <div class="item">
                                    <img src="css/images/myevents.jpg">
                                    <h2>Create New Events to Host!</h2>
                                </div>
                                <div class="item">
                                    <img class="daicon" src="css/images/pngfind.com-map-png-545029.png">
                                    <h1>Join Our Growing Community Now!</h1>
                                </div>
                                <div class="item">
                                    <img src="css/images/eventdetails.jpg">
                                    <h2>Befriend Likeminded Board Gamers!</h2>
                                </div>
                                <div class="item">
                                    <img class="daicon" src="css/images/pngfind.com-map-png-545029.png">
                                    <h1>Sign Up Today, It's Completely Free!</h1>
                                </div>
                                <div class="item">
                                    <img src="css/images/nearme.jpg">
                                    <h2>Search for Events Near You!</h2>
                                </div>
                                <div class="item">
                                    <img class="daicon" src="css/images/pngfind.com-map-png-545029.png">
                                    <h1>Get Started With <i>Detect Adventure</i>!</h1>
                                </div>
                                <div class="item">
                                    <img src="css/images/eventdetails.jpg">
                                    <h2>Build a Local Board Game Community!</h2>
                                </div>
                            </div>
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>                
                        </div>
                    </div>
                    
            <?php
            if(!isset($_SESSION["user_id"])){
                echo "<button type='button' class='btn btn-lg btnColor btnSignup' data-target='#signupModal' data-toggle='modal'>Sign Up For Free!</button>";
            }else{
                echo '            
                <div class="row">
                    <div class="col-xs-7 col-sm-offset-1 col-sm-5 centredCell">
                        <h2>Quick Event Lookup</h2>
                    </div>
                    <div class="col-xs-3 col-sm-6">
                        <button type="button" id="addEvent" class="btn btn-lg btnDone" data-toggle="modal" data-target="#addEventModal">Add Event</button>
                    </div>
                </div>
                        <ul class="nav nav-pills pillsContainer eventPillsContainer navbar-center">
                          <li class="active"><a data-toggle="pill" href="#all">Near Me</a></li>
                          <li><a data-toggle="pill" href="#questions">Attending</a></li>
                          <li><a data-toggle="pill" href="#read">My Events</a></li>
                        </ul>
                        <div class="tab-content">
                          <div id="all" class="tab-pane fade active in">
                            <div class="container" id="nearEventContainer">
                                <div id="alert" class="alert alert-danger collapse">
                                    <a class="close" data-dismiss="alert">&times;</a>
                                    <p id="alertContentNear"></p>
                                </div>
                                <div class="row eventContainerTitles">
                                    <div class="col-sm-6">
                                        <h2 class="searchTitle">Events Near Me:</h2>
                                    </div>
                                    <div class="col-sm-offset-1 col-sm-5">
                                        <div class="buttons inlineButtons pull-right">
                                            <a type="button" href="eventsnearme.php" id="viewall1" class="btn btn-lg btnColor">VIEW ALL</a>
                                            <div class="eventcalenderbutton" id="eventcalenderbutton" data-toggle="tooltip" title="Open Event Calendar">
                                                <button class="btn btnDone"><i class="fa fa-calendar"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div id="myNearbyEvents" class="events">
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                            <div id="questions" class="tab-pane fade">
                            <ul class="nav nav-pills pillsContainer eventPillsContainer navbar-center">
                              <li class="active"><a data-toggle="pill" href="#limited">Limited</a></li>
                              <li><a data-toggle="pill" href="#open">Open</a></li>
                              <li><a data-toggle="pill" href="#tourn">Tournaments</a></li>
                            </ul>
                            <div class="tab-content">
                            <div id="limited" class="tab-pane fade active in">
                              <div class="container" id="eventAttendingContainer">
                                <div id="alert" class="alert alert-danger collapse">
                                    <a class="close" data-dismiss="alert">&times;</a>
                                    <p id="alertContent"></p>
                                </div>
                                <div class="row eventContainerTitles">
                                    <div class="col-sm-6">
                                        <h2>Limited Events I\'m Attending:</h2>
                                    </div>
                                    <div class="col-sm-offset-1 col-sm-5">
                                        <div class="buttons">
                                            <a type="button" href="attendinglevents.php" id="viewall1" class="btn btn-lg btnColor">VIEW ALL &#8658;</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div id="myAttendEvents" class="events">
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                            <div id="open" class="tab-pane fade">
                              <div class="container" id="eventOpenAttendingContainer">
                                <div id="alert" class="alert alert-danger collapse">
                                    <a class="close" data-dismiss="alert">&times;</a>
                                    <p id="alertContent"></p>
                                </div>
                                <div class="row eventContainerTitles">
                                    <div class="col-sm-6">
                                        <h2>Open Events I\'m Attending:</h2>
                                    </div>
                                    <div class="col-sm-offset-1 col-sm-5">
                                        <div class="buttons">
                                            <a type="button" href="attendingoevents.php" id="viewall1" class="btn btn-lg btnColor">VIEW ALL &#8658;</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div id="myOpenAttendEvents" class="events">
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <div id="tourn" class="tab-pane fade">
                              <div class="container" id="eventTournAttendingContainer">
                                <div id="alert" class="alert alert-danger collapse">
                                    <a class="close" data-dismiss="alert">&times;</a>
                                    <p id="alertContent"></p>
                                </div>
                                <div class="row eventContainerTitles">
                                    <div class="col-sm-6">
                                        <h2>Tournaments I\'m Attending:</h2>
                                    </div>
                                    <div class="col-sm-offset-1 col-sm-5">
                                        <div class="buttons">
                                            <a type="button" href="attendingtevents.php" id="viewall2" class="btn btn-lg btnColor">VIEW ALL &#8658;</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div id="myTournAttendEvents" class="events">
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                          </div>
                          </div>
                            <div id="read" class="tab-pane fade">
                              <div class="container" id="myEventContainer">
                                <div id="alert" class="alert alert-danger collapse">
                                    <a class="close" data-dismiss="alert">&times;</a>
                                    <p id="alertContent"></p>
                                </div>
                                <div class="row eventContainerTitles">
                                    <div class="col-sm-6">
                                        <h2>Events I\'m Hosting:</h2>
                                    </div>
                                    <div class="col-sm-offset-1 col-sm-5">
                                        <div class="buttons displayInline">
                                            <a type="button" href="eventsmanager.php" id="viewall1" class="btn btn-lg btnColor">VIEW ALL &#8658;</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div id="myEvents" class="events">
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                        </div>
                    
                ';
               
            }
            ?>
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

        <?php
            include("eventmanagementmodals.php");
            include("messagemanagermodals.php");
            
            ?>
        
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
        <script src="js/user.js"></script>
        <script src="js/events.js"></script>
        <script>
            $(function(){
                $("#search").addClass('active');
            });
        </script>
    </body>