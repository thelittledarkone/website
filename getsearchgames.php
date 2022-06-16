<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];
$data = $_SESSION['data'];

$sql = "SELECT * FROM games WHERE game_name LIKE '%$data%'";
$result = mysqli_query($link, $sql);
if($result){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $username = $row['game_name'];
            $profile_id = $row['game_id'];
            $picture = $row['profilepicture'];
            
        if(!empty($user_id) && $user_id != 0 && $user_id != NULL){
            if($profile_id != 0 && $profile_id != NULL){
                //Get Friend Status and other stats
                $sql1 = "SELECT * FROM game_reviews WHERE user_id='$user_id' AND game_id='$profile_id' AND edition_id='0' LIMIT 1";
                $result1 = mysqli_query($link, $sql1);
                if(mysqli_num_rows($result1)>0){
                    $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
                    $likeStatus = $row1['like_game'];
                }
            }else{
                $sql2 = "INSERT INTO game_reviews (`game_id`, `edition_id`, `user_id`, `stars`, `like_game`, `review`) VALUES ('$profile_id', '0', '$user_id', '0', '0', '')";
                $result2 = mysqli_query($link, $sql2);
                if(!$result2){
                    echo '<div class="alert alert-danger">Error inserting user details into database</div>';
                }
                $sql3 = "SELECT * FROM game_reviews WHERE game_id='$game_id' AND user_id='$profile_id' AND edition_id='0'";
                $result3 = mysqli_query($link, $sql3);
                if(mysqli_num_rows($result3)>0){
                    $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
                    $likeStatus = $row3['like_game'];
                }
            }
        }

            echo "
        <div class='friendContainer col-xs-6 col-sm-4 col-md-3'>
            <a href='gameprofile.php?game_name=$username'>
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
                    if($likeStatus == 1){
                        echo "<button type='button' id='$profile_id' class='btn btn-sm btn-danger unFfriend'>Unlike?</button>";
                    }else{
                        echo "<button type='button' id='$profile_id' class='btn btn-lg btnColor friendBtn pull-right' data-toggle='modal' data-target='#sendFriendRequestModal' data-user_id='$profile_id'>Like</button>";
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

$sql = "SELECT * FROM game_editions WHERE edition_name LIKE '%$data%'";
$result = mysqli_query($link, $sql);
if($result){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $username = $row['edition_name'];
            $profile_id = $row['edition_id'];
            $game_id = row['game_id'];
            $picture = $row['profilepicture'];
            
        if(!empty($user_id) && $user_id != 0 && $user_id != NULL){
            if($profile_id != 0 && $profile_id != NULL){
                //Get Friend Status and other stats
                $sql1 = "SELECT * FROM game_reviews WHERE user_id='$user_id' AND edition_id='$profile_id' LIMIT 1";
                $result1 = mysqli_query($link, $sql1);
                if(mysqli_num_rows($result1)>0){
                    $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
                    $likeStatus = $row1['like_game'];
                }
            }else{
                $sql2 = "INSERT INTO game_reviews (`game_id`, `edition_id`, `user_id`, `stars`, `like_game`, `review`) VALUES ('$game_id', '$profile_id', '$user_id', '0', '0', '')";
                $result2 = mysqli_query($link, $sql2);
                if(!$result2){
                    echo '<div class="alert alert-danger">Error inserting user details into database</div>';
                }
                $sql3 = "SELECT * FROM game_reviews WHERE game_id='$game_id' AND edition_id='$profile_id'";
                $result3 = mysqli_query($link, $sql3);
                if(mysqli_num_rows($result3)>0){
                    $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
                    $likeStatus = $row3['like_game'];
                }
            }
        }

            echo "
        <div class='friendContainer col-xs-6 col-sm-4 col-md-3'>
            <a href='editionpage.php?edition_id=$profile_id'>
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
                    if($likeStatus == 1){
                        echo "<button type='button' id='$profile_id' class='btn btn-sm btn-danger unFfriend'>Unlike?</button>";
                    }else{
                        echo "<button type='button' id='$profile_id' class='btn btn-lg btnColor friendBtn pull-right' data-toggle='modal' data-target='#sendFriendRequestModal' data-user_id='$profile_id'>Like</button>";
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