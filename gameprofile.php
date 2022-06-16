<?php
session_start();

//<!--Connect to database-->
include('./php/connection.php');
include('./php/rememberme.php');

$_SESSION['uri'] = $_SERVER['REQUEST_URI'];
//Get user id
$user_id = $_SESSION['user_id'];
$game_name = $_GET["game_name"];
$_SESSION['game_name'] = $game_name;
$edition_id = $_GET["edition"];
$_SESSION['edition_id'] = $edition_id;

$sql = "SELECT * FROM games WHERE game_name='$game_name' LIMIT 1";
$result = mysqli_query($link, $sql);
if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $gamepicture = $row['profilepicture'];
    $game_id = $row['game_id'];
    $alias = $row['alias'];
    $company = $row['company_name'];
    $creator = $row['creator_name'];
    $illustrator = $row['illustrator_name'];
    $players = $row['no_players'];
    $playtime = $row['play_time'];
    $age = $row['age_rating'];
    $genre = $row['genre'];
    $type = $row['game_type'];
    $board = $row['board_type'];
    $synopsis = $row['synopsis'];
}

$_SESSION['game_id'] = $game_id;
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title><?php echo "$game_name"; ?> Profile</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <meta name="description" content="#">
        <link rel="icon" href="#">
        <!-- Bootstrap & Fonts CSS -->
        <link rel="stylesheet" href="boot/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Ceviche+One&display=swap" rel="stylesheet">
        <!--        JQuery & Bootstrap JS Scripts-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="boot/js/bootstrap.min.js"></script>
<!--        JQuery UI-->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/eggplant/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!--        Custom Styling-->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/profilestyle.css">
        <link rel="stylesheet" href="css/damanagerstyle.css">
        <link rel="stylesheet" href="css/headerless.css">
    </head>
    <body>
<!--        Navigation-->
        <?php
        if(isset($_SESSION["user_id"])){
            include("navbarconnected.php");
            include("searchonly.php");
        }else{
            include("navbarnotconnected.php");
        }
        
        ?>
        <div class="signuptop">
      <?php
            if(!isset($_SESSION["user_id"])){
                echo "<button type='button' class='btn btn-lg btnColor btnSignup' data-target='#signupModal' data-toggle='modal'>Sign Up, It's Free!</button>";
            }
            ?>
        </div> 
        
