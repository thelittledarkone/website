<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];

$sql0 = "SELECT * FROM users WHERE user_id='$user_id'";
$result0 = mysqli_query($link, $sql0);
if(!$result0){
    echo "error";
}else{
    $row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC);
    $username = $row0['username'];
}

$recipient_id = $_POST['user_id'];

$sql01 = "SELECT * FROM users WHERE user_id='$recipient_id'";
$result01 = mysqli_query($link, $sql01);
if(!$result01){
    echo "error";
}else{
    $row01 = mysqli_fetch_array($result01, MYSQLI_ASSOC);
    $recipientname = $row01['username'];
}

$event_id = $_POST['event_id'];
$message_id = $_POST['message_id'];

$sql = "SELECT * FROM userevents WHERE event_id='$event_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo "error";
}else{
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $eventName = $row['event_name'];
    $eventGame = $row['event_game'];
    $regular = $row['regular'];
    $eventDate = $row['date'];
    $eventTime = $row['time'];
    $monday = $row["monday"];
    $tuesday = $row["tuesday"];
    $wednesday = $row["wednesday"];
    $thursday = $row["thursday"];
    $friday = $row["friday"];
    $saturday = $row["saturday"];
    $sunday = $row["sunday"];
    $eventType = $row['event_type'];
    $attendees = $row['attendees'];
    $seats = $row['seatsavailable'];
    $tseats = $row['tournseatsavailable'];
    $player1 = $row['player1_id'];    
    $player2 = $row['player2_id'];    
    $player3 = $row['player3_id'];    
    $player4 = $row['player4_id'];    
    $player5 = $row['player5_id'];    
    $player6 = $row['player6_id'];    
    $player7 = $row['player7_id'];    
    $player8 = $row['player8_id'];    
}

