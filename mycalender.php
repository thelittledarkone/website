<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];

$calendar = array();

$sql = "SELECT * FROM userevents WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);
while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
    $event_id = $row['event_id'];
    $event_name = $row['event_name'];
    
    $game_id = $row['event_game'];
    $sql1 = "SELECT * FROM games WHERE game_id='$game_id'";
    $result1 = mysqli_query($link, $sql1);
    if($result1){
        if(mysqli_num_rows($result1)>0){
            $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
            $game_name = $row1['game_name'];
        }         
    }
    
	// convert  date to milliseconds
    if($row['regular'] == 'N'){
        $dateStart = strtotime($row['date_time']) * 1000;
        $dateEnd = $dateStart + 3600000;
        
        $calendar[] = array(
            'id' => "$event_id",
            'title' => "$event_name - $game_name",
            'url' => "eventpage.php?event_id=$event_id",
            "class" => 'event-success',
            'start' => "$dateStart",
            'end' => "$dateEnd"
        );
//        echo '1'.' '.$calendar;
    }else{
        if($row['monday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Monday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-success',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '2'.' '.$calendar;
                $date->modify('next Monday');
                $regEvent_id .= '0';
            }
        }
        if($row['tuesday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Tuesday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-success',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '3'.' '.$calendar;
                $date->modify('next Tuesday');
                $regEvent_id .= '0';
            }
        }
        if($row['wednesday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Wednesday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-success',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '4'.' '.$calendar;
                $date->modify('next Wednesday');
                $regEvent_id .= '0';
            }
        }
        if($row['thursday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Thursday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-success',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '5'.' '.$calendar;
                $date->modify('next Thursday');
                $regEvent_id .= '0';
            }
        }
        if($row['friday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Friday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-success',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '6'.' '.$calendar;
                $date->modify('next Friday');
                $regEvent_id .= '0';
            }
        }
        if($row['saturday'] == 1){
            $regEvent_id = 'r'.$event_id;
            
            $time = $row['time'];
            $date = new DateTime('first Saturday of this month');
            $thisYear = $date->format('Y');
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-success',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '7'.' '.$calendar;
                $date->modify('next Saturday');
                $regEvent_id .= '0';
            }
        }
        if($row['sunday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Sunday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-success',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '8'.' '.$calendar;
                $date->modify('next Sunday');
                $regEvent_id .= '0';
            }
        }
    }
}

$sql = "SELECT * FROM open_event_attendance LEFT JOIN userevents ON open_event_attendance.event_id = userevents.event_id WHERE open_event_attendance.user_id='$user_id'";
$result = mysqli_query($link, $sql);
while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
    $event_id = $row['event_id'];
    $event_name = $row['event_name'];
    
    $game_id = $row['event_game'];
    $sql1 = "SELECT * FROM games WHERE game_id='$game_id'";
    $result1 = mysqli_query($link, $sql1);
    if($result1){
        if(mysqli_num_rows($result1)>0){
            $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
            $game_name = $row1['game_name'];
        }         
    }
    
//	 convert  date to milliseconds
    if($row['regular'] == 'N'){
        $dateStart = strtotime($row['date_time']) * 1000;
        $dateEnd = $dateStart + 3600000;
        
        $calendar[] = array(
            'id' => "$event_id",
            'title' => "$event_name - $game_name",
            'url' => "eventpage.php?event_id=$event_id",
            "class" => 'event-warning',
            'start' => "$dateStart",
            'end' => "$dateEnd"
        );
//        echo '1'.' '.$calendar;
    }else{
        if($row['monday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Monday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-warning',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '2'.' '.$calendar;
                $date->modify('next Monday');
                $regEvent_id .= '0';
            }
        }
        if($row['tuesday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Tuesday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-warning',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '3'.' '.$calendar;
                $date->modify('next Tuesday');
                $regEvent_id .= '0';
            }
        }
        if($row['wednesday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Wednesday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-warning',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '4'.' '.$calendar;
                $date->modify('next Wednesday');
                $regEvent_id .= '0';
            }
        }
        if($row['thursday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Thursday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-warning',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '5'.' '.$calendar;
                $date->modify('next Thursday');
                $regEvent_id .= '0';
            }
        }
        if($row['friday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Friday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-warning',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '6'.' '.$calendar;
                $date->modify('next Friday');
                $regEvent_id .= '0';
            }
        }
        if($row['saturday'] == 1){
            $regEvent_id = 'r'.$event_id;
            
            $time = $row['time'];
            $date = new DateTime('first Saturday of this month');
            $thisYear = $date->format('Y');
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-warning',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '7'.' '.$calendar;
                $date->modify('next Saturday');
                $regEvent_id .= '0';
            }
        }
        if($row['sunday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Sunday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-warning',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '8'.' '.$calendar;
                $date->modify('next Sunday');
                $regEvent_id .= '0';
            }
        }
    }
}

