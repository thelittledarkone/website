<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

//Get user id
$user_id = $_SESSION['user_id'];
$event_id = $_SESSION["event_id"];

$sql0 = "SELECT * FROM event_forum_categories WHERE event_id='$event_id'";
$result0 = mysqli_query($link, $sql0);
if(mysqli_num_rows($result0)>0){
    $forumCreated = 1;
}else{
    $forumCreated = 0;
}

//Get limited event attendees
$sql00 = "SELECT * FROM open_event_attendance WHERE event_id='$event_id' && user_id='$user_id'";
$result00 = mysqli_query($link, $sql00);
if(mysqli_num_rows($result00)>0){
    $openattendee = 1;
}else{
    $openattendee = 0;
}    

//Get limited event attendees
$sql000 = "SELECT * FROM rpg_party WHERE event_id='$event_id'";
$result000 = mysqli_query($link, $sql000);
if(mysqli_num_rows($result000)>0){
    $partyCreated = 1;
}else{
    $partyCreated = 0;
}

//Get limited event attendees
$sql0000 = "SELECT * FROM tournament_attendance WHERE event_id='$event_id' AND (player1_id='$user_id' || player2_id='$user_id' || player3_id='$user_id' || player4_id='$user_id' || player5_id='$user_id' || player6_id='$user_id' || player7_id='$user_id' || player8_id='$user_id' || player9_id='$user_id' || player10_id='$user_id' || player11_id='$user_id' || player12_id='$user_id' || player13_id='$user_id' || player14_id='$user_id' || player15_id='$user_id' || player16_id='$user_id' || player17_id='$user_id' || player18_id='$user_id' || player19_id='$user_id' || player20_id='$user_id' || player21_id='$user_id' || player22_id='$user_id' || player23_id='$user_id' || player24_id='$user_id' || player25_id='$user_id' || player26_id='$user_id' || player27_id='$user_id' || player28_id='$user_id' || player29_id='$user_id' || player30_id='$user_id' || player31_id='$user_id' || player32_id='$user_id' || player33_id='$user_id' || player34_id='$user_id' || player35_id='$user_id' || player36_id='$user_id' || player37_id='$user_id' || player38_id='$user_id' || player39_id='$user_id' || player40_id='$user_id' || player41_id='$user_id' || player42_id='$user_id' || player43_id='$user_id' || player44_id='$user_id' || player45_id='$user_id' || player46_id='$user_id' || player47_id='$user_id' || player48_id='$user_id' || player49_id='$user_id' || player50_id='$user_id' || player51_id='$user_id' || player52_id='$user_id' || player53_id='$user_id' || player54_id='$user_id' || player55_id='$user_id' || player56_id='$user_id' || player57_id='$user_id' || player58_id='$user_id' || player59_id='$user_id' || player60_id='$user_id' || player61_id='$user_id' || player62_id='$user_id' || player63_id='$user_id' || player64_id='$user_id')";
$result0000 = mysqli_query($link, $sql0000);
if(mysqli_num_rows($result0000)>0){
    $tournAttend = 1;
}else{
    $tournAttend = 0;
}

//Get event
$sql = "SELECT * FROM userevents WHERE event_id='$event_id' LIMIT 1";
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    if($row['regular'] == "N"){
                    $frequency = "One-Off Event";
                    $time = "on " . $row['date'] . " at " . $row['time'] . ".";

                    //check if date is in past
//                    $source = $row['date'];
//                    $eventDate = DateTime::createFromFormat('D d M, yy', $source);
//                    $today = date('D d M, yy');
//                    $todayDate = DateTime::createFromFormat('D d M, yy', $today);
//                    if($eventDate < $todayDate){
//                        continue;
//                    }

                }else{
                    $frequency = "Regular Event";
                    $weekdayArray = [];
                    $weekdays = ['monday'=>'Mon', 'tuesday'=>'Tue', 'wednesday'=>'Wed', 'thursday'=>'Thu', 'friday'=>'Fri', 'saturday'=>'Sat', 'sunday'=>'Sun'];
                    foreach($weekdays as $key => $value){
                        if($row[$key] == 1){array_push($weekdayArray, $value);}
                    }
                    $time = "every " . implode("-", $weekdayArray) . " at " . $row['time'] . ".";
                }
                $eventaddress = $row['address'];
                $eventaddress2 = $row['address2'];
                $eventdistrict = $row['district'];
                $eventcity = $row['city'];
                $eventpostcode = $row['postal_code'];
                $eventname = $row['event_name'];
                
    
                $eventgame = $row['event_game'];
                //Get game details
                $sql00000 = "SELECT * FROM games WHERE game_id='$eventgame'";
                $result00000 = mysqli_query($link, $sql00000);
                if(mysqli_num_rows($result00000)>0){
                    $row00000 = mysqli_fetch_array($result00000, MYSQLI_ASSOC);
                    $game_name = $row00000['game_name'];
                }
                
                $eventType = $row['event_type'];
                $eventseats = $row['seatsavailable'];
                $teventseats = $row['tournseatsavailable'];
                $attendees = $row['attendees'];
    
                $rawaboutEvent = $row['about_event'];
                $aboutEvent = nl2br(htmlentities($rawaboutEvent, ENT_QUOTES, 'UTF-8'));
            
                $timeadded = $row['date_added'];
                $dateadded = new DateTime($timeadded);
                $now = new DateTime();

                $diff = $now->diff($dateadded)->format("%a");
                if($diff > 364){
                    $diffyears = floor($diff/365);
                    $diffdays = $diff-($diffyears*365);
                }
       
            //Get user_id
            $host_id = $row['user_id'];
            $player1 = $row['player1_id'];
            $player2 = $row['player2_id'];
            $player3 = $row['player3_id'];
            $player4 = $row['player4_id'];
            $player5 = $row['player5_id'];
            $player6 = $row['player6_id'];
            $player7 = $row['player7_id'];
            $player8 = $row['player8_id'];
    
}else{
    echo '<div class="alert alert-danger">There was an error retrieving the username and email from the database</div>';
}

//Get host stats
$sqlH = "SELECT * FROM users WHERE user_id='$host_id' LIMIT 1";
$resultH = mysqli_query($link, $sqlH);
if(mysqli_num_rows($resultH)>0){
    $rowH = mysqli_fetch_array($resultH, MYSQLI_ASSOC);
    $hostusername = $rowH['username'];
    $hostpicture = $rowH['profilepicture'];
    $hostinfo = $rowH['moreinformation'];
    
    //Get Friend Status and other stats
    $sqlH6 = "SELECT * FROM user_links WHERE (user1_id='$host_id' AND user2_id='$user_id') OR (user2_id='$host_id' AND user1_id='$user_id') LIMIT 1";
    $resultH6 = mysqli_query($link, $sqlH6);
    if(mysqli_num_rows($resultH6)>0){
        $rowH6 = mysqli_fetch_array($resultH6, MYSQLI_ASSOC);
        $hFriendStatus = $rowH6['friend_status'];
        if($rowH6['user1_id'] == $host_id){
            $hostVoteStatus = $rowH6['user1_host_vote'];
        }else{
            $hostVoteStatus = $rowH6['user2_host_vote'];
        }
    }
    
    $sqlH9 = "SELECT COUNT(*) AS count FROM user_links WHERE (user2_follow_user1='1' AND user1_id='$host_id') OR (user1_follow_user2='1' AND user2_id='$host_id')";
    $resultH9 = mysqli_query($link, $sqlH9);
    $hFollowerCount = mysqli_fetch_assoc($resultH9)['count'];
    
    $sqlH7 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_host_vote='2' AND user1_id='$host_id') OR (user2_host_vote='2' AND user2_id='$host_id')";
    $resultH7 = mysqli_query($link, $sqlH7);
    $upvoteHCount = mysqli_fetch_assoc($resultH7)['count'];

    $sqlH8 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_host_vote='1' AND user1_id='$host_id') OR (user2_host_vote='1' AND user2_id='$host_id')";
    $resultH8 = mysqli_query($link, $sqlH8);
    $downvoteHCount = mysqli_fetch_assoc($resultH8)['count'];

    $totalHRep = $upvoteHCount - $downvoteHCount;

}