<!--        Main Content-->
        <div class="container" id="profileContainer">
            <div class="row">
                <div class="col-md-offset-1 col-md-10">
                    <div id="profilePageDetails" class="reviewpagemain"></div> 
                    
                    
                    <div class='expandable__btn__wrapper' data-js-expander>
                        <button class='btn expandable__btn'></button>
                    </div>
                    <div class="inlineTitle"><h3>User Reviews:</h3><a type="button" href="userreviews.php?game_name=<?php echo "$game_name"; ?>&edition=0" id="viewall2" class="btn btn-lg btnColor">VIEW ALL &#8658;</a></div>
                    <div class='expandable profileAboutContainer' data-js-expandable>
                        <div class='innerContent' data-js-expandable-inner>
                            <div class='userReviews'></div>
                        </div>
                    </div>
                    <div>
                <?php
            if(isset($_SESSION["user_id"])){
                echo "
                    <div class='expandable__btn__wrapper' data-js-expander>
                        <button class='btn expandable__btn'></button>
                    </div>
                    <div class='inlineTitle gametitle'><h3>Upcoming Events Playing <strong>";
                      
                        if(!empty($alias)){
                            echo "$alias:</h3>";
                        }else{
                            echo "$game_name:</h3>";
                        }
                    echo "</strong></h3><a type='button' href='gameevents.php?game_name=$game_name&edition=0' id='viewall3' class='btn btn-lg btnColor gameeventbtn'>VIEW ALL &#8658;</a></div>
                    <h3 class='phonegametitle'>Upcoming Events Playing <strong>";
                        
                        if(!empty($alias)){
                            echo "$alias:</h3>";
                        }else{
                            echo "$game_name:</h3>";
                        }
                     echo "</strong></h3>
                    <a type='button' href='gameevents.php?game_name=$game_name&edition=0' id='viewall3' class='btn btn-lg btnColor phonegameeventbtn'>VIEW ALL &#8658;</a>
                    <div class='expandable profileAttendingContainer' data-js-expandable>
                        <div class='innerContent' data-js-expandable-inner>
                            <div id='myEvents' class='events'></div>
                        </div>
                    </div>
                    </div>";
                    }else{
                echo "<div class='alert alert-info'>Please Login or Sign Up for free to see events near you</div>";
            }
            ?>
                </div>
            </div>
        </div>
        </div>
        
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
                                if(empty($gamepicture)){
                                    echo "<img src='css/profilepics/angel.png' class='profilePic' id='profilePic'>";
                                }else{
                                    echo "<img src='$gamepicture' class='profilePic' id='profilePic'>";
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

                            <div id="updateDetailsMessage"></div>

                            
                            <div class="form-group">
                                <label for="game" class="sr-only">Name</label>
                                <input class="form-control" type="text" id="game" name="game" placeholder="<?php if(!empty($game_name)){
                                                    echo $game_name;
                                                    }else{
                                                    echo "Name";
                                                    } ?>" maxlength="50">
                            </div>
                            <div class="form-group">
                                <label for="alias" class="sr-only">Alias</label>
                                <input class="form-control" type="text" id="alias" name="alias" placeholder="<?php if(!empty($alias)){
                                                    echo $alias;
                                                    }else{
                                                    echo "Alias eg. MTG, WFB, D&D etc.";
                                                    } ?>" maxlength="50">
                            </div>
                            <div class="form-group">
                                <label for="company" class="sr-only">Company Name</label>
                                <input class="form-control" type="text" id="company" name="company" placeholder="<?php if(!empty($company)){
                                                    echo $company; 
                                                    }else{
                                                    echo "Company Name";
                                                    }?>" maxlength="50">
                            </div>
                            <div class="form-group">
                                <label for="creator" class="sr-only">Creator Name</label>
                                <input class="form-control" type="text" id="creator" name="creator" placeholder="<?php if(!empty($creator)){
                                                    echo $creator;
                                                    }else{
                                                    echo "Creator Name";
                                                    } ?>" maxlength="300">
                            </div>
                            <div class="form-group">
                                <label for="illustrator" class="sr-only">Illustrator Name</label>
                                <input class="form-control" type="text" id="illustrator" name="illustrator" placeholder="<?php if(!empty($illustrator)){
                                    echo $illustrator;
                                    }else{
                                    echo "Illustrator Name";
                                    }?>" maxlength="500">
                            </div>
                            <div class="form-group">
                                <label for="players" class="sr-only">No. of Players</label>
                                <input class="form-control" type="text" id="players" name="players" placeholder="<?php if(!empty($players)){
                                                echo $players;
                                                }else{
                                                echo "No. of Players";
                                                } ?>" maxlength="15">
                            </div>
                            <div class="form-group">
                                <label for="playtime" class="sr-only">Playtime</label>
                                <input class="form-control" type="text" id="playtime" name="playtime" placeholder="<?php if(!empty($playtime)){
                                                    echo $playtime;
                                                    }else{
                                                    echo "Approx. Playtime";
                                                    }?>" maxlength="15">
                            </div>
                            <div class="form-group">
                                <label for="age" class="sr-only">Age Rating</label>
                                <input class="form-control" type="text" id="age" name="age" placeholder="<?php if(!empty($age)){
                                    echo $age;
                                    }else{
                                    echo "Age Rating";
                                    }?>" maxlength="15">
                            </div>
                            <div class="form-group">
                                <label for="genre">Genre:</label>
                                <input class="form-control" type="text" id="genre" name="genre" placeholder="<?php if(!empty($genre)){
                                                echo $genre;
                                                }else{
                                                echo "Horror, Fantasy, Sci-Fi etc.";
                                                } ?>" maxlength="30">
                            </div>
                            <div class="form-group">
                                <label for="type">Game Type:</label>
                                <input class="form-control" type="text" id="type" name="type" placeholder="<?php if(!empty($type)){
                                                echo $type;
                                                }else{
                                                echo "RPG, RTS, Meeple, Card, Resource Management etc.";
                                                } ?>" maxlength="30">
                            </div>
                            <div class="form-group">
                                <label for="board">Board Type:</label>
                                <input class="form-control" type="text" id="board" name="board" placeholder="<?php if(!empty($board)){
                                                echo $board;
                                                }else{
                                                echo "Square Grid, Hex Grid, Gridless, Pen & Paper etc.";
                                                } ?>" maxlength="30">
                            </div>
                            <div class="form-group">
                                <label for="date">Release Date</label>
                              <input class="form-control" type="date" id="date" name="date">
                            </div>
                            <div class="form-group">
                                <label for="synopsis">Synopsis: </label>
                                <textarea name="synopsis" class="form-control" id="synopsis" rows="5"><?php echo $synopsis; ?></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="updateDetails" type="submit" value="Update Game">
                            <button type="button" class="btn cancelBtn" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
        
        <!--Add Edition Modal-->
