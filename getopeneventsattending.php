<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];

if($_SERVER['REQUEST_URI'] == "/attendingoevents.php"){
    $sql = "SELECT * FROM open_event_attendance LEFT JOIN userevents ON open_event_attendance.event_id = userevents.event_id WHERE open_event_attendance.user_id='$user_id' AND ((regular='N' AND (date < now())) OR regular='Y') ORDER BY date_added DESC";
}else{
    $sql = "SELECT * FROM open_event_attendance LEFT JOIN userevents ON open_event_attendance.event_id = userevents.event_id WHERE open_event_attendance.user_id='$user_id' AND ((regular='N' AND (date < now())) OR regular='Y') ORDER BY date_added DESC LIMIT 5";
}



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
            
            $address1 = $row['address'];
            $address2 = $row['address2'];
            $district = $row['district'];
            $city = $row['city'];
            $postcode = $row['postal_code'];
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
            
            $eventType = $row['event_type'];
            $seats = $row['seatsavailable'];
            
            $rawaboutEvent = $row['about_event'];
            $aboutEvent = nl2br(htmlentities($rawaboutEvent, ENT_QUOTES, 'UTF-8'));
            
            $event_id = $row['event_id'];
            
            echo "
            <div class='row eventContainer'>
                <div class='col-sm-10 detailsContainer'>
                    <table class='table table-condensed'>
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
                            <td class='col-xs-3'>Address:</td>
                            <td class='col-xs-9'>";
                        if($address1 != ''){
                            echo "<div>$address1</div>";
                        }
                        if($address2 != ''){
                            echo "<div>$address2</div>";
                        }
                        if($district != ''){
                            echo "<div>$district</div>";
                        }
                        if($city != ''){
                            echo "<div>$city</div>";
                        }
                        if($postcode != ''){
                            echo "<div>$postcode</div>";
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
                </div>
                <div class='col-sm-2 priceContainer'>
                    <div class='priceStats'>
                        <div class='perSeat'>This is an</div>
                        <div class='seatDetails'>Open Event!</div>
                    </div>
                    <div class='priceBtns'>
                        <button type='button' id='message' class='btn msgBtn btnColor' data-toggle='modal' data-target='#sendMessageModal' data-event_id='$event_id'>Message</button>
                        <a class='btn btnColor' href='eventpage.php?event_id=$event_id' name='gotoevent' type='button'>EVENT &#8658;</a>
                    </div>
                </div>
            </div>
            ";
        }
    }else{
        echo "<div class='alert alert-warning'>You are not attending any events yet!</div>";
    }
}

?>