if($eventType == 'l'){
    if($player1 != NULL && $player1 != 0){
        //Get p1 stats
        $sql1 = "SELECT * FROM users WHERE user_id='$player1' LIMIT 1";
        $result1 = mysqli_query($link, $sql1);
        if(mysqli_num_rows($result1)>0){
            $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
            $p1username = $row1['username'];
            $p1picture = $row1['profilepicture'];

            //Get Friend Status and other stats
            $sql16 = "SELECT * FROM user_links WHERE (user1_id='$player1' AND user2_id='$user_id') OR (user2_id='$player1' AND user1_id='$user_id') LIMIT 1";
            $result16 = mysqli_query($link, $sql16);
            if(mysqli_num_rows($result16)>0){
                $row16 = mysqli_fetch_array($result16, MYSQLI_ASSOC);
                $p1FriendStatus = $row16['friend_status'];
                if($row16['user1_id'] == $player1){
                    $p1playerVoteStatus = $row16['user1_player_vote'];
                }else{
                    $p1playerVoteStatus = $row16['user2_player_vote'];
                }
            }

            $sql19 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_player_vote='2' AND user1_id='$player1') OR (user2_player_vote='2' AND user2_id='$player1')";
            $result19 = mysqli_query($link, $sql19);
            $p1upvotePCount = mysqli_fetch_assoc($result19)['count'];

            $sql15 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_player_vote='1' AND user1_id='$player1') OR (user2_player_vote='1' AND user2_id='$player1')";
            $result15 = mysqli_query($link, $sql15);
            $p1downvotePCount = mysqli_fetch_assoc($result15)['count'];

            $p1totalPRep = $p1upvotePCount - $p1downvotePCount;
        }
    }

    if($player2 != NULL && $player2 != 0){
        //Get p2 stats
        $sql2 = "SELECT * FROM users WHERE user_id='$player2' LIMIT 1";
        $result2 = mysqli_query($link, $sql2);
        if(mysqli_num_rows($result2)>0){
            $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
            $p2username = $row2['username'];
            $p2picture = $row2['profilepicture'];

            //Get Friend Status and other stats
            $sql26 = "SELECT * FROM user_links WHERE (user1_id='$player2' AND user2_id='$user_id') OR (user2_id='$player2' AND user1_id='$user_id') LIMIT 1";
            $result26 = mysqli_query($link, $sql26);
            if(mysqli_num_rows($result26)>0){
                $row26 = mysqli_fetch_array($result26, MYSQLI_ASSOC);
                $p2FriendStatus = $row26['friend_status'];
                if($row26['user1_id'] == $player2){
                    $p2playerVoteStatus = $row26['user1_player_vote'];
                }else{
                    $p2playerVoteStatus = $row26['user2_player_vote'];
                }
            }

            $sql29 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_player_vote='2' AND user1_id='$player2') OR (user2_player_vote='2' AND user2_id='$player2')";
            $result29 = mysqli_query($link, $sql29);
            $p2upvotePCount = mysqli_fetch_assoc($result29)['count'];

            $sql25 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_player_vote='1' AND user1_id='$player2') OR (user2_player_vote='1' AND user2_id='$player2')";
            $result25 = mysqli_query($link, $sql25);
            $p2downvotePCount = mysqli_fetch_assoc($result25)['count'];

            $p2totalPRep = $p2upvotePCount - $p2downvotePCount;
        }
    }

    if($player3 != NULL && $player3 != 0){
        //Get p3 stats
        $sql3 = "SELECT * FROM users WHERE user_id='$player3' LIMIT 1";
        $result3 = mysqli_query($link, $sql3);
        if(mysqli_num_rows($result3)>0){
            $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
            $p3username = $row3['username'];
            $p3picture = $row3['profilepicture'];

            //Get Friend Status and other stats
            $sql36 = "SELECT * FROM user_links WHERE (user1_id='$player3' AND user2_id='$user_id') OR (user2_id='$player3' AND user1_id='$user_id') LIMIT 1";
            $result36 = mysqli_query($link, $sql36);
            if(mysqli_num_rows($result36)>0){
                $row36 = mysqli_fetch_array($result36, MYSQLI_ASSOC);
                $p3FriendStatus = $row36['friend_status'];
                if($row36['user1_id'] == $player3){
                    $p3playerVoteStatus = $row36['user1_player_vote'];
                }else{
                    $p3playerVoteStatus = $row36['user2_player_vote'];
                }
            }

            $sql39 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_player_vote='2' AND user1_id='$player3') OR (user2_player_vote='2' AND user2_id='$player3')";
            $result39 = mysqli_query($link, $sql39);
            $p3upvotePCount = mysqli_fetch_assoc($result39)['count'];

            $sql35 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_player_vote='1' AND user1_id='$player3') OR (user2_player_vote='1' AND user2_id='$player3')";
            $result35 = mysqli_query($link, $sql35);
            $p3downvotePCount = mysqli_fetch_assoc($result35)['count'];

            $p3totalPRep = $p3upvotePCount - $p3downvotePCount;
        }
    }

    if($player4 != NULL && $player4 != 0){
        //Get p4 stats
        $sql4 = "SELECT * FROM users WHERE user_id='$player4' LIMIT 1";
        $result4 = mysqli_query($link, $sql4);
        if(mysqli_num_rows($result4)>0){
            $row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC);
            $p4username = $row4['username'];
            $p4picture = $row4['profilepicture'];

            //Get Friend Status and other stats
            $sql46 = "SELECT * FROM user_links WHERE (user1_id='$player4' AND user2_id='$user_id') OR (user2_id='$player4' AND user1_id='$user_id') LIMIT 1";
            $result46 = mysqli_query($link, $sql46);
            if(mysqli_num_rows($result46)>0){
                $row46 = mysqli_fetch_array($result46, MYSQLI_ASSOC);
                $p4FriendStatus = $row46['friend_status'];
                if($row46['user1_id'] == $player4){
                    $p4playerVoteStatus = $row46['user1_player_vote'];
                }else{
                    $p4playerVoteStatus = $row46['user2_player_vote'];
                }
            }

            $sql49 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_player_vote='2' AND user1_id='$player4') OR (user2_player_vote='2' AND user2_id='$player4')";
            $result49 = mysqli_query($link, $sql49);
            $p4upvotePCount = mysqli_fetch_assoc($result49)['count'];

            $sql45 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_player_vote='1' AND user1_id='$player4') OR (user2_player_vote='1' AND user2_id='$player4')";
            $result45 = mysqli_query($link, $sql45);
            $p4downvotePCount = mysqli_fetch_assoc($result45)['count'];

            $p4totalPRep = $p4upvotePCount - $p4downvotePCount;
        }
    }

    if($player5 != NULL && $player5 != 0){
        //Get p5 stats
        $sql5 = "SELECT * FROM users WHERE user_id='$player5' LIMIT 1";
        $result5 = mysqli_query($link, $sql5);
        if(mysqli_num_rows($result5)>0){
            $row5 = mysqli_fetch_array($result5, MYSQLI_ASSOC);
            $p5username = $row5['username'];
            $p5picture = $row5['profilepicture'];

            //Get Friend Status and other stats
            $sql56 = "SELECT * FROM user_links WHERE (user1_id='$player5' AND user2_id='$user_id') OR (user2_id='$player5' AND user1_id='$user_id') LIMIT 1";
            $result56 = mysqli_query($link, $sql56);
            if(mysqli_num_rows($result56)>0){
                $row56 = mysqli_fetch_array($result56, MYSQLI_ASSOC);
                $p5FriendStatus = $row56['friend_status'];
                if($row56['user1_id'] == $player5){
                    $p5playerVoteStatus = $row56['user1_player_vote'];
                }else{
                    $p5playerVoteStatus = $row56['user2_player_vote'];
                }
            }

            $sql59 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_player_vote='2' AND user1_id='$player5') OR (user2_player_vote='2' AND user2_id='$player5')";
            $result59 = mysqli_query($link, $sql59);
            $p5upvotePCount = mysqli_fetch_assoc($result59)['count'];

            $sql55 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_player_vote='1' AND user1_id='$player5') OR (user2_player_vote='1' AND user2_id='$player5')";
            $result55 = mysqli_query($link, $sql55);
            $p5downvotePCount = mysqli_fetch_assoc($result55)['count'];

            $p5totalPRep = $p5upvotePCount - $p5downvotePCount;
        }
    }

    if($player6 != NULL && $player6 != 0){
        //Get p6 stats
        $sql6 = "SELECT * FROM users WHERE user_id='$player6' LIMIT 1";
        $result6 = mysqli_query($link, $sql6);
        if(mysqli_num_rows($result6)>0){
            $row6 = mysqli_fetch_array($result6, MYSQLI_ASSOC);
            $p6username = $row6['username'];
            $p6picture = $row6['profilepicture'];

            //Get Friend Status and other stats
            $sql66 = "SELECT * FROM user_links WHERE (user1_id='$player6' AND user2_id='$user_id') OR (user2_id='$player6' AND user1_id='$user_id') LIMIT 1";
            $result66 = mysqli_query($link, $sql66);
            if(mysqli_num_rows($result66)>0){
                $row66 = mysqli_fetch_array($result66, MYSQLI_ASSOC);
                $p6FriendStatus = $row66['friend_status'];
                if($row66['user1_id'] == $player6){
                    $p6playerVoteStatus = $row66['user1_player_vote'];
                }else{
                    $p6playerVoteStatus = $row66['user2_player_vote'];
                }
            }

            $sql69 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_player_vote='2' AND user1_id='$player6') OR (user2_player_vote='2' AND user2_id='$player6')";
            $result69 = mysqli_query($link, $sql69);
            $p6upvotePCount = mysqli_fetch_assoc($result69)['count'];

            $sql65 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_player_vote='1' AND user1_id='$player6') OR (user2_player_vote='1' AND user2_id='$player6')";
            $result65 = mysqli_query($link, $sql65);
            $p6downvotePCount = mysqli_fetch_assoc($result65)['count'];

            $p6totalPRep = $p6upvotePCount - $p6downvotePCount;
        }
    }

    if($player7 != NULL && $player7 != 0){
        //Get p7 stats
        $sql7 = "SELECT * FROM users WHERE user_id='$player7' LIMIT 1";
        $result7 = mysqli_query($link, $sql7);
        if(mysqli_num_rows($result7)>0){
            $row7 = mysqli_fetch_array($result7, MYSQLI_ASSOC);
            $p7username = $row7['username'];
            $p7picture = $row7['profilepicture'];

            //Get Friend Status and other stats
            $sql76 = "SELECT * FROM user_links WHERE (user1_id='$player7' AND user2_id='$user_id') OR (user2_id='$player7' AND user1_id='$user_id') LIMIT 1";
            $result76 = mysqli_query($link, $sql76);
            if(mysqli_num_rows($result76)>0){
                $row76 = mysqli_fetch_array($result76, MYSQLI_ASSOC);
                $p7FriendStatus = $row76['friend_status'];
                if($row76['user1_id'] == $player7){
                    $p7playerVoteStatus = $row76['user1_player_vote'];
                }else{
                    $p7playerVoteStatus = $row76['user2_player_vote'];
                }
            }

            $sql79 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_player_vote='2' AND user1_id='$player7') OR (user2_player_vote='2' AND user2_id='$player7')";
            $result79 = mysqli_query($link, $sql79);
            $p7upvotePCount = mysqli_fetch_assoc($result79)['count'];

            $sql75 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_player_vote='1' AND user1_id='$player7') OR (user2_player_vote='1' AND user2_id='$player7')";
            $result75 = mysqli_query($link, $sql75);
            $p7downvotePCount = mysqli_fetch_assoc($result75)['count'];

            $p7totalPRep = $p7upvotePCount - $p7downvotePCount;
        }
    }

    if($player8 != NULL && $player8 != 0){
        //Get p8 stats
        $sql8 = "SELECT * FROM users WHERE user_id='$player8' LIMIT 1";
        $result8 = mysqli_query($link, $sql8);
        if(mysqli_num_rows($result8)>0){
            $row8 = mysqli_fetch_array($result8, MYSQLI_ASSOC);
            $p8username = $row8['username'];
            $p8picture = $row8['profilepicture'];

            //Get Friend Status and other stats
            $sql86 = "SELECT * FROM user_links WHERE (user1_id='$player8' AND user2_id='$user_id') OR (user2_id='$player8' AND user1_id='$user_id') LIMIT 1";
            $result86 = mysqli_query($link, $sql86);
            if(mysqli_num_rows($result86)>0){
                $row86 = mysqli_fetch_array($result86, MYSQLI_ASSOC);
                $p8FriendStatus = $row86['friend_status'];
                if($row86['user1_id'] == $player8){
                    $p8playerVoteStatus = $row86['user1_player_vote'];
                }else{
                    $p8playerVoteStatus = $row86['user2_player_vote'];
                }
            }

            $sql89 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_player_vote='2' AND user1_id='$player8') OR (user2_player_vote='2' AND user2_id='$player8')";
            $result89 = mysqli_query($link, $sql89);
            $p8upvotePCount = mysqli_fetch_assoc($result89)['count'];

            $sql85 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_player_vote='1' AND user1_id='$player8') OR (user2_player_vote='1' AND user2_id='$player8')";
            $result85 = mysqli_query($link, $sql85);
            $p8downvotePCount = mysqli_fetch_assoc($result85)['count'];

            $p8totalPRep = $p8upvotePCount - $p8downvotePCount;
        }
    }
}