<form method="post" id="addEditionForm">
            <div class="modal" id="addEditionModal" role="dialog" aria-labelledby="addEditionLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a class="close" data-dismiss="modal">&times;</a>
                            <h4 id="addEditionLabel">Add a new Edition, Set or Expansion to <?php echo $game_name; ?>.</h4>
                        </div>
                        <div class="modal-body">

                            <div id="addEditionMessage"></div>
                            
                            <div class="form-group">
                                <label for="edition" class="sr-only">Edition Name</label>
                                <input class="form-control" type="text" id="edition" name="edition" placeholder="Edition/Set Name" maxlength="50">
                            </div>
                            <div class="form-group">
                                <label for="creatorE" class="sr-only">Creator Name</label>
                                <input class="form-control" type="text" id="creatorE" name="creatorE" placeholder="Creator Name" maxlength="300">
                            </div>
                            <div class="form-group">
                                <label for="illustratorE" class="sr-only">Illustrator Name</label>
                                <input class="form-control" type="text" id="illustratorE" name="illustratorE" placeholder="Illustrator Name" maxlength="500">
                            </div>
                            <div class="form-group">
                                <label for="playersE" class="sr-only">No. of Players</label>
                                <input class="form-control" type="text" id="playersE" name="playersE" placeholder="No. of Players" maxlength="15">
                            </div>
                            <div class="form-group">
                                <label for="playtimeE" class="sr-only">Playtime</label>
                                <input class="form-control" type="text" id="playtimeE" name="playtimeE" placeholder="Approx. Playtime" maxlength="15">
                            </div>
                            <div class="form-group">
                                <label for="ageE" class="sr-only">Age Rating</label>
                                <input class="form-control" type="text" id="ageE" name="ageE" placeholder="Age Rating" maxlength="15">
                            </div>
                            <div class="form-group">
                                <label for="genreE">Genre:</label>
                                <input class="form-control" type="text" id="genreE" name="genreE" placeholder="Horror, Fantasy, Sci-Fi etc." maxlength="30">
                            </div>
                            <div class="form-group">
                                <label for="typeE">Game Type:</label>
                                <input class="form-control" type="text" id="typeE" name="typeE" placeholder="RPG, RTS, Meeple, Card, Resource Management etc." maxlength="30">
                            </div>
                            <div class="form-group">
                                <label for="boardE">Board Type:</label>
                                <input class="form-control" type="text" id="boardE" name="boardE" placeholder="Square Grid, Hex Grid, Gridless, Pen & Paper etc." maxlength="30">
                            </div>
                            <div class="form-group">
                                <label for="dateE">Release Date</label>
                              <input class="form-control" type="date" id="dateE" name="dateE">
                            </div>
                            <div class="form-group">
                                <label for="synopsisE">Synopsis: </label>
                                <textarea name="synopsisE" class="form-control" id="synopsisE" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="addEdition" type="submit" value="Add Edition">
                            <button type="button" class="btn cancelBtn" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
        
        <!--        Review Modal-->
        <form method="post" id="reviewForm">
            <div class="modal" id="reviewModal" role="dialog" aria-labelledby="reviewModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <h4 id="reviewModalLabel">Review Game:</h4>
                        </div>
                        <div class="modal-body">

                            <div id="addReviewMessage"></div>
                            
                            <div class="star-rating">
                                  <input type="radio" name="stars" id="star-a" value="5"/>
                                  <label for="star-a"></label>

                                  <input type="radio" name="stars" id="star-b" value="4"/>
                                  <label for="star-b"></label>

                                  <input type="radio" name="stars" id="star-c" value="3"/>
                                  <label for="star-c"></label>

                                  <input type="radio" name="stars" id="star-d" value="2"/>
                                  <label for="star-d"></label>

                                  <input type="radio" checked="true" name="stars" id="star-e" value="1"/>
                                  <label for="star-e"></label>
                            </div>
                            
                            <div class="form-group">
                                <label for="reviewMessage">Add Message? <i>(optional)</i> </label>
                                <textarea name="reviewMessage" class="form-control" id="reviewMessage" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="sendreview" type="submit" value="Send Review">
                            <button type="button" class="btn cancelBtn" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
        
        <!--        Send Booking Request Modal-->
        <form method="post" id="sendBookingRequestForm">
            <div class="modal" id="sendBookingRequestModal" role="dialog" aria-labelledby="sendBookingRequestModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <h4 id="sendBookingRequestModalLabel">Request Seat:</h4>
                        </div>
                        <div class="modal-body">
