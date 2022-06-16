<?php
session_start();
include("connection.php");

$user_id = $_SESSION["user_id"];

//Delete old file
$sql0 = "SELECT * FROM users WHERE user_id='$user_id'";
$result0 = mysqli_query($link, $sql0);
if(mysqli_num_rows($result0)>0){
    $row0 = mysqli_fetch_array($result0, MYSQLI_ASSOC);
    $profilepicture = $row0['profilepicture'];
}

//File Name
$name = $_FILES["picture"]["name"];

$extension = pathinfo($name, PATHINFO_EXTENSION);
$extension = strtolower($extension);

$tmp_name = $_FILES["picture"]["tmp_name"];

$information=getimagesize($tmp_name);
$width=$information[0];
$height=$information[1];

$fileError = $_FILES["picture"]["error"];

$permanentDestination = '../css/profilepics/' . md5(time()) . ".$extension";
if(move_uploaded_file($tmp_name, $permanentDestination)){

//Crop image
$image = imagecreatefromstring(file_get_contents($permanentDestination));
$filename = $permanentDestination;

$thumb_width = 200;
$thumb_height = 200;

$original_aspect = $width / $height;
$thumb_aspect = $thumb_width / $thumb_height;

if ( $original_aspect >= $thumb_aspect )
{
   // If image is wider than thumbnail (in aspect ratio sense)
   $new_height = $thumb_height;
   $new_width = $width / ($height / $thumb_height);
}
else
{
   // If the thumbnail is wider than the image
   $new_width = $thumb_width;
   $new_height = $height / ($width / $thumb_width);
}

$thumb = imagecreatetruecolor( $thumb_width, $thumb_height );
    
if($extension == 'gif'){
    imagecopyresampled($thumb,
                   $image,
                   0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                   0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                   0, 0,
                   $new_width, $new_height,
                   $width, $height);
    imagegif($thumb, $filename);
}elseif($extension == 'jpg' || $extension == 'jpeg'){
    imagecopyresampled($thumb,
                   $image,
                   0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                   0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                   0, 0,
                   $new_width, $new_height,
                   $width, $height);
    imagejpeg($thumb, $filename, 80);
}elseif($extension == 'png'){
    imagealphablending($thumb, false);
    imagesavealpha($thumb,true);
    imagecopyresampled($thumb,
                   $image,
                   0 - ($new_width - $thumb_width) / 2, // Center the image horizontally
                   0 - ($new_height - $thumb_height) / 2, // Center the image vertically
                   0, 0,
                   $new_width, $new_height,
                   $width, $height);
    imagepng($thumb, $filename);
}

    $sql = "UPDATE users SET profilepicture='$permanentDestination' WHERE user_id='$user_id'";
    $result = mysqli_query($link, $sql);
    if(!$result){
        echo "<div class='alert alert-danger'>1. Unable to update profile picture. Please try again later!</div>";
    }else{
        unlink($profilepicture);
    }
}else{
    echo "<div class='alert alert-danger'>2. Unable to update profile picture. Please try again later!</div>";
}

if($fileError>0){
    echo "<div class='alert alert-danger'>3. Unable to update profile picture. Please try again later! Error Code: $fileError</div>";
}
?>