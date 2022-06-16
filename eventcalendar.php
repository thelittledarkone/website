<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];
$radius = $_SESSION['radius'];

if(isset($_SESSION["game_name"])){
    $game_name = $_SESSION['game_name'];
    $sql0 = "SELECT * FROM games WHERE game_name='$game_name' LIMIT 1";
    $result0 = mysqli_query($link, $sql0);
    if($result0){
        if(mysqli_num_rows($result0)>0){
            $row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC);
            $game_id = $row0['game_id'];
        }         
    }
}else{
    $game_id = $_SESSION["game_id"];
}

$sql0 = "SELECT * FROM users WHERE user_id='$user_id' LIMIT 1";
$result0 = mysqli_query($link, $sql0);
if($result0){
    if(mysqli_num_rows($result0)>0){
        $row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC);
        $addressLat = $row0['addressLat'];
        $addressLon = $row0['addressLon'];
        if(!(isset($_SESSION['radius']))){
            $radius = $row0['travel_radius'];
        }   
    }         
}

$calendar = array();

//Min & Max for Departure Latitude
$deltaLat = $radius*180/12430;
$minLat = $addressLat - $deltaLat;
if($minLat < -90){
    $minLat = -90;
}
$maxLat = $addressLat + $deltaLat;
if($maxLat > 90){
    $maxLat = 90;
}

//Min & Max for Address Longitude
$deltaLon = $radius*360/(24901*cos(deg2rad($addressLon)));
$minLon = $addressLon - $deltaLon;
if($minLon < -180){
    $minLon += 360;
}
$maxLon = $addressLon + $deltaLon;
if($maxLon > 180){
    $maxLon -= 360;
}

$queryChoice = [
    " (eventLon BETWEEN $minLon AND $maxLon)",
    " ((eventLon > $minLon) OR (eventLon < $maxLon))",
    " AND (eventLat BETWEEN $minLat AND $maxLat)"
];

//Query
$sql = "SELECT * FROM userevents WHERE";
if($minLon<$maxLon){
    $sql .= $queryChoice[0];
    $sql .= $queryChoice[2];
}else{
    $sql .= $queryChoice[1];
    $sql .= $queryChoice[2];
}

$sql .= " AND user_id != '$user_id' AND event_game != '$game_id'";
$result = mysqli_query($link, $sql);
while( $row = mysqli_fetch_array($result, MYSQLI_ASSOC) ) {
    $event_id = $row['event_id'];
    
    $sql01 = "SELECT * FROM open_event_attendance WHERE user_id='$user_id' AND event_id='$event_id'";
    $result01 = mysqli_query($link, $sql01);
    if(mysqli_num_rows($result01)>0){
        $openAttend = '1';
    }else{
        $openAttend = '0';
    }
    
    if(($row['event_type'] == 'o' || $row['seatsavailable'] > 0 || $row['tournseatsavailable'] > 0) && ($row['player1_id'] != $user_id && $row['player2_id'] != $user_id && $row['player3_id'] != $user_id && $row['player4_id'] != $user_id && $row['player5_id'] != $user_id && $row['player6_id'] != $user_id && $row['player7_id'] != $user_id && $row['player8_id'] != $user_id && $openAttend != '1' && $tournAttend != '1')){
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
        if($row['event_type'] == 'l'){
            // convert  date to milliseconds
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
        }elseif($row['event_type'] == 't'){
            // convert  date to milliseconds
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
        }else{
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
    }
}

if(isset($_SESSION["game_name"])){
    $game_name = $_SESSION['game_name'];
    $sql0 = "SELECT * FROM games WHERE game_name='$game_name' LIMIT 1";
    $result0 = mysqli_query($link, $sql0);
    if($result0){
        if(mysqli_num_rows($result0)>0){
            $row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC);
            $game_id = $row0['game_id'];
        }         
    }
}else{
    $game_id = $_SESSION["game_id"];
}

$sql3 = "SELECT * FROM userevents WHERE";
if($minLon<$maxLon){
    $sql3 .= $queryChoice[0];
    $sql3 .= $queryChoice[2];
}else{
    $sql3 .= $queryChoice[1];
    $sql3 .= $queryChoice[2];
}

$sql3 .= " AND user_id != '$user_id' AND event_game='$game_id'";
$result3 = mysqli_query($link, $sql3);
while( $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC) ) {
    $event_id = $row3['event_id'];
    
    $sql31 = "SELECT * FROM open_event_attendance WHERE user_id='$user_id' AND event_id='$event_id'";
    $result31 = mysqli_query($link, $sql31);
    if(mysqli_num_rows($result31)>0){
        $openAttend = '1';
    }else{
        $openAttend = '0';
    }
    
    if(($row3['event_type'] == 'o' || $row3['seatsavailable'] > 0) && ($row3['player1_id'] != $user_id && $row3['player2_id'] != $user_id && $row3['player3_id'] != $user_id && $row3['player4_id'] != $user_id && $row3['player5_id'] != $user_id && $row3['player6_id'] != $user_id && $row3['player7_id'] != $user_id && $row3['player8_id'] != $user_id && $openAttend != '1')){
        $event_name = $row3['event_name'];
    
        $game_id = $row3['event_game'];
        $sql32 = "SELECT * FROM games WHERE game_id='$game_id'";
        $result32 = mysqli_query($link, $sql32);
        if($result32){
            if(mysqli_num_rows($result32)>0){
                $row32 = mysqli_fetch_array($result32, MYSQLI_ASSOC);
                $game_name = $row32['game_name'];
            }         
        }
            // convert  date to milliseconds
            if($row3['regular'] == 'N'){
                $dateStart = strtotime($row3['date_time']) * 1000;
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
                if($row3['monday'] == 1){
                    $time = $row3['time'];
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
                if($row3['tuesday'] == 1){
                    $time = $row3['time'];
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
                if($row3['wednesday'] == 1){
                    $time = $row3['time'];
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
                if($row3['thursday'] == 1){
                    $time = $row3['time'];
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
                if($row3['friday'] == 1){
                    $time = $row3['time'];
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
                if($row3['saturday'] == 1){
                    $regEvent_id = 'r'.$event_id;

                    $time = $row3['time'];
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
                if($row3['sunday'] == 1){
                    $time = $row3['time'];
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
}


$calendarData = array(
	"success" => 1,	
    "result"=>$calendar);
//echo '9'.' ';
//var_dump($calendarData);
echo json_encode($calendarData);
?>