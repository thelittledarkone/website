<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

$user_id = $_SESSION['user_id'];

//Error Messages
$missingName = '<p><strong>Please give your race a Name!</strong></p>';
$missingDescription = '<p><strong>Please describe your race!</strong></p>';
$missingASI = '<p><strong>Declare the Ability type for your ASI!</strong></p>';
$missingASIValue = '<p><strong>Please declare the amount your ASI will increase by!</strong></p>';
$missingProfType = '<p><strong>Please tell us if the Proficiency is Any choice from the player or a fixed Selection for the Race!</strong></p>';
$missingProfTypeValue = '<p><strong>Please tell us how many proficiencies the player can choose!</strong></p>';
$missingProfTypeSelection = '<p><strong>Please tell us which proficiencies your race has!</strong></p>';
$missingSpellMod = '<p><strong>Please tell us which Ability your race uses for casting its racial spells!</strong></p>';
$missingFirstSpell = '<p><strong>Please provide at least one spell for the racial magic feature!</strong></p>';
$missingSpellName = '<p><strong>Please tell us the Spell\'s name!</strong></p>';
$missingSpellLevel = '<p><strong>Please tell us which level the Spell unlocks at!</strong></p>';
$missingRes = '<p><strong>Please tell us which type of resistance/immunity the race has!</strong></p>';
$missingFeatureDesc = '<p><strong>Please describe the extra feature that the race has!</strong></p>';

//<!--Check user inputs-->
if(empty($_POST["racename"])){
    $errors .= $missingName;
}else{
    $racename = filter_var($_POST["racename"], FILTER_SANITIZE_STRING);
}
if(empty($_POST["racedescription"])){
    $errors .= $missingDescription;
}else{
    $racedescription = $_POST["racedescription"];
    $racedescription = str_replace("'", "’", "$racedescription");
    $racedescription = str_replace('"', '“', "$racedescription");
    $racedescription = filter_var($racedescription, FILTER_SANITIZE_STRING);
}

//ASI
if($_POST["addasi1"] == "y"){
    if(empty($_POST["asi1"])){
        $errors .= $missingASI;
    }else{
        $asi1 = $_POST["asi1"];
    }
    if(empty($_POST["asi1val"])){
        $errors .= $missingASIValue;
    }else{
        $asi1val = $_POST["asi1val"];
    }
}

if($_POST["addasi2"] == "y"){
    if(empty($_POST["asi2"])){
        $errors .= $missingASI;
    }else{
        $asi2 = $_POST["asi2"];
    }
    if(empty($_POST["asi2val"])){
        $errors .= $missingASIValue;
    }else{
        $asi2val = $_POST["asi2val"];
    }
}

if($_POST["addasi3"] == "y"){
    if(empty($_POST["asi3"])){
        $errors .= $missingASI;
    }else{
        $asi3 = $_POST["asi3"];
    }
    if(empty($_POST["asi3val"])){
        $errors .= $missingASIValue;
    }else{
        $asi3val = $_POST["asi3val"];
    }
}

if($_POST["addasi4"] == "y"){
    if(empty($_POST["asi4"])){
        $errors .= $missingASI;
    }else{
        $asi4 = $_POST["asi4"];
    }
    if(empty($_POST["asi4val"])){
        $errors .= $missingASIValue;
    }else{
        $asi4val = $_POST["asi4val"];
    }
}

if($_POST["addasi5"] == "y"){
    if(empty($_POST["asi5"])){
        $errors .= $missingASI;
    }else{
        $asi5 = $_POST["asi5"];
    }
    if(empty($_POST["asi5val"])){
        $errors .= $missingASIValue;
    }else{
        $asi5val = $_POST["asi5val"];
    }
}

if($_POST["addasi6"] == "y"){
    if(empty($_POST["asi6"])){
        $errors .= $missingASI;
    }else{
        $asi6 = $_POST["asi6"];
    }
    if(empty($_POST["asi6val"])){
        $errors .= $missingASIValue;
    }else{
        $asi6val = $_POST["asi6val"];
    }
}

