<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

//Get user id
$user_id = $_SESSION['user_id'];
$profile_name = $_SESSION["profile_name"];

//Get username and email
$sql = "SELECT * FROM users WHERE username='$profile_name' LIMIT 1";
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $profile_id = $row['user_id'];
    $profileusername = $row['username'];
    $profileFirstname = $row['first_name'];
    
    $rawprofilemoreinfo = $row['moreinformation'];
    $profilemoreinfo = nl2br(htmlentities($rawprofilemoreinfo, ENT_QUOTES, 'UTF-8'));
    
    $profilepicture = $row['profilepicture'];
    
    if($_SESSION['user_id'] && $row['phone_privacy'] == 'p'){
        $profilephone = $row['phonenumber'];
    }elseif($_SESSION['user_id'] && $row['phone_privacy'] == 'f'){
        $profilephone = "Only available to friends of $profileusername!";
    }else{
        $profilephone = "<i>Private and Not Available to anyone<i>";
    }
    if($_SESSION['user_id'] && $row['email_privacy'] == 'p'){
        $profileemail = $row['email'];
    }elseif($_SESSION['user_id'] && $row['email_privacy'] == 'f'){
        $profileemail = "Only available to friends of $profileusername!";
    }else{
        $profileemail = "<i>Private and Not Available to anyone<i>";
    }
    if($_SESSION['user_id'] && $row['address_privacy'] == 'p'){
        $profileaddress = $row['address'];
        $profileaddress2 = $row['address2'];
        $profiledistrict = $row['district'];
        $profilecity = $row['city'];
        $profilepostcode = $row['postal_code'];
    }elseif($_SESSION['user_id'] && $row['address_privacy'] == 'f'){
        $profileaddress = "Only available to friends of $profileusername!";
    }else{
        $profileaddress = "<i>Private and Not Available to anyone<i>";
    }
    if($_SESSION['user_id'] && $row['city_privacy'] == 'p' && $row['address_privacy'] != 'p'){
        $profilecity = $row['city'];
    }
    
}else{
    echo '<div class="alert alert-danger">There was an error retrieving the username and email from the database</div>';
}

if($profile_id != 0 && $profile_id != $user_id && isset($_SESSION["user_id"])){
    //Get Friend Status and other stats
    $sql1 = "SELECT * FROM user_links WHERE (user1_id='$profile_id' AND user2_id='$user_id') OR (user2_id='$profile_id' AND user1_id='$user_id') LIMIT 1";
    $result1 = mysqli_query($link, $sql1);
    if(mysqli_num_rows($result1)>0){
        $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
        $friendStatus = $row1['friend_status'];
        if($row1['user1_id'] == $profile_id){
            $hostVoteStatus = $row1['user1_host_vote'];
            $playerVoteStatus = $row1['user1_player_vote'];
            $followingUser = $row1['user2_follow_user1'];
        }else{
            $hostVoteStatus = $row1['user2_host_vote'];
            $playerVoteStatus = $row1['user2_player_vote'];
            $followingUser = $row1['user1_follow_user2'];
        }
    //    Mutual Friend Counter
        $sql11 = "SELECT * FROM user_links WHERE (user1_id='$profile_id' AND friend_status='1') OR (user2_id='$profile_id' AND friend_status='1')";
        $result11 = mysqli_query($link, $sql11);
        $mfcount = 0;
        if($result11){
            if(mysqli_num_rows($result11)>0){
                while($row11 = mysqli_fetch_array($result11, MYSQLI_ASSOC)){
                    if(row11['user1_id'] == $profile_id){
                        $mfuser2 = row11['user2_id'];
                        $sql12 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_id='$user_id' AND user2_id='$mfuser2' AND friend_status='1') OR (user2_id='$user_id' AND user1_id='$mfuser2' AND friend_status='1')";
                        $result12 = mysqli_query($link, $sql12);
                        $count12 = mysqli_fetch_assoc($result12)['count'];
                        if($count12>0){
                            $mfcount++;
                        }
                    }else{
                        $mfuser1 = row11['user1_id'];
                        $sql12 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_id='$user_id' AND user2_id='$mfuser1' AND friend_status='1') OR (user2_id='$user_id' AND user1_id='$mfuser1' AND friend_status='1')";
                        $result12 = mysqli_query($link, $sql12);
                        $count12 = mysqli_fetch_assoc($result12)['count'];
                        if($count12>0){
                            $mfcount++;
                        }
                    }
                }
            }
        }

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
                if($row3['user1_id'] == $profile_id){
                    $hostVoteStatus = $row3['user1_host_vote'];
                    $playerVoteStatus = $row3['user1_player_vote'];
                    $followingUser = $row3['user2_follow_user1'];
                }else{
                    $hostVoteStatus = $row3['user2_host_vote'];
                    $playerVoteStatus = $row3['user2_player_vote'];
                    $followingUser = $row3['user1_follow_user2'];
                }
            }
    }
}

