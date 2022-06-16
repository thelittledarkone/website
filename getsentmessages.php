<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM usermessages WHERE message_from='$user_id' AND (message_type='q' OR message_type='o' OR message_type='z') ORDER BY message_date DESC";
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
            $event_id = $row['message_event'];
            
            echo "
        <div class='allSentMessageResults'>  
          <div class='row mainMessage'>
              <div class='col-xs-12 detailsContainer'>
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