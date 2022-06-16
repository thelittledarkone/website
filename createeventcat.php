<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

//get event
$event_id = $_SESSION["event_id"];


//<!--Check user inputs-->

//<!--    Define error messages-->
$missingTitle = '<p><strong>Please enter a Category Title!</strong></p>';
$missingDescription = '<p><strong>Please enter the Categories Description!</strong></p>';

//<!--    Store errors in error variable-->
//Title
if(empty($_POST["catName"])){
    $errors .= $missingTitle;
}else{
    $catname = filter_var($_POST["catName"], FILTER_SANITIZE_STRING);
}
//Description
if(empty($_POST["catDescription"])){
    $errors .= $missingDescription;
}else{
    $catdes = filter_var($_POST["catDescription"], FILTER_SANITIZE_STRING);
}


//<!--    If there are any error, print error message-->
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
    echo $resultMessage;
    exit;
}

//<!--No errors-->
//<!--    Prepare variables for the queries-->
$catname = mysqli_real_escape_string($link, $catname);
$catdes = mysqli_real_escape_string($link, $catdes);

//<!--    If category exists in the user table, print error-->
$sql = "SELECT * FROM event_forum_categories WHERE cat_name = '$catname' AND event_id='$event_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query</div>';
    echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
    exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">That Category Name is already registered</div>';
    exit;
}

//<!--            Insert user details and activation code in the users table-->
$sql = "INSERT INTO event_forum_categories (`cat_name`, `cat_description`, `event_id`) VALUES ('$catname', '$catdes', '$event_id')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error inserting category details into database</div>';
}else{
    echo '<div class="alert alert-success">Category Added to Database</div>';
}

?>