//Proficiencies
if($_POST["addweapprof"] == "y"){
    if(empty($_POST["profweap"])){
        $errors .= $missingProfType;
    }else if($_POST["profweap"] == "anyprof"){
        if(empty($_POST["profweapanynum"])){
            $errors .= $missingProfTypeValue;
        }else{
            $anyweap = $_POST["profweapanynum"];
        }
    }else{
        $weapprofarray = [];
        if(!empty($_POST["club1"])){
            array_push($weapprofarray, 'club');
        }
        if(!empty($_POST["dagger1"])){
            array_push($weapprofarray, 'dagger');
        }
        if(!empty($_POST["greatclub1"])){
            array_push($weapprofarray, 'greatclub');
        }
        if(!empty($_POST["handaxe1"])){
            array_push($weapprofarray, 'handaxe');
        }
        if(!empty($_POST["javelin1"])){
            array_push($weapprofarray, 'javelin');
        }
        if(!empty($_POST["lighthammer1"])){
            array_push($weapprofarray, 'lighthammer');
        }
        if(!empty($_POST["mace1"])){
            array_push($weapprofarray, 'mace');
        }
        if(!empty($_POST["quarterstaff1"])){
            array_push($weapprofarray, 'quarterstaff');
        }
        if(!empty($_POST["sickle1"])){
            array_push($weapprofarray, 'sickle');
        }
        if(!empty($_POST["spear1"])){
            array_push($weapprofarray, 'spear');
        }
        if(!empty($_POST["lightcrossbow1"])){
            array_push($weapprofarray, 'lightcrossbow');
        }
        if(!empty($_POST["dart1"])){
            array_push($weapprofarray, 'dart');
        }
        if(!empty($_POST["shortbow1"])){
            array_push($weapprofarray, 'shortbow');
        }
        if(!empty($_POST["sling1"])){
            array_push($weapprofarray, 'sling');
        }
        if(!empty($_POST["battleaxe1"])){
            array_push($weapprofarray, 'battleaxe');
        }
        if(!empty($_POST["flail1"])){
            array_push($weapprofarray, 'flail');
        }
        if(!empty($_POST["glaive1"])){
            array_push($weapprofarray, 'glaive');
        }
        if(!empty($_POST["greataxe1"])){
            array_push($weapprofarray, 'greataxe');
        }
        if(!empty($_POST["greatsword1"])){
            array_push($weapprofarray, 'greatsword');
        }
        if(!empty($_POST["halberd1"])){
            array_push($weapprofarray, 'halberd');
        }
        if(!empty($_POST["lance1"])){
            array_push($weapprofarray, 'lance');
        }
        if(!empty($_POST["longsword1"])){
            array_push($weapprofarray, 'longsword');
        }
        if(!empty($_POST["maul1"])){
            array_push($weapprofarray, 'maul');
        }
        if(!empty($_POST["morningstar1"])){
            array_push($weapprofarray, 'morningstar');
        }
        if(!empty($_POST["pike1"])){
            array_push($weapprofarray, 'pike');
        }
        if(!empty($_POST["rapier1"])){
            array_push($weapprofarray, 'rapier');
        }
        if(!empty($_POST["scimitar1"])){
            array_push($weapprofarray, 'scimitar');
        }
        if(!empty($_POST["shortsword1"])){
            array_push($weapprofarray, 'shortsword');
        }
        if(!empty($_POST["trident1"])){
            array_push($weapprofarray, 'trident');
        }
        if(!empty($_POST["warpick1"])){
            array_push($weapprofarray, 'warpick');
        }
        if(!empty($_POST["warhammer1"])){
            array_push($weapprofarray, 'warhammer');
        }
        if(!empty($_POST["whip1"])){
            array_push($weapprofarray, 'whip');
        }
        if(!empty($_POST["blowgun11"])){
            array_push($weapprofarray, 'blowgun');
        }
        if(!empty($_POST["handcrossbow1"])){
            array_push($weapprofarray, 'handcrossbow');
        }
        if(!empty($_POST["heavycrossbow1"])){
            array_push($weapprofarray, 'heavycrossbow');
        }
        if(!empty($_POST["longbow1"])){
            array_push($weapprofarray, 'longbow');
        }
        if(!empty($_POST["net1"])){
            array_push($weapprofarray, 'net');
        }
        if(!empty($_POST["otherweap1"])){
            $otherweaponprof = filter_var($_POST["otherweap1"], FILTER_SANITIZE_STRING);
            $otherweaponprof = "Other Weapons - " . $otherweaponprof;
            array_push($weapprofarray, $otherweaponprof);
        }
        if(empty($weapprofarray)){
            $errors .= $missingProfTypeSelection;
        }
        
    }
}

