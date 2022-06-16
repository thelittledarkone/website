<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM usermessages WHERE message_to='$user_id' AND saved_status='1' AND (message_type='q' OR message_type='o' OR message_type='z') ORDER BY message_date DESC";
$result = mysqli_query($link, $sql);

if($result){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $message_id = $row['message_id'];
            $subject = $row['message_subject'];
            $date = $row['message_date'];
            
            $rawcontent = $row['message_content'];
            $content = nl2br(htmlentities($rawcontent, ENT_QUOTES, 'UTF-8'));
            
            $from_id = $row['message_from'];
            
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