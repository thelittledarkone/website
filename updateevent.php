<?php
session_start();
include("connection.php");

//Error Messages
$missingAddress = '<p><strong>Please select either Home or Venue address!</strong></p>';
$missingVenueAddress = '<p><strong>Please enter your venue\'s street address, city or postcode!</strong></p>';
$invalidAddress = '<p><strong>Our system doesn\'t recognise your venue\'s address!</strong></p>';
$missingName = '<p><strong>Please choose a name for your event!</strong></p>';
$missingGame = '<p><strong>Please choose a game for your event!</strong></p>';
$missingEventType = '<p><strong>Please select the event type!</strong></p>';
$missingSeats = '<p><strong>Please tell us how many seats are available!</strong></p>';
$invalidSeats = '<p><strong>The number of available seats should contain digits only!</strong></p>';
$tooManySeats = '<p><strong>The number of available seats should not exceed 8!</strong></p>';
$missingFrequency = '<p><strong>Please select a frequency!</strong></p>';
$missingDays = '<p><strong>Please select at least one day!</strong></p>';
$missingDate = '<p><strong>Please choose a date for your trip!</strong></p>';
$missingTime = '<p><strong>Please choose a time for your trip!</strong></p>';

//Get Inputs
$event_id = $_POST["event_id"];
$eventAddress = $_POST["editEventAddress"];
$eventType = $_POST["editeventtype"];
$seats = $_POST["editSeats"];
$seatsNo = $seats + 0;
$tseats = $_POST["edittournseats"];
$tseatsNo = $tseats + 0;
$regular = $_POST["editRegular"];
$date = $_POST["editDate"];
$time = $_POST["editTime"];
$dbdate = $_POST["editdbDate"];
$monday = $_POST["editMonday"];
$tuesday = $_POST["editTuesday"];
$wednesday = $_POST["editWednesday"];
$thursday = $_POST["editThursday"];
$friday = $_POST["editFriday"];
$saturday = $_POST["editSaturday"];
$sunday = $_POST["editSunday"];
$attendees = $_POST["editattendee"];

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
    if(empty($_POST['editVenueAddress1']) && empty($_POST['editVenueCity']) && empty($_POST['editVenuePostcode'])){
    $errors .= $missingVenueAddress;
    }else{
        //Check Coordinates
        if(!isset($_POST["addressLatitude"]) or !isset($_POST["addressLongitude"])){
                $errors .= $invalidAddress;
        }else{
            $addressLat = $_POST["addressLatitude"];
            $addressLon = $_POST["addressLongitude"];
            if(!empty($_POST["editVenueAddress1"])){
                $address1 = filter_var($_POST["editVenueAddress1"], FILTER_SANITIZE_STRING);
            }else{
                $address1 = NULL;
            }
            if(!empty($_POST["editVenueAddress2"])){
                $address2 = filter_var($_POST["editVenueAddress2"], FILTER_SANITIZE_STRING);
            }else{
                $address2 = NULL;
            }
            if(!empty($_POST["editVenueDistrict"])){
                $district = filter_var($_POST["editVenueDistrict"], FILTER_SANITIZE_STRING);
            }else{
                $district = NULL;
            }
            if(!empty($_POST["editVenueCity"])){
                $city = filter_var($_POST["editVenueCity"], FILTER_SANITIZE_STRING);
            }else{
                $city = NULL;
            }
            if(!empty($_POST["editVenuePostcode"])){
                $postcode = filter_var($_POST["editVenuePostcode"], FILTER_SANITIZE_STRING);
            }else{
                $postcode = NULL;
            }
        }
    }
}

//Name
if(empty($_POST["editName"])){
    $errors .= $missingName;
}else{
    $name = filter_var($_POST["editName"], FILTER_SANITIZE_STRING);
}

//Check event type and seats
if(empty($eventType)){
    $errors .= $missingEventType;
}elseif($eventType == 'l'){
    if(preg_match('/\D/', $seats)){
        $errors .= $invalidSeats;
    }elseif($seatsNo > 8){
        $errors .= $tooManySeats;
    }else{
        $seats = filter_var($seats, FILTER_SANITIZE_STRING);
        $attendees = NULL;
    }
}elseif($eventType == 't'){
    if($tseatsNo == 0){
        $errors .= $missingSeats;
    }else if($attendees == NULL){
        $attendees = 0;
    }
}else{
    $seats = NULL;
    if($attendees == NULL){
        $attendees = 1;
    }
}

