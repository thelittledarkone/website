<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

//Get user id
$user_id = $_SESSION['user_id'];
$game_id = $_SESSION['game_id'];
$edition_id = $_SESSION['edition_id'];

//Get username and email
$sql0 = "SELECT * FROM games WHERE game_id='$game_id' LIMIT 1";
$result0 = mysqli_query($link, $sql0);
if(mysqli_num_rows($result0)>0){
    $row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC);
    $game_name = $row0['game_name'];
    $companyname = $row0['company_name'];
    $parentprofilepicture = $row0['profilepicture'];
    
}else{
    echo '<div class="alert alert-danger">There was an error retrieving the username and email from the database</div>';
}

//Get username and email
$sql = "SELECT * FROM game_editions WHERE edition_id='$edition_id' AND game_id='$game_id' LIMIT 1";
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $added_by = $row['added_by'];
    $editionname = $row['edition_name'];
    $creatorname = $row['creator_name'];
    $illustratorname = $row['illustrator_name'];
    $noplayers = $row['no_players'];
    $playtime = $row['play_time'];
    $agerating = $row['age_rating'];
    $genre = $row['genre'];
    $game_type = $row['game_type'];
    $board_type = $row['board_type'];
    $synopsis = $row['synopsis'];
    $profilepicture = $row['profilepicture'];
    
}else{
    echo '<div class="alert alert-danger">There was an error retrieving the username and email from the database</div>';
}

$synopsisToDisplay = nl2br(htmlentities($synopsis, ENT_QUOTES, 'UTF-8'));

if(game_id != '0' && $game_id != NULL && isset($_SESSION["user_id"])){
    //Get Reviews
    $sql1 = "SELECT * FROM game_reviews WHERE game_id='$game_id' AND user_id='$user_id' AND edition_id='$edition_id'";
    $result1 = mysqli_query($link, $sql1);
    if(mysqli_num_rows($result1)>0){
        $row1 = mysqli_fetch_array($result1, MYSQLI_ASSOC);
        $likeStatus = $row1['like_game'];
        $review = $row1['review'];
        
        $starsStatus = $row1['stars'];
        
        if(is_numeric($starsStatus) && floor($starsStatus) == $starsStatus){
            $mystar = str_repeat("<i class='fa fa-star'></i>", $starsStatus);
        }else{
            $starsStatus = floor($starsStatus);
            $mystar = str_repeat("<i class='fa fa-star'></i>", $starsStatus);
            $mystar .= "<i class='fa fa-star-half-full'></i>";
        }  

    }else{
            $sql2 = "INSERT INTO game_reviews (`game_id`, `edition_id`, `user_id`, `stars`, `like_game`, `review`) VALUES ('$game_id', '$edition_id', '$user_id', '0', '0', '')";
            $result2 = mysqli_query($link, $sql2);
            if(!$result2){
                echo '<div class="alert alert-danger">Error inserting user details into database</div>';
            }
            $sql3 = "SELECT * FROM game_reviews WHERE game_id='$game_id' AND user_id='$user_id' AND edition_id='$edition_id'";
            $result3 = mysqli_query($link, $sql3);
            if(mysqli_num_rows($result3)>0){
                $row3 = mysqli_fetch_array($result3, MYSQLI_ASSOC);
                $likeStatus = $row3['like_game'];
                $starsStatus = $row3['stars'];
                $review = $row3['review'];
            }
    }
}

$sql4 = "SELECT COUNT(*) AS count FROM game_reviews WHERE like_game='1' AND edition_id='$edition_id'";
$result4 = mysqli_query($link, $sql4);
$likeCount = mysqli_fetch_assoc($result4)['count'];

$sql5 = "SELECT AVG(stars) AS average FROM game_reviews WHERE edition_id='$edition_id' AND stars != '0'";
$result5 = mysqli_query($link, $sql5);
$starsAverage = mysqli_fetch_assoc($result5)['average'];
if(is_numeric($starsAverage) && floor($starsAverage) == $starsAverage){
    $star = str_repeat("<i class='fa fa-star'></i>", $starsAverage);
}else{
    $starsAverage = floor($starsAverage);
    $star = str_repeat("<i class='fa fa-star'></i>", $starsAverage);
    $star .= "<i class='fa fa-star-half-full'></i>";
}  

