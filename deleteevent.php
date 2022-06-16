<?php
session_start();
include("connection.php");

$event_id = $_POST['event_id'];

//Delete Forum First then Delete Event
$sql = "DELETE FROM event_forum_posts WHERE event_id='$event_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error 1';
    exit;
}
$sql = "DELETE FROM event_forum_topics WHERE event_id='$event_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error 2';
    exit;
}
$sql = "DELETE FROM event_forum_categories WHERE event_id='$event_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error 3';
    exit;
}

$sql = "DELETE FROM open_event_attendance WHERE event_id='$event_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error 4';
    exit;
}

$sql = "DELETE FROM userevents WHERE event_id='$event_id'";
$result = mysqli_query($link, $sql);

if(!$result){
    echo "<div class='alert alert-warning'>You have not deleted the event, please try again later!</div>";
}

?>