//More Event Information
if(!empty($_POST["editEventInfo"])){
    $moreEventInfo = $_POST["editEventInfo"];
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
    if(empty($time)){
        $errors .= $missingTime;
    }
}else{
    if(empty($date)){
        $errors .= $missingDate;
    }
    if(empty($time)){
        $errors .= $missingTime;
    }
}

//Game
if(!empty($_POST["editGame"])){
    $game = filter_var($_POST["editGame"], FILTER_SANITIZE_STRING);
    $game = mysqli_real_escape_string($link, $game);
    //Get game details
    $sql0 = "SELECT * FROM games WHERE game_name='$game'";
    $result0 = mysqli_query($link, $sql0);
    if(mysqli_num_rows($result0)>0){
        $row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC);
        $game_id = $row0["game_id"];
    }else{
        $sql00 = "INSERT INTO games (`game_name`, `added_by`) VALUES ('$game', '$user_id')";
        $result00 = mysqli_query($link, $sql00);
        //Check Query success
        if(!$result00){
            echo "<div class='alert alert-danger'>There was an error! The event could not be added to the database!</div>";
        }
        $sql000 = "SELECT * FROM games WHERE game_name='$game'";
        $result000 = mysqli_query($link, $sql000);
        if(mysqli_num_rows($result000)>0){
            $row000 = mysqli_fetch_array($result000, MYSQLI_ASSOC);
            $game_id = $row000['game_id'];
        }else{
            $errors .= $missingGame;
        }
    }  
}
//Edition
if(!empty($_POST["editEdition"])){
    $edition = filter_var($_POST["editEdition"], FILTER_SANITIZE_STRING);
    $edition = mysqli_real_escape_string($link, $edition);
    //Get game details
    $sql0 = "SELECT * FROM game_editions WHERE edition_name='$edition' AND game_id='$game_id'";
    $result0 = mysqli_query($link, $sql0);
    if(mysqli_num_rows($result0)>0){
        $row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC);
        $edition_id = $row0['edition_id'];
    }else{
        $sql00 = "INSERT INTO game_editions (`game_id`, `edition_name`, `added_by`) VALUES ('$game_id', '$edition', '$user_id')";
        $result00 = mysqli_query($link, $sql00);
        //Check Query success
        if(!$result00){
            echo "<div class='alert alert-danger'>There was an error! The games edition could not be added to the database!</div>";
        }
        $sql000 = "SELECT * FROM game_editions WHERE edition_name='$edition' AND game_id='$game_id'";
        $result000 = mysqli_query($link, $sql000);
        if(mysqli_num_rows($result000)>0){
            $row000 = mysqli_fetch_array($result000, MYSQLI_ASSOC);
            $edition_id = $row000['edition_id'];
        }
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
    $datetime = $dbdate.' '.$time;
    $tblName = 'userevents';
    if($game != ''){
        if($edition != ''){
            if($regular == "Y"){
                //Query for Regular trip
                $sql = "UPDATE $tblName SET `venue`='$eventAddress',`address`='$address1',`address2`='$address2',`district`='$district',`city`='$city',`postal_code`='$postcode',`eventLat`='$addressLat',`eventLon`='$addressLon',`event_name`='$name',`event_game`='$game_id',`game_edition`='$edition_id',`about_event`='$moreEventInfo',`regular`='$regular',`time`='$time',`monday`='$monday',`tuesday`='$tuesday',`wednesday`='$wednesday',`thursday`='$thursday',`friday`='$friday',`saturday`='$saturday',`sunday`='$sunday',`event_type`='$eventType',`seatsavailable`='$seats',`tournseatsavailable`='$tseats', `attendees`='$attendees' WHERE `event_id`='$event_id' LIMIT 1";
            }else{
                //Query for One-off trip
                $sql = "UPDATE $tblName SET `venue`='$eventAddress',`address`='$address1',`address2`='$address2',`district`='$district',`city`='$city',`postal_code`='$postcode',`eventLat`='$addressLat',`eventLon`='$addressLon',`event_name`='$name',`event_game`='$game_id',`game_edition`='$edition_id',`about_event`='$moreEventInfo',`regular`='$regular',`date`='$date',`time`='$time',`date_time`='$datetime',`event_type`='$eventType',`seatsavailable`='$seats',`tournseatsavailable`='$tseats',`attendees`='$attendees' WHERE `event_id`='$event_id' LIMIT 1";
            }

            $result = mysqli_query($link, $sql);
            //Check Query success
            if(!$result){
                echo "<div class='alert alert-danger'>There was an error! The trip could not be updated!</div>";
            }
        }else{
            if($regular == "Y"){
                //Query for Regular trip
                $sql = "UPDATE $tblName SET `venue`='$eventAddress',`address`='$address1',`address2`='$address2',`district`='$district',`city`='$city',`postal_code`='$postcode',`eventLat`='$addressLat',`eventLon`='$addressLon',`event_name`='$name',`event_game`='$game_id',`about_event`='$moreEventInfo',`regular`='$regular',`time`='$time',`monday`='$monday',`tuesday`='$tuesday',`wednesday`='$wednesday',`thursday`='$thursday',`friday`='$friday',`saturday`='$saturday',`sunday`='$sunday',`event_type`='$eventType',`seatsavailable`='$seats',`tournseatsavailable`='$tseats',`attendees`='$attendees' WHERE `event_id`='$event_id' LIMIT 1";
            }else{
                //Query for One-off trip
                $sql = "UPDATE $tblName SET `venue`='$eventAddress',`address`='$address1',`address2`='$address2',`district`='$district',`city`='$city',`postal_code`='$postcode',`eventLat`='$addressLat',`eventLon`='$addressLon',`event_name`='$name',`event_game`='$game_id',`about_event`='$moreEventInfo',`regular`='$regular',`date`='$date',`time`='$time',`date_time`='$datetime',`event_type`='$eventType',`seatsavailable`='$seats',`tournseatsavailable`='$tseats',`attendees`='$attendees' WHERE `event_id`='$event_id' LIMIT 1";
            }

            $result = mysqli_query($link, $sql);
            //Check Query success
            if(!$result){
                echo "<div class='alert alert-danger'>There was an error! The trip could not be updated!</div>";
            }
        }
        
    }else{
        if($regular == "Y"){
            //Query for Regular trip
            $sql = "UPDATE $tblName SET `venue`='$eventAddress',`address`='$address1',`address2`='$address2',`district`='$district',`city`='$city',`postal_code`='$postcode',`eventLat`='$addressLat',`eventLon`='$addressLon',`event_name`='$name',`about_event`='$moreEventInfo',`regular`='$regular',`time`='$time',`monday`='$monday',`tuesday`='$tuesday',`wednesday`='$wednesday',`thursday`='$thursday',`friday`='$friday',`saturday`='$saturday',`sunday`='$sunday',`event_type`='$eventType',`seatsavailable`='$seats',`tournseatsavailable`='$tseats',`attendees`='$attendees' WHERE `event_id`='$event_id' LIMIT 1";
        }else{
            //Query for One-off trip
            $sql = "UPDATE $tblName SET `venue`='$eventAddress',`address`='$address1',`address2`='$address2',`district`='$district',`city`='$city',`postal_code`='$postcode',`eventLat`='$addressLat',`eventLon`='$addressLon',`event_name`='$name',`about_event`='$moreEventInfo',`regular`='$regular',`date`='$date',`time`='$time',`date_time`='$datetime',`event_type`='$eventType',`seatsavailable`='$seats',`tournseatsavailable`='$tseats',`attendees`='$attendees' WHERE `event_id`='$event_id' LIMIT 1";
        }
        
        $result = mysqli_query($link, $sql);
        //Check Query success
        if(!$result){
            echo "<div class='alert alert-danger'>There was an error! The trip could not be updated!</div>";
        }
    }
}



       
       
       
       
       
       
       





?>