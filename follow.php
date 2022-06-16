<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];
$friend_id = $_POST['friend_id'];

$sql = "UPDATE user_links SET `user1_follow_user2`='1' WHERE `user1_id`='$user_id' AND user2_id='$friend_id' LIMIT 1";
$result = mysqli_query($link, $sql);
if(mysqli_affected_rows($link) == 0){
    $sql1 = "UPDATE user_links SET `user2_follow_user1`='1' WHERE `user2_id`='$user_id' AND user1_id='$friend_id' LIMIT 1";
    $result1 = mysqli_query($link, $sql1);
    if(mysqli_affected_rows($link) == 0){
        echo '<div class="alert alert-danger">Error inserting user details into database</div>';
    }
}

?>