echo "
<div id='mainEventContainer'>
    <h1>$eventname</h1>
    <table class='table table-condensed'>
        <tr>
            <td class='col-xs-3'>Game:</td>
            <td class='col-xs-9'><a href='gameprofile.php?game_name=$game_name'><span>$game_name</span></a></td>
        </tr>
        <tr>
            <td class='col-xs-3'>When:</td>
            <td class='col-xs-9'>
                <div>$frequency $time</div>
            </td>
        </tr>
        <tr>
            <td class='col-xs-3'>First Posted:</td>
            <td class='col-xs-9'>
                <div class='timeDetails'>$timeadded - ";
                    if($diff > 364){
                        echo "$diffyears years and $diffdays days ago</div>";
                    }else{
                        echo "$diff days ago</div>";
                    }
    echo "</td>
        </tr>";
if($eventType == 'o' || $eventType == 't'){
    echo "<tr>
            <td class='col-xs-3'>People Attending:</td>
            <td class='col-xs-9'>
                <div>$attendees";
                if($eventType == 't'){
                    echo "/$teventseats";
                }
                if($openattendee == 1 || $tournAttend == 1){
                    echo "<strong><i> (YOU are attending this event)</i></strong>";
                }
            echo "</div>
            </td>
        </tr>";
}
                
echo "
        <tr>
            <td>Address:</td>
            <td>";
if($host_id == $user_id || $player1 == $user_id || $player2 == $user_id || $player3 == $user_id || $player4 == $user_id || $player5 == $user_id || $player6 == $user_id || $player7 == $user_id || $player8 == $user_id || $openattendee == 1 || $tournAttend == 1){
            if($eventaddress != ''){
                echo "<div>$eventaddress</div>";
            }
            if($eventaddress2 != ''){
                echo "<div>$eventaddress2</div>";
            }
            if($eventdistrict != ''){
                echo "<div>$eventdistrict</div>";
            }
    
}else{
    echo "<div><i>Full address will be revealed upon being accepted to join this event.</i></div>";
}
            
            if($eventcity != ''){
                echo "<div><strong>$eventcity</strong></div>";
            }
if($host_id == $user_id || $player1 == $user_id || $player2 == $user_id || $player3 == $user_id || $player4 == $user_id || $player5 == $user_id || $player6 == $user_id || $player7 == $user_id || $player8 == $user_id || $openattendee == 1 || $tournAttend == 1){
            if($eventpostcode != ''){
                echo "<div>$eventpostcode</div>";
            }
}
//            echo "<div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
//                                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
//                                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
//                                    <div>$eventcity</div>
//                                    <div>&nbsp;&nbsp;&nbsp;&nbsp;</div>
//                                    ";
    echo "</td>
        </tr>
        <tr>
            <td>Event Details:</td>
            <td><div class='expandable' data-js-expandable>
                    <div class='innerContent' data-js-expandable-inner>$aboutEvent</div>
                </div>
                <div class='expandable__btn__wrapper'  data-js-expander>
                   <button class='btn expandable__btn'></button>
                </div>
            </td>
        </tr>
    </table>
    <div class='eventBtnContainer'>";
if($host_id == $user_id){
    echo "
        <a class='btn btnDone evtBtn' href='bookingmanager.php?event_id=$event_id' name='gotoevent' type='button'>Manage Bookings</a>
        <button class='btn btn-danger evtBtn deleteEvent' id='$event_id' name='deleteevent' type='button'>Delete Event</button>";
    if($forumCreated != 1){
        echo "<button class='btn btnDone evtBtn createForum' id='$event_id' name='createforum' type='button'>Create Forum</button>
        ";
    }
    if($partyCreated != 1 && $eventType == 'l'){
        echo "<button type='button' id='party' class='btn content__btn btnColor evtBtn' data-toggle='modal' data-target='#createPartyModal' data-event_id='$event_id'>Create Party</button>
        ";
    }
}
if($forumCreated == 1 && ($host_id == $user_id || $player1 == $user_id || $player2 == $user_id || $player3 == $user_id || $player4 == $user_id || $player5 == $user_id || $player6 == $user_id || $player7 == $user_id || $player8 == $user_id || $openattendee == 1 || $tournAttend == 1)){
    echo "
        <a class='btn btnColor evtBtn' href='eventforum.php?event_id=$event_id' name='gotoevent' type='button'>Enter Event Forum</a>";
}

if(($host_id == $user_id || $tournAttend == 1) && $eventType == 't'){
    echo "
        <a class='btn btnColor evtBtn' href='tournamentpage.php?event_id=$event_id' name='gototourn' type='button'>Tournament Page</a>";
}

if($partyCreated == 1 && $eventType == 'l' && $host_id == $user_id){
    echo "
        <a class='btn btnColor evtBtn' href='adventureparty.php?event_id=$event_id' name='gotoadventure' type='button'>Go To Adventure</a>";
}else if($partyCreated == 1 && $eventType == 'l' && ($player1 == $user_id || $player2 == $user_id || $player3 == $user_id || $player4 == $user_id || $player5 == $user_id || $player6 == $user_id || $player7 == $user_id || $player8 == $user_id)){
    echo "
        <a class='btn btnColor evtBtn' href='adventurecharacter.php?event_id=$event_id' name='gotocharacter' type='button'>Go To Character</a>";
}

if($host_id != $user_id && $player1 != $user_id && $player2 != $user_id && $player3 != $user_id && $player4 != $user_id && $player5 != $user_id && $player6 != $user_id && $player7 != $user_id && $player8 != $user_id && $openattendee != 1 && $tournAttend != 1){
    echo "
        <button type='button' id='message' class='btn content__btn btnColor evtBtn' data-toggle='modal' data-target='#sendMessageModal' data-event_id='$event_id'>Message</button>
        <button type='button' id='book' class='btn content__btn btnDone evtBtn' data-toggle='modal' data-target='#sendBookingRequestModal' data-event_id='$event_id'>Book</button>
    ";
}
        echo "
    </div>
