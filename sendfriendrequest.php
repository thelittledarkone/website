<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

$friend_id = $_POST['friend_id'];
$user_id = $_SESSION['user_id'];

$type = 'f';
$friend = '1';
$subject = 'Friend Request';


//Content
if(!empty($_POST["friendMessage"])){
    $content = $_POST["friendMessage"];
    $content = str_replace("'", "’", "$content");
    $content = str_replace('"', '“', "$content");
    $content = filter_var($content, FILTER_SANITIZE_STRING);
}else{
    $content = '';
}

//<!--No errors-->
//<!--    Prepare variables for the queries-->
$content = mysqli_real_escape_string($link, $content);

//Create timestamp for account and user level
$time = date('Y-m-d H:i:s', time());

//<!--            Insert user details and activation code in the users table-->
$sql1 = "INSERT INTO usermessages (`message_subject`, `message_type`, `friend_request`, `message_date`, `message_content`, `message_from`, `message_to`, `message_event`, `responded_to`) VALUES ('$subject', '$type', '$friend', '$time', '$content', '$user_id', '$friend_id', '0', '0')";

$result1 = mysqli_query($link, $sql1);
if(!$result1){
    echo '<div class="alert alert-danger">Error inserting user details into database</div>';
    exit;
}
?>