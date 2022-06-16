<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

// Get search term 
$searchTerm = $_GET['term']; 

// Fetch matched data from the database 
$sql = "SELECT * FROM games WHERE game_name LIKE '%$searchTerm%' ORDER BY game_name ASC"; 
$result = mysqli_query($link, $sql);
 
// Generate array with skills data 
$gameData = array(); 
if(mysqli_num_rows($result)>0){ 
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
        $data['id'] = $row['game_id']; 
        $data['value'] = $row['game_name']; 
        array_push($gameData, $data); 
    } 
} 
 
// Return results as json encoded array 
echo json_encode($gameData); 
?>