</div>";
if($eventType == 'l'){
    echo "
<div id='playersContainer' class='playerWide'>";
    if($host_id == $user_id){
        echo "
            <form class='radiusForm'>
                <label for='remove' id='radiusLabel' class='sr-only'>Remove Player:</label>
                <select name='remove' id='remove'>
                  <option value='' selected>Remove a Player</option>";
                if($player1 != NULL && $player1 != 0){
                    echo "<option value='$player1'>$p1username</option>";
                }
                if($player2 != NULL && $player2 != 0){
                    echo "<option value='$player2'>$p2username</option>";
                }
                if($player3 != NULL && $player3 != 0){
                    echo "<option value='$player3'>$p3username</option>";
                }
                if($player4 != NULL && $player4 != 0){
                    echo "<option value='$player4'>$p4username</option>";
                }
                if($player5 != NULL && $player5 != 0){
                    echo "<option value='$player5'>$p5username</option>";
                }
                if($player6 != NULL && $player6 != 0){
                    echo "<option value='$player6'>$p6username</option>";
                }
                if($player7 != NULL && $player7 != 0){
                    echo "<option value='$player7'>$p7username</option>";
                }
                if($player8 != NULL && $player8 != 0){
                    echo "<option value='$player8'>$p8username</option>";
                }
                echo "
                </select>
                <button class='btn btn-sm btnColor' id='radiusBtn' type='button'>Remove</button>
            </form>
        ";
    }
    echo "
    <h2>Players:</h2>
        <table class='table table-condensed'>
            <tr>";
        if($player1 != NULL && $player1 != 0){
            echo "<th class='col-xs-3 borderedRight'><a href='profilepage.php?username=$p1username'>$p1username</a></th>";
        }else{echo "<th class='col-xs-3'></th>";}
        if($player2 != NULL && $player2 != 0){
            echo "<th class='col-xs-3 borderedRight'><a href='profilepage.php?username=$p2username'>$p2username</a></th>";
        }else{echo "<th class='col-xs-3'></th>";}
        if($player3 != NULL && $player3 != 0){
            echo "<th class='col-xs-3 borderedRight'><a href='profilepage.php?username=$p3username'>$p3username</a></th>";
        }else{echo "<th class='col-xs-3'></th>";}
        if($player4 != NULL && $player4 != 0){
            echo "<th class='col-xs-3'><a href='profilepage.php?username=$p4username'>$p4username</a></th>";
        }else{echo "<th class='col-xs-3'></th>";}
    echo "</tr>
        <tr>";  
        if($player1 != NULL && $player1 != 0){
            echo "<td class='col-xs-3 borderedRight'><a href='profilepage.php?username=$p1username'>";
                                                if(empty($p1picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p1picture'/>";
                                                }
                                                echo "</a></td>";
        }else{echo "<td class='col-xs-3'></td>";}
        if($player2 != NULL && $player2 != 0){
            echo "<td class='col-xs-3 borderedRight'><a href='profilepage.php?username=$p2username'>";
                                                if(empty($p2picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p2picture'/>";
                                                }
                                                echo "</a></td>";
        }else{echo "<td class='col-xs-3'></td>";}
        if($player3 != NULL && $player3 != 0){
            echo "<td class='col-xs-3 borderedRight'><a href='profilepage.php?username=$p3username'>";
                                                if(empty($p3picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p3picture'/>";
                                                }
                                                echo "</a></td>";
        }else{echo "<td class='col-xs-3'></td>";}
        if($player4 != NULL && $player4 != 0){
            echo "<td class='col-xs-3'><a href='profilepage.php?username=$p4username'>";
                                                if(empty($p4picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p4picture'/>";
                                                }
                                                echo "</a></td>";
        }else{echo "<td class='col-xs-3'></td>";}
    echo "</tr>
        <tr>";
        if($player1 != NULL && $player1 != 0 && $player1 != $user_id){
            echo "<td class='col-xs-3 borderedRight'><table><tr>
                    <td class='centredCell'><p class='mrgRight'>Rep:</p></td>
                    ";
                if($p1totalPRep>0){
                    echo "
                        <td class='centredCell grn'><p class='mrgRight'>$p1totalPRep</p></td>
                    ";
                }else{
                     echo "
                        <td class='centredCell red'><p class='mrgRight'>$p1totalPRep</p></td>
                    ";
                }
                  echo "
                        <td class='centredCell'>";
                if($p1playerVoteStatus == '0'){
                      echo "
                      <button type='button' id='$player1' class='btn btn-lg btn-success btnTbl voteBtn playerUpvote'>&#8679;</button>
                        </td>
                        <td class='centredCell'>
                      <button type='button' id='$player1' class='btn btn-lg btn-danger btnTbl voteBtn playerDownvote'>&#8681;</button>
                      ";
                }elseif($p1playerVoteStatus == '1'){
                      echo "
                      <button type='button' id='$player1' class='btn btn-lg btn-success btnTbl btnDulledG playerUpvote'>&#8679;</button>
                        </td>
                        <td class='centredCell'>
                      <button type='button' id='$player1' class='btn btn-lg btn-danger btnTbl btnHighlightedR'>&#8681;</button>
                      ";
                }else{
                      echo "
                      <button type='button' id='$player1' class='btn btn-lg btn-success btnTbl btnHighlightedG'>&#8679;</button>
                        </td>
                        <td class='centredCell'>
                      <button type='button' id='$player1' class='btn btn-lg btn-danger btnTbl btnDulledR playerDownvote'>&#8681;</button>
                      ";
                }
                                        
            echo "
                        </td>
                        
                </tr></table></td>";
        }else{echo "<td class='col-xs-3'></td>";}
        if($player2 != NULL && $player2 != 0 && $player2 != $user_id){
            echo "<td class='col-xs-3 borderedRight'><table><tr>
                    <td class='centredCell'><p class='mrgRight'>Rep:</p></td>";
                if($p2totalPRep>0){
                    echo "
                        <td class='centredCell grn'><p class='mrgRight'>$p2totalPRep</p></td>
                    ";
                }else{
                     echo "
                        <td class='centredCell red'><p class='mrgRight'>$p2totalPRep</p></td>
                    ";
                }
                  echo "
                        <td class='centredCell'>";
                if($p2playerVoteStatus == '0'){
                      echo "
                      <button type='button' id='$player2' class='btn btn-lg btn-success btnTbl voteBtn playerUpvote'>&#8679;</button>
                        </td>
                        <td class='centredCell'>
                      <button type='button' id='$player2' class='btn btn-lg btn-danger btnTbl voteBtn playerDownvote'>&#8681;</button>
                      ";
                }elseif($p2playerVoteStatus == '1'){
                      echo "
                      <button type='button' id='$player2' class='btn btn-lg btn-success btnTbl btnDulledG playerUpvote'>&#8679;</button>
                        </td>
                        <td class='centredCell'>
                      <button type='button' id='$player2' class='btn btn-lg btn-danger btnTbl btnHighlightedR'>&#8681;</button>
                      ";
                }else{
                      echo "
                      <button type='button' id='$player2' class='btn btn-lg btn-success btnTbl btnHighlightedG'>&#8679;</button>
                        </td>
                        <td class='centredCell'>
                      <button type='button' id='$player2' class='btn btn-lg btn-danger btnTbl btnDulledR playerDownvote'>&#8681;</button>
                      ";
                }
                                        
            echo "
                        </td>
                        
                </tr></table></td>";
        }else{echo "<td class='col-xs-3'></td>";}
        if($player3 != NULL && $player3 != 0 && $player3 != $user_id){
            echo "<td class='col-xs-3 borderedRight'><table><tr>
                    <td class='centredCell'><p class='mrgRight'>Rep:</p></td>";
                if($p3totalPRep>0){
                    echo "
                        <td class='centredCell grn'><p class='mrgRight'>$p3totalPRep</p></td>
                    ";
                }else{
                     echo "
                        <td class='centredCell red'><p class='mrgRight'>$p3totalPRep</p></td>
                    ";
                }
                  echo "
                        <td class='centredCell'>";
                if($p3playerVoteStatus == '0'){
                      echo "
                      <button type='button' id='$player3' class='btn btn-lg btn-success btnTbl voteBtn playerUpvote'>&#8679;</button>
                       </td>
                        <td class='centredCell'>
                      <button type='button' id='$player3' class='btn btn-lg btn-danger btnTbl voteBtn playerDownvote'>&#8681;</button>
                      ";
                }elseif($p3playerVoteStatus == '1'){
                      echo "
                      <button type='button' id='$player3' class='btn btn-lg btn-success btnTbl btnDulledG playerUpvote'>&#8679;</button>
                        </td>
                        <td class='centredCell'>
                      <button type='button' id='$player3' class='btn btn-lg btn-danger btnTbl btnHighlightedR'>&#8681;</button>
                      ";
                }else{
                      echo "
                      <button type='button' id='$player3' class='btn btn-lg btn-success btnTbl  btnHighlightedG'>&#8679;</button>
                        </td>
                        <td class='centredCell'>
                      <button type='button' id='$player3' class='btn btn-lg btn-danger btnTbl btnDulledR playerDownvote'>&#8681;</button>
                      ";
                }
                                        
            echo "
                        </td>
                        <td></td>
                </tr></table></td>";
        }else{echo "<td class='col-xs-3'></td>";}
        if($player4 != NULL && $player4 != 0 && $player4 != $user_id){
            echo "<td class='col-xs-3'><table><tr>
                    <td class='centredCell'><p class='mrgRight'>Rep:</p></td>";
                if($p4totalPRep>0){
                    echo "
                        <td class='centredCell grn'><p class='mrgRight'>$p4totalPRep</p></td>
                    ";
                }else{
                     echo "
                        <td class='centredCell red'><p class='mrgRight'>$p4totalPRep</p></td>
                    ";
                }
                  echo "
                        <td class='centredCell'>";
                if($p4playerVoteStatus == '0'){
                      echo "
                      <button type='button' id='$player4' class='btn btn-lg btn-success btnTbl voteBtn playerUpvote'>&#8679;</button>
                        </td>
                        <td class='centredCell'>
                      <button type='button' id='$player4' class='btn btn-lg btn-danger btnTbl voteBtn playerDownvote'>&#8681;</button>
                      ";
                }elseif($p4playerVoteStatus == '1'){
                      echo "
                      <button type='button' id='$player4' class='btn btn-lg btn-success btnTbl btnDulledG playerUpvote'>&#8679;</button>
                        </td>
                        <td class='centredCell'>
                      <button type='button' id='$player4' class='btn btn-lg btn-danger btnTbl btnHighlightedR'>&#8681;</button>
                      ";
                }else{
                      echo "
                      <button type='button' id='$player4' class='btn btn-lg btn-success btnTbl btnHighlightedG'>&#8679;</button>
                        </td>
                        <td class='centredCell'>
                      <button type='button' id='$player4' class='btn btn-lg btn-danger btnTbl btnDulledR playerDownvote'>&#8681;</button>
                      ";
                }
                                        
            echo "
                        </td>
                        <td></td>
                </tr></table></td>";
        }else{echo "<td class='col-xs-3'></td>";}
    echo "</tr>
    </table>";
if(($player5 != NULL && $player5 != 0) || ($player6 != NULL && $player6 != 0) || ($player7 != NULL && $player7 != 0) || ($player8 != NULL && $player8 != 0)){
    echo "
    <table class='table table-condensed'>
        <tr>";
    if($player5 != NULL && $player5 != 0){
        echo "<th class='col-xs-3 borderedRight'><a href='profilepage.php?username=$p5username'>$p5username</a></th>";
    }else{echo "<th class='col-xs-3'></th>";}
    if($player6 != NULL && $player6 != 0){
        echo "<th class='col-xs-3 borderedRight'><a href='profilepage.php?username=$p6username'>$p6username</a></th>";
    }else{echo "<th class='col-xs-3'></th>";}
    if($player7 != NULL && $player7 != 0){
        echo "<th class='col-xs-3 borderedRight'><a href='profilepage.php?username=$p7username'>$p7username</a></th>";
    }else{echo "<th class='col-xs-3'></th>";}
    if($player8 != NULL && $player8 != 0){
        echo "<th class='col-xs-3'><a href='profilepage.php?username=$p8username'>$p8username</a></th>";
    }else{echo "<th class='col-xs-3'></th>";}
echo "</tr>
    <tr>";  
    if($player5 != NULL && $player5 != 0){
        echo "<td class='col-xs-3 borderedRight'><a href='profilepage.php?username=$p5username'>";
                                                if(empty($p5picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p5picture'/>";
                                                }
                                                echo "</a></td>";
    }else{echo "<td class='col-xs-3'></td>";}
    if($player6 != NULL && $player6 != 0){
        echo "<td class='col-xs-3 borderedRight'><a href='profilepage.php?username=$p6username'>";
                                                if(empty($p6picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p6picture'/>";
                                                }
                                                echo "</a></td>";
    }else{echo "<td class='col-xs-3'></td>";}
    if($player7 != NULL && $player7 != 0){
        echo "<td class='col-xs-3 borderedRight'><a href='profilepage.php?username=$p7username'>";
                                                if(empty($p7picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p7picture'/>";
                                                }
                                                echo "</a></td>";
    }else{echo "<td class='col-xs-3'></td>";}
    if($player8 != NULL && $player8 != 0){
        echo "<td class='col-xs-3'><a href='profilepage.php?username=$p8username'>";
                                                if(empty($p8picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p8picture'/>";
                                                }
                                                echo "</a></td>";
    }else{echo "<td class='col-xs-3'></td>";}
echo "</tr>
    <tr>";
    if($player5 != NULL && $player5 != 0 && $player5 != $user_id){
        echo "<td class='col-xs-3 borderedRight'><table><tr>
                    <td class='centredCell'>Reputation:</td>";
                if($p5totalPRep>0){
                    echo "
                        <td class='centredCell grn'>$p5totalPRep</td>
                    ";
                }else{
                     echo "
                        <td class='centredCell red'>$p5totalPRep</td>
                    ";
                }
                  echo "<td class='centredCell grn'>&#8593;:$p5upvotePCount</td>
                        <td class='centredCell red'>&#8595;:$p5downvotePCount</td>
                    </tr>
                  <tr>
                        <td></td>
                        <td class='centredCell'>";
                if($p5playerVoteStatus == '0'){
                      echo "
                      <button type='button' id='$player5' class='btn btn-lg btn-success btnTbl voteBtn playerUpvote'>&#8679;</button>
                      <button type='button' id='$player5' class='btn btn-lg btn-danger btnTbl voteBtn playerDownvote'>&#8681;</button>
                      ";
                }elseif($p5playerVoteStatus == '1'){
                      echo "
                      <button type='button' id='$player5' class='btn btn-lg btn-success btnTbl btnDulledG playerUpvote'>&#8679;</button>
                      <button type='button' id='$player5' class='btn btn-lg btn-danger btnTbl btnHighlightedR'>&#8681;</button>
                      ";
                }else{
                      echo "
                      <button type='button' id='$player5' class='btn btn-lg btn-success btnTbl btnHighlightedG'>&#8679;</button>
                      <button type='button' id='$player5' class='btn btn-lg btn-danger btnTbl btnDulledR playerDownvote'>&#8681;</button>
                      ";
                }
                                        
            echo "
                        </td>
                        <td></td>
                </tr></table></td>";
    }else{echo "<td class='col-xs-3'></td>";}
    if($player6 != NULL && $player6 != 0 && $player6 != $user_id){
        echo "<td class='col-xs-3 borderedRight'><table><tr>
                    <td class='centredCell'>Reputation:</td>";
                if($p6totalPRep>0){
                    echo "
                        <td class='centredCell grn'>$p6totalPRep</td>
                    ";
                }else{
                     echo "
                        <td class='centredCell red'>$p6totalPRep</td>
                    ";
                }
                  echo "<td class='centredCell grn'>&#8593;:$p6upvotePCount</td>
                        <td class='centredCell red'>&#8595;:$p6downvotePCount</td>
                    </tr>
                  <tr>
                        <td></td>
                        <td class='centredCell'>";
                if($p6playerVoteStatus == '0'){
                      echo "
                      <button type='button' id='$player6' class='btn btn-lg btn-success btnTbl voteBtn playerUpvote'>&#8679;</button>
                      <button type='button' id='$player6' class='btn btn-lg btn-danger btnTbl voteBtn playerDownvote'>&#8681;</button>
                      ";
                }elseif($p6playerVoteStatus == '1'){
                      echo "
                      <button type='button' id='$player6' class='btn btn-lg btn-success btnTbl btnDulledG playerUpvote'>&#8679;</button>
                      <button type='button' id='$player6' class='btn btn-lg btn-danger btnTbl btnHighlightedR'>&#8681;</button>
                      ";
                }else{
                      echo "
                      <button type='button' id='$player6' class='btn btn-lg btn-success btnTbl btnHighlightedG'>&#8679;</button>
                      <button type='button' id='$player6' class='btn btn-lg btn-danger btnTbl btnDulledR playerDownvote'>&#8681;</button>
                      ";
                }
                                        
            echo "
                        </td>
                        <td></td>
                </tr></table></td>";
    }else{echo "<td class='col-xs-3'></td>";}
    if($player7 != NULL && $player7 != 0 && $player7 != $user_id){
        echo "<td class='col-xs-3 borderedRight'><table><tr>
                    <td class='centredCell'>Reputation:</td>";
                if($p7totalPRep>0){
                    echo "
                        <td class='centredCell grn'>$p7totalPRep</td>
                    ";
                }else{
                     echo "
                        <td class='centredCell red'>$p7totalPRep</td>
                    ";
                }
                  echo "<td class='centredCell grn'>&#8593;:$p7upvotePCount</td>
                        <td class='centredCell red'>&#8595;:$p7downvotePCount</td>
                    </tr>
                  <tr>
                        <td></td>
                        <td class='centredCell'>";
                if($p7playerVoteStatus == '0'){
                      echo "
                      <button type='button' id='$player7' class='btn btn-lg btn-success btnTbl voteBtn playerUpvote'>&#8679;</button>
                      <button type='button' id='$player7' class='btn btn-lg btn-danger btnTbl voteBtn playerDownvote'>&#8681;</button>
                      ";
                }elseif($p7playerVoteStatus == '1'){
                      echo "
                      <button type='button' id='$player7' class='btn btn-lg btn-success btnTbl btnDulledG playerUpvote'>&#8679;</button>
                      <button type='button' id='$player7' class='btn btn-lg btn-danger btnTbl btnHighlightedR'>&#8681;</button>
                      ";
                }else{
                      echo "
                      <button type='button' id='$player7' class='btn btn-lg btn-success btnTbl btnHighlightedG'>&#8679;</button>
                      <button type='button' id='$player7' class='btn btn-lg btn-danger btnTbl btnDulledR playerDownvote'>&#8681;</button>
                      ";
                }
                                        
            echo "
                        </td>
                        <td></td>
                </tr></table></td>";
    }else{echo "<td class='col-xs-3'></td>";}
    if($player8 != NULL && $player8 != 0 && $player8 != $user_id){
        echo "<td class='col-xs-3'><table><tr>
                    <td class='centredCell'>Reputation:</td>";
                if($p8totalPRep>0){
                    echo "
                        <td class='centredCell grn'>$p8totalPRep</td>
                    ";
                }else{
                     echo "
                        <td class='centredCell red'>$p8totalPRep</td>
                    ";
                }
                  echo "<td class='centredCell grn'>&#8593;:$p8upvotePCount</td>
                        <td class='centredCell red'>&#8595;:$p8downvotePCount</td>
                    </tr>
                  <tr>
                        <td></td>
                        <td class='centredCell'>";
                if($p8playerVoteStatus == '0'){
                      echo "
                      <button type='button' id='$player8' class='btn btn-lg btn-success btnTbl voteBtn playerUpvote'>&#8679;</button>
                      <button type='button' id='$player8' class='btn btn-lg btn-danger btnTbl voteBtn playerDownvote'>&#8681;</button>
                      ";
                }elseif($p8playerVoteStatus == '1'){
                      echo "
                      <button type='button' id='$player8' class='btn btn-lg btn-success btnTbl btnDulledG playerUpvote'>&#8679;</button>
                      <button type='button' id='$player8' class='btn btn-lg btn-danger btnTbl btnHighlightedR'>&#8681;</button>
                      ";
                }else{
                      echo "
                      <button type='button' id='$player8' class='btn btn-lg btn-success btnTbl btnHighlightedG'>&#8679;</button>
                      <button type='button' id='$player8' class='btn btn-lg btn-danger btnTbl btnDulledR playerDownvote'>&#8681;</button>
                      ";
                }
                                        
            echo "
                        </td>
                        <td></td>
                </tr></table></td>";
    }else{echo "<td class='col-xs-3'></td>";}

echo "</tr>
    </table>";
}
    echo "
</div>
<div id='playersContainer' class='playerPhone'>";
    if($host_id == $user_id){
        echo "
            <form class='radiusForm bgphone'>
                <label for='remove' id='radiusLabel' class='sr-only'>Remove Player:</label>
                <select name='remove' id='remove'>
                  <option value='' selected>Remove a Player</option>";
                if($player1 != NULL && $player1 != 0){
                    echo "<option value='$player1'>$p1username</option>";
                }
                if($player2 != NULL && $player2 != 0){
                    echo "<option value='$player2'>$p2username</option>";
                }
                if($player3 != NULL && $player3 != 0){
                    echo "<option value='$player3'>$p3username</option>";
                }
                if($player4 != NULL && $player4 != 0){
                    echo "<option value='$player4'>$p4username</option>";
                }
                if($player5 != NULL && $player5 != 0){
                    echo "<option value='$player5'>$p5username</option>";
                }
                if($player6 != NULL && $player6 != 0){
                    echo "<option value='$player6'>$p6username</option>";
                }
                if($player7 != NULL && $player7 != 0){
                    echo "<option value='$player7'>$p7username</option>";
                }
                if($player8 != NULL && $player8 != 0){
                    echo "<option value='$player8'>$p8username</option>";
                }
                echo "
                </select>
                <button class='btn btn-sm btnColor' id='radiusBtn' type='button'>Remove</button>
            </form>
        ";
    }
    echo "
    <h2>Players:</h2>";
    if($host_id == $user_id){
        echo "
            <form class='radiusForm smphone'>
                <label for='remove' id='radiusLabel' class='sr-only'>Remove Player:</label>
                <select name='remove' id='remove'>
                  <option value='' selected>Remove a Player</option>";
                if($player1 != NULL && $player1 != 0){
                    echo "<option value='$player1'>$p1username</option>";
                }
                if($player2 != NULL && $player2 != 0){
                    echo "<option value='$player2'>$p2username</option>";
                }
                if($player3 != NULL && $player3 != 0){
                    echo "<option value='$player3'>$p3username</option>";
                }
                if($player4 != NULL && $player4 != 0){
                    echo "<option value='$player4'>$p4username</option>";
                }
                if($player5 != NULL && $player5 != 0){
                    echo "<option value='$player5'>$p5username</option>";
                }
                if($player6 != NULL && $player6 != 0){
                    echo "<option value='$player6'>$p6username</option>";
                }
                if($player7 != NULL && $player7 != 0){
                    echo "<option value='$player7'>$p7username</option>";
                }
                if($player8 != NULL && $player8 != 0){
                    echo "<option value='$player8'>$p8username</option>";
                }
                echo "
                </select>
                <button class='btn btn-sm btnColor' id='radiusBtn' type='button'>Remove</button>
            </form>
        ";
    }
    echo "
        <table class='table table-condensed'>
            <tr>";
        if($player1 != NULL && $player1 != 0){
            echo "<th class='col-xs-3 borderedRight'><a href='profilepage.php?username=$p1username'>$p1username</a></th>";
        }else{echo "<th class='col-xs-3'></th>";}
        if($player2 != NULL && $player2 != 0){
            echo "<th class='col-xs-3'><a href='profilepage.php?username=$p2username'>$p2username</a></th>";
        }else{echo "<th class='col-xs-3'></th>";}
    echo "</tr>
        <tr>";  
        if($player1 != NULL && $player1 != 0){
            echo "<td class='col-xs-3 borderedRight'><a href='profilepage.php?username=$p1username'>";
                                                if(empty($p1picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p1picture'/>";
                                                }
                                                echo "</a></td>";
        }else{echo "<td class='col-xs-3'></td>";}
        if($player2 != NULL && $player2 != 0){
            echo "<td class='col-xs-3'><a href='profilepage.php?username=$p2username'>";
                                                if(empty($p2picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p2picture'/>";
                                                }
                                                echo "</a></td>";
        }else{echo "<td class='col-xs-3'></td>";}
    echo "</tr>
        <tr>";
        if($player1 != NULL && $player1 != 0 && $player1 != $user_id){
            echo "<td class='col-xs-3 borderedRight'><table><tr>
                    <td class='centredCell'><p class='mrgRight'>Rep:</p></td>
                    ";
                if($p1totalPRep>0){
                    echo "
                        <td class='centredCell grn'><p class='mrgRight'>$p1totalPRep</p></td>
                    ";
                }else{
                     echo "
                        <td class='centredCell red'><p class='mrgRight'>$p1totalPRep</p></td>
                    ";
                }
                  echo "
                        <td class='centredCell'>";
                if($p1playerVoteStatus == '0'){
                      echo "
                      <button type='button' id='$player1' class='btn btn-lg btn-success btnTbl voteBtn playerUpvote'>&#8679;</button>
                        </td>
                        <td class='centredCell'>
                      <button type='button' id='$player1' class='btn btn-lg btn-danger btnTbl voteBtn playerDownvote'>&#8681;</button>
                      ";
                }elseif($p1playerVoteStatus == '1'){
                      echo "
                      <button type='button' id='$player1' class='btn btn-lg btn-success btnTbl btnDulledG playerUpvote'>&#8679;</button>
                        </td>
                        <td class='centredCell'>
                      <button type='button' id='$player1' class='btn btn-lg btn-danger btnTbl btnHighlightedR'>&#8681;</button>
                      ";
                }else{
                      echo "
                      <button type='button' id='$player1' class='btn btn-lg btn-success btnTbl btnHighlightedG'>&#8679;</button>
                        </td>
                        <td class='centredCell'>
                      <button type='button' id='$player1' class='btn btn-lg btn-danger btnTbl btnDulledR playerDownvote'>&#8681;</button>
                      ";
                }
                                        
            echo "
                        </td>
                        
                </tr></table></td>";
        }else{echo "<td class='col-xs-3'></td>";}
        if($player2 != NULL && $player2 != 0 && $player2 != $user_id){
            echo "<td class='col-xs-3'><table><tr>
                    <td class='centredCell'><p class='mrgRight'>Rep:</p></td>";
                if($p2totalPRep>0){
                    echo "
                        <td class='centredCell grn'><p class='mrgRight'>$p2totalPRep</p></td>
                    ";
                }else{
                     echo "
                        <td class='centredCell red'><p class='mrgRight'>$p2totalPRep</p></td>
                    ";
                }
                  echo "
                        <td class='centredCell'>";
                if($p2playerVoteStatus == '0'){
                      echo "
                      <button type='button' id='$player2' class='btn btn-lg btn-success btnTbl voteBtn playerUpvote'>&#8679;</button>
                        </td>
                        <td class='centredCell'>
                      <button type='button' id='$player2' class='btn btn-lg btn-danger btnTbl voteBtn playerDownvote'>&#8681;</button>
                      ";
                }elseif($p2playerVoteStatus == '1'){
                      echo "
                      <button type='button' id='$player2' class='btn btn-lg btn-success btnTbl btnDulledG playerUpvote'>&#8679;</button>
                        </td>
                        <td class='centredCell'>
                      <button type='button' id='$player2' class='btn btn-lg btn-danger btnTbl btnHighlightedR'>&#8681;</button>
                      ";
                }else{
                      echo "
                      <button type='button' id='$player2' class='btn btn-lg btn-success btnTbl btnHighlightedG'>&#8679;</button>
                        </td>
                        <td class='centredCell'>
                      <button type='button' id='$player2' class='btn btn-lg btn-danger btnTbl btnDulledR playerDownvote'>&#8681;</button>
                      ";
                }
                                        
            echo "
                        </td>
                        
                </tr></table></td>";
        }else{echo "<td class='col-xs-3'></td>";}
    echo "</tr>
    </table>";

if(($player3 != NULL && $player3 != 0) || ($player4 != NULL && $player4 != 0) || ($player5 != NULL && $player5 != 0) || ($player6 != NULL && $player6 != 0) || ($player7 != NULL && $player7 != 0) || ($player8 != NULL && $player8 != 0)){
    echo "
    <table class='table table-condensed'>
        <tr>";
    if($player3 != NULL && $player3 != 0){
            echo "<th class='col-xs-3 borderedRight'><a href='profilepage.php?username=$p3username'>$p3username</a></th>";
        }else{echo "<th class='col-xs-3'></th>";}
        if($player4 != NULL && $player4 != 0){
            echo "<th class='col-xs-3'><a href='profilepage.php?username=$p4username'>$p4username</a></th>";
        }else{echo "<th class='col-xs-3'></th>";}
    echo "</tr>
        <tr>";  
    if($player3 != NULL && $player3 != 0){
            echo "<td class='col-xs-3 borderedRight'><a href='profilepage.php?username=$p3username'>";
                                                if(empty($p3picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p3picture'/>";
                                                }
                                                echo "</a></td>";
        }else{echo "<td class='col-xs-3'></td>";}
        if($player4 != NULL && $player4 != 0){
            echo "<td class='col-xs-3'><a href='profilepage.php?username=$p4username'>";
                                                if(empty($p4picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p4picture'/>";
                                                }
                                                echo "</a></td>";
        }else{echo "<td class='col-xs-3'></td>";}
    echo "</tr>
        <tr>";
    if($player3 != NULL && $player3 != 0 && $player3 != $user_id){
            echo "<td class='col-xs-3 borderedRight'><table><tr>
                    <td class='centredCell'><p class='mrgRight'>Rep:</p></td>";
                if($p3totalPRep>0){
                    echo "
                        <td class='centredCell grn'><p class='mrgRight'>$p3totalPRep</p></td>
                    ";
                }else{
                     echo "
                        <td class='centredCell red'><p class='mrgRight'>$p3totalPRep</p></td>
                    ";
                }
                  echo "
                        <td class='centredCell'>";
                if($p3playerVoteStatus == '0'){
                      echo "
                      <button type='button' id='$player3' class='btn btn-lg btn-success btnTbl voteBtn playerUpvote'>&#8679;</button>
                       </td>
                        <td class='centredCell'>
                      <button type='button' id='$player3' class='btn btn-lg btn-danger btnTbl voteBtn playerDownvote'>&#8681;</button>
                      ";
                }elseif($p3playerVoteStatus == '1'){
                      echo "
                      <button type='button' id='$player3' class='btn btn-lg btn-success btnTbl btnDulledG playerUpvote'>&#8679;</button>
                        </td>
                        <td class='centredCell'>
                      <button type='button' id='$player3' class='btn btn-lg btn-danger btnTbl btnHighlightedR'>&#8681;</button>
                      ";
                }else{
                      echo "
                      <button type='button' id='$player3' class='btn btn-lg btn-success btnTbl  btnHighlightedG'>&#8679;</button>
                        </td>
                        <td class='centredCell'>
                      <button type='button' id='$player3' class='btn btn-lg btn-danger btnTbl btnDulledR playerDownvote'>&#8681;</button>
                      ";
                }
                                        
            echo "
                        </td>
                        <td></td>
                </tr></table></td>";
        }else{echo "<td class='col-xs-3'></td>";}
        if($player4 != NULL && $player4 != 0 && $player4 != $user_id){
            echo "<td class='col-xs-3'><table><tr>
                    <td class='centredCell'><p class='mrgRight'>Rep:</p></td>";
                if($p4totalPRep>0){
                    echo "
                        <td class='centredCell grn'><p class='mrgRight'>$p4totalPRep</p></td>
                    ";
                }else{
                     echo "
                        <td class='centredCell red'><p class='mrgRight'>$p4totalPRep</p></td>
                    ";
                }
                  echo "
                        <td class='centredCell'>";
                if($p4playerVoteStatus == '0'){
                      echo "
                      <button type='button' id='$player4' class='btn btn-lg btn-success btnTbl voteBtn playerUpvote'>&#8679;</button>
                        </td>
                        <td class='centredCell'>
                      <button type='button' id='$player4' class='btn btn-lg btn-danger btnTbl voteBtn playerDownvote'>&#8681;</button>
                      ";
                }elseif($p4playerVoteStatus == '1'){
                      echo "
                      <button type='button' id='$player4' class='btn btn-lg btn-success btnTbl btnDulledG playerUpvote'>&#8679;</button>
                        </td>
                        <td class='centredCell'>
                      <button type='button' id='$player4' class='btn btn-lg btn-danger btnTbl btnHighlightedR'>&#8681;</button>
                      ";
                }else{
                      echo "
                      <button type='button' id='$player4' class='btn btn-lg btn-success btnTbl btnHighlightedG'>&#8679;</button>
                        </td>
                        <td class='centredCell'>
                      <button type='button' id='$player4' class='btn btn-lg btn-danger btnTbl btnDulledR playerDownvote'>&#8681;</button>
                      ";
                }
                                        
            echo "
                        </td>
                        <td></td>
                </tr></table></td>";
        }else{echo "<td class='col-xs-3'></td>";}
    echo "</tr>
    </table>";
}
if(($player5 != NULL && $player5 != 0) || ($player6 != NULL && $player6 != 0) || ($player7 != NULL && $player7 != 0) || ($player8 != NULL && $player8 != 0)){
    echo "
    <table class='table table-condensed'>
        <tr>";
    if($player5 != NULL && $player5 != 0){
        echo "<th class='col-xs-3 borderedRight'><a href='profilepage.php?username=$p5username'>$p5username</a></th>";
    }else{echo "<th class='col-xs-3'></th>";}
    if($player6 != NULL && $player6 != 0){
        echo "<th class='col-xs-3'><a href='profilepage.php?username=$p6username'>$p6username</a></th>";
    }else{echo "<th class='col-xs-3'></th>";}
echo "</tr>
    <tr>";  
    if($player5 != NULL && $player5 != 0){
        echo "<td class='col-xs-3 borderedRight'><a href='profilepage.php?username=$p5username'>";
                                                if(empty($p5picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p5picture'/>";
                                                }
                                                echo "</a></td>";
    }else{echo "<td class='col-xs-3'></td>";}
    if($player6 != NULL && $player6 != 0){
        echo "<td class='col-xs-3'><a href='profilepage.php?username=$p6username'>";
                                                if(empty($p6picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p6picture'/>";
                                                }
                                                echo "</a></td>";
    }else{echo "<td class='col-xs-3'></td>";}
echo "</tr>
    <tr>";
    if($player5 != NULL && $player5 != 0 && $player5 != $user_id){
        echo "<td class='col-xs-3 borderedRight'><table><tr>
                    <td class='centredCell'>Reputation:</td>";
                if($p5totalPRep>0){
                    echo "
                        <td class='centredCell grn'>$p5totalPRep</td>
                    ";
                }else{
                     echo "
                        <td class='centredCell red'>$p5totalPRep</td>
                    ";
                }
                  echo "<td class='centredCell grn'>&#8593;:$p5upvotePCount</td>
                        <td class='centredCell red'>&#8595;:$p5downvotePCount</td>
                    </tr>
                  <tr>
                        <td></td>
                        <td class='centredCell'>";
                if($p5playerVoteStatus == '0'){
                      echo "
                      <button type='button' id='$player5' class='btn btn-lg btn-success btnTbl voteBtn playerUpvote'>&#8679;</button>
                      <button type='button' id='$player5' class='btn btn-lg btn-danger btnTbl voteBtn playerDownvote'>&#8681;</button>
                      ";
                }elseif($p5playerVoteStatus == '1'){
                      echo "
                      <button type='button' id='$player5' class='btn btn-lg btn-success btnTbl btnDulledG playerUpvote'>&#8679;</button>
                      <button type='button' id='$player5' class='btn btn-lg btn-danger btnTbl btnHighlightedR'>&#8681;</button>
                      ";
                }else{
                      echo "
                      <button type='button' id='$player5' class='btn btn-lg btn-success btnTbl btnHighlightedG'>&#8679;</button>
                      <button type='button' id='$player5' class='btn btn-lg btn-danger btnTbl btnDulledR playerDownvote'>&#8681;</button>
                      ";
                }
                                        
            echo "
                        </td>
                        <td></td>
                </tr></table></td>";
    }else{echo "<td class='col-xs-3'></td>";}
    if($player6 != NULL && $player6 != 0 && $player6 != $user_id){
        echo "<td class='col-xs-3'><table><tr>
                    <td class='centredCell'>Reputation:</td>";
                if($p6totalPRep>0){
                    echo "
                        <td class='centredCell grn'>$p6totalPRep</td>
                    ";
                }else{
                     echo "
                        <td class='centredCell red'>$p6totalPRep</td>
                    ";
                }
                  echo "<td class='centredCell grn'>&#8593;:$p6upvotePCount</td>
                        <td class='centredCell red'>&#8595;:$p6downvotePCount</td>
                    </tr>
                  <tr>
                        <td></td>
                        <td class='centredCell'>";
                if($p6playerVoteStatus == '0'){
                      echo "
                      <button type='button' id='$player6' class='btn btn-lg btn-success btnTbl voteBtn playerUpvote'>&#8679;</button>
                      <button type='button' id='$player6' class='btn btn-lg btn-danger btnTbl voteBtn playerDownvote'>&#8681;</button>
                      ";
                }elseif($p6playerVoteStatus == '1'){
                      echo "
                      <button type='button' id='$player6' class='btn btn-lg btn-success btnTbl btnDulledG playerUpvote'>&#8679;</button>
                      <button type='button' id='$player6' class='btn btn-lg btn-danger btnTbl btnHighlightedR'>&#8681;</button>
                      ";
                }else{
                      echo "
                      <button type='button' id='$player6' class='btn btn-lg btn-success btnTbl btnHighlightedG'>&#8679;</button>
                      <button type='button' id='$player6' class='btn btn-lg btn-danger btnTbl btnDulledR playerDownvote'>&#8681;</button>
                      ";
                }
                                        
            echo "
                        </td>
                        <td></td>
                </tr></table></td>";
    }else{echo "<td class='col-xs-3'></td>";}
    
    echo "</tr>
    </table>";
}
if(($player7 != NULL && $player7 != 0) || ($player8 != NULL && $player8 != 0)){
    echo "
    <table class='table table-condensed'>
        <tr>";
    if($player7 != NULL && $player7 != 0){
        echo "<th class='col-xs-3 borderedRight'><a href='profilepage.php?username=$p7username'>$p7username</a></th>";
    }else{echo "<th class='col-xs-3'></th>";}
    if($player8 != NULL && $player8 != 0){
        echo "<th class='col-xs-3'><a href='profilepage.php?username=$p8username'>$p8username</a></th>";
    }else{echo "<th class='col-xs-3'></th>";}
echo "</tr>
    <tr>";  
    if($player7 != NULL && $player7 != 0){
        echo "<td class='col-xs-3 borderedRight'><a href='profilepage.php?username=$p7username'>";
                                                if(empty($p7picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p7picture'/>";
                                                }
                                                echo "</a></td>";
    }else{echo "<td class='col-xs-3'></td>";}
    if($player8 != NULL && $player8 != 0){
        echo "<td class='col-xs-3'><a href='profilepage.php?username=$p8username'>";
                                                if(empty($p8picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p8picture'/>";
                                                }
                                                echo "</a></td>";
    }else{echo "<td class='col-xs-3'></td>";}
echo "</tr>
    <tr>";
    if($player7 != NULL && $player7 != 0 && $player7 != $user_id){
        echo "<td class='col-xs-3 borderedRight'><table><tr>
                    <td class='centredCell'>Reputation:</td>";
                if($p7totalPRep>0){
                    echo "
                        <td class='centredCell grn'>$p7totalPRep</td>
                    ";
                }else{
                     echo "
                        <td class='centredCell red'>$p7totalPRep</td>
                    ";
                }
                  echo "<td class='centredCell grn'>&#8593;:$p7upvotePCount</td>
                        <td class='centredCell red'>&#8595;:$p7downvotePCount</td>
                    </tr>
                  <tr>
                        <td></td>
                        <td class='centredCell'>";
                if($p7playerVoteStatus == '0'){
                      echo "
                      <button type='button' id='$player7' class='btn btn-lg btn-success btnTbl voteBtn playerUpvote'>&#8679;</button>
                      <button type='button' id='$player7' class='btn btn-lg btn-danger btnTbl voteBtn playerDownvote'>&#8681;</button>
                      ";
                }elseif($p7playerVoteStatus == '1'){
                      echo "
                      <button type='button' id='$player7' class='btn btn-lg btn-success btnTbl btnDulledG playerUpvote'>&#8679;</button>
                      <button type='button' id='$player7' class='btn btn-lg btn-danger btnTbl btnHighlightedR'>&#8681;</button>
                      ";
                }else{
                      echo "
                      <button type='button' id='$player7' class='btn btn-lg btn-success btnTbl btnHighlightedG'>&#8679;</button>
                      <button type='button' id='$player7' class='btn btn-lg btn-danger btnTbl btnDulledR playerDownvote'>&#8681;</button>
                      ";
                }
                                        
            echo "
                        </td>
                        <td></td>
                </tr></table></td>";
    }else{echo "<td class='col-xs-3'></td>";}
    if($player8 != NULL && $player8 != 0 && $player8 != $user_id){
        echo "<td class='col-xs-3'><table><tr>
                    <td class='centredCell'>Reputation:</td>";
                if($p8totalPRep>0){
                    echo "
                        <td class='centredCell grn'>$p8totalPRep</td>
                    ";
                }else{
                     echo "
                        <td class='centredCell red'>$p8totalPRep</td>
                    ";
                }
                  echo "<td class='centredCell grn'>&#8593;:$p8upvotePCount</td>
                        <td class='centredCell red'>&#8595;:$p8downvotePCount</td>
                    </tr>
                  <tr>
                        <td></td>
                        <td class='centredCell'>";
                if($p8playerVoteStatus == '0'){
                      echo "
                      <button type='button' id='$player8' class='btn btn-lg btn-success btnTbl voteBtn playerUpvote'>&#8679;</button>
                      <button type='button' id='$player8' class='btn btn-lg btn-danger btnTbl voteBtn playerDownvote'>&#8681;</button>
                      ";
                }elseif($p8playerVoteStatus == '1'){
                      echo "
                      <button type='button' id='$player8' class='btn btn-lg btn-success btnTbl btnDulledG playerUpvote'>&#8679;</button>
                      <button type='button' id='$player8' class='btn btn-lg btn-danger btnTbl btnHighlightedR'>&#8681;</button>
                      ";
                }else{
                      echo "
                      <button type='button' id='$player8' class='btn btn-lg btn-success btnTbl btnHighlightedG'>&#8679;</button>
                      <button type='button' id='$player8' class='btn btn-lg btn-danger btnTbl btnDulledR playerDownvote'>&#8681;</button>
                      ";
                }
                                        
            echo "
                        </td>
                        <td></td>
                </tr></table></td>";
    }else{echo "<td class='col-xs-3'></td>";}
    echo "</tr>
    </table>";
}
    echo "</div>";
}
echo "
<div id='hostContainer' class='hostWide'>
    <h2>Host: $hostusername</h2>
        <div class='row'>
            <div class='col-xs-3'><a href='profilepage.php?username=$hostusername'>";
            if(empty($hostpicture)){
                echo "<img src='css/profilepics/angel.png' class='profilePageProfilePic'>";
            }else{
                echo "<img src='$hostpicture' class='profilePageProfilePic'>";
            }
        echo "</a>
            </div>
            <div class='col-xs-9'>
                <table class='table table-condensed statsTable'>
                    <tr>
                        <td class='centredCell'>Host Rep</td>";
                if($totalHRep>0){
                    echo "
                        <td class='centredCell grn'>Total:$totalHRep</td>
                    ";
                }else{
                     echo "
                        <td class='centredCell red'>Total:$totalHRep</td>
                    ";
                }
                if($host_id == $user_id){
                    
                }else{
                    
                }
                  echo "<td class='centredCell grn'>&#8593;:$upvoteHCount</td>
                        <td class='centredCell red'>&#8595;:$downvoteHCount</td>
                        <td class='centredCell'>";
                if($hostVoteStatus == '0' && $host_id != $user_id){
                      echo "
                      <button type='button' id='$host_id' class='btn btn-lg btn-success voteBtn hostUpvote'>&#8679;</button>
                      <button type='button' id='$host_id' class='btn btn-lg btn-danger voteBtn hostDownvote'>&#8681;</button>
                      ";
                }elseif($hostVoteStatus == '1' && $host_id != $user_id){
                      echo "
                      <button type='button' id='$host_id' class='btn btn-lg btn-success btnDulledG hostUpvote'>&#8679;</button>
                      <button type='button' id='$host_id' class='btn btn-lg btn-danger btnHighlightedR'>&#8681;</button>
                      ";
                }elseif($hostVoteStatus == '2' && $host_id != $user_id){
                      echo "
                      <button type='button' id='$host_id' class='btn btn-lg btn-success btnHighlightedG'>&#8679;</button>
                      <button type='button' id='$host_id' class='btn btn-lg btn-danger btnDulledR hostDownvote'>&#8681;</button>
                      ";
                }else{
                    echo " ";
                }
                                        
            echo "
                        </td>
                        <td class='centredCell'>$hFollowerCount</td>
                        <td class='centredCell'>Followers</td>";
            if($followingUser == '0' && $host_id != $user_id){
                echo"
                        <td class='centredCell'>
                            <button type='button' id='$host_id' class='btn btn-lg btnColor followBtn pull-right follow'>Follow?</button>
                        </td>";
            }elseif($followingUser == '1' && $host_id != $user_id){
                echo"
                        <td class='centredCell'>
                            <button type='button' id='$host_id' class='btn btn-sm btn-danger friendBtn pull-right unfollow'>UnFollow?</button>
                        </td>";
            }else{
                echo "<td></td>";
            }
                                        
                echo "
                    </tr>
               </table>
                <table class='table table-condensed statsTable'>
                    <tr>
                        <td>
                            <div class='expandable' data-js-expandable>
                                <div class='innerContent' data-js-expandable-inner>$hostinfo</div>
                            </div>
                            <div class='expandable__btn__wrapper'  data-js-expander>
                               <button class='btn expandable__btn'></button>
                            </div>
                        </td>
                        <td>
                            ";
                    if($hFriendStatus == '0' && $host_id != $user_id){
                        echo"
                            <button type='button' id='friendRequest' class='btn btn-lg btnColor friendBtn' data-toggle='modal' data-target='#sendFriendRequestModal' data-user_id='$host_id'>Friend?</button>
                        ";
                    }elseif($hFriendStatus == '1' && $host_id != $user_id){
                        echo"
                           <button type='button' id='$host_id' class='btn btn-sm btn-danger unfriend'>Unfriend?</button>
                        ";
                    }else{
                        echo "<td></td>";
                    }                
                   echo "
                            <div id='errorMessages'></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
</div>
<div id='hostContainer' class='hostPhone'>
    <h2>Host: $hostusername</h2>
        <div class='row'>
            <div class='col-xs-4'>";
            if(empty($hostpicture)){
                echo "<img src='css/profilepics/angel.png' class='profilePageProfilePic'>";
            }else{
                echo "<img src='$hostpicture' class='profilePageProfilePic'>";
            }
        echo "
            </div>
            <div class='col-xs-8'>
                <table class='table table-condensed statsTable'>
                    <tr>
                        <td class='centredCell'>Host Rep</td>";
                if($totalHRep>0){
                    echo "
                        <td class='centredCell grn'>$totalHRep</td>
                    ";
                }else{
                     echo "
                        <td class='centredCell red'>$totalHRep</td>
                    ";
                }
                  echo "
                        <td class='centredCell'>";
                if($hostVoteStatus == '0' && $host_id != $user_id){
                      echo "
                      <button type='button' id='$host_id' class='btn btn-lg btn-success voteBtn hostUpvote'>&#8679;</button>
                      <button type='button' id='$host_id' class='btn btn-lg btn-danger voteBtn hostDownvote'>&#8681;</button>
                      ";
                }elseif($hostVoteStatus == '1' && $host_id != $user_id){
                      echo "
                      <button type='button' id='$host_id' class='btn btn-lg btn-success btnDulledG hostUpvote'>&#8679;</button>
                      <button type='button' id='$host_id' class='btn btn-lg btn-danger btnHighlightedR'>&#8681;</button>
                      ";
                }elseif($hostVoteStatus == '2' && $host_id != $user_id){
                      echo "
                      <button type='button' id='$host_id' class='btn btn-lg btn-success btnHighlightedG'>&#8679;</button>
                      <button type='button' id='$host_id' class='btn btn-lg btn-danger btnDulledR hostDownvote'>&#8681;</button>
                      ";
                }else{
                    echo " ";
                }
                                        
            echo "
                        </td>
                    </tr>
               </table>
                <table class='table table-condensed statsTable'>
                    <tr>
                        <td class='centredCell'>$hFollowerCount</td>
                        <td class='centredCell'>Followers</td>";
            if($followingUser == '0' && $host_id != $user_id){
                echo"
                        <td class='centredCell'>
                            <button type='button' id='$host_id' class='btn btn-lg btnColor followBtn pull-right follow'>Follow?</button>
                        </td>";
            }elseif($followingUser == '1' && $host_id != $user_id){
                echo"
                        <td class='centredCell'>
                            <button type='button' id='$host_id' class='btn btn-sm btn-danger friendBtn pull-right unfollow'>UnFollow?</button>
                        </td>";
            }else{
                        echo "<td></td>";
                    }   
                                        
                echo "
                    </tr>
               </table>
            </div>
        </div>
            <div class='phoneHostInfo'>";
        if($host_id == $user_id){
            echo "<div class='expandable__btn__wrapper'  data-js-expander>
                   <button class='btn expandable__btn'></button>
                </div>";
        }
        echo "
                <div class='expandable' data-js-expandable>
                    <div class='innerContent' data-js-expandable-inner>$hostinfo</div>
                </div>";
        if($host_id != $user_id){
            echo "<div class='expandable__btn__wrapper'  data-js-expander>
                   <button class='btn expandable__btn'></button>
                </div>";
        }
                    if($hFriendStatus == '0' && $host_id != $user_id){
                        echo"
                            <button type='button' id='friendRequest' class='btn btn-lg btnColor friendBtn' data-toggle='modal' data-target='#sendFriendRequestModal' data-user_id='$host_id'>Friend?</button>
                        ";
                    }elseif($hFriendStatus == '1' && $host_id != $user_id){
                        echo"
                           <button type='button' id='$host_id' class='btn btn-sm btn-danger unfriend'>Unfriend?</button>
                        ";
                    }else{
                        echo "<td></td>";
                    }                   
                   echo "
                            <div id='errorMessages'></div>
            </div>
        
</div>";


?>