if(isset($_SESSION["user_id"])){
    if($starsStatus == '0'){
        echo "<button type='button' id='review' class='btn btn-lg btnColor settingsBtn pull-right' data-toggle='modal' data-target='#reviewModal'>Review</button>";
    }else{
        echo "<button type='button' id='editreview' class='btn btn-lg btnColor settingsBtn pull-right' data-toggle='modal' data-target='#reviewModal'>Change</button>";
    }
            
    if($added_by == $user_id || $_SESSION['level'] == '9'){
        echo "<button type='button' id='editDetails' class='btn btn-lg btnColor settingsBtn pull-right' data-toggle='modal' data-target='#updateDetailsModal'>Update Edition</button>";
    }
}
                          
echo "
    <h2>$game_name: $editionname</h2>
                    <div class='row'>
                        <div class='col-xs-5' data-toggle='modal' data-target='#updatePicture' id='pictureCell'>";
                            if(empty($profilepicture)){
                                echo "<img src='$parentprofilepicture' class='gamePageProfilePic'>";
                            }else{
                                echo "<img src='$profilepicture' class='gamePageProfilePic'>";
                            }
                    echo "</div>
                        <div class='col-xs-7'>
                            <table class='table table-condensed statsTable dTable'>
                                <tr>
                                    <td>Game:</td>
                                    <td class='borderedRight'>$game_name</td>
                                    <td>Edition:</td>
                                    <td class='borderedRight'>$editionname</td>
                                    <td>Company:</td>
                                    <td>$companyname</td>
                                </tr>
                            </table>
                            <table class='table table-condensed statsTable dTable'>
                                <tr>
                                    <td>Creator:</td>
                                    <td class='borderedRight'>$creatorname</td>
                                    <td>Illustrators:</td>
                                    <td>$illustratorname</td>
                                </tr>
                            </table>
                            <table class='table table-condensed statsTable dTable'>
                                <tr>
                                    <td>Genre:</td>
                                    <td class='borderedRight'>$genre</td>
                                    <td>Game Type:</td>
                                    <td class='borderedRight'>$game_type</td>
                                    <td>Board Type:</td>
                                    <td>$board_type</td>
                                    
                                </tr>
                                <tr>
                                    <td>Players:</td>
                                    <td class='borderedRight'>$noplayers</td>
                                    <td>Age Rating:</td>
                                    <td class='borderedRight'>$agerating</td>
                                    <td>Playtime:</td>
                                    <td>$playtime</td>
                                </tr>
                            </table>
                            
                            <table class='table statsTable dpTable'>
                                <tr>
                                    <td>Name:</td>
                                    <td>$game_name</td>
                                 </tr>
                                 <tr>
                                    <td>Edition:</td>
                                    <td>$editionname</td>
                                 </tr>
                                <tr>
                                    <td>Company:</td>
                                    <td>$companyname</td>
                                </tr>
                                <tr>
                                    <td>Creator:</td>
                                    <td>$creatorname</td>
                                 </tr>
                            </table>
                            <table class='table table-condensed statsTable pTable'>
                                <tr>
                                    <td>Name:</td>
                                    <td>$game_name</td>
                                 </tr>
                                 <tr>
                                    <td>Edition:</td>
                                    <td>$editionname</td>
                                 </tr>
                                <tr>
                                    <td>Company:</td>
                                    <td>$companyname</td>
                                </tr>
                                
                            </table>
                             
                        </div>
                    </div>
                    <table class='table table-condensed statsTable dTable'>
                                <tr>
                                    <td class='col-xs-2 centredCell'>Avg Rating:</td>
                                    <td class='col-xs-6 centredCell'>$star</td>
                                    <td class='col-xs-2 centredCell'>$likeCount Likes</td>
                                    ";
                            if(isset($_SESSION["user_id"])){
                                    if($likeStatus == '0'){
                                        echo"
                                        <td class='col-xs-2 centredCell'>
                                            <button type='button' id='$edition_id' class='btn btn-lg btnColor followBtn pull-right like'>Like</button>
                                        </td>";
                                     }else{
                                        echo"
                                        <td class='col-xs-2 centredCell'>
                                            <button type='button' id='$edition_id' class='btn btn-sm btn-danger friendBtn pull-right unlike'>Unlike?</button>
                                        </td>";
                                    }
                            }

                                echo "
                                </tr>
                            </table>
                    <table class='table table-fixed statsTable dpTable'>
                        <tr>
                            <td>Illustrators:</td>
                            <td>$illustratorname</td>
                        </tr>
                    </table>
                    <table class='table table-fixed statsTable dpTable'>
                        <tr>
                            <td class='col-xs-2'>Genre:</td>
                            <td class='col-xs-2 borderedRight'>$genre</td>
                            <td class='col-xs-2'>Game Type:</td>
                            <td class='col-xs-2 borderedRight'>$game_type</td>
                            <td class='col-xs-2'>Board Type:</td>
                            <td class='col-xs-2'>$board_type</td>
                            
                        </tr>
                        <tr>
                            <td>Players:</td>
                            <td class='borderedRight'>$noplayers</td>
                            <td>Age Rating:</td>
                            <td class='borderedRight'>$agerating</td>
                            <td>Playtime:</td>
                            <td>$playtime</td>
                        </tr>
                    </table>
                    <table class='table table-fixed statsTable dpTable'>
                        <tr>
                            <td class='col-xs-4 centredCell'>Avg Rating:</td>
                            <td class='col-xs-6 centredCell'>$star</td>
                            <td class='col-xs-3 centredCell'>$likeCount Likes</td>
                            ";
                        if(isset($_SESSION["user_id"])){
                            if($likeStatus == '0'){
                                echo"
                                <td class='col-xs-3 centredCell'>
                                    <button type='button' id='$edition_id' class='btn btn-lg btnColor followBtn pull-right like'>Like</button>
                                </td>";
                             }else{
                                echo"
                                <td class='col-xs-3 centredCell'>
                                    <button type='button' id='$edition_id' class='btn btn-sm btn-danger friendBtn pull-right unlike'>Unlike?</button>
                                </td>";
                            }
                        }
                        echo "
                        </tr>
                    </table>
                    <table class='table table-condensed statsTable pTable'>
                        <tr>
                            <td>Creator:</td>
                            <td>$creatorname</td>
                        </tr>
                        <tr>
                            <td>Illustrators:</td>
                            <td>$illustratorname</td>
                        </tr>
                    </table>
                    <table class='table table-condensed statsTable pTable'>
                        <tr>
                            <td>Genre:</td>
                            <td>$genre</td>
                            <td>Age Rating:</td>
                            <td>$agerating</td>
                        </tr>
                        <tr>
                            <td>Game Type:</td>
                            <td>$game_type</td>
                            <td>Board Type:</td>
                            <td>$board_type</td>
                        </tr>
                        <tr>
                            <td>Players:</td>
                            <td>$noplayers</td>
                            <td>Playtime:</td>
                            <td>$playtime</td>
                        </tr>
                        <tr>
                            <td class='centredCell'>Avg Rating:</td>
                            <td class='centredCell'>$star</td>
                            <td class='centredCell'>Likes:</td>
                            <td class='centredCell'>$likeCount</td>
                        </tr>
                    </table>
                    ";
                        if(isset($_SESSION["user_id"])){
                            if($likeStatus == '0'){
                                echo"
                                <button type='button' id='$edition_id' class='btn btn-lg btnColor pTable followBtn pull-right like'>Like</button>
                                ";
                             }else{
                                echo"
                                <button type='button' id='$edition_id' class='btn btn-sm btn-danger pTable friendBtn pull-right unlike'>Unlike?</button>
                                ";
                            }
                        }
                            
                        echo "
                    <h3>About $game_name: $editionname:</h3>
                    <div class='individualExpanderContainer aboutgame'>
                        <div class='expandable__btn__wrapper' data-js-expander>
                            <button class='btn expandable__btn'></button>
                        </div>
                        <div class='expandable profileAboutContainer' data-js-expandable>
                            <div class='innerContent' data-js-expandable-inner>$synopsisToDisplay</div>
                        </div>
                    </div>";

        if(isset($_SESSION["user_id"])){
            
                    echo "                    
                    <h3 class='ratingTitle'>Your Rating: $mystar</h3>
                    <h3 class='ratingTitle'>Your Review:</h3>
                        <div class='expandable__btn__wrapper' data-js-expander>
                            <button class='btn expandable__btn'></button>
                        </div>
                        <div class='expandable profileAboutContainer' data-js-expandable>
                            <div class='innerContent' data-js-expandable-inner>$review</div>
                        </div>
                                
                    <div id='errorMessages'></div>
";
            }
?>