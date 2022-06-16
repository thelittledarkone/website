<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
//<!--Connect to database-->
include('./php/connection.php');
//Get user id
$user_id = $_SESSION['user_id'];

//Get username and email
$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);
$count = mysqli_num_rows($result);
if($count == 1){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $username = $row['username'];
    $email = $row['email'];
    $phone = $row['phonenumber'];
    $address = $row['address'];
    $address2 = $row['address2'];
    $district = $row['district'];
    $city = $row['city'];
    $postcode = $row['postal_code'];
    $moreinfo = $row['moreinformation'];
    $picture = $row['profilepicture'];
    $autoDelete = $row['message_auto_delete_days'];
    $radius = $row['travel_radius'];
    $emailPriv = $row['email_privacy'];
    $phonePriv = $row['phone_privacy'];
    $addressPriv = $row['address_privacy'];
    $cityPriv = $row['city_privacy'];
}else{
    echo '<div class="alert alert-danger">There was an error retrieving the username and email from the database</div>';
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Profile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <meta name="description" content="#">
        <link rel="icon" href="#">
        <!-- Bootstrap & Fonts CSS -->
        <link rel="stylesheet" href="boot/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Ceviche+One&display=swap" rel="stylesheet">
<!--        Custom Styling-->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/profilestyle.css">
        <link rel="stylesheet" href="css/headerless.css">
    </head>
    <body>
<!--        Navigation-->
        <?php
        include("navbarconnected.php");
        ?>
        
<!--        Main Content-->
        <div class="container" id="profileContainer">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <h2>General Account Settings</h2>
                    <div class="table-condensed">
                        <h3>Profile Information:</h3>
                        <table class="table table-condensed pictureTable">
                            <tr>
                                <th>Profile Picture</th>
                                <th>About Me</th>
                            </tr>
                            <tr>
                                
                                <td data-toggle="modal" data-target="#updatePicture" id='pictureCell'><?php
                                    if(empty($picture)){
                                        echo "<img src='css/profilepics/angel.png' class='tableProfilePic'>";
                                    }else{
                                        echo "<img src='$picture' class='tableProfilePic'>";
                                    }
                                    ?>
                                    <br><i>(To Change,<br>Click Here)</i>
                                </td>
                                
                                <td>
                                    <div class='expandable moreInfoContainer' data-js-expandable>
                                        <div class='innerContent' data-js-expandable-inner><?php echo $moreinfo;?></div>
                                    </div>
                                    <div class='expandable__btn__wrapper'  data-js-expander>
                                            <button class='btn expandable__btn'></button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <h3>Account Details:</h3>
                        <table class="table table-condensed detailsTable">
                            <tr>
                                <td>Username</td>
                                <td><?php echo $username;?></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td><?php echo $email;?></td>
                            </tr>
                            <tr>
                                <td>Telephone</td>
                                <td><?php echo $phone;?></td>
                            </tr>
                            <tr>
                                <td>Auto Delete</td>
                                <td>Messages automatically delete after <strong><?php echo $autoDelete;?></strong> days</td>
                            </tr>
                            <tr data-target="#updateabout" data-toggle="modal">
                                <td>Search Radius</td>
                                <td>'Events Near Me' section of Detect Adventure display all events within a <strong><?php echo $radius;?></strong> mile radius</td>
                            </tr>
                        </table>
                        <button type="button" id="editDetails" class="btn btn-lg btnColor settingsBtn pull-right" data-toggle="modal" data-target="#updateDetailsModal">Update Details</button>
            
                        <h3 class="passwordHeader">Password Details:</h3>
                        <table class="table table-condensed">
                            <tr data-target="#updatepassword" data-toggle="modal">
                                <td>Password</td>
                                <td>hidden</td>
                            </tr>
                        </table>
                        <button type="button" id="editDetails" class="btn btn-lg btnColor settingsBtn pull-right" data-target="#updatepassword" data-toggle="modal">Update Password</button>
                        <h3 class="passwordHeader">Privacy Settings:</h3>
                        <form method="post" id="updatePrivacyForm">
<!--                            Update Privacy message for php file-->
                            <div id="updatePrivacyMessage"></div>
                    
                            <div class="row">
                                <div class="col-sm-2"><label>Phone:</label></div>
                                <div class="form-group col-sm-10 row privacyRadio">
                                    <div class="col-sm-6">
                                        <label>
                                            <input type="radio" name="phonePriv" id="phonePrivate" value="x" <?php if($phonePriv == 'x'){echo 'checked';} ?>>
                                            Private (No-one can See)                               
                                        </label>
                                        <label>
                                            <input type="radio" name="phonePriv" id="phoneFriends" value="f" <?php if($phonePriv == 'f'){echo 'checked';} ?>>
                                            Friends Only                                
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>
                                            <input type="radio" name="phonePriv" id="phoneAttend" value="a" <?php if($phonePriv == 'a'){echo 'checked';} ?>>
                                            Event Attendees Only                                
                                        </label>
                                        <label>
                                            <input type="radio" name="phonePriv" id="phonePublic" value="p" <?php if($phonePriv == 'p'){echo 'checked';} ?>>
                                            Public (Everyone can See)                             
                                        </label>
                                    </div>                                
                                </div>
                            </div> 
                            <div class="row">
                                <div class="col-sm-2"><label>Email:</label></div>
                                <div class="form-group col-sm-10 row privacyRadio">
                                    <div class="col-sm-6">
                                        <label>
                                            <input type="radio" name="emailPriv" id="emailPrivate" value="x" <?php if($emailPriv == 'x'){echo 'checked';} ?>>
                                            Private (No-one can See)                               
                                        </label>
                                        <label>
                                            <input type="radio" name="emailPriv" id="emailFriends" value="f" <?php if($emailPriv == 'f'){echo 'checked';} ?>>
                                            Friends Only                                
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>
                                            <input type="radio" name="emailPriv" id="emailAttend" value="a" <?php if($emailPriv == 'a'){echo 'checked';} ?>>
                                            Event Attendees Only                                
                                        </label>
                                        <label>
                                            <input type="radio" name="emailPriv" id="emailPublic" value="p" <?php if($emailPriv == 'p'){echo 'checked';} ?>>
                                            Public (Everyone can See)                             
                                        </label>
                                    </div>                                
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-2"><label>Address:</label></div>
                                <div class="form-group col-sm-10 row privacyRadio">
                                    <div class="col-sm-6">
                                        <label>
                                            <input type="radio" name="addressPriv" id="addressPrivate" value="x"<?php if($addressPriv == 'x'){echo 'checked';} ?>>
                                            Private (No-one can See)                               
                                        </label>
                                        <label>
                                            <input type="radio" name="addressPriv" id="addressFriends" value="f" <?php if($addressPriv == 'f'){echo 'checked';} ?>>
                                            Friends Only                                
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>
                                            <input type="radio" name="addressPriv" id="addressAttend" value="a" <?php if($addressPriv == 'a'){echo 'checked';} ?>>
                                            Event Attendees Only                                
                                        </label>
                                        <label>
                                            <input type="radio" name="addressPriv" id="addressPublic" value="p" <?php if($addressPriv == 'p'){echo 'checked';} ?>>
                                            Public (Everyone can See)                             
                                        </label>
                                    </div>                                
                                </div>
                            </div>
                            <div class="row <?php if($addressPriv == 'p'){echo 'cityHidden';} ?>">
                                <div class="col-sm-2"><label>City:</label></div>
                                <div class="form-group col-sm-10 row privacyRadio">
                                    <div class="col-sm-6">
                                        <label>
                                            <input type="radio" name="cityPriv" id="cityPrivate" value="x" <?php if($cityPriv == 'x' && $addressPriv != 'p'){echo 'checked';} ?>>
                                            Private (No-one can See)                               
                                        </label>
                                        <label>
                                            <input type="radio" name="cityPriv" id="cityFriends" value="f" <?php if($cityPriv == 'f' && $addressPriv != 'p'){echo 'checked';} ?>>
                                            Friends Only                                
                                        </label>
                                    </div>
                                    <div class="col-sm-6">
                                        <label>
                                            <input type="radio" name="cityPriv" id="cityAttend" value="a" <?php if($cityPriv == 'a' && $addressPriv != 'p'){echo 'checked';} ?>>
                                            Event Attendees Only                                
                                        </label>
                                        <label>
                                            <input type="radio" name="cityPriv" id="cityPublic" value="p" <?php if($addressPriv == 'p' || $cityPriv == 'p'){echo 'checked';} ?>>
                                            Public (Everyone can See)                             
                                        </label>
                                    </div>                                
                                </div>
                            </div>
                            <input class="btn btnColor settingsBtn pull-right" name="updatePrivacy" type="submit" value="Update Privacy">
                        </form>
                    </div>
                </div>
            </div>
        </div>

<!--        Forgot password form-->
        <form method="post" id="updatePasswordForm">
            <div class="modal" id="updatepassword" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <h4 id="myModalLabel">Update Password:</h4>
                        </div>
                        <div class="modal-body">
<!--                            update password message for php file-->
                            <div id="updatePasswordMessage"></div>
<!--                            Sign up form-->
                            <div class="form-group">
                                <label for="passwordold" class="sr-only">Current Password</label>
                                <input class="form-control" type="password" id="passwordold" name="passwordold" placeholder="Current Password" maxlength="30">  
                            </div>    
                            <div class="form-group">
                                <label for="passwordnew" class="sr-only">New Password</label>
                                <input class="form-control" type="password" id="passwordnew" name="passwordnew" placeholder="New Password" maxlength="30">  
                            </div>    
                            <div class="form-group">
                                <label for="passwordconfirm" class="sr-only">Confirm Password</label>
                                <input class="form-control" type="password" id="passwordconfirm" name="passwordconfirm" placeholder="Confirm New Password" maxlength="30">  
                            </div>                       
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="updatepassword" type="submit" value="Submit">
                            <button type="button" class="btn cancelBtn" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
        <!--        Update Picture Modal-->
        <form method="post" id="updatePictureForm" enctype="multipart/form-data">
            <div class="modal" id="updatePicture" role="dialog" aria-labelledby="pictureModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a class="close" data-dismiss="modal">&times;</a>
                            <h4 id="myModalLabel">Upload Picture:</h4>
                        </div>
                        <div class="modal-body">
<!--                            picture message for php file-->
                            <div id="updatePictureMessage"></div>
<!--                            Current Profile Pic-->
                            <div class="profilePicContainer">
                                <?php
                                if(empty($picture)){
                                    echo "<img src='css/profilepics/angel.png' class='profilePic' id='profilePic'>";
                                }else{
                                    echo "<img src='$picture' class='profilePic' id='profilePic'>";
                                }
                                ?>
                            </div>
<!--                            Upload Form-->
                            <div class="form-group">
                                <label for="picture" class="sr-only">Select a Picture</label>
                                <input type="file" name="picture" id="picture">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="submit" type="submit" value="Submit">
                            <button type="button" class="btn cancelBtn" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
    
        <!--Update Details Modal-->
<form method="post" id="updateDetailsForm">
            <div class="modal" id="updateDetailsModal" role="dialog" aria-labelledby="updateDetailsLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a class="close" data-dismiss="modal">&times;</a>
                            <h4 id="updateDetailsLabel">Update your details here! Any fields left blank will remain unchanged.</h4>
                        </div>
                        <div class="modal-body">
<!--                            Signup message for php file-->
                            <div id="updateDetailsMessage"></div>
<!--                            Sign up form-->
                            <div class="form-group">
                                    <label>
                                        <input type="radio" name="editaddress" id="editaddressYes" value="Y">
                                        Edit my Address                               
                                    </label>
                                    <label>
                                        <input type="radio" name="editaddress" id="editaddressNo" value="N" checked>
                                        Leave my Address Alone                               
                                    </label>
                            </div>
                            <div class="form-group addressInput">
                                <label for="address1" class="sr-only">Address 1</label>
                                <input class="form-control" type="text" id="address1" name="address1" placeholder="<?php if(!empty($address)){
                                                    echo $address;
                                                    }else{
                                                    echo "Address";
                                                    } ?>" maxlength="50">
                            </div>
                            <div class="form-group addressInput">
                                <label for="address2" class="sr-only">Address 2</label>
                                <input class="form-control" type="text" id="address2" name="address2" placeholder="<?php if(!empty($address2)){
                                                    echo $address2; 
                                                    }else{
                                                    echo "Address 2";
                                                    }?>" maxlength="50">
                            </div>
                            <div class="form-group addressInput">
                                <label for="district" class="sr-only">District</label>
                                <input class="form-control" type="text" id="district" name="district" placeholder="<?php if(!empty($district)){
                                                    echo $district;
                                                    }else{
                                                    echo "District";
                                                    } ?>" maxlength="20">
                            </div>
                            <div class="form-group addressInput">
                                <label for="city" class="sr-only">City</label>
                                <input class="form-control" type="text" id="city" name="city" placeholder="<?php if(!empty($city)){
                                    echo $city;
                                    }else{
                                    echo "City";
                                    }?>" maxlength="20">
                            </div>
                            <div class="form-group addressInput">
                                <label for="postcode" class="sr-only">Postcode</label>
                                <input class="form-control" type="text" id="postcode" name="postcode" placeholder="<?php if(!empty($postcode)){
                                                echo $postcode;
                                                }else{
                                                echo "Postal/Zip Code";
                                                } ?>" maxlength="10">
                            </div>
                            <div class="form-group">
                                <label for="username" class="sr-only">Username</label>
                                <input class="form-control" type="text" id="username" name="username" placeholder="<?php if(!empty($username)){
                                                    echo $username;
                                                    }else{
                                                    echo "Username";
                                                    }?>" maxlength="30">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input class="form-control" type="email" id="email" name="email" placeholder="<?php if(!empty($email)){
                                    echo $email;
                                    }else{
                                    echo "Email";
                                    }?>" maxlength="50">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="sr-only">Phone</label>
                                <input class="form-control" type="text" id="phone" name="phone" placeholder="<?php if(!empty($phone)){
                                                echo $phone;
                                                }else{
                                                echo "Phone Number";
                                                } ?>" maxlength="30">
                            </div>
                            <div class="form-group">
                                <label for="radius" class="sr-only">Search Radius</label>
                                <input class="form-control" type="number" id="radius" name="radius" placeholder="Search Radius in Miles">  
                            </div>
                            <div class="form-group">
                                <label for="autodelete" class="">Auto Delete Messages after</label>
                                <select class="custom-select" id="autodelete" name="autodelete">
                                    <option value="30" selected>30 Days</option>
                                    <option value="60">60 Days</option>
                                    <option value="90">90 Days</option>
                                    <option value="180">180 Days</option>
                                  </select>  
                            </div>
                            <div class="form-group">
                                <label for="moreinfo">About Me: </label>
                                <textarea name="moreinfo" class="form-control" id="moreinfo" rows="5"><?php echo $moreinfo; ?></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="updateDetails" type="submit" value="Update Details">
                            <button type="button" class="btn cancelBtn" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
        <!--    Footer-->
       <?php include("footer.php"); ?>
<!--      Here Maps API Java-->
      <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
      <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
      <script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
      <script src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!--Include all compiled plugins (below), or include individual files as needed -->
        <script src="boot/js/bootstrap.min.js"></script>
        
        <script src="js/sticky.js"></script>
        <script src="js/nav.js"></script>
        <script src="js/profile.js"></script>
        <script>
            $(function(){
                $("#profile").addClass('active');
            });
        </script>
    </body>
</html>