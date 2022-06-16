<?php
session_start();
include('connection.php');

//<!--    Store it in a variable-->
$topID = $_SESSION['topic'];
$user_id = $_SESSION['user_id'];

//<!--    Prepare variables for query-->
$topID = mysqli_real_escape_string($link, $topID);

//<!--    Run query set activation field to activated for the provided email-->
$sql = "SELECT * FROM forum_topics WHERE topic_id='$topID'";
$result = mysqli_query($link, $sql);

//<!--    If query is successful, show success message and invite user to login-->
if(!$result)
{
    echo 'The topic could not be displayed, please try again later.' . mysqli_error();
}
else
{
    if(mysqli_num_rows($result) == 0)
    {
        echo 'This topic does not exist.';
    }
    else
    {
        //display category data
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            echo '<h2>' . $row['topic_subject'] . '</h2>';
        }
     
        //do a query for the posts
        $sql = "SELECT * FROM forum_posts LEFT JOIN users ON forum_posts.post_by = users.user_id WHERE forum_posts.post_topic = '$topID' ORDER BY forum_posts.post_date DESC";
        $result = mysqli_query($link, $sql);
         
        if(!$result)
        {
            echo 'The posts could not be displayed, please try again later.';
        }
        else
        {
            if(mysqli_num_rows($result) == 0)
            {
                echo 'There are no posts in this category yet.';
            }
            else
            {        
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
                {   
                    $rawpostcontent = $row['post_content'];
                    $postcontent = nl2br(htmlentities($rawpostcontent, ENT_QUOTES, 'UTF-8'));
                    
                    $picture = $row['profilepicture'];
                    $username = $row['username'];
                    $post_id = $row['post_id'];
                    
                    $timeadded = $row['post_date'];
                    $dateadded = strtotime($timeadded);
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
                    
                    if($row['user_id'] != $user_id){
                        echo "
                        <div class='row rowPC row-bordered-left'>
                            <div class='col-left poster-left'>";
                            if(empty($picture)){
                                echo "<img src='css/profilepics/angel.png' class='navProfilePic forumPic'>";
                            }else{
                                echo "<img src='$picture' class='navProfilePic forumPic'>";
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
                            echo "</h5>
                                </div>
                                <div class='col-left'>
                                     <div class='delete-post admin-only'>
                                        <button type='button' class='btn btn-lg btn-danger deleteforumelementbtn'><strong>&#8722;</strong></button>
                                    </div>
                                    <div id='$post_id'>
                                        <div class='expandable__btn__wrapper' data-js-expander>
                                            <button class='btn expandable__btn'></button>
                                        </div>
                                        <div class='expandable replyContentContainer' data-js-expandable>
                                            <div class='innerContent' data-js-expandable-inner>$postcontent</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                ";
                    }else{
                        echo "
                        <div class='row rowPC row-bordered-right'>
                            <div class='col-right'>
                                     <div class='delete-post admin-only'>
                                        <button type='button' class='btn btn-lg btn-danger deleteforumelementbtn'><strong>&#8722;</strong></button>
                                    </div>
                                    <div id='$post_id'>
                                        <div class='expandable__btn__wrapper' data-js-expander>
                                            <button class='btn expandable__btn'></button>
                                        </div>
                                        <div class='expandable replyContentContainer' data-js-expandable>
                                            <div class='innerContent' data-js-expandable-inner>$postcontent</div>
                                        </div>
                                    </div>
                                </div>
                                <div class='col-right poster-right'>
                                    <h5>$username<br>";
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
                            echo "</h5>
                                ";
                            if(empty($picture)){
                                echo "<img src='css/profilepics/angel.png' class='navProfilePic forumPic'>";
                            }else{
                                echo "<img src='$picture' class='navProfilePic forumPic'>";
                            }
                        echo "</div>
                        </div>";
                    }
                    
                    if($row['user_id'] != $user_id){
                        echo "
                        <div class='row rowPhone bordered-left'>
                            <div class='headPost hpLeft col-left'>";
                            if(empty($picture)){
                                echo "<img src='css/profilepics/angel.png' class='navProfilePic forumPic'>";
                            }else{
                                echo "<img src='$picture' class='navProfilePic forumPic'>";
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
                            echo "</h5>
                                </div>
                                <div class='body-left'>
                                     <div class='delete-post admin-only'>
                                        <button type='button' class='btn btn-lg btn-danger deleteforumelementbtn'><strong>&#8722;</strong></button>
                                    </div>
                                    <div id='$post_id'>
                                        <div class='expandable__btn__wrapper' data-js-expander>
                                            <button class='btn expandable__btn'></button>
                                        </div>
                                        <div class='expandable replyContentContainer' data-js-expandable>
                                            <div class='innerContent' data-js-expandable-inner>$postcontent</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                ";
                    }else{
                        echo "
                        <div class='rowPhone bordered-right'>
                            <div class='headPost hpRight col-right'>
                                <h5>$username<br>";
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
                            echo "</h5>
                                ";
                            if(empty($picture)){
                                echo "<img src='css/profilepics/angel.png' class='navProfilePic forumPic'>";
                            }else{
                                echo "<img src='$picture' class='navProfilePic forumPic'>";
                            }
                        echo "
                            </div>
                            <div class='body-right'>
                                     <div class='delete-post admin-only'>
                                        <button type='button' class='btn btn-lg btn-danger deleteforumelementbtn'><strong>&#8722;</strong></button>
                                    </div>
                                    <div id='$post_id'>
                                        <div class='expandable__btn__wrapper' data-js-expander>
                                            <button class='btn expandable__btn'></button>
                                        </div>
                                        <div class='expandable replyContentContainer' data-js-expandable>
                                            <div class='innerContent' data-js-expandable-inner>$postcontent</div>
                                        </div>
                                    </div>
                                </div>
                                
                        </div>";
                    }
                        
                }
            }
        }
    }
}
?>            