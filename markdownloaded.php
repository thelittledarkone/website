<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

$sql = "UPDATE library SET downloaded='1' WHERE user_id='$user_id' AND product_id='$product_id'";
$result = mysqli_query($link, $sql);

if(!$result){
    echo "<div class='alert alert-warning'>The item was not marked as downloaded!</div>";
}

?>