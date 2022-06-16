<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

//Get id
$id = $_SESSION['user_id'];
$game_id = $_SESSION['game_id'];
$edition_id = $_SESSION['edition_id'];

$stars = $_POST['stars'];
$review = $_POST['reviewMessage'];
$time = date('Y-m-d H:i:s', time());;

if(!empty($review)){
    $review = str_replace("'", "’", "$review");
    $review = str_replace('"', '“', "$review");
    $review = filter_var($review, FILTER_SANITIZE_STRING);
    $review = mysqli_real_escape_string($link, $review);
    
    if(isset($edition_id)){
        $sql = "UPDATE game_reviews SET `stars`='$stars',`review`='$review',`date`='$time' WHERE user_id='$id' AND edition_id='$edition_id'";
        $result = mysqli_query($link, $sql);
        if(!$result){
            echo '<div class="alert alert-danger">There was an error updating and storing the new user information in the database</div>';
        }
    }else{
        $sql = "UPDATE game_reviews SET `stars`='$stars',`review`='$review',`date`='$time' WHERE user_id='$id' AND game_id='$game_id'";
        $result = mysqli_query($link, $sql);
        if(!$result){
            echo '<div class="alert alert-danger">There was an error updating and storing the new user information in the database</div>';
        }
    }
}else{
    if(isset($edition_id)){
        $sql = "UPDATE game_reviews SET `stars`='$stars' WHERE user_id='$id' AND edition_id='$edition_id'";
        $result = mysqli_query($link, $sql);
        if(!$result){
            echo '<div class="alert alert-danger">There was an error updating and storing the new user information in the database</div>';
        }
    }else{
        $sql = "UPDATE game_reviews SET `stars`='$stars' WHERE user_id='$id' AND game_id='$game_id'";
        $result = mysqli_query($link, $sql);
        if(!$result){
            echo '<div class="alert alert-danger">There was an error updating and storing the new user information in the database</div>';
        }
    }   
}

?>