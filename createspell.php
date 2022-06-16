<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

$user_id = $_SESSION['user_id'];

//Error Messages
$missingName = '<p><strong>Please give your spell a Name!</strong></p>';
$missingDescription = '<p><strong>Please describe your spell!</strong></p>';
$missingLevel = '<p><strong>Please indicate the Spell level!</strong></p>';
$missingSchool = '<p><strong>Please indicate the Spell school of magic!</strong></p>';
$missingCastingTime = '<p><strong>Please indicate the Spell casting time!</strong></p>';
$missingDuration = '<p><strong>Please indicate the Spell duration!</strong></p>';
$missingSpelllist = '<p><strong>Please select at least one user of the spell!</strong></p>';
$missingRange = '<p><strong>Please declare a range for your Spell or select the Touch checkbox!</strong></p>';
$invalidRange = '<p><strong>Please use only numbers when declaring your spell range in feet!</strong></p>';
$missingAOERange = '<p><strong>Please declare a range for your Area of Effect!</strong></p>';
$invalidAOERange = '<p><strong>Please use only numbers when declaring your Area of Effect range in feet!</strong></p>';
$missingTemplate = '<p><strong>Please choose a template for your Area of Effect!</strong></p>';
$missingmaterialcost = '<p><strong>Please declare a cost for your Materials (0 is acceptable)!</strong></p>';
$invalidmaterialcost = '<p><strong>Please use only numbers when declaring your material cost!</strong></p>';
$missingCoin = '<p><strong>Please tell us the denomination of coin for your material cost!</strong></p>';
$missingAbility = '<p><strong>Please tell us what ability is used to save against your spell!</strong></p>';
$missingspelldamagedie = '<p><strong>Please tell us size damage/healing dice you spell uses!</strong></p>';
$missingnoofdamagedice = '<p><strong>Please tell us how many damage/healing dice your spell uses!</strong></p>';
$invalidnoofdamagedice = '<p><strong>Please use only numbers when declaring how many damage/healing dice your spell uses!</strong></p>';
$missingspelldamagetype = '<p><strong>Please tell us what type of damage/healing your spell deals!</strong></p>';
$missingspelldamagefreq = '<p><strong>Please tell us how often your spell deals damage/healing!</strong></p>';
$missingWeaponDamage = '<p><strong>Please tell us the Damage Type of your Weapon!</strong></p>';
$invalidRange = '<p><strong>Please use only numbers when declaring your weapons range in feet!</strong></p>';
$missingAmmoName = '<p><strong>Please tell us the Ammo your Weapon requires!</strong></p>';
$missingRes = '<p><strong>Please tell us which type of resistance/immunity the race has!</strong></p>';
$missingFeatureDesc = '<p><strong>Please describe the extra feature that the race has!</strong></p>';

//<!--Check user inputs-->
if(empty($_POST["spellname"])){
    $errors .= $missingName;
}else{
    $spellname = filter_var($_POST["spellname"], FILTER_SANITIZE_STRING);
}
if(empty($_POST["spelldescription"])){
    $errors .= $missingDescription;
}else{
    $spelldescription = $_POST["spelldescription"];
    $spelldescription = str_replace("'", "’", "$spelldescription");
    $spelldescription = str_replace('"', '“', "$spelldescription");
    $spelldescription = filter_var($spelldescription, FILTER_SANITIZE_STRING);
}
if(empty($_POST["spelllevel"])){
    $errors .= $missingLevel;
}else{
    $spelllevel = $_POST["spelllevel"];
}
if(empty($_POST["spellschool"])){
    $errors .= $missingSchool;
}else{
    $spellschool = $_POST["spellschool"];
}
if(empty($_POST["castingtime"])){
    $errors .= $missingCastingTime;
}else{
    $castingtime = $_POST["castingtime"];
}
if(empty($_POST["spellduration"])){
    $errors .= $missingDuration;
}else{
    $spellduration = $_POST["spellduration"];
}

