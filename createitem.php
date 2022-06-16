<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

$user_id = $_SESSION['user_id'];

//Error Messages
$missingName = '<p><strong>Please give your item a Name!</strong></p>';
$missingDescription = '<p><strong>Please describe your item!</strong></p>';
$missingWeight = '<p><strong>Please declare the Item Weight!</strong></p>';
$invalidWeight = '<p><strong>Please use only numbers when declaring the Item Weight!</strong></p>';
$missingCost = '<p><strong>Please declare the Item Cost!</strong></p>';
$invalidCost = '<p><strong>Please use only numbers when declaring the Item Cost!</strong></p>';
$missingCoin = '<p><strong>Please select the denomination of coin for Item Cost!</strong></p>';
$missingAbility = '<p><strong>Please declare the ability required to use the Item!</strong></p>';
$missingScore = '<p><strong>Please tell us how high the ability score should be to use the item!</strong></p>';
$missingItemType = '<p><strong>Please tell us what type of Item you are creating!</strong></p>';
$missingArmourType = '<p><strong>Please tell us what type of Armour you are creating!</strong></p>';
$missingAC = '<p><strong>Please tell us the AC of your Armour!</strong></p>';
$missingWeaponType = '<p><strong>Please tell us what type of Weapon you are creating!</strong></p>';
$missingWeaponDie = '<p><strong>Please tell us the Damage Dice of your Weapon!</strong></p>';
$missingWeaponDamage = '<p><strong>Please tell us the Damage Type of your Weapon!</strong></p>';
$missingRange = '<p><strong>Please declare a short and long range for your Weapon!</strong></p>';
$invalidRange = '<p><strong>Please use only numbers when declaring your weapons range in feet!</strong></p>';
$missingAmmoName = '<p><strong>Please tell us the Ammo your Weapon requires!</strong></p>';
$missingRes = '<p><strong>Please tell us which type of resistance/immunity the race has!</strong></p>';
$missingFeatureDesc = '<p><strong>Please describe the extra feature that the race has!</strong></p>';

//<!--Check user inputs-->
if(empty($_POST["itemname"])){
    $errors .= $missingName;
}else{
    $itemname = filter_var($_POST["itemname"], FILTER_SANITIZE_STRING);
}
if(empty($_POST["itemdescription"])){
    $errors .= $missingDescription;
}else{
    $itemdescription = $_POST["itemdescription"];
    $itemdescription = str_replace("'", "’", "$itemdescription");
    $itemdescription = str_replace('"', '“', "$itemdescription");
    $itemdescription = filter_var($itemdescription, FILTER_SANITIZE_STRING);
}
if(empty($_POST["itemweight"])){
    $errors .= $missingWeight;
}else{
    if(preg_match('/\D/', $_POST["itemweight"])){
        $errors .= $invalidWeight;
    }else{
        $itemweight = filter_var($_POST["itemweight"], FILTER_SANITIZE_STRING);
    }
}
if(empty($_POST["itemcost"])){
    $errors .= $missingCost;
}else{
    if(preg_match('/\D/', $_POST["itemcost"])){
        $errors .= $invalidCost;
    }else{
        if(empty($_POST["itemcostcoin"])){
            $errors .= $missingCoin;
        }else{
            $itemcost = filter_var($_POST["itemcost"], FILTER_SANITIZE_STRING);
            $itemcost = $itemcost + 0;
            $itemcoin = $_POST["itemcostcoin"] + 0;
            $actualitemcost = $itemcost * $itemcoin;
        } 
    }
}

if($_POST["minability"] == "y"){
    if(empty($_POST["minabtype"])){
        $errors .= $missingAbility;
    }else{
        $minabtype = $_POST["minabtype"];
    }
    if(empty($_POST["minabscore"])){
        $errors .= $missingScore;
    }else{
        $minabscore = $_POST["minabscore"];
    }
}

