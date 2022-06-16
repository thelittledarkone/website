<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}

include('./php/connection.php');

$user_id = $_SESSION['user_id'];
$event_id = $_GET["event_id"];
$_SESSION['event_id'] = $event_id;

//Get limited event attendees
$sql = "SELECT * FROM userevents WHERE event_id='$event_id'";
$result = mysqli_query($link, $sql);
$count = mysqli_num_rows($result);
if($count == 1){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $eventname = $row['event_name'];
    $host_id = $row['user_id'];
    $player1 = $row['player1_id'];
    $player2 = $row['player2_id'];
    $player3 = $row['player3_id'];
    $player4 = $row['player4_id'];
    $player5 = $row['player5_id'];
    $player6 = $row['player6_id'];
    $player7 = $row['player7_id'];
    $player8 = $row['player8_id'];
    
}

$_SESSION['eventname'] = $eventname;

//Get limited event attendees
$sql = "SELECT * FROM open_event_attendance WHERE event_id='$event_id' && user_id='$user_id'";
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result)>0){
    $openattendee = 1;
}else{
    $openattendee = 0;
}

if($host_id != $user_id && $player1 != $user_id && $player2 != $user_id && $player3 != $user_id && $player4 != $user_id && $player5 != $user_id && $player6 != $user_id && $player7 != $user_id && $player8 != $user_id && $openattendee != 1){
    header("location: accessdenied.php");
}

$_SESSION['host_id'] = $host_id;
$_SESSION['player1'] = $player1;
$_SESSION['player2'] = $player2;
$_SESSION['player3'] = $player3;
$_SESSION['player4'] = $player4;
$_SESSION['player5'] = $player5;
$_SESSION['player6'] = $player6;
$_SESSION['player7'] = $player7;
$_SESSION['player8'] = $player8;
$_SESSION['openattendee'] = $openattendee;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Event Forum - <?php echo "$eventname"; ?></title>
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
        <link rel="stylesheet" href="css/damanagerstyle.css">
        
        
    </head>
    <body>
        
<!--        Navigation-->
        <?php
            include("navbarconnected.php");
        include("searchonly.php");
        ?>

      <!--    Header-->
      <div class="jumbotron">
        <div class="container headerContainer">
            <h1 id="forumHeader"><?php echo "$eventname"; ?> Forum</h1>  
        </div>
      </div>
      <nav role="navigation" class="navbar navbar-custom breadcrumbNav">
        <div class="container-fluid breadcrumb-container">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                </ol>
                <p class="user-greeting">
                    Hi, <a href="userdetails.php"><b><?php echo $_SESSION['username']?></b></a> Not you? <a href="./php/logout.php">Login Here</a>
                </p>
        </div>
      </nav>
      
      <div class="container" id="forumContainer">
            <div id="alert" class="alert alert-danger collapse">
            <a class="close" data-dismiss="alert">&times;</a>
            <p id="alertContent"></p>
            </div>
          <?php
            if($_SESSION["host_id"] == '$user_id'){
                echo "<button type='button' id='createCat' class='btn btn-lg btnColor' data-target='#createCatModal' data-toggle='modal'>Create Category</button>
                <button type='button' id='deleteTop' class='btn btn-lg btnColor delete pull-right'>Delete Mode</button>";
            }
          ?>
          <div row text-center id="forumHome"></div>
          <div class="forum-body" id="forumBody"></div>
      </div>
      
      <!--        Create Category-->
        <form method="post" id="createCatForm">
            <div class="modal" id="createCatModal" role="dialog" aria-labelledby="createCatModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <a class="close" data-dismiss="modal">&times;</a>
                            <h4 id="myModalLabel">Create a Category:</h4>
                        </div>
                        <div class="modal-body">
<!--                            login message for php file-->
                            <div id="createCatMessage"></div>
<!--                            Sign up form-->
                            <div class="form-group">
                                <label for="catName" class="sr-only">Category Name</label>
                                <input class="form-control" type="text" id="catName" name="catName" placeholder="Name" maxlength="50">
                                <textarea class="form-control" id="catDescription" name="catDescription" rows="10" placeholder="Add a Description"></textarea>  
                            </div>                        
                        </div>
                        <div class="modal-footer bg-info">
                            <input class="btn btnColor" name="addCat" type="submit" value="Add Category">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
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
      <script src="js/eventforum.js"></script>
    
      </body>
</html>