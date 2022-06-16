<?php
session_start();
include("connection.php");

$user_id = $_SESSION['user_id'];
$event_id = $_SESSION['event_id'];

$sql = "SELECT * FROM tournament_attendance WHERE event_id='$event_id' LIMIT 1";
$result = mysqli_query($link, $sql);
if($result){
    if(mysqli_num_rows($result)>0){
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $player1 = $row['player1_id'];
        $player2 = $row['player2_id'];
        $player3 = $row['player3_id'];
        $player4 = $row['player4_id'];
        $player5 = $row['player5_id'];
        $player6 = $row['player6_id'];
        $player7 = $row['player7_id'];
        $player8 = $row['player8_id'];
        
        if($player1 != '0' && $player1 != NULL){
            $sql01 = "SELECT * FROM users WHERE user_id='$player1'";
            $result01 = mysqli_query($link, $sql01);
            if(mysqli_num_rows($result01)>0){
                $row01 = mysqli_fetch_array($result01, MYSQLI_ASSOC);
                $usernamep1 = $row01['username'];
                $profilepicp1 = $row01['profilepicture'];
            }
        }else{
            $usernamep1 = "Not Yet Registered";
        }
        
        if($player2 != '0' && $player2 != NULL){
            $sql02 = "SELECT * FROM users WHERE user_id='$player2'";
            $result02 = mysqli_query($link, $sql02);
            if(mysqli_num_rows($result02)>0){
                $row02 = mysqli_fetch_array($result02, MYSQLI_ASSOC);
                $usernamep2 = $row02['username'];
                $profilepicp2 = $row02['profilepicture'];
            }
        }else{
            $usernamep2 = "Not Yet Registered";
        }
        
        if($player3 != '0' && $player3 != NULL){
            $sql03 = "SELECT * FROM users WHERE user_id='$player3'";
            $result03 = mysqli_query($link, $sql03);
            if(mysqli_num_rows($result03)>0){
                $row03 = mysqli_fetch_array($result03, MYSQLI_ASSOC);
                $usernamep3 = $row03['username'];
                $profilepicp3 = $row03['profilepicture'];
            }
        }else{
            $usernamep3 = "Not Yet Registered";
        }
        
        if($player4 != '0' && $player4 != NULL){
            $sql04 = "SELECT * FROM users WHERE user_id='$player4'";
            $result04 = mysqli_query($link, $sql04);
            if(mysqli_num_rows($result04)>0){
                $row04 = mysqli_fetch_array($result04, MYSQLI_ASSOC);
                $usernamep4 = $row04['username'];
                $profilepicp4 = $row04['profilepicture'];
            }
        }else{
            $usernamep4 = "Not Yet Registered";
        }
        
        if($player5 != '0' && $player5 != NULL){
            $sql05 = "SELECT * FROM users WHERE user_id='$player5'";
            $result05 = mysqli_query($link, $sql05);
            if(mysqli_num_rows($result05)>0){
                $row05 = mysqli_fetch_array($result05, MYSQLI_ASSOC);
                $usernamep5 = $row05['username'];
                $profilepicp5 = $row05['profilepicture'];
            }
        }else{
            $usernamep5 = "Not Yet Registered";
        }
        
        if($player6 != '0' && $player6 != NULL){
            $sql06 = "SELECT * FROM users WHERE user_id='$player6'";
            $result06 = mysqli_query($link, $sql06);
            if(mysqli_num_rows($result06)>0){
                $row06 = mysqli_fetch_array($result06, MYSQLI_ASSOC);
                $usernamep6 = $row06['username'];
                $profilepicp6 = $row06['profilepicture'];
            }
        }else{
            $usernamep6 = "Not Yet Registered";
        }
        
        if($player7 != '0' && $player7 != NULL){
            $sql07 = "SELECT * FROM users WHERE user_id='$player7'";
            $result07 = mysqli_query($link, $sql07);
            if(mysqli_num_rows($result07)>0){
                $row07 = mysqli_fetch_array($result07, MYSQLI_ASSOC);
                $usernamep7 = $row07['username'];
                $profilepicp7 = $row07['profilepicture'];
            }
        }else{
            $usernamep7 = "Not Yet Registered";
        }
        
        if($player8 != '0' && $player8 != NULL){
            $sql08 = "SELECT * FROM users WHERE user_id='$player8'";
            $result08 = mysqli_query($link, $sql08);
            if(mysqli_num_rows($result08)>0){
                $row08 = mysqli_fetch_array($result08, MYSQLI_ASSOC);
                $usernamep8 = $row08['username'];
                $profilepicp8 = $row08['profilepicture'];
            }
        }else{
            $usernamep8 = "Not Yet Registered";
        }

        $player1wins = $row['p1_wins'];
        $player2wins = $row['p2_wins'];
        $player3wins = $row['p3_wins'];
        $player4wins = $row['p4_wins'];
        $player5wins = $row['p5_wins'];
        $player6wins = $row['p6_wins'];
        $player7wins = $row['p7_wins'];
        $player8wins = $row['p8_wins'];
        
        $stage = $row['stage_number'];
        
        echo "
            <h1>";
        if($stage == '0'){
            echo "Welcome to Stage 1 ";
        }elseif($stage == '1'){
            echo "Welcome to The Semi-Final ";
        }elseif($stage == '2'){
            echo "Welcome to The Final ";
        }elseif($stage == '3'){
            echo "Congratulations to the Winner ";
        }
        
        echo "of the Tournament: $eventname</h1>
            <div class='btnContainer'>
                <button type='button' class='btn btnColor resettournBtn' data-toggle='modal' data-target='#resetTournamentModal' data-event_id='$event_id'>Reset Tournament</button>
                <button type='button' class='btn btnDone nxtstageBtn' data-toggle='modal' data-target='#nextStageModal' data-event_id='$event_id'>Next Stage</button>
            </div>
            <div class='container'>
                ";
        
        if($stage == '0'){
                echo "
                <div class='row'>
                    <div class='col-xs-3 match1'>
                        <table>
                            <tr><th></th><th>Stage 1, Match 1</th></tr>
                            <tr class='playerrow'><td><img class='tournProfilePic' src='$profilepicp1'></td><td> <a href='../profilepage.php?username=$usernamep1'>$usernamep1</a></td></tr>
                            <tr class='playerrow'><td><img src='$profilepicp2'></td><td> <a href='profilepage.php?username=$usernamep2'>$usernamep2</a></td></tr>
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal1' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                    <div class='col-xs-offset-6 col-xs-3 match2'>
                        <table>
                            <tr><th></th><th>Stage 1, Match 2</th></tr>
                            <tr class='playerrow'><td><img src='$profilepicp3'></td><td> <a href='profilepage.php?username=$usernamep3'>$usernamep3</a></td></tr>
                            <tr class='playerrow'><td><img src='$profilepicp4'></td><td> <a href='profilepage.php?username=$usernamep4'>$usernamep4</a></td></tr>
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal2' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xs-offset-3 col-xs-2 nextmatch1'>
                        <table>
                            <tr><th></th><th>Semi-Final 1</th></tr>
                            ";
                if($player1wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp1'></td><td> <a href='profilepage.php?username=$usernamep1'>$usernamep1</a></td></tr>";
                }elseif($player2wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp2'></td><td> <a href='profilepage.php?username=$usernamep2'>$usernamep2</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Match 1</td></tr>";
                }
                if($player5wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp5'></td><td> <a href='profilepage.php?username=$usernamep5'>$usernamep5</a></td></tr>";
                }elseif($player6wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp6'></td><td> <a href='profilepage.php?username=$usernamep6'>$usernamep6</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Match 3</td></tr>";
                }
                        echo "
                            
                        </table>
                    </div>
                    <div class='col-sm-offset-1 col-xs-offset-2 col-xs-2 nextmatch2'>
                        <table>
                            <tr><th></th><th>Semi-Final 2</th></tr>
                            ";
                if($player3wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp3'></td><td> <a href='profilepage.php?username=$usernamep3'>$usernamep3</a></td></tr>";
                }elseif($player4wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp4'></td><td> <a href='profilepage.php?username=$usernamep4'>$usernamep4</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Match 2</td></tr>";
                }
                if($player7wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp7'></td><td> <a href='profilepage.php?username=$usernamep7'>$usernamep7</a></td></tr>";
                }elseif($player8wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp8'></td><td> <a href='profilepage.php?username=$usernamep8'>$usernamep8</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Match 4</td></tr>";
                }
                        echo "
                            
                        </table>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xs-3 match3'>
                        <table>
                            <tr><th></th><th>Stage 1, Match 3</th></tr>
                            <tr class='playerrow'><td><img src='$profilepicp5'></td><td> <a href='profilepage.php?username=$usernamep5'>$usernamep5</a></td></tr>
                            <tr class='playerrow'><td><img src='$profilepicp6'></td><td> <a href='profilepage.php?username=$usernamep6'>$usernamep6</a></td></tr>
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal3' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                    <div class='col-xs-offset-6 col-xs-3 match4'>
                        <table>
                            <tr><th></th><th>Stage 1, Match 4</th></tr>
                            <tr class='playerrow'><td><img src='$profilepicp7'></td><td> <a href='profilepage.php?username=$usernamep7'>$usernamep7</a></td></tr>
                            <tr class='playerrow'><td><img src='$profilepicp8'></td><td> <a href='profilepage.php?username=$usernamep8'>$usernamep8</a></td></tr>
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal4' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                </div>
                
                ";
        }elseif($stage == '1'){
                echo "
                <div class='row'>
                    <div class='col-xs-3 match1'>
                        <table>
                            <tr><th></th><th>Semi-Final 1</th></tr>
                            ";
                if($player1wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp1'></td><td> <a href='profilepage.php?username=$usernamep1'>$usernamep1</a></td></tr>";
                }elseif($player2wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp2'></td><td> <a href='profilepage.php?username=$usernamep2'>$usernamep2</a></td></tr>";
                }
                
                if($player5wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp5'></td><td> <a href='profilepage.php?username=$usernamep5'>$usernamep5</a></td></tr>";
                }elseif($player6wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp6'></td><td> <a href='profilepage.php?username=$usernamep6'>$usernamep6</a></td></tr>";
                }
                            echo "
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal1' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                    
                    <div class='col-xs-offset-2 col-xs-2 nextmatch1'>
                        <table>
                            <tr><th></th><th>Final</th></tr>
                            ";
                if($player1wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp1'></td><td> <a href='profilepage.php?username=$usernamep1'>$usernamep1</a></td></tr>";
                }elseif($player2wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp2'></td><td> <a href='profilepage.php?username=$usernamep2'>$usernamep2</a></td></tr>";
                }elseif($player5wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp5'></td><td> <a href='profilepage.php?username=$usernamep5'>$usernamep5</a></td></tr>";
                }elseif($player6wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp6'></td><td> <a href='profilepage.php?username=$usernamep6'>$usernamep6</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Match 1</td></tr>";
                }
                
                if($player3wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp3'></td><td> <a href='profilepage.php?username=$usernamep3'>$usernamep3</a></td></tr>";
                }elseif($player4wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp4'></td><td> <a href='profilepage.php?username=$usernamep4'>$usernamep4</a></td></tr>";
                }elseif($player7wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp7'></td><td> <a href='profilepage.php?username=$usernamep7'>$usernamep7</a></td></tr>";
                }elseif($player8wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp8'></td><td> <a href='profilepage.php?username=$usernamep8'>$usernamep8</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Match 2</td></tr>";
                }
                        echo "
                            
                        </table>
                    </div>
                    
                    <div class='col-xs-offset-2 col-xs-3 match2'>
                        <table>
                            <tr><th></th><th>Semi-Final 2</th></tr>
                            ";
                if($player3wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp3'></td><td> <a href='profilepage.php?username=$usernamep3'>$usernamep3</a></td></tr>";
                }elseif($player4wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp4'></td><td> <a href='profilepage.php?username=$usernamep4'>$usernamep4</a></td></tr>";
                }
                
                if($player7wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp7'></td><td> <a href='profilepage.php?username=$usernamep7'>$usernamep7</a></td></tr>";
                }elseif($player8wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp8'></td><td> <a href='profilepage.php?username=$usernamep8'>$usernamep8</a></td></tr>";
                }
                            echo "
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal2' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                    
                </div>
                
                ";
                
        }elseif($stage == '2'){
                echo "
                <div class='row'>
                    <div class='col-xs-offset-4 col-xs-4 match1'>
                        <table>
                            <tr><th></th><th>Final</th></tr>
                            ";
                   
                if($player1wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp1'></td><td> <a href='profilepage.php?username=$usernamep1'>$usernamep1</a></td></tr>";
                }elseif($player2wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp2'></td><td> <a href='profilepage.php?username=$usernamep2'>$usernamep2</a></td></tr>";
                }elseif($player5wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp5'></td><td> <a href='profilepage.php?username=$usernamep5'>$usernamep5</a></td></tr>";
                }elseif($player6wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp6'></td><td> <a href='profilepage.php?username=$usernamep6'>$usernamep6</a></td></tr>";
                }
                
                if($player3wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp3'></td><td> <a href='profilepage.php?username=$usernamep3'>$usernamep3</a></td></tr>";
                }elseif($player4wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp4'></td><td> <a href='profilepage.php?username=$usernamep4'>$usernamep4</a></td></tr>";
                }elseif($player7wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp7'></td><td> <a href='profilepage.php?username=$usernamep7'>$usernamep7</a></td></tr>";
                }elseif($player8wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp8'></td><td> <a href='profilepage.php?username=$usernamep8'>$usernamep8</a></td></tr>";
                }
                echo "
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal1' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                </div>";
        }elseif($stage == '3'){
            echo "
                <div class='row'>
                    <div class='col-xs-offset-4 col-xs-4 tournwinner'>
                            ";
                   
                if($player1wins == $stage){
                    echo "<img src='$profilepicp1'> <a href='profilepage.php?username=$usernamep1'>$usernamep1</a>";
                }elseif($player2wins == $stage){
                    echo "<img src='$profilepicp2'> <a href='profilepage.php?username=$usernamep2'>$usernamep2</a>";
                }elseif($player5wins == $stage){
                    echo "<img src='$profilepicp5'> <a href='profilepage.php?username=$usernamep5'>$usernamep5</a>";
                }elseif($player6wins == $stage){
                    echo "<img src='$profilepicp6'> <a href='profilepage.php?username=$usernamep6'>$usernamep6</a>";
                }elseif($player3wins == $stage){
                    echo "<img src='$profilepicp3'> <a href='profilepage.php?username=$usernamep3'>$usernamep3</a>";
                }elseif($player4wins == $stage){
                    echo "<img src='$profilepicp4'> <a href='profilepage.php?username=$usernamep4'>$usernamep4</a>";
                }elseif($player7wins == $stage){
                    echo "<img src='$profilepicp7'> <a href='profilepage.php?username=$usernamep7'>$usernamep7</a>";
                }elseif($player8wins == $stage){
                    echo "<img src='$profilepicp8'> <a href='profilepage.php?username=$usernamep8'>$usernamep8</a>";
                }
                echo "
                    </div>
                </div>";
        }
            echo "  
            </div>
            ";
        
//        Modals
        if($stage == '0'){
                echo "
                <form method='post' id='match1Form'>
                    <div class='modal' id='declareWinnerModal1' role='dialog' aria-labelledby='declareWinnerModalLabel1' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel1'>Match 1:</h4>
                                </div>
                                <div class='modal-body'>
                                    <div class='declareWinnerMessage'></div>
                                    <div class='form-group'>
                                        <label for='declareResult'>How Are You Declaring the Winner?</label>
                                        <select name='declareResult' id='declareResult' class='form-control'>
                                              <option value='' selected>Select Method</option>
                                              <option value='1'>Input Rounds</option>
                                              <option value='2'>Declare Winner</option>
                                            </select>   
                                    </div>
                                    <div class='form-group resultInput'>
                                        <div class='row'>
                                            <div class='col-xs-4 roundsLeft'>
                                                <label for='player1rounds'>$usernamep1</label>
                                                <input class='form-control' type='number' id='player1rounds' name='player1rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player2rounds'>$usernamep2</label>
                                                <input class='form-control' type='number' id='player2rounds' name='player2rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner1' value='player1'>
                                                    $usernamep1                         
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner2' value='player2'>
                                                    $usernamep2
                                                </label>
                                            </div>
                                        </div>
                                    </div>  
                                </div> 
                                <div class='modal-footer'>
                                    <input class='btn btnColor' name='declareWinner' type='submit' value='Declare Winner'>
                                    <button type='button' class='btn cancelBtn' data-dismiss='modal'>Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>        
                </form>
                
                <form method='post' id='match2Form'>
                    <div class='modal' id='declareWinnerModal2' role='dialog' aria-labelledby='declareWinnerModalLabel2' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel2'>Match 2:</h4>
                                </div>
                                <div class='modal-body'>
                                    <div class='declareWinnerMessage'></div>
                                    <div class='form-group'>
                                        <label for='declareResult'>How Are You Declaring the Winner?</label>
                                        <select name='declareResult' id='declareResult' class='form-control'>
                                              <option value='' selected>Select Method</option>
                                              <option value='1'>Input Rounds</option>
                                              <option value='2'>Declare Winner</option>
                                            </select>   
                                    </div>
                                    <div class='form-group resultInput'>
                                        <div class='row'>
                                            <div class='col-xs-4 roundsLeft'>
                                                <label for='player3rounds'>$usernamep3</label>
                                                <input class='form-control' type='number' id='player3rounds' name='player3rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player4rounds'>$usernamep4</label>
                                                <input class='form-control' type='number' id='player4rounds' name='player4rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner3' value='player3'>
                                                    $usernamep3                         
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner4' value='player4'>
                                                    $usernamep4
                                                </label>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                                <div class='modal-footer'>
                                    <input class='btn btnColor' name='declareWinner' type='submit' value='Declare Winner'>
                                    <button type='button' class='btn cancelBtn' data-dismiss='modal'>Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>        
                </form>
                
                <form method='post' id='match3Form'>
                    <div class='modal' id='declareWinnerModal3' role='dialog' aria-labelledby='declareWinnerModalLabel3' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel3'>Match 3:</h4>
                                </div>
                                <div class='modal-body'>
                                    <div class='declareWinnerMessage'></div>
                                    <div class='form-group'>
                                        <label for='declareResult'>How Are You Declaring the Winner?</label>
                                        <select name='declareResult' id='declareResult' class='form-control'>
                                              <option value='' selected>Select Method</option>
                                              <option value='1'>Input Rounds</option>
                                              <option value='2'>Declare Winner</option>
                                            </select>   
                                    </div>
                                    <div class='form-group resultInput'>
                                        <div class='row'>
                                            <div class='col-xs-4 roundsLeft'>
                                                <label for='player5rounds'>$usernamep5</label>
                                                <input class='form-control' type='number' id='player5rounds' name='player5rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player6rounds'>$usernamep6</label>
                                                <input class='form-control' type='number' id='player6rounds' name='player6rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner5' value='player5'>
                                                    $usernamep5                         
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner6' value='player6'>
                                                    $usernamep6
                                                </label>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                                <div class='modal-footer'>
                                    <input class='btn btnColor' name='declareWinner' type='submit' value='Declare Winner'>
                                    <button type='button' class='btn cancelBtn' data-dismiss='modal'>Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>        
                </form>
                
                <form method='post' id='match4Form'>
                    <div class='modal' id='declareWinnerModal4' role='dialog' aria-labelledby='declareWinnerModalLabel4' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel4'>Match 4:</h4>
                                </div>
                                <div class='modal-body'>
                                    <div class='declareWinnerMessage'></div>
                                    <div class='form-group'>
                                        <label for='declareResult'>How Are You Declaring the Winner?</label>
                                        <select name='declareResult' id='declareResult' class='form-control'>
                                              <option value='' selected>Select Method</option>
                                              <option value='1'>Input Rounds</option>
                                              <option value='2'>Declare Winner</option>
                                            </select>   
                                    </div>
                                    <div class='form-group resultInput'>
                                        <div class='row'>
                                            <div class='col-xs-4 roundsLeft'>
                                                <label for='player7rounds'>$usernamep7</label>
                                                <input class='form-control' type='number' id='player7rounds' name='player7rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player8rounds'>$usernamep8</label>
                                                <input class='form-control' type='number' id='player8rounds' name='player8rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner7' value='player7'>
                                                    $usernamep7                         
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner8' value='player8'>
                                                    $usernamep8
                                                </label>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                                <div class='modal-footer'>
                                    <input class='btn btnColor' name='declareWinner' type='submit' value='Declare Winner'>
                                    <button type='button' class='btn cancelBtn' data-dismiss='modal'>Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>        
                </form>
                ";
        }elseif($stage == '1'){
                echo "
                <form method='post' id='match1Form'>
                    <div class='modal' id='declareWinnerModal1' role='dialog' aria-labelledby='declareWinnerModalLabel1' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel1'>Match 1:</h4>
                                </div>
                                <div class='modal-body'>
                                    <div class='declareWinnerMessage'></div>
                                    <div class='form-group'>
                                        <label for='declareResult'>How Are You Declaring the Winner?</label>
                                        <select name='declareResult' id='declareResult' class='form-control'>
                                              <option value='' selected>Select Method</option>
                                              <option value='1'>Input Rounds</option>
                                              <option value='2'>Declare Winner</option>
                                            </select>   
                                    </div>
                                    <div class='form-group resultInput'>
                                        <div class='row'>
                                            <div class='col-xs-4 roundsLeft'>
                                                <label for='player1rounds'>";
                                        if($player1wins == $stage){
                                            echo "$usernamep1";
                                        }elseif($player2wins == $stage){
                                            echo "$usernamep2";
                                        }
                                            echo "
                                                </label>
                                                <input class='form-control' type='number' id='player1rounds' name='player1rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player2rounds'>";
                                        if($player5wins == $stage){
                                            echo "$usernamep5";
                                        }elseif($player6wins == $stage){
                                            echo "$usernamep6";
                                        }
                                            echo "
                                                </label>
                                                <input class='form-control' type='number' id='player2rounds' name='player2rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner1'";
                                        if($player1wins == $stage){
                                            echo "value='player1'>
                                                    $usernamep1";
                                        }elseif($player2wins == $stage){
                                            echo "value='player2'>
                                                    $usernamep2";
                                        }
                                            echo "                          
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner2'";
                                        if($player5wins == $stage){
                                            echo "value='player5'>
                                                    $usernamep5";
                                        }elseif($player6wins == $stage){
                                            echo "value='player6'>
                                                    $usernamep6";
                                        }
                                            echo "
                                                </label>
                                            </div>
                                        </div>
                                    </div>  
                                </div> 
                                <div class='modal-footer'>
                                    <input class='btn btnColor' name='declareWinner' type='submit' value='Declare Winner'>
                                    <button type='button' class='btn cancelBtn' data-dismiss='modal'>Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>        
                </form>
                
                <form method='post' id='match2Form'>
                    <div class='modal' id='declareWinnerModal2' role='dialog' aria-labelledby='declareWinnerModalLabel2' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel2'>Match 2:</h4>
                                </div>
                                <div class='modal-body'>
                                    <div class='declareWinnerMessage'></div>
                                    <div class='form-group'>
                                        <label for='declareResult'>How Are You Declaring the Winner?</label>
                                        <select name='declareResult' id='declareResult' class='form-control'>
                                              <option value='' selected>Select Method</option>
                                              <option value='1'>Input Rounds</option>
                                              <option value='2'>Declare Winner</option>
                                            </select>   
                                    </div>
                                    <div class='form-group resultInput'>
                                        <div class='row'>
                                            <div class='col-xs-4 roundsLeft'>
                                                <label for='player3rounds'>";
                                        if($player3wins == $stage){
                                            echo "$usernamep3";
                                        }elseif($player4wins == $stage){
                                            echo "$usernamep4";
                                        }
                                            echo "</label>
                                                <input class='form-control' type='number' id='player3rounds' name='player3rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player4rounds'>";
                                        if($player7wins == $stage){
                                            echo "$usernamep7";
                                        }elseif($player8wins == $stage){
                                            echo "$usernamep8";
                                        }
                                            echo "</label>
                                                <input class='form-control' type='number' id='player4rounds' name='player4rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner3'";
                                        if($player3wins == $stage){
                                            echo "value='player3'>
                                                    $usernamep3";
                                        }elseif($player4wins == $stage){
                                            echo "value='player4'>
                                                    $usernamep4";
                                        }
                                            echo "     
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner4'";
                                        if($player7wins == $stage){
                                            echo "value='player7'>
                                                    $usernamep7";
                                        }elseif($player8wins == $stage){
                                            echo "value='player8'>
                                                    $usernamep8";
                                        }
                                            echo "                          
                                                </label>
                                            </div>
                                        </div>
                                    </div>  
                                </div>
                                <div class='modal-footer'>
                                    <input class='btn btnColor' name='declareWinner' type='submit' value='Declare Winner'>
                                    <button type='button' class='btn cancelBtn' data-dismiss='modal'>Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>        
                </form>";
        }elseif($stage == '2'){
                echo "
                <form method='post' id='match1Form'>
                    <div class='modal' id='declareWinnerModal1' role='dialog' aria-labelledby='declareWinnerModalLabel1' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel1'>Match 1:</h4>
                                </div>
                                <div class='modal-body'>
                                    <div class='declareWinnerMessage'></div>
                                    <div class='form-group'>
                                        <label for='declareResult'>How Are You Declaring the Winner?</label>
                                        <select name='declareResult' id='declareResult' class='form-control'>
                                              <option value='' selected>Select Method</option>
                                              <option value='1'>Input Rounds</option>
                                              <option value='2'>Declare Winner</option>
                                            </select>   
                                    </div>
                                    <div class='form-group resultInput'>
                                        <div class='row'>
                                            <div class='col-xs-4 roundsLeft'>
                                                <label for='player1rounds'>";
                                        if($player1wins == $stage){
                                            echo "$usernamep1";
                                        }elseif($player2wins == $stage){
                                            echo "$usernamep2";
                                        }elseif($player5wins == $stage){
                                            echo "$usernamep5";
                                        }elseif($player6wins == $stage){
                                            echo "$usernamep6";
                                        }
                                            echo "
                                                </label>
                                                <input class='form-control' type='number' id='player1rounds' name='player1rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player2rounds'>";
                                        if($player3wins == $stage){
                                            echo "$usernamep3";
                                        }elseif($player4wins == $stage){
                                            echo "$usernamep4";
                                        }elseif($player7wins == $stage){
                                            echo "$usernamep7";
                                        }elseif($player8wins == $stage){
                                            echo "$usernamep8";
                                        }
                                            echo "
                                                </label>
                                                <input class='form-control' type='number' id='player2rounds' name='player2rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner1'";
                                        if($player1wins == $stage){
                                            echo "value='player1'>
                                                    $usernamep1";
                                        }elseif($player2wins == $stage){
                                            echo "value='player2'>
                                                    $usernamep2";
                                        }elseif($player5wins == $stage){
                                            echo "value='player5'>
                                                    $usernamep5";
                                        }elseif($player6wins == $stage){
                                            echo "value='player6'>
                                                    $usernamep6";
                                        }
                                            echo "                          
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner2'";
                                        if($player3wins == $stage){
                                            echo "value='player3'>
                                                    $usernamep3";
                                        }elseif($player4wins == $stage){
                                            echo "value='player4'>
                                                    $usernamep4";
                                        }elseif($player7wins == $stage){
                                            echo "value='player7'>
                                                    $usernamep7";
                                        }elseif($player8wins == $stage){
                                            echo "value='player8'>
                                                    $usernamep8";
                                        }
                                            echo "
                                                </label>
                                            </div>
                                        </div>
                                    </div>  
                                </div> 
                                <div class='modal-footer'>
                                    <input class='btn btnColor' name='declareWinner' type='submit' value='Declare Winner'>
                                    <button type='button' class='btn cancelBtn' data-dismiss='modal'>Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>        
                </form>";
        }
        
    }else{
        echo "<div class='alert alert-warning'>You are not attending any events yet!</div>";
    }
}else{
    echo "<div class='alert alert-warning'>SQL Error!</div>";
}

?>