<!--                            Add Event message for php file-->
                            <div id="sendBookingRequestMessage"></div>
<!--                            Send Message form-->
                            <div class="form-group">
                                <label for="bookingMessage">Add Message? <i>(optional)</i> </label>
                                <textarea name="bookingMessage" class="form-control" id="bookingMessage" rows="5"></textarea>
                            </div>
                            <div>By clicking the 'Request Seat' button, you are accepting that you wish to book a seat to this event. The event organiser will be in contact with you to let you know if you have been assigned a seat at the table.</div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="bookseat" type="submit" value="Request Seat">
                            <button type="button" class="btn cancelBtn" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
        
        <!--        Send Message Modal-->
        <form method="post" id="sendMessageForm">
            <div class="modal" id="sendMessageModal" role="dialog" aria-labelledby="sendMessageModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" data-dismiss="modal">&times;</button>
                            <h4 id="sendMessageModalLabel">Send Message:</h4>
                        </div>
                        <div class="modal-body">
<!--                            Add Event message for php file-->
                            <div id="sendMessageMessage"></div>
<!--                            Send Message form-->
                            <div class="form-group">
                                <label class="input-group-text" for="messageType">Message Type:</label>
                                <select class="custom-select" id="messageType" name="messageType">
                                    <option selected>Choose...</option>
                                    <option value="q">Question</option>
                                    <option value="z">Feedback</option>
                                    <option value="o">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="messageSubject" class="sr-only">Subject</label>
                                <input class="form-control" type="text" id="messageSubject" name="messageSubject" placeholder="Subject" maxlength="50">  
                            </div> 
                            <div class="form-group">
                                <label for="messageContent">Message: </label>
                                <textarea name="messageContent" class="form-control" id="messageContent" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="sendMessage" type="submit" value="Send Message">
                            <button type="button" class="btn cancelBtn" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
            
            <!--        Login-->
        <form method="post" id="loginForm">
            <div class="modal" id="loginModal" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a class="close" data-dismiss="modal">&times;</a>
                            <h4 id="myModalLabel">Login:</h4>
                        </div>
                        <div class="modal-body">
<!--                            login message for php file-->
                            <div id="loginMessage"></div>