$sql4 = "SELECT COUNT(*) AS count FROM user_links WHERE friend_status='1' AND (user1_id='$profile_id' OR user2_id='$profile_id')";
$result4 = mysqli_query($link, $sql4);
$friendCount = mysqli_fetch_assoc($result4)['count'];

$sql5 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_follow_user2='1' AND user1_id='$profile_id') OR (user2_follow_user1='1' AND user2_id='$profile_id')";
$result5 = mysqli_query($link, $sql5);
$followingCount = mysqli_fetch_assoc($result5)['count'];

$sql6 = "SELECT COUNT(*) AS count FROM user_links WHERE (user2_follow_user1='1' AND user1_id='$profile_id') OR (user1_follow_user2='1' AND user2_id='$profile_id')";
$result6 = mysqli_query($link, $sql6);
$followerCount = mysqli_fetch_assoc($result6)['count'];

$sql7 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_host_vote='2' AND user1_id='$profile_id') OR (user2_host_vote='2' AND user2_id='$profile_id')";
$result7 = mysqli_query($link, $sql7);
$upvoteHCount = mysqli_fetch_assoc($result7)['count'];

$sql8 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_host_vote='1' AND user1_id='$profile_id') OR (user2_host_vote='1' AND user2_id='$profile_id')";
$result8 = mysqli_query($link, $sql8);
$downvoteHCount = mysqli_fetch_assoc($result8)['count'];

$sql9 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_player_vote='2' AND user1_id='$profile_id') OR (user2_player_vote='2' AND user2_id='$profile_id')";
$result9 = mysqli_query($link, $sql9);
$upvotePCount = mysqli_fetch_assoc($result9)['count'];

$sql10 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_player_vote='1' AND user1_id='$profile_id') OR (user2_player_vote='1' AND user2_id='$profile_id')";
$result10 = mysqli_query($link, $sql10);
$downvotePCount = mysqli_fetch_assoc($result10)['count'];

$totalHRep = $upvoteHCount - $downvoteHCount;
$totalPRep = $upvotePCount - $downvotePCount;

