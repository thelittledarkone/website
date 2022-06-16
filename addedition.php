<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

//Get user id
$id = $_SESSION['user_id'];
$game_id = $_SESSION['game_id'];

//Error Messages
$missingName = '<p><strong>Please choose a name for your edition!</strong></p>';
$takenName = '<p><strong>That edition name already exists for this game!</strong></p>';

//Get username sent through ajax
$edition = $_POST['edition'];
$creator = $_POST['creatorE'];
$illustrator = $_POST['illustratorE'];
$players = $_POST['playersE'];
$playtime = $_POST['playtimeE'];
$age = $_POST['ageE'];
$genre = $_POST['genreE'];
$type = $_POST['typeE'];
$board = $_POST['boardE'];
$synopsis = $_POST['synopsisE'];
$date = $_POST["dateE"];

    
//Check for errors
if(!empty($edition)){
    $edition = filter_var($_POST["edition"], FILTER_SANITIZE_STRING);
    $edition = mysqli_real_escape_string($link, $edition);
    $sql0 = "SELECT * FROM game_editions WHERE edition_name='$edition' AND game_id='$game_id'";
    $result0 = mysqli_query($link, $sql0);
    if(mysqli_num_rows($result0)>0){
        $errors .= $takenName;
    }
}else{
    $errors .= $missingName;
}

if(!empty($creator)){
    $creator = filter_var($_POST["creatorE"], FILTER_SANITIZE_STRING);
    $creator = mysqli_real_escape_string($link, $creator);
}
if(!empty($illustrator)){
    $illustrator = filter_var($_POST["illustratorE"], FILTER_SANITIZE_STRING);
    $illustrator = mysqli_real_escape_string($link, $illustrator);
}
if(!empty($players)){
    $players = filter_var($_POST["playersE"], FILTER_SANITIZE_STRING);
    $players = mysqli_real_escape_string($link, $players);
}
if(!empty($playtime)){
    $playtime = filter_var($_POST["playtimeE"], FILTER_SANITIZE_STRING);
    $playtime = mysqli_real_escape_string($link, $playtime);
}
if(!empty($age)){
    $age = filter_var($_POST["ageE"], FILTER_SANITIZE_STRING);
    $age = mysqli_real_escape_string($link, $age);
}
if(!empty($type)){
    $type = filter_var($_POST["typeE"], FILTER_SANITIZE_STRING);
    $type = mysqli_real_escape_string($link, $type);
}
if(!empty($genre)){
    $genre = filter_var($_POST["genreE"], FILTER_SANITIZE_STRING);
    $genre = mysqli_real_escape_string($link, $genre);
}
if(!empty($board)){
    $board = filter_var($_POST["boardE"], FILTER_SANITIZE_STRING);
    $board = mysqli_real_escape_string($link, $board);
}
if(!empty($synopsis)){
    $synopsis = $_POST["synopsisE"];
    $synopsis = str_replace("'", "’", "$synopsis");
    $synopsis = str_replace('"', '“', "$synopsis");
    $synopsis = filter_var($synopsis, FILTER_SANITIZE_STRING);
    
    $synopsis = mysqli_real_escape_string($link, $synopsis);
}

$sql = "INSERT INTO game_editions (`game_id`, `edition_name`, `creator_name`, `illustrator_name`, `no_players`, `play_time`, `age_rating`, `genre`, `game_type`, `board_type`, `synopsis`, `added_by`, `release_date`) VALUES ('$game_id', '$edition', '$creator', '$illustrator', '$players', '$playtime', '$age', '$genre', '$type', '$board', '$synopsis', '$user_id', '$date')";

$result = mysqli_query($link, $sql);
    //Check Query success
    if(!$result){
        echo "<div class='alert alert-danger'>There was an error! The event could not be added to the database!</div>";
    }

?>