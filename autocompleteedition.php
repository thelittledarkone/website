<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

// Get search term 
$searchTerm = $_GET['term']; 

// Fetch matched data from the database 
$sql = "SELECT * FROM game_editions WHERE edition_name LIKE '%$searchTerm%' ORDER BY edition_name ASC"; 
$result = mysqli_query($link, $sql);
 
// Generate array with skills data 
$skillData = array(); 
if(mysqli_num_rows($result)>0){ 
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
        $data['id'] = $row['edition_id']; 
        $data['value'] = $row['edition_name']; 
        array_push($skillData, $data); 
    } 
} 
 
// Return results as json encoded array 
echo json_encode($skillData); 
?>