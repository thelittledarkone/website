<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];
$game_id = $_SESSION['game_id'];
$edition_id = $_SESSION['edition_id'];

if ($edition_id != 0 && $edition_id != NULL){
    $sql = "SELECT * FROM game_reviews WHERE user_id != '$user_id' AND edition_id='$edition_id' ORDER BY date DESC LIMIT 20";
}else{
    $sql = "SELECT * FROM game_reviews WHERE user_id != '$user_id' AND game_id='$game_id' ORDER BY date DESC LIMIT 20";
}

$result = mysqli_query($link, $sql);

if($result){
    if(mysqli_num_rows($result)>0){
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
            $stars = $row['stars'];
            if($stars == '0'){
                continue;
            }
            
            if(is_numeric($stars) && floor($stars) == $stars){
                $mystar = str_repeat("<i class='fa fa-star'></i>", $stars);
            }else{
                $stars = floor($stars);
                $mystar = str_repeat("<i class='fa fa-star'></i>", $stars);
                $mystar .= "<i class='fa fa-star-half-full'></i>";
            }  
            
            $reviewer_id = $row['user_id'];
            
            $rawreview = $row['review'];
            $review = nl2br(htmlentities($rawreview, ENT_QUOTES, 'UTF-8'));
            
            $date = $row['date'];
            $dateadded = strtotime($date);
            $now = time();

            $diff = $now-$dateadded;

            if($diff > 59){
                $diffmins = floor($diff/60);
            }
            if($diff > 3599){
                $diffhours = floor($diff/3600);
            }
            if($diff > 86399){
                $diffdays = floor($diff/86400);
            }
            if($diff > 31535999){
                $diffyears = floor($diff/31536000);
                $diffdays = floor($diff/86400);
            }
                        
            //Run query to get sender details
            $sql1 = "SELECT * FROM users WHERE user_id='$reviewer_id' LIMIT 1";
            $result1 = mysqli_query($link, $sql1);
            if(!$result1){
                echo "ERROR: Unable to execute: $sql1. " . mysqli_error($link); exit;
            }
            $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
            
            $username = $row1['username'];
            $picture = $row1['profilepicture'];
            
            echo "
        <div class='allMessageResults'>  
          <div class='row mainMessage'>
              <div class='col-xs-4 senderContainer'>
                    <a href='profilepage.php?username=$username'>";
              if(empty($picture)){
                                echo "<img src='css/profilepics/angel.png' class='smProfilePic forumPic'>";
                            }else{
                                echo "<img src='$picture' class='smProfilePic forumPic'>";
                            }
                  echo "<h5>$username<br>";
                            if($diff > 31535999){
                                echo "$diffyears y $diffdays d ago";
                            }elseif($diff > 86399){
                                echo "$diffdays days ago";
                            }elseif($diff > 3599){
                                echo "$diffhours hours ago";
                            }elseif($diff > 59){
                                echo "$diffmins mins ago";
                            }else{
                                echo "$diff secs ago";
                            }
                                echo "</h5></a>
              </div>
              <div class='col-xs-8 detailsContainer'>
                   <table class='table table-condensed mainTable'>
                       <tr>
                           <td>Rating:</td>
                           <td><span>$mystar</span></td>
                       </tr>
                       <tr>
                           <td>Review:</td>
                           <td>
                                <div class='expandable__btn__wrapper sm_expandable__btn__wrapper'  data-js-expander>
                                    <button class='btn expandable__btn sm_expandable__btn'></button>
                                </div>
                                <div class='expandable' data-js-expandable>
                                    <div class='innerContent' data-js-expandable-inner>$review</div>
                                </div>
                            </td>
                       </tr>
                   </table>
               </div>
            </div>
        </div>
                ";
                
            
        }
    }else{
        echo "<div class='alert alert-warning'>There are no reviews yet!</div>";
    }
}

?>