if($_POST["ritualspell"] == "y"){
    $ritual = 1;
    if(empty($_POST["ritualcastingtime"])){
        $errors .= $missingCastingTime;
    }else{
        $ritualcastingtime = $_POST["ritualcastingtime"];
    }
}
if($_POST["reqconcentrate"] == "y"){
    $concentration = 1;
}

if(!empty($_POST["bardspell"])){
    $bardspell = $_POST["bardspell"];
}
if(!empty($_POST["clericspell"])){
    $clericspell = $_POST["clericspell"];
}
if(!empty($_POST["druidspell"])){
    $druidspell = $_POST["druidspell"];
}
if(!empty($_POST["paladinspell"])){
    $paladinspell = $_POST["paladinspell"];
}
if(!empty($_POST["rangerspell"])){
    $rangerspell = $_POST["rangerspell"];
}
if(!empty($_POST["sorcererspell"])){
    $sorcererspell = $_POST["sorcererspell"];
}
if(!empty($_POST["warlockspell"])){
    $warlockspell = $_POST["warlockspell"];
}
if(!empty($_POST["wizardspell"])){
    $wizardspell = $_POST["wizardspell"];
}
if(empty($_POST["wizardspell"]) && empty($_POST["warlockspell"]) && empty($_POST["sorcererspell"]) && empty($_POST["rangerspell"]) && empty($_POST["paladinspell"]) && empty($_POST["druidspell"]) && empty($_POST["clericspell"]) && empty($_POST["bardspell"])){
    $errors .= $missingSpelllist;
}

if($_POST["rangetouch"] == "y"){
    $spellrange = 5;
}else{
    if(empty($_POST["spellrange"])){
        $errors .= $missingRange;
    }else{
        if(preg_match('/\D/', $_POST["spellrange"])){
            $errors .= $invalidRange;
        }else{
            $spellrange = filter_var($_POST["spellrange"], FILTER_SANITIZE_STRING);
        }
    }
}

if($_POST["addaoe"] == "y"){
    if(empty($_POST["aoetemp"])){
        $errors .= $missingTemplate;
    }else{
        $aoetemp = $_POST["aoetemp"];
    }
    if(empty($_POST["aoerange"])){
        $errors .= $missingAOERange;
    }else{
        if(preg_match('/\D/', $_POST["aoerange"])){
            $errors .= $invalidAOERange;
        }else{
            $aoerange = filter_var($_POST["aoerange"], FILTER_SANITIZE_STRING);
        }
    }
}

if($_POST["materialcomp"] == "1"){
    $materialcomp = $_POST["materialcomp"];
    if(empty($_POST["materialdescription"])){
        $errors .= $missingmaterialdescription;
    }else{
        $materialdescription = $_POST["materialdescription"];
        $materialdescription = str_replace("'", "’", "$materialdescription");
        $materialdescription = str_replace('"', '“', "$materialdescription");
        $materialdescription = filter_var($materialdescription, FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["materialcost"])){
        $errors .= $missingmaterialcost;
    }else{
        if(preg_match('/\D/', $_POST["materialcost"])){
            $errors .= $invalidmaterialcost;
        }else{
            if(empty($_POST["materialcostcoin"])){
                $errors .= $missingCoin;
            }else{
                $materialcost = filter_var($_POST["materialcost"], FILTER_SANITIZE_STRING);
                $materialcost = $materialcost + 0;
                $itemcoin = $_POST["materialcostcoin"] + 0;
                $actualmaterialcost = $materialcost * $itemcoin;
            } 
        }
    }
}

if($_POST["verbalcomp"] == "1"){
    $verbalcomp = $_POST["verbalcomp"];
}
if($_POST["somaticcomp"] == "1"){
    $somaticcomp = $_POST["somaticcomp"];
}

if($_POST["spellsaveability"] == "y"){
    if(empty($_POST["spellsavetype"])){
        $errors .= $missingAbility;
    }else{
        $spellsavetype = $_POST["spellsavetype"];
    }
}

