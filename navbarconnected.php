<?php
$user_id = $_SESSION['user_id'];

//get username
$sql = "SELECT * FROM users WHERE user_id='$user_id'";
$result = mysqli_query($link, $sql);
$count = mysqli_num_rows($result);
   
if($count == 1){
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $username = $row['username'];
    $picture = $row['profilepicture'];
}else{
    echo "<div class='alert alert-danger'>There was an error retrieving the username from the database.</div>";
}

$sql4 = "SELECT COUNT(*) AS count FROM user_links WHERE friend_status='1' AND (user1_id='$user_id' OR user2_id='$user_id')";
$result4 = mysqli_query($link, $sql4);
$friendCount = mysqli_fetch_assoc($result4)['count'];

$sql5 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_follow_user2='1' AND user1_id='$user_id') OR (user2_follow_user1='1' AND user2_id='$user_id')";
$result5 = mysqli_query($link, $sql5);
$followingCount = mysqli_fetch_assoc($result5)['count'];

$sql6 = "SELECT COUNT(*) AS count FROM user_links WHERE (user2_follow_user1='1' AND user1_id='$user_id') OR (user1_follow_user2='1' AND user2_id='$user_id')";
$result6 = mysqli_query($link, $sql6);
$followerCount = mysqli_fetch_assoc($result6)['count'];

$sql7 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_host_vote='2' AND user1_id='$user_id') OR (user2_host_vote='2' AND user2_id='$user_id')";
$result7 = mysqli_query($link, $sql7);
$upvoteHCount = mysqli_fetch_assoc($result7)['count'];

$sql8 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_host_vote='1' AND user1_id='$user_id') OR (user2_host_vote='1' AND user2_id='$user_id')";
$result8 = mysqli_query($link, $sql8);
$downvoteHCount = mysqli_fetch_assoc($result8)['count'];

$sql9 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_player_vote='2' AND user1_id='$user_id') OR (user2_player_vote='2' AND user2_id='$user_id')";
$result9 = mysqli_query($link, $sql9);
$upvotePCount = mysqli_fetch_assoc($result9)['count'];

$sql10 = "SELECT COUNT(*) AS count FROM user_links WHERE (user1_player_vote='1' AND user1_id='$user_id') OR (user2_player_vote='1' AND user2_id='$user_id')";
$result10 = mysqli_query($link, $sql10);
$downvotePCount = mysqli_fetch_assoc($result10)['count'];

$totalHRep = $upvoteHCount - $downvoteHCount;
$totalPRep = $upvotePCount - $downvotePCount;

?>     

        <nav role="navigation" id="navbar_top" class="navbar navbar-custom navbar-center">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbarCollapse">
                    <ul class="nav navbar-nav">
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="../detectadventure.php">Detect Adventure</a></li>
<!--                        <li><a href="adventurermanager.php">Adventurer Manager</a></li>-->
                        <li><a href="../shop.php">Shop</a></li>
                        <li>
                            <div class='expandable__btn__wrapper navprofilebarbutton' data-toggle="tooltip" title="Toggle Profile Bar" data-js-nav-expander>
                                <?php
                                if(empty($picture)){
                                    echo "<img src='css/profilepics/angel.png' class='navProfilePic profilebarpic content__btn'>";
                                }else{
                                    echo "<img src='$picture' class='navProfilePic profilebarpic content__btn'>";
                                }
                                ?>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    <div class='profilebarwrapper' id='phoneProfileBar' data-toggle="tooltip" title="Toggle Profile Bar" data-js-nav-expander>
            <?php
            if(empty($picture)){
                echo "<img src='css/profilepics/angel.png' class='navProfilePic profilebarpic content__btn'>";
            }else{
                echo "<img src='$picture' class='navProfilePic profilebarpic content__btn'>";
            }
            ?>
    </div>


