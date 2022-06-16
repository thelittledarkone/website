<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];
$game_id = $_SESSION['game_id'];
$game_name = $_SESSION['game_name'];
$edition_id = $_SESSION['edition_id'];
$isEmpty = 0;

$sql = "SELECT * FROM users WHERE user_id='$user_id' LIMIT 1";
$result = mysqli_query($link, $sql);

if($result){
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $addressLat = $row['addressLat'];
        $addressLon = $row['addressLon'];
        $radius = $row['travel_radius'];      
    }         
}

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
$sql1 = "SELECT * FROM userevents WHERE";
if($minLon<$maxLon){
    $sql1 .= $queryChoice[0];
    $sql1 .= $queryChoice[2];
}else{
    $sql1 .= $queryChoice[1];
    $sql1 .= $queryChoice[2];
}

if($edition_id == '0'){
    $sql1 .= " AND event_game='$game_id' AND user_id != '$user_id' ORDER BY date ASC LIMIT 5";
}else{
    $sql1 .= " AND event_game='$game_id' AND game_edition='$edition_id' AND user_id != '$user_id' ORDER BY date ASC LIMIT 5";
}



//Run Query
$result1 = mysqli_query($link, $sql1);

if($result1){
    if(mysqli_num_rows($result1)>0){
        while($row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
            //Get Events
            //Check Frequency
                if($row1['regular'] == "N"){
                    $frequency = "One-Off Event";
                    $time = "on " . $row1['date'] . " at " . $row1['time'] . ".";

                }else{
                    $frequency = "Regular Event";
                    $weekdayArray = [];
                    $weekdays = ['monday'=>'Mon', 'tuesday'=>'Tue', 'wednesday'=>'Wed', 'thursday'=>'Thu', 'friday'=>'Fri', 'saturday'=>'Sat', 'sunday'=>'Sun'];
                    foreach($weekdays as $key => $value){
                        if($row1[$key] == 1){array_push($weekdayArray, $value);}
                    }
                    $time = "every " . implode("-", $weekdayArray) . " at " . $row1['time'] . ".";
                }
                $event_id = $row1['event_id'];
                $eventcity = $row1['city'];
            
                $eventname = $row1['event_name'];
            
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
                
                $eventType = $row1['event_type'];
                $eventseats = $row1['seatsavailable'];
                $attendees = $row1['attendees'];
                $aboutEvent = $row1['about_event'];
            
                $timeadded = $row1['date_added'];
                $dateadded = new DateTime($timeadded);
                $now = new DateTime();

                $diff = $now->diff($dateadded)->format("%a");
                if($diff > 364){
                    $diffyears = floor($diff/365);
                    $diffdays = $diff-($diffyears*365);
                }
       
            //Get user_id
            $person_id = $row1['user_id'];
            $player1 = $row1['player1_id'];
            $player2 = $row1['player2_id'];
            $player3 = $row1['player3_id'];
            $player4 = $row1['player4_id'];
            $player5 = $row1['player5_id'];
            $player6 = $row1['player6_id'];
            $player7 = $row1['player7_id'];
            $player8 = $row1['player8_id'];

            //Run query to get user details
            $sql2 = "SELECT * FROM users WHERE user_id='$person_id' LIMIT 1";
            $result2 = mysqli_query($link, $sql2);
            if(!$result2){
                echo "ERROR: Unable to execute: $sql2. " . mysqli_error($link); exit;
            }
            $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);
            
            $username = $row2['username'];
            
            $rawaboutEvent = $row2['about_event'];
            $aboutEvent = nl2br(htmlentities($rawaboutEvent, ENT_QUOTES, 'UTF-8'));
            
            $picture = $row2['profilepicture'];
            if($_SESSION['user_id'] && $row2['phone_privacy'] == 'p'){
                $phone = $row2['phonenumber'];
            }else{
                $phone = "Only available to certain people who have signed up to thelittledarkone's Detect Adventure!";
            }
            if($_SESSION['user_id'] && $row2['email_privacy'] == 'p'){
                $email = $row2['email'];
            }else{
                $email = "Only available to certain people who have signed up to thelittledarkone's Detect Adventure!";
            }
            
            //Run query to get player details
            if($player1 != NULL && $player1 != 0){
                $sql3 = "SELECT * FROM users WHERE user_id='$player1' LIMIT 1";
                $result3 = mysqli_query($link, $sql3);
                if(!$result3){
                    echo "ERROR: Unable to execute: $sql3. " . mysqli_error($link); exit;
                }
                $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);

                $p1username = $row3['username'];
                $p1picture = $row3['profilepicture'];
            }
            if($player2 != NULL && $player2 != 0){
                $sql4 = "SELECT * FROM users WHERE user_id='$player2' LIMIT 1";
                $result4 = mysqli_query($link, $sql4);
                if(!$result4){
                    echo "ERROR: Unable to execute: $sql4. " . mysqli_error($link); exit;
                }
                $row4 = mysqli_fetch_array($result4, MYSQLI_ASSOC);

                $p2username = $row4['username'];
                $p2picture = $row4['profilepicture'];
            }
            if($player3 != NULL && $player3 != 0){
                $sql5 = "SELECT * FROM users WHERE user_id='$player3' LIMIT 1";
                $result5 = mysqli_query($link, $sql5);
                if(!$result5){
                    echo "ERROR: Unable to execute: $sql5. " . mysqli_error($link); exit;
                }
                $row5 = mysqli_fetch_array($result5, MYSQLI_ASSOC);

                $p3username = $row5['username'];
                $p3picture = $row5['profilepicture'];
            }
            if($player4 != NULL && $player4 != 0){
                $sql6 = "SELECT * FROM users WHERE user_id='$player6' LIMIT 1";
                $result6 = mysqli_query($link, $sql6);
                if(!$result6){
                    echo "ERROR: Unable to execute: $sql6. " . mysqli_error($link); exit;
                }
                $row6 = mysqli_fetch_array($result6, MYSQLI_ASSOC);

                $p4username = $row6['username'];
                $p4picture = $row6['profilepicture'];
            }
            if($player5 != NULL && $player5 != 0){
                $sql7 = "SELECT * FROM users WHERE user_id='$player5' LIMIT 1";
                $result7 = mysqli_query($link, $sql7);
                if(!$result7){
                    echo "ERROR: Unable to execute: $sql7. " . mysqli_error($link); exit;
                }
                $row7 = mysqli_fetch_array($result7, MYSQLI_ASSOC);

                $p5username = $row7['username'];
                $p5picture = $row7['profilepicture'];
            }
            if($player6 != NULL && $player6 != 0){
                $sql8 = "SELECT * FROM users WHERE user_id='$player6' LIMIT 1";
                $result8 = mysqli_query($link, $sql8);
                if(!$result8){
                    echo "ERROR: Unable to execute: $sql8. " . mysqli_error($link); exit;
                }
                $row8 = mysqli_fetch_array($result8, MYSQLI_ASSOC);

                $p6username = $row8['username'];
                $p6picture = $row8['profilepicture'];
            }
            if($player7 != NULL && $player7 != 0){
                $sql9 = "SELECT * FROM users WHERE user_id='$player7' LIMIT 1";
                $result9 = mysqli_query($link, $sql9);
                if(!$result9){
                    echo "ERROR: Unable to execute: $sql9. " . mysqli_error($link); exit;
                }
                $row9 = mysqli_fetch_array($result9, MYSQLI_ASSOC);

                $p7username = $row9['username'];
                $p7picture = $row9['profilepicture'];
            }
            if($player8 != NULL && $player8 != 0){
                $sql10 = "SELECT * FROM users WHERE user_id='$player8' LIMIT 1";
                $result10 = mysqli_query($link, $sql10);
                if(!$result10){
                    echo "ERROR: Unable to execute: $sql10. " . mysqli_error($link); exit;
                }
                $row10 = mysqli_fetch_array($result10, MYSQLI_ASSOC);

                $p8username = $row10['username'];
                $p8picture = $row10['profilepicture'];
            }
            
            $sql11 = "SELECT * FROM open_event_attendance WHERE user_id='$user_id' AND event_id='$event_id'";
            $result11 = mysqli_query($link, $sql11);
                if(mysqli_num_rows($result11)>0){
                    $openAttend = '1';
                }else{
                    $openAttend = '0';
                }
            
        if(($eventType == 'o' || $eventseats > 0) && ($player1 != $user_id && $player2 != $user_id && $player3 != $user_id && $player4 != $user_id && $player5 != $user_id && $player6 != $user_id && $player7 != $user_id && $player8 != $user_id && $openAttend != '1')){
            //Print Event Card
            echo "
        <div class='individualEvent'>
            <div class='row mainContent'>
                <div class='col-sm-3'>
                    <div class='profilePicContainer'><a href='profilepage.php?username=$username'>";
                            if(empty($picture)){
                                echo "<img src='css/profilepics/angel.png' class='organiserPic'>";
                            }else{
                                echo "<img class='organiserPic' src='$picture'/>";
                            }
                    echo "</a></div>
                    <a href='profilepage.php?username=$username'><div class='organiser'><strong>$username</strong></div></a>
                </div>
                <div class='col-sm-7 nearDetailsContainer'>
                        <table class='table table-condensed'>
                            <tr>
                                <td class='col-xs-3'>Event:</td>
                                <td class='col-xs-9'><a href='eventpage.php?event_id=$event_id'><span>$eventname</span></a></td>
                            </tr>
                            <tr>
                                <td class='col-xs-3'>Game:</td>
                                <td class='col-xs-9'>";
                            if($gameedition == 0 || $gameedition == NULL){
                                echo "<a href='gameprofile.php?game_name=$game_name''><span>$game_name</span></a>";
                            }else{
                                echo "<a href='editionpage.php?edition_id=$gameedition&game_id=$game_id'><span>$game_name: $edition_name</span></a>";
                            }
                                echo "</td>
                            </tr>
                            <tr>
                                <td class='col-xs-3'>When:</td>
                                <td class='col-xs-9'>
                                    <div>$frequency $time</div>
                                </td>
                            </tr>
                            <tr>
                                <td class='col-xs-3'>Type:</td>
                                <td class='col-xs-9'>
                                    <div class='searchPerSeat'>"; 
                                if($eventType == 'o'){
                                    echo "This is an Open Event!</div>";
                                }else{
                                    echo "Limited Event with $eventseats seats left!</div>";
                                }
                        echo "  </td>
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
                    if($eventType == 'o'){
                        echo "<tr>
                                <td class='col-xs-3'>People Attending:</td>
                                <td class='col-xs-9'>
                                    <div>$attendees</div>
                                </td>
                            </tr>";
                    }
                            
                        echo "</table>
                    </div>
            </div> 
            <div class='expandableBtnContainer'>           
                    <div class='btn content__btn__wrapper infoExpander'>
                        <button type='button' class='btn content__btn btnColor'>Organiser Info</button>
                    </div>
                    <div class='btn content__btn__wrapper gameInfoExpander'>
                        <button type='button' class='btn content__btn btnColor'>Game Info</button>
                    </div>";
                    if($eventType == 'l'){
                        echo "<div class='btn content__btn__wrapper playerExpander'>
                            <button type='button' class='btn content__btn btnColor'>Players</button>
                        </div>";
                    }
                echo "
                    <div class='btn content__btn__wrapper'>
                        <button type='button' id='message' class='btn content__btn btnColor' data-toggle='modal' data-target='#sendMessageModal' data-event_id='$event_id'>Message</button>
                    </div>";
            
                    if($player1 == $user_id || $player2 == $user_id || $player3 == $user_id || $player4 == $user_id || $player5 == $user_id || $player6 == $user_id || $player7 == $user_id || $player8 == $user_id || $openAttend == '1' ){
                echo "
                    <div class='btn content__btn__wrapper'>
                        <a class='btn btnColor pull-right' href='eventpage.php?event_id=$event_id' name='gotoevent' type='button'>EVENT &#8658;</a>
                    </div>
                ";
            }else{
                echo "
                    <div class='btn content__btn__wrapper'>
                        <button type='button' id='book' class='btn content__btn btnDone' data-toggle='modal' data-target='#sendBookingRequestModal' data-event_id='$event_id'>Book</button>
                    </div>
                ";
            }
            echo " 
                    <div class='outerContent outer infoExpandable'>
                        <div class='innerContent' data-js-expandable-inner>
                            <table class='table table-condensed'>
                                <tr>
                                    <td>About Me:</td>
                                    <td><div class='expandable' data-js-expandable>
                                                <div class='innerContent' data-js-expandable-inner>$moreinfo</div>
                                            </div>
                                            <div class='expandable__btn__wrapper'  data-js-expander>
                                               <button class='btn expandable__btn'></button>
                                            </div>
                                        </td>
                                </tr>
                                <tr>
                                    <td>&#9993;</td>
                                    <td>$email</td>
                                </tr>
                                <tr>
                                    <td>&#9742:</td>
                                    <td>$phone</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                     <div class='outerContent outer gameInfoExpandable'>
                        <div class='innerContent' data-js-expandable-inner>
                            <table class='table table-condensed'>
                                <tr>
                                    <td>City:</td>
                                    <td>";
                                    if($eventaddress != '' && $_SESSION['user_id'] && $row2['address_privacy'] == 'p'){
                                        echo "<div>$eventaddress</div>";
                                    }
                                    if($eventaddress2 != '' && $_SESSION['user_id'] && $row2['address_privacy'] == 'p'){
                                        echo "<div>$eventaddress2</div>";
                                    }
                                    if($eventdistrict != '' && $_SESSION['user_id'] && $row2['address_privacy'] == 'p'){
                                        echo "<div>$eventdistrict</div>";
                                    }
                                    if($eventcity != '' && $_SESSION['user_id'] && $row2['city_privacy'] == 'p'){
                                        echo "<div><strong>$eventcity</strong></div>";
                                    }
                                    if($eventpostcode != '' && $_SESSION['user_id'] && $row2['address_privacy'] == 'p'){
                                        echo "<div>$eventpostcode</div>";
                                    }else{
                                        echo "<div><i>Full address will be revealed upon signing in and being accepted to join this event.</i></div>";
                                    }
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
                        </div>
                    </div>";
                if($eventType == 'l'){
                echo "<div class='outerContent outer playerExpandable'>
                        <div class='innerContent' data-js-expandable-inner>";
                            if(($player1 == NULL || $player1 == 0) && ($player2 == NULL || $player2 == 0) && ($player3 == NULL || $player3 == 0) && ($player4 == NULL || $player4 == 0) && ($player5 == NULL || $player5 == 0) && ($player6 == NULL || $player6 == 0) && ($player7 == NULL || $player7 == 0) && ($player8 == NULL || $player8 == 0)){
                                echo "No players have joined this event yet!</div>";
                            }else{
                                echo "
                                <table class='table table-condensed'>
                                        <tr>";
                                            if($player1 != NULL && $player1 != 0){
                                                echo "<th>Player 1:</th>";
                                            }
                                            if($player2 != NULL && $player2 != 0){
                                                echo "<th>Player 2:</th>";
                                            }
                                            if($player3 != NULL && $player3 != 0){
                                                echo "<th>Player 3:</th>";
                                            }
                                            if($player4 != NULL && $player4 != 0){
                                                echo "<th>Player 4:</th>";
                                            }

                                    echo "</tr>
                                        <tr>";  
                                            if($player1 != NULL && $player1 != 0){
                                                echo "<td><a href='profilepage.php?username=$p1username'>";
                                                if(empty($p1picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p1picture'/>";
                                                }
                                                echo "</a></td>";
                                            }
                                            if($player2 != NULL && $player2 != 0){
                                                echo "<td><a href='profilepage.php?username=$p2username'>";
                                                if(empty($p2picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p2picture'/>";
                                                }
                                                echo "</a></td>";
                                            }
                                            if($player3 != NULL && $player3 != 0){
                                                echo "<td><a href='profilepage.php?username=$p3username'>";
                                                if(empty($p3picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p3picture'/>";
                                                }
                                                echo "</a></td>";
                                            }
                                            if($player4 != NULL && $player4 != 0){
                                                echo "<td><a href='profilepage.php?username=$p4username'>";
                                                if(empty($p4picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p4picture'/>";
                                                }
                                                echo "</a></td>";
                                            }

                                    echo "</tr>
                                        <tr>";
                                            if($player1 != NULL && $player1 != 0){
                                                echo "<td><a href='profilepage.php?username=$p1username'>$p1username</a></td>";
                                            }
                                            if($player2 != NULL && $player2 != 0){
                                                echo "<td><a href='profilepage.php?username=$p2username'>$p2username</a></td>";
                                            }
                                            if($player3 != NULL && $player3 != 0){
                                                echo "<td><a href='profilepage.php?username=$p3username'>$p3username</a></td>";
                                            }
                                            if($player4 != NULL && $player4 != 0){
                                                echo "<td><a href='profilepage.php?username=$p4username'>$p4username</a></td>";
                                            }

                                    echo "</tr>
                                </table>";
                            if(($player5 != NULL && $player5 != 0) || ($player6 != NULL && $player6 != 0) || ($player7 != NULL && $player7 != 0) || ($player8 != NULL && $player8 != 0)){
                                echo "
                                <table class='table table-condensed'>
                                        <tr>";
                                            if($player5 != NULL && $player5 != 0){
                                                echo "<th>Player 5:</th>";
                                            }
                                            if($player6 != NULL && $player6 != 0){
                                                echo "<th>Player 6:</th>";
                                            }
                                            if($player7 != NULL && $player7 != 0){
                                                echo "<th>Player 7:</th>";
                                            }
                                            if($player8 != NULL && $player8 != 0){
                                                echo "<th>Player 8:</th>";
                                            }

                                    echo "</tr>
                                        <tr>";  
                                            if($player5 != NULL && $player5 != 0){
                                                echo "<td><a href='profilepage.php?username=$p5username'>";
                                                if(empty($p5picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p5picture'/>";
                                                }
                                                echo "</a></td>";
                                            }
                                            if($player6 != NULL && $player6 != 0){
                                                echo "<td><a href='profilepage.php?username=$p6username'>";
                                                if(empty($p6picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p6picture'/>";
                                                }
                                                echo "</a></td>";
                                            }
                                            if($player7 != NULL && $player7 != 0){
                                                echo "<td><a href='profilepage.php?username=$p7username'>";
                                                if(empty($p7picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p7picture'/>";
                                                }
                                                echo "</a></td>";
                                            }
                                            if($player8 != NULL && $player8 != 0){
                                                echo "<td><a href='profilepage.php?username=$p8username'>";
                                                if(empty($p8picture)){
                                                    echo "<img src='css/profilepics/angel.png' class='playerPic'>";
                                                }else{
                                                    echo "<img class='playerPic' src='$p8picture'/>";
                                                }
                                                echo "</a></td>";
                                            }

                                    echo "</tr>
                                        <tr>";
                                            if($player5 != NULL && $player5 != 0){
                                                echo "<td><a href='profilepage.php?username=$p5username'>$p5username</a></td>";
                                            }
                                            if($player6 != NULL && $player6 != 0){
                                                echo "<td><a href='profilepage.php?username=$p6username'>$p6username</a></td>";
                                            }
                                            if($player7 != NULL && $player7 != 0){
                                                echo "<td><a href='profilepage.php?username=$p7username'>$p7username</a></td>";
                                            }
                                            if($player8 != NULL && $player8 != 0){
                                                echo "<td><a href='profilepage.php?username=$p8username'>$p8username</a></td>";
                                            }

                                    echo "</tr>
                                </table>";
                                }
                            }
                    echo "</div>
                    </div>";
                         
                }
            echo "</div>
            </div>";
            $isEmpty = 1;
            }
        }
        if($isEmpty == 0){
            echo "<div class='alert alert-info noResults'>Try clicking 'VIEW ALL' and expand your search radius to more than $radius miles, to see more events playing $game_name</div>";
        }
    }else{
        echo "<div class='alert alert-info noResults'>There are no events within $radius miles of you!</div>";
    }

}


?>