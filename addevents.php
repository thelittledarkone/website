<?php
session_start();
include("connection.php");

//Error Messages
$missingAddress = '<p><strong>Please select either Home or Venue address!</strong></p>';
$missingVenueAddress = '<p><strong>Please enter your venue\'s street address, city or postcode!</strong></p>';
$invalidAddress = '<p><strong>Our system doesn\'t recognise your venue\'s address!</strong></p>';
$missingName = '<p><strong>Please choose a name for your event!</strong></p>';
$missingGame = '<p><strong>Please tell us what game you are playing!</strong></p>';
$missingEventType = '<p><strong>Please select the event type!</strong></p>';
$missingSeats = '<p><strong>Please tell us how many seats are available!</strong></p>';
$invalidSeats = '<p><strong>The number of available seats should contain digits only!</strong></p>';
$tooManySeats = '<p><strong>The number of available seats should not exceed 8!</strong></p>';
$missingFrequency = '<p><strong>Please select a frequency!</strong></p>';
$missingDays = '<p><strong>Please select at least one day!</strong></p>';
$missingDate = '<p><strong>Please choose a date for your event!</strong></p>';
$missingTime = '<p><strong>Please choose a time for your event!</strong></p>';

//Get Inputs
$eventAddress = $_POST["eventAddress"];
$eventType = $_POST["eventtype"];
$seats = $_POST["seats"];
$seatsNo = $seats + 0;
$tseats = $_POST["tournseats"];
$tseatsNo = $tseats + 0;
$regular = $_POST["regular"];
$date = $_POST["date"];
$dbdate = $_POST["dbDate"];
$eventtime = $_POST["time"];
$monday = $_POST["monday"];
$tuesday = $_POST["tuesday"];
$wednesday = $_POST["wednesday"];
$thursday = $_POST["thursday"];
$friday = $_POST["friday"];
$saturday = $_POST["saturday"];
$sunday = $_POST["sunday"];

$user_id = $_SESSION['user_id'];

//Check Address
if(empty($eventAddress)){
    $errors .= $missingAddress;
}elseif($eventAddress == "H"){
    $sql = "SELECT * FROM users WHERE user_id='$user_id'";
    $result = mysqli_query($link, $sql);

    if($result){
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                $address1 = $row['address'];
                $address2 = $row['address2'];
                $district = $row['district'];
                $city = $row['city'];
                $postcode = $row['postal_code'];
                $addressLat = $row['addressLat'];
                $addressLon = $row['addressLon'];
            }
        }
    }else{
        echo "<div class='alert alert-warning'>Couldn't get your address from the DB</div>";
    }
}else{
    if(empty($_POST['venueAddress1']) && empty($_POST['venueCity']) && empty($_POST['venuePostcode'])){
    $errors .= $missingVenueAddress;
    }else{
        //Check Coordinates
        if(!isset($_POST["addressLatitude"]) or !isset($_POST["addressLongitude"])){
                $errors .= $invalidAddress;
        }else{
            $addressLat = $_POST["addressLatitude"];
            $addressLon = $_POST["addressLongitude"];
            if(!empty($_POST["venueAddress1"])){
                $address1 = filter_var($_POST["venueAddress1"], FILTER_SANITIZE_STRING);
            }else{
                $address1 = NULL;
            }
            if(!empty($_POST["venueAddress2"])){
                $address2 = filter_var($_POST["venueAddress2"], FILTER_SANITIZE_STRING);
            }else{
                $address2 = NULL;
            }
            if(!empty($_POST["venueDistrict"])){
                $district = filter_var($_POST["venueDistrict"], FILTER_SANITIZE_STRING);
            }else{
                $district = NULL;
            }
            if(!empty($_POST["venueCity"])){
                $city = filter_var($_POST["venueCity"], FILTER_SANITIZE_STRING);
            }else{
                $city = NULL;
            }
            if(!empty($_POST["venuePostcode"])){
                $postcode = filter_var($_POST["venuePostcode"], FILTER_SANITIZE_STRING);
            }else{
                $postcode = NULL;
            }
        }
    }
}

//Name
if(empty($_POST["name"])){
    $errors .= $missingName;
}else{
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
}
//Game
if(empty($_POST["game"])){
    $errors .= $missingGame;
}else{
    $game = filter_var($_POST["game"], FILTER_SANITIZE_STRING);
    $game = mysqli_real_escape_string($link, $game);
    //Get game details
    $sql0 = "SELECT * FROM games WHERE game_name='$game'";
    $result0 = mysqli_query($link, $sql0);
    if(mysqli_num_rows($result0)>0){
        $row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC);
        $game_id = $row0['game_id'];
    }else{
        $sql00 = "INSERT INTO games (`game_name`, `added_by`) VALUES ('$game', '$user_id')";
        $result00 = mysqli_query($link, $sql00);
        //Check Query success
        if(!$result00){
            echo "<div class='alert alert-danger'>There was an error! The game could not be added to the database!</div>";
        }
        $sql000 = "SELECT * FROM games WHERE game_name='$game'";
        $result000 = mysqli_query($link, $sql000);
        if(mysqli_num_rows($result000)>0){
            $row000 = mysqli_fetch_array($result000, MYSQLI_ASSOC);
            $game_id = $row000['game_id'];
        }
    }
}
//Edition
if(!empty($_POST["edition"])){
    $edition = filter_var($_POST["edition"], FILTER_SANITIZE_STRING);
    $edition = mysqli_real_escape_string($link, $edition);
    //Get game details
    $sql0e = "SELECT * FROM game_editions WHERE edition_name='$edition' AND game_id='$game_id'";
    $result0e = mysqli_query($link, $sql0e);
    if(mysqli_num_rows($result0e)>0){
        $row0e = mysqli_fetch_array($result0e, MYSQLI_ASSOC);
        $edition_id = $row0e['edition_id'];
    }else{
        $sql00e = "INSERT INTO game_editions (`game_id`, `edition_name`, `added_by`) VALUES ('$game_id', '$edition', '$user_id')";
        $result00e = mysqli_query($link, $sql00e);
        //Check Query success
        if(!$result00e){
            echo "<div class='alert alert-danger'>There was an error! The games edition could not be added to the database!</div>";
        }
        $sql000e = "SELECT * FROM game_editions WHERE edition_name='$edition' AND game_id='$game_id'";
        $result000e = mysqli_query($link, $sql000e);
        if(mysqli_num_rows($result000e)>0){
            $row000e = mysqli_fetch_array($result000e, MYSQLI_ASSOC);
            $edition_id = $row000e['edition_id'];
        }
    }
}else{
    $edition_id = 0;
}

