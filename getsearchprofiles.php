<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];
$data = $_SESSION['data'];

$sql = "SELECT * FROM users WHERE username LIKE '%$data%' AND user_id != '$user_id'";
$result = mysqli_query($link, $sql);
if($result){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $username = $row['username'];
            $profile_id = $row['user_id'];
            $picture = $row['profilepicture'];
            
        if(!empty($user_id) && $user_id != 0 && $user_id != NULL){
            if($profile_id != 0 && $profile_id != NULL && $profile_id != $user_id ){
                //Get Friend Status and other stats
                $sql1 = "SELECT * FROM user_links WHERE (user1_id='$profile_id' AND user2_id='$user_id') OR (user2_id='$profile_id' AND user1_id='$user_id') LIMIT 1";
                $result1 = mysqli_query($link, $sql1);
                if(mysqli_num_rows($result1)>0){
                    $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
                    $friendStatus = $row1['friend_status'];
                }else{
                    $sql2 = "INSERT INTO user_links (`user1_id`, `user2_id`, `friend_status`, `user1_host_vote`, `user2_host_vote`, `user1_player_vote`, `user2_player_vote`, `user1_follow_user2`, `user2_follow_user1`) VALUES ('$user_id', '$profile_id', '0', '0', '0', '0', '0', '0', '0')";
                    $result2 = mysqli_query($link, $sql2);
                    if(!$result2){
                        echo '<div class="alert alert-danger">Error inserting user details into database</div>';
                    }
                    $sql3 = "SELECT * FROM user_links WHERE (user1_id='$profile_id' AND user2_id='$user_id') OR (user2_id='$profile_id' AND user1_id='$user_id') LIMIT 1";
                    $result3 = mysqli_query($link, $sql3);
                    if(mysqli_num_rows($result3)>0){
                        $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
                        $friendStatus = $row3['friend_status'];
                    }
                }
            }
        }

            
            echo "
        <div class='friendContainer col-xs-6 col-sm-4 col-md-3'>
            <a href='profilepage.php?username=$username'>
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
                    ";
            if(isset($_SESSION['user_id'])){
                    if($friendStatus == 1){
                        echo "<button type='button' id='$profile_id' class='btn btn-sm btn-danger unFfriend'>Unfriend?</button>";
                    }else{
                        echo "<button type='button' id='$profile_id' class='btn btn-lg btnColor friendBtn pull-right' data-toggle='modal' data-target='#sendFriendRequestModal' data-user_id='$profile_id'>Send Friend Request</button>";
                    }
            }
                    echo "
                </div>
            </div>
            </a>
        </div>
                ";
                
            
        }
    }
}

?>