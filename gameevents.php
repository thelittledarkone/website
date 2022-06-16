<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}

include('./php/connection.php');

//Get user id
$user_id = $_SESSION['user_id'];
$_SESSION['uri'] = $_SERVER['REQUEST_URI'];
$game_id = $_GET["game"];
$_SESSION['game_id'] = $game_id;
$edition = $_GET["edition"];
$_SESSION['edition_id'] = $edition;

if(isset($_GET["game_name"])){
    $game_name = $_GET["game_name"];
    $_SESSION['game_name'] = $game_name;
}else{
    $sql0 = "SELECT * FROM games WHERE game_id='$game_id' LIMIT 1";
    $result0 = mysqli_query($link, $sql0);
    if($result0){
        if(mysqli_num_rows($result0)>0){
            $row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC);
            $game_name = $row0['game_name'];
        }         
    }
}

$sql = "SELECT * FROM game_editions WHERE edition_id='$edition' LIMIT 1";
$result = mysqli_query($link, $sql);
if($result){
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $edition_name = $row['edition_name'];
    }         
}

unset($_SESSION['radius']);

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Game - Events Near Me</title>
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
                            <span style='color:#800080;'>⬤</span> Limited Event<br /><span style='color:#e3bc08;'>⬤</span> Open Event<br /> <span style='color:#1e90ff;'>⬤</span> Tournaments<br />
                            <span style='color:#006400;'>⬤</span> Events Playing <?php
                                echo "<i>$game_name<i>";
                                
                            ?>
                        </div>
                    </div>
                </div>	
            </div>
        </div>
    </div>
        
<!--        Main Content-->
        <div class="jumbotron" id="myContainer">
            <div id="tester"></div>
            <div class="container" id="nearEventContainer">
                <?php
                if(isset($_GET["edition"])){
                    echo "<p class='editioneventTitle'>$game_name</p>
                        <p class='editioneventTitle'><i>$edition_name</i></p>";
                }else{
                    echo "<p class='gameeventTitle'>$game_name</p>";
                }
                ?>
                
                <div id="alert" class="alert alert-danger collapse">
                    <a class="close" data-dismiss="alert">&times;</a>
                    <p id="alertContentNear"></p>
                </div>
                <div class="eventContainerTitles">
                    <p class="eventTitle">Events Near Me:</p>
                    <p class="eventTitlePhone">Events<br> Near Me:</p>
                    <div class="eventcalenderbutton" id="eventcalenderbutton" data-toggle="tooltip" title="Open Event Calendar">
                        <button class="btn btnDone radiusBtn"><i class="fa fa-calendar"></i></button>
                    </div>
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
                    
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div id="myNearbyEvents" class="events"></div>
                        <div id="radiusmessage"></div>
                    </div>
                </div>
            </div>
        </div>

        <?php
            
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
        <script src="js/eventsnearme.js"></script>
        <script>
            $(function(){
                $("#search").addClass('active');
            });
        </script>
    </body>