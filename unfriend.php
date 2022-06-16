<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];
$friend_id = $_POST['friend_id'];

$sql = "UPDATE user_links SET `friend_status`='0' WHERE (`user1_id`='$user_id' AND user2_id='$friend_id') OR (`user2_id`='$user_id' AND user1_id='$friend_id') LIMIT 1";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error inserting user details into database</div>';
}

?>