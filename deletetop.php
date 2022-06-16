<?php
session_start();
include('connection.php');

//get id of note sent through Ajax
$top_id = $_POST['id'];

//run query to delete note from notes
$sql = "DELETE FROM forum_posts WHERE post_topic='$top_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';
    exit;
}
$sql = "DELETE FROM forum_topic WHERE topic_id='$top_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';
    exit;
}

//show notes or alert message
?>