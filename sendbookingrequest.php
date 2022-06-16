<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

$event_id = $_POST['event_id'];
$user_id = $_SESSION['user_id'];

$type = 'b';
$booking = '1';
$subject = 'Seat Booking';

//Content
if(!empty($_POST["bookingMessage"])){
    $content = $_POST["bookingMessage"];
    $content = str_replace("'", "’", "$content");
    $content = str_replace('"', '“', "$content");
    $content = filter_var($content, FILTER_SANITIZE_STRING);
}else{
    $content = '';
}

//<!--No errors-->
//<!--    Prepare variables for the queries-->
$content = mysqli_real_escape_string($link, $content);

//get user id of organiser
$sql = "SELECT * FROM userevents WHERE event_id='$event_id' LIMIT 1";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query</div>';
    echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
    exit;
}else{
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $recipient_id = $row['user_id'];
}
//Create timestamp for account and user level
$time = date('Y-m-d H:i:s', time());

//<!--            Insert user details and activation code in the users table-->
$sql1 = "INSERT INTO usermessages (`message_subject`, `message_type`, `book_seat`, `message_date`, `message_content`, `message_from`, `message_to`, `message_event`, `responded_to`) VALUES ('$subject', '$type', '$booking', '$time', '$content', '$user_id', '$recipient_id', '$event_id', '0')";
$result1 = mysqli_query($link, $sql1);
if(!$result1){
    echo '<div class="alert alert-danger">Error inserting user details into database</div>';
    exit;
}
?>