//Check event type and seats
if(empty($eventType)){
    $errors .= $missingEventType;
}elseif($eventType == 'l'){
    if(preg_match('/\D/', $seats)){
        $errors .= $invalidSeats;
    }elseif($seatsNo > 8){
        $errors .= $tooManySeats;
    }elseif($seatsNo == 0){
        $errors .= $missingSeats;
    }else{
        $seats = filter_var($seats, FILTER_SANITIZE_STRING);
        $attendees = NULL;
    }
}elseif($eventType == 't'){
    if($tseatsNo == 0){
        $errors .= $missingSeats;
    }else{
        $attendees = 0;
    }
}else{
    $seats = NULL;
    $attendees = 1;
}


//More Event Information
if(!empty($_POST["moreEventInfo"])){
    $moreEventInfo = $_POST["moreEventInfo"];
    $moreEventInfo = str_replace("'", "’", "$moreEventInfo");
    $moreEventInfo = str_replace('"', '“', "$moreEventInfo");
    $moreEventInfo = filter_var($moreEventInfo, FILTER_SANITIZE_STRING);
}else{
    $moreEventInfo = NULL;
}

//Check Frequency
if(empty($regular)){
    $errors .= $missingFrequency;
}elseif($regular == "Y"){
    if(empty($monday) && empty($tuesday) && empty($wednesday) && empty($thursday) && empty($friday) && empty($saturday) && empty($sunday)){
        $errors .= $missingDays;
    }
    if(empty($eventtime)){
        $errors .= $missingTime;
    }
}else{
    if(empty($date)){
        $errors .= $missingDate;
    }
    if(empty($eventtime)){
        $errors .= $missingTime;
    }
}

//Check for Errors
if($errors){
    $resultMessage = "<div class='alert alert-danger'>$errors</div>";
    echo $resultMessage;
}else{
    //No errors, prepare variables for query
    $address1 = mysqli_real_escape_string($link, $address1);
    $address2 = mysqli_real_escape_string($link, $address2);
    $district = mysqli_real_escape_string($link, $district);
    $city = mysqli_real_escape_string($link, $city);
    $postcode = mysqli_real_escape_string($link, $postcode);
    $name = mysqli_real_escape_string($link, $name);
    $moreEventInfo = mysqli_real_escape_string($link, $moreEventInfo);
    $datetime = $dbdate.' '.$eventtime;
    echo $dbdate; echo $eventtime; echo $datetime;
    $time = date('Y-m-d H:i:s', time());
    $tblName = 'userevents';
    if($regular == "Y"){
        //Query for Regular trip
        $sql = "INSERT INTO $tblName (`user_id`, `venue`, `address`, `address2`, `district`, `city`, `postal_code`, `eventLat`, `eventLon`, `event_name`, `event_game`, `game_edition`, `about_event`, `regular`, `time`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `event_type`, `seatsavailable`, `tournseatsavailable`, `attendees`, `date_added`) VALUES ('$user_id', '$eventAddress', '$address1', '$address2', '$district', '$city', '$postcode', '$addressLat', '$addressLon', '$name', '$game_id', '$edition_id', '$moreEventInfo', '$regular', '$eventtime', '$monday', '$tuesday', '$wednesday', '$thursday', '$friday', '$saturday', '$sunday', '$eventType', '$seats', '$tseats', '$attendees', '$time')";
    }else{
        //Query for One-off trip
        $sql = "INSERT INTO $tblName (`user_id`, `venue`, `address`, `address2`, `district`, `city`, `postal_code`, `eventLat`, `eventLon`, `event_name`, `event_game`, `game_edition`, `about_event`, `regular`, `date`, `time`, `date_time`, `event_type`, `seatsavailable`, `tournseatsavailable`, `attendees`, `date_added`) VALUES ('$user_id', '$eventAddress', '$address1', '$address2', '$district', '$city', '$postcode', '$addressLat', '$addressLon', '$name', '$game_id', '$edition_id', '$moreEventInfo', '$regular', '$date', '$eventtime', '$datetime', '$eventType', '$seats', '$tseats', '$attendees', '$time')";
    }
    
    $result = mysqli_query($link, $sql);
    //Check Query success
    if(!$result){
        echo "<div class='alert alert-danger'>There was an error! The event could not be added to the database!</div>";
    }
}

?>