$sql = "SELECT * FROM tournament_attendance LEFT JOIN userevents ON tournament_attendance.event_id = userevents.event_id WHERE (tournament_attendance.player1_id='$user_id' OR tournament_attendance.player2_id='$user_id' OR tournament_attendance.player3_id='$user_id' OR tournament_attendance.player4_id='$user_id' OR tournament_attendance.player5_id='$user_id' OR tournament_attendance.player6_id='$user_id' OR tournament_attendance.player7_id='$user_id' OR tournament_attendance.player8_id='$user_id' OR tournament_attendance.player9_id='$user_id' OR tournament_attendance.player10_id='$user_id' OR tournament_attendance.player11_id='$user_id' OR tournament_attendance.player12_id='$user_id' OR tournament_attendance.player13_id='$user_id' OR tournament_attendance.player14_id='$user_id' OR tournament_attendance.player15_id='$user_id' OR tournament_attendance.player16_id='$user_id' OR tournament_attendance.player17_id='$user_id' OR tournament_attendance.player18_id='$user_id' OR tournament_attendance.player19_id='$user_id' OR tournament_attendance.player20_id='$user_id' OR tournament_attendance.player21_id='$user_id' OR tournament_attendance.player22_id='$user_id' OR tournament_attendance.player23_id='$user_id' OR tournament_attendance.player24_id='$user_id' OR tournament_attendance.player25_id='$user_id' OR tournament_attendance.player26_id='$user_id' OR tournament_attendance.player27_id='$user_id' OR tournament_attendance.player28_id='$user_id' OR tournament_attendance.player29_id='$user_id' OR tournament_attendance.player30_id='$user_id' OR tournament_attendance.player31_id='$user_id' OR tournament_attendance.player32_id='$user_id' OR tournament_attendance.player33_id='$user_id' OR tournament_attendance.player34_id='$user_id' OR tournament_attendance.player35_id='$user_id' OR tournament_attendance.player36_id='$user_id' OR tournament_attendance.player37_id='$user_id' OR tournament_attendance.player38_id='$user_id' OR tournament_attendance.player39_id='$user_id' OR tournament_attendance.player40_id='$user_id' OR tournament_attendance.player41_id='$user_id' OR tournament_attendance.player42_id='$user_id' OR tournament_attendance.player43_id='$user_id' OR tournament_attendance.player44_id='$user_id' OR tournament_attendance.player45_id='$user_id' OR tournament_attendance.player46_id='$user_id' OR tournament_attendance.player47_id='$user_id' OR tournament_attendance.player48_id='$user_id' OR tournament_attendance.player49_id='$user_id' OR tournament_attendance.player50_id='$user_id' OR tournament_attendance.player51_id='$user_id' OR tournament_attendance.player52_id='$user_id' OR tournament_attendance.player53_id='$user_id' OR tournament_attendance.player54_id='$user_id' OR tournament_attendance.player55_id='$user_id' OR tournament_attendance.player56_id='$user_id' OR tournament_attendance.player57_id='$user_id' OR tournament_attendance.player58_id='$user_id' OR tournament_attendance.player59_id='$user_id' OR tournament_attendance.player60_id='$user_id' OR tournament_attendance.player61_id='$user_id' OR tournament_attendance.player62_id='$user_id' OR tournament_attendance.player63_id='$user_id' OR tournament_attendance.player64_id='$user_id')";
$result = mysqli_query($link, $sql);
while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
    $event_id = $row['event_id'];
    $event_name = $row['event_name'];
    
    $game_id = $row['event_game'];
    $sql1 = "SELECT * FROM games WHERE game_id='$game_id'";
    $result1 = mysqli_query($link, $sql1);
    if($result1){
        if(mysqli_num_rows($result1)>0){
            $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
            $game_name = $row1['game_name'];
        }         
    }
    
