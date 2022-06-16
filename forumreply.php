<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

//<!--    Define error messages-->
$missingReply = '<p><strong>Please enter a reply!</strong></p>';

//<!--    Store errors in error variable-->
//Reply
if(empty($_POST["reply"])){
    $errors .= $missingReply;
}else{
    $reply = $_POST["reply"];
    $reply = str_replace("'", "’", "$reply");
    $reply = str_replace('"', '“', "$reply");
    $reply = filter_var($reply, FILTER_SANITIZE_STRING);
}


//<!--    If there are any error, print error message-->
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
    echo $resultMessage;
    exit;
}

//<!--No errors-->
//<!--    Prepare variables for the queries-->
$reply = mysqli_real_escape_string($link, $reply);
$topic = $_SESSION["topic"];
$time = date('Y-m-d H:i:s', time());
$user_id = $_SESSION["user_id"];


//<!--            Insert user details and activation code in the users table-->
$sql = "INSERT INTO forum_posts (`post_content`, `post_date`, `post_topic`, `post_by`) VALUES ('$reply', '$time', '$topic', '$user_id')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error inserting reply details into database</div>';
}else{
    echo '<div class="alert alert-success">Reply Added to Database</div>';
}


?>