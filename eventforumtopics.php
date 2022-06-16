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
$cat_id = $_GET["id"];
$_SESSION['cat'] = $cat_id;

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
                    <li class="breadcrumb-item"><a href="eventforum.php?event_id=<?php echo $event_id; ?>">Categories</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Topics</li>
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
              <div class="col-xs-4"></div>
              <div class="buttons col-xs-8">
                  <button type="button" id="createTop" class="btn btn-lg btnColor pull-right" data-target="#createTopicModal" data-toggle="modal">Start a Topic</button>
                  <?php
                  if($_SESSION["host_id"] == '$user_id'){
                  ?>
                  <button type="button" id="deleteTop" class="btn btn-lg btnColor delete pull-right">Delete Mode</button>
                  <?php
                  }
                  ?>
              </div>
          </div>
          <div class="forum-body" id="forumBody"></div>
      </div>
      
        <!--        Create Topic-->
        <form method="post" id="createTopicForm">
            <div class="modal" id="createTopicModal" role="dialog" aria-labelledby="createTopicModalLabel" aria-hidden="true" data-backdrop="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <a class="close" data-dismiss="modal">&times;</a>
                            <h4 id="myModalLabel">Ask a question to thelittledarkone community!</h4>
                        </div>
                        <div class="modal-body">
<!--                            Signup message for php file-->
                            <div id="createTopicMessage"></div>
<!--                            Sign up form-->
                            <div class="form-group">
                                <label for="topicname" class="sr-only">Topic</label>
                                <input class="form-control" type="text" id="topicname" name="topicname" placeholder="Topic Name" maxlength="30">
                                <textarea class="form-control" id="firstPost" name="firstPost" rows="10" placeholder="Add an Introduction for your Topic"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer bg-info">
                            <input class="btn btnColor" name="addTop" type="submit" value="Create Topic">
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
      <script src="js/eventforumtopics.js"></script>
    
      </body>
</html>