echo "
    <h2>$profileusername</h2>
                    <div class='row'>
                        <div class='col-xs-4'>";
                            if(empty($profilepicture)){
                                echo "<img src='css/profilepics/angel.png' class='profilePageProfilePic'>";
                            }else{
                                echo "<img src='$profilepicture' class='profilePageProfilePic'>";
                            }
                    echo "</div>
                        <div class='col-xs-8'>
                            <table class='table table-condensed statsTable'>
                                <tr>
                                    <td class='centredCell'>Host Rep</td>";
                                    if($totalHRep>0){
                                        echo "
                                            <td class='centredCell grn'>Total:$totalHRep</td>
                                        ";
                                    }else{
                                         echo "
                                            <td class='centredCell red'>Total:$totalHRep</td>
                                        ";
                                    }
                                echo "<td class='centredCell grn'>&#8593;:$upvoteHCount</td>
                                    <td class='centredCell red'>&#8595;:$downvoteHCount</td>
                                    <td class='centredCell'>";
                                if($profile_id != $user_id && isset($_SESSION["user_id"])){
                                    if($hostVoteStatus == '0'){
                                        echo "<button type='button' id='$profile_id' class='btn btn-lg btn-danger pull-right voteBtn hostDownvote'>&#8681;</button>
                                        <button type='button' id='$profile_id' class='btn btn-lg btn-success pull-right voteBtn hostUpvote'>&#8679;</button>";
                                    }elseif($hostVoteStatus == '1'){
                                        echo "<button type='button' id='$profile_id' class='btn btn-lg btn-danger pull-right btnHighlightedR'>&#8681;</button>
                                        <button type='button' id='$profile_id' class='btn btn-lg btn-success pull-right btnDulledG hostUpvote'>&#8679;</button>";
                                    }else{
                                        echo "<button type='button' id='$profile_id' class='btn btn-lg btn-danger pull-right btnDulledR hostDownvote'>&#8681;</button>
                                        <button type='button' id='$profile_id' class='btn btn-lg btn-success pull-right btnHighlightedG'>&#8679;</button>";
                                    }
                                }
                                        
                                echo "
                                    </td> 
                                    
                                </tr>
                                <tr>
                                    <td class='centredCell'>Player Rep</td>";
                                    if($totalPRep>0){
                                        echo "
                                            <td class='centredCell grn'>Total:$totalPRep</td>
                                        ";
                                    }else{
                                         echo "
                                            <td class='centredCell red'>Total:$totalPRep</td>
                                        ";
                                    }
                                echo "
                                    <td class='centredCell grn'>&#8593;:$upvotePCount</td>
                                    <td class='centredCell red'>&#8595;:$downvotePCount</td>
                                    <td class='centredCell'>";
                                if($profile_id != $user_id && isset($_SESSION["user_id"])){
                                    if($playerVoteStatus == '0'){
                                        echo "<button type='button' id='$profile_id' class='btn btn-lg btn-danger pull-right voteBtn playerDownvote'>&#8681;</button>
                                        <button type='button' id='$profile_id' class='btn btn-lg btn-success pull-right voteBtn playerUpvote'>&#8679;</button>";
                                    }elseif($playerVoteStatus == '1'){
                                        echo "<button type='button' id='$profile_id' class='btn btn-lg btn-danger pull-right btnHighlightedR'>&#8681;</button>
                                        <button type='button' id='$profile_id' class='btn btn-lg btn-success pull-right btnDulledG playerUpvote'>&#8679;</button>";
                                    }else{
                                        echo "<button type='button' id='$profile_id' class='btn btn-lg btn-danger pull-right btnDulledR playerDownvote'>&#8681;</button>
                                        <button type='button' id='$profile_id' class='btn btn-lg btn-success pull-right btnHighlightedG'>&#8679;</button>";
                                    }
                                }
                                    
                                        
                                echo "</td>
                                    
                                </tr>
                            </table>
                            <table class='table table-condensed statsTable fTable'>
                                <tr>
                                    <td class='centredCell'>$friendCount</td>
                                    <td class='centredCell'>Friends</td>
                                    ";
                                if($profile_id != $user_id && isset($_SESSION["user_id"])){
                                    echo "<td class='centredCell'>$mfcount</td>
                                    <td class='centredCell'>Mutual Friends</td>
                                    ";
                                    if($friendStatus == '0'){
                                        echo"
                                        <td class='centredCell'>
                                            <button type='button' id='friendRequest' class='btn btn-lg btnColor friendBtn pull-right' data-toggle='modal' data-target='#sendFriendRequestModal' data-user_id='$profile_id'>Send Friend Request</button>
                                        </td>";
                                     }else{
                                        echo"
                                        <td class='centredCell'>
                                            <button type='button' id='$profile_id' class='btn btn-sm btn-danger pull-right unfriend'>Unfriend?</button>
                                        </td>";
                                    }
                                }else{
                                    echo "<td class='centredCell'></td>
                                    <td class='centredCell'></td>
                                    ";
                                }
                                    
                                        
                                echo "
                                    
                                </tr>
                                <tr>
                                    <td class='centredCell'>$followerCount</td>
                                    <td class='centredCell'>Followers</td>
                                    <td class='centredCell'>$followingCount</td>
                                    <td class='centredCell'>Following</td>
                                    ";
                                if($profile_id != $user_id && isset($_SESSION["user_id"])){
                                    if($followingUser == '0'){
                                        echo"
                                        <td class='centredCell'>
                                            <button type='button' id='$profile_id' class='btn btn-lg btnColor followBtn pull-right follow'>Follow</button>
                                        </td>";
                                     }else{
                                        echo"
                                        <td class='centredCell'>
                                            <button type='button' id='$profile_id' class='btn btn-sm btn-danger friendBtn pull-right unfollow'>Stop Following?</button>
                                        </td>";
                                    }
                                }
                                    
                                        
                                echo "
                
                                </tr>
                            </table>
                            <div id='errorMessages'></div>
                        </div>
                        <table class='table table-condensed statsTable fTablePhone'>
                                <tr>
                                    <td class='centredCell'>$friendCount</td>
                                    <td class='centredCell'>Friends</td>";
                                    
                                if($profile_id != $user_id && isset($_SESSION["user_id"])){
                                    echo "<td class='centredCell'>$mfcount</td>
                                    <td class='centredCell'>Mutual Friends</td>
                                    ";
                                    if($friendStatus == '0'){
                                        echo"
                                        <td class='centredCell'>
                                            <button type='button' id='friendRequest' class='btn btn-lg btnColor friendBtn pull-right' data-toggle='modal' data-target='#sendFriendRequestModal' data-user_id='$profile_id'>Send Friend Request</button>
                                        </td>";
                                     }else{
                                        echo"
                                        <td class='centredCell'>
                                            <button type='button' id='$profile_id' class='btn btn-sm btn-danger pull-right unfriend'>Unfriend?</button>
                                        </td>";
                                    }
                                }else{
                                    echo "<td class='centredCell'></td>
                                    <td class='centredCell'></td>
                                    ";
                                }
                                    
                                        
                                echo "
                                    
                                </tr>
                                <tr>
                                    <td class='centredCell'>$followerCount</td>
                                    <td class='centredCell'>Followers</td>
                                    <td class='centredCell'>$followingCount</td>
                                    <td class='centredCell'>Following</td>
                                    ";
                                if($profile_id != $user_id && isset($_SESSION["user_id"])){
                                    if($followingUser == '0'){
                                        echo"
                                        <td class='centredCell'>
                                            <button type='button' id='$profile_id' class='btn btn-lg btnColor followBtn pull-right follow'>Follow</button>
                                        </td>";
                                     }else{
                                        echo"
                                        <td class='centredCell'>
                                            <button type='button' id='$profile_id' class='btn btn-sm btn-danger friendBtn pull-right unfollow'>Stop Following?</button>
                                        </td>";
                                    }
                                }
                                    
                                        
                                echo "
                
                                </tr>
                            </table>
                    </div>
                    
                    <h3>About $profileusername:</h3>
                    <div class='individualExpanderContainer'>
                        <div class='expandable__btn__wrapper' data-js-expander>
                            <button class='btn expandable__btn'></button>
                        </div>
                        <div class='expandable profileAboutContainer' data-js-expandable>
                            <div class='innerContent' data-js-expandable-inner>$profilemoreinfo</div>
                        </div>
                    </div>
                    <h3>$profileusername's Details:</h3>
                    <div class='individualExpanderContainer'>
                        <div class='expandable__btn__wrapper' data-js-expander>
                            <button class='btn expandable__btn'></button>
                        </div>
                        <div class='expandable profileDetailsContainer' data-js-expandable>
                            <div class='innerContent' data-js-expandable-inner>
                                <table class='table table-condensed detailsTable'>
                                    <tr>
                                        <td>Name</td>
                                        <td>$profileFirstname</td>
                                    </tr>
                                    <tr>
                                        <td>&#9993;</td>
                                        <td>$profileemail</td>
                                    </tr>
                                    <tr>
                                        <td>&#9742;</td>
                                        <td>$profilephone</td>
                                    </tr>
                                    <tr>
                                        <td>&#127968;</td>
                                        <td>";
                                            if($row['address_privacy'] == 'p'){
                                                echo "$profileaddress <br> $profileaddress2 <br> $profiledistrict <br> $profilecity <br> $profilepostcode";
                                            }elseif($row['city_privacy'] == 'p' && $row['address_privacy'] != 'p'){
                                                echo $profilecity;
                                            }else{
                                                echo $profileaddress;
                                            }
                                    echo "</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

";
?>