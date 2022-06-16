<?php
session_start();
include('connection.php');

//get id of note sent through Ajax
$event_id = $_POST['id'];

//run query to delete note from notes
$sql = "DELETE FROM event_forum_posts WHERE event_id='$event_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';
    exit;
}
$sql = "DELETE FROM event_forum_topic WHERE event_id='$event_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';
    exit;
}
$sql = "DELETE FROM event_forum_categories WHERE event_id='$event_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';
    exit;
}

//show notes or alert message
?>