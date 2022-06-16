<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
//<!--Connect to database-->
include('./php/connection.php');
//Get user id
$user_id = $_SESSION['user_id'];
$event_id = $_GET['event_id'];
$_SESSION['event_id'] = $event_id;

$sql0 = "SELECT * FROM userevents WHERE event_id='$event_id'";
$result0 = mysqli_query($link, $sql0);
if(mysqli_num_rows($result0)>0){
    $row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC);
    $seats = $row0['tournseatsavailable'];
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Messages</title>
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
        <link rel="stylesheet" href="css/damanagerstyle.css">
        <link rel="stylesheet" href="css/headerless.css">
        <link rel="stylesheet" href="css/tournamentstyle.css">
    </head>
    <body>
<!--        Navigation-->
        <?php
        include("navbarconnected.php");
        include("searchonly.php");
        ?>
        
<!--        Main Content-->
        <input id="tournieseats" value="<?php echo $seats; ?>" hidden="true">
        <div class="container" id="messageContainer">
            
        </div>
            

        
        <!--    Footer-->
       <?php include("footer.php"); ?>

        <!--        Spinner-->
        <div id="spinner">
            <img src="css/images/ajax-loader.gif" width="64" height="64"/>
            <br /> Loading ...
        </div>  
        
        <script src="js/sticky.js"></script>
        <script src="js/nav.js"></script>
        <script src="js/tournamentpage.js"></script>
        
    </body>
</html>