<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

//Get user id
$id = $_SESSION['user_id'];

//Get username sent through ajax
$username = $_POST['username'];
$moreinfo = $_POST['moreinfo'];
$autodelete = $_POST['autodelete'];


$invalidEmail = '<p><strong>Please enter a valid Email Address!</strong></p>';
$invalidPhone = '<p><strong>Please enter a valid phone number!</strong></p>';
$invalidRadius = '<p><strong>Please enter a valid search radius in miles (using only numbers)!</strong></p>';
$invalidAddress = '<p><strong>Our system doesn\'t recognise your address!</strong></p>';

if(!empty($_POST['phone'])){
    if(preg_match('/\D/', $_POST["phone"])){
        $errors .= $invalidPhone;
    }else{
        $phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
    }
}

if(!empty($_POST['radius'])){
    if(preg_match('/\D/', $_POST["radius"])){
        $errors .= $invalidPhone;
    }else{
        $radius = filter_var($_POST["radius"], FILTER_SANITIZE_STRING);
    }
}

if(!empty($_POST['email'])){
    $newemail = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($newemail, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidEmail;
    }
}
    
//Check Coordinates
if($_POST['editaddress'] == 'Y'){
    if(!isset($_POST["addressLatitude"]) or !isset($_POST["addressLongitude"])){
        $errors .= $invalidAddress;
    }else{
        $addressLat = $_POST["addressLatitude"];
        $addressLon = $_POST["addressLongitude"];
        if(!empty($_POST["address1"])){
            $address1 = filter_var($_POST["address1"], FILTER_SANITIZE_STRING);
        }else{
            $address1 = NULL;
        }
        if(!empty($_POST["address2"])){
            $address2 = filter_var($_POST["address2"], FILTER_SANITIZE_STRING);
        }else{
            $address2 = NULL;
        }
        if(!empty($_POST["district"])){
            $district = filter_var($_POST["district"], FILTER_SANITIZE_STRING);
        }else{
            $district = NULL;
        }
        if(!empty($_POST["city"])){
            $city = filter_var($_POST["city"], FILTER_SANITIZE_STRING);
        }else{
            $city = NULL;
        }
        if(!empty($_POST["postcode"])){
            $postcode = filter_var($_POST["postcode"], FILTER_SANITIZE_STRING);
        }else{
            $postcode = NULL;
        }
    }
}

    
//Run query and update each detail if not empty
if(!empty($username)){
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
    $username = mysqli_real_escape_string($link, $username);
    
    $sql = "UPDATE users SET username='$username' WHERE user_id='$id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error updating and storing the new username in the database</div>';
    }
}
if(!empty($phone)){
    $phone = mysqli_real_escape_string($link, $phone);
    
    $sql = "UPDATE users SET phonenumber='$phone' WHERE user_id='$id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error updating and storing the new phone number in the database</div>';
    }
}
if(!empty($moreinfo)){
    $moreinfo = $_POST["moreinfo"];
    $moreinfo = str_replace("'", "’", "$moreinfo");
    $moreinfo = str_replace('"', '“', "$moreinfo");
    $moreinfo = filter_var($moreinfo, FILTER_SANITIZE_STRING);
    $moreinfo = mysqli_real_escape_string($link, $moreinfo);
    
    $sql = "UPDATE users SET moreinformation='$moreinfo' WHERE user_id='$id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error updating and storing the new user information in the database</div>';
    }
}
if(!empty($autodelete)){
    $sql = "UPDATE users SET message_auto_delete_days='$autodelete' WHERE user_id='$id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error updating and storing the new auto delete parameters in the database</div>';
    }
}
if(!empty($radius)){
    $radius = mysqli_real_escape_string($link, $radius);
    
    $sql = "UPDATE users SET travel_radius='$radius' WHERE user_id='$id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error updating and storing the new search radius in the database</div>';
    }
}

if(!empty($addressLat) && !empty($addressLon)){
    $address1 = mysqli_real_escape_string($link, $address1);
    $address2 = mysqli_real_escape_string($link, $address2);
    $district = mysqli_real_escape_string($link, $district);
    $city = mysqli_real_escape_string($link, $city);
    $postcode = mysqli_real_escape_string($link, $postcode);
    $sql = "UPDATE users SET `address`='$address1',`address2`='$address2',`district`='$district',`city`='$city',`postal_code`='$postcode',`addressLat`='$addressLat',`addressLon`='$addressLon' WHERE user_id='$id' LIMIT 1";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error updating and storing the new address in the database</div>';
    }
}
if(!empty($newemail)){
    //Check if new email exists
    $sql = "SELECT * FROM users WHERE email = '$newemail'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">Error running the query</div>';
        exit;
    }
    $count = mysqli_num_rows($result);
    if($count){
        echo '<div class="alert alert-danger">That email is already registered.</div>';
        exit;
    }

    //Get the current email of user
    $sql = "SELECT * FROM users WHERE user_id='$user_id'";
    $result = mysqli_query($link, $sql);
    $count = mysqli_num_rows($result);
    if($count == 1){
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $email = $row['email'];
    }else{
        echo '<div class="alert alert-danger">There was an error retrieving the email from the database</div>';
    }

    //Create a unique activation code
    $activationKey = bin2hex(openssl_random_pseudo_bytes(16));

    //Insert activation code into users table
    $sql = "UPDATE users SET activation2='$activationKey' WHERE user_id='$id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">Error inserting new activation into database</div>';
    }else{
        $message = "Please click on this link to update your email address:\n\n";
        $message .= "https://thelittledarkone.com/activatenewemail.php?email=" . urlencode($email) . "&newemail=" . urlencode($newemail) . "&key=$activationKey";
        if(mail($newemail, 'Email Update for your thelittledarkone Account', $message, 'From:'.'cs@thelittledarkone.com')){
               echo "<div class='alert alert-success'>A confirmation email has been sent to $newemail. Please click on the link to activate your new email address on your account.<br />If the email doesn't show in your inbox, don't forget to check your spam/junk folder.</div>";
    }
    }

    //Send email with link to activatenewemail.php containing: current email, new email and activation code

    //Run query and update username
    $sql = "UPDATE users SET email='$email' WHERE user_id='$id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo '<div class="alert alert-danger">There was an error updating and storing the email in the database</div>';
    }
}
   
?>