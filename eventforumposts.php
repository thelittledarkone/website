<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}

include('./php/connection.php');

$user_id = $_SESSION['user_id'];

if($_SESSION['host_id'] != $user_id && $_SESSION['player1'] != $user_id && $_SESSION['player2'] != $user_id && $_SESSION['player3'] != $user_id && $_SESSION['player4'] != $user_id && $_SESSION['player5'] != $user_id && $_SESSION['player6'] != $user_id && $_SESSION['player7'] != $user_id && $_SESSION['player8'] != $user_id && $_SESSION['openattendee'] != 1){
    header("location: accessdenied.php");
}

$event_id = $_SESSION['event_id'];
$eventname = $_SESSION['eventname'];
$topic = $_GET["id"];
$_SESSION["topic"] = $topic;
$cat = $_SESSION["cat"];

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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <li class="breadcrumb-item"><a href="eventforum.php?event_id=<?php echo $event_id; ?>">Categories</a></li>
                    <li class="breadcrumb-item"><a href="eventforumtopics.php?id=<?php echo $cat; ?>">Topics</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Posts</li>
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
          <div class='row' id="forumHome">
              <div class="col-xs-6"></div>
              <div class="buttons col-xs-6">
                  <?php
                  if($_SESSION["host_id"] == '$user_id'){
                  ?>
                  <button type="button" id="deleteTop" class="btn btn-lg btnColor delete pull-right">Delete Mode</button>
                  <?php
                  }
                  ?>
              </div>
          </div>
          <div class="forum-body replyPosts" id="forumBody"></div>
      </div>
        <div class='replywrapper' id='replywrapper' data-js-reply-expander>
            <button type="button" id="reply" class="btn btn-sm btnColor content__btn">Reply</button>
            <button type="button" id="phonereply" class="btn btn-sm btnColor content__btn">R</button>
          </div>
          <div class='replyExpandable' id="replybarid">
            <div class="replybarcontent" data-js-expandable-inner>
                <form class='form form-inline' method="post" id="replyForm">
                    <div class="form-group replyfromgroup">
                        <textarea class="form-control inline replyText" id="reply" name="reply" rows="2" placeholder="Add your answer/reply here..."></textarea>
                         <button class="btn btn-sm btnColor inline" name="reply" type="submit"><i class="fa fa-send-o"></i></button>
                    </div>                        
                    <div id="replyMessage"></div>        
                </form>
              </div>
          </div>
        
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
      <script src="js/eventforumposts.js"></script>
    
      </body>
</html>