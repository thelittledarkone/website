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
        $player9 = $row['player9_id'];
        $player10 = $row['player10_id'];
        $player11 = $row['player11_id'];
        $player12 = $row['player12_id'];
        $player13 = $row['player13_id'];
        $player14 = $row['player14_id'];
        $player15 = $row['player15_id'];
        $player16 = $row['player16_id'];
        $player17 = $row['player17_id'];
        $player18 = $row['player18_id'];
        $player19 = $row['player19_id'];
        $player20 = $row['player20_id'];
        $player21 = $row['player21_id'];
        $player22 = $row['player22_id'];
        $player23 = $row['player23_id'];
        $player24 = $row['player24_id'];
        $player25 = $row['player25_id'];
        $player26 = $row['player26_id'];
        $player27 = $row['player27_id'];
        $player28 = $row['player28_id'];
        $player29 = $row['player29_id'];
        $player30 = $row['player30_id'];
        $player31 = $row['player31_id'];
        $player32 = $row['player32_id'];
        
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
        
        if($player9 != '0' && $player9 != NULL){
            $sql09 = "SELECT * FROM users WHERE user_id='$player9'";
            $result09 = mysqli_query($link, $sql09);
            if(mysqli_num_rows($result09)>0){
                $row09 = mysqli_fetch_array($result09, MYSQLI_ASSOC);
                $usernamep9 = $row09['username'];
                $profilepicp9 = $row09['profilepicture'];
            }
        }else{
            $usernamep9 = "Not Yet Registered";
        }
        
        if($player10 != '0' && $player10 != NULL){
            $sql010 = "SELECT * FROM users WHERE user_id='$player10'";
            $result010 = mysqli_query($link, $sql010);
            if(mysqli_num_rows($result010)>0){
                $row010 = mysqli_fetch_array($result010, MYSQLI_ASSOC);
                $usernamep10 = $row010['username'];
                $profilepicp10 = $row010['profilepicture'];
            }
        }else{
            $usernamep10 = "Not Yet Registered";
        }
        
        if($player11 != '0' && $player11 != NULL){
            $sql011 = "SELECT * FROM users WHERE user_id='$player11'";
            $result011 = mysqli_query($link, $sql011);
            if(mysqli_num_rows($result011)>0){
                $row011 = mysqli_fetch_array($result011, MYSQLI_ASSOC);
                $usernamep11 = $row011['username'];
                $profilepicp11 = $row011['profilepicture'];
            }
        }else{
            $usernamep11 = "Not Yet Registered";
        }
        
        if($player12 != '0' && $player12 != NULL){
            $sql012 = "SELECT * FROM users WHERE user_id='$player12'";
            $result012 = mysqli_query($link, $sql012);
            if(mysqli_num_rows($result012)>0){
                $row012 = mysqli_fetch_array($result012, MYSQLI_ASSOC);
                $usernamep12 = $row012['username'];
                $profilepicp12 = $row012['profilepicture'];
            }
        }else{
            $usernamep12 = "Not Yet Registered";
        }
        
        if($player13 != '0' && $player13 != NULL){
            $sql013 = "SELECT * FROM users WHERE user_id='$player13'";
            $result013 = mysqli_query($link, $sql013);
            if(mysqli_num_rows($result013)>0){
                $row013 = mysqli_fetch_array($result013, MYSQLI_ASSOC);
                $usernamep13 = $row013['username'];
                $profilepicp13 = $row013['profilepicture'];
            }
        }else{
            $usernamep13 = "Not Yet Registered";
        }
        
        if($player14 != '0' && $player14 != NULL){
            $sql014 = "SELECT * FROM users WHERE user_id='$player14'";
            $result014 = mysqli_query($link, $sql014);
            if(mysqli_num_rows($result014)>0){
                $row014 = mysqli_fetch_array($result014, MYSQLI_ASSOC);
                $usernamep14 = $row014['username'];
                $profilepicp14 = $row014['profilepicture'];
            }
        }else{
            $usernamep14 = "Not Yet Registered";
        }
        
        if($player15 != '0' && $player15 != NULL){
            $sql015 = "SELECT * FROM users WHERE user_id='$player15'";
            $result015 = mysqli_query($link, $sql015);
            if(mysqli_num_rows($result015)>0){
                $row015 = mysqli_fetch_array($result015, MYSQLI_ASSOC);
                $usernamep15 = $row015['username'];
                $profilepicp15 = $row015['profilepicture'];
            }
        }else{
            $usernamep15 = "Not Yet Registered";
        }
        
        if($player16 != '0' && $player16 != NULL){
            $sql016 = "SELECT * FROM users WHERE user_id='$player16'";
            $result016 = mysqli_query($link, $sql016);
            if(mysqli_num_rows($result016)>0){
                $row016 = mysqli_fetch_array($result016, MYSQLI_ASSOC);
                $usernamep16 = $row016['username'];
                $profilepicp16 = $row016['profilepicture'];
            }
        }else{
            $usernamep16 = "Not Yet Registered";
        }
        
        if($player17 != '0' && $player17 != NULL){
            $sql017 = "SELECT * FROM users WHERE user_id='$player17'";
            $result017 = mysqli_query($link, $sql017);
            if(mysqli_num_rows($result017)>0){
                $row017 = mysqli_fetch_array($result017, MYSQLI_ASSOC);
                $usernamep17 = $row017['username'];
                $profilepicp17 = $row017['profilepicture'];
            }
        }else{
            $usernamep17 = "Not Yet Registered";
        }
        
        if($player18 != '0' && $player18 != NULL){
            $sql018 = "SELECT * FROM users WHERE user_id='$player18'";
            $result018 = mysqli_query($link, $sql018);
            if(mysqli_num_rows($result018)>0){
                $row018 = mysqli_fetch_array($result018, MYSQLI_ASSOC);
                $usernamep18 = $row018['username'];
                $profilepicp18 = $row018['profilepicture'];
            }
        }else{
            $usernamep18 = "Not Yet Registered";
        }
        
        if($player19 != '0' && $player19 != NULL){
            $sql019 = "SELECT * FROM users WHERE user_id='$player19'";
            $result019 = mysqli_query($link, $sql019);
            if(mysqli_num_rows($result019)>0){
                $row019 = mysqli_fetch_array($result019, MYSQLI_ASSOC);
                $usernamep19 = $row019['username'];
                $profilepicp19 = $row019['profilepicture'];
            }
        }else{
            $usernamep19 = "Not Yet Registered";
        }
        
        if($player20 != '0' && $player20 != NULL){
            $sql020 = "SELECT * FROM users WHERE user_id='$player20'";
            $result020 = mysqli_query($link, $sql020);
            if(mysqli_num_rows($result020)>0){
                $row020 = mysqli_fetch_array($result020, MYSQLI_ASSOC);
                $usernamep20 = $row020['username'];
                $profilepicp20 = $row020['profilepicture'];
            }
        }else{
            $usernamep20 = "Not Yet Registered";
        }        
        
        if($player21 != '0' && $player21 != NULL){
            $sql021 = "SELECT * FROM users WHERE user_id='$player21'";
            $result021 = mysqli_query($link, $sql021);
            if(mysqli_num_rows($result021)>0){
                $row021 = mysqli_fetch_array($result021, MYSQLI_ASSOC);
                $usernamep21 = $row021['username'];
                $profilepicp21 = $row021['profilepicture'];
            }
        }else{
            $usernamep21 = "Not Yet Registered";
        }
        
        if($player22 != '0' && $player22 != NULL){
            $sql022 = "SELECT * FROM users WHERE user_id='$player22'";
            $result022 = mysqli_query($link, $sql022);
            if(mysqli_num_rows($result022)>0){
                $row022 = mysqli_fetch_array($result022, MYSQLI_ASSOC);
                $usernamep22 = $row022['username'];
                $profilepicp22 = $row022['profilepicture'];
            }
        }else{
            $usernamep22 = "Not Yet Registered";
        }
        
        if($player23 != '0' && $player23 != NULL){
            $sql023 = "SELECT * FROM users WHERE user_id='$player23'";
            $result023 = mysqli_query($link, $sql023);
            if(mysqli_num_rows($result023)>0){
                $row023 = mysqli_fetch_array($result023, MYSQLI_ASSOC);
                $usernamep23 = $row023['username'];
                $profilepicp23 = $row023['profilepicture'];
            }
        }else{
            $usernamep23 = "Not Yet Registered";
        }
        
        if($player24 != '0' && $player24 != NULL){
            $sql024 = "SELECT * FROM users WHERE user_id='$player24'";
            $result024 = mysqli_query($link, $sql024);
            if(mysqli_num_rows($result024)>0){
                $row024 = mysqli_fetch_array($result024, MYSQLI_ASSOC);
                $usernamep24 = $row024['username'];
                $profilepicp24 = $row024['profilepicture'];
            }
        }else{
            $usernamep24 = "Not Yet Registered";
        }
        
        if($player25 != '0' && $player25 != NULL){
            $sql025 = "SELECT * FROM users WHERE user_id='$player25'";
            $result025 = mysqli_query($link, $sql025);
            if(mysqli_num_rows($result025)>0){
                $row025 = mysqli_fetch_array($result025, MYSQLI_ASSOC);
                $usernamep25 = $row025['username'];
                $profilepicp25 = $row025['profilepicture'];
            }
        }else{
            $usernamep25 = "Not Yet Registered";
        }
        
        if($player26 != '0' && $player26 != NULL){
            $sql026 = "SELECT * FROM users WHERE user_id='$player26'";
            $result026 = mysqli_query($link, $sql026);
            if(mysqli_num_rows($result026)>0){
                $row026 = mysqli_fetch_array($result026, MYSQLI_ASSOC);
                $usernamep26 = $row026['username'];
                $profilepicp26 = $row026['profilepicture'];
            }
        }else{
            $usernamep26 = "Not Yet Registered";
        }
        
        if($player27 != '0' && $player27 != NULL){
            $sql027 = "SELECT * FROM users WHERE user_id='$player27'";
            $result027 = mysqli_query($link, $sql027);
            if(mysqli_num_rows($result027)>0){
                $row027 = mysqli_fetch_array($result027, MYSQLI_ASSOC);
                $usernamep27 = $row027['username'];
                $profilepicp27 = $row027['profilepicture'];
            }
        }else{
            $usernamep27 = "Not Yet Registered";
        }
        
        if($player28 != '0' && $player28 != NULL){
            $sql028 = "SELECT * FROM users WHERE user_id='$player28'";
            $result028 = mysqli_query($link, $sql028);
            if(mysqli_num_rows($result028)>0){
                $row028 = mysqli_fetch_array($result028, MYSQLI_ASSOC);
                $usernamep28 = $row028['username'];
                $profilepicp28 = $row028['profilepicture'];
            }
        }else{
            $usernamep28 = "Not Yet Registered";
        }
        
        if($player29 != '0' && $player29 != NULL){
            $sql029 = "SELECT * FROM users WHERE user_id='$player29'";
            $result029 = mysqli_query($link, $sql029);
            if(mysqli_num_rows($result029)>0){
                $row029 = mysqli_fetch_array($result029, MYSQLI_ASSOC);
                $usernamep29 = $row029['username'];
                $profilepicp29 = $row029['profilepicture'];
            }
        }else{
            $usernamep29 = "Not Yet Registered";
        }
        
        if($player30 != '0' && $player30 != NULL){
            $sql030 = "SELECT * FROM users WHERE user_id='$player30'";
            $result030 = mysqli_query($link, $sql030);
            if(mysqli_num_rows($result030)>0){
                $row030 = mysqli_fetch_array($result030, MYSQLI_ASSOC);
                $usernamep30 = $row030['username'];
                $profilepicp30 = $row030['profilepicture'];
            }
        }else{
            $usernamep30 = "Not Yet Registered";
        }
        
        if($player31 != '0' && $player31 != NULL){
            $sql031 = "SELECT * FROM users WHERE user_id='$player31'";
            $result031 = mysqli_query($link, $sql031);
            if(mysqli_num_rows($result031)>0){
                $row031 = mysqli_fetch_array($result031, MYSQLI_ASSOC);
                $usernamep31 = $row031['username'];
                $profilepicp31 = $row031['profilepicture'];
            }
        }else{
            $usernamep31 = "Not Yet Registered";
        }
        
        if($player32 != '0' && $player332 != NULL){
            $sql032 = "SELECT * FROM users WHERE user_id='$player32'";
            $result032 = mysqli_query($link, $sql032);
            if(mysqli_num_rows($result032)>0){
                $row032 = mysqli_fetch_array($result032, MYSQLI_ASSOC);
                $usernamep32 = $row032['username'];
                $profilepicp32 = $row032['profilepicture'];
            }
        }else{
            $usernamep32 = "Not Yet Registered";
        }

        $player1wins = $row['p1_wins'];
        $player2wins = $row['p2_wins'];
        $player3wins = $row['p3_wins'];
        $player4wins = $row['p4_wins'];
        $player5wins = $row['p5_wins'];
        $player6wins = $row['p6_wins'];
        $player7wins = $row['p7_wins'];
        $player8wins = $row['p8_wins'];
        $player9wins = $row['p9_wins'];
        $player10wins = $row['p10_wins'];
        $player11wins = $row['p11_wins'];
        $player12wins = $row['p12_wins'];
        $player13wins = $row['p13_wins'];
        $player14wins = $row['p14_wins'];
        $player15wins = $row['p15_wins'];
        $player16wins = $row['p16_wins'];
        $player17wins = $row['p17_wins'];
        $player18wins = $row['p18_wins'];
        $player19wins = $row['p19_wins'];
        $player20wins = $row['p20_wins'];
        $player21wins = $row['p21_wins'];
        $player22wins = $row['p22_wins'];
        $player23wins = $row['p23_wins'];
        $player24wins = $row['p24_wins'];
        $player25wins = $row['p25_wins'];
        $player26wins = $row['p26_wins'];
        $player27wins = $row['p27_wins'];
        $player28wins = $row['p28_wins'];
        $player29wins = $row['p29_wins'];
        $player30wins = $row['p30_wins'];
        $player31wins = $row['p31_wins'];
        $player32wins = $row['p32_wins'];
        
        $stage = $row['stage_number'];
        
        echo "
            <h1>";
        
            if($stage == '0'){
                echo "Welcome to Stage 1 ";
            }elseif($stage == '1'){
                echo "Welcome to Stage 2 ";
            }elseif($stage == '2'){
                echo "Welcome to The Quarter-Final ";
            }elseif($stage == '3'){
                echo "Welcome to The Semi-Final ";
            }elseif($stage == '4'){
                echo "Welcome to The Final ";
            }elseif($stage == '5'){
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
                            <tr><th></th><th>Stage 2 Match 1</th></tr>
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
                            <tr><th></th><th>Stage 2 Match 2</th></tr>
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
                
                <div class='row'>
                    <div class='col-xs-3 match1'>
                        <table>
                            <tr><th></th><th>Stage 1, Match 5</th></tr>
                            <tr class='playerrow'><td><img class='tournProfilePic' src='$profilepicp9'></td><td> <a href='../profilepage.php?username=$usernamep9'>$usernamep9</a></td></tr>
                            <tr class='playerrow'><td><img src='$profilepicp10'></td><td> <a href='profilepage.php?username=$usernamep10'>$usernamep10</a></td></tr>
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal5' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                    <div class='col-xs-offset-6 col-xs-3 match2'>
                        <table>
                            <tr><th></th><th>Stage 1, Match 6</th></tr>
                            <tr class='playerrow'><td><img src='$profilepicp11'></td><td> <a href='profilepage.php?username=$usernamep11'>$usernamep11</a></td></tr>
                            <tr class='playerrow'><td><img src='$profilepicp12'></td><td> <a href='profilepage.php?username=$usernamep12'>$usernamep12</a></td></tr>
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal6' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xs-offset-3 col-xs-2 nextmatch1'>
                        <table>
                            <tr><th></th><th>Stage 2 Match 3</th></tr>
                            ";
                if($player9wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp9'></td><td> <a href='profilepage.php?username=$usernamep9'>$usernamep9</a></td></tr>";
                }elseif($player10wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp10'></td><td> <a href='profilepage.php?username=$usernamep10'>$usernamep10</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Match 5</td></tr>";
                }
                if($player13wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp13'></td><td> <a href='profilepage.php?username=$usernamep13'>$usernamep13</a></td></tr>";
                }elseif($player14wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp14'></td><td> <a href='profilepage.php?username=$usernamep14'>$usernamep14</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Match 7</td></tr>";
                }
                        echo "
                            
                        </table>
                    </div>
                    <div class='col-sm-offset-1 col-xs-offset-2 col-xs-2 nextmatch2'>
                        <table>
                            <tr><th></th><th>Stage 2 Match 4</th></tr>
                            ";
                if($player11wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp11'></td><td> <a href='profilepage.php?username=$usernamep11'>$usernamep11</a></td></tr>";
                }elseif($player12wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp12'></td><td> <a href='profilepage.php?username=$usernamep12'>$usernamep12</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Match 6</td></tr>";
                }
                if($player15wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp15'></td><td> <a href='profilepage.php?username=$usernamep15'>$usernamep15</a></td></tr>";
                }elseif($player16wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp16'></td><td> <a href='profilepage.php?username=$usernamep16'>$usernamep16</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Match 8</td></tr>";
                }
                        echo "
                            
                        </table>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xs-3 match3'>
                        <table>
                            <tr><th></th><th>Stage 1, Match 7</th></tr>
                            <tr class='playerrow'><td><img src='$profilepicp13'></td><td> <a href='profilepage.php?username=$usernamep13'>$usernamep13</a></td></tr>
                            <tr class='playerrow'><td><img src='$profilepicp14'></td><td> <a href='profilepage.php?username=$usernamep14'>$usernamep14</a></td></tr>
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal7' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                    <div class='col-xs-offset-6 col-xs-3 match4'>
                        <table>
                            <tr><th></th><th>Stage 1, Match 8</th></tr>
                            <tr class='playerrow'><td><img src='$profilepicp15'></td><td> <a href='profilepage.php?username=$usernamep15'>$usernamep15</a></td></tr>
                            <tr class='playerrow'><td><img src='$profilepicp16'></td><td> <a href='profilepage.php?username=$usernamep16'>$usernamep16</a></td></tr>
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal8' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                </div>
                
                <div class='row'>
                    <div class='col-xs-3 match1'>
                        <table>
                            <tr><th></th><th>Stage 1, Match 9</th></tr>
                            <tr class='playerrow'><td><img class='tournProfilePic' src='$profilepicp17'></td><td> <a href='../profilepage.php?username=$usernamep17'>$usernamep17</a></td></tr>
                            <tr class='playerrow'><td><img src='$profilepicp18'></td><td> <a href='profilepage.php?username=$usernamep18'>$usernamep18</a></td></tr>
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal9' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                    <div class='col-xs-offset-6 col-xs-3 match2'>
                        <table>
                            <tr><th></th><th>Stage 1, Match 10</th></tr>
                            <tr class='playerrow'><td><img src='$profilepicp19'></td><td> <a href='profilepage.php?username=$usernamep19'>$usernamep19</a></td></tr>
                            <tr class='playerrow'><td><img src='$profilepicp20'></td><td> <a href='profilepage.php?username=$usernamep20'>$usernamep20</a></td></tr>
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal10' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xs-offset-3 col-xs-2 nextmatch1'>
                        <table>
                            <tr><th></th><th>Stage 2 Match 5</th></tr>
                            ";
                if($player17wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp17'></td><td> <a href='profilepage.php?username=$usernamep17'>$usernamep17</a></td></tr>";
                }elseif($player18wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp18'></td><td> <a href='profilepage.php?username=$usernamep18'>$usernamep18</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Match 9</td></tr>";
                }
                if($player21wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp21'></td><td> <a href='profilepage.php?username=$usernamep21'>$usernamep21</a></td></tr>";
                }elseif($player22wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp22'></td><td> <a href='profilepage.php?username=$usernamep22'>$usernamep22</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Match 11</td></tr>";
                }
                        echo "
                            
                        </table>
                    </div>
                    <div class='col-sm-offset-1 col-xs-offset-2 col-xs-2 nextmatch2'>
                        <table>
                            <tr><th></th><th>Stage 2 Match 6</th></tr>
                            ";
                if($player19wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp19'></td><td> <a href='profilepage.php?username=$usernamep19'>$usernamep19</a></td></tr>";
                }elseif($player20wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp20'></td><td> <a href='profilepage.php?username=$usernamep20'>$usernamep20</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Match 10</td></tr>";
                }
                if($player23wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp23'></td><td> <a href='profilepage.php?username=$usernamep23'>$usernamep23</a></td></tr>";
                }elseif($player24wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp24'></td><td> <a href='profilepage.php?username=$usernamep24'>$usernamep24</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Match 12</td></tr>";
                }
                        echo "
                            
                        </table>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xs-3 match3'>
                        <table>
                            <tr><th></th><th>Stage 1, Match 11</th></tr>
                            <tr class='playerrow'><td><img src='$profilepicp21'></td><td> <a href='profilepage.php?username=$usernamep21'>$usernamep21</a></td></tr>
                            <tr class='playerrow'><td><img src='$profilepicp22'></td><td> <a href='profilepage.php?username=$usernamep22'>$usernamep22</a></td></tr>
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal11' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                    <div class='col-xs-offset-6 col-xs-3 match4'>
                        <table>
                            <tr><th></th><th>Stage 1, Match 12</th></tr>
                            <tr class='playerrow'><td><img src='$profilepicp23'></td><td> <a href='profilepage.php?username=$usernamep23'>$usernamep23</a></td></tr>
                            <tr class='playerrow'><td><img src='$profilepicp24'></td><td> <a href='profilepage.php?username=$usernamep24'>$usernamep24</a></td></tr>
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal12' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                </div>
                
                <div class='row'>
                    <div class='col-xs-3 match1'>
                        <table>
                            <tr><th></th><th>Stage 1, Match 13</th></tr>
                            <tr class='playerrow'><td><img class='tournProfilePic' src='$profilepicp25'></td><td> <a href='../profilepage.php?username=$usernamep25'>$usernamep25</a></td></tr>
                            <tr class='playerrow'><td><img src='$profilepicp26'></td><td> <a href='profilepage.php?username=$usernamep26'>$usernamep26</a></td></tr>
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal13' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                    <div class='col-xs-offset-6 col-xs-3 match2'>
                        <table>
                            <tr><th></th><th>Stage 1, Match 14</th></tr>
                            <tr class='playerrow'><td><img src='$profilepicp27'></td><td> <a href='profilepage.php?username=$usernamep27'>$usernamep27</a></td></tr>
                            <tr class='playerrow'><td><img src='$profilepicp28'></td><td> <a href='profilepage.php?username=$usernamep28'>$usernamep28</a></td></tr>
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal14' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xs-offset-3 col-xs-2 nextmatch1'>
                        <table>
                            <tr><th></th><th>Stage 2 Match 7</th></tr>
                            ";
                if($player25wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp25'></td><td> <a href='profilepage.php?username=$usernamep25'>$usernamep25</a></td></tr>";
                }elseif($player26wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp26'></td><td> <a href='profilepage.php?username=$usernamep26'>$usernamep26</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Match 13</td></tr>";
                }
                if($player29wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp29'></td><td> <a href='profilepage.php?username=$usernamep29'>$usernamep29</a></td></tr>";
                }elseif($player30wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp30'></td><td> <a href='profilepage.php?username=$usernamep30'>$usernamep30</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Match 15</td></tr>";
                }
                        echo "
                            
                        </table>
                    </div>
                    <div class='col-sm-offset-1 col-xs-offset-2 col-xs-2 nextmatch2'>
                        <table>
                            <tr><th></th><th>Stage 2 Match 8</th></tr>
                            ";
                if($player28wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp28'></td><td> <a href='profilepage.php?username=$usernamep28'>$usernamep28</a></td></tr>";
                }elseif($player28wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp28'></td><td> <a href='profilepage.php?username=$usernamep28'>$usernamep28</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Match 14</td></tr>";
                }
                if($player31wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp31'></td><td> <a href='profilepage.php?username=$usernamep31'>$usernamep31</a></td></tr>";
                }elseif($player32wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp32'></td><td> <a href='profilepage.php?username=$usernamep32'>$usernamep32</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Match 16</td></tr>";
                }
                        echo "
                            
                        </table>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xs-3 match3'>
                        <table>
                            <tr><th></th><th>Stage 1, Match 15</th></tr>
                            <tr class='playerrow'><td><img src='$profilepicp29'></td><td> <a href='profilepage.php?username=$usernamep29'>$usernamep29</a></td></tr>
                            <tr class='playerrow'><td><img src='$profilepicp30'></td><td> <a href='profilepage.php?username=$usernamep30'>$usernamep30</a></td></tr>
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal15' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                    <div class='col-xs-offset-6 col-xs-3 match4'>
                        <table>
                            <tr><th></th><th>Stage 1, Match 16</th></tr>
                            <tr class='playerrow'><td><img src='$profilepicp31'></td><td> <a href='profilepage.php?username=$usernamep31'>$usernamep31</a></td></tr>
                            <tr class='playerrow'><td><img src='$profilepicp32'></td><td> <a href='profilepage.php?username=$usernamep32'>$usernamep32</a></td></tr>
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal16' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                </div>
                
                ";
            }elseif($stage == '1'){
                
                echo "
                <div class='row'>
                    <div class='col-xs-3 match1'>
                        <table>
                            <tr><th></th><th>Stage 2 Match 1</th></tr>
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
                    
                    <div class='col-xs-offset-6 col-xs-3 match2'>
                        <table>
                            <tr><th></th><th>Stage 2 Match 2</th></tr>
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
                <div class='row'>
                    <div class='col-xs-offset-3 col-xs-2 nextmatch1'>
                        <table>
                            <tr><th></th><th>Quater-Final 1</th></tr>
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
                    echo "<tr><td></td><td>Awaiting Result of Quarter-Final 1</td></tr>";
                }
            
                if($player9wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp9'></td><td> <a href='profilepage.php?username=$usernamep9'>$usernamep9</a></td></tr>";
                }elseif($player10wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp10'></td><td> <a href='profilepage.php?username=$usernamep10'>$usernamep10</a></td></tr>";
                }elseif($player13wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp13'></td><td> <a href='profilepage.php?username=$usernamep13'>$usernamep13</a></td></tr>";
                }elseif($player14wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp14'></td><td> <a href='profilepage.php?username=$usernamep14'>$usernamep14</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Quarter-Final 3</td></tr>";
                }
                        echo "
                            
                        </table>
                    </div>
                    <div class='col-sm-offset-1 col-xs-offset-2 col-xs-2 nextmatch2'>
                        <table>
                            <tr><th></th><th>Quater-Final 2</th></tr>
                            ";
                if($player3wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp3'></td><td> <a href='profilepage.php?username=$usernamep3'>$usernamep3</a></td></tr>";
                }elseif($player4wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp4'></td><td> <a href='profilepage.php?username=$usernamep4'>$usernamep4</a></td></tr>";
                }elseif($player7wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp7'></td><td> <a href='profilepage.php?username=$usernamep7'>$usernamep7</a></td></tr>";
                }elseif($player8wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp8'></td><td> <a href='profilepage.php?username=$usernamep8'>$usernamep8</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Quarter-Final 2</td></tr>";
                }
                
                if($player11wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp11'></td><td> <a href='profilepage.php?username=$usernamep11'>$usernamep11</a></td></tr>";
                }elseif($player12wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp12'></td><td> <a href='profilepage.php?username=$usernamep12'>$usernamep12</a></td></tr>";
                }elseif($player15wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp15'></td><td> <a href='profilepage.php?username=$usernamep15'>$usernamep15</a></td></tr>";
                }elseif($player16wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp16'></td><td> <a href='profilepage.php?username=$usernamep16'>$usernamep16</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Quarter-Final 4</td></tr>";
                }
                        echo "
                            
                        </table>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xs-3 match3'>
                        <table>
                            <tr><th></th><th>Stage 2 Match 3</th></tr>
                            ";
                if($player9wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp9'></td><td> <a href='profilepage.php?username=$usernamep9'>$usernamep9</a></td></tr>";
                }elseif($player10wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp10'></td><td> <a href='profilepage.php?username=$usernamep10'>$usernamep10</a></td></tr>";
                }
                
                if($player13wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp13'></td><td> <a href='profilepage.php?username=$usernamep13'>$usernamep13</a></td></tr>";
                }elseif($player14wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp14'></td><td> <a href='profilepage.php?username=$usernamep14'>$usernamep14</a></td></tr>";
                }
                            echo "
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal3' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                    
                    <div class='col-xs-offset-6 col-xs-3 match4'>
                        <table>
                            <tr><th></th><th>Stage 2 Match 4</th></tr>
                            ";
                if($player11wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp11'></td><td> <a href='profilepage.php?username=$usernamep11'>$usernamep11</a></td></tr>";
                }elseif($player12wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp12'></td><td> <a href='profilepage.php?username=$usernamep12'>$usernamep12</a></td></tr>";
                }
                
                if($player15wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp15'></td><td> <a href='profilepage.php?username=$usernamep15'>$usernamep15</a></td></tr>";
                }elseif($player16wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp16'></td><td> <a href='profilepage.php?username=$usernamep16'>$usernamep16</a></td></tr>";
                }
                            echo "
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal4' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                    
                </div>
                
                <div class='row'>
                    <div class='col-xs-3 match1'>
                        <table>
                            <tr><th></th><th>Stage 2 Match 5</th></tr>
                            ";
                if($player17wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp17'></td><td> <a href='profilepage.php?username=$usernamep17'>$usernamep17</a></td></tr>";
                }elseif($player18wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp18'></td><td> <a href='profilepage.php?username=$usernamep18'>$usernamep18</a></td></tr>";
                }
                
                if($player21wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp21'></td><td> <a href='profilepage.php?username=$usernamep21'>$usernamep21</a></td></tr>";
                }elseif($player22wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp22'></td><td> <a href='profilepage.php?username=$usernamep22'>$usernamep22</a></td></tr>";
                }
                            echo "
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal5' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                    
                    <div class='col-xs-offset-6 col-xs-3 match2'>
                        <table>
                            <tr><th></th><th>Stage 2 Match 6</th></tr>
                            ";
                if($player19wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp19'></td><td> <a href='profilepage.php?username=$usernamep19'>$usernamep19</a></td></tr>";
                }elseif($player20wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp20'></td><td> <a href='profilepage.php?username=$usernamep20'>$usernamep20</a></td></tr>";
                }
                
                if($player23wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp23'></td><td> <a href='profilepage.php?username=$usernamep23'>$usernamep23</a></td></tr>";
                }elseif($player24wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp24'></td><td> <a href='profilepage.php?username=$usernamep24'>$usernamep24</a></td></tr>";
                }
                            echo "
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal6' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xs-offset-3 col-xs-2 nextmatch1'>
                        <table>
                            <tr><th></th><th>Quater-Final 3</th></tr>
                            ";
                if($player17wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp17'></td><td> <a href='profilepage.php?username=$usernamep17'>$usernamep17</a></td></tr>";
                }elseif($player18wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp18'></td><td> <a href='profilepage.php?username=$usernamep18'>$usernamep18</a></td></tr>";
                }elseif($player21wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp21'></td><td> <a href='profilepage.php?username=$usernamep21'>$usernamep21</a></td></tr>";
                }elseif($player22wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp22'></td><td> <a href='profilepage.php?username=$usernamep22'>$usernamep22</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Match 5</td></tr>";
                }
            
                if($player25wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp25'></td><td> <a href='profilepage.php?username=$usernamep25'>$usernamep25</a></td></tr>";
                }elseif($player26wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp26'></td><td> <a href='profilepage.php?username=$usernamep26'>$usernamep26</a></td></tr>";
                }elseif($player29wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp29'></td><td> <a href='profilepage.php?username=$usernamep29'>$usernamep29</a></td></tr>";
                }elseif($player30wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp30'></td><td> <a href='profilepage.php?username=$usernamep30'>$usernamep30</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Match 7</td></tr>";
                }
                        echo "
                            
                        </table>
                    </div>
                    <div class='col-sm-offset-1 col-xs-offset-2 col-xs-2 nextmatch2'>
                        <table>
                            <tr><th></th><th>Quater-Final 4</th></tr>
                            ";
                if($player19wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp19'></td><td> <a href='profilepage.php?username=$usernamep19'>$usernamep19</a></td></tr>";
                }elseif($player20wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp20'></td><td> <a href='profilepage.php?username=$usernamep20'>$usernamep20</a></td></tr>";
                }elseif($player23wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp23'></td><td> <a href='profilepage.php?username=$usernamep23'>$usernamep23</a></td></tr>";
                }elseif($player24wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp24'></td><td> <a href='profilepage.php?username=$usernamep24'>$usernamep24</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Match 6</td></tr>";
                }
                
                if($player27wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp27'></td><td> <a href='profilepage.php?username=$usernamep27'>$usernamep27</a></td></tr>";
                }elseif($player28wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp28'></td><td> <a href='profilepage.php?username=$usernamep28'>$usernamep28</a></td></tr>";
                }elseif($player31wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp31'></td><td> <a href='profilepage.php?username=$usernamep31'>$usernamep31</a></td></tr>";
                }elseif($player32wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp32'></td><td> <a href='profilepage.php?username=$usernamep32'>$usernamep32</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Match 8</td></tr>";
                }
                        echo "
                            
                        </table>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xs-3 match3'>
                        <table>
                            <tr><th></th><th>Stage 2 Match 7</th></tr>
                            ";
                if($player25wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp25'></td><td> <a href='profilepage.php?username=$usernamep25'>$usernamep25</a></td></tr>";
                }elseif($player26wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp26'></td><td> <a href='profilepage.php?username=$usernamep26'>$usernamep26</a></td></tr>";
                }
                
                if($player29wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp29'></td><td> <a href='profilepage.php?username=$usernamep29'>$usernamep29</a></td></tr>";
                }elseif($player30wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp30'></td><td> <a href='profilepage.php?username=$usernamep30'>$usernamep30</a></td></tr>";
                }
                            echo "
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal7' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                    
                    <div class='col-xs-offset-6 col-xs-3 match4'>
                        <table>
                            <tr><th></th><th>Stage 2 Match 8</th></tr>
                            ";
                if($player27wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp27'></td><td> <a href='profilepage.php?username=$usernamep27'>$usernamep27</a></td></tr>";
                }elseif($player28wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp28'></td><td> <a href='profilepage.php?username=$usernamep28'>$usernamep28</a></td></tr>";
                }
                
                if($player31wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp31'></td><td> <a href='profilepage.php?username=$usernamep31'>$usernamep31</a></td></tr>";
                }elseif($player32wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp32'></td><td> <a href='profilepage.php?username=$usernamep32'>$usernamep32</a></td></tr>";
                }
                            echo "
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal8' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                    
                </div>
                
                ";
                
        }elseif($stage == '2'){
                echo "
                <div class='row'>
                    <div class='col-xs-3 match1'>
                        <table>
                            <tr><th></th><th>Quarter-Final 1</th></tr>
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
            
                if($player9wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp9'></td><td> <a href='profilepage.php?username=$usernamep9'>$usernamep9</a></td></tr>";
                }elseif($player10wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp10'></td><td> <a href='profilepage.php?username=$usernamep10'>$usernamep10</a></td></tr>";
                }elseif($player13wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp13'></td><td> <a href='profilepage.php?username=$usernamep13'>$usernamep13</a></td></tr>";
                }elseif($player14wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp14'></td><td> <a href='profilepage.php?username=$usernamep14'>$usernamep14</a></td></tr>";
                }
                            echo "
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal1' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                    <div class='col-xs-offset-6 col-xs-3 match2'>
                        <table>
                            <tr><th></th><th>Quarter-Final 2</th></tr>
                            ";
            
                if($player3wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp3'></td><td> <a href='profilepage.php?username=$usernamep3'>$usernamep3</a></td></tr>";
                }elseif($player4wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp4'></td><td> <a href='profilepage.php?username=$usernamep4'>$usernamep4</a></td></tr>";
                }elseif($player7wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp7'></td><td> <a href='profilepage.php?username=$usernamep7'>$usernamep7</a></td></tr>";
                }elseif($player8wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp8'></td><td> <a href='profilepage.php?username=$usernamep8'>$usernamep8</a></td></tr>";
                }
            
                if($player11wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp11'></td><td> <a href='profilepage.php?username=$usernamep11'>$usernamep11</a></td></tr>";
                }elseif($player12wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp12'></td><td> <a href='profilepage.php?username=$usernamep12'>$usernamep12</a></td></tr>";
                }elseif($player15wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp15'></td><td> <a href='profilepage.php?username=$usernamep15'>$usernamep15</a></td></tr>";
                }elseif($player16wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp16'></td><td> <a href='profilepage.php?username=$usernamep16'>$usernamep16</a></td></tr>";
                }
                            echo "
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
                }elseif($player5wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp5'></td><td> <a href='profilepage.php?username=$usernamep5'>$usernamep5</a></td></tr>";
                }elseif($player6wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp6'></td><td> <a href='profilepage.php?username=$usernamep6'>$usernamep6</a></td></tr>";
                }elseif($player9wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp9'></td><td> <a href='profilepage.php?username=$usernamep9'>$usernamep9</a></td></tr>";
                }elseif($player10wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp10'></td><td> <a href='profilepage.php?username=$usernamep10'>$usernamep10</a></td></tr>";
                }elseif($player13wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp13'></td><td> <a href='profilepage.php?username=$usernamep13'>$usernamep13</a></td></tr>";
                }elseif($player14wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp14'></td><td> <a href='profilepage.php?username=$usernamep14'>$usernamep14</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Quarter-Final 1</td></tr>";
                }
            
                if($player17wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp17'></td><td> <a href='profilepage.php?username=$usernamep17'>$usernamep17</a></td></tr>";
                }elseif($player18wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp18'></td><td> <a href='profilepage.php?username=$usernamep18'>$usernamep18</a></td></tr>";
                }elseif($player21wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp21'></td><td> <a href='profilepage.php?username=$usernamep21'>$usernamep21</a></td></tr>";
                }elseif($player22wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp22'></td><td> <a href='profilepage.php?username=$usernamep22'>$usernamep22</a></td></tr>";
                }elseif($player25wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp25'></td><td> <a href='profilepage.php?username=$usernamep25'>$usernamep25</a></td></tr>";
                }elseif($player26wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp26'></td><td> <a href='profilepage.php?username=$usernamep26'>$usernamep26</a></td></tr>";
                }elseif($player29wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp29'></td><td> <a href='profilepage.php?username=$usernamep29'>$usernamep29</a></td></tr>";
                }elseif($player30wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp30'></td><td> <a href='profilepage.php?username=$usernamep30'>$usernamep30</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Quater-Final 3</td></tr>";
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
                }elseif($player7wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp7'></td><td> <a href='profilepage.php?username=$usernamep7'>$usernamep7</a></td></tr>";
                }elseif($player8wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp8'></td><td> <a href='profilepage.php?username=$usernamep8'>$usernamep8</a></td></tr>";
                }elseif($player11wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp11'></td><td> <a href='profilepage.php?username=$usernamep11'>$usernamep11</a></td></tr>";
                }elseif($player12wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp12'></td><td> <a href='profilepage.php?username=$usernamep12'>$usernamep12</a></td></tr>";
                }elseif($player15wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp15'></td><td> <a href='profilepage.php?username=$usernamep15'>$usernamep15</a></td></tr>";
                }elseif($player16wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp16'></td><td> <a href='profilepage.php?username=$usernamep16'>$usernamep16</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Quater-Final 2</td></tr>";
                }
                
                if($player19wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp19'></td><td> <a href='profilepage.php?username=$usernamep19'>$usernamep19</a></td></tr>";
                }elseif($player20wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp20'></td><td> <a href='profilepage.php?username=$usernamep20'>$usernamep20</a></td></tr>";
                }elseif($player23wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp23'></td><td> <a href='profilepage.php?username=$usernamep23'>$usernamep23</a></td></tr>";
                }elseif($player24wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp24'></td><td> <a href='profilepage.php?username=$usernamep24'>$usernamep24</a></td></tr>";
                }elseif($player27wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp27'></td><td> <a href='profilepage.php?username=$usernamep27'>$usernamep27</a></td></tr>";
                }elseif($player28wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp28'></td><td> <a href='profilepage.php?username=$usernamep28'>$usernamep28</a></td></tr>";
                }elseif($player31wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp31'></td><td> <a href='profilepage.php?username=$usernamep31'>$usernamep31</a></td></tr>";
                }elseif($player32wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp32'></td><td> <a href='profilepage.php?username=$usernamep32'>$usernamep32</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Quarter-Final 4</td></tr>";
                }
                        echo "
                            
                        </table>
                    </div>
                </div>
                <div class='row'>
                    <div class='col-xs-3 match1'>
                        <table>
                            <tr><th></th><th>Quarter-Final 3</th></tr>
                            ";
                if($player17wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp17'></td><td> <a href='profilepage.php?username=$usernamep17'>$usernamep17</a></td></tr>";
                }elseif($player18wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp18'></td><td> <a href='profilepage.php?username=$usernamep18'>$usernamep18</a></td></tr>";
                }elseif($player21wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp21'></td><td> <a href='profilepage.php?username=$usernamep21'>$usernamep21</a></td></tr>";
                }elseif($player22wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp22'></td><td> <a href='profilepage.php?username=$usernamep22'>$usernamep22</a></td></tr>";
                }
            
                if($player25wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp25'></td><td> <a href='profilepage.php?username=$usernamep25'>$usernamep25</a></td></tr>";
                }elseif($player26wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp26'></td><td> <a href='profilepage.php?username=$usernamep26'>$usernamep26</a></td></tr>";
                }elseif($player29wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp29'></td><td> <a href='profilepage.php?username=$usernamep29'>$usernamep29</a></td></tr>";
                }elseif($player30wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp30'></td><td> <a href='profilepage.php?username=$usernamep30'>$usernamep30</a></td></tr>";
                }
                            echo "
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal3' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                    <div class='col-xs-offset-6 col-xs-3 match2'>
                        <table>
                            <tr><th></th><th>Quarter-Final 4</th></tr>
                            ";
            
                if($player19wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp19'></td><td> <a href='profilepage.php?username=$usernamep19'>$usernamep19</a></td></tr>";
                }elseif($player20wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp20'></td><td> <a href='profilepage.php?username=$usernamep20'>$usernamep20</a></td></tr>";
                }elseif($player23wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp23'></td><td> <a href='profilepage.php?username=$usernamep23'>$usernamep23</a></td></tr>";
                }elseif($player24wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp24'></td><td> <a href='profilepage.php?username=$usernamep24'>$usernamep24</a></td></tr>";
                }
            
                if($player27wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp27'></td><td> <a href='profilepage.php?username=$usernamep27'>$usernamep27</a></td></tr>";
                }elseif($player28wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp28'></td><td> <a href='profilepage.php?username=$usernamep28'>$usernamep28</a></td></tr>";
                }elseif($player31wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp31'></td><td> <a href='profilepage.php?username=$usernamep31'>$usernamep31</a></td></tr>";
                }elseif($player32wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp32'></td><td> <a href='profilepage.php?username=$usernamep32'>$usernamep32</a></td></tr>";
                }
                            echo "
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal4' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                </div>
                
                ";
        }elseif($stage == '3'){
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
                }elseif($player5wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp5'></td><td> <a href='profilepage.php?username=$usernamep5'>$usernamep5</a></td></tr>";
                }elseif($player6wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp6'></td><td> <a href='profilepage.php?username=$usernamep6'>$usernamep6</a></td></tr>";
                }elseif($player9wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp9'></td><td> <a href='profilepage.php?username=$usernamep9'>$usernamep9</a></td></tr>";
                }elseif($player10wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp10'></td><td> <a href='profilepage.php?username=$usernamep10'>$usernamep10</a></td></tr>";
                }elseif($player13wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp13'></td><td> <a href='profilepage.php?username=$usernamep13'>$usernamep13</a></td></tr>";
                }elseif($player14wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp14'></td><td> <a href='profilepage.php?username=$usernamep14'>$usernamep14</a></td></tr>";
                }
                
                if($player17wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp17'></td><td> <a href='profilepage.php?username=$usernamep17'>$usernamep17</a></td></tr>";
                }elseif($player18wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp18'></td><td> <a href='profilepage.php?username=$usernamep18'>$usernamep18</a></td></tr>";
                }elseif($player21wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp21'></td><td> <a href='profilepage.php?username=$usernamep21'>$usernamep21</a></td></tr>";
                }elseif($player22wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp22'></td><td> <a href='profilepage.php?username=$usernamep22'>$usernamep22</a></td></tr>";
                }elseif($player25wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp25'></td><td> <a href='profilepage.php?username=$usernamep25'>$usernamep25</a></td></tr>";
                }elseif($player26wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp26'></td><td> <a href='profilepage.php?username=$usernamep26'>$usernamep26</a></td></tr>";
                }elseif($player29wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp29'></td><td> <a href='profilepage.php?username=$usernamep29'>$usernamep29</a></td></tr>";
                }elseif($player30wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp30'></td><td> <a href='profilepage.php?username=$usernamep30'>$usernamep30</a></td></tr>";
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
                }elseif($player9wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp9'></td><td> <a href='profilepage.php?username=$usernamep9'>$usernamep9</a></td></tr>";
                }elseif($player10wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp10'></td><td> <a href='profilepage.php?username=$usernamep10'>$usernamep10</a></td></tr>";
                }elseif($player13wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp13'></td><td> <a href='profilepage.php?username=$usernamep13'>$usernamep13</a></td></tr>";
                }elseif($player14wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp14'></td><td> <a href='profilepage.php?username=$usernamep14'>$usernamep14</a></td></tr>";
                }elseif($player17wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp17'></td><td> <a href='profilepage.php?username=$usernamep17'>$usernamep17</a></td></tr>";
                }elseif($player18wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp18'></td><td> <a href='profilepage.php?username=$usernamep18'>$usernamep18</a></td></tr>";
                }elseif($player21wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp21'></td><td> <a href='profilepage.php?username=$usernamep21'>$usernamep21</a></td></tr>";
                }elseif($player22wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp22'></td><td> <a href='profilepage.php?username=$usernamep22'>$usernamep22</a></td></tr>";
                }elseif($player25wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp25'></td><td> <a href='profilepage.php?username=$usernamep25'>$usernamep25</a></td></tr>";
                }elseif($player26wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp26'></td><td> <a href='profilepage.php?username=$usernamep26'>$usernamep26</a></td></tr>";
                }elseif($player29wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp29'></td><td> <a href='profilepage.php?username=$usernamep29'>$usernamep29</a></td></tr>";
                }elseif($player30wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp30'></td><td> <a href='profilepage.php?username=$usernamep30'>$usernamep30</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Semi-Final 1</td></tr>";
                }
            
                if($player3wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp3'></td><td> <a href='profilepage.php?username=$usernamep3'>$usernamep3</a></td></tr>";
                }elseif($player4wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp4'></td><td> <a href='profilepage.php?username=$usernamep4'>$usernamep4</a></td></tr>";
                }elseif($player7wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp7'></td><td> <a href='profilepage.php?username=$usernamep7'>$usernamep7</a></td></tr>";
                }elseif($player8wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp8'></td><td> <a href='profilepage.php?username=$usernamep8'>$usernamep8</a></td></tr>";
                }elseif($player11wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp11'></td><td> <a href='profilepage.php?username=$usernamep11'>$usernamep11</a></td></tr>";
                }elseif($player12wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp12'></td><td> <a href='profilepage.php?username=$usernamep12'>$usernamep12</a></td></tr>";
                }elseif($player15wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp15'></td><td> <a href='profilepage.php?username=$usernamep15'>$usernamep15</a></td></tr>";
                }elseif($player16wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp16'></td><td> <a href='profilepage.php?username=$usernamep16'>$usernamep16</a></td></tr>";
                }elseif($player19wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp19'></td><td> <a href='profilepage.php?username=$usernamep19'>$usernamep19</a></td></tr>";
                }elseif($player20wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp20'></td><td> <a href='profilepage.php?username=$usernamep20'>$usernamep20</a></td></tr>";
                }elseif($player23wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp23'></td><td> <a href='profilepage.php?username=$usernamep23'>$usernamep23</a></td></tr>";
                }elseif($player24wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp24'></td><td> <a href='profilepage.php?username=$usernamep24'>$usernamep24</a></td></tr>";
                }elseif($player27wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp27'></td><td> <a href='profilepage.php?username=$usernamep27'>$usernamep27</a></td></tr>";
                }elseif($player28wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp28'></td><td> <a href='profilepage.php?username=$usernamep28'>$usernamep28</a></td></tr>";
                }elseif($player31wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp31'></td><td> <a href='profilepage.php?username=$usernamep31'>$usernamep31</a></td></tr>";
                }elseif($player32wins > $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp32'></td><td> <a href='profilepage.php?username=$usernamep32'>$usernamep32</a></td></tr>";
                }else{
                    echo "<tr><td></td><td>Awaiting Result of Semi-Final 2</td></tr>";
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
                }elseif($player7wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp7'></td><td> <a href='profilepage.php?username=$usernamep7'>$usernamep7</a></td></tr>";
                }elseif($player8wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp8'></td><td> <a href='profilepage.php?username=$usernamep8'>$usernamep8</a></td></tr>";
                }elseif($player11wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp11'></td><td> <a href='profilepage.php?username=$usernamep11'>$usernamep11</a></td></tr>";
                }elseif($player12wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp12'></td><td> <a href='profilepage.php?username=$usernamep12'>$usernamep12</a></td></tr>";
                }elseif($player15wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp15'></td><td> <a href='profilepage.php?username=$usernamep15'>$usernamep15</a></td></tr>";
                }elseif($player16wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp16'></td><td> <a href='profilepage.php?username=$usernamep16'>$usernamep16</a></td></tr>";
                }
                
                if($player19wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp19'></td><td> <a href='profilepage.php?username=$usernamep19'>$usernamep19</a></td></tr>";
                }elseif($player20wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp20'></td><td> <a href='profilepage.php?username=$usernamep20'>$usernamep20</a></td></tr>";
                }elseif($player23wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp23'></td><td> <a href='profilepage.php?username=$usernamep23'>$usernamep23</a></td></tr>";
                }elseif($player24wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp24'></td><td> <a href='profilepage.php?username=$usernamep24'>$usernamep24</a></td></tr>";
                }elseif($player27wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp27'></td><td> <a href='profilepage.php?username=$usernamep27'>$usernamep27</a></td></tr>";
                }elseif($player28wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp28'></td><td> <a href='profilepage.php?username=$usernamep28'>$usernamep28</a></td></tr>";
                }elseif($player31wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp31'></td><td> <a href='profilepage.php?username=$usernamep31'>$usernamep31</a></td></tr>";
                }elseif($player32wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp32'></td><td> <a href='profilepage.php?username=$usernamep32'>$usernamep32</a></td></tr>";
                }
                            echo "
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal2' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                    
                </div>
                
                ";
        }elseif($stage == '4'){
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
                }elseif($player9wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp9'></td><td> <a href='profilepage.php?username=$usernamep9'>$usernamep9</a></td></tr>";
                }elseif($player10wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp10'></td><td> <a href='profilepage.php?username=$usernamep10'>$usernamep10</a></td></tr>";
                }elseif($player13wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp13'></td><td> <a href='profilepage.php?username=$usernamep13'>$usernamep13</a></td></tr>";
                }elseif($player14wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp14'></td><td> <a href='profilepage.php?username=$usernamep14'>$usernamep14</a></td></tr>";
                }elseif($player17wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp17'></td><td> <a href='profilepage.php?username=$usernamep17'>$usernamep17</a></td></tr>";
                }elseif($player18wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp18'></td><td> <a href='profilepage.php?username=$usernamep18'>$usernamep18</a></td></tr>";
                }elseif($player21wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp21'></td><td> <a href='profilepage.php?username=$usernamep21'>$usernamep21</a></td></tr>";
                }elseif($player22wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp22'></td><td> <a href='profilepage.php?username=$usernamep22'>$usernamep22</a></td></tr>";
                }elseif($player25wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp25'></td><td> <a href='profilepage.php?username=$usernamep25'>$usernamep25</a></td></tr>";
                }elseif($player26wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp26'></td><td> <a href='profilepage.php?username=$usernamep26'>$usernamep26</a></td></tr>";
                }elseif($player29wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp29'></td><td> <a href='profilepage.php?username=$usernamep29'>$usernamep29</a></td></tr>";
                }elseif($player30wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp30'></td><td> <a href='profilepage.php?username=$usernamep30'>$usernamep30</a></td></tr>";
                }
                
                if($player3wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp3'></td><td> <a href='profilepage.php?username=$usernamep3'>$usernamep3</a></td></tr>";
                }elseif($player4wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp4'></td><td> <a href='profilepage.php?username=$usernamep4'>$usernamep4</a></td></tr>";
                }elseif($player7wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp7'></td><td> <a href='profilepage.php?username=$usernamep7'>$usernamep7</a></td></tr>";
                }elseif($player8wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp8'></td><td> <a href='profilepage.php?username=$usernamep8'>$usernamep8</a></td></tr>";
                }elseif($player11wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp11'></td><td> <a href='profilepage.php?username=$usernamep11'>$usernamep11</a></td></tr>";
                }elseif($player12wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp12'></td><td> <a href='profilepage.php?username=$usernamep12'>$usernamep12</a></td></tr>";
                }elseif($player15wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp15'></td><td> <a href='profilepage.php?username=$usernamep15'>$usernamep15</a></td></tr>";
                }elseif($player16wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp16'></td><td> <a href='profilepage.php?username=$usernamep16'>$usernamep16</a></td></tr>";
                }elseif($player19wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp19'></td><td> <a href='profilepage.php?username=$usernamep19'>$usernamep19</a></td></tr>";
                }elseif($player20wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp20'></td><td> <a href='profilepage.php?username=$usernamep20'>$usernamep20</a></td></tr>";
                }elseif($player23wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp23'></td><td> <a href='profilepage.php?username=$usernamep23'>$usernamep23</a></td></tr>";
                }elseif($player24wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp24'></td><td> <a href='profilepage.php?username=$usernamep24'>$usernamep24</a></td></tr>";
                }elseif($player27wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp27'></td><td> <a href='profilepage.php?username=$usernamep27'>$usernamep27</a></td></tr>";
                }elseif($player28wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp28'></td><td> <a href='profilepage.php?username=$usernamep28'>$usernamep28</a></td></tr>";
                }elseif($player31wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp31'></td><td> <a href='profilepage.php?username=$usernamep31'>$usernamep31</a></td></tr>";
                }elseif($player32wins == $stage){
                    echo "<tr class='playerrow'><td><img src='$profilepicp32'></td><td> <a href='profilepage.php?username=$usernamep32'>$usernamep32</a></td></tr>";
                }
            
                echo "
                            <tr><td></td><td><button type='button' class='btn btnColor winBtn' data-toggle='modal' data-target='#declareWinnerModal1' data-event_id='$event_id'>Declare Result</button></td></tr>
                        </table>
                    </div>
                </div>";
        }elseif($stage == '5'){
                echo "
                <div class='row'>
                    <div class='col-xs-offset-4 col-xs-4 tournwinner'>
                            ";
                   
                if($player1wins == $stage){
                    echo "<img src='$profilepicp1'> <a href='profilepage.php?username=$usernamep1'>$usernamep1</a>";
                }elseif($player2wins == $stage){
                    echo "<img src='$profilepicp2'> <a href='profilepage.php?username=$usernamep2'>$usernamep2</a>";
                }elseif($player3wins == $stage){
                    echo "<img src='$profilepicp3'> <a href='profilepage.php?username=$usernamep3'>$usernamep3</a>";
                }elseif($player4wins == $stage){
                    echo "<img src='$profilepicp4'> <a href='profilepage.php?username=$usernamep4'>$usernamep4</a>";
                }elseif($player5wins == $stage){
                    echo "<img src='$profilepicp5'> <a href='profilepage.php?username=$usernamep5'>$usernamep5</a>";
                }elseif($player6wins == $stage){
                    echo "<img src='$profilepicp6'> <a href='profilepage.php?username=$usernamep6'>$usernamep6</a>";
                }elseif($player7wins == $stage){
                    echo "<img src='$profilepicp7'> <a href='profilepage.php?username=$usernamep7'>$usernamep7</a>";
                }elseif($player8wins == $stage){
                    echo "<img src='$profilepicp8'> <a href='profilepage.php?username=$usernamep8'>$usernamep8</a>";
                }elseif($player9wins == $stage){
                    echo "<img src='$profilepicp9'> <a href='profilepage.php?username=$usernamep9'>$usernamep9</a>";
                }elseif($player10wins == $stage){
                    echo "<img src='$profilepicp10'> <a href='profilepage.php?username=$usernamep10'>$usernamep10</a>";
                }elseif($player11wins == $stage){
                    echo "<img src='$profilepicp11'> <a href='profilepage.php?username=$usernamep11'>$usernamep11</a>";
                }elseif($player12wins == $stage){
                    echo "<img src='$profilepicp12'> <a href='profilepage.php?username=$usernamep12'>$usernamep12</a>";
                }elseif($player13wins == $stage){
                    echo "<img src='$profilepicp13'> <a href='profilepage.php?username=$usernamep13'>$usernamep13</a>";
                }elseif($player14wins == $stage){
                    echo "<img src='$profilepicp14'> <a href='profilepage.php?username=$usernamep14'>$usernamep14</a>";
                }elseif($player15wins == $stage){
                    echo "<img src='$profilepicp15'> <a href='profilepage.php?username=$usernamep15'>$usernamep15</a>";
                }elseif($player16wins == $stage){
                    echo "<img src='$profilepicp16'> <a href='profilepage.php?username=$usernamep16'>$usernamep16</a>";
                }elseif($player17wins == $stage){
                    echo "<img src='$profilepicp17'> <a href='profilepage.php?username=$usernamep17'>$usernamep17</a>";
                }elseif($player18wins == $stage){
                    echo "<img src='$profilepicp18'> <a href='profilepage.php?username=$usernamep18'>$usernamep18</a>";
                }elseif($player19wins == $stage){
                    echo "<img src='$profilepicp19'> <a href='profilepage.php?username=$usernamep19'>$usernamep19</a>";
                }elseif($player20wins == $stage){
                    echo "<img src='$profilepicp20'> <a href='profilepage.php?username=$usernamep20'>$usernamep20</a>";
                }elseif($player21wins == $stage){
                    echo "<img src='$profilepicp21'> <a href='profilepage.php?username=$usernamep21'>$usernamep21</a>";
                }elseif($player22wins == $stage){
                    echo "<img src='$profilepicp22'> <a href='profilepage.php?username=$usernamep22'>$usernamep22</a>";
                }elseif($player23wins == $stage){
                    echo "<img src='$profilepicp23'> <a href='profilepage.php?username=$usernamep23'>$usernamep23</a>";
                }elseif($player24wins == $stage){
                    echo "<img src='$profilepicp24'> <a href='profilepage.php?username=$usernamep24'>$usernamep24</a>";
                }elseif($player25wins == $stage){
                    echo "<img src='$profilepicp25'> <a href='profilepage.php?username=$usernamep25'>$usernamep25</a>";
                }elseif($player26wins == $stage){
                    echo "<img src='$profilepicp26'> <a href='profilepage.php?username=$usernamep26'>$usernamep26</a>";
                }elseif($player27wins == $stage){
                    echo "<img src='$profilepicp27'> <a href='profilepage.php?username=$usernamep27'>$usernamep27</a>";
                }elseif($player28wins == $stage){
                    echo "<img src='$profilepicp28'> <a href='profilepage.php?username=$usernamep28'>$usernamep28</a>";
                }elseif($player29wins == $stage){
                    echo "<img src='$profilepicp29'> <a href='profilepage.php?username=$usernamep29'>$usernamep29</a>";
                }elseif($player30wins == $stage){
                    echo "<img src='$profilepicp30'> <a href='profilepage.php?username=$usernamep30'>$usernamep30</a>";
                }elseif($player31wins == $stage){
                    echo "<img src='$profilepicp31'> <a href='profilepage.php?username=$usernamep31'>$usernamep31</a>";
                }elseif($player32wins == $stage){
                    echo "<img src='$profilepicp32'> <a href='profilepage.php?username=$usernamep32'>$usernamep32</a>";
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
                
                <form method='post' id='match5Form'>
                    <div class='modal' id='declareWinnerModal5' role='dialog' aria-labelledby='declareWinnerModalLabel5' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel5'>Match 1:</h4>
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
                                                <label for='player9rounds'>$usernamep9</label>
                                                <input class='form-control' type='number' id='player9rounds' name='player9rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player10rounds'>$usernamep10</label>
                                                <input class='form-control' type='number' id='player10rounds' name='player10rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner9' value='player9'>
                                                    $usernamep9                         
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner10' value='player10'>
                                                    $usernamep10
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
                
                <form method='post' id='match6Form'>
                    <div class='modal' id='declareWinnerModal6' role='dialog' aria-labelledby='declareWinnerModalLabel6' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel6'>Match 2:</h4>
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
                                                <label for='player11rounds'>$usernamep11</label>
                                                <input class='form-control' type='number' id='player11rounds' name='player11rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player12rounds'>$usernamep12</label>
                                                <input class='form-control' type='number' id='player12rounds' name='player12rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner11' value='player11'>
                                                    $usernamep11                         
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner12' value='player12'>
                                                    $usernamep12
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
                
                <form method='post' id='match7Form'>
                    <div class='modal' id='declareWinnerModal7' role='dialog' aria-labelledby='declareWinnerModalLabel7' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel7'>Match 3:</h4>
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
                                                <label for='player13rounds'>$usernamep13</label>
                                                <input class='form-control' type='number' id='player13rounds' name='player13rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player14rounds'>$usernamep14</label>
                                                <input class='form-control' type='number' id='player14rounds' name='player14rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner13' value='player13'>
                                                    $usernamep13                         
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner14' value='player14'>
                                                    $usernamep14
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
                
                <form method='post' id='match8Form'>
                    <div class='modal' id='declareWinnerModal8' role='dialog' aria-labelledby='declareWinnerModalLabel8' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel8'>Match 4:</h4>
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
                                                <label for='player15rounds'>$usernamep15</label>
                                                <input class='form-control' type='number' id='player15rounds' name='player15rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player16rounds'>$usernamep16</label>
                                                <input class='form-control' type='number' id='player16rounds' name='player16rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner15' value='player15'>
                                                    $usernamep15                         
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner16' value='player16'>
                                                    $usernamep16
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
                
                <form method='post' id='match9Form'>
                    <div class='modal' id='declareWinnerModal9' role='dialog' aria-labelledby='declareWinnerModalLabel9' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel9'>Match 9:</h4>
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
                                                <label for='player17rounds'>$usernamep17</label>
                                                <input class='form-control' type='number' id='player17rounds' name='player17rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player18rounds'>$usernamep18</label>
                                                <input class='form-control' type='number' id='player18rounds' name='player18rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner17' value='player17'>
                                                    $usernamep17                         
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner18' value='player18'>
                                                    $usernamep18
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
                
                <form method='post' id='match10Form'>
                    <div class='modal' id='declareWinnerModal10' role='dialog' aria-labelledby='declareWinnerModalLabel10' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel10'>Match 10:</h4>
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
                                                <label for='player19rounds'>$usernamep19</label>
                                                <input class='form-control' type='number' id='player19rounds' name='player19rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player20rounds'>$usernamep20</label>
                                                <input class='form-control' type='number' id='player20rounds' name='player20rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner19' value='player19'>
                                                    $usernamep19                         
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner20' value='player20'>
                                                    $usernamep20
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
                
                <form method='post' id='match11Form'>
                    <div class='modal' id='declareWinnerModal11' role='dialog' aria-labelledby='declareWinnerModalLabel11' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel11'>Match 11:</h4>
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
                                                <label for='player21rounds'>$usernamep21</label>
                                                <input class='form-control' type='number' id='player21rounds' name='player21rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player22rounds'>$usernamep22</label>
                                                <input class='form-control' type='number' id='player22rounds' name='player22rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner21' value='player21'>
                                                    $usernamep21                         
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner22' value='player22'>
                                                    $usernamep22
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
                
                <form method='post' id='match12Form'>
                    <div class='modal' id='declareWinnerModal12' role='dialog' aria-labelledby='declareWinnerModalLabel12' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel12'>Match 12:</h4>
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
                                                <label for='player23rounds'>$usernamep23</label>
                                                <input class='form-control' type='number' id='player23rounds' name='player23rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player24rounds'>$usernamep24</label>
                                                <input class='form-control' type='number' id='player24rounds' name='player24rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner23' value='player23'>
                                                    $usernamep23                         
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner24' value='player24'>
                                                    $usernamep24
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
                
                <form method='post' id='match13Form'>
                    <div class='modal' id='declareWinnerModal13' role='dialog' aria-labelledby='declareWinnerModalLabel13' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel13'>Match 13:</h4>
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
                                                <label for='player25rounds'>$usernamep25</label>
                                                <input class='form-control' type='number' id='player25rounds' name='player25rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player26rounds'>$usernamep26</label>
                                                <input class='form-control' type='number' id='player26rounds' name='player26rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner25' value='player25'>
                                                    $usernamep25                         
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner26' value='player26'>
                                                    $usernamep26
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
                
                <form method='post' id='match14Form'>
                    <div class='modal' id='declareWinnerModal14' role='dialog' aria-labelledby='declareWinnerModalLabel14' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel14'>Match 14:</h4>
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
                                                <label for='player27rounds'>$usernamep27</label>
                                                <input class='form-control' type='number' id='player27rounds' name='player27rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player28rounds'>$usernamep28</label>
                                                <input class='form-control' type='number' id='player28rounds' name='player28rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner27' value='player27'>
                                                    $usernamep27                         
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner28' value='player28'>
                                                    $usernamep28
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
                
                <form method='post' id='match15Form'>
                    <div class='modal' id='declareWinnerModal15' role='dialog' aria-labelledby='declareWinnerModalLabel15' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel15'>Match 15:</h4>
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
                                                <label for='player29rounds'>$usernamep29</label>
                                                <input class='form-control' type='number' id='player29rounds' name='player29rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player30rounds'>$usernamep30</label>
                                                <input class='form-control' type='number' id='player30rounds' name='player30rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner29' value='player29'>
                                                    $usernamep29                         
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner30' value='player30'>
                                                    $usernamep30
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
                
                <form method='post' id='match16Form'>
                    <div class='modal' id='declareWinnerModal16' role='dialog' aria-labelledby='declareWinnerModalLabel16' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel16'>Match 16:</h4>
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
                                                <label for='player31rounds'>$usernamep31</label>
                                                <input class='form-control' type='number' id='player31rounds' name='player31rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player32rounds'>$usernamep32</label>
                                                <input class='form-control' type='number' id='player32rounds' name='player32rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner31' value='player31'>
                                                    $usernamep31                         
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner32' value='player32'>
                                                    $usernamep32
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
                                            echo "</label>
                                                <input class='form-control' type='number' id='player1rounds' name='player1rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player2rounds'>";
                                        if($player5wins == $stage){
                                            echo "$usernamep5";
                                        }elseif($player6wins == $stage){
                                            echo "$usernamep6";
                                        }
                                            echo "</label>
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
                                                <label for='player5rounds'>";
                                        if($player9wins == $stage){
                                            echo "$usernamep9";
                                        }elseif($player10wins == $stage){
                                            echo "$usernamep10";
                                        }
                                            echo "</label>
                                                <input class='form-control' type='number' id='player5rounds' name='player5rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player6rounds'>";
                                        if($player13wins == $stage){
                                            echo "$usernamep13";
                                        }elseif($player14wins == $stage){
                                            echo "$usernamep14";
                                        }
                                            echo "</label>
                                                <input class='form-control' type='number' id='player6rounds' name='player6rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner5'";
                                        if($player9wins == $stage){
                                            echo "value='player9'>
                                                    $usernamep9";
                                        }elseif($player10wins == $stage){
                                            echo "value='player10'>
                                                    $usernamep10";
                                        }
                                            echo "                            
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner6'";
                                        if($player13wins == $stage){
                                            echo "value='player13'>
                                                    $usernamep13";
                                        }elseif($player14wins == $stage){
                                            echo "value='player14'>
                                                    $usernamep14";
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
                                                <label for='player7rounds'>";
                                        if($player11wins == $stage){
                                            echo "$usernamep11";
                                        }elseif($player12wins == $stage){
                                            echo "$usernamep12";
                                        }
                                            echo "</label>
                                                <input class='form-control' type='number' id='player7rounds' name='player7rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player8rounds'>";
                                        if($player15wins == $stage){
                                            echo "$usernamep15";
                                        }elseif($player16wins == $stage){
                                            echo "$usernamep16";
                                        }
                                            echo "</label>
                                                <input class='form-control' type='number' id='player8rounds' name='player8rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner7'";
                                        if($player11wins == $stage){
                                            echo "value='player11'>
                                                    $usernamep11";
                                        }elseif($player12wins == $stage){
                                            echo "value='player12'>
                                                    $usernamep12";
                                        }
                                            echo "                   
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner8'";
                                        if($player15wins == $stage){
                                            echo "value='player15'>
                                                    $usernamep15";
                                        }elseif($player16wins == $stage){
                                            echo "value='player16'>
                                                    $usernamep16";
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
                
                <form method='post' id='match5Form'>
                    <div class='modal' id='declareWinnerModal5' role='dialog' aria-labelledby='declareWinnerModalLabel5' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel5'>Match 5:</h4>
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
                                                <label for='player9rounds'>";
                                        if($player17wins == $stage){
                                            echo "$usernamep17";
                                        }elseif($player18wins == $stage){
                                            echo "$usernamep18";
                                        }
                                            echo "</label>
                                                <input class='form-control' type='number' id='player9rounds' name='player9rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player10rounds'>";
                                        if($player21wins == $stage){
                                            echo "$usernamep21";
                                        }elseif($player22wins == $stage){
                                            echo "$usernamep22";
                                        }
                                            echo "</label>
                                                <input class='form-control' type='number' id='player10rounds' name='player10rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner9'";
                                        if($player17wins == $stage){
                                            echo "value='player17'>
                                                    $usernamep17";
                                        }elseif($player18wins == $stage){
                                            echo "value='player18'>
                                                    $usernamep18";
                                        }
                                            echo "                        
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner10'";
                                        if($player21wins == $stage){
                                            echo "value='player21'>
                                                    $usernamep21";
                                        }elseif($player22wins == $stage){
                                            echo "value='player22'>
                                                    $usernamep22";
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
                
                <form method='post' id='match6Form'>
                    <div class='modal' id='declareWinnerModal6' role='dialog' aria-labelledby='declareWinnerModalLabel6' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel6'>Match 6:</h4>
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
                                                <label for='player11rounds'>";
                                        if($player19wins == $stage){
                                            echo "$usernamep19";
                                        }elseif($player20wins == $stage){
                                            echo "$usernamep20";
                                        }
                                            echo "</label>
                                                <input class='form-control' type='number' id='player11rounds' name='player11rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player12rounds'>";
                                        if($player23wins == $stage){
                                            echo "$usernamep23";
                                        }elseif($player24wins == $stage){
                                            echo "$usernamep24";
                                        }
                                            echo "</label>
                                                <input class='form-control' type='number' id='player12rounds' name='player12rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner11'";
                                        if($player19wins == $stage){
                                            echo "value='player19'>
                                                    $usernamep19";
                                        }elseif($player20wins == $stage){
                                            echo "value='player20'>
                                                    $usernamep20";
                                        }
                                            echo "                             
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner12'";
                                        if($player23wins == $stage){
                                            echo "value='player23'>
                                                    $usernamep23";
                                        }elseif($player24wins == $stage){
                                            echo "value='player24'>
                                                    $usernamep24";
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
                
                <form method='post' id='match7Form'>
                    <div class='modal' id='declareWinnerModal7' role='dialog' aria-labelledby='declareWinnerModalLabel7' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel7'>Match 7:</h4>
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
                                                <label for='player13rounds'>";
                                        if($player26wins == $stage){
                                            echo "$usernamep26";
                                        }elseif($player26wins == $stage){
                                            echo "$usernamep26";
                                        }
                                            echo "</label>
                                                <input class='form-control' type='number' id='player13rounds' name='player13rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player14rounds'>";
                                        if($player29wins == $stage){
                                            echo "$usernamep29";
                                        }elseif($player325wins == $stage){
                                            echo "$usernamep325";
                                        }
                                            echo "</label>
                                                <input class='form-control' type='number' id='player14rounds' name='player14rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner13'";
                                        if($player25wins == $stage){
                                            echo "value='player25'>
                                                    $usernamep25";
                                        }elseif($player26wins == $stage){
                                            echo "value='player26'>
                                                    $usernamep26";
                                        }
                                            echo "                            
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner14'";
                                        if($player29wins == $stage){
                                            echo "value='player29'>
                                                    $usernamep29";
                                        }elseif($player30wins == $stage){
                                            echo "value='player30'>
                                                    $usernamep30";
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
                
                <form method='post' id='match8Form'>
                    <div class='modal' id='declareWinnerModal8' role='dialog' aria-labelledby='declareWinnerModalLabel8' aria-hidden='true'>
                        <div class='modal-dialog'>
                            <div class='modal-content'>
                                <div class='modal-header'>
                                    <a class='close' data-dismiss='modal'>&times;</a>
                                    <h4 id='declareWinnerModalLabel8'>Match 8:</h4>
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
                                                <label for='player15rounds'>";
                                        if($player27wins == $stage){
                                            echo "$usernamep27";
                                        }elseif($player28wins == $stage){
                                            echo "$usernamep28";
                                        }
                                            echo "</label>
                                                <input class='form-control' type='number' id='player15rounds' name='player15rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player16rounds'>";
                                        if($player31wins == $stage){
                                            echo "$usernamep31";
                                        }elseif($player32wins == $stage){
                                            echo "$usernamep32";
                                        }
                                            echo "</label>
                                                <input class='form-control' type='number' id='player16rounds' name='player16rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner15'";
                                        if($player27wins == $stage){
                                            echo "value='player27'>
                                                    $usernamep27";
                                        }elseif($player28wins == $stage){
                                            echo "value='player28'>
                                                    $usernamep28";
                                        }
                                            echo "                   
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner16'";
                                        if($player31wins == $stage){
                                            echo "value='player31'>
                                                    $usernamep31";
                                        }elseif($player32wins == $stage){
                                            echo "value='player32'>
                                                    $usernamep32";
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
                ";
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
                                        if($player9wins == $stage){
                                            echo "$usernamep9";
                                        }elseif($player10wins == $stage){
                                            echo "$usernamep10";
                                        }elseif($player13wins == $stage){
                                            echo "$usernamep13";
                                        }elseif($player14wins == $stage){
                                            echo "$usernamep14";
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
                                        if($player9wins == $stage){
                                            echo "value='player9'>
                                                    $usernamep9";
                                        }elseif($player10wins == $stage){
                                            echo "value='player10'>
                                                    $usernamep10";
                                        }elseif($player13wins == $stage){
                                            echo "value='player13'>
                                                    $usernamep13";
                                        }elseif($player14wins == $stage){
                                            echo "value='player14'>
                                                    $usernamep14";
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
                                        }elseif($player7wins == $stage){
                                            echo "$usernamep7";
                                        }elseif($player8wins == $stage){
                                            echo "$usernamep8";
                                        }
                                            echo "</label>
                                                <input class='form-control' type='number' id='player3rounds' name='player3rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player4rounds'>";
                                        if($player11wins == $stage){
                                            echo "$usernamep11";
                                        }elseif($player12wins == $stage){
                                            echo "$usernamep12";
                                        }elseif($player15wins == $stage){
                                            echo "$usernamep15";
                                        }elseif($player16wins == $stage){
                                            echo "$usernamep16";
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
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner4'";
                                        if($player11wins == $stage){
                                            echo "value='player11'>
                                                    $usernamep11";
                                        }elseif($player12wins == $stage){
                                            echo "value='player12'>
                                                    $usernamep12";
                                        }elseif($player15wins == $stage){
                                            echo "value='player15'>
                                                    $usernamep15";
                                        }elseif($player16wins == $stage){
                                            echo "value='player16'>
                                                    $usernamep16";
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
                                                <label for='player5rounds'>";
                                        if($player17wins == $stage){
                                            echo "$usernamep17";
                                        }elseif($player18wins == $stage){
                                            echo "$usernamep18";
                                        }elseif($player21wins == $stage){
                                            echo "$usernamep21";
                                        }elseif($player22wins == $stage){
                                            echo "$usernamep22";
                                        }
                                            echo "
                                                </label>
                                                <input class='form-control' type='number' id='player5rounds' name='player5rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player6rounds'>";
                                        if($player26wins == $stage){
                                            echo "$usernamep26";
                                        }elseif($player26wins == $stage){
                                            echo "$usernamep26";
                                        }elseif($player29wins == $stage){
                                            echo "$usernamep29";
                                        }elseif($player30wins == $stage){
                                            echo "$usernamep30";
                                        }
                                            echo "
                                                </label>
                                                <input class='form-control' type='number' id='player6rounds' name='player6rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner5'";
                                        if($player17wins == $stage){
                                            echo "value='player17'>
                                                    $usernamep17";
                                        }elseif($player18wins == $stage){
                                            echo "value='player18'>
                                                    $usernamep18";
                                        }elseif($player21wins == $stage){
                                            echo "value='player21'>
                                                    $usernamep21";
                                        }elseif($player22wins == $stage){
                                            echo "value='player22'>
                                                    $usernamep22";
                                        }
                                            echo "                          
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner6'";
                                        if($player25wins == $stage){
                                            echo "value='player25'>
                                                    $usernamep25";
                                        }elseif($player26wins == $stage){
                                            echo "value='player26'>
                                                    $usernamep26";
                                        }elseif($player29wins == $stage){
                                            echo "value='player29'>
                                                    $usernamep29";
                                        }elseif($player30wins == $stage){
                                            echo "value='player30'>
                                                    $usernamep30";
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
                                                <label for='player7rounds'>";
                                        if($player19wins == $stage){
                                            echo "$usernamep19";
                                        }elseif($player20wins == $stage){
                                            echo "$usernamep20";
                                        }elseif($player23wins == $stage){
                                            echo "$usernamep23";
                                        }elseif($player24wins == $stage){
                                            echo "$usernamep24";
                                        }
                                            echo "</label>
                                                <input class='form-control' type='number' id='player7rounds' name='player7rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player8rounds'>";
                                        if($player27wins == $stage){
                                            echo "$usernamep27";
                                        }elseif($player28wins == $stage){
                                            echo "$usernamep28";
                                        }elseif($player31wins == $stage){
                                            echo "$usernamep31";
                                        }elseif($player32wins == $stage){
                                            echo "$usernamep32";
                                        }
                                            echo "</label>
                                                <input class='form-control' type='number' id='player8rounds' name='player8rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class='form-group resultInput'>
                                    <h3>Select the Winner</h3>
                                        <div class='row'>
                                            <div class='col-xs-5 roundsLeft'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner7'";
                                        if($player19wins == $stage){
                                            echo "value='player19'>
                                                    $usernamep19";
                                        }elseif($player20wins == $stage){
                                            echo "value='player20'>
                                                    $usernamep20";
                                        }elseif($player23wins == $stage){
                                            echo "value='player23'>
                                                    $usernamep23";
                                        }elseif($player24wins == $stage){
                                            echo "value='player24'>
                                                    $usernamep24";
                                        }
                                            echo "     
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner8'";
                                        if($player27wins == $stage){
                                            echo "value='player27'>
                                                    $usernamep27";
                                        }elseif($player28wins == $stage){
                                            echo "value='player28'>
                                                    $usernamep28";
                                        }elseif($player31wins == $stage){
                                            echo "value='player31'>
                                                    $usernamep31";
                                        }elseif($player32wins == $stage){
                                            echo "value='player32'>
                                                    $usernamep32";
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
                ";
            }elseif($stage == '3'){
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
                                        }elseif($player9wins == $stage){
                                            echo "$usernamep9";
                                        }elseif($player10wins == $stage){
                                            echo "$usernamep10";
                                        }elseif($player13wins == $stage){
                                            echo "$usernamep13";
                                        }elseif($player14wins == $stage){
                                            echo "$usernamep14";
                                        }
                                            echo "
                                                </label>
                                                <input class='form-control' type='number' id='player1rounds' name='player1rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player2rounds'>";
                                        if($player17wins == $stage){
                                            echo "$usernamep17";
                                        }elseif($player18wins == $stage){
                                            echo "$usernamep18";
                                        }elseif($player21wins == $stage){
                                            echo "$usernamep21";
                                        }elseif($player22wins == $stage){
                                            echo "$usernamep22";
                                        }elseif($player26wins == $stage){
                                            echo "$usernamep26";
                                        }elseif($player26wins == $stage){
                                            echo "$usernamep26";
                                        }elseif($player29wins == $stage){
                                            echo "$usernamep29";
                                        }elseif($player30wins == $stage){
                                            echo "$usernamep30";
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
                                        }elseif($player9wins == $stage){
                                            echo "value='player9'>
                                                    $usernamep9";
                                        }elseif($player10wins == $stage){
                                            echo "value='player10'>
                                                    $usernamep10";
                                        }elseif($player13wins == $stage){
                                            echo "value='player13'>
                                                    $usernamep13";
                                        }elseif($player14wins == $stage){
                                            echo "value='player14'>
                                                    $usernamep14";
                                        }
                                            echo "                          
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner2'";
                                        if($player17wins == $stage){
                                            echo "value='player17'>
                                                    $usernamep17";
                                        }elseif($player18wins == $stage){
                                            echo "value='player18'>
                                                    $usernamep18";
                                        }elseif($player21wins == $stage){
                                            echo "value='player21'>
                                                    $usernamep21";
                                        }elseif($player22wins == $stage){
                                            echo "value='player22'>
                                                    $usernamep22";
                                        }elseif($player25wins == $stage){
                                            echo "value='player25'>
                                                    $usernamep25";
                                        }elseif($player26wins == $stage){
                                            echo "value='player26'>
                                                    $usernamep26";
                                        }elseif($player29wins == $stage){
                                            echo "value='player29'>
                                                    $usernamep29";
                                        }elseif($player30wins == $stage){
                                            echo "value='player30'>
                                                    $usernamep30";
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
                                        }elseif($player7wins == $stage){
                                            echo "$usernamep7";
                                        }elseif($player8wins == $stage){
                                            echo "$usernamep8";
                                        }elseif($player11wins == $stage){
                                            echo "$usernamep11";
                                        }elseif($player12wins == $stage){
                                            echo "$usernamep12";
                                        }elseif($player15wins == $stage){
                                            echo "$usernamep15";
                                        }elseif($player16wins == $stage){
                                            echo "$usernamep16";
                                        }
                                            echo "
                                                </label>
                                                <input class='form-control' type='number' id='player3rounds' name='player3rounds' placeholder='Wins' maxlength='3'> 
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-4 roundsRight'>
                                                <label for='player4rounds'>";
                                        if($player19wins == $stage){
                                            echo "$usernamep19";
                                        }elseif($player20wins == $stage){
                                            echo "$usernamep20";
                                        }elseif($player23wins == $stage){
                                            echo "$usernamep23";
                                        }elseif($player24wins == $stage){
                                            echo "$usernamep24";
                                        }elseif($player27wins == $stage){
                                            echo "$usernamep27";
                                        }elseif($player28wins == $stage){
                                            echo "$usernamep28";
                                        }elseif($player31wins == $stage){
                                            echo "$usernamep31";
                                        }elseif($player32wins == $stage){
                                            echo "$usernamep32";
                                        }
                                            echo "
                                                </label>
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
                                        }elseif($player7wins == $stage){
                                            echo "value='player7'>
                                                    $usernamep7";
                                        }elseif($player8wins == $stage){
                                            echo "value='player8'>
                                                    $usernamep8";
                                        }elseif($player11wins == $stage){
                                            echo "value='player11'>
                                                    $usernamep11";
                                        }elseif($player12wins == $stage){
                                            echo "value='player12'>
                                                    $usernamep12";
                                        }elseif($player15wins == $stage){
                                            echo "value='player15'>
                                                    $usernamep15";
                                        }elseif($player16wins == $stage){
                                            echo "value='player16'>
                                                    $usernamep16";
                                        }
                                            echo "                          
                                                </label>
                                            </div>
                                            <div class='col-xs-offset-2 col-xs-5 roundsRight'>
                                                <label>
                                                    <input type='radio' name='matchwinner' id='winner4'";
                                        if($player19wins == $stage){
                                            echo "value='player19'>
                                                    $usernamep19";
                                        }elseif($player20wins == $stage){
                                            echo "value='player20'>
                                                    $usernamep20";
                                        }elseif($player23wins == $stage){
                                            echo "value='player23'>
                                                    $usernamep23";
                                        }elseif($player24wins == $stage){
                                            echo "value='player24'>
                                                    $usernamep24";
                                        }elseif($player27wins == $stage){
                                            echo "value='player27'>
                                                    $usernamep27";
                                        }elseif($player28wins == $stage){
                                            echo "value='player28'>
                                                    $usernamep28";
                                        }elseif($player31wins == $stage){
                                            echo "value='player31'>
                                                    $usernamep31";
                                        }elseif($player32wins == $stage){
                                            echo "value='player32'>
                                                    $usernamep32";
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