<!--                            Sign up form-->
                            <div class="form-group">
                                <label for="loginemail" class="sr-only">Email</label>
                                <input class="form-control" type="email" id="loginemail" name="loginemail" placeholder="Email" maxlength="50">
                                <label for="loginpassword" class="sr-only">Password</label>
                                <input class="form-control" type="password" id="loginpassword" name="loginpassword" placeholder="Password" maxlength="30">        
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="rememberme" id="rememberme">
                                    Remember Me
                                </label>
                                <a class="pull-right" style="cursor: pointer" data-dismiss="modal" data-target="#passwordModal" data-toggle="modal">Forgot Password?</a>
                            </div>                            
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="login" type="submit" value="Login">
                            <button type="button" class="btn cancelBtn" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn cancelBtn pull-left" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">Register</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
<!--        Sign Up-->
        <form method="post" id="signupForm">
            <div class="modal" id="signupModal" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a class="close" data-dismiss="modal">&times;</a>
                            <h4 id="myModalLabel">Sign Up today and Start using thelittledarkone's Detect Adventure app!</h4>
                        </div>
                        <div class="modal-body">
<!--                            Signup message for php file-->
                            <div id="signupMessage"></div>
<!--                            Sign up form-->
                            <div class="form-group">
                                <label for="username" class="sr-only">Username</label>
                                <input class="form-control" type="text" id="username" name="username" placeholder="Username" maxlength="30">
                            </div>
                            <div class="form-group">
                                <label for="firstname" class="sr-only">First Name</label>
                                <input class="form-control" type="text" id="firstname" name="firstname" placeholder="First Name" maxlength="30">
                            </div>
                            <div class="form-group">
                                <label for="lastname" class="sr-only">Last Name</label>
                                <input class="form-control" type="text" id="lastname" name="lastname" placeholder="Last Name" maxlength="30">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input class="form-control" type="email" id="email" name="email" placeholder="Email" maxlength="50">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Choose a Password</label>
                                <input class="form-control" type="password" id="password" name="password" placeholder="Choose a Password" maxlength="30">
                            </div>
                            <div class="form-group">
                                <label for="password2" class="sr-only">Confirm Password</label>
                                <input class="form-control" type="password" id="password2" name="password2" placeholder="Confirm Password" maxlength="30">
                            </div>
                            <div class="form-group">
                                <label for="address1" class="sr-only">Address 1</label>
                                <input class="form-control" type="text" id="address1" name="address1" placeholder="Address" maxlength="50">
                            </div>
                            <div class="form-group">
                                <label for="address2" class="sr-only">Address 2</label>
                                <input class="form-control" type="text" id="address2" name="address2" placeholder="Address Line 2" maxlength="50">
                            </div>
                            <div class="form-group">
                                <label for="district" class="sr-only">District</label>
                                <input class="form-control" type="text" id="district" name="district" placeholder="District" maxlength="20">
                            </div>
                            <div class="form-group">
                                <label for="city" class="sr-only">City</label>
                                <input class="form-control" type="text" id="city" name="city" placeholder="City" maxlength="20">
                            </div>
                            <div class="form-group">
                                <label for="postcode" class="sr-only">Postcode</label>
                                <input class="form-control" type="text" id="postcode" name="postcode" placeholder="Post/Zip Code" maxlength="10">
                            </div>
                            <div class="form-group">
                                <label for="phone" class="sr-only">Phone</label>
                                <input class="form-control" type="text" id="phone" name="phone" placeholder="Phone Number" maxlength="30">
                            </div>
                            <div class="form-group">
                                <label for="dobD" id="dobLabel">Date of Birth:</label>
                                <div class="row">
                                    <div class="col-xs-4">
                                        <select name="dobD" id="dobD" class="form-control">
                                          <option value="" selected>Day</option>
                                          <option value="01">1</option>
                                          <option value="02">2</option>
                                          <option value="03">3</option>
                                          <option value="04">4</option>
                                          <option value="05">5</option>
                                          <option value="06">6</option>
                                          <option value="07">7</option>
                                          <option value="08">8</option>
                                            <option value="09">9</option>
                                          <option value="10">10</option>
                                          <option value="11">11</option>
                                          <option value="12">12</option>
                                          <option value="13">13</option>
                                          <option value="14">14</option>
                                          <option value="15">15</option>
                                          <option value="16">16</option>
                                            <option value="17">17</option>
                                          <option value="18">18</option>
                                          <option value="19">19</option>
                                          <option value="20">20</option>
                                          <option value="21">21</option>
                                          <option value="22">22</option>
                                          <option value="23">23</option>
                                          <option value="24">24</option>
                                            <option value="25">25</option>
                                          <option value="26">26</option>
                                          <option value="27">27</option>
                                          <option value="28">28</option>
                                          <option value="29">29</option>
                                          <option value="30">30</option>
                                          <option value="31">31</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <select name="dobM" id="dobM" class="form-control">
                                          <option value="" selected>Month</option>
                                          <option value="01">January</option>
                                          <option value="02">February</option>
                                          <option value="03">March</option>
                                          <option value="04">April</option>
                                          <option value="05">May</option>
                                          <option value="06">June</option>
                                          <option value="07">July</option>
                                          <option value="08">August</option>
                                            <option value="09">September</option>
                                          <option value="10">October</option>
                                          <option value="11">November</option>
                                          <option value="12">December</option>
                                        </select>
                                    </div>
                                    <div class="col-xs-4">
                                        <select name="dobY" id="dobY" class="form-control">
                                          <option value="" selected>Year</option>
                                          <option value="2018">2018</option>
                                          <option value="2017">2017</option>
                                          <option value="2016">2016</option>
                                          <option value="2015">2015</option>
                                          <option value="2014">2014</option>
                                          <option value="2013">2013</option>
                                          <option value="2012">2012</option>
                                          <option value="2011">2011</option>
                                            <option value="2010">2010</option>
                                          <option value="2009">2009</option>
                                          <option value="2008">2008</option>
                                          <option value="2007">2007</option>
                                          <option value="2006">2006</option>
                                          <option value="2005">2005</option>
                                          <option value="2004">2004</option>
                                          <option value="2003">2003</option>
                                            <option value="2002">2002</option>
                                          <option value="2001">2001</option>
                                          <option value="2000">2000</option>
                                          <option value="1999">1999</option>
                                          <option value="1998">1998</option>
                                          <option value="1997">1997</option>
                                          <option value="1996">1996</option>
                                            <option value="1995">1995</option>
                                          <option value="1994">1994</option>
                                          <option value="1993">1993</option>
                                          <option value="1992">1992</option>
                                          <option value="1991">1991</option>
                                          <option value="1990">1990</option>
                                          <option value="1989">1989</option>
                                          <option value="1988">1988</option>
                                          <option value="1987">1987</option>
                                          <option value="1986">1986</option>
                                          <option value="1985">1985</option>
                                          <option value="1984">1984</option>
                                          <option value="1983">1983</option>
                                          <option value="1982">1982</option>
                                          <option value="1981">1981</option>
                                          <option value="1980">1980</option>
                                          <option value="1979">1979</option>
                                          <option value="1978">1978</option>
                                          <option value="1977">1977</option>
                                          <option value="1976">1976</option>
                                          <option value="1975">1975</option>
                                          <option value="1974">1974</option>
                                          <option value="1973">1973</option>
                                          <option value="1972">1972</option>
                                          <option value="1971">1971</option>
                                          <option value="1970">1970</option>
                                          <option value="1969">1969</option>
                                          <option value="1968">1968</option>
                                          <option value="1967">1967</option>
                                          <option value="1966">1966</option>
                                          <option value="1965">1965</option>
                                          <option value="1964">1964</option>
                                          <option value="1963">1963</option>
                                          <option value="1962">1962</option>
                                          <option value="1961">1961</option>
                                          <option value="1960">1960</option>
                                          <option value="1959">1959</option>
                                          <option value="1958">1958</option>
                                          <option value="1957">1957</option>
                                          <option value="1956">1956</option>
                                          <option value="1955">1955</option>
                                          <option value="1954">1954</option>
                                          <option value="1953">1953</option>
                                          <option value="1952">1952</option>
                                          <option value="1951">1951</option>
                                          <option value="1950">1950</option>
                                          <option value="1949">1949</option>
                                          <option value="1948">1948</option>
                                          <option value="1947">1947</option>
                                          <option value="1946">1946</option>
                                          <option value="1945">1945</option>
                                          <option value="1944">1944</option>
                                          <option value="1943">1943</option>
                                          <option value="1942">1942</option>
                                          <option value="1941">1941</option>
                                          <option value="1940">1940</option>
                                          <option value="1939">1939</option>
                                          <option value="1938">1938</option>
                                          <option value="1937">1937</option>
                                          <option value="1936">1936</option>
                                          <option value="1935">1935</option>
                                          <option value="1934">1934</option>
                                          <option value="1933">1933</option>
                                          <option value="1932">1932</option>
                                          <option value="1931">1931</option>
                                          <option value="1930">1930</option>
                                          <option value="1929">1929</option>
                                          <option value="1928">1928</option>
                                          <option value="1927">1927</option>
                                          <option value="1926">1926</option>
                                          <option value="1925">1925</option>
                                          <option value="1924">1924</option>
                                          <option value="1923">1923</option>
                                          <option value="1922">1922</option>
                                          <option value="1921">1921</option>
                                          <option value="1920">1920</option>
                                          <option value="1919">1919</option>
                                          <option value="1918">1918</option>
                                          <option value="1917">1917</option>
                                          <option value="1916">1916</option>
                                          <option value="1915">1915</option>
                                          <option value="1914">1914</option>
                                          <option value="1913">1913</option>
                                          <option value="1912">1912</option>
                                          <option value="1911">1911</option>
                                          <option value="1910">1910</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="moreinfo">About Me: </label>
                                <textarea name="moreinfo" class="form-control" id="moreinfo" rows="5"></textarea>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="agree" id="agree">
                                    By checking the box, you agree to our <a href='WebsiteTermsandConditions.html' class="tncLink" target="_blank">Terms and Conditions</a>, as well as our <a href='WebsitePrivacyPolicy.html' class="tncLink" target="_blank">Privacy Policy</a>.
                                </label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="signup" type="submit" value="Sign Up">
                            <button type="button" class="btn cancelBtn" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