if($_POST["addarmprof"] == "y"){
        $armprofarray = [];
        if(!empty($_POST["lightarmour1"])){
            array_push($armprofarray, 'lightarmour');
        }
        if(!empty($_POST["mediumarmour1"])){
            array_push($armprofarray, 'mediumarmour');
        }
        if(!empty($_POST["heavyarmour1"])){
            array_push($armprofarray, 'heavyarmour');
        }
        if(!empty($_POST["shields1"])){
            array_push($armprofarray, 'shields');
        }
        if(empty($armprofarray)){
            $errors .= $missingProfTypeSelection;
        }
}
           
if($_POST["addskilprof"] == "y"){
    if(empty($_POST["profskil"])){
        $errors .= $missingProfType;
    }else if($_POST["profskil"] == "anyprof"){
        if(empty($_POST["profskilanynum"])){
            $errors .= $missingProfTypeValue;
        }else{
            $anyskill = $_POST["profskilanynum"];
        }
    }else{
        $skilprofarray = [];
        if(!empty($_POST["athletics1"])){
            array_push($skilprofarray, 'athletics');
        }
        if(!empty($_POST["acrobatics1"])){
            array_push($skilprofarray, 'acrobatics');
        }
        if(!empty($_POST["sleightofhand1"])){
            array_push($skilprofarray, 'sleightofhand');
        }
        if(!empty($_POST["stealth1"])){
            array_push($skilprofarray, 'stealth');
        }
        if(!empty($_POST["arcana1"])){
            array_push($skilprofarray, 'arcana');
        }
        if(!empty($_POST["history1"])){
            array_push($skilprofarray, 'history');
        }
        if(!empty($_POST["investigation1"])){
            array_push($skilprofarray, 'investigation');
        }
        if(!empty($_POST["nature1"])){
            array_push($skilprofarray, 'nature');
        }
        if(!empty($_POST["religion1"])){
            array_push($skilprofarray, 'religion');
        }
        if(!empty($_POST["animalhandling1"])){
            array_push($skilprofarray, 'animalhandling');
        }
        if(!empty($_POST["insight1"])){
            array_push($skilprofarray, 'insight');
        }
        if(!empty($_POST["medicine1"])){
            array_push($skilprofarray, 'medicine');
        }
        if(!empty($_POST["perception1"])){
            array_push($skilprofarray, 'perception');
        }
        if(!empty($_POST["survival1"])){
            array_push($skilprofarray, 'survival');
        }
        if(!empty($_POST["deception1"])){
            array_push($skilprofarray, 'deception');
        }
        if(!empty($_POST["intimidation1"])){
            array_push($skilprofarray, 'intimidation');
        }
        if(!empty($_POST["performance1"])){
            array_push($skilprofarray, 'performance');
        }
        if(!empty($_POST["persuasion1"])){
            array_push($skilprofarray, 'persuasion');
        }
        if(empty($skilprofarray)){
            $errors .= $missingProfTypeSelection;
        }
    }
}