if($_POST["damagespell"] == "y"){
    if(empty($_POST["spelldamagedie"])){
        $errors .= $missingspelldamagedie;
    }else{
        $spelldamagedie = $_POST["spelldamagedie"];
    }
    if(empty($_POST["noofdamagedice"])){
        $errors .= $missingnoofdamagedice;
    }else{
        if(preg_match('/\D/', $_POST["noofdamagedice"])){
            $errors .= $invalidnoofdamagedice;
        }else{
            $noofdamagedice = filter_var($_POST["noofdamagedice"], FILTER_SANITIZE_STRING);
        }
    }
    if(empty($_POST["spelldamagetype"])){
        $errors .= $missingspelldamagetype;
    }else{
        $spelldamagetype = $_POST["spelldamagetype"];
    }
    if(empty($_POST["spelldamagefreq"])){
        $errors .= $missingspelldamagefreq;
    }else{
        $spelldamagefreq = $_POST["spelldamagefreq"];
    }
}
if($_POST["damagespell1"] == "y"){
    if(empty($_POST["spelldamagedie1"])){
        $errors .= $missingspelldamagedie;
    }else{
        $spelldamagedie1 = $_POST["spelldamagedie1"];
    }
    if(empty($_POST["noofdamagedice1"])){
        $errors .= $missingnoofdamagedice;
    }else{
        if(preg_match('/\D/', $_POST["noofdamagedice1"])){
            $errors .= $invalidnoofdamagedice;
        }else{
            $noofdamagedice1 = filter_var($_POST["noofdamagedice1"], FILTER_SANITIZE_STRING);
        }
    }
    if(empty($_POST["spelldamagetype1"])){
        $errors .= $missingspelldamagetype;
    }else{
        $spelldamagetype1 = $_POST["spelldamagetype1"];
    }
    if(empty($_POST["spelldamagefreq1"])){
        $errors .= $missingspelldamagefreq;
    }else{
        $spelldamagefreq1 = $_POST["spelldamagefreq1"];
    }
}
if($_POST["damagespell2"] == "y"){
    if(empty($_POST["spelldamagedie2"])){
        $errors .= $missingspelldamagedie;
    }else{
        $spelldamagedie2 = $_POST["spelldamagedie2"];
    }
    if(empty($_POST["noofdamagedice2"])){
        $errors .= $missingnoofdamagedice;
    }else{
        if(preg_match('/\D/', $_POST["noofdamagedice2"])){
            $errors .= $invalidnoofdamagedice;
        }else{
            $noofdamagedice2 = filter_var($_POST["noofdamagedice2"], FILTER_SANITIZE_STRING);
        }
    }
    if(empty($_POST["spelldamagetype2"])){
        $errors .= $missingspelldamagetype;
    }else{
        $spelldamagetype2 = $_POST["spelldamagetype2"];
    }
    if(empty($_POST["spelldamagefreq2"])){
        $errors .= $missingspelldamagefreq;
    }else{
        $spelldamagefreq2 = $_POST["spelldamagefreq2"];
    }
}
if($_POST["conditionspell"] == "y"){
    if(!empty($_POST["conblinded"])){
        $conblinded = $_POST["conblinded"];
    }
    if(!empty($_POST["concharmed"])){
        $concharmed = $_POST["concharmed"];
    }
    if(!empty($_POST["condeafened"])){
        $condeafened = $_POST["condeafened"];
    }
    if(!empty($_POST["conexhaustion"])){
        $conexhaustion = $_POST["conexhaustion"];
    }
    if(!empty($_POST["confrightened"])){
        $confrightened = $_POST["confrightened"];
    }
    if(!empty($_POST["congrappled"])){
        $congrappled = $_POST["congrappled"];
    }
    if(!empty($_POST["conincapacitated"])){
        $conincapacitated = $_POST["conincapacitated"];
    }
    if(!empty($_POST["coninvisible"])){
        $coninvisible = $_POST["coninvisible"];
    }
    if(!empty($_POST["conparalyzed"])){
        $conparalyzed = $_POST["conparalyzed"];
    }
    if(!empty($_POST["conpetrified"])){
        $conpetrified = $_POST["conpetrified"];
    }
    if(!empty($_POST["conpoisoned"])){
        $conpoisoned = $_POST["conpoisoned"];
    }
    if(!empty($_POST["conprone"])){
        $conprone = $_POST["conprone"];
    }
    if(!empty($_POST["conrestrained"])){
        $conrestrained = $_POST["conrestrained"];
    }
    if(!empty($_POST["constunned"])){
        $constunned = $_POST["constunned"];
    }
    if(!empty($_POST["conunconscious"])){
        $conunconscious = $_POST["conunconscious"];
    }
}
            
