<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

//Get user id
$id = $_SESSION['user_id'];
$game_id = $_SESSION['game_id'];

//Get username sent through ajax
$game = $_POST['game'];
$alias = $_POST['alias'];
$company = $_POST['company'];
$creator = $_POST['creator'];
$illustrator = $_POST['illustrator'];
$players = $_POST['players'];
$playtime = $_POST['playtime'];
$age = $_POST['age'];
$genre = $_POST['genre'];
$type = $_POST['type'];
$board = $_POST['board'];
$synopsis = $_POST['synopsis'];
$date = $_POST["date"];


//Run query and update each detail if not empty
if(!empty($game)){
    $game = filter_var($_POST["game"], FILTER_SANITIZE_STRING);
    $game = mysqli_real_escape_string($link, $game);
    $sql0 = "SELECT * FROM games WHERE game_name='$game'";
    $result0 = mysqli_query($link, $sql0);
    if(mysqli_num_rows($result0)>0){
        echo '<div class="alert alert-danger">There was an error updating and storing the new username in the database</div>';
        exit;
    }else{
        $sql = "UPDATE games SET game_name='$game' WHERE game_id='$game_id'";
        $result = mysqli_query($link, $sql);
        if(!$result){
            echo '<div class="alert alert-danger"><p><strong>That game has already been added!</strong></p></div>';
        }
    }
}
if(!empty($alias)){
    $alias = filter_var($_POST["alias"], FILTER_SANITIZE_STRING);
    $alias = mysqli_real_escape_string($link, $alias);
    
    $sql = "UPDATE games SET alias='$alias' WHERE game_id='$game_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error updating and storing the new phone number in the database</div>';
    }
}
if(!empty($company)){
    $company = filter_var($_POST["company"], FILTER_SANITIZE_STRING);
    $company = mysqli_real_escape_string($link, $company);
    
    $sql = "UPDATE games SET company_name='$company' WHERE game_id='$game_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error updating and storing the new phone number in the database</div>';
    }
}
if(!empty($creator)){
    $creator = filter_var($_POST["creator"], FILTER_SANITIZE_STRING);
    $creator = mysqli_real_escape_string($link, $creator);
    
    $sql = "UPDATE games SET creator_name='$creator' WHERE game_id='$game_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error updating and storing the new phone number in the database</div>';
    }
}
if(!empty($illustrator)){
    $illustrator = filter_var($_POST["illustrator"], FILTER_SANITIZE_STRING);
    $illustrator = mysqli_real_escape_string($link, $illustrator);
    
    $sql = "UPDATE games SET illustrator_name='$illustrator' WHERE game_id='$game_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error updating and storing the new phone number in the database</div>';
    }
}
if(!empty($players)){
    $players = filter_var($_POST["players"], FILTER_SANITIZE_STRING);
    $players = mysqli_real_escape_string($link, $players);
    
    $sql = "UPDATE games SET no_players='$players' WHERE game_id='$game_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error updating and storing the new phone number in the database</div>';
    }
}
if(!empty($playtime)){
    $playtime = filter_var($_POST["playtime"], FILTER_SANITIZE_STRING);
    $playtime = mysqli_real_escape_string($link, $playtime);
    
    $sql = "UPDATE games SET play_time='$playtime' WHERE game_id='$game_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error updating and storing the new phone number in the database</div>';
    }
}
if(!empty($age)){
    $age = filter_var($_POST["age"], FILTER_SANITIZE_STRING);
    $age = mysqli_real_escape_string($link, $age);
    
    $sql = "UPDATE games SET age_rating='$age' WHERE game_id='$game_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error updating and storing the new phone number in the database</div>';
    }
}
if(!empty($type)){
    $type = filter_var($_POST["type"], FILTER_SANITIZE_STRING);
    $type = mysqli_real_escape_string($link, $type);
    
    $sql = "UPDATE games SET game_type='$type' WHERE game_id='$game_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error updating and storing the new phone number in the database</div>';
    }
}
if(!empty($genre)){
    $genre = filter_var($_POST["genre"], FILTER_SANITIZE_STRING);
    $genre = mysqli_real_escape_string($link, $genre);
    
    $sql = "UPDATE games SET genre='$genre' WHERE game_id='$game_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error updating and storing the new phone number in the database</div>';
    }
}
if(!empty($board)){
    $board = filter_var($_POST["board"], FILTER_SANITIZE_STRING);
    $board = mysqli_real_escape_string($link, $board);
    
    $sql = "UPDATE games SET board_type='$board' WHERE game_id='$game_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error updating and storing the new phone number in the database</div>';
    }
}
if(!empty($date)){
    $date = filter_var($_POST["date"], FILTER_SANITIZE_STRING);
    $date = mysqli_real_escape_string($link, $date);
    
    $sql = "UPDATE games SET release_date='$date' WHERE game_id='$game_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error updating and storing the new phone number in the database</div>';
    }
}
if(!empty($synopsis)){
    $synopsis = $_POST["synopsis"];
    $synopsis = str_replace("'", "’", "$synopsis");
    $synopsis = str_replace('"', '“', "$synopsis");
    $synopsis = filter_var($synopsis, FILTER_SANITIZE_STRING);
    $synopsis = mysqli_real_escape_string($link, $synopsis);
    
    $sql = "UPDATE games SET synopsis='$synopsis' WHERE game_id='$game_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error updating and storing the new user information in the database</div>';
    }
}

   
?>