if($_POST["magicitem"] == "y"){
    $magic = 1;
    if(!empty($_POST["attunement"])){
        $attunement = 1;
    }else{
        $attunement = 0;
    }
    if(empty($_POST["mitemtype"])){
        $errors .= $missingItemType;
    }else{
        $itemtype = $_POST["mitemtype"];
        if($itemtype == "ma"){
            if(!empty($_POST["stealthpen"])){
                $stealthpen = 1;
            }else{
                $stealthpen = 0;
            }
            if(empty($_POST["armourtype"])){
                $errors .= $missingArmourType;
            }else{
                $armourtype = $_POST["armourtype"];
                if($armourtype == "4"){
                    if(empty($_POST["shieldac"])){
                        $errors .= $missingAC;
                    }else{
                        $ac = $_POST["shieldac"];
                    }
                }else{
                    if(empty($_POST["armourac"])){
                        $errors .= $missingAC;
                    }else{
                        $ac = $_POST["armourac"];
                    }
                }
            }
            if(!empty($_POST["acbonus"])){
                $magicbonus = $_POST["acbonus"];
            }
        }elseif($itemtype == "mw"){
            if(empty($_POST["weapontype"])){
                $errors .= $missingWeaponType;
            }else{
                $weapontype = $_POST["weapontype"];
            }
            if(empty($_POST["weapdamagedie"])){
                $errors .= $missingWeaponDie;
            }else{
                $weapdamagedie = $_POST["weapdamagedie"];
            }
            if(empty($_POST["weapdamagetype"])){
                $errors .= $missingWeaponDamage;
            }else{
                $weapdamagetype = $_POST["weapdamagetype"];
            }
            if($_POST["rangedweap"] == "y"){
                if(preg_match('/\D/', $_POST["weapshortrange"])){
                    $errors .= $invalidRange;
                }else{
                    $weapshortrange = filter_var($_POST["weapshortrange"], FILTER_SANITIZE_STRING);
                }
                if(preg_match('/\D/', $_POST["weaplongrange"])){
                    $errors .= $invalidRange;
                }else{
                    $weaplongrange = filter_var($_POST["weaplongrange"], FILTER_SANITIZE_STRING);
                }
                if($_POST["needammo"] == "y"){
                    if(empty($_POST["ammoname"])){
                        $errors .= $missingAmmoName;
                    }else{
                        $ammoname = filter_var($_POST["ammoname"], FILTER_SANITIZE_STRING);
                    }
                }
            }
            if($_POST["addweapproperty"] == "y"){
                if(!empty($_POST["weapfinesse"])){
                    $weapfinesse = $_POST["weapfinesse"];
                }
                if(!empty($_POST["weapheavy"])){
                    $weapheavy = $_POST["weapheavy"];
                }
                if(!empty($_POST["weaplight"])){
                    $weaplight = $_POST["weaplight"];
                }
                if(!empty($_POST["weaploading"])){
                    $weaploading = $_POST["weaploading"];
                }
                if(!empty($_POST["weapreach"])){
                    $weapreach = $_POST["weapreach"];
                }
                if(!empty($_POST["weapthrown"])){
                    $weapthrown = $_POST["weapthrown"];
                }
                if(!empty($_POST["weap2hand"])){
                    $weap2hand = $_POST["weap2hand"];
                }
                if(!empty($_POST["weapversatile"])){
                    $weapversatile = $_POST["weapversatile"];
                }
                if(!empty($_POST["weapsilvered"])){
                    $weapsilvered = $_POST["weapsilvered"];
                }
                if(!empty($_POST["specialweapprop"])){
                    $specialweapprop = $_POST["specialweapprop"];
                    $specialweapprop = str_replace("'", "’", "$specialweapprop");
                    $specialweapprop = str_replace('"', '“', "$specialweapprop");
                    $specialweapprop = filter_var($specialweapprop, FILTER_SANITIZE_STRING);
                }
            }
            if(!empty($_POST["weapbonus"])){
                $magicbonus = $_POST["weapbonus"];
            }
        }
    }
}else{
    if(empty($_POST["sitemtype"])){
        $errors .= $missingItemType;
    }else{
        $itemtype = $_POST["sitemtype"];
        if($itemtype == "sa"){
            if(!empty($_POST["stealthpen"])){
                $stealthpen = 1;
            }else{
                $stealthpen = 0;
            }
            if(empty($_POST["armourtype"])){
                $errors .= $missingArmourType;
            }else{
                $armourtype = $_POST["armourtype"];
                if($armourtype == "4"){
                    if(empty($_POST["shieldac"])){
                        $errors .= $missingAC;
                    }else{
                        $ac = $_POST["shieldac"];
                    }
                }else{
                    if(empty($_POST["armourac"])){
                        $errors .= $missingAC;
                    }else{
                        $ac = $_POST["armourac"];
                    }
                }
            }
        }elseif($itemtype == "sw"){
            if(empty($_POST["weapontype"])){
                $errors .= $missingWeaponType;
            }else{
                $weapontype = $_POST["weapontype"];
            }
            if(empty($_POST["weapdamagedie"])){
                $errors .= $missingWeaponDie;
            }else{
                $weapdamagedie = $_POST["weapdamagedie"];
            }
            if(empty($_POST["weapdamagetype"])){
                $errors .= $missingWeaponDamage;
            }else{
                $weapdamagetype = $_POST["weapdamagetype"];
            }
            if($_POST["rangedweap"] == "y"){
                if(empty($_POST["weapshortrange"])){
                    $errors .= $missingRange;
                }else{
                    if(preg_match('/\D/', $_POST["weapshortrange"])){
                        $errors .= $invalidRange;
                    }else{
                        $weapshortrange = filter_var($_POST["weapshortrange"], FILTER_SANITIZE_STRING);
                    }
                }
                if(empty($_POST["weaplongrange"])){
                    $errors .= $missingRange;
                }else{
                    if(preg_match('/\D/', $_POST["weaplongrange"])){
                        $errors .= $invalidRange;
                    }else{
                        $weaplongrange = filter_var($_POST["weaplongrange"], FILTER_SANITIZE_STRING);
                    }
                }
                
                
                if($_POST["needammo"] == "y"){
                    $requireammo = 1;
                    if(empty($_POST["ammoname"])){
                        $errors .= $missingAmmoName;
                    }else{
                        $ammoname = filter_var($_POST["ammoname"], FILTER_SANITIZE_STRING);
                    }
                }
            }
            if($_POST["addweapproperty"] == "y"){
                if(!empty($_POST["weapfinesse"])){
                    $weapfinesse = $_POST["weapfinesse"];
                }
                if(!empty($_POST["weapheavy"])){
                    $weapheavy = $_POST["weapheavy"];
                }
                if(!empty($_POST["weaplight"])){
                    $weaplight = $_POST["weaplight"];
                }
                if(!empty($_POST["weaploading"])){
                    $weaploading = $_POST["weaploading"];
                }
                if(!empty($_POST["weapreach"])){
                    $weapreach = $_POST["weapreach"];
                }
                if(!empty($_POST["weapthrown"])){
                    $weapthrown = $_POST["weapthrown"];
                }
                if(!empty($_POST["weap2hand"])){
                    $weap2hand = $_POST["weap2hand"];
                }
                if(!empty($_POST["weapversatile"])){
                    $weapversatile = $_POST["weapversatile"];
                }
                if(!empty($_POST["weapsilvered"])){
                    $weapsilvered = $_POST["weapsilvered"];
                }
                if(!empty($_POST["specialweapprop"])){
                    $specialweapprop = $_POST["specialweapprop"];
                    $specialweapprop = str_replace("'", "’", "$specialweapprop");
                    $specialweapprop = str_replace('"', '“', "$specialweapprop");
                    $specialweapprop = filter_var($specialweapprop, FILTER_SANITIZE_STRING);
                }
            }
        }
    }
}

