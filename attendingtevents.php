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
            
                <div class="container" id="eventOpenAttendingContainer">
                    <div id="alert" class="alert alert-danger collapse">
                        <a class="close" data-dismiss="alert">&times;</a>
                        <p id="alertContent"></p>
                    </div>
                    <div class="eventContainerTitles">
                        <p class="eventATitle">Tournaments I'm Attending:</p>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div id="myOpenAttendEvents" class="events">
                            </div>
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
        <script src="js/attendingtevents.js"></script>
        <script>
            $(function(){
                $("#search").addClass('active');
            });
        </script>
    </body>