if($_POST["addlangprof"] == "y"){
    if(empty($_POST["proflang"])){
        $errors .= $missingProfType;
    }else if($_POST["proflang"] == "anyprof"){
        if(empty($_POST["proflanganynum"])){
            $errors .= $missingProfTypeValue;
        }else{
            $anylang = $_POST["proflanganynum"];
        }
    }else{
        $langprofarray = [];
        if(!empty($_POST["dwarvish1"])){
            array_push($langprofarray, 'dwarvish');
        }
        if(!empty($_POST["elvish1"])){
            array_push($langprofarray, 'elvish');
        }
        if(!empty($_POST["giant1"])){
            array_push($langprofarray, 'giant');
        }
        if(!empty($_POST["gnomish1"])){
            array_push($langprofarray, 'gnomish');
        }
        if(!empty($_POST["goblin1"])){
            array_push($langprofarray, 'goblin');
        }
        if(!empty($_POST["halfling1"])){
            array_push($langprofarray, 'halfling');
        }
        if(!empty($_POST["orc1"])){
            array_push($langprofarray, 'orc');
        }
        if(!empty($_POST["abyssal1"])){
            array_push($langprofarray, 'abyssal');
        }
        if(!empty($_POST["celestial1"])){
            array_push($langprofarray, 'celestial');
        }
        if(!empty($_POST["deep1"])){
            array_push($langprofarray, 'deep');
        }
        if(!empty($_POST["draconic1"])){
            array_push($langprofarray, 'draconic');
        }
        if(!empty($_POST["infernal1"])){
            array_push($langprofarray, 'infernal');
        }
        if(!empty($_POST["primordial1"])){
            array_push($langprofarray, 'primordial');
        }
        if(!empty($_POST["sylvan1"])){
            array_push($langprofarray, 'sylvan');
        }
        if(!empty($_POST["undercommon1"])){
            array_push($langprofarray, 'undercommon');
        }
        if(!empty($_POST["olang1"])){
            $otherlangprof = filter_var($_POST["olang1"], FILTER_SANITIZE_STRING);
            $otherlangprof = "Other Languages - " . $otherlangprof;
            array_push($langprofarray, $otherlangprof);
        }
        if(empty($langprofarray)){
            $errors .= $missingProfTypeSelection;
        }
    }
}

if($_POST["addtoolprof"] == "y"){
    if(empty($_POST["proftool"])){
        $errors .= $missingProfType;
    }else if($_POST["proftool"] == "anyprof"){
        if(empty($_POST["proftoolanynum"])){
            $errors .= $missingProfTypeValue;
        }else{
            $anytool = $_POST["proftoolanynum"];
        }
    }else{
        $toolprofarray = [];
        if(!empty($_POST["alchemistssupplies1"])){
            array_push($toolprofarray, 'alchemistssupplies');
        }
        if(!empty($_POST["brewerssupplies1"])){
            array_push($toolprofarray, 'brewerssupplies');
        }
        if(!empty($_POST["calligrapherssupplies1"])){
            array_push($toolprofarray, 'calligrapherssupplies');
        }
        if(!empty($_POST["carpenterstools1"])){
            array_push($toolprofarray, 'carpenterstools');
        }
        if(!empty($_POST["cartographerstools1"])){
            array_push($toolprofarray, 'cartographerstools');
        }
        if(!empty($_POST["cobblerstools1"])){
            array_push($toolprofarray, 'cobblerstools');
        }
        if(!empty($_POST["cooksutensils1"])){
            array_push($toolprofarray, 'cooksutensils');
        }
        if(!empty($_POST["glassblowerstools1"])){
            array_push($toolprofarray, 'glassblowerstools');
        }
        if(!empty($_POST["jewelerstools1"])){
            array_push($toolprofarray, 'jewelerstools');
        }
        if(!empty($_POST["leatherworkerstools1"])){
            array_push($toolprofarray, 'leatherworkerstools');
        }
        if(!empty($_POST["masonstools1"])){
            array_push($toolprofarray, 'masonstools');
        }
        if(!empty($_POST["painterstools1"])){
            array_push($toolprofarray, 'painterstools');
        }
        if(!empty($_POST["potterstools1"])){
            array_push($toolprofarray, 'potterstools');
        }
        if(!empty($_POST["smithstools1"])){
            array_push($toolprofarray, 'smithstools');
        }
        if(!empty($_POST["tinkerstools1"])){
            array_push($toolprofarray, 'tinkerstools');
        }
        if(!empty($_POST["weaverstools1"])){
            array_push($toolprofarray, 'weaverstools');
        }
        if(!empty($_POST["woodcarverstools1"])){
            array_push($toolprofarray, 'woodcarverstools');
        }
        if(!empty($_POST["disguisekit1"])){
            array_push($toolprofarray, 'disguisekit');
        }
        if(!empty($_POST["forgerykit1"])){
            array_push($toolprofarray, 'forgerykit');
        }
        if(!empty($_POST["herbalismkit1"])){
            array_push($toolprofarray, 'herbalismkit');
        }
        if(!empty($_POST["navigatorstools1"])){
            array_push($toolprofarray, 'navigatorstools');
        }
        if(!empty($_POST["poisonerskit1"])){
            array_push($toolprofarray, 'poisonerskit');
        }
        if(!empty($_POST["thievestools1"])){
            array_push($toolprofarray, 'thievestools');
        }
        if(!empty($_POST["vehiclesland1"])){
            array_push($toolprofarray, 'vehiclesland');
        }
        if(!empty($_POST["vehicleswater1"])){
            array_push($toolprofarray, 'vehicleswater');
        }
        if(!empty($_POST["vehiclesair1"])){
            array_push($toolprofarray, 'vehiclesair');
        }
        if(!empty($_POST["gset1"])){
            $gamingsetprof = filter_var($_POST["gset1"], FILTER_SANITIZE_STRING);
            $gamingsetprof = "Gaming Sets - " . $gamingsetprof;
            array_push($toolprofarray, $gamingsetprof);
        }
        if(!empty($_POST["minstru1"])){
            $musicinstruprof = filter_var($_POST["minstru1"], FILTER_SANITIZE_STRING);
            $musicinstruprof = "Musical Instruments - " . $musicinstruprof;
            array_push($toolprofarray, $musicinstruprof);
        }
        if(empty($toolprofarray)){
            $errors .= $missingProfTypeSelection;
        }
    }
}

