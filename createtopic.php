<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

//<!--    Define error messages-->
$missingTitle = '<p><strong>Please enter a Topic Title!</strong></p>';
$missingDescription = '<p><strong>Please enter the Topic Description!</strong></p>';

//<!--    Store errors in error variable-->
//Title
if(empty($_POST["topicname"])){
    $errors .= $missingTitle;
}else{
    $topicname = filter_var($_POST["topicname"], FILTER_SANITIZE_STRING);
}
//Description
if(empty($_POST["firstPost"])){
    $errors .= $missingDescription;
}else{
    $topdes = $_POST["firstPost"];
    $topdes = str_replace("'", "’", "$topdes");
    $topdes = str_replace('"', '“', "$topdes");
    $topdes = filter_var($topdes, FILTER_SANITIZE_STRING);
}


//<!--    If there are any error, print error message-->
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
    echo $resultMessage;
    exit;
}

//<!--No errors-->
//<!--    Prepare variables for the queries-->
$topicname = mysqli_real_escape_string($link, $topicname);
$topdes = mysqli_real_escape_string($link, $topdes);
$time = date('Y-m-d H:i:s', time());
$topcat = $_SESSION["cat"];
$user_id = $_SESSION["user_id"];

//<!--            Insert user details and activation code in the users table-->
$sql = "INSERT INTO forum_topics (`topic_subject`, `topic_date`, `topic_cat`, `topic_by`) VALUES ('$topicname', '$time', '$topcat', '$user_id')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error inserting topic details into database</div>';
}else{
    echo '<div class="alert alert-success">Topic Added to Database</div>';
    //<!--            Insert user details and activation code in the users table-->
    $topicid = mysqli_insert_id($link);

    $sql = "INSERT INTO forum_posts (`post_content`, `post_date`, `post_topic`, `post_by`) VALUES ('$topdes', '$time', '$topicid', '$user_id')";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">Error inserting initial post details into database</div>';
    }else{
        echo '<div class="alert alert-success">Initial Post Added to Database</div>';
    }
}


?>