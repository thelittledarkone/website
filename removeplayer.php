<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

//get event
$event_id = $_SESSION['event_id'];
$player_id = $_POST["player_id"];

$sql0 = "SELECT * FROM userevents WHERE event_id='$event_id' LIMIT 1";
$result0 = mysqli_query($link, $sql0);

if($result0){
    if(mysqli_num_rows($result0)>0){
        $row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC);
        
        $seat = $row0['seatsavailable'];
        
        $player1 = $row0['player1_id'];
        $player2 = $row0['player2_id'];
        $player3 = $row0['player3_id'];
        $player4 = $row0['player4_id'];
        $player5 = $row0['player5_id'];
        $player6 = $row0['player6_id'];
        $player7 = $row0['player7_id'];
        $player8 = $row0['player8_id'];
    }         
}

if($player1 == $player_id){
    $seats = $seat + 1;
    $sql = "UPDATE userevents SET `player1_id`='0',`seatsavailable`='$seats' WHERE `event_id`='$event_id' LIMIT 1";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">Error removing player1 from event</div>';
        exit;
    }
}elseif($player2 == $player_id){
    $seats = $seat + 1;
    $sql = "UPDATE userevents SET `player2_id`='0',`seatsavailable`='$seats' WHERE `event_id`='$event_id' LIMIT 1";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">Error removing player2 from event</div>';
        exit;
    }
}elseif($player3 == $player_id){
    $seats = $seat + 1;
    $sql = "UPDATE userevents SET `player3_id`='0',`seatsavailable`='$seats' WHERE `event_id`='$event_id' LIMIT 1";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">Error removing player3 from event</div>';
        exit;
    }
}elseif($player4 == $player_id){
    $seats = $seat + 1;
    $sql = "UPDATE userevents SET `player4_id`='0',`seatsavailable`='$seats' WHERE `event_id`='$event_id' LIMIT 1";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">Error removing player4 from event</div>';
        exit;
    }
}elseif($player5 == $player_id){
    $seats = $seat + 1;
    $sql = "UPDATE userevents SET `player5_id`='0',`seatsavailable`='$seats' WHERE `event_id`='$event_id' LIMIT 1";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">Error removing player5 from event</div>';
        exit;
    }
}elseif($player6 == $player_id){
    $seats = $seat + 1;
    $sql = "UPDATE userevents SET `player6_id`='0',`seatsavailable`='$seats' WHERE `event_id`='$event_id' LIMIT 1";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">Error removing player6 from event</div>';
        exit;
    }
}elseif($player7 == $player_id){
    $seats = $seat + 1;
    $sql = "UPDATE userevents SET `player7_id`='0',`seatsavailable`='$seats' WHERE `event_id`='$event_id' LIMIT 1";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">Error removing player7 from event</div>';
        exit;
    }
}elseif($player8 == $player_id){
    $seats = $seat + 1;
    $sql = "UPDATE userevents SET `player8_id`='0',`seatsavailable`='$seats' WHERE `event_id`='$event_id' LIMIT 1";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">Error removing player8 from event</div>';
        exit;
    }
}



?>