if($_POST["addwltprof"] == "y"){
        if(empty($_POST["profwltanynum"])){
            $errors .= $missingProfTypeValue;
        }else{
            $anywlt = $_POST["profwltanynum"];
        }
}

//var_dump($toolprofarray); 

//Spells
if($_POST["rm"] == "y"){
    if(empty($_POST["rmmod"])){
        $errors .= $missingSpellMod;
    }else{
        $spellmod = $_POST["rmmod"];
    }
    if(empty($_POST["rm1"])){
        $errors .= $missingFirstSpell;
    }else{
        if(empty($_POST["r1spellname"])){
            $errors .= $missingSpellName;
        }else{
            $spell1name = filter_var($_POST["r1spellname"], FILTER_SANITIZE_STRING);
        }
        if(empty($_POST["r1spelllevel"])){
            $errors .= $missingSpellLevel;
        }else{
            $spell1level = $_POST["r1spelllevel"];
        }
    }
    if($_POST["rm2"] == "y"){
        if(empty($_POST["r2spellname"])){
            $errors .= $missingSpellName;
        }else{
            $spell2name = filter_var($_POST["r2spellname"], FILTER_SANITIZE_STRING);
        }
        if(empty($_POST["r2spelllevel"])){
            $errors .= $missingSpellLevel;
        }else{
            $spell2level = $_POST["r2spelllevel"];
        }
    }
    if($_POST["rm3"] == "y"){
        if(empty($_POST["r3spellname"])){
            $errors .= $missingSpellName;
        }else{
            $spell3name = filter_var($_POST["r3spellname"], FILTER_SANITIZE_STRING);
        }
        if(empty($_POST["r3spelllevel"])){
            $errors .= $missingSpellLevel;
        }else{
            $spell3level = $_POST["r3spelllevel"];
        }
    }
    if($_POST["rm4"] == "y"){
        if(empty($_POST["r4spellname"])){
            $errors .= $missingSpellName;
        }else{
            $spell4name = filter_var($_POST["r4spellname"], FILTER_SANITIZE_STRING);
        }
        if(empty($_POST["r4spelllevel"])){
            $errors .= $missingSpellLevel;
        }else{
            $spell4level = $_POST["r4spelllevel"];
        }
    }
    if($_POST["rm5"] == "y"){
        if(empty($_POST["r5spellname"])){
            $errors .= $missingSpellName;
        }else{
            $spell5name = filter_var($_POST["r5spellname"], FILTER_SANITIZE_STRING);
        }
        if(empty($_POST["r5spelllevel"])){
            $errors .= $missingSpellLevel;
        }else{
            $spell5level = $_POST["r5spelllevel"];
        }
    }
}

