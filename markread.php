<?php
session_start();
include("connection.php");

$message_id = $_POST['message_id'];

$sql = "UPDATE usermessages SET `read_status`='1' WHERE message_id='$message_id'";
$result = mysqli_query($link, $sql);

if(!$result){
    echo "<div class='alert alert-warning'>You have not deleted the responses, please try again later!</div>";
}

?>