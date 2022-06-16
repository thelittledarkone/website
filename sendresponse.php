<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

$message_id = $_POST['message_id'];
$user_id = $_SESSION['user_id'];

//<!--Check user inputs-->

//<!--    Define error messages-->
$missingMessage = '<p><strong>Please enter a reply!</strong></p>';

//<!--    Store errors in error variable-->
//Content
if(empty($_POST["replyMessageContent"])){
    $errors .= $missingMessage;
}else{
    $content = $_POST["replyMessageContent"];
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
$content = mysqli_real_escape_string($link, $content);

//Create timestamp for account and user level
$time = date('Y-m-d H:i:s', time());

$sql = "INSERT INTO message_responses (`response_content`, `message_id`, `response_by`, `response_date`) VALUES ('$content', '$message_id', '$user_id', '$time')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error inserting user details into database</div>';
    exit;
}
?>