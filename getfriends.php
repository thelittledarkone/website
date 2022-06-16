<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM user_links WHERE friend_status='1' AND (user1_id='$user_id' OR user2_id='$user_id')";
$result = mysqli_query($link, $sql);
if($result){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            if($row['user1_id'] == $user_id){
                $friend_id = $row['user2_id'];
            }else{
                $friend_id = $row['user1_id'];
            }
            
            
            //Run query to get sender details
            $sql1 = "SELECT * FROM users WHERE user_id='$friend_id' LIMIT 1";
            $result1 = mysqli_query($link, $sql1);
            if(!$result1){
                echo "ERROR: Unable to execute: $sql1. " . mysqli_error($link); exit;
            }
            $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
            
            $username = $row1['username'];
            $picture = $row1['profilepicture'];
            
            echo "
        <div class='friendContainer col-xs-6 col-sm-4 col-md-3'>
            <div class='panel-custom'>
                <div class='panel-heading'>";
                            if(empty($picture)){
                                echo "<img src='css/profilepics/angel.png' class='navProfilePic FPic'>";
                            }else{
                                echo "<img src='$picture' class='navProfilePic FPic'>";
                            }
         echo "</div>
                <div class='panel-body'>
                    <p class='panel-name'><strong>$username</strong></p>
                    <a class='btn btnColor moreFDetails' href='profilepage.php?username=$username' name='moredetails' type='button'>More Details</a>
                    <button type='button' id='$friend_id' class='btn btn-sm btn-danger unFfriend'>Unfriend?</button>
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