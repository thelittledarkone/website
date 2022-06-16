<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];
$type = $_POST['type'];

$sql = "SELECT * FROM usermessages WHERE message_to='$user_id' AND message_type='$type' AND read_status='0'";
$result = mysqli_query($link, $sql);
if($result){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $message_id = $row['message_id'];
            
            $sql1 = "DELETE FROM message_responses WHERE message_id='$message_id'";
            $result1 = mysqli_query($link, $sql1);
            if(!$result1){
                echo "<div class='alert alert-warning'>You have not deleted the responses, please try again later!</div>";
            }
        }
    }
}

$sql2 = "DELETE FROM usermessages WHERE message_to='$user_id' AND message_type='$type' AND read_status='0'";
$result2 = mysqli_query($link, $sql2);
if(!$result2){
    echo "<div class='alert alert-warning'>You have not deleted the message, please try again later!</div>";
}

?>