//Res and Imm
if($_POST["res1"] == "y"){
    if(empty($_POST["res1type"])){
        $errors .= $missingRes;
    }else{
        $res1 = $_POST["res1type"];
    }
}
if($_POST["res2"] == "y"){
    if(empty($_POST["res2type"])){
        $errors .= $missingRes;
    }else{
        $res2 = $_POST["res2type"];
    }
}
if($_POST["res3"] == "y"){
    if(empty($_POST["res3type"])){
        $errors .= $missingRes;
    }else{
        $res3 = $_POST["res3type"];
    }
}
if($_POST["imm1"] == "y"){
    if(empty($_POST["imm1type"])){
        $errors .= $missingRes;
    }else{
        $imm1 = $_POST["imm1type"];
    }
}
if($_POST["imm2"] == "y"){
    if(empty($_POST["imm2type"])){
        $errors .= $missingRes;
    }else{
        $imm2 = $_POST["imm2type"];
    }
}
if($_POST["imm3"] == "y"){
    if(empty($_POST["imm3type"])){
        $errors .= $missingRes;
    }else{
        $imm3 = $_POST["imm3type"];
    }
}

//Extra Features
if($_POST["xfeat1"] == "y"){
    if(empty($_POST["xfeat1desc"])){
        $errors .= $missingFeatureDesc;
    }else{
        $xfeat1 = $_POST["xfeat1desc"];
        $xfeat1 = str_replace("'", "’", "$xfeat1");
        $xfeat1 = str_replace('"', '“', "$xfeat1");
        $xfeat1 = filter_var($xfeat1, FILTER_SANITIZE_STRING);
    }
}
if($_POST["xfeat2"] == "y"){
    if(empty($_POST["xfeat2desc"])){
        $errors .= $missingFeatureDesc;
    }else{
        $xfeat2 = $_POST["xfeat2desc"];
        $xfeat2 = str_replace("'", "’", "$xfeat2");
        $xfeat2 = str_replace('"', '“', "$xfeat2");
        $xfeat2 = filter_var($xfeat2, FILTER_SANITIZE_STRING);
    }
}
if($_POST["xfeat3"] == "y"){
    if(empty($_POST["xfeat3desc"])){
        $errors .= $missingFeatureDesc;
    }else{
        $xfeat3 = $_POST["xfeat3desc"];
        $xfeat3 = str_replace("'", "’", "$xfeat3");
        $xfeat3 = str_replace('"', '“', "$xfeat3");
        $xfeat3 = filter_var($xfeat3, FILTER_SANITIZE_STRING);
    }
}
if($_POST["xfeat4"] == "y"){
    if(empty($_POST["xfeat4desc"])){
        $errors .= $missingFeatureDesc;
    }else{
        $xfeat4 = $_POST["xfeat4desc"];
        $xfeat4 = str_replace("'", "’", "$xfeat4");
        $xfeat4 = str_replace('"', '“', "$xfeat4");
        $xfeat4 = filter_var($xfeat4, FILTER_SANITIZE_STRING);
    }
}
if($_POST["xfeat5"] == "y"){
    if(empty($_POST["xfeat5desc"])){
        $errors .= $missingFeatureDesc;
    }else{
        $xfeat5 = $_POST["xfeat5desc"];
        $xfeat5 = str_replace("'", "’", "$xfeat5");
        $xfeat5 = str_replace('"', '“', "$xfeat5");
        $xfeat5 = filter_var($xfeat5, FILTER_SANITIZE_STRING);
    }
}

//<!--    If there are any error, print error message-->
if($errors){
    $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
    echo $resultMessage;
    exit;
}

//Prepare Prof array
$profArray = [];
if(!empty($_POST["common1"])){
    array_push($profArray, 'common');
}
while($anyweap != 0){
    array_push($profArray, 'anyweap');
    $anyweap = $anyweap - 1;
}
while($anyskill != 0){
    array_push($profArray, 'anyskill');
    $anyskill = $anyskill - 1;
}
while($anylang != 0){
    array_push($profArray, 'anylang');
    $anylang = $anylang - 1;
}
while($anytool != 0){
    array_push($profArray, 'anytool');
    $anytool = $anytool - 1;
}
while($anywlt != 0){
    array_push($profArray, 'anywlt');
    $anywlt = $anywlt - 1;
}

