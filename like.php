<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];
$game_id = $_POST['game_id'];
$edition_id = $_POST['edition_id'];

if(isset($game_id)){
    $sql = "UPDATE game_reviews SET `like_game`='1' WHERE `user_id`='$user_id' AND game_id='$game_id' LIMIT 1";
    $result = mysqli_query($link, $sql);
    if(mysqli_affected_rows($link) == 0){
        echo '<div class="alert alert-danger">Error inserting user details into database</div>';
    }
}elseif(isset($edition_id)){
    $sql = "UPDATE game_reviews SET `like_game`='1' WHERE `user_id`='$user_id' AND edition_id='$edition_id' LIMIT 1";
    $result = mysqli_query($link, $sql);
    if(mysqli_affected_rows($link) == 0){
        echo '<div class="alert alert-danger">Error inserting user details into database</div>';
    }
}



?>