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
        $player33 = $row['player33_id'];
        $player34 = $row['player34_id'];
        $player35 = $row['player35_id'];
        $player36 = $row['player36_id'];
        $player37 = $row['player37_id'];
        $player38 = $row['player38_id'];
        $player39 = $row['player39_id'];
        $player40 = $row['player40_id'];
        $player41 = $row['player41_id'];
        $player42 = $row['player42_id'];
        $player43 = $row['player43_id'];
        $player44 = $row['player44_id'];
        $player45 = $row['player45_id'];
        $player46 = $row['player46_id'];
        $player47 = $row['player47_id'];
        $player48 = $row['player48_id'];
        $player49 = $row['player49_id'];
        $player50 = $row['player50_id'];
        $player51 = $row['player51_id'];
        $player52 = $row['player52_id'];
        $player53 = $row['player53_id'];
        $player54 = $row['player54_id'];
        $player55 = $row['player55_id'];
        $player56 = $row['player56_id'];
        $player57 = $row['player57_id'];
        $player58 = $row['player58_id'];
        $player59 = $row['player59_id'];
        $player60 = $row['player60_id'];
        $player61 = $row['player61_id'];
        $player62 = $row['player62_id'];
        $player63 = $row['player63_id'];
        $player64 = $row['player64_id'];
        
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
        
        if($player33 != '0' && $player33 != NULL){
            $sql033 = "SELECT * FROM users WHERE user_id='$player33'";
            $result033 = mysqli_query($link, $sql033);
            if(mysqli_num_rows($result033)>0){
                $row033 = mysqli_fetch_array($result033, MYSQLI_ASSOC);
                $usernamep33 = $row033['username'];
                $profilepicp33 = $row033['profilepicture'];
            }
        }else{
            $usernamep33 = "Not Yet Registered";
        }
        
        if($player34 != '0' && $player34 != NULL){
            $sql034 = "SELECT * FROM users WHERE user_id='$player34'";
            $result034 = mysqli_query($link, $sql034);
            if(mysqli_num_rows($result034)>0){
                $row034 = mysqli_fetch_array($result034, MYSQLI_ASSOC);
                $usernamep34 = $row034['username'];
                $profilepicp34 = $row034['profilepicture'];
            }
        }else{
            $usernamep34 = "Not Yet Registered";
        }
        
        if($player35 != '0' && $player35 != NULL){
            $sql035 = "SELECT * FROM users WHERE user_id='$player35'";
            $result035 = mysqli_query($link, $sql035);
            if(mysqli_num_rows($result035)>0){
                $row035 = mysqli_fetch_array($result035, MYSQLI_ASSOC);
                $usernamep35 = $row035['username'];
                $profilepicp35 = $row035['profilepicture'];
            }
        }else{
            $usernamep35 = "Not Yet Registered";
        }
        
        if($player36 != '0' && $player36 != NULL){
            $sql036 = "SELECT * FROM users WHERE user_id='$player36'";
            $result036 = mysqli_query($link, $sql036);
            if(mysqli_num_rows($result036)>0){
                $row036 = mysqli_fetch_array($result036, MYSQLI_ASSOC);
                $usernamep36 = $row036['username'];
                $profilepicp36 = $row036['profilepicture'];
            }
        }else{
            $usernamep36 = "Not Yet Registered";
        }
        
        if($player37 != '0' && $player37 != NULL){
            $sql037 = "SELECT * FROM users WHERE user_id='$player37'";
            $result037 = mysqli_query($link, $sql037);
            if(mysqli_num_rows($result037)>0){
                $row037 = mysqli_fetch_array($result037, MYSQLI_ASSOC);
                $usernamep37 = $row037['username'];
                $profilepicp37 = $row037['profilepicture'];
            }
        }else{
            $usernamep37 = "Not Yet Registered";
        }
        
        if($player38 != '0' && $player38 != NULL){
            $sql038 = "SELECT * FROM users WHERE user_id='$player38'";
            $result038 = mysqli_query($link, $sql038);
            if(mysqli_num_rows($result038)>0){
                $row038 = mysqli_fetch_array($result038, MYSQLI_ASSOC);
                $usernamep38 = $row038['username'];
                $profilepicp38 = $row038['profilepicture'];
            }
        }else{
            $usernamep38 = "Not Yet Registered";
        }
        
        if($player39 != '0' && $player39 != NULL){
            $sql039 = "SELECT * FROM users WHERE user_id='$player39'";
            $result039 = mysqli_query($link, $sql039);
            if(mysqli_num_rows($result039)>0){
                $row039 = mysqli_fetch_array($result039, MYSQLI_ASSOC);
                $usernamep39 = $row039['username'];
                $profilepicp39 = $row039['profilepicture'];
            }
        }else{
            $usernamep39 = "Not Yet Registered";
        }
        
        if($player40 != '0' && $player40 != NULL){
            $sql040 = "SELECT * FROM users WHERE user_id='$player40'";
            $result040 = mysqli_query($link, $sql040);
            if(mysqli_num_rows($result040)>0){
                $row040 = mysqli_fetch_array($result040, MYSQLI_ASSOC);
                $usernamep40 = $row040['username'];
                $profilepicp40 = $row040['profilepicture'];
            }
        }else{
            $usernamep40 = "Not Yet Registered";
        } 
        
        if($player41 != '0' && $player41 != NULL){
            $sql041 = "SELECT * FROM users WHERE user_id='$player41'";
            $result041 = mysqli_query($link, $sql041);
            if(mysqli_num_rows($result041)>0){
                $row041 = mysqli_fetch_array($result041, MYSQLI_ASSOC);
                $usernamep41 = $row041['username'];
                $profilepicp41 = $row041['profilepicture'];
            }
        }else{
            $usernamep41 = "Not Yet Registered";
        }
        
        if($player42 != '0' && $player42 != NULL){
            $sql042 = "SELECT * FROM users WHERE user_id='$player42'";
            $result042 = mysqli_query($link, $sql042);
            if(mysqli_num_rows($result042)>0){
                $row042 = mysqli_fetch_array($result042, MYSQLI_ASSOC);
                $usernamep42 = $row042['username'];
                $profilepicp42 = $row042['profilepicture'];
            }
        }else{
            $usernamep42 = "Not Yet Registered";
        }
        
        if($player43 != '0' && $player43 != NULL){
            $sql043 = "SELECT * FROM users WHERE user_id='$player43'";
            $result043 = mysqli_query($link, $sql043);
            if(mysqli_num_rows($result043)>0){
                $row043 = mysqli_fetch_array($result043, MYSQLI_ASSOC);
                $usernamep43 = $row043['username'];
                $profilepicp43 = $row043['profilepicture'];
            }
        }else{
            $usernamep43 = "Not Yet Registered";
        }
        
        if($player44 != '0' && $player44 != NULL){
            $sql044 = "SELECT * FROM users WHERE user_id='$player44'";
            $result044 = mysqli_query($link, $sql044);
            if(mysqli_num_rows($result044)>0){
                $row044 = mysqli_fetch_array($result044, MYSQLI_ASSOC);
                $usernamep44 = $row044['username'];
                $profilepicp44 = $row044['profilepicture'];
            }
        }else{
            $usernamep44 = "Not Yet Registered";
        }
        
        if($player45 != '0' && $player45 != NULL){
            $sql045 = "SELECT * FROM users WHERE user_id='$player45'";
            $result045 = mysqli_query($link, $sql045);
            if(mysqli_num_rows($result045)>0){
                $row045 = mysqli_fetch_array($result045, MYSQLI_ASSOC);
                $usernamep45 = $row045['username'];
                $profilepicp45 = $row045['profilepicture'];
            }
        }else{
            $usernamep45 = "Not Yet Registered";
        }
        
        if($player46 != '0' && $player46 != NULL){
            $sql046 = "SELECT * FROM users WHERE user_id='$player46'";
            $result046 = mysqli_query($link, $sql046);
            if(mysqli_num_rows($result046)>0){
                $row046 = mysqli_fetch_array($result046, MYSQLI_ASSOC);
                $usernamep46 = $row046['username'];
                $profilepicp46 = $row046['profilepicture'];
            }
        }else{
            $usernamep46 = "Not Yet Registered";
        }
        
        if($player47 != '0' && $player47 != NULL){
            $sql047 = "SELECT * FROM users WHERE user_id='$player47'";
            $result047 = mysqli_query($link, $sql047);
            if(mysqli_num_rows($result047)>0){
                $row047 = mysqli_fetch_array($result047, MYSQLI_ASSOC);
                $usernamep47 = $row047['username'];
                $profilepicp47 = $row047['profilepicture'];
            }
        }else{
            $usernamep47 = "Not Yet Registered";
        }
        
        if($player48 != '0' && $player48 != NULL){
            $sql048 = "SELECT * FROM users WHERE user_id='$player48'";
            $result048 = mysqli_query($link, $sql048);
            if(mysqli_num_rows($result048)>0){
                $row048 = mysqli_fetch_array($result048, MYSQLI_ASSOC);
                $usernamep48 = $row048['username'];
                $profilepicp48 = $row048['profilepicture'];
            }
        }else{
            $usernamep48 = "Not Yet Registered";
        }
        
        if($player49 != '0' && $player49 != NULL){
            $sql049 = "SELECT * FROM users WHERE user_id='$player49'";
            $result049 = mysqli_query($link, $sql049);
            if(mysqli_num_rows($result049)>0){
                $row049 = mysqli_fetch_array($result049, MYSQLI_ASSOC);
                $usernamep49 = $row049['username'];
                $profilepicp49 = $row049['profilepicture'];
            }
        }else{
            $usernamep49 = "Not Yet Registered";
        }
        
        if($player50 != '0' && $player50 != NULL){
            $sql050 = "SELECT * FROM users WHERE user_id='$player50'";
            $result050 = mysqli_query($link, $sql050);
            if(mysqli_num_rows($result050)>0){
                $row050 = mysqli_fetch_array($result050, MYSQLI_ASSOC);
                $usernamep50 = $row050['username'];
                $profilepicp50 = $row050['profilepicture'];
            }
        }else{
            $usernamep50 = "Not Yet Registered";
        }
        
        if($player51 != '0' && $player51 != NULL){
            $sql051 = "SELECT * FROM users WHERE user_id='$player51'";
            $result051 = mysqli_query($link, $sql051);
            if(mysqli_num_rows($result051)>0){
                $row051 = mysqli_fetch_array($result051, MYSQLI_ASSOC);
                $usernamep51 = $row051['username'];
                $profilepicp51 = $row051['profilepicture'];
            }
        }else{
            $usernamep51 = "Not Yet Registered";
        }
        
        if($player52 != '0' && $player52 != NULL){
            $sql052 = "SELECT * FROM users WHERE user_id='$player52'";
            $result052 = mysqli_query($link, $sql052);
            if(mysqli_num_rows($result052)>0){
                $row052 = mysqli_fetch_array($result052, MYSQLI_ASSOC);
                $usernamep52 = $row052['username'];
                $profilepicp52 = $row052['profilepicture'];
            }
        }else{
            $usernamep52 = "Not Yet Registered";
        }
        
        if($player53 != '0' && $player53 != NULL){
            $sql053 = "SELECT * FROM users WHERE user_id='$player53'";
            $result053 = mysqli_query($link, $sql053);
            if(mysqli_num_rows($result053)>0){
                $row053 = mysqli_fetch_array($result053, MYSQLI_ASSOC);
                $usernamep53 = $row053['username'];
                $profilepicp53 = $row053['profilepicture'];
            }
        }else{
            $usernamep53 = "Not Yet Registered";
        }
        
        if($player54 != '0' && $player54 != NULL){
            $sql054 = "SELECT * FROM users WHERE user_id='$player54'";
            $result054 = mysqli_query($link, $sql054);
            if(mysqli_num_rows($result054)>0){
                $row054 = mysqli_fetch_array($result054, MYSQLI_ASSOC);
                $usernamep54 = $row054['username'];
                $profilepicp54 = $row054['profilepicture'];
            }
        }else{
            $usernamep54 = "Not Yet Registered";
        }
        
        if($player55 != '0' && $player55 != NULL){
            $sql055 = "SELECT * FROM users WHERE user_id='$player55'";
            $result055 = mysqli_query($link, $sql055);
            if(mysqli_num_rows($result055)>0){
                $row055 = mysqli_fetch_array($result055, MYSQLI_ASSOC);
                $usernamep55 = $row055['username'];
                $profilepicp55 = $row055['profilepicture'];
            }
        }else{
            $usernamep55 = "Not Yet Registered";
        }
        
        if($player56 != '0' && $player56 != NULL){
            $sql056 = "SELECT * FROM users WHERE user_id='$player56'";
            $result056 = mysqli_query($link, $sql056);
            if(mysqli_num_rows($result056)>0){
                $row056 = mysqli_fetch_array($result056, MYSQLI_ASSOC);
                $usernamep56 = $row056['username'];
                $profilepicp56 = $row056['profilepicture'];
            }
        }else{
            $usernamep56 = "Not Yet Registered";
        }
        
        if($player57 != '0' && $player57 != NULL){
            $sql057 = "SELECT * FROM users WHERE user_id='$player57'";
            $result057 = mysqli_query($link, $sql057);
            if(mysqli_num_rows($result057)>0){
                $row057 = mysqli_fetch_array($result057, MYSQLI_ASSOC);
                $usernamep57 = $row057['username'];
                $profilepicp57 = $row057['profilepicture'];
            }
        }else{
            $usernamep57 = "Not Yet Registered";
        }
        
        if($player58 != '0' && $player58 != NULL){
            $sql058 = "SELECT * FROM users WHERE user_id='$player58'";
            $result058 = mysqli_query($link, $sql058);
            if(mysqli_num_rows($result058)>0){
                $row058 = mysqli_fetch_array($result058, MYSQLI_ASSOC);
                $usernamep58 = $row058['username'];
                $profilepicp58 = $row058['profilepicture'];
            }
        }else{
            $usernamep58 = "Not Yet Registered";
        }
        
        if($player59 != '0' && $player59 != NULL){
            $sql059 = "SELECT * FROM users WHERE user_id='$player59'";
            $result059 = mysqli_query($link, $sql059);
            if(mysqli_num_rows($result059)>0){
                $row059 = mysqli_fetch_array($result059, MYSQLI_ASSOC);
                $usernamep59 = $row059['username'];
                $profilepicp59 = $row059['profilepicture'];
            }
        }else{
            $usernamep59 = "Not Yet Registered";
        }
        
        if($player60 != '0' && $player60 != NULL){
            $sql060 = "SELECT * FROM users WHERE user_id='$player60'";
            $result060 = mysqli_query($link, $sql060);
            if(mysqli_num_rows($result060)>0){
                $row060 = mysqli_fetch_array($result060, MYSQLI_ASSOC);
                $usernamep60 = $row060['username'];
                $profilepicp60 = $row060['profilepicture'];
            }
        }else{
            $usernamep60 = "Not Yet Registered";
        }
        
        if($player61 != '0' && $player61 != NULL){
            $sql061 = "SELECT * FROM users WHERE user_id='$player61'";
            $result061 = mysqli_query($link, $sql061);
            if(mysqli_num_rows($result061)>0){
                $row061 = mysqli_fetch_array($result061, MYSQLI_ASSOC);
                $usernamep61 = $row061['username'];
                $profilepicp61 = $row061['profilepicture'];
            }
        }else{
            $usernamep61 = "Not Yet Registered";
        }
        
        if($player62 != '0' && $player62 != NULL){
            $sql062 = "SELECT * FROM users WHERE user_id='$player62'";
            $result062 = mysqli_query($link, $sql062);
            if(mysqli_num_rows($result062)>0){
                $row062 = mysqli_fetch_array($result062, MYSQLI_ASSOC);
                $usernamep62 = $row062['username'];
                $profilepicp62 = $row062['profilepicture'];
            }
        }else{
            $usernamep62 = "Not Yet Registered";
        }
        
        if($player63 != '0' && $player63 != NULL){
            $sql063 = "SELECT * FROM users WHERE user_id='$player63'";
            $result063 = mysqli_query($link, $sql063);
            if(mysqli_num_rows($result063)>0){
                $row063 = mysqli_fetch_array($result063, MYSQLI_ASSOC);
                $usernamep63 = $row063['username'];
                $profilepicp63 = $row063['profilepicture'];
            }
        }else{
            $usernamep63 = "Not Yet Registered";
        }
        
        if($player64 != '0' && $player64 != NULL){
            $sql064 = "SELECT * FROM users WHERE user_id='$player64'";
            $result064 = mysqli_query($link, $sql064);
            if(mysqli_num_rows($result064)>0){
                $row064 = mysqli_fetch_array($result064, MYSQLI_ASSOC);
                $usernamep64 = $row064['username'];
                $profilepicp64 = $row064['profilepicture'];
            }
        }else{
            $usernamep64 = "Not Yet Registered";
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
        $player33wins = $row['p33_wins'];
        $player34wins = $row['p34_wins'];
        $player35wins = $row['p35_wins'];
        $player36wins = $row['p36_wins'];
        $player37wins = $row['p37_wins'];
        $player38wins = $row['p38_wins'];
        $player39wins = $row['p39_wins'];
        $player40wins = $row['p40_wins'];
        $player41wins = $row['p41_wins'];
        $player42wins = $row['p42_wins'];
        $player43wins = $row['p43_wins'];
        $player44wins = $row['p44_wins'];
        $player45wins = $row['p45_wins'];
        $player46wins = $row['p46_wins'];
        $player47wins = $row['p47_wins'];
        $player48wins = $row['p48_wins'];
        $player49wins = $row['p49_wins'];
        $player50wins = $row['p50_wins'];
        $player51wins = $row['p51_wins'];
        $player52wins = $row['p52_wins'];
        $player53wins = $row['p53_wins'];
        $player54wins = $row['p54_wins'];
        $player55wins = $row['p55_wins'];
        $player56wins = $row['p56_wins'];
        $player57wins = $row['p57_wins'];
        $player58wins = $row['p58_wins'];
        $player59wins = $row['p59_wins'];
        $player60wins = $row['p60_wins'];
        $player61wins = $row['p61_wins'];
        $player62wins = $row['p62_wins'];
        $player63wins = $row['p63_wins'];
        $player64wins = $row['p64_wins'];
        
        $stage = $row['stage_number'];
        
        echo "
            <h1>";
        if($seats == '8'){
            if($stage == '0'){
                echo "Welcome to Stage 1 ";
            }elseif($stage == '1'){
                echo "Welcome to The Semi-Final ";
            }elseif($stage == '2'){
                echo "Welcome to The Final ";
            }elseif($stage == '3'){
                echo "Congratulations to the Winner ";
            }
        }elseif($seats == '16'){
            if($stage == '0'){
                echo "Welcome to Stage 1 ";
            }elseif($stage == '1'){
                echo "Welcome to The Quarter-Final ";
            }elseif($stage == '2'){
                echo "Welcome to The Semi-Final ";
            }elseif($stage == '3'){
                echo "Welcome to The Final ";
            }elseif($stage == '4'){
                echo "Congratulations to the Winner ";
            }
        }elseif($seats == '32'){
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
        }elseif($seats == '64'){
            if($stage == '0'){
                echo "Welcome to Stage 1 ";
            }elseif($stage == '1'){
                echo "Welcome to Stage 2 ";
            }elseif($stage == '2'){
                echo "Welcome to Stage 3 ";
            }elseif($stage == '3'){
                echo "Welcome to The Quarter-Final ";
            }elseif($stage == '4'){
                echo "Welcome to The Semi-Final ";
            }elseif($stage == '5'){
                echo "Welcome to The Final ";
            }elseif($stage == '6'){
                echo "Congratulations to the Winner ";
            }
        }
        
        echo "of the Tournament: $eventname</h1>
            <div class='btnContainer'>
                <button type='button' class='btn btnColor resettournBtn' data-toggle='modal' data-target='#resetTournamentModal' data-event_id='$event_id'>Reset Tournament</button>
                <button type='button' class='btn btnDone nxtstageBtn' data-toggle='modal' data-target='#nextStageModal' data-event_id='$event_id'>Next Stage</button>
            </div>
            <div class='container'>
                ";
        
        if($seats == '8'){
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
        }elseif($seats == '16'){
            if($stage == '0'){
                
            }elseif($stage == '1'){
                
            }elseif($stage == '2'){
                
            }elseif($stage == '3'){
                
            }elseif($stage == '4'){
                
            }
        }elseif($seats == '32'){
            if($stage == '0'){
                
            }elseif($stage == '1'){
                
            }elseif($stage == '2'){
                
            }elseif($stage == '3'){
                
            }elseif($stage == '4'){
                
            }elseif($stage == '5'){
                
            }
        }elseif($seats == '64'){
            if($stage == '0'){
                
            }elseif($stage == '1'){
                
            }elseif($stage == '2'){
                
            }elseif($stage == '3'){
                
            }elseif($stage == '4'){
                
            }elseif($stage == '5'){
                
            }elseif($stage == '6'){
                
            }
        }
            
            echo "
            </div>
            ";
        
//        Modals
        if($seats == '8'){
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
        }elseif($seats == '16'){
            if($stage == '0'){
                
            }elseif($stage == '1'){
                
            }elseif($stage == '2'){
                
            }elseif($stage == '3'){
                
            }
        }elseif($seats == '32'){
            if($stage == '0'){
                
            }elseif($stage == '1'){
                
            }elseif($stage == '2'){
                
            }elseif($stage == '3'){
                
            }elseif($stage == '4'){
                
            }
        }elseif($seats == '64'){
            if($stage == '0'){
                
            }elseif($stage == '1'){
                
            }elseif($stage == '2'){
                
            }elseif($stage == '3'){
                
            }elseif($stage == '4'){
                
            }elseif($stage == '5'){
                
            }
        }
        
    }else{
        echo "<div class='alert alert-warning'>You are not attending any events yet!</div>";
    }
}else{
    echo "<div class='alert alert-warning'>SQL Error!</div>";
}

?>