//<!--    If there are any error, print error message-->
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
    echo $resultMessage;
    exit;
}

$spellname = mysqli_real_escape_string($link, $spellname);
$spelldescription = mysqli_real_escape_string($link, $spelldescription);
$spellrange = mysqli_real_escape_string($link, $spellrange);
$aoerange = mysqli_real_escape_string($link, $aoerange);
$materialdescription = mysqli_real_escape_string($link, $itemweight);
$actualmaterialcost = mysqli_real_escape_string($link, $actualmaterialcost);
$noofdamagedice = mysqli_real_escape_string($link, $noofdamagedice);
$noofdamagedice1 = mysqli_real_escape_string($link, $noofdamagedice1);
$noofdamagedice2 = mysqli_real_escape_string($link, $noofdamagedice2);

$sql = "INSERT INTO rpg_spelllist_5e (`spell_school`, `spell_level`, `spell_name`, `spell_description`, `castingtime`, `ritual`, `ritualcastingtime`, `verbal`, `somatic`, `material`, `materialdescription`, `materialcost`, `duration`, `concentration`, `damage_dice`, `damage_dice_number`, `damage_type`, `damage_freq`, `damage_dice1`, `damage_dice_number1`, `damage_type1`, `damage_freq1`, `damage_dice2`, `damage_dice_number2`, `damage_type2`, `damage_freq2`, `blinded`, `charmed`, `deafened`, `exhaustion`, `frightened`, `grappled`, `incapacitated`, `invisible`, `paralyzed`, `petrified`, `poisoned`, `prone`, `restrained`, `stunned`, `unconscious`, `save_ability`, `spellrange`, `aoe`, `aoerange`, `bard`, `cleric`, `druid`, `paladin`, `ranger`, `sorcerer`, `warlock`, `wizard`, `creator_id`, `sharing_cat`) VALUES ('$spellschool', '$spelllevel', '$spellname', '$spelldescription', '$castingtime', '$ritual', '$ritualcastingtime', '$verbalcomp', '$somaticcomp', '$materialcomp', '$materialdescription', '$actualmaterialcost', '$spellduration', '$concentration', '$spelldamagedie', '$noofdamagedice', '$spelldamagetype', '$spelldamagefreq', '$spelldamagedie1', '$noofdamagedice1', '$spelldamagetype1', '$spelldamagefreq1', '$spelldamagedie2', '$noofdamagedice2', '$spelldamagetype2', '$spelldamagefreq2', '$conblinded', '$concharmed', '$condeafened', '$conexhaustion', '$confrightened', '$congrappled', '$conincapacitated', '$coninvisible', '$conparalyzed', '$conpetrified', '$conpoisoned', '$conprone', '$conrestrained', '$constunned', '$conunconscious', '$spellsavetype', '$spellrange', '$aoetemp', '$aoerange', '$bardspell', '$clericspell', '$druidspell', '$paladinspell', '$rangerspell', '$sorcererspell', '$warlockspell', '$wizardspell', '$user_id', 'x')";

//echo $sql;

$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error inserting spell details into database</div>';
}else{
    echo 'success';
}

?>