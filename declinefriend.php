<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];

$recipient_id = $_POST['user_id'];

$message_id = $_POST['message_id'];

$sql3 = "UPDATE usermessages SET `responded_to`='1' WHERE `message_id`='$message_id' LIMIT 1";
$result3 = mysqli_query($link, $sql3);
if(!$result3){
    echo "<div class='alert alert-warning'>Error code: 167!</div>";
}


?>