//<!--    If there are any error, print error message-->
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
    echo $resultMessage;
    exit;
}

$itemname = mysqli_real_escape_string($link, $itemname);
$itemdescription = mysqli_real_escape_string($link, $itemdescription);
$itemweight = mysqli_real_escape_string($link, $itemweight);
$actualitemcost = mysqli_real_escape_string($link, $actualitemcost);
$weapshortrange = mysqli_real_escape_string($link, $weapshortrange);
$weaplongrange = mysqli_real_escape_string($link, $weaplongrange);
$ammoname = mysqli_real_escape_string($link, $ammoname);
$specialweapprop = mysqli_real_escape_string($link, $specialweapprop);

$sql = "INSERT INTO rpg_itemlist_5e (`item_type`, `item_name`, `item_price`, `item_description`, `item_weight`, `armour_cat`, `ac`, `stealth_penalty`, `damage_dice`, `damage_type`, `weapon_cat`, `min_ability`, `min_score`, `magic`, `attunement`, `magic_bonus`, `requireammo`, `ammo`, `finesse`, `heavy`, `light`, `loading`, `rangeshort`, `rangelong`, `reach`, `thrown`, `twohanded`, `versatile`, `silvered`, `special`, `creator_id`, `sharing_cat`) VALUES ('$itemtype', '$itemname', '$actualitemcost', '$itemdescription', '$itemweight', '$armourtype', '$ac', '$stealthpen', '$weapdamagedie', '$weapdamagetype', '$weapontype', '$minabtype', '$minabscore', '$magic', '$attunement', '$magicbonus', '$requireammo', '$ammoname', '$weapfinesse', '$weapheavy', '$weaplight', '$weaploading', '$weapshortrange', '$weaplongrange', '$weapreach', '$weapthrown', '$weap2hand', '$weapversatile', '$weapsilvered', '$specialweapprop', '$user_id', 'x')";

//echo $sql;

$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error inserting race details into database</div>';
}else{
    echo 'success';
}








?>