<!--        Forgot password form-->
        <form method="post" id="passwordForm">
            <div class="modal" id="passwordModal" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a class="close" data-dismiss="modal">&times;</a>
                            <h4 id="myModalLabel">Enter your email address below to recover your account and set a new password:</h4>
                        </div>
                        <div class="modal-body">
<!--                            forgot password message for php file-->
                            <div id="passwordMessage"></div>
<!--                            Forgot Password form-->
                            <div class="form-group">
                                <label for="passwordemail" class="sr-only">Email</label>
                                <input class="form-control" type="email" id="passwordemail" name="passwordemail" placeholder="Email" maxlength="50">  
                            </div>                       
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="forgotpassword" type="submit" value="Submit">
                            <button type="button" class="btn cancelBtn" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn cancelBtn pull-left" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">Register</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>


        <!--    Footer-->
       <?php include("footer.php"); ?>
        
        <!--        Spinner-->
        <div id="spinner">
            <img src="css/images/ajax-loader.gif" width="64" height="64"/>
            <br /> Loading ...
        </div>  
        
<!--      Here Maps API Java-->
      <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js"></script>
      <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js"></script>
      <script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js"></script>
      <script src="https://js.api.here.com/v3/3.1/mapsjs-mapevents.js"></script>
            
        <script src="js/sticky.js"></script>
        <script src="js/nav.js"></script>
        <script src="js/user.js"></script>
        <script src="js/gameprofile.js"></script>
<!--        <script src="profile.js"></script>-->
        <script>
            $(function(){
                $("#profile").addClass('active');
            });
        </script>
    </body>
</html>