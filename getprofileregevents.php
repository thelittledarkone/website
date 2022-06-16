<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];

$profile_name = $_SESSION["profile_name"];

//Get username and email
$sql0 = "SELECT * FROM users WHERE username='$profile_name' LIMIT 1";
$result0 = mysqli_query($link, $sql0);
if(mysqli_num_rows($result0)>0){
    $row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC);
    $profile_id = $row0['user_id'];
}

$sql = "SELECT * FROM userevents WHERE (player1_id='$profile_id' OR player2_id='$profile_id' OR player3_id='$profile_id' OR player4_id='$profile_id' OR player5_id='$profile_id' OR player6_id='$profile_id' OR player7_id='$profile_id' OR player8_id='$profile_id') AND regular='Y' ORDER BY date_added DESC LIMIT 2";

$result = mysqli_query($link, $sql);

if($result){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            //Check Frequency
            if($row['regular'] == "N"){
                $frequency = "One-Off Event";
                $time = "on " . $row['date'] . " at " . $row['time'] . ".";
            }else{
                $frequency = "Regular Event.";
                $weekdayArray = [];
                if($row['monday'] == 1){array_push($weekdayArray, "Mon");}
                if($row['tuesday'] == 1){array_push($weekdayArray, "Tue");}
                if($row['wednesday'] == 1){array_push($weekdayArray, "Wed");}
                if($row['thursday'] == 1){array_push($weekdayArray, "Thu");}
                if($row['friday'] == 1){array_push($weekdayArray, "Fri");}
                if($row['saturday'] == 1){array_push($weekdayArray, "Sat");}
                if($row['sunday'] == 1){array_push($weekdayArray, "Sun");}
                $time = "every " . implode("-", $weekdayArray) . " at " . $row['time'] . ".";
            }
            
            
            $name = $row['event_name'];
            
            $eventgame = $row['event_game'];
                //Get game details
                $sql000 = "SELECT * FROM games WHERE game_id='$eventgame'";
                $result000 = mysqli_query($link, $sql000);
                if(mysqli_num_rows($result000)>0){
                    $row000 = mysqli_fetch_array($result000, MYSQLI_ASSOC);
                    $game_name = $row000['game_name'];
                }
            $gameedition = $row1['game_edition'];
                //Get game details
                if($gameedition != 0 && $gameedition != NULL){
                    $sqle000 = "SELECT * FROM game_editions WHERE edition_id='$gameedition'";
                    $resulte000 = mysqli_query($link, $sqle000);
                    if(mysqli_num_rows($resulte000)>0){
                        $rowe000 = mysqli_fetch_array($resulte000, MYSQLI_ASSOC);
                        $edition_name = $rowe000['edition_name'];
                    }
                }
            
            $rawaboutEvent = $row['about_event'];
            $aboutEvent = nl2br(htmlentities($rawaboutEvent, ENT_QUOTES, 'UTF-8'));
            
            $event_id = $row['event_id'];
            
            if($row['player1_id'] == $user_id || $row['player2_id'] == $user_id || $row['player3_id'] == $user_id || $row['player4_id'] == $user_id || $row['player5_id'] == $user_id || $row['player6_id'] == $user_id || $row['player7_id'] == $user_id || $row['player8_id'] == $user_id || $profile_id == $user_id){
                $userattending = 1;
            }else{
                $userattending = 0;
            }
            
            echo "
                    <table class='table table-condensed profilePageTbl'>
                        <tr>
                            <td class='col-xs-3'>Event:</td>
                            <td class='col-xs-9'><span>$name</span></td>
                        </tr>
                        <tr>
                            <td class='col-xs-3'>Game:</td>
                            <td class='col-xs-9'>";
                            if($gameedition == 0 || $gameedition == NULL){
                                echo "<a href='gameprofile.php?game_name=$game_name''><span>$game_name</span></a>";
                            }else{
                                echo "<a href='editionpage.php?edition_id=$gameedition&game_id=$eventgame'><span>$game_name: $edition_name</span></a>";
                            }
                                echo "</td>
                        </tr>
                        <tr>
                            <td class='col-xs-3'>Date/Time:</td>
                            <td class='col-xs-9'>
                                <div>$frequency $time</div>
                            </td>
                        </tr>
                        <tr>
                            <td class='col-xs-3'>About Event:</td>
                            <td class='col-xs-9'>$aboutEvent</td>
                        </tr>
                    </table>
                    <div class='priceBtns profilePageBtns'>";
                    if($profile_id != $user_id){
                        echo "<button type='button' id='message' class='btn msgBtn btnColor' data-toggle='modal' data-target='#sendMessageModal' data-event_id='$event_id'>Message</button>";
                    }
            if($userattending == 1){
                echo "<a class='btn btnColor' href='eventpage.php?event_id=$event_id' name='gotoevent' type='button'>EVENT &#8658;</a>";
            }else{
                echo "<button type='button' id='book' class='btn content__btn btnDone' data-toggle='modal' data-target='#sendBookingRequestModal' data-event_id='$event_id'>Book</button>";
            }
                        
        echo "</div>";
        }
    }
}

?>