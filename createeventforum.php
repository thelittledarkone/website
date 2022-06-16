<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

//get event
$event_id = $_POST["event_id"];

//Cat 1
$cat1name = 'General';
$cat1des = 'A place for players and hosts to chat about general things regarding the upcoming event.';

//Cat 2
$cat2name = 'Rules';
$cat2des = 'A place for hosts to outline and discuss the rules and codes of conduct expected from players during the upcoming event.';

//Cat 3
$cat3name = 'Game Mechanics and Strategies';
$cat3des = 'A place for players and hosts to chat about the game that will be played at the upcoming event, and how to play it.';

//Cat 4
$cat4name = 'Characters and Story';
$cat4des = 'A place for players and hosts to chat about any characters and story elements that may be used by players at the upcoming event.';

//Cat 5
$cat5name = 'Times, Locations and Finances';
$cat5des = 'A place for hosts to outline and discuss the times players are expected to arrive at the venue; how to find the venue; what to bring with you; and any financial expectations from players when they arrive at the venue for the upcoming event.';


//<!--            Insert user details and activation code in the users table-->
$sql = "INSERT INTO event_forum_categories (`cat_name`, `cat_description`, `event_id`) VALUES ('$cat1name', '$cat1des', '$event_id')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error inserting category details into database</div>';
}

$sql = "INSERT INTO event_forum_categories (`cat_name`, `cat_description`, `event_id`) VALUES ('$cat2name', '$cat2des', '$event_id')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error inserting category details into database</div>';
}

$sql = "INSERT INTO event_forum_categories (`cat_name`, `cat_description`, `event_id`) VALUES ('$cat3name', '$cat3des', '$event_id')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error inserting category details into database</div>';
}

$sql = "INSERT INTO event_forum_categories (`cat_name`, `cat_description`, `event_id`) VALUES ('$cat4name', '$cat4des', '$event_id')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error inserting category details into database</div>';
}

$sql = "INSERT INTO event_forum_categories (`cat_name`, `cat_description`, `event_id`) VALUES ('$cat5name', '$cat5des', '$event_id')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error inserting category details into database</div>';
}

?>