<!--      Profile Bar-->
      <div class='profileExpandable' id="profilebarid">
          <div class="profilebarcontent" data-js-expandable-inner>
              <div class="profilebarheader">
                  <div class="profilebarInlineHeader">
                      <a href="../profilepage.php?username=<?php echo $username; ?>" class="profilebarTitle">
                          <p id="profilebarLabel"><strong><?php echo $username; ?></strong></p>
                      </a>
                      <a href="../cart.php">
                          <p><i class="fas fa-shopping-cart"></i>  <?php
                            if(isset($_SESSION['cart'])){
                                $count = count($_SESSION['cart']);
                                echo '<span id="cart_count">'.$count.'</span>';
                            }else{
                                echo '<span id="cart_count">0</span>';
                            }
                              ?></p>
                      </a>
                  </div>
                  
                  <div class="row">
                      <div class='col-xs-5 navbarUser'>
                          <a href="../profilepage.php?username=<?php echo $username; ?>" class="">
                              <div class="navbaruserpicdiv">
                              <?php
                              if(empty($picture)){
                                  echo "<img src='css/profilepics/angel.png' class='modalProfilePic'>";
                              }else{
                                  echo "<img src='$picture' class='modalProfilePic'>";
                              }
                              ?>
                              </div>

                              
                          </a>
                      </div>
                        <div class='col-xs-7 repCol'>
                            <p id="repLabel"><strong>Reputation</strong></p>
                            <table class='table table-condensed repTable'>
                                <tr>
                                    <td class='centredCell'>Host</td>
                                    <?php 
                                        if($totalHRep>0){
                                            echo "
                                                <td class='centredCell drkgrn'>$totalHRep</td>
                                            ";
                                        }elseif($totalHRep<0){
                                             echo "
                                                <td class='centredCell red'>$totalHRep</td>
                                            ";
                                        }else{
                                            echo "
                                                <td class='centredCell'>0</td>
                                            ";
                                        }
                                    ?>
                                    <td class='centredCell drkgrn'>&#8593;:<?php echo $upvoteHCount ?></td>
                                    <td class='centredCell red'>&#8595;:<?php echo $downvoteHCount ?></td>
                                    <td class='centredCell'></td> 
                                </tr>
                                <tr>
                                    <td class='centredCell'>Player</td>
                                    <?php 
                                        if($totalPRep>0){
                                            echo "
                                                <td class='centredCell drkgrn'>$totalPRep</td>
                                            ";
                                        }elseif($totalPRep<0){
                                             echo "
                                                <td class='centredCell red'>$totalPRep</td>
                                            ";
                                        }else{
                                            echo "
                                                <td class='centredCell'>0</td>
                                            ";
                                        }
                                    ?>
                                    
                                    <td class='centredCell drkgrn'>&#8593;:<?php echo $upvotePCount ?></td>
                                    <td class='centredCell red'>&#8595;:<?php echo $downvotePCount ?></td>
                                    <td class='centredCell'></td>
                                    
                                </tr>
                            </table>
                            <table class='table table-condensed friendTable'>
                                <tr>
                                    <td class='centredCell'></td>
                                    <td class='centredCell'><?php echo $friendCount ?></td>
                                    <td class='centredCell'>Friends</td>
                                </tr>
                            </table>
                      </div>
                            <table class='table table-condensed statsTable'>
                                <tr>
                                    <td class='centredCell'></td>
                                    <td class='centredCell'><?php echo $followerCount ?></td>
                                    <td class='centredCell'>Followers</td>
                                    <td class='centredCell'><?php echo $followingCount ?></td>
                                    <td class='centredCell'>Following</td>
                                </tr>
                            </table>
                    </div>
                  </div>
              <div class="profilebarbody">
                  <div class="row">
                      <div class="col-xs-6">
                          <div class="profileActionTitle">
                              <p><strong>Profile Actions:</strong></p>
                          </div>
                          <ul>
                              <li class='profileActions'><a href="../messages.php">Messages</a></li>
                              <li class='profileActions'><a href="../profile.php">Preferances</a></li>
                              <li class='profileActions'><a href="../library.php">My Library</a></li>
                              <li class='profileActions'><a href="../php/logout.php">Logout</a></li>
                          </ul>
                      </div>
                      <div class="col-xs-6">
                          <div class="profileActionTitle">
                              <p><strong>Manager Actions:</strong></p>
                          </div>
                          <ul>
                              <li class='profileActions'><a href="../friendmanager.php">Friends</a></li>
                              <li class='profileActions'><a href="../bookingmanager.php">Bookings</a></li>
                              <li class='profileActions'><a href="../eventsmanager.php">Events</a></li>
                          </ul>
                      </div>
                  </div>
              </div> 
              <div class="profilebarlinks profileModalFooter">
                  <p><strong>Find Us At...</strong></p>
                    <ul class="nav navbar-nav imageContainer">
                        <li><a href="https://www.gmbinder.com/profile/thelittledarkone"><img src="../css/images/gmbinder_logo.png" class="footerImage"></a></li>
                        <li><a href="#"><img src="../css/images/discord_logo.png" class="footerImage"></a></li>
                        <li><a href="https://www.reddit.com/user/thelittledark1"><img src="../css/images/reddit_logo.png" class="footerImage"></a></li>
                    </ul>
              </div>
              <div class="profilebarfooter profileModalFooter">
                  <a href="https://www.patreon.com/thelittledarkone?fan_landing=true">
                      <div class="container-fluid">
                          <div class="row">
                              <div class="col-sm-3">
                                  <img src="../css/images/patreon_mini_logo.png" class="profileMenuPatreon">
                              </div>
                              <div class="col-sm-9 patreonIntro">
                                  <p>If you'd like to buy us a beer, click here to support us on Patreon!</p>
                              </div>
                          </div>
                      </div>
                  </a>
              </div>
          </div>
      </div>