if(!empty($weapprofarray)){
    foreach($weapprofarray as $value){
        array_push($profArray, $value);
    }
}
if(!empty($armprofarray)){
    foreach($armprofarray as $value){
        array_push($profArray, $value);
    }
}
if(!empty($skilprofarray)){
    foreach($skilprofarray as $value){
        array_push($profArray, $value);
    }
}
if(!empty($langprofarray)){
    foreach($langprofarray as $value){
        array_push($profArray, $value);
    }
}
if(!empty($toolprofarray)){
    foreach($toolprofarray as $value){
        array_push($profArray, $value);
    }
}

//var_dump($profArray);

$racename = mysqli_real_escape_string($link, $racename);
$racedescription = mysqli_real_escape_string($link, $racedescription);
$spell1name = mysqli_real_escape_string($link, $spell1name);
$spell2name = mysqli_real_escape_string($link, $spell2name);
$spell3name = mysqli_real_escape_string($link, $spell3name);
$spell4name = mysqli_real_escape_string($link, $spell4name);
$spell5name = mysqli_real_escape_string($link, $spell5name);
$xfeat1 = mysqli_real_escape_string($link, $xfeat1);
$xfeat2 = mysqli_real_escape_string($link, $xfeat2);
$xfeat3 = mysqli_real_escape_string($link, $xfeat3);
$xfeat4 = mysqli_real_escape_string($link, $xfeat4);
$xfeat5 = mysqli_real_escape_string($link, $xfeat5);

$sql = "INSERT INTO rpg_races_5e (`creator_id`, `sharing_cat`, `race_name`, `race_description`, `asi1_increase`, `asi1_amount`, `asi2_increase`, `asi2_amount`, `asi3_increase`, `asi3_amount`, `asi4_increase`, `asi4_amount`, `asi5_increase`, `asi5_amount`, `asi6_increase`, `asi6_amount`, `prof`, `prof1`, `prof2`, `prof3`, `prof4`, `prof5`, `prof6`, `prof7`, `prof8`, `prof9`, `prof10`, `prof11`, `prof12`, `prof13`, `prof14`, `prof15`, `prof16`, `prof17`, `prof18`, `prof19`, `prof20`, `resistance1`, `resistance2`, `resistance3`, `immunity1`, `immunity2`, `immunity3`, `cast_mod`, `spell1`, `spell1level`, `spell2`, `spell2level`, `spell3`, `spell3level`, `spell4`, `spell4level`, `spell5`, `spell5level`, `additional_features`, `additional_features2`, `additional_features3`, `additional_features4`, `additional_features5`) VALUES ('$user_id', 'x', '$racename', '$racedescription', '$asi1', '$asi1val', '$asi2', '$asi2val', '$asi3', '$asi3val', '$asi4', '$asi4val', '$asi5', '$asi5val', '$asi6', '$asi6val', '$profArray[0]', '$profArray[1]', '$profArray[2]', '$profArray[3]', '$profArray[4]', '$profArray[5]', '$profArray[6]', '$profArray[7]', '$profArray[8]', '$profArray[9]', '$profArray[10]', '$profArray[11]', '$profArray[12]', '$profArray[13]', '$profArray[14]', '$profArray[15]', '$profArray[16]', '$profArray[17]', '$profArray[18]', '$profArray[19]', '$profArray[20]', '$res1', '$res2', '$res3', '$imm1', '$imm2', '$imm3', '$spellmod', '$spell1name', '$spell1level', '$spell2name', '$spell2level', '$spell3name', '$spell3level', '$spell4name', '$spell4level', '$spell5name', '$spell5level', '$xfeat1', '$xfeat2', '$xfeat3', '$xfeat4', '$xfeat5')";

//echo $sql;

$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error inserting race details into database</div>';
}else{
    echo 'success';
}








?>