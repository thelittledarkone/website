<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

//Get user id
$user_id = $_SESSION['user_id'];
$message_id = $_SESSION["message_id"];

//Get username and email
$sql = "SELECT * FROM usermessages WHERE message_id='$message_id' LIMIT 1";
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $subject = $row['message_subject'];
    
    $rawcontent = $row['message_content'];
    $content = nl2br(htmlentities($rawcontent, ENT_QUOTES, 'UTF-8'));
    
    $bookSeat = $row['book_seat'];
    $friendRequest = $row['friend_request'];
    $respondedTo = $row['responded_to'];
    $from_id = $row['message_from'];
    $event_id = $row['message_event'];
    $message_type = $row['message_type'];
    $message_to = $row['message_to'];
            
    $date = $row['message_date'];
}else{
    echo '<div class="alert alert-danger">There was an error retrieving the message from the database</div>';
}

//Run query to get sender details
$sql1 = "SELECT * FROM users WHERE user_id='$from_id' LIMIT 1";
$result1 = mysqli_query($link, $sql1);
if(mysqli_num_rows($result1)>0){
    $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
    
    $username = $row1['username'];
    $picture = $row1['profilepicture'];
    $phone = $row1['phonenumber'];
    $email = $row1['email'];
}else{
    echo '<div class="alert alert-danger">There was an error retrieving the sender from the database</div>';
}

if($event_id != '0'){         
    //Run query to get event details
    $sql2 = "SELECT * FROM userevents WHERE event_id='$event_id' LIMIT 1";
    $result2 = mysqli_query($link, $sql2);
    if(mysqli_num_rows($result2)>0){
        $row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC);

        $eventtype = $row2['event_type'];
        $eventname = $row2['event_name'];
        $gameid = $row2['event_game'];
        $seats = $row2['seatsavailable'];
        //Check Frequency
        if($row2['regular'] == "N"){
            $frequency = "One-Off Event";
            $time = "on " . $row2['date'] . " at " . $row2['time'] . ".";

    //        //check if date is in past
    //        $source = $row2['date'];
    //        $eventDate = DateTime::createFromFormat('D d M, yy', $source);
    //        $today = date('D d M, yy');
    //        $todayDate = DateTime::createFromFormat('D d M, yy', $today);
    //        if($eventDate < $todayDate){
    //            $inPast = 1;
    //            continue;
    //        }

        }else{
            $frequency = "Regular Event";
            $weekdayArray = [];
            $weekdays = ['monday'=>'Mon', 'tuesday'=>'Tue', 'wednesday'=>'Wed', 'thursday'=>'Thu', 'friday'=>'Fri', 'saturday'=>'Sat', 'sunday'=>'Sun'];
             foreach($weekdays as $key => $value){
                 if($row2[$key] == 1){array_push($weekdayArray, $value);}
            }
            $time = "every " . implode("-", $weekdayArray) . " at " . $row2['time'] . ".";
        }
        
        //Get username and email
        $sql3 = "SELECT * FROM games WHERE game_id='$gameid' LIMIT 1";
        $result3 = mysqli_query($link, $sql3);
        if(mysqli_num_rows($result3)>0){
            $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
            $gamename = $row3['game_name'];
            

        }else{
            echo '<div class="alert alert-danger">There was an error retrieving the username and email from the database</div>';
        }
    }else{
        echo '<div class="alert alert-danger">There was an error retrieving the event from the database</div>';
    }
}