//	 convert  date to milliseconds
    if($row['regular'] == 'N'){
        $dateStart = strtotime($row['date_time']) * 1000;
        $dateEnd = $dateStart + 3600000;
        
        $calendar[] = array(
            'id' => "$event_id",
            'title' => "$event_name - $game_name",
            'url' => "eventpage.php?event_id=$event_id",
            "class" => 'event-info',
            'start' => "$dateStart",
            'end' => "$dateEnd"
        );
//        echo '1'.' '.$calendar;
    }else{
        if($row['monday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Monday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-info',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '2'.' '.$calendar;
                $date->modify('next Monday');
                $regEvent_id .= '0';
            }
        }
        if($row['tuesday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Tuesday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-info',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '3'.' '.$calendar;
                $date->modify('next Tuesday');
                $regEvent_id .= '0';
            }
        }
        if($row['wednesday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Wednesday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-info',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '4'.' '.$calendar;
                $date->modify('next Wednesday');
                $regEvent_id .= '0';
            }
        }
        if($row['thursday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Thursday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-info',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '5'.' '.$calendar;
                $date->modify('next Thursday');
                $regEvent_id .= '0';
            }
        }
        if($row['friday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Friday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-info',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '6'.' '.$calendar;
                $date->modify('next Friday');
                $regEvent_id .= '0';
            }
        }
        if($row['saturday'] == 1){
            $regEvent_id = 'r'.$event_id;
            
            $time = $row['time'];
            $date = new DateTime('first Saturday of this month');
            $thisYear = $date->format('Y');
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-info',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '7'.' '.$calendar;
                $date->modify('next Saturday');
                $regEvent_id .= '0';
            }
        }
        if($row['sunday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Sunday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-info',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '8'.' '.$calendar;
                $date->modify('next Sunday');
                $regEvent_id .= '0';
            }
        }
    }
}

$sql = "SELECT * FROM userevents WHERE (player1_id='$user_id' OR player2_id='$user_id' OR player3_id='$user_id' OR player4_id='$user_id' OR player5_id='$user_id' OR player6_id='$user_id' OR player7_id='$user_id' OR player8_id='$user_id')";
$result = mysqli_query($link, $sql);
while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
    $event_id = $row['event_id'];
    $event_name = $row['event_name'];
    
    $game_id = $row['event_game'];
    $sql1 = "SELECT * FROM games WHERE game_id='$game_id'";
    $result1 = mysqli_query($link, $sql1);
    if($result1){
        if(mysqli_num_rows($result1)>0){
            $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
            $game_name = $row1['game_name'];
        }         
    }
    
//	 convert  date to milliseconds
    if($row['regular'] == 'N'){
        $dateStart = strtotime($row['date_time']) * 1000;
        $dateEnd = $dateStart + 3600000;
        
        $calendar[] = array(
            'id' => "$event_id",
            'title' => "$event_name - $game_name",
            'url' => "eventpage.php?event_id=$event_id",
            "class" => 'event-special',
            'start' => "$dateStart",
            'end' => "$dateEnd"
        );
//        echo '1'.' '.$calendar;
    }else{
        if($row['monday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Monday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-special',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '2'.' '.$calendar;
                $date->modify('next Monday');
                $regEvent_id .= '0';
            }
        }
        if($row['tuesday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Tuesday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-special',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '3'.' '.$calendar;
                $date->modify('next Tuesday');
                $regEvent_id .= '0';
            }
        }
        if($row['wednesday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Wednesday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-special',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '4'.' '.$calendar;
                $date->modify('next Wednesday');
                $regEvent_id .= '0';
            }
        }
        if($row['thursday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Thursday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-special',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '5'.' '.$calendar;
                $date->modify('next Thursday');
                $regEvent_id .= '0';
            }
        }
        if($row['friday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Friday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-special',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '6'.' '.$calendar;
                $date->modify('next Friday');
                $regEvent_id .= '0';
            }
        }
        if($row['saturday'] == 1){
            $regEvent_id = 'r'.$event_id;
            
            $time = $row['time'];
            $date = new DateTime('first Saturday of this month');
            $thisYear = $date->format('Y');
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-special',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '7'.' '.$calendar;
                $date->modify('next Saturday');
                $regEvent_id .= '0';
            }
        }
        if($row['sunday'] == 1){
            $time = $row['time'];
            $date = new DateTime('first Sunday of this month');
            $thisYear = $date->format('Y');
            $regEvent_id = 'r'.$event_id;
            
            while ($date->format('Y') === $thisYear) {
                $datestr = $date->format('Y-m-d');
                $dateTime = $datestr.' '.$time;
                $dateStart = strtotime($dateTime) * 1000;
                $dateEnd = $dateStart + 3600000;                     
                $calendar[] = array(
                    'id' => "$event_id",
                    'title' => "$event_name - $game_name",
                    'url' => "eventpage.php?event_id=$event_id",
                    "class" => 'event-special',
                    'start' => "$dateStart",
                    'end' => "$dateEnd"
                );
//                echo '8'.' '.$calendar;
                $date->modify('next Sunday');
                $regEvent_id .= '0';
            }
        }
    }
}


$calendarData = array(
	"success" => 1,	
    "result"=>$calendar);
//echo '9'.' ';
//var_dump($calendarData);
echo json_encode($calendarData);
?>