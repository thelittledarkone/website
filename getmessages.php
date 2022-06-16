<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];

$sql0 = "SELECT * FROM users WHERE user_id='$user_id'";
$result0 = mysqli_query($link, $sql0);
if(!$result0){
    echo "ERROR: Unable to execute: $sql0. " . mysqli_error($link); exit;
}
$row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC);
    
$autoDelete = $row0['message_auto_delete_days'];

$sql01 = "SELECT * FROM usermessages WHERE (message_date < now() - interval $autoDelete DAY) AND saved_status='0'";

$result01 = mysqli_query($link, $sql01);
if($result01){
    if(mysqli_num_rows($result01)>0){
        while($row01 = mysqli_fetch_array($result01, MYSQLI_ASSOC)){
            $old_message_id = $row01['message_id'];
            $sql02 = "SELECT * FROM message_responses WHERE (message_id='$old_message_id') AND (response_date > now() - interval $autoDelete DAY)";
            $result02 = mysqli_query($link, $sql02);
            if($result02){
                continue;
            }
                $sql03 = "DELETE FROM message_responses WHERE message_id='$old_message_id'";
                $result03 = mysqli_query($link, $sql03);

                if(!$result03){
                    echo "<div class='alert alert-warning'>You have not deleted the responses, please try again later!</div>";
                }

                $sql04 = "DELETE FROM usermessages WHERE message_id='$old_message_id'";
                $result04 = mysqli_query($link, $sql04);

                if(!$result04){
                    echo "<div class='alert alert-warning'>You have not deleted the message, please try again later!</div>";
                }
            
        }
    }
}else{echo "<div class='alert alert-warning'>You have not retrieved the message to delete, please try again later!</div>";}

$sql = "SELECT * FROM usermessages WHERE message_to='$user_id' AND read_status='0' AND (message_type='q' OR message_type='o' OR message_type='z') ORDER BY message_date DESC";
$result = mysqli_query($link, $sql);

if($result){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $message_id = $row['message_id'];
            $subject = $row['message_subject'];
            
            $rawcontent = $row['message_content'];
            $content = nl2br(htmlentities($rawcontent, ENT_QUOTES, 'UTF-8'));
            
            $from_id = $row['message_from'];
            $date = $row['message_date'];
                        
            //Run query to get sender details
            $sql1 = "SELECT * FROM users WHERE user_id='$from_id' LIMIT 1";
            $result1 = mysqli_query($link, $sql1);
            if(!$result1){
                echo "ERROR: Unable to execute: $sql1. " . mysqli_error($link); exit;
            }
            $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
            
            $username = $row1['username'];
            
            echo "
        <div class='allMessageResults'>  
          <div class='row mainMessage'>
              <div class='col-xs-4 senderContainer'>
                  <h3 class='organiser'>$username</h3>
              </div>
              <div class='col-xs-8 detailsContainer'>
                   <table class='table table-condensed mainTable'>
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
                                            <div class='expandable' data-js-expandable>
                                                <div class='innerContent' data-js-expandable-inner>$content</div>
                                            </div>
                                            <div class='expandable__btn__wrapper'  data-js-expander>
                                               <button class='btn expandable__btn'></button>
                                            </div>
                                        </td>
                       </tr>
                   </table>
                   <div class='actionBtnContainer'>
                        <a class='btn btnColor moreDetails' href='message.php?message_id=$message_id' name='moredetails' type='button'>More Details</a>
                        <button class='btn btn-danger deleteMessage' id='$message_id' name='deletemessage' type='button'>Delete</button>
                        <button class='btn btn-success saveMessage' id='$message_id' name='savemessage' type='button'>Save</button>
                        <button class='btn btnColor markRead' id='$message_id' name='markread' type='button'>Mark as Read</button>
                    </div>
               </div>
            </div>
        </div>
                ";
                
            
        }
    }else{
        echo "<div class='alert alert-warning'>You have not received any messages yet!</div>";
    }
}

?>