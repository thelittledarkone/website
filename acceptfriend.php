<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];

$sql0 = "SELECT * FROM users WHERE user_id='$user_id'";
$result0 = mysqli_query($link, $sql0);
if(!$result0){
    echo "error";
}else{
    $row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC);
    $username = $row0['username'];
}

$recipient_id = $_POST['user_id'];


$sql01 = "SELECT * FROM users WHERE user_id='$recipient_id'";
$result01 = mysqli_query($link, $sql01);
if(!$result01){
    echo "error";
}else{
    $row01 = mysqli_fetch_array($result01, MYSQLI_ASSOC);
    $recipientname = $row01['username'];
}

$message_id = $_POST['message_id'];

$type = 'r';
$subject = 'Friend Request Accepted';
$time = date('Y-m-d H:i:s', time());
$content = "Congratulations $recipientname, your friend request has been accepted by $username!";

$sql02 = "INSERT INTO usermessages (`message_subject`, `message_type`, `message_date`, `message_content`, `message_from`, `message_to`, `message_event`, `responded_to`) VALUES ('$subject', '$type', '$time', '$content', '$user_id', '$recipient_id', '0', '0')";
$result02 = mysqli_query($link, $sql02);
if(!$result02){
    echo '<div class="alert alert-danger">Error inserting user details into database</div>';
}

$sql2 = "UPDATE user_links SET `friend_status`='1' WHERE (`user1_id`='$user_id' AND user2_id='$recipient_id') OR (`user2_id`='$user_id' AND user1_id='$recipient_id') LIMIT 1";
$result2 = mysqli_query($link, $sql2);
if(!$result2){
    echo '<div class="alert alert-danger">Error inserting user details into database</div>';
}

$sql3 = "UPDATE usermessages SET `responded_to`='1' WHERE `message_id`='$message_id' LIMIT 1";
$result3 = mysqli_query($link, $sql3);
if(!$result3){
    echo "<div class='alert alert-warning'>Error code: 167!</div>";
}


?>