<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

$event_id = $_POST['event_id'];
$user_id = $_SESSION['user_id'];

//<!--Check user inputs-->

//<!--    Define error messages-->
$missingType = '<p><strong>Please choose the type of message you are sending!</strong></p>';
$missingSubject = '<p><strong>Please give your message a subject!</strong></p>';
$missingMessage = '<p><strong>Please enter a message!</strong></p>';

//<!--    Store errors in error variable-->
//Type
if(empty($_POST["messageType"])){
    $errors .= $missingType;
}else{
    $type = filter_var($_POST["messageType"], FILTER_SANITIZE_STRING);
}
//Subject
if(empty($_POST["messageSubject"])){
    $errors .= $missingSubject;
}else{
    $subject = filter_var($_POST["messageSubject"], FILTER_SANITIZE_STRING);
}
//Content
if(empty($_POST["messageContent"])){
    $errors .= $missingMessage;
}else{
    $content = $_POST["messageContent"];
    $content = str_replace("'", "’", "$content");
    $content = str_replace('"', '“', "$content");
    $content = filter_var($content, FILTER_SANITIZE_STRING);
}

//<!--    If there are any error, print error message-->
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
    echo $resultMessage;
    exit;
}

//<!--No errors-->
//<!--    Prepare variables for the queries-->
$subject = mysqli_real_escape_string($link, $subject);
$content = mysqli_real_escape_string($link, $content);

//get user id of organiser
$sql = "SELECT * FROM userevents WHERE event_id='$event_id' LIMIT 1";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query</div>';
    echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
    exit;
}else{
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $recipient_id = $row['user_id'];
}
//Create timestamp for account and user level
$time = date('Y-m-d H:i:s', time());

//<!--            Insert user details and activation code in the users table-->
$sql1 = "INSERT INTO usermessages (`message_subject`, `message_type`, `message_date`, `message_content`, `message_from`, `message_to`, `message_event`, `responded_to`) VALUES ('$subject', '$type', '$time', '$content', '$user_id', '$recipient_id', '$event_id', '0')";
$result1 = mysqli_query($link, $sql1);
if(!$result1){
    echo '<div class="alert alert-danger">Error inserting user details into database</div>';
    exit;
}
?>