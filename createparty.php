<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

//Get user id
$id = $_SESSION['user_id'];

//Get username sent through ajax
$event = $_POST['event_id'];
$roll = $_POST['roll'];
$ability = $_POST['ability'];
$hp = $_POST['hp'];
$game = $_POST['gamePlaying'];

////Get event
//$sql0 = "SELECT * FROM userevents WHERE event_id='$event' LIMIT 1";
//$result0 = mysqli_query($link, $sql0);
//if(mysqli_num_rows($result0)>0){
//    $row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC);
//    
//            //Get user_id
//    if(empty($row0['player1_id']) || $row0['player1_id'] == NULL){
//        $player1 = 0;
//    }else{
//        $player1 = $row0['player1_id'];
//    }
//    if(empty($row0['player2_id']) || $row0['player2_id'] == NULL){
//        $player2 = 0;
//    }else{
//        $player2 = $row0['player2_id'];
//    }
//    if(empty($row0['player3_id']) || $row0['player3_id'] == NULL){
//        $player3 = 0;
//    }else{
//        $player3 = $row0['player3_id'];
//    }
//    if(empty($row0['player4_id']) || $row0['player4_id'] == NULL){
//        $player4 = 0;
//    }else{
//        $player4 = $row0['player4_id'];
//    }
//    if(empty($row0['player5_id']) || $row0['player5_id'] == NULL){
//        $player5 = 0;
//    }else{
//        $player5 = $row0['player5_id'];
//    }
//    if(empty($row0['player6_id']) || $row0['player6_id'] == NULL){
//        $player6 = 0;
//    }else{
//        $player6 = $row0['player6_id'];
//    }
//    if(empty($row0['player7_id']) || $row0['player7_id'] == NULL){
//        $player7 = 0;
//    }else{
//        $player7 = $row0['player7_id'];
//    }
//    if(empty($row0['player8_id']) || $row0['player8_id'] == NULL){
//        $player8 = 0;
//    }else{
//        $player8 = $row0['player8_id'];
//    }  
//    
//}else{
//    echo '<div class="alert alert-danger">There was an error retrieving the username and email from the database</div>';
//}
    
$sql = "INSERT INTO rpg_party (`user_id`, `event_id`, `game_playing`, `player_1_character`, `player_2_character`, `player_3_character`, `player_4_character`, `player_5_character`, `player_6_character`, `player_7_character`, `player_8_character`, `rng`, `ability`, `hitpoints`) VALUES ('$id', '$event', '$game', '0', '0', '0', '0', '0', '0', '0', '0', '$roll', '$ability', '$hp')";

$result = mysqli_query($link, $sql);
    //Check Query success
    if(!$result){
        echo "<div class='alert alert-danger'>There was an error! The event could not be added to the database!</div>";
    }

?>