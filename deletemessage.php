<?php
session_start();
include("connection.php");

$message_id = $_POST['message_id'];

$sql = "DELETE FROM message_responses WHERE message_id='$message_id'";
$result = mysqli_query($link, $sql);

if(!$result){
    echo "<div class='alert alert-warning'>You have not deleted the responses, please try again later!</div>";
}

$sql1 = "DELETE FROM usermessages WHERE message_id='$message_id'";
$result1 = mysqli_query($link, $sql1);

if(!$result1){
    echo "<div class='alert alert-warning'>You have not deleted the message, please try again later!</div>";
}

?>