//Get seats remaining and ensure it is an int
if($eventType == 'l'){
    if($seats > 0){
        $seats_remaining = $seats;
        if($player1 == $recipient_id || $player2 == $recipient_id || $player3 == $recipient_id || $player4 == $recipient_id || $player5 == $recipient_id || $player6 == $recipient_id || $player7 == $recipient_id || $player8 == $recipient_id){
            echo "<div class='alert alert-warning'>Player already attending this limited event!</div>";
            
            $sql3 = "UPDATE usermessages SET `responded_to`='1' WHERE `message_id`='$message_id' LIMIT 1";
            $result3 = mysqli_query($link, $sql3);
            if(!$result3){
                echo "<div class='alert alert-warning'>Error code: 167!</div>";
            } 
            
            exit;
        }elseif($player1 == NULL || $player1 == 0){
            $player1 = $recipient_id;
            --$seats_remaining;
        }elseif($player2 == NULL || $player2 == 0){
            $player2 = $recipient_id;
            --$seats_remaining;
        }elseif($player3 == NULL || $player3 == 0){
            $player3 = $recipient_id;
            --$seats_remaining;
        }elseif($player4 == NULL || $player4 == 0){
            $player4 = $recipient_id;
            --$seats_remaining;
        }elseif($player5 == NULL || $player5 == 0){
            $player5 = $recipient_id;
            --$seats_remaining;
        }elseif($player6 == NULL || $player6 == 0){
            $player6 = $recipient_id;
            --$seats_remaining;
        }elseif($player7 == NULL || $player7 == 0){
            $player7 = $recipient_id;
            --$seats_remaining;
        }elseif($player8 == NULL || $player8 == 0){
            $player8 = $recipient_id;
            --$seats_remaining;
        }
        
        $sql1 = "UPDATE userevents SET `seatsavailable`='$seats_remaining',`player1_id`='$player1',`player2_id`='$player2',`player3_id`='$player3',`player4_id`='$player4',`player5_id`='$player5',`player6_id`='$player6',`player7_id`='$player7',`player8_id`='$player8' WHERE `event_id`='$event_id' LIMIT 1";
        $result1 = mysqli_query($link, $sql1);
        if(!$result1){
            echo "<div class='alert alert-warning'>You have not accepted the booking, please try again later!</div>";
        }else{
            $subject = 'Your Booking has been accepted!';
            $type = 'a';
            $time = date('Y-m-d H:i:s', time());
            if($regular == "Y"){
                $weekdayArray = [];
                if($monday == 1){array_push($weekdayArray, "Mon");}
                if($tuesday == 1){array_push($weekdayArray, "Tue");}
                if($wednesday == 1){array_push($weekdayArray, "Wed");}
                if($thursday == 1){array_push($weekdayArray, "Thu");}
                if($friday == 1){array_push($weekdayArray, "Fri");}
                if($saturday == 1){array_push($weekdayArray, "Sat");}
                if($sunday == 1){array_push($weekdayArray, "Sun");}                
                $eventTimeDate = "every " . implode("-", $weekdayArray) . " at " . $eventTime . "!";
                $content = "Congratulations, you have been accepted to join $username and others at the event: $eventName to play $eventGame. We look forward to seeing you there $eventTimeDate!";
            }else{
                $eventTimeDate = "on " . $eventDate . " at " . $eventTime . "!";

                $content = "Congratulations $recipientname, you have been accepted to join $username and others at the event: $eventName to play $eventGame. We look forward to seeing you there $eventTimeDate!";
            }

            $sql2 = "INSERT INTO usermessages (`message_subject`, `message_type`, `book_seat`, `message_date`, `message_content`, `message_from`, `message_to`, `message_event`, `responded_to`) VALUES ('$subject', '$type', '0', '$time', '$content', '$user_id', '$recipient_id', '$event_id', '0')";
            $result2 = mysqli_query($link, $sql2);
            if(!$result2){
                echo '<div class="alert alert-danger">Error inserting user details into database</div>';
            }
            
            $sql3 = "UPDATE usermessages SET `responded_to`='1' WHERE `message_id`='$message_id' LIMIT 1";
            $result3 = mysqli_query($link, $sql3);
            if(!$result3){
                echo "<div class='alert alert-warning'>Error code: 167!</div>";
            } 
        }
        
    }else{
        echo "<div class='alert alert-warning'>This event has no more seats available!</div>";
        
        $sql3 = "UPDATE usermessages SET `responded_to`='1' WHERE `message_id`='$message_id' LIMIT 1";
        $result3 = mysqli_query($link, $sql3);
        if(!$result3){
            echo "<div class='alert alert-warning'>Error code: 167!</div>";
        } 
            
        exit;
    }    
}elseif($eventType == 't'){
    $sql22 = "SELECT * FROM tournament_attendance WHERE event_id='$event_id'";
    $result22 = mysqli_query($link, $sql22);
    if(mysqli_num_rows($result22)>0){
        $row2 = mysqli_fetch_array($result22, MYSQLI_ASSOC);
        $player1 = $row2['player1_id'];    
        $player2 = $row2['player2_id'];    
        $player3 = $row2['player3_id'];    
        $player4 = $row2['player4_id'];    
        $player5 = $row2['player5_id'];    
        $player6 = $row2['player6_id'];    
        $player7 = $row2['player7_id'];    
        $player8 = $row2['player8_id'];
        $player9 = $row2['player9_id'];    
        $player10 = $row2['player10_id'];    
        $player11 = $row2['player11_id'];    
        $player12 = $row2['player12_id'];    
        $player13 = $row2['player13_id'];    
        $player14 = $row2['player14_id'];    
        $player15 = $row2['player15_id'];    
        $player16 = $row2['player16_id'];
        $player17 = $row2['player17_id'];    
        $player18 = $row2['player18_id'];    
        $player19 = $row2['player19_id'];    
        $player20 = $row2['player20_id'];    
        $player21 = $row2['player21_id'];    
        $player22 = $row2['player22_id'];    
        $player23 = $row2['player23_id'];    
        $player24 = $row2['player24_id'];    
        $player25 = $row2['player25_id'];    
        $player26 = $row2['player26_id'];
        $player27 = $row2['player27_id'];    
        $player28 = $row2['player28_id'];    
        $player29 = $row2['player29_id'];
        $player30 = $row2['player30_id'];    
        $player31 = $row2['player31_id'];    
        $player32 = $row2['player32_id'];    
        $player33 = $row2['player33_id'];    
        $player34 = $row2['player34_id'];    
        $player35 = $row2['player35_id'];    
        $player36 = $row2['player36_id'];
        $player37 = $row2['player37_id'];    
        $player38 = $row2['player38_id'];    
        $player39 = $row2['player39_id'];
        $player40 = $row2['player40_id'];    
        $player41 = $row2['player41_id'];    
        $player42 = $row2['player42_id'];    
        $player43 = $row2['player43_id'];    
        $player44 = $row2['player44_id'];    
        $player45 = $row2['player45_id'];    
        $player46 = $row2['player46_id'];
        $player47 = $row2['player47_id'];    
        $player48 = $row2['player48_id'];    
        $player49 = $row2['player49_id'];
        $player50 = $row2['player50_id'];    
        $player51 = $row2['player51_id'];    
        $player52 = $row2['player52_id'];    
        $player53 = $row2['player53_id'];    
        $player54 = $row2['player54_id'];    
        $player55 = $row2['player55_id'];    
        $player56 = $row2['player56_id'];
        $player57 = $row2['player57_id'];    
        $player58 = $row2['player58_id'];    
        $player59 = $row2['player59_id'];
        $player60 = $row2['player60_id'];    
        $player61 = $row2['player61_id'];    
        $player62 = $row2['player62_id'];    
        $player63 = $row2['player63_id'];    
        $player64 = $row2['player64_id'];  
        
    }else{
        $sql4 = "INSERT INTO tournament_attendance (`event_id`) VALUES ('$event_id')";
        $result4 = mysqli_query($link, $sql4);
        if(!$result4){
            echo '<div class="alert alert-danger">Error inserting user details into ta database</div>';
        }else{
            $sql2 = "SELECT * FROM tournament_attendance WHERE event_id='$event_id'";
            $result2 = mysqli_query($link, $sql2);
            if(!$result2){
                echo "ta error";
            }else{
                $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
                $player1 = $row2['player1_id'];    
                $player2 = $row2['player2_id'];    
                $player3 = $row2['player3_id'];    
                $player4 = $row2['player4_id'];    
                $player5 = $row2['player5_id'];    
                $player6 = $row2['player6_id'];    
                $player7 = $row2['player7_id'];    
                $player8 = $row2['player8_id'];
                $player9 = $row2['player9_id'];    
                $player10 = $row2['player10_id'];    
                $player11 = $row2['player11_id'];    
                $player12 = $row2['player12_id'];    
                $player13 = $row2['player13_id'];    
                $player14 = $row2['player14_id'];    
                $player15 = $row2['player15_id'];    
                $player16 = $row2['player16_id'];
                $player17 = $row2['player17_id'];    
                $player18 = $row2['player18_id'];    
                $player19 = $row2['player19_id'];    
                $player20 = $row2['player20_id'];    
                $player21 = $row2['player21_id'];    
                $player22 = $row2['player22_id'];    
                $player23 = $row2['player23_id'];    
                $player24 = $row2['player24_id'];    
                $player25 = $row2['player25_id'];    
                $player26 = $row2['player26_id'];
                $player27 = $row2['player27_id'];    
                $player28 = $row2['player28_id'];    
                $player29 = $row2['player29_id'];
                $player30 = $row2['player30_id'];    
                $player31 = $row2['player31_id'];    
                $player32 = $row2['player32_id'];    
                $player33 = $row2['player33_id'];    
                $player34 = $row2['player34_id'];    
                $player35 = $row2['player35_id'];    
                $player36 = $row2['player36_id'];
                $player37 = $row2['player37_id'];    
                $player38 = $row2['player38_id'];    
                $player39 = $row2['player39_id'];
                $player40 = $row2['player40_id'];    
                $player41 = $row2['player41_id'];    
                $player42 = $row2['player42_id'];    
                $player43 = $row2['player43_id'];    
                $player44 = $row2['player44_id'];    
                $player45 = $row2['player45_id'];    
                $player46 = $row2['player46_id'];
                $player47 = $row2['player47_id'];    
                $player48 = $row2['player48_id'];    
                $player49 = $row2['player49_id'];
                $player50 = $row2['player50_id'];    
                $player51 = $row2['player51_id'];    
                $player52 = $row2['player52_id'];    
                $player53 = $row2['player53_id'];    
                $player54 = $row2['player54_id'];    
                $player55 = $row2['player55_id'];    
                $player56 = $row2['player56_id'];
                $player57 = $row2['player57_id'];    
                $player58 = $row2['player58_id'];    
                $player59 = $row2['player59_id'];
                $player60 = $row2['player60_id'];    
                $player61 = $row2['player61_id'];    
                $player62 = $row2['player62_id'];    
                $player63 = $row2['player63_id'];    
                $player64 = $row2['player64_id'];
            }
        }
    }
    if($player1 == $recipient_id || $player2 == $recipient_id || $player3 == $recipient_id || $player4 == $recipient_id || $player5 == $recipient_id || $player6 == $recipient_id || $player7 == $recipient_id || $player8 == $recipient_id || $player9 == $recipient_id || $player10 == $recipient_id || $player11 == $recipient_id || $player12 == $recipient_id || $player13 == $recipient_id || $player14 == $recipient_id || $player15 == $recipient_id || $player16 == $recipient_id || $player17 == $recipient_id || $player18 == $recipient_id || $player19 == $recipient_id || $player20 == $recipient_id || $player21 == $recipient_id || $player22 == $recipient_id || $player23 == $recipient_id || $player24 == $recipient_id || $player25 == $recipient_id || $player26 == $recipient_id || $player27 == $recipient_id || $player28 == $recipient_id || $player29 == $recipient_id || $player30 == $recipient_id || $player31 == $recipient_id || $player32 == $recipient_id || $player33 == $recipient_id || $player34 == $recipient_id || $player35 == $recipient_id || $player36 == $recipient_id || $player37 == $recipient_id || $player38 == $recipient_id || $player39 == $recipient_id || $player40 == $recipient_id || $player41 == $recipient_id || $player42 == $recipient_id || $player43 == $recipient_id || $player44 == $recipient_id || $player45 == $recipient_id || $player46 == $recipient_id || $player47 == $recipient_id || $player48 == $recipient_id || $player49 == $recipient_id || $player50 == $recipient_id || $player51 == $recipient_id || $player52 == $recipient_id || $player53 == $recipient_id || $player54 == $recipient_id || $player55 == $recipient_id || $player56 == $recipient_id || $player57 == $recipient_id || $player58 == $recipient_id || $player59 == $recipient_id || $player60 == $recipient_id || $player61 == $recipient_id || $player62 == $recipient_id || $player63 == $recipient_id || $player64 == $recipient_id){
            echo "<div class='alert alert-warning'>Player already attending this limited event!</div>";
            
            $sql3 = "UPDATE usermessages SET `responded_to`='1' WHERE `message_id`='$message_id' LIMIT 1";
            $result3 = mysqli_query($link, $sql3);
            if(!$result3){
                echo "<div class='alert alert-warning'>Error code: 167!</div>";
            } 
            
            exit;
        }elseif($player1 == NULL || $player1 == 0){
            $player1 = $recipient_id;
            ++$attendees;
        }elseif($player2 == NULL || $player2 == 0){
            $player2 = $recipient_id;
            ++$attendees;
        }elseif($player3 == NULL || $player3 == 0){
            $player3 = $recipient_id;
            ++$attendees;
        }elseif($player4 == NULL || $player4 == 0){
            $player4 = $recipient_id;
            ++$attendees;
        }elseif($player5 == NULL || $player5 == 0){
            $player5 = $recipient_id;
            ++$attendees;
        }elseif($player6 == NULL || $player6 == 0){
            $player6 = $recipient_id;
            ++$attendees;
        }elseif($player7 == NULL || $player7 == 0){
            $player7 = $recipient_id;
            ++$attendees;
        }elseif($player8 == NULL || $player8 == 0){
            $player8 = $recipient_id;
            ++$attendees;
        }elseif($player9 == NULL || $player9 == 0){
            $player9 = $recipient_id;
            ++$attendees;
        }elseif($player10 == NULL || $player10 == 0){
            $player1 = $recipient_id;
            ++$attendees;
        }elseif($player11 == NULL || $player11 == 0){
            $player1 = $recipient_id;
            ++$attendees;
        }elseif($player12 == NULL || $player12 == 0){
            $player2 = $recipient_id;
            ++$attendees;
        }elseif($player13 == NULL || $player13 == 0){
            $player3 = $recipient_id;
            ++$attendees;
        }elseif($player14 == NULL || $player14 == 0){
            $player4 = $recipient_id;
            ++$attendees;
        }elseif($player15 == NULL || $player15 == 0){
            $player5 = $recipient_id;
            ++$attendees;
        }elseif($player16 == NULL || $player16 == 0){
            $player6 = $recipient_id;
            ++$attendees;
        }elseif($player17 == NULL || $player17 == 0){
            $player7 = $recipient_id;
            ++$attendees;
        }elseif($player18 == NULL || $player18 == 0){
            $player8 = $recipient_id;
            ++$attendees;
        }elseif($player19 == NULL || $player19 == 0){
            $player9 = $recipient_id;
            ++$attendees;
        }elseif($player20 == NULL || $player20 == 0){
            $player1 = $recipient_id;
            ++$attendees;
        }elseif($player21 == NULL || $player21 == 0){
            $player1 = $recipient_id;
            ++$attendees;
        }elseif($player22 == NULL || $player22 == 0){
            $player2 = $recipient_id;
            ++$attendees;
        }elseif($player23 == NULL || $player23 == 0){
            $player3 = $recipient_id;
            ++$attendees;
        }elseif($player24 == NULL || $player24 == 0){
            $player4 = $recipient_id;
            ++$attendees;
        }elseif($player25 == NULL || $player25 == 0){
            $player5 = $recipient_id;
            ++$attendees;
        }elseif($player26 == NULL || $player26 == 0){
            $player6 = $recipient_id;
            ++$attendees;
        }elseif($player27 == NULL || $player27 == 0){
            $player7 = $recipient_id;
            ++$attendees;
        }elseif($player28 == NULL || $player28 == 0){
            $player8 = $recipient_id;
            ++$attendees;
        }elseif($player29 == NULL || $player29 == 0){
            $player9 = $recipient_id;
            ++$attendees;
        }elseif($player30 == NULL || $player30 == 0){
            $player1 = $recipient_id;
            ++$attendees;
        }elseif($player31 == NULL || $player31 == 0){
            $player1 = $recipient_id;
            ++$attendees;
        }elseif($player32 == NULL || $player32 == 0){
            $player2 = $recipient_id;
            ++$attendees;
        }elseif($player33 == NULL || $player33 == 0){
            $player3 = $recipient_id;
            ++$attendees;
        }elseif($player34 == NULL || $player34 == 0){
            $player4 = $recipient_id;
            ++$attendees;
        }elseif($player35 == NULL || $player35 == 0){
            $player5 = $recipient_id;
            ++$attendees;
        }elseif($player36 == NULL || $player36 == 0){
            $player6 = $recipient_id;
            ++$attendees;
        }elseif($player37 == NULL || $player37 == 0){
            $player7 = $recipient_id;
            ++$attendees;
        }elseif($player38 == NULL || $player38 == 0){
            $player8 = $recipient_id;
            ++$attendees;
        }elseif($player39 == NULL || $player39 == 0){
            $player9 = $recipient_id;
            ++$attendees;
        }elseif($player40 == NULL || $player40 == 0){
            $player1 = $recipient_id;
            ++$attendees;
        }elseif($player41 == NULL || $player41 == 0){
            $player1 = $recipient_id;
            ++$attendees;
        }elseif($player42 == NULL || $player42 == 0){
            $player2 = $recipient_id;
            ++$attendees;
        }elseif($player43 == NULL || $player43 == 0){
            $player3 = $recipient_id;
            ++$attendees;
        }elseif($player44 == NULL || $player44 == 0){
            $player4 = $recipient_id;
            ++$attendees;
        }elseif($player45 == NULL || $player45 == 0){
            $player5 = $recipient_id;
            ++$attendees;
        }elseif($player46 == NULL || $player46 == 0){
            $player6 = $recipient_id;
            ++$attendees;
        }elseif($player47 == NULL || $player47 == 0){
            $player7 = $recipient_id;
            ++$attendees;
        }elseif($player48 == NULL || $player48 == 0){
            $player8 = $recipient_id;
            ++$attendees;
        }elseif($player49 == NULL || $player49 == 0){
            $player9 = $recipient_id;
            ++$attendees;
        }elseif($player50 == NULL || $player50 == 0){
            $player1 = $recipient_id;
            ++$attendees;
        }elseif($player51 == NULL || $player51 == 0){
            $player1 = $recipient_id;
            ++$attendees;
        }elseif($player52 == NULL || $player52 == 0){
            $player2 = $recipient_id;
            ++$attendees;
        }elseif($player53 == NULL || $player53 == 0){
            $player3 = $recipient_id;
            ++$attendees;
        }elseif($player54 == NULL || $player54 == 0){
            $player4 = $recipient_id;
            ++$attendees;
        }elseif($player55 == NULL || $player55 == 0){
            $player5 = $recipient_id;
            ++$attendees;
        }elseif($player56 == NULL || $player56 == 0){
            $player6 = $recipient_id;
            ++$attendees;
        }elseif($player57 == NULL || $player57 == 0){
            $player7 = $recipient_id;
            ++$attendees;
        }elseif($player58 == NULL || $player58 == 0){
            $player8 = $recipient_id;
            ++$attendees;
        }elseif($player59 == NULL || $player59 == 0){
            $player9 = $recipient_id;
            ++$attendees;
        }elseif($player60 == NULL || $player60 == 0){
            $player1 = $recipient_id;
            ++$attendees;
        }elseif($player61 == NULL || $player61 == 0){
            $player1 = $recipient_id;
            ++$attendees;
        }elseif($player62 == NULL || $player62 == 0){
            $player2 = $recipient_id;
            ++$attendees;
        }elseif($player63 == NULL || $player63 == 0){
            $player3 = $recipient_id;
            ++$attendees;
        }elseif($player64 == NULL || $player64 == 0){
            $player4 = $recipient_id;
            ++$attendees;
        }
        
        $sql1 = "UPDATE userevents SET `attendees`='$attendees' WHERE `event_id`='$event_id' LIMIT 1";
        $result1 = mysqli_query($link, $sql1);
        if(!$result1){
            echo "<div class='alert alert-warning'>You have not accepted the booking, please try again later!</div>";
        }else{
            $subject = 'Your Booking has been accepted!';
            $type = 'a';
            $time = date('Y-m-d H:i:s', time());
            if($regular == "Y"){
                $weekdayArray = [];
                if($monday == 1){array_push($weekdayArray, "Mon");}
                if($tuesday == 1){array_push($weekdayArray, "Tue");}
                if($wednesday == 1){array_push($weekdayArray, "Wed");}
                if($thursday == 1){array_push($weekdayArray, "Thu");}
                if($friday == 1){array_push($weekdayArray, "Fri");}
                if($saturday == 1){array_push($weekdayArray, "Sat");}
                if($sunday == 1){array_push($weekdayArray, "Sun");}                
                $eventTimeDate = "every " . implode("-", $weekdayArray) . " at " . $eventTime . "!";
                $content = "Congratulations, you have been accepted to join $username and others at the event: $eventName to play $eventGame. We look forward to seeing you there $eventTimeDate!";
            }else{
                $eventTimeDate = "on " . $eventDate . " at " . $eventTime . "!";

                $content = "Congratulations $recipientname, you have been accepted to join $username and others at the event: $eventName to play $eventGame. We look forward to seeing you there $eventTimeDate!";
            }

            $sql2 = "INSERT INTO usermessages (`message_subject`, `message_type`, `book_seat`, `message_date`, `message_content`, `message_from`, `message_to`, `message_event`, `responded_to`) VALUES ('$subject', '$type', '0', '$time', '$content', '$user_id', '$recipient_id', '$event_id', '0')";
            $result2 = mysqli_query($link, $sql2);
            if(!$result2){
                echo '<div class="alert alert-danger">Error inserting user details into database</div>';
            }
            
            $sql3 = "UPDATE usermessages SET `responded_to`='1' WHERE `message_id`='$message_id' LIMIT 1";
            $result3 = mysqli_query($link, $sql3);
            if(!$result3){
                echo "<div class='alert alert-warning'>Error code: 167!</div>";
            }
            $sql4 = "UPDATE tournament_attendance SET `player1_id`='$player1',`player2_id`='$player2',`player3_id`='$player3',`player4_id`='$player4',`player5_id`='$player5',`player6_id`='$player6',`player7_id`='$player7',`player8_id`='$player8',`player9_id`='$player9',`player10_id`='$player10',`player11_id`='$player11',`player12_id`='$player12',`player13_id`='$player13',`player14_id`='$player14',`player15_id`='$player15',`player16_id`='$player16',`player17_id`='$player17',`player18_id`='$player18',`player19_id`='$player19',`player20_id`='$player20',`player21_id`='$player21',`player22_id`='$player22',`player23_id`='$player23',`player24_id`='$player24',`player25_id`='$player25',`player26_id`='$player26',`player27_id`='$player27',`player28_id`='$player28',`player29_id`='$player29',`player30_id`='$player30',`player31_id`='$player31',`player32_id`='$player32',`player33_id`='$player33',`player34_id`='$player34',`player35_id`='$player35',`player36_id`='$player36',`player37_id`='$player37',`player38_id`='$player38',`player39_id`='$player39',`player40_id`='$player40',`player41_id`='$player41',`player42_id`='$player42',`player43_id`='$player43',`player44_id`='$player44',`player45_id`='$player45',`player46_id`='$player46',`player47_id`='$player47',`player48_id`='$player48',`player49_id`='$player49',`player50_id`='$player50',`player51_id`='$player51',`player52_id`='$player52',`player53_id`='$player53',`player54_id`='$player54',`player55_id`='$player55',`player56_id`='$player56',`player57_id`='$player57',`player58_id`='$player58',`player59_id`='$player59',`player60_id`='$player60',`player61_id`='$player61',`player62_id`='$player62',`player63_id`='$player63',`player64_id`='$player64' WHERE `event_id`='$event_id' LIMIT 1";
            $result4 = mysqli_query($link, $sql4);
            if(!$result4){
                echo '<div class="alert alert-danger">Error inserting user details into ta database</div>';
            }
        }
         
}else{
    $sql02 = "SELECT * FROM open_event_attendance WHERE user_id='$recipient_id' AND event_id='$event_id'";
    $result02 = mysqli_query($link, $sql02);
    if(!$result02){
        echo "oea error";
    }
    
    $results02 = mysqli_num_rows($result02);
    if($results02){
        echo "<div class='alert alert-warning'>Player already attending this open event!</div>";
        
        $sql3 = "UPDATE usermessages SET `responded_to`='1' WHERE `message_id`='$message_id' LIMIT 1";
        $result3 = mysqli_query($link, $sql3);
        if(!$result3){
            echo "<div class='alert alert-warning'>Error code: 167!</div>";
        } 
        
        exit;
    } 
    
    $seats_remaining = NULL;
    $attendees = $attendees + 1;
    
    $sql1 = "UPDATE userevents SET `seatsavailable`='$seats_remaining',`attendees`='$attendees' WHERE `event_id`='$event_id' LIMIT 1";
    $result1 = mysqli_query($link, $sql1);
    if(!$result1){
        echo "<div class='alert alert-warning'>You have not increased the attendees at your open event, please try again later!</div>";
    }else{
        $subject = 'Your Booking has been accepted!';
        $type = 'a';
        $time = date('Y-m-d H:i:s', time());
        if($regular == "Y"){
            $weekdayArray = [];
            if($monday == 1){array_push($weekdayArray, "Mon");}
            if($tuesday == 1){array_push($weekdayArray, "Tue");}
            if($wednesday == 1){array_push($weekdayArray, "Wed");}
            if($thursday == 1){array_push($weekdayArray, "Thu");}
            if($friday == 1){array_push($weekdayArray, "Fri");}
            if($saturday == 1){array_push($weekdayArray, "Sat");}
            if($sunday == 1){array_push($weekdayArray, "Sun");}
            $eventTimeDate = "every " . implode("-", $weekdayArray) . " at " . $eventTime . "!";
            $content = "Congratulations, you have been accepted to join $username and others at the event: $eventName to play $eventGame. We look forward to seeing you there $eventTimeDate!";
        }else{
            $eventTimeDate = "on " . $eventDate . " at " . $eventTime . "!";
                $content = "Congratulations $recipientname, you have been accepted to join $username and others at the event: $eventName to play $eventGame. We look forward to seeing you there $eventTimeDate!";
        }
        
        $sql2 = "INSERT INTO usermessages (`message_subject`, `message_type`, `book_seat`, `message_date`, `message_content`, `message_from`, `message_to`, `message_event`, `responded_to`) VALUES ('$subject', '$type', '0', '$time', '$content', '$user_id', '$recipient_id', '$event_id', '0')";
        $result2 = mysqli_query($link, $sql2);
        if(!$result2){
            echo '<div class="alert alert-danger">Error inserting user details into database</div>';
        }
        
        $sql3 = "UPDATE usermessages SET `responded_to`='1' WHERE `message_id`='$message_id' LIMIT 1";
        $result3 = mysqli_query($link, $sql3);
        if(!$result3){
            echo "<div class='alert alert-warning'>Error code: 167!</div>";
        }
        
        $sql4 = "INSERT INTO open_event_attendance (`user_id`, `event_id`, `time`) VALUES ('$recipient_id', '$event_id', '$time')";
        $result4 = mysqli_query($link, $sql4);
        if(!$result4){
            echo '<div class="alert alert-danger">Error inserting user details into oea database</div>';
        }
        
    }
}



?>