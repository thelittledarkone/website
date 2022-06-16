<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

//<!--Check user inputs-->

//<!--    Define error messages-->
$missingAgree = '<p><strong>Please check the box to agree to our Terms and Conditions as well as our Privacy Policy in order to use our services!</strong></p>';
$missingUsername = '<p><strong>Please enter a Username!</strong></p>';
$missingEmail = '<p><strong>Please enter your Email Address!</strong></p>';
$invalidEmail = '<p><strong>Please enter a valid Email Address!</strong></p>';
$missingPassword = '<p><strong>Please enter a Password!</strong></p>';
$invalidPassword = '<p><strong>Your password should be at least 6 characters long and include at least one capital letter and one number!</strong></p>';
$differentPassword = '<p><strong>Passwords don\'t match!</strong></p>';
$missingPassword2 = '<p><strong>Please confirm your Password!</strong></p>';
$missingFirstname = '<p><strong>Please enter your first name!</strong></p>';
$missingLastname = '<p><strong>Please enter your last name!</strong></p>';
$missingPhone = '<p><strong>Please enter your phone number!</strong></p>';
$invalidPhone = '<p><strong>Please enter a valid phone number!</strong></p>';
$missingAddress = '<p><strong>Please enter your street address, city or postcode!</strong></p>';
$invalidAddress = '<p><strong>Our system doesn\'t recognise your address!</strong></p>';
$missingDOB = '<p><strong>Please enter your date of birth!</strong></p>';
$tooYoung = '<p><strong>We\'re sorry but the minimum age for this service is 16 years old!</strong></p>';

//<!--    Get username, email, password, password2-->
//<!--    Store errors in error variable-->
if(empty($_POST["agree"])){
    $errors .= $missingAgree;
}
//Username
if(empty($_POST["username"])){
    $errors .= $missingUsername;
}else{
    $username = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
}
//Firstname
if(empty($_POST["firstname"])){
    $errors .= $missingFirstname;
}else{
    $firstname = filter_var($_POST["firstname"], FILTER_SANITIZE_STRING);
}
//Lastname
if(empty($_POST["lastname"])){
    $errors .= $missingLastname;
}else{
    $lastname = filter_var($_POST["lastname"], FILTER_SANITIZE_STRING);
}
//Email
if(empty($_POST["email"])){
    $errors .= $missingEmail;
}else{
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors .= $invalidEmail;
    }
}
//Passwords
if(empty($_POST["password"])){
    $errors .= $missingPassword;
}elseif(!(strlen($_POST["password"])>6 
        and preg_match('/[A-Z]/', $_POST["password"])
        and preg_match('/[A-Z]/', $_POST["password"])
          )
       ){
    $errors .= $invalidPassword;
}else{
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
    if(empty($_POST["password2"])){
        $errors .= $missingPassword2;
    }else{
        $password2 = filter_var($_POST["password2"], FILTER_SANITIZE_STRING);
        if($password !== $password2){
            $errors .= $differentPassword;
        }
    }
}
//Address
if(empty($_POST['address1']) && empty($_POST['city']) && empty($_POST['postcode'])){
    $errors .= $missingAddress;
}else{
    //Check Coordinates
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
//Phone Number
if(empty($_POST["phone"])){
    $errors .= $missingPhone;
}elseif(preg_match('/\D/', $_POST["phone"])){
    $errors .= $invalidPhone;
}else{
    $phone = filter_var($_POST["phone"], FILTER_SANITIZE_STRING);
}
//More Information
if(!empty($_POST["moreinfo"])){
    $moreinfo = $_POST["moreinfo"];
    $moreinfo = str_replace("'", "’", "$moreinfo");
    $moreinfo = str_replace('"', '“', "$moreinfo");
    $moreinfo = filter_var($moreinfo, FILTER_SANITIZE_STRING);
}else{
    $moreinfo = NULL;
}

//Date of Birth
if(empty($_POST["dobD"]) || empty($_POST["dobM"]) || empty($_POST["dobY"])){
    $errors .= $missingDOB;
}else{
    $dob = $_POST["dobY"] . '-' . $_POST["dobM"] . '-' . $_POST["dobD"];
//find age
    $age = date_diff(date_create($dob), date_create('now'))->y;
    if($age<16){
        $errors .= $tooYoung;
    }
}

//<!--    If there are any error, print error message-->
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
    echo $resultMessage;
    exit;
}

//<!--No errors-->
//<!--    Prepare variables for the queries-->
$username = mysqli_real_escape_string($link, $username);
$firstname = mysqli_real_escape_string($link, $firstname);
$lastname = mysqli_real_escape_string($link, $lastname);
$email = mysqli_real_escape_string($link, $email);
$phone = mysqli_real_escape_string($link, $phone);
$address1 = mysqli_real_escape_string($link, $address1);
$address2 = mysqli_real_escape_string($link, $address2);
$district = mysqli_real_escape_string($link, $district);
$city = mysqli_real_escape_string($link, $city);
$postcode = mysqli_real_escape_string($link, $postcode);
$moreinfo = mysqli_real_escape_string($link, $moreinfo);

$password = mysqli_real_escape_string($link, $password);
//$password = md5($password);
//128 bits -> 32 characters
$password = hash('sha256', $password);
//256 bits -> 64 characters

//<!--    If username exists in the user table, print error-->
$sql = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query</div>';
    echo '<div class="alert alert-danger">' . mysqli_error($link) . '</div>';
    exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">That username is already registered</div>';
    exit;
}
//<!--    else-->
//<!--        If email exists in the users table, print error-->
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error running the query</div>';
    exit;
}
$results = mysqli_num_rows($result);
if($results){
    echo '<div class="alert alert-danger">That email is already registered. Do you want to log in?</div>';
    exit;
}
//<!--        else-->
//<!--            Create a unique activation code-->
$activationKey = bin2hex(openssl_random_pseudo_bytes(16));
    //byte: unit of data = 8 bits
    //bit: 0 or 1
    //16 bytes = 16*8 = 128 bits
    //(2*2*2*2)*2*2*2*2*...*2
    //16*16*...*16
    //32 characters

//Create timestamp for account and user level
$time = date('Y-m-d H:i:s', time());
$level = 0;
$radius = 10;
//<!--            Insert user details and activation code in the users table-->
$sql = "INSERT INTO users (`first_name`, `last_name`, `username`, `email`, `password`, `address`, `address2`, `district`, `city`, `postal_code`, `addressLat`, `addressLon`, `activation`, `DOB`, `phonenumber`, `moreinformation`, `travel_radius`) VALUES ('$firstname', '$lastname', '$username', '$email', '$password', '$address1', '$address2', '$district', '$city', '$postcode', '$addressLat', '$addressLon', '$activationKey', '$dob', '$phone', '$moreinfo', '$radius')";
$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error inserting user details into database</div>';
    exit;
}

//<!--            Send the user an email with a link to activate.php with their email                   and activation code-->
$message = "Please click on this link to activate your account:\n\n";
$message .= "https://thelittledarkone.com/activate.php?email=" . urlencode($email) . "&key=$activationKey";
if(mail($email, 'Confirm your Registration', $message, 'From:'.'cs@thelittledarkone.com')){
    echo "success";
}

?>