echo "
                    <div class='row'>
                        <div class='col-md-4 senderBox'>";
                            if(empty($picture)){
                                echo "<img src='css/profilepics/angel.png' class='profilePageProfilePic'>";
                            }else{
                                echo "<img src='$picture' class='profilePageProfilePic'>";
                            }
                    echo "
                        <h4>$username</h4>
                        </div>
                        <div class='col-md-8'>
                            <table class='table table-condensed'>";
                            if($event_id != '0'){
                                echo "
                                    <tr>
                                        <td>Event:</td>
                                        <td><span>$eventname</span></td>
                                    </tr>
                                    <tr>
                                        <td>Game:</td>
                                        <td><span>$gamename</span></td>
                                    </tr>
                                    <tr>
                                        <td>When:</td>
                                        <td>
                                            $frequency $time
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Seats:</td>
                                        <td>";
                                            if($eventtype == 'l'){
                                                echo "$seats remaining!";
                                            }else{
                                                echo "This is an open event!";
                                            }
                                    echo "</td>
                                        </tr>";
                                        if(($bookSeat == '1') && ($respondedTo != '1') && ($message_to == $user_id)){
                                            echo "<tr>
                                                    <td>&#128533;</td>
                                                    <td>Accept Booking Request?
                                                    <button class='btn btn-sm btn-success bookBtn acceptBtn' data-user_id='$from_id' data-event_id='$event_id' data-message_id='$message_id' name='acceptbooking' type='button'>Accept</button>
                                                    <button class='btn btn-sm btn-danger bookBtn declineBtn' data-user_id='$from_id' data-event_id='$event_id' data-message_id='$message_id' name='declinebooking' type='button'>Decline</button>
                                                    <div class='acceptBookingErrorMessage'></div></td>
                                                </tr>";
                                        }elseif(($bookSeat == '1') && ($respondedTo == '1') && ($message_to == $user_id)){
                                            echo "
                                                <tr>
                                                    <td>&#128522;</td>
                                                    <td><div>Thank you for responding to this booking request!</div></td>
                                                </tr>
                                            ";
                                        }
                            }elseif(($friendRequest == '1') && ($respondedTo != '1') && ($message_to == $user_id)){
                                            echo "<tr>
                                                    <td>&#128522;</td>
                                                    <td>Accept Friend Request?
                                                    <button class='btn btn-sm btn-success bookBtn acceptFBtn' data-user_id='$from_id' data-message_id='$message_id' name='acceptfriend' type='button'>Accept</button>
                                                    <button class='btn btn-sm btn-danger bookBtn declineFBtn' data-user_id='$from_id' data-message_id='$message_id' name='declinefriend' type='button'>Decline</button>
                                                    <div class='acceptFriendErrorMessage'></div></td>
                                                </tr>";
                                }elseif(($friendRequest == '1') && ($respondedTo == '1') && ($message_to == $user_id)){
                                            echo "
                                                <tr>
                                                    <td>&#128522;</td>
                                                    <td><div>Thank you for responding to this friend request!</div></td>
                                                </tr>
                                            ";
                                }
                                        
                                echo "                                        
                                    </table>
                                <div class='messageActionBtnContainer'>
                                    <button class='btn btn-danger deleteMessage' id='$message_id' name='deletemessage' type='button'>Delete Message</button>
                                    <button class='btn btn-success saveMessage' id='$message_id' name='savemessage' type='button'>Save Message</button>";
                                if($message_type == 'f' || $event_id == '0'){
                                    echo "<a class='btn btnColor pull-right' href='profilepage.php?username=$username' name='gotoprofile' type='button'>GO TO PROFILE &#8658;</a>";
                                }else{
                                    echo "<a class='btn btnColor pull-right' href='eventpage.php?event_id=$event_id' name='gotoevent' type='button'>GO TO EVENT &#8658;</a>";
                                }
                                echo "    
                                </div>
                        </div>
                    </div>
                    
                    <h3>Message:</h3>
                        <table class='table table-condensed mainTable'>
                           <tr>
                              <td>$username</td>  ";
                           if($message_type == 'q'){
                               echo "<td>has sent you a Question...</td>";
                           }elseif($message_type == 'z'){
                               echo "<td>has sent you Feedback...</td>";
                           }elseif($message_type == 'o'){
                               echo "<td>has sent you a Message...</td>";
                           }elseif($message_type == 'b'){
                               echo "<td>has sent you a Booking Request...</td>";
                           }elseif($message_type == 'f'){
                               echo "<td>has sent you a Friend Request...</td>";
                           }else{
                               echo "<td>has sent you a Response to your Request...</td>";
                           }
                           echo "    
                           </tr>
                           <tr>
                               <td>Subject:</td>
                               <td><span>$subject</span></td>
                           </tr>
                           <tr>
                               <td>Date Sent:</td>
                               <td>$date</td>
                           </tr>
                           <tr>
                               <td>Message:</td>
                               <td>
                                    <div class='messageContent'>$content</div>
                              </td>
                           </tr>
                        </table>
                        
                        <div class='btn content__btn__wrapper commentsExpander'>
                            <button type='button' class='btn content__btn btnColor'>Comments</button>
                        </div>
                        <div class='outerContent commentsExpandable' data-js-expandable>
                            <div class='innerContent' data-js-expandable-inner>
                                <form method='post' class='responseForm'>
                                    <div class='form-group'>
                                        <label for='replyMessageContent'>Reply: </label>
                                        <textarea name='replyMessageContent' class='form-control replyMessageContent' rows='3'></textarea>
                                    </div>   
                                    <input class='btn btnColor replyToMessage pull-right' id='$message_id' name='replytomessage' type='submit' value='Send Reply'>
                                </form>
                                <div class='responseErrorMessage'></div>
                                <div class='row'>
                                    <div class='col-sm-12'>
                                        <div class='allResponses'>
                                            <table class='table table-condensed commentsTable'>
                                        ";


                            //Run query to get responses details
                            $sql3 = "SELECT * FROM message_responses WHERE message_id='$message_id' ORDER BY response_date DESC";
                            $result3 = mysqli_query($link, $sql3);
                            if($result3){
                                if(mysqli_num_rows($result3)>0){
                                    while($row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC)){
                                        $rDate = $row3['response_date'];
                                        $rContent = $row3['response_content'];
                                        $responder_id = $row3['response_by'];

                                        //Run query to get sender details
                                        $sql7 = "SELECT * FROM users WHERE user_id='$responder_id' LIMIT 1";
                                        $result7 = mysqli_query($link, $sql7);
                                        if(!$result7){
                                            echo "ERROR: Unable to execute: $sql4. " . mysqli_error($link); exit;
                                        }
                                        $row7 = mysqli_fetch_array($result7, MYSQLI_ASSOC);

                                        $rUsername = $row7['username'];
                                        
                                        if($responder_id == $user_id){
                                             echo "   
                                               <tr>
                                                    <td>
                                                        <div class='expandable' data-js-expandable>
                                                            <div class='innerContent' data-js-expandable-inner>$rContent</div>
                                                        </div>
                                                        <div class='expandable__btn__wrapper'  data-js-expander>
                                                           <button class='btn expandable__btn'></button>
                                                        </div>
                                                    </td>
                                                    <td class='responseSender'>
                                                        <div>$rUsername</div>
                                                        <div>$rDate</div>
                                                    </td>
                                                    
                                               </tr>

                                        ";
                                        }else{
                                             echo "   
                                               <tr>
                                                    <td class='responseSender'>
                                                        <div>$rUsername</div>
                                                        <div>$rDate</div>
                                                    </td>
                                                    <td>
                                                        <div class='expandable' data-js-expandable>
                                                            <div class='innerContent' data-js-expandable-inner>$rContent</div>
                                                        </div>
                                                        <div class='expandable__btn__wrapper'  data-js-expander>
                                                           <button class='btn expandable__btn'></button>
                                                        </div>
                                                    </td>
                                               </tr>

                                        ";
                                        }

                                  
                                    }
                                }else{
                                    echo "<tr><td><div class='alert alert-warning'>This message has no responses yet!</div></td></tr>";
                                }
                            }

                        echo "
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                
                    </div>
";

$sql9 = "UPDATE usermessages SET `read_status`='1' WHERE message_id='$message_id'";
$result9 = mysqli_query($link, $sql9);

if(!$result9){
    echo "<div class='alert alert-warning'>You have not deleted the responses, please try again later!</div>";
}

?>