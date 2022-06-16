<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

//Get user id
$id = $_SESSION['user_id'];

//Get username sent through ajax
$phonePriv = $_POST['phonePriv'];
$emailPriv = $_POST['emailPriv'];
$addressPriv = $_POST['addressPriv'];
$cityPriv = $_POST['cityPriv'];

//Run quesry and update username
$sql = "UPDATE users SET email_privacy='$emailPriv',phone_privacy='$phonePriv',address_privacy='$addressPriv',city_privacy='$cityPriv' WHERE user_id='$id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">There was an error updating and storing your privacy settings in the database</div>';
}

?>