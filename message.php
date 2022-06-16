<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
//<!--Connect to database-->
include('./php/connection.php');
//Get user id
$user_id = $_SESSION['user_id'];
$message_id = $_GET["message_id"];
$_SESSION['message_id'] = $message_id;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Message</title>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="boot/js/bootstrap.min.js"></script>
<!--        JQuery UI-->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/eggplant/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        

<!--        Custom Styling-->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/profilestyle.css">
        <link rel="stylesheet" href="css/headerless.css">
    </head>
    <body>
<!--        Navigation-->
        <?php
        include("navbarconnected.php");
        include("searchonly.php");
        ?>
        
<!--        Main Content-->
        <div class="container" id="messageContainer">
            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <div id="singleMessageDetails" class=""></div>
                </div>
            </div>
            <a class='btn btnColor' href='messages.php' name='savemessage' type='button'>&#8656; BACK TO MESSAGES</a>
        </div>
        
            
<!--        Reply to Message-->
        <form method="post" id="responseForm">
            <div class="modal" id="responseModal" role="dialog" aria-labelledby="responseModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <h4 id="responseModalLabel">Reply to Message:</h4>
                        </div>
                        <div class="modal-body">
<!--                            update username message for php file-->
                            <div id="responseErrorMessage"></div>
<!--                            Update form-->
                            <div class="form-group">
                                <label for="replyMessageContent">Reply: </label>
                                <textarea name="replyMessageContent" class="form-control" id="replyMessageContent" rows="10"></textarea>
                            </div>                   
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" id="sendReply" name="replytomessage" type="submit" value="Send Reply">
                            <button type="button" class="btn cancelBtn" data-dismiss="modal" id="cancelReply">Cancel</button>
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
        
        
        <script src="js/sticky.js"></script>
        <script src="js/nav.js"></script>
        <script src="js/message.js"></script>
        <script>
            $(function(){
                $("#profile").addClass('active');
            });
        </script>
    </body>
</html>