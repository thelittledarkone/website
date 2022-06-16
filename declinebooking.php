<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];
$recipient_id = $_POST['user_id'];
$event_id = $_POST['event_id'];
$message_id = $_POST['message_id'];

$sql0 = "SELECT * FROM users WHERE user_id='$user_id'";
$result0 = mysqli_query($link, $sql0);
if(!$result0){
    echo "error0";
}else{
    $row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC);
    $username = $row0['username'];
    
    $sql01 = "SELECT * FROM users WHERE user_id='$recipient_id'";
    $result01 = mysqli_query($link, $sql01);
    if(!$result01){
        echo "error01";
    }else{
        $row01 = mysqli_fetch_array($result01, MYSQLI_ASSOC);
        $recipientname = $row01['username'];
        
        $sql = "SELECT * FROM userevents WHERE event_id='$event_id'";
        $result = mysqli_query($link, $sql);
        if(!$result){
            echo "error";
        }else{
            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $eventName = $row['event_name'];
            
            $subject = 'Booking request has been rejected!';
            $type = 'a';
            $time = date('Y-m-d H:i:s', time());
            $content = "We’re sorry $recipientname but $username has rejected your request to join the event: $eventName. This is usually due to there being no more seats or the open event being at max capacity. We hope you try again another time or try booking with other orginisers!";

            $sql1 = "INSERT INTO usermessages (`message_subject`, `message_type`, `book_seat`, `message_date`, `message_content`, `message_from`, `message_to`, `message_event`, `responded_to`) VALUES ('$subject', '$type', '0', '$time', '$content', '$user_id', '$recipient_id', '$event_id', '0')";
            
            $result1 = mysqli_query($link, $sql1);
            if(!$result1){
                echo '<div class="alert alert-danger">Error sending message to the recipient</div>';
            }
        }
    }
}


$sql3 = "UPDATE usermessages SET `responded_to`='1' WHERE `message_id`='$message_id' LIMIT 1";
$result3 = mysqli_query($link, $sql3);
if(!$result3){
    echo "<div class='alert alert-warning'>Error code: 167!</div>";
} 


?>