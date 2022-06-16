<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

// Get search term 
$searchTerm = $_GET['term']; 
$searchData = array();

// Fetch matched data from the users 
$sql = "SELECT * FROM users WHERE username LIKE '%$searchTerm%' ORDER BY username ASC"; 
$result = mysqli_query($link, $sql); 
if(mysqli_num_rows($result)>0){ 
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
        $data['value'] = $row['username']; 
        array_push($searchData, $data); 
    } 
} 

// Fetch matched data from the events 
$sql = "SELECT * FROM userevents WHERE event_name LIKE '%$searchTerm%' ORDER BY event_name ASC"; 
$result = mysqli_query($link, $sql); 
if(mysqli_num_rows($result)>0){ 
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
        $data['value'] = $row['event_name']; 
        array_push($searchData, $data); 
    } 
} 

// Fetch matched data from the games
$sql = "SELECT * FROM games WHERE game_name LIKE '%$searchTerm%' ORDER BY game_name ASC"; 
$result = mysqli_query($link, $sql); 
if(mysqli_num_rows($result)>0){ 
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
        $data['value'] = $row['game_name']; 
        array_push($searchData, $data); 
    } 
} 

// Fetch matched data from the game editions
$sql = "SELECT * FROM game_editions WHERE edition_name LIKE '%$searchTerm%' ORDER BY edition_name ASC"; 
$result = mysqli_query($link, $sql); 
if(mysqli_num_rows($result)>0){ 
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
        $data['value'] = $row['edition_name']; 
        array_push($searchData, $data); 
    } 
} 

// Fetch matched data from the products
$sql = "SELECT * FROM products WHERE product_name LIKE '%$searchTerm%' ORDER BY product_name ASC"; 
$result = mysqli_query($link, $sql); 
if(mysqli_num_rows($result)>0){ 
    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){ 
        $data['value'] = $row['product_name']; 
        array_push($searchData, $data); 
    } 
} 


// Return results as json encoded array 
echo json_encode($searchData); 
?>