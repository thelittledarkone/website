<?php
session_start();
include("connection.php");

$event_id = $_POST['event_id'];
$sql = "SELECT * FROM userevents WHERE event_id='$event_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo "error";
}else{
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    echo json_encode($row);
    
}

?>