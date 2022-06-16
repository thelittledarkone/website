<?php
//<!--Start Session-->
session_start();
//<!--Connect to database-->
include('connection.php');

$user_id = $_SESSION['user_id'];

//Error Messages
$missingName = '<p><strong>Please give your class a Name!</strong></p>';
$missingBaseName = '<p><strong>Please indicate the Name of your Base Class!</strong></p>';
$missingDescription = '<p><strong>Please describe your class!</strong></p>';
$missingHP = '<p><strong>Please indicate the size of the Hit Die for your Class!</strong></p>';
$missingcastmod = '<p><strong>Declare the Casting Ability for your Magic!</strong></p>';
$missingcasttype = '<p><strong>Please indicate how your class learns/prepares spells!</strong></p>';
$missingspellslots = '<p><strong>Please declare the amount of spell slots your class gains!</strong></p>';
$missingspelllist = '<p><strong>Please declare which spell list your class uses!</strong></p>';
$missingSkilNum = '<p><strong>Please indicate how many Skill choices the Class has!</strong></p>';
$missingProfTypeSelection = '<p><strong>Please tell us which Skills your class can choose from!</strong></p>';
$noWeapProf = '<p><strong>Please provide at least one Weapon proficiency!</strong></p>';
$missingArmSelection = '<p><strong>Please provide at least one Armour proficiency!</strong></p>';
$missingToolSelection = '<p><strong>Please provide at least one Tool proficiency!</strong></p>';
$missingfeaturename = '<p><strong>Please give your feature a name!</strong></p>';
$missingfeaturedesc = '<p><strong>Please describe your feature!</strong></p>';
$missingFeatUses = '<p><strong>Please indicate how many uses your feature has!</strong></p>';
$missingSpellLevel = '<p><strong>Please tell us when the features uses reset!</strong></p>';

//<!--Check user inputs-->
if(empty($_POST["classname"])){
    $errors .= $missingName;
}else{
    $classname = filter_var($_POST["classname"], FILTER_SANITIZE_STRING);
}
if(empty($_POST["baseclassname"])){
    $errors .= $missingBaseName;
}else{
    $baseclassname = filter_var($_POST["baseclassname"], FILTER_SANITIZE_STRING);
}
if(empty($_POST["classdescription"])){
    $errors .= $missingDescription;
}else{
    $classdescription = $_POST["classdescription"];
    $classdescription = str_replace("'", "’", "$classdescription");
    $classdescription = str_replace('"', '“', "$classdescription");
    $classdescription = filter_var($classdescription, FILTER_SANITIZE_STRING);
}
if(empty($_POST["classhp"])){
    $errors .= $missingHP;
}else{
    $hitDie = $_POST["classhp"];
}

//Magic
if($_POST["addmagic"] == "y"){
    if(empty($_POST["castmod"])){
        $errors .= $missingcastmod;
    }else{
        $castmod = $_POST["castmod"];
    }
    if(empty($_POST["casttype"])){
        $errors .= $missingcasttype;
    }else{
        $casttype = $_POST["casttype"];
    }
    if(empty($_POST["spellslots"])){
        $errors .= $missingspellslots;
    }else{
        $spellslots = $_POST["spellslots"];
    }
    if(empty($_POST["spelllist"])){
        $errors .= $missingspelllist;
    }else{
        $spelllist = $_POST["spelllist"];
    }
}

//Proficiencies
if(empty($_POST["profskilnum2"])){
    $errors .= $missingSkilNum;
}else{
    $skillNum = $_POST["profskilnum2"];
}
if(empty($_POST["athletics2"]) && empty($_POST["acrobatics2"]) && empty($_POST["sleightofhand2"]) && empty($_POST["stealth2"]) && empty($_POST["arcana2"]) && empty($_POST["history2"]) && empty($_POST["investigation2"]) && empty($_POST["nature2"]) && empty($_POST["religion2"]) && empty($_POST["animalhandling2"]) && empty($_POST["insight2"]) && empty($_POST["medicine2"]) && empty($_POST["perception2"]) && empty($_POST["survival2"]) && empty($_POST["deception2"]) && empty($_POST["intimidation2"]) && empty($_POST["performance2"]) && empty($_POST["persuasion2"])){
    $errors .= $missingProfTypeSelection;
}
if(!empty($_POST["athletics2"])){
    $athletics = $_POST["athletics2"];
}
if(!empty($_POST["acrobatics2"])){
    $acrobatics = $_POST["acrobatics2"];
}
if(!empty($_POST["sleightofhand2"])){
    $sleightofhand = $_POST["sleightofhand2"];
}
if(!empty($_POST["stealth2"])){
    $stealth = $_POST["stealth2"];
}
if(!empty($_POST["arcana2"])){
    $arcana = $_POST["arcana2"];
}
if(!empty($_POST["history2"])){
    $history = $_POST["history2"];
}
if(!empty($_POST["investigation2"])){
    $investigation = $_POST["investigation2"];
}
if(!empty($_POST["nature2"])){
    $nature = $_POST["nature2"];
}
if(!empty($_POST["religion2"])){
    $religion = $_POST["religion2"];
}
if(!empty($_POST["animalhandling2"])){
    $animalhandling = $_POST["animalhandling2"];
}
if(!empty($_POST["insight2"])){
    $insight = $_POST["insight2"];
}
if(!empty($_POST["medicine2"])){
    $medicine = $_POST["medicine2"];
}
if(!empty($_POST["perception2"])){
    $perception = $_POST["perception2"];
}
if(!empty($_POST["survival2"])){
    $survival = $_POST["survival2"];
}
if(!empty($_POST["deception2"])){
    $deception = $_POST["deception2"];
}
if(!empty($_POST["intimidation2"])){
    $intimidation = $_POST["intimidation2"];
}
if(!empty($_POST["performance2"])){
    $performance = $_POST["performance2"];
}
if(!empty($_POST["persuasion2"])){
    $persuasion = $_POST["persuasion2"];
}

if($_POST["profweapsimple2"] != "allsimple" && $_POST["profweapmartial2"] != "allmartial" && $_POST["profweapselect2"] != "selectprof"){
    $errors .= $noWeapProf;
}else{
    $weapprofarray = [];
    if($_POST["profweapsimple2"] == "allsimple"){
        array_push($weapprofarray, 'allsimple');
    }
    if($_POST["profweapmartial2"] == "allmartial"){
        array_push($weapprofarray, 'allmartial');
    }
    if($_POST["profweapselect2"] == "selectprof"){
        if(!empty($_POST["club2"])){
            array_push($weapprofarray, 'club');
        }
        if(!empty($_POST["dagger2"])){
            array_push($weapprofarray, 'dagger');
        }
        if(!empty($_POST["greatclub2"])){
            array_push($weapprofarray, 'greatclub');
        }
        if(!empty($_POST["handaxe2"])){
            array_push($weapprofarray, 'handaxe');
        }
        if(!empty($_POST["javelin2"])){
            array_push($weapprofarray, 'javelin');
        }
        if(!empty($_POST["lighthammer2"])){
            array_push($weapprofarray, 'lighthammer');
        }
        if(!empty($_POST["mace2"])){
            array_push($weapprofarray, 'mace');
        }
        if(!empty($_POST["quarterstaff2"])){
            array_push($weapprofarray, 'quarterstaff');
        }
        if(!empty($_POST["sickle2"])){
            array_push($weapprofarray, 'sickle');
        }
        if(!empty($_POST["spear2"])){
            array_push($weapprofarray, 'spear');
        }
        if(!empty($_POST["lightcrossbow2"])){
            array_push($weapprofarray, 'lightcrossbow');
        }
        if(!empty($_POST["dart2"])){
            array_push($weapprofarray, 'dart');
        }
        if(!empty($_POST["shortbow2"])){
            array_push($weapprofarray, 'shortbow');
        }
        if(!empty($_POST["sling2"])){
            array_push($weapprofarray, 'sling');
        }
        if(!empty($_POST["battleaxe2"])){
            array_push($weapprofarray, 'battleaxe');
        }
        if(!empty($_POST["flail2"])){
            array_push($weapprofarray, 'flail');
        }
        if(!empty($_POST["glaive2"])){
            array_push($weapprofarray, 'glaive');
        }
        if(!empty($_POST["greataxe2"])){
            array_push($weapprofarray, 'greataxe');
        }
        if(!empty($_POST["greatsword2"])){
            array_push($weapprofarray, 'greatsword');
        }
        if(!empty($_POST["halberd2"])){
            array_push($weapprofarray, 'halberd');
        }
        if(!empty($_POST["lance2"])){
            array_push($weapprofarray, 'lance');
        }
        if(!empty($_POST["longsword2"])){
            array_push($weapprofarray, 'longsword');
        }
        if(!empty($_POST["maul2"])){
            array_push($weapprofarray, 'maul');
        }
        if(!empty($_POST["morningstar2"])){
            array_push($weapprofarray, 'morningstar');
        }
        if(!empty($_POST["pike2"])){
            array_push($weapprofarray, 'pike');
        }
        if(!empty($_POST["rapier2"])){
            array_push($weapprofarray, 'rapier');
        }
        if(!empty($_POST["scimitar2"])){
            array_push($weapprofarray, 'scimitar');
        }
        if(!empty($_POST["shortsword2"])){
            array_push($weapprofarray, 'shortsword');
        }
        if(!empty($_POST["trident2"])){
            array_push($weapprofarray, 'trident');
        }
        if(!empty($_POST["warpick2"])){
            array_push($weapprofarray, 'warpick');
        }
        if(!empty($_POST["warhammer2"])){
            array_push($weapprofarray, 'warhammer');
        }
        if(!empty($_POST["whip2"])){
            array_push($weapprofarray, 'whip');
        }
        if(!empty($_POST["blowgun2"])){
            array_push($weapprofarray, 'blowgun');
        }
        if(!empty($_POST["handcrossbow2"])){
            array_push($weapprofarray, 'handcrossbow');
        }
        if(!empty($_POST["heavycrossbow2"])){
            array_push($weapprofarray, 'heavycrossbow');
        }
        if(!empty($_POST["longbow2"])){
            array_push($weapprofarray, 'longbow');
        }
        if(!empty($_POST["net2"])){
            array_push($weapprofarray, 'net');
        }
        if(!empty($_POST["otherweap2"])){
            $otherweaponprof = filter_var($_POST["otherweap2"], FILTER_SANITIZE_STRING);
            $otherweaponprof = "Other Weapons - " . $otherweaponprof;
            array_push($weapprofarray, $otherweaponprof);
        }
        if(empty($weapprofarray)){
            $errors .= $noWeapProf;
        }
        
    }
}

if($_POST["addarmprof2"] == "y"){
        $armprofarray = [];
        if(!empty($_POST["lightarmour2"])){
            array_push($armprofarray, 'lightarmour');
        }
        if(!empty($_POST["mediumarmour2"])){
            array_push($armprofarray, 'mediumarmour');
        }
        if(!empty($_POST["heavyarmour2"])){
            array_push($armprofarray, 'heavyarmour');
        }
        if(!empty($_POST["shields2"])){
            array_push($armprofarray, 'shields');
        }
        if(empty($armprofarray)){
            $errors .= $missingArmSelection;
        }
}

if($_POST["addtoolprof1"] == "y"){
    $toolprofarray = [];
    if(!empty($_POST["alchemistssupplies2"])){
        array_push($toolprofarray, 'alchemistssupplies');
    }
    if(!empty($_POST["brewerssupplies2"])){
        array_push($toolprofarray, 'brewerssupplies');
    }
    if(!empty($_POST["calligrapherssupplies2"])){
        array_push($toolprofarray, 'calligrapherssupplies');
    }
    if(!empty($_POST["carpenterstools2"])){
        array_push($toolprofarray, 'carpenterstools');
    }
    if(!empty($_POST["cartographerstools2"])){
        array_push($toolprofarray, 'cartographerstools');
    }
    if(!empty($_POST["cobblerstools2"])){
        array_push($toolprofarray, 'cobblerstools');
    }
    if(!empty($_POST["cooksutensils2"])){
        array_push($toolprofarray, 'cooksutensils');
    }
    if(!empty($_POST["glassblowerstools2"])){
        array_push($toolprofarray, 'glassblowerstools');
    }
    if(!empty($_POST["jewelerstools2"])){
        array_push($toolprofarray, 'jewelerstools');
    }
    if(!empty($_POST["leatherworkerstools2"])){
        array_push($toolprofarray, 'leatherworkerstools');
    }
    if(!empty($_POST["masonstools2"])){
        array_push($toolprofarray, 'masonstools');
    }
    if(!empty($_POST["painterstools2"])){
        array_push($toolprofarray, 'painterstools');
    }
    if(!empty($_POST["potterstools2"])){
        array_push($toolprofarray, 'potterstools');
    }
    if(!empty($_POST["smithstools2"])){
        array_push($toolprofarray, 'smithstools');
    }
    if(!empty($_POST["tinkerstools2"])){
        array_push($toolprofarray, 'tinkerstools');
    }
    if(!empty($_POST["weaverstools2"])){
        array_push($toolprofarray, 'weaverstools');
    }
    if(!empty($_POST["woodcarverstools2"])){
        array_push($toolprofarray, 'woodcarverstools');
    }
    if(!empty($_POST["disguisekit2"])){
        array_push($toolprofarray, 'disguisekit');
    }
    if(!empty($_POST["forgerykit2"])){
        array_push($toolprofarray, 'forgerykit');
    }
    if(!empty($_POST["herbalismkit2"])){
        array_push($toolprofarray, 'herbalismkit');
    }
    if(!empty($_POST["navigatorstools2"])){
        array_push($toolprofarray, 'navigatorstools');
    }
    if(!empty($_POST["poisonerskit2"])){
        array_push($toolprofarray, 'poisonerskit');
    }
    if(!empty($_POST["thievestools2"])){
        array_push($toolprofarray, 'thievestools');
    }
    if(!empty($_POST["vehiclesland2"])){
        array_push($toolprofarray, 'vehiclesland');
    }
    if(!empty($_POST["vehicleswater2"])){
        array_push($toolprofarray, 'vehicleswater');
    }
    if(!empty($_POST["vehiclesair2"])){
        array_push($toolprofarray, 'vehiclesair');
    }
    if(!empty($_POST["gset2"])){
        $gamingsetprof = filter_var($_POST["gset2"], FILTER_SANITIZE_STRING);
        $gamingsetprof = "Gaming Sets - " . $gamingsetprof;
        array_push($toolprofarray, $gamingsetprof);
    }
    if(!empty($_POST["minstru2"])){
        $musicinstruprof = filter_var($_POST["minstru2"], FILTER_SANITIZE_STRING);
        $musicinstruprof = "Musical Instruments - " . $musicinstruprof;
        array_push($toolprofarray, $musicinstruprof);
    }
    if(empty($toolprofarray)){
        $errors .= $missingToolSelection;
    }
}

//var_dump($toolprofarray); 

//Features
if($_POST["addl1f1"] == "y"){
    if(empty($_POST["l1f1name"])){
        $errors .= $missingfeaturename;
    }else{
        $l1f1name = filter_var($_POST["l1f1name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l1f1desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l1f1desc = $_POST["l1f1desc"];
        $l1f1desc = str_replace("'", "’", "$l1f1desc");
        $l1f1desc = str_replace('"', '“', "$l1f1desc");
        $l1f1desc = filter_var($l1f1desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l1f1limited"] == "y"){
        if(empty($_POST["l1f1uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l1f1uses = $_POST["l1f1uses"];
        }
        if(empty($_POST["l1f1rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l1f1rep = $_POST["l1f1rep"];
        }
    }
}
    
if($_POST["addl1f2"] == "y"){
    if(empty($_POST["l1f2name"])){
        $errors .= $missingfeaturename;
    }else{
        $l1f2name = filter_var($_POST["l1f2name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l1f2desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l1f2desc = $_POST["l1f2desc"];
        $l1f2desc = str_replace("'", "’", "$l1f2desc");
        $l1f2desc = str_replace('"', '“', "$l1f2desc");
        $l1f2desc = filter_var($l1f2desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l1f2limited"] == "y"){
        if(empty($_POST["l1f2uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l1f2uses = $_POST["l1f2uses"];
        }
        if(empty($_POST["l1f2rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l1f2rep = $_POST["l1f2rep"];
        }
    }
}

if($_POST["addl1f3"] == "y"){
    if(empty($_POST["l1f3name"])){
        $errors .= $missingfeaturename;
    }else{
        $l1f3name = filter_var($_POST["l1f3name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l1f3desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l1f3desc = $_POST["l1f3desc"];
        $l1f3desc = str_replace("'", "’", "$l1f3desc");
        $l1f3desc = str_replace('"', '“', "$l1f3desc");
        $l1f3desc = filter_var($l1f3desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l1f3limited"] == "y"){
        if(empty($_POST["l1f3uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l1f3uses = $_POST["l1f3uses"];
        }
        if(empty($_POST["l1f3rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l1f3rep = $_POST["l1f3rep"];
        }
    }
}

if($_POST["addl1f4"] == "y"){
    if(empty($_POST["l1f4name"])){
        $errors .= $missingfeaturename;
    }else{
        $l1f4name = filter_var($_POST["l1f4name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l1f4desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l1f4desc = $_POST["l1f4desc"];
        $l1f4desc = str_replace("'", "’", "$l1f4desc");
        $l1f4desc = str_replace('"', '“', "$l1f4desc");
        $l1f4desc = filter_var($l1f4desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l1f4limited"] == "y"){
        if(empty($_POST["l1f4uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l1f4uses = $_POST["l1f4uses"];
        }
        if(empty($_POST["l1f4rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l1f4rep = $_POST["l1f4rep"];
        }
    }
}

if($_POST["addl2f1"] == "y"){
    if(empty($_POST["l2f1name"])){
        $errors .= $missingfeaturename;
    }else{
        $l2f1name = filter_var($_POST["l2f1name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l2f1desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l2f1desc = $_POST["l2f1desc"];
        $l2f1desc = str_replace("'", "’", "$l2f1desc");
        $l2f1desc = str_replace('"', '“', "$l2f1desc");
        $l2f1desc = filter_var($l2f1desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l2f1limited"] == "y"){
        if(empty($_POST["l2f1uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l2f1uses = $_POST["l2f1uses"];
        }
        if(empty($_POST["l2f1rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l2f1rep = $_POST["l2f1rep"];
        }
    }
}
    
if($_POST["addl2f2"] == "y"){
    if(empty($_POST["l2f2name"])){
        $errors .= $missingfeaturename;
    }else{
        $l2f2name = filter_var($_POST["l2f2name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l2f2desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l2f2desc = $_POST["l2f2desc"];
        $l2f2desc = str_replace("'", "’", "$l2f2desc");
        $l2f2desc = str_replace('"', '“', "$l2f2desc");
        $l2f2desc = filter_var($l2f2desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l2f2limited"] == "y"){
        if(empty($_POST["l2f2uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l2f2uses = $_POST["l2f2uses"];
        }
        if(empty($_POST["l2f2rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l2f2rep = $_POST["l2f2rep"];
        }
    }
}

if($_POST["addl2f3"] == "y"){
    if(empty($_POST["l2f3name"])){
        $errors .= $missingfeaturename;
    }else{
        $l2f3name = filter_var($_POST["l2f3name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l2f3desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l2f3desc = $_POST["l2f3desc"];
        $l2f3desc = str_replace("'", "’", "$l2f3desc");
        $l2f3desc = str_replace('"', '“', "$l2f3desc");
        $l2f3desc = filter_var($l2f3desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l2f3limited"] == "y"){
        if(empty($_POST["l2f3uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l2f3uses = $_POST["l2f3uses"];
        }
        if(empty($_POST["l2f3rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l2f3rep = $_POST["l2f3rep"];
        }
    }
}

if($_POST["addl2f4"] == "y"){
    if(empty($_POST["l2f4name"])){
        $errors .= $missingfeaturename;
    }else{
        $l2f4name = filter_var($_POST["l2f4name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l2f4desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l2f4desc = $_POST["l2f4desc"];
        $l2f4desc = str_replace("'", "’", "$l2f4desc");
        $l2f4desc = str_replace('"', '“', "$l2f4desc");
        $l2f4desc = filter_var($l2f4desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l2f4limited"] == "y"){
        if(empty($_POST["l2f4uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l2f4uses = $_POST["l2f4uses"];
        }
        if(empty($_POST["l2f4rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l2f4rep = $_POST["l2f4rep"];
        }
    }
}

if($_POST["addl3f1"] == "y"){
    if(empty($_POST["l3f1name"])){
        $errors .= $missingfeaturename;
    }else{
        $l3f1name = filter_var($_POST["l3f1name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l3f1desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l3f1desc = $_POST["l3f1desc"];
        $l3f1desc = str_replace("'", "’", "$l3f1desc");
        $l3f1desc = str_replace('"', '“', "$l3f1desc");
        $l3f1desc = filter_var($l3f1desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l3f1limited"] == "y"){
        if(empty($_POST["l3f1uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l3f1uses = $_POST["l3f1uses"];
        }
        if(empty($_POST["l3f1rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l3f1rep = $_POST["l3f1rep"];
        }
    }
}
    
if($_POST["addl3f2"] == "y"){
    if(empty($_POST["l3f2name"])){
        $errors .= $missingfeaturename;
    }else{
        $l3f2name = filter_var($_POST["l3f2name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l3f2desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l3f2desc = $_POST["l3f2desc"];
        $l3f2desc = str_replace("'", "’", "$l3f2desc");
        $l3f2desc = str_replace('"', '“', "$l3f2desc");
        $l3f2desc = filter_var($l3f2desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l3f2limited"] == "y"){
        if(empty($_POST["l3f2uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l3f2uses = $_POST["l3f2uses"];
        }
        if(empty($_POST["l3f2rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l3f2rep = $_POST["l3f2rep"];
        }
    }
}

if($_POST["addl3f3"] == "y"){
    if(empty($_POST["l3f3name"])){
        $errors .= $missingfeaturename;
    }else{
        $l3f3name = filter_var($_POST["l3f3name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l3f3desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l3f3desc = $_POST["l3f3desc"];
        $l3f3desc = str_replace("'", "’", "$l3f3desc");
        $l3f3desc = str_replace('"', '“', "$l3f3desc");
        $l3f3desc = filter_var($l3f3desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l3f3limited"] == "y"){
        if(empty($_POST["l3f3uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l3f3uses = $_POST["l3f3uses"];
        }
        if(empty($_POST["l3f3rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l3f3rep = $_POST["l3f3rep"];
        }
    }
}

if($_POST["addl3f4"] == "y"){
    if(empty($_POST["l3f4name"])){
        $errors .= $missingfeaturename;
    }else{
        $l3f4name = filter_var($_POST["l3f4name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l3f4desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l3f4desc = $_POST["l3f4desc"];
        $l3f4desc = str_replace("'", "’", "$l3f4desc");
        $l3f4desc = str_replace('"', '“', "$l3f4desc");
        $l3f4desc = filter_var($l3f4desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l3f4limited"] == "y"){
        if(empty($_POST["l3f4uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l3f4uses = $_POST["l3f4uses"];
        }
        if(empty($_POST["l3f4rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l3f4rep = $_POST["l3f4rep"];
        }
    }
}

if($_POST["addl4f1"] == "y"){
    if(empty($_POST["l4f1name"])){
        $errors .= $missingfeaturename;
    }else{
        $l4f1name = filter_var($_POST["l4f1name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l4f1desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l4f1desc = $_POST["l4f1desc"];
        $l4f1desc = str_replace("'", "’", "$l4f1desc");
        $l4f1desc = str_replace('"', '“', "$l4f1desc");
        $l4f1desc = filter_var($l4f1desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l4f1limited"] == "y"){
        if(empty($_POST["l4f1uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l4f1uses = $_POST["l4f1uses"];
        }
        if(empty($_POST["l4f1rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l4f1rep = $_POST["l4f1rep"];
        }
    }
}
    
if($_POST["addl4f2"] == "y"){
    if(empty($_POST["l4f2name"])){
        $errors .= $missingfeaturename;
    }else{
        $l4f2name = filter_var($_POST["l4f2name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l4f2desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l4f2desc = $_POST["l4f2desc"];
        $l4f2desc = str_replace("'", "’", "$l4f2desc");
        $l4f2desc = str_replace('"', '“', "$l4f2desc");
        $l4f2desc = filter_var($l4f2desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l4f2limited"] == "y"){
        if(empty($_POST["l4f2uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l4f2uses = $_POST["l4f2uses"];
        }
        if(empty($_POST["l4f2rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l4f2rep = $_POST["l4f2rep"];
        }
    }
}

if($_POST["addl4f3"] == "y"){
    if(empty($_POST["l4f3name"])){
        $errors .= $missingfeaturename;
    }else{
        $l4f3name = filter_var($_POST["l4f3name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l4f3desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l4f3desc = $_POST["l4f3desc"];
        $l4f3desc = str_replace("'", "’", "$l4f3desc");
        $l4f3desc = str_replace('"', '“', "$l4f3desc");
        $l4f3desc = filter_var($l4f3desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l4f3limited"] == "y"){
        if(empty($_POST["l4f3uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l4f3uses = $_POST["l4f3uses"];
        }
        if(empty($_POST["l4f3rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l4f3rep = $_POST["l4f3rep"];
        }
    }
}

if($_POST["addl4f4"] == "y"){
    if(empty($_POST["l4f4name"])){
        $errors .= $missingfeaturename;
    }else{
        $l4f4name = filter_var($_POST["l4f4name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l4f4desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l4f4desc = $_POST["l4f4desc"];
        $l4f4desc = str_replace("'", "’", "$l4f4desc");
        $l4f4desc = str_replace('"', '“', "$l4f4desc");
        $l4f4desc = filter_var($l4f4desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l4f4limited"] == "y"){
        if(empty($_POST["l4f4uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l4f4uses = $_POST["l4f4uses"];
        }
        if(empty($_POST["l4f4rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l4f4rep = $_POST["l4f4rep"];
        }
    }
}

if($_POST["addl5f1"] == "y"){
    if(empty($_POST["l5f1name"])){
        $errors .= $missingfeaturename;
    }else{
        $l5f1name = filter_var($_POST["l5f1name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l5f1desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l5f1desc = $_POST["l5f1desc"];
        $l5f1desc = str_replace("'", "’", "$l5f1desc");
        $l5f1desc = str_replace('"', '“', "$l5f1desc");
        $l5f1desc = filter_var($l5f1desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l5f1limited"] == "y"){
        if(empty($_POST["l5f1uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l5f1uses = $_POST["l5f1uses"];
        }
        if(empty($_POST["l5f1rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l5f1rep = $_POST["l5f1rep"];
        }
    }
}
    
if($_POST["addl5f2"] == "y"){
    if(empty($_POST["l5f2name"])){
        $errors .= $missingfeaturename;
    }else{
        $l5f2name = filter_var($_POST["l5f2name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l5f2desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l5f2desc = $_POST["l5f2desc"];
        $l5f2desc = str_replace("'", "’", "$l5f2desc");
        $l5f2desc = str_replace('"', '“', "$l5f2desc");
        $l5f2desc = filter_var($l5f2desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l5f2limited"] == "y"){
        if(empty($_POST["l5f2uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l5f2uses = $_POST["l5f2uses"];
        }
        if(empty($_POST["l5f2rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l5f2rep = $_POST["l5f2rep"];
        }
    }
}

if($_POST["addl5f3"] == "y"){
    if(empty($_POST["l5f3name"])){
        $errors .= $missingfeaturename;
    }else{
        $l5f3name = filter_var($_POST["l5f3name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l5f3desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l5f3desc = $_POST["l5f3desc"];
        $l5f3desc = str_replace("'", "’", "$l5f3desc");
        $l5f3desc = str_replace('"', '“', "$l5f3desc");
        $l5f3desc = filter_var($l5f3desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l5f3limited"] == "y"){
        if(empty($_POST["l5f3uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l5f3uses = $_POST["l5f3uses"];
        }
        if(empty($_POST["l5f3rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l5f3rep = $_POST["l5f3rep"];
        }
    }
}

if($_POST["addl5f4"] == "y"){
    if(empty($_POST["l5f4name"])){
        $errors .= $missingfeaturename;
    }else{
        $l5f4name = filter_var($_POST["l5f4name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l5f4desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l5f4desc = $_POST["l5f4desc"];
        $l5f4desc = str_replace("'", "’", "$l5f4desc");
        $l5f4desc = str_replace('"', '“', "$l5f4desc");
        $l5f4desc = filter_var($l5f4desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l5f4limited"] == "y"){
        if(empty($_POST["l5f4uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l5f4uses = $_POST["l5f4uses"];
        }
        if(empty($_POST["l5f4rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l5f4rep = $_POST["l5f4rep"];
        }
    }
}

if($_POST["addl6f1"] == "y"){
    if(empty($_POST["l6f1name"])){
        $errors .= $missingfeaturename;
    }else{
        $l6f1name = filter_var($_POST["l6f1name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l6f1desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l6f1desc = $_POST["l6f1desc"];
        $l6f1desc = str_replace("'", "’", "$l6f1desc");
        $l6f1desc = str_replace('"', '“', "$l6f1desc");
        $l6f1desc = filter_var($l6f1desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l6f1limited"] == "y"){
        if(empty($_POST["l6f1uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l6f1uses = $_POST["l6f1uses"];
        }
        if(empty($_POST["l6f1rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l6f1rep = $_POST["l6f1rep"];
        }
    }
}
    
if($_POST["addl6f2"] == "y"){
    if(empty($_POST["l6f2name"])){
        $errors .= $missingfeaturename;
    }else{
        $l6f2name = filter_var($_POST["l6f2name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l6f2desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l6f2desc = $_POST["l6f2desc"];
        $l6f2desc = str_replace("'", "’", "$l6f2desc");
        $l6f2desc = str_replace('"', '“', "$l6f2desc");
        $l6f2desc = filter_var($l6f2desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l6f2limited"] == "y"){
        if(empty($_POST["l6f2uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l6f2uses = $_POST["l6f2uses"];
        }
        if(empty($_POST["l6f2rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l6f2rep = $_POST["l6f2rep"];
        }
    }
}

if($_POST["addl6f3"] == "y"){
    if(empty($_POST["l6f3name"])){
        $errors .= $missingfeaturename;
    }else{
        $l6f3name = filter_var($_POST["l6f3name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l6f3desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l6f3desc = $_POST["l6f3desc"];
        $l6f3desc = str_replace("'", "’", "$l6f3desc");
        $l6f3desc = str_replace('"', '“', "$l6f3desc");
        $l6f3desc = filter_var($l6f3desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l6f3limited"] == "y"){
        if(empty($_POST["l6f3uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l6f3uses = $_POST["l6f3uses"];
        }
        if(empty($_POST["l6f3rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l6f3rep = $_POST["l6f3rep"];
        }
    }
}

if($_POST["addl6f4"] == "y"){
    if(empty($_POST["l6f4name"])){
        $errors .= $missingfeaturename;
    }else{
        $l6f4name = filter_var($_POST["l6f4name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l6f4desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l6f4desc = $_POST["l6f4desc"];
        $l6f4desc = str_replace("'", "’", "$l6f4desc");
        $l6f4desc = str_replace('"', '“', "$l6f4desc");
        $l6f4desc = filter_var($l6f4desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l6f4limited"] == "y"){
        if(empty($_POST["l6f4uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l6f4uses = $_POST["l6f4uses"];
        }
        if(empty($_POST["l6f4rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l6f4rep = $_POST["l6f4rep"];
        }
    }
}

if($_POST["addl7f1"] == "y"){
    if(empty($_POST["l7f1name"])){
        $errors .= $missingfeaturename;
    }else{
        $l7f1name = filter_var($_POST["l7f1name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l7f1desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l7f1desc = $_POST["l7f1desc"];
        $l7f1desc = str_replace("'", "’", "$l7f1desc");
        $l7f1desc = str_replace('"', '“', "$l7f1desc");
        $l7f1desc = filter_var($l7f1desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l7f1limited"] == "y"){
        if(empty($_POST["l7f1uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l7f1uses = $_POST["l7f1uses"];
        }
        if(empty($_POST["l7f1rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l7f1rep = $_POST["l7f1rep"];
        }
    }
}
    
if($_POST["addl7f2"] == "y"){
    if(empty($_POST["l7f2name"])){
        $errors .= $missingfeaturename;
    }else{
        $l7f2name = filter_var($_POST["l7f2name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l7f2desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l7f2desc = $_POST["l7f2desc"];
        $l7f2desc = str_replace("'", "’", "$l7f2desc");
        $l7f2desc = str_replace('"', '“', "$l7f2desc");
        $l7f2desc = filter_var($l7f2desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l7f2limited"] == "y"){
        if(empty($_POST["l7f2uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l7f2uses = $_POST["l7f2uses"];
        }
        if(empty($_POST["l7f2rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l7f2rep = $_POST["l7f2rep"];
        }
    }
}

if($_POST["addl7f3"] == "y"){
    if(empty($_POST["l7f3name"])){
        $errors .= $missingfeaturename;
    }else{
        $l7f3name = filter_var($_POST["l7f3name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l7f3desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l7f3desc = $_POST["l7f3desc"];
        $l7f3desc = str_replace("'", "’", "$l7f3desc");
        $l7f3desc = str_replace('"', '“', "$l7f3desc");
        $l7f3desc = filter_var($l7f3desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l7f3limited"] == "y"){
        if(empty($_POST["l7f3uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l7f3uses = $_POST["l7f3uses"];
        }
        if(empty($_POST["l7f3rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l7f3rep = $_POST["l7f3rep"];
        }
    }
}

if($_POST["addl7f4"] == "y"){
    if(empty($_POST["l7f4name"])){
        $errors .= $missingfeaturename;
    }else{
        $l7f4name = filter_var($_POST["l7f4name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l7f4desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l7f4desc = $_POST["l7f4desc"];
        $l7f4desc = str_replace("'", "’", "$l7f4desc");
        $l7f4desc = str_replace('"', '“', "$l7f4desc");
        $l7f4desc = filter_var($l7f4desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l7f4limited"] == "y"){
        if(empty($_POST["l7f4uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l7f4uses = $_POST["l7f4uses"];
        }
        if(empty($_POST["l7f4rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l7f4rep = $_POST["l7f4rep"];
        }
    }
}

if($_POST["addl8f1"] == "y"){
    if(empty($_POST["l8f1name"])){
        $errors .= $missingfeaturename;
    }else{
        $l8f1name = filter_var($_POST["l8f1name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l8f1desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l8f1desc = $_POST["l8f1desc"];
        $l8f1desc = str_replace("'", "’", "$l8f1desc");
        $l8f1desc = str_replace('"', '“', "$l8f1desc");
        $l8f1desc = filter_var($l8f1desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l8f1limited"] == "y"){
        if(empty($_POST["l8f1uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l8f1uses = $_POST["l8f1uses"];
        }
        if(empty($_POST["l8f1rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l8f1rep = $_POST["l8f1rep"];
        }
    }
}
    
if($_POST["addl8f2"] == "y"){
    if(empty($_POST["l8f2name"])){
        $errors .= $missingfeaturename;
    }else{
        $l8f2name = filter_var($_POST["l8f2name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l8f2desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l8f2desc = $_POST["l8f2desc"];
        $l8f2desc = str_replace("'", "’", "$l8f2desc");
        $l8f2desc = str_replace('"', '“', "$l8f2desc");
        $l8f2desc = filter_var($l8f2desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l8f2limited"] == "y"){
        if(empty($_POST["l8f2uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l8f2uses = $_POST["l8f2uses"];
        }
        if(empty($_POST["l8f2rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l8f2rep = $_POST["l8f2rep"];
        }
    }
}

if($_POST["addl8f3"] == "y"){
    if(empty($_POST["l8f3name"])){
        $errors .= $missingfeaturename;
    }else{
        $l8f3name = filter_var($_POST["l8f3name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l8f3desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l8f3desc = $_POST["l8f3desc"];
        $l8f3desc = str_replace("'", "’", "$l8f3desc");
        $l8f3desc = str_replace('"', '“', "$l8f3desc");
        $l8f3desc = filter_var($l8f3desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l8f3limited"] == "y"){
        if(empty($_POST["l8f3uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l8f3uses = $_POST["l8f3uses"];
        }
        if(empty($_POST["l8f3rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l8f3rep = $_POST["l8f3rep"];
        }
    }
}

if($_POST["addl8f4"] == "y"){
    if(empty($_POST["l8f4name"])){
        $errors .= $missingfeaturename;
    }else{
        $l8f4name = filter_var($_POST["l8f4name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l8f4desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l8f4desc = $_POST["l8f4desc"];
        $l8f4desc = str_replace("'", "’", "$l8f4desc");
        $l8f4desc = str_replace('"', '“', "$l8f4desc");
        $l8f4desc = filter_var($l8f4desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l8f4limited"] == "y"){
        if(empty($_POST["l8f4uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l8f4uses = $_POST["l8f4uses"];
        }
        if(empty($_POST["l8f4rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l8f4rep = $_POST["l8f4rep"];
        }
    }
}

if($_POST["addl9f1"] == "y"){
    if(empty($_POST["l9f1name"])){
        $errors .= $missingfeaturename;
    }else{
        $l9f1name = filter_var($_POST["l9f1name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l9f1desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l9f1desc = $_POST["l9f1desc"];
        $l9f1desc = str_replace("'", "’", "$l9f1desc");
        $l9f1desc = str_replace('"', '“', "$l9f1desc");
        $l9f1desc = filter_var($l9f1desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l9f1limited"] == "y"){
        if(empty($_POST["l9f1uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l9f1uses = $_POST["l9f1uses"];
        }
        if(empty($_POST["l9f1rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l9f1rep = $_POST["l9f1rep"];
        }
    }
}
    
if($_POST["addl9f2"] == "y"){
    if(empty($_POST["l9f2name"])){
        $errors .= $missingfeaturename;
    }else{
        $l9f2name = filter_var($_POST["l9f2name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l9f2desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l9f2desc = $_POST["l9f2desc"];
        $l9f2desc = str_replace("'", "’", "$l9f2desc");
        $l9f2desc = str_replace('"', '“', "$l9f2desc");
        $l9f2desc = filter_var($l9f2desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l9f2limited"] == "y"){
        if(empty($_POST["l9f2uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l9f2uses = $_POST["l9f2uses"];
        }
        if(empty($_POST["l9f2rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l9f2rep = $_POST["l9f2rep"];
        }
    }
}

if($_POST["addl9f3"] == "y"){
    if(empty($_POST["l9f3name"])){
        $errors .= $missingfeaturename;
    }else{
        $l9f3name = filter_var($_POST["l9f3name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l9f3desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l9f3desc = $_POST["l9f3desc"];
        $l9f3desc = str_replace("'", "’", "$l9f3desc");
        $l9f3desc = str_replace('"', '“', "$l9f3desc");
        $l9f3desc = filter_var($l9f3desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l9f3limited"] == "y"){
        if(empty($_POST["l9f3uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l9f3uses = $_POST["l9f3uses"];
        }
        if(empty($_POST["l9f3rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l9f3rep = $_POST["l9f3rep"];
        }
    }
}

if($_POST["addl9f4"] == "y"){
    if(empty($_POST["l9f4name"])){
        $errors .= $missingfeaturename;
    }else{
        $l9f4name = filter_var($_POST["l9f4name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l9f4desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l9f4desc = $_POST["l9f4desc"];
        $l9f4desc = str_replace("'", "’", "$l9f4desc");
        $l9f4desc = str_replace('"', '“', "$l9f4desc");
        $l9f4desc = filter_var($l9f4desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l9f4limited"] == "y"){
        if(empty($_POST["l9f4uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l9f4uses = $_POST["l9f4uses"];
        }
        if(empty($_POST["l9f4rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l9f4rep = $_POST["l9f4rep"];
        }
    }
}

if($_POST["addl10f1"] == "y"){
    if(empty($_POST["l10f1name"])){
        $errors .= $missingfeaturename;
    }else{
        $l10f1name = filter_var($_POST["l10f1name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l10f1desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l10f1desc = $_POST["l10f1desc"];
        $l10f1desc = str_replace("'", "’", "$l10f1desc");
        $l10f1desc = str_replace('"', '“', "$l10f1desc");
        $l10f1desc = filter_var($l10f1desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l10f1limited"] == "y"){
        if(empty($_POST["l10f1uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l10f1uses = $_POST["l10f1uses"];
        }
        if(empty($_POST["l10f1rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l10f1rep = $_POST["l10f1rep"];
        }
    }
}
    
if($_POST["addl10f2"] == "y"){
    if(empty($_POST["l10f2name"])){
        $errors .= $missingfeaturename;
    }else{
        $l10f2name = filter_var($_POST["l10f2name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l10f2desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l10f2desc = $_POST["l10f2desc"];
        $l10f2desc = str_replace("'", "’", "$l10f2desc");
        $l10f2desc = str_replace('"', '“', "$l10f2desc");
        $l10f2desc = filter_var($l10f2desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l10f2limited"] == "y"){
        if(empty($_POST["l10f2uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l10f2uses = $_POST["l10f2uses"];
        }
        if(empty($_POST["l10f2rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l10f2rep = $_POST["l10f2rep"];
        }
    }
}

if($_POST["addl10f3"] == "y"){
    if(empty($_POST["l10f3name"])){
        $errors .= $missingfeaturename;
    }else{
        $l10f3name = filter_var($_POST["l10f3name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l10f3desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l10f3desc = $_POST["l10f3desc"];
        $l10f3desc = str_replace("'", "’", "$l10f3desc");
        $l10f3desc = str_replace('"', '“', "$l10f3desc");
        $l10f3desc = filter_var($l10f3desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l10f3limited"] == "y"){
        if(empty($_POST["l10f3uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l10f3uses = $_POST["l10f3uses"];
        }
        if(empty($_POST["l10f3rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l10f3rep = $_POST["l10f3rep"];
        }
    }
}

if($_POST["addl10f4"] == "y"){
    if(empty($_POST["l10f4name"])){
        $errors .= $missingfeaturename;
    }else{
        $l10f4name = filter_var($_POST["l10f4name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l10f4desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l10f4desc = $_POST["l10f4desc"];
        $l10f4desc = str_replace("'", "’", "$l10f4desc");
        $l10f4desc = str_replace('"', '“', "$l10f4desc");
        $l10f4desc = filter_var($l10f4desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l10f4limited"] == "y"){
        if(empty($_POST["l10f4uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l10f4uses = $_POST["l10f4uses"];
        }
        if(empty($_POST["l10f4rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l10f4rep = $_POST["l10f4rep"];
        }
    }
}

if($_POST["addl11f1"] == "y"){
    if(empty($_POST["l11f1name"])){
        $errors .= $missingfeaturename;
    }else{
        $l11f1name = filter_var($_POST["l11f1name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l11f1desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l11f1desc = $_POST["l11f1desc"];
        $l11f1desc = str_replace("'", "’", "$l11f1desc");
        $l11f1desc = str_replace('"', '“', "$l11f1desc");
        $l11f1desc = filter_var($l11f1desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l11f1limited"] == "y"){
        if(empty($_POST["l11f1uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l11f1uses = $_POST["l11f1uses"];
        }
        if(empty($_POST["l11f1rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l11f1rep = $_POST["l11f1rep"];
        }
    }
}
    
if($_POST["addl11f2"] == "y"){
    if(empty($_POST["l11f2name"])){
        $errors .= $missingfeaturename;
    }else{
        $l11f2name = filter_var($_POST["l11f2name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l11f2desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l11f2desc = $_POST["l11f2desc"];
        $l11f2desc = str_replace("'", "’", "$l11f2desc");
        $l11f2desc = str_replace('"', '“', "$l11f2desc");
        $l11f2desc = filter_var($l11f2desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l11f2limited"] == "y"){
        if(empty($_POST["l11f2uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l11f2uses = $_POST["l11f2uses"];
        }
        if(empty($_POST["l11f2rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l11f2rep = $_POST["l11f2rep"];
        }
    }
}

if($_POST["addl11f3"] == "y"){
    if(empty($_POST["l11f3name"])){
        $errors .= $missingfeaturename;
    }else{
        $l11f3name = filter_var($_POST["l11f3name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l11f3desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l11f3desc = $_POST["l11f3desc"];
        $l11f3desc = str_replace("'", "’", "$l11f3desc");
        $l11f3desc = str_replace('"', '“', "$l11f3desc");
        $l11f3desc = filter_var($l11f3desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l11f3limited"] == "y"){
        if(empty($_POST["l11f3uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l11f3uses = $_POST["l11f3uses"];
        }
        if(empty($_POST["l11f3rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l11f3rep = $_POST["l11f3rep"];
        }
    }
}

if($_POST["addl11f4"] == "y"){
    if(empty($_POST["l11f4name"])){
        $errors .= $missingfeaturename;
    }else{
        $l11f4name = filter_var($_POST["l11f4name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l11f4desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l11f4desc = $_POST["l11f4desc"];
        $l11f4desc = str_replace("'", "’", "$l11f4desc");
        $l11f4desc = str_replace('"', '“', "$l11f4desc");
        $l11f4desc = filter_var($l11f4desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l11f4limited"] == "y"){
        if(empty($_POST["l11f4uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l11f4uses = $_POST["l11f4uses"];
        }
        if(empty($_POST["l11f4rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l11f4rep = $_POST["l11f4rep"];
        }
    }
}

if($_POST["addl12f1"] == "y"){
    if(empty($_POST["l12f1name"])){
        $errors .= $missingfeaturename;
    }else{
        $l12f1name = filter_var($_POST["l12f1name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l12f1desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l12f1desc = $_POST["l12f1desc"];
        $l12f1desc = str_replace("'", "’", "$l12f1desc");
        $l12f1desc = str_replace('"', '“', "$l12f1desc");
        $l12f1desc = filter_var($l12f1desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l12f1limited"] == "y"){
        if(empty($_POST["l12f1uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l12f1uses = $_POST["l12f1uses"];
        }
        if(empty($_POST["l12f1rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l12f1rep = $_POST["l12f1rep"];
        }
    }
}
    
if($_POST["addl12f2"] == "y"){
    if(empty($_POST["l12f2name"])){
        $errors .= $missingfeaturename;
    }else{
        $l12f2name = filter_var($_POST["l12f2name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l12f2desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l12f2desc = $_POST["l12f2desc"];
        $l12f2desc = str_replace("'", "’", "$l12f2desc");
        $l12f2desc = str_replace('"', '“', "$l12f2desc");
        $l12f2desc = filter_var($l12f2desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l12f2limited"] == "y"){
        if(empty($_POST["l12f2uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l12f2uses = $_POST["l12f2uses"];
        }
        if(empty($_POST["l12f2rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l12f2rep = $_POST["l12f2rep"];
        }
    }
}

if($_POST["addl12f3"] == "y"){
    if(empty($_POST["l12f3name"])){
        $errors .= $missingfeaturename;
    }else{
        $l12f3name = filter_var($_POST["l12f3name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l12f3desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l12f3desc = $_POST["l12f3desc"];
        $l12f3desc = str_replace("'", "’", "$l12f3desc");
        $l12f3desc = str_replace('"', '“', "$l12f3desc");
        $l12f3desc = filter_var($l12f3desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l12f3limited"] == "y"){
        if(empty($_POST["l12f3uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l12f3uses = $_POST["l12f3uses"];
        }
        if(empty($_POST["l12f3rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l12f3rep = $_POST["l12f3rep"];
        }
    }
}

if($_POST["addl12f4"] == "y"){
    if(empty($_POST["l12f4name"])){
        $errors .= $missingfeaturename;
    }else{
        $l12f4name = filter_var($_POST["l12f4name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l12f4desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l12f4desc = $_POST["l12f4desc"];
        $l12f4desc = str_replace("'", "’", "$l12f4desc");
        $l12f4desc = str_replace('"', '“', "$l12f4desc");
        $l12f4desc = filter_var($l12f4desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l12f4limited"] == "y"){
        if(empty($_POST["l12f4uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l12f4uses = $_POST["l12f4uses"];
        }
        if(empty($_POST["l12f4rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l12f4rep = $_POST["l12f4rep"];
        }
    }
}

if($_POST["addl13f1"] == "y"){
    if(empty($_POST["l13f1name"])){
        $errors .= $missingfeaturename;
    }else{
        $l13f1name = filter_var($_POST["l13f1name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l13f1desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l13f1desc = $_POST["l13f1desc"];
        $l13f1desc = str_replace("'", "’", "$l13f1desc");
        $l13f1desc = str_replace('"', '“', "$l13f1desc");
        $l13f1desc = filter_var($l13f1desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l13f1limited"] == "y"){
        if(empty($_POST["l13f1uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l13f1uses = $_POST["l13f1uses"];
        }
        if(empty($_POST["l13f1rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l13f1rep = $_POST["l13f1rep"];
        }
    }
}
    
if($_POST["addl13f2"] == "y"){
    if(empty($_POST["l13f2name"])){
        $errors .= $missingfeaturename;
    }else{
        $l13f2name = filter_var($_POST["l13f2name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l13f2desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l13f2desc = $_POST["l13f2desc"];
        $l13f2desc = str_replace("'", "’", "$l13f2desc");
        $l13f2desc = str_replace('"', '“', "$l13f2desc");
        $l13f2desc = filter_var($l13f2desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l13f2limited"] == "y"){
        if(empty($_POST["l13f2uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l13f2uses = $_POST["l13f2uses"];
        }
        if(empty($_POST["l13f2rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l13f2rep = $_POST["l13f2rep"];
        }
    }
}

if($_POST["addl13f3"] == "y"){
    if(empty($_POST["l13f3name"])){
        $errors .= $missingfeaturename;
    }else{
        $l13f3name = filter_var($_POST["l13f3name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l13f3desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l13f3desc = $_POST["l13f3desc"];
        $l13f3desc = str_replace("'", "’", "$l13f3desc");
        $l13f3desc = str_replace('"', '“', "$l13f3desc");
        $l13f3desc = filter_var($l13f3desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l13f3limited"] == "y"){
        if(empty($_POST["l13f3uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l13f3uses = $_POST["l13f3uses"];
        }
        if(empty($_POST["l13f3rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l13f3rep = $_POST["l13f3rep"];
        }
    }
}

if($_POST["addl13f4"] == "y"){
    if(empty($_POST["l13f4name"])){
        $errors .= $missingfeaturename;
    }else{
        $l13f4name = filter_var($_POST["l13f4name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l13f4desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l13f4desc = $_POST["l13f4desc"];
        $l13f4desc = str_replace("'", "’", "$l13f4desc");
        $l13f4desc = str_replace('"', '“', "$l13f4desc");
        $l13f4desc = filter_var($l13f4desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l13f4limited"] == "y"){
        if(empty($_POST["l13f4uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l13f4uses = $_POST["l13f4uses"];
        }
        if(empty($_POST["l13f4rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l13f4rep = $_POST["l13f4rep"];
        }
    }
}

if($_POST["addl14f1"] == "y"){
    if(empty($_POST["l14f1name"])){
        $errors .= $missingfeaturename;
    }else{
        $l14f1name = filter_var($_POST["l14f1name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l14f1desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l14f1desc = $_POST["l14f1desc"];
        $l14f1desc = str_replace("'", "’", "$l14f1desc");
        $l14f1desc = str_replace('"', '“', "$l14f1desc");
        $l14f1desc = filter_var($l14f1desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l14f1limited"] == "y"){
        if(empty($_POST["l14f1uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l14f1uses = $_POST["l14f1uses"];
        }
        if(empty($_POST["l14f1rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l14f1rep = $_POST["l14f1rep"];
        }
    }
}
    
if($_POST["addl14f2"] == "y"){
    if(empty($_POST["l14f2name"])){
        $errors .= $missingfeaturename;
    }else{
        $l14f2name = filter_var($_POST["l14f2name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l14f2desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l14f2desc = $_POST["l14f2desc"];
        $l14f2desc = str_replace("'", "’", "$l14f2desc");
        $l14f2desc = str_replace('"', '“', "$l14f2desc");
        $l14f2desc = filter_var($l14f2desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l14f2limited"] == "y"){
        if(empty($_POST["l14f2uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l14f2uses = $_POST["l14f2uses"];
        }
        if(empty($_POST["l14f2rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l14f2rep = $_POST["l14f2rep"];
        }
    }
}

if($_POST["addl14f3"] == "y"){
    if(empty($_POST["l14f3name"])){
        $errors .= $missingfeaturename;
    }else{
        $l14f3name = filter_var($_POST["l14f3name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l14f3desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l14f3desc = $_POST["l14f3desc"];
        $l14f3desc = str_replace("'", "’", "$l14f3desc");
        $l14f3desc = str_replace('"', '“', "$l14f3desc");
        $l14f3desc = filter_var($l14f3desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l14f3limited"] == "y"){
        if(empty($_POST["l14f3uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l14f3uses = $_POST["l14f3uses"];
        }
        if(empty($_POST["l14f3rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l14f3rep = $_POST["l14f3rep"];
        }
    }
}

if($_POST["addl14f4"] == "y"){
    if(empty($_POST["l14f4name"])){
        $errors .= $missingfeaturename;
    }else{
        $l14f4name = filter_var($_POST["l14f4name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l14f4desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l14f4desc = $_POST["l14f4desc"];
        $l14f4desc = str_replace("'", "’", "$l14f4desc");
        $l14f4desc = str_replace('"', '“', "$l14f4desc");
        $l14f4desc = filter_var($l14f4desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l14f4limited"] == "y"){
        if(empty($_POST["l14f4uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l14f4uses = $_POST["l14f4uses"];
        }
        if(empty($_POST["l14f4rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l14f4rep = $_POST["l14f4rep"];
        }
    }
}

if($_POST["addl15f1"] == "y"){
    if(empty($_POST["l15f1name"])){
        $errors .= $missingfeaturename;
    }else{
        $l15f1name = filter_var($_POST["l15f1name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l15f1desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l15f1desc = $_POST["l15f1desc"];
        $l15f1desc = str_replace("'", "’", "$l15f1desc");
        $l15f1desc = str_replace('"', '“', "$l15f1desc");
        $l15f1desc = filter_var($l15f1desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l15f1limited"] == "y"){
        if(empty($_POST["l15f1uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l15f1uses = $_POST["l15f1uses"];
        }
        if(empty($_POST["l15f1rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l15f1rep = $_POST["l15f1rep"];
        }
    }
}
    
if($_POST["addl15f2"] == "y"){
    if(empty($_POST["l15f2name"])){
        $errors .= $missingfeaturename;
    }else{
        $l15f2name = filter_var($_POST["l15f2name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l15f2desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l15f2desc = $_POST["l15f2desc"];
        $l15f2desc = str_replace("'", "’", "$l15f2desc");
        $l15f2desc = str_replace('"', '“', "$l15f2desc");
        $l15f2desc = filter_var($l15f2desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l15f2limited"] == "y"){
        if(empty($_POST["l15f2uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l15f2uses = $_POST["l15f2uses"];
        }
        if(empty($_POST["l15f2rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l15f2rep = $_POST["l15f2rep"];
        }
    }
}

if($_POST["addl15f3"] == "y"){
    if(empty($_POST["l15f3name"])){
        $errors .= $missingfeaturename;
    }else{
        $l15f3name = filter_var($_POST["l15f3name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l15f3desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l15f3desc = $_POST["l15f3desc"];
        $l15f3desc = str_replace("'", "’", "$l15f3desc");
        $l15f3desc = str_replace('"', '“', "$l15f3desc");
        $l15f3desc = filter_var($l15f3desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l15f3limited"] == "y"){
        if(empty($_POST["l15f3uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l15f3uses = $_POST["l15f3uses"];
        }
        if(empty($_POST["l15f3rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l15f3rep = $_POST["l15f3rep"];
        }
    }
}

if($_POST["addl15f4"] == "y"){
    if(empty($_POST["l15f4name"])){
        $errors .= $missingfeaturename;
    }else{
        $l15f4name = filter_var($_POST["l15f4name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l15f4desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l15f4desc = $_POST["l15f4desc"];
        $l15f4desc = str_replace("'", "’", "$l15f4desc");
        $l15f4desc = str_replace('"', '“', "$l15f4desc");
        $l15f4desc = filter_var($l15f4desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l15f4limited"] == "y"){
        if(empty($_POST["l15f4uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l15f4uses = $_POST["l15f4uses"];
        }
        if(empty($_POST["l15f4rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l15f4rep = $_POST["l15f4rep"];
        }
    }
}

if($_POST["addl16f1"] == "y"){
    if(empty($_POST["l16f1name"])){
        $errors .= $missingfeaturename;
    }else{
        $l16f1name = filter_var($_POST["l16f1name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l16f1desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l16f1desc = $_POST["l16f1desc"];
        $l16f1desc = str_replace("'", "’", "$l16f1desc");
        $l16f1desc = str_replace('"', '“', "$l16f1desc");
        $l16f1desc = filter_var($l16f1desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l16f1limited"] == "y"){
        if(empty($_POST["l16f1uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l16f1uses = $_POST["l16f1uses"];
        }
        if(empty($_POST["l16f1rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l16f1rep = $_POST["l16f1rep"];
        }
    }
}
    
if($_POST["addl16f2"] == "y"){
    if(empty($_POST["l16f2name"])){
        $errors .= $missingfeaturename;
    }else{
        $l16f2name = filter_var($_POST["l16f2name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l16f2desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l16f2desc = $_POST["l16f2desc"];
        $l16f2desc = str_replace("'", "’", "$l16f2desc");
        $l16f2desc = str_replace('"', '“', "$l16f2desc");
        $l16f2desc = filter_var($l16f2desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l16f2limited"] == "y"){
        if(empty($_POST["l16f2uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l16f2uses = $_POST["l16f2uses"];
        }
        if(empty($_POST["l16f2rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l16f2rep = $_POST["l16f2rep"];
        }
    }
}

if($_POST["addl16f3"] == "y"){
    if(empty($_POST["l16f3name"])){
        $errors .= $missingfeaturename;
    }else{
        $l16f3name = filter_var($_POST["l16f3name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l16f3desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l16f3desc = $_POST["l16f3desc"];
        $l16f3desc = str_replace("'", "’", "$l16f3desc");
        $l16f3desc = str_replace('"', '“', "$l16f3desc");
        $l16f3desc = filter_var($l16f3desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l16f3limited"] == "y"){
        if(empty($_POST["l16f3uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l16f3uses = $_POST["l16f3uses"];
        }
        if(empty($_POST["l16f3rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l16f3rep = $_POST["l16f3rep"];
        }
    }
}

if($_POST["addl16f4"] == "y"){
    if(empty($_POST["l16f4name"])){
        $errors .= $missingfeaturename;
    }else{
        $l16f4name = filter_var($_POST["l16f4name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l16f4desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l16f4desc = $_POST["l16f4desc"];
        $l16f4desc = str_replace("'", "’", "$l16f4desc");
        $l16f4desc = str_replace('"', '“', "$l16f4desc");
        $l16f4desc = filter_var($l16f4desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l16f4limited"] == "y"){
        if(empty($_POST["l16f4uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l16f4uses = $_POST["l16f4uses"];
        }
        if(empty($_POST["l16f4rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l16f4rep = $_POST["l16f4rep"];
        }
    }
}

if($_POST["addl17f1"] == "y"){
    if(empty($_POST["l17f1name"])){
        $errors .= $missingfeaturename;
    }else{
        $l17f1name = filter_var($_POST["l17f1name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l17f1desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l17f1desc = $_POST["l17f1desc"];
        $l17f1desc = str_replace("'", "’", "$l17f1desc");
        $l17f1desc = str_replace('"', '“', "$l17f1desc");
        $l17f1desc = filter_var($l17f1desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l17f1limited"] == "y"){
        if(empty($_POST["l17f1uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l17f1uses = $_POST["l17f1uses"];
        }
        if(empty($_POST["l17f1rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l17f1rep = $_POST["l17f1rep"];
        }
    }
}
    
if($_POST["addl17f2"] == "y"){
    if(empty($_POST["l17f2name"])){
        $errors .= $missingfeaturename;
    }else{
        $l17f2name = filter_var($_POST["l17f2name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l17f2desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l17f2desc = $_POST["l17f2desc"];
        $l17f2desc = str_replace("'", "’", "$l17f2desc");
        $l17f2desc = str_replace('"', '“', "$l17f2desc");
        $l17f2desc = filter_var($l17f2desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l17f2limited"] == "y"){
        if(empty($_POST["l17f2uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l17f2uses = $_POST["l17f2uses"];
        }
        if(empty($_POST["l17f2rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l17f2rep = $_POST["l17f2rep"];
        }
    }
}

if($_POST["addl17f3"] == "y"){
    if(empty($_POST["l17f3name"])){
        $errors .= $missingfeaturename;
    }else{
        $l17f3name = filter_var($_POST["l17f3name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l17f3desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l17f3desc = $_POST["l17f3desc"];
        $l17f3desc = str_replace("'", "’", "$l17f3desc");
        $l17f3desc = str_replace('"', '“', "$l17f3desc");
        $l17f3desc = filter_var($l17f3desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l17f3limited"] == "y"){
        if(empty($_POST["l17f3uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l17f3uses = $_POST["l17f3uses"];
        }
        if(empty($_POST["l17f3rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l17f3rep = $_POST["l17f3rep"];
        }
    }
}

if($_POST["addl17f4"] == "y"){
    if(empty($_POST["l17f4name"])){
        $errors .= $missingfeaturename;
    }else{
        $l17f4name = filter_var($_POST["l17f4name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l17f4desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l17f4desc = $_POST["l17f4desc"];
        $l17f4desc = str_replace("'", "’", "$l17f4desc");
        $l17f4desc = str_replace('"', '“', "$l17f4desc");
        $l17f4desc = filter_var($l17f4desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l17f4limited"] == "y"){
        if(empty($_POST["l17f4uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l17f4uses = $_POST["l17f4uses"];
        }
        if(empty($_POST["l17f4rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l17f4rep = $_POST["l17f4rep"];
        }
    }
}

if($_POST["addl18f1"] == "y"){
    if(empty($_POST["l18f1name"])){
        $errors .= $missingfeaturename;
    }else{
        $l18f1name = filter_var($_POST["l18f1name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l18f1desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l18f1desc = $_POST["l18f1desc"];
        $l18f1desc = str_replace("'", "’", "$l18f1desc");
        $l18f1desc = str_replace('"', '“', "$l18f1desc");
        $l18f1desc = filter_var($l18f1desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l18f1limited"] == "y"){
        if(empty($_POST["l18f1uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l18f1uses = $_POST["l18f1uses"];
        }
        if(empty($_POST["l18f1rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l18f1rep = $_POST["l18f1rep"];
        }
    }
}
    
if($_POST["addl18f2"] == "y"){
    if(empty($_POST["l18f2name"])){
        $errors .= $missingfeaturename;
    }else{
        $l18f2name = filter_var($_POST["l18f2name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l18f2desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l18f2desc = $_POST["l18f2desc"];
        $l18f2desc = str_replace("'", "’", "$l18f2desc");
        $l18f2desc = str_replace('"', '“', "$l18f2desc");
        $l18f2desc = filter_var($l18f2desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l18f2limited"] == "y"){
        if(empty($_POST["l18f2uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l18f2uses = $_POST["l18f2uses"];
        }
        if(empty($_POST["l18f2rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l18f2rep = $_POST["l18f2rep"];
        }
    }
}

if($_POST["addl18f3"] == "y"){
    if(empty($_POST["l18f3name"])){
        $errors .= $missingfeaturename;
    }else{
        $l18f3name = filter_var($_POST["l18f3name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l18f3desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l18f3desc = $_POST["l18f3desc"];
        $l18f3desc = str_replace("'", "’", "$l18f3desc");
        $l18f3desc = str_replace('"', '“', "$l18f3desc");
        $l18f3desc = filter_var($l18f3desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l18f3limited"] == "y"){
        if(empty($_POST["l18f3uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l18f3uses = $_POST["l18f3uses"];
        }
        if(empty($_POST["l18f3rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l18f3rep = $_POST["l18f3rep"];
        }
    }
}

if($_POST["addl18f4"] == "y"){
    if(empty($_POST["l18f4name"])){
        $errors .= $missingfeaturename;
    }else{
        $l18f4name = filter_var($_POST["l18f4name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l18f4desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l18f4desc = $_POST["l18f4desc"];
        $l18f4desc = str_replace("'", "’", "$l18f4desc");
        $l18f4desc = str_replace('"', '“', "$l18f4desc");
        $l18f4desc = filter_var($l18f4desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l18f4limited"] == "y"){
        if(empty($_POST["l18f4uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l18f4uses = $_POST["l18f4uses"];
        }
        if(empty($_POST["l18f4rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l18f4rep = $_POST["l18f4rep"];
        }
    }
}

if($_POST["addl19f1"] == "y"){
    if(empty($_POST["l19f1name"])){
        $errors .= $missingfeaturename;
    }else{
        $l19f1name = filter_var($_POST["l19f1name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l19f1desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l19f1desc = $_POST["l19f1desc"];
        $l19f1desc = str_replace("'", "’", "$l19f1desc");
        $l19f1desc = str_replace('"', '“', "$l19f1desc");
        $l19f1desc = filter_var($l19f1desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l19f1limited"] == "y"){
        if(empty($_POST["l19f1uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l19f1uses = $_POST["l19f1uses"];
        }
        if(empty($_POST["l19f1rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l19f1rep = $_POST["l19f1rep"];
        }
    }
}
    
if($_POST["addl19f2"] == "y"){
    if(empty($_POST["l19f2name"])){
        $errors .= $missingfeaturename;
    }else{
        $l19f2name = filter_var($_POST["l19f2name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l19f2desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l19f2desc = $_POST["l19f2desc"];
        $l19f2desc = str_replace("'", "’", "$l19f2desc");
        $l19f2desc = str_replace('"', '“', "$l19f2desc");
        $l19f2desc = filter_var($l19f2desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l19f2limited"] == "y"){
        if(empty($_POST["l19f2uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l19f2uses = $_POST["l19f2uses"];
        }
        if(empty($_POST["l19f2rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l19f2rep = $_POST["l19f2rep"];
        }
    }
}

if($_POST["addl19f3"] == "y"){
    if(empty($_POST["l19f3name"])){
        $errors .= $missingfeaturename;
    }else{
        $l19f3name = filter_var($_POST["l19f3name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l19f3desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l19f3desc = $_POST["l19f3desc"];
        $l19f3desc = str_replace("'", "’", "$l19f3desc");
        $l19f3desc = str_replace('"', '“', "$l19f3desc");
        $l19f3desc = filter_var($l19f3desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l19f3limited"] == "y"){
        if(empty($_POST["l19f3uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l19f3uses = $_POST["l19f3uses"];
        }
        if(empty($_POST["l19f3rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l19f3rep = $_POST["l19f3rep"];
        }
    }
}

if($_POST["addl19f4"] == "y"){
    if(empty($_POST["l19f4name"])){
        $errors .= $missingfeaturename;
    }else{
        $l19f4name = filter_var($_POST["l19f4name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l19f4desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l19f4desc = $_POST["l19f4desc"];
        $l19f4desc = str_replace("'", "’", "$l19f4desc");
        $l19f4desc = str_replace('"', '“', "$l19f4desc");
        $l19f4desc = filter_var($l19f4desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l19f4limited"] == "y"){
        if(empty($_POST["l19f4uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l19f4uses = $_POST["l19f4uses"];
        }
        if(empty($_POST["l19f4rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l19f4rep = $_POST["l19f4rep"];
        }
    }
}

if($_POST["addl20f1"] == "y"){
    if(empty($_POST["l20f1name"])){
        $errors .= $missingfeaturename;
    }else{
        $l20f1name = filter_var($_POST["l20f1name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l20f1desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l20f1desc = $_POST["l20f1desc"];
        $l20f1desc = str_replace("'", "’", "$l20f1desc");
        $l20f1desc = str_replace('"', '“', "$l20f1desc");
        $l20f1desc = filter_var($l20f1desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l20f1limited"] == "y"){
        if(empty($_POST["l20f1uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l20f1uses = $_POST["l20f1uses"];
        }
        if(empty($_POST["l20f1rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l20f1rep = $_POST["l20f1rep"];
        }
    }
}
    
if($_POST["addl20f2"] == "y"){
    if(empty($_POST["l20f2name"])){
        $errors .= $missingfeaturename;
    }else{
        $l20f2name = filter_var($_POST["l20f2name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l20f2desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l20f2desc = $_POST["l20f2desc"];
        $l20f2desc = str_replace("'", "’", "$l20f2desc");
        $l20f2desc = str_replace('"', '“', "$l20f2desc");
        $l20f2desc = filter_var($l20f2desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l20f2limited"] == "y"){
        if(empty($_POST["l20f2uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l20f2uses = $_POST["l20f2uses"];
        }
        if(empty($_POST["l20f2rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l20f2rep = $_POST["l20f2rep"];
        }
    }
}

if($_POST["addl20f3"] == "y"){
    if(empty($_POST["l20f3name"])){
        $errors .= $missingfeaturename;
    }else{
        $l20f3name = filter_var($_POST["l20f3name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l20f3desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l20f3desc = $_POST["l20f3desc"];
        $l20f3desc = str_replace("'", "’", "$l20f3desc");
        $l20f3desc = str_replace('"', '“', "$l20f3desc");
        $l20f3desc = filter_var($l20f3desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l20f3limited"] == "y"){
        if(empty($_POST["l20f3uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l20f3uses = $_POST["l20f3uses"];
        }
        if(empty($_POST["l20f3rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l20f3rep = $_POST["l20f3rep"];
        }
    }
}

if($_POST["addl20f4"] == "y"){
    if(empty($_POST["l20f4name"])){
        $errors .= $missingfeaturename;
    }else{
        $l20f4name = filter_var($_POST["l20f4name"], FILTER_SANITIZE_STRING);
    }
    if(empty($_POST["l20f4desc"])){
        $errors .= $missingfeaturedesc;
    }else{
        $l20f4desc = $_POST["l20f4desc"];
        $l20f4desc = str_replace("'", "’", "$l20f4desc");
        $l20f4desc = str_replace('"', '“', "$l20f4desc");
        $l20f4desc = filter_var($l20f4desc, FILTER_SANITIZE_STRING);
    }
    if($_POST["l20f4limited"] == "y"){
        if(empty($_POST["l20f4uses"])){
            $errors .= $missingFeatUses;
        }else{
            $l20f4uses = $_POST["l20f4uses"];
        }
        if(empty($_POST["l20f4rep"])){
            $errors .= $missingSpellLevel;
        }else{
            $l20f4rep = $_POST["l20f4rep"];
        }
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
if(!empty($toolprofarray)){
    foreach($toolprofarray as $value){
        array_push($profArray, $value);
    }
}

//var_dump($profArray);

$classname = mysqli_real_escape_string($link, $classname);
$baseclassname = mysqli_real_escape_string($link, $baseclassname);
$classdescription = mysqli_real_escape_string($link, $classdescription);
$l1f1name = mysqli_real_escape_string($link, $l1f1name);
$l1f1desc = mysqli_real_escape_string($link, $l1f1desc);
$l1f2name = mysqli_real_escape_string($link, $l1f2name);
$l1f2desc = mysqli_real_escape_string($link, $l1f2desc);
$l1f3name = mysqli_real_escape_string($link, $l1f3name);
$l1f3desc = mysqli_real_escape_string($link, $l1f3desc);
$l1f4name = mysqli_real_escape_string($link, $l1f4name);
$l1f4desc = mysqli_real_escape_string($link, $l1f4desc);
$l2f1name = mysqli_real_escape_string($link, $l2f1name);
$l2f1desc = mysqli_real_escape_string($link, $l2f1desc);
$l2f2name = mysqli_real_escape_string($link, $l2f2name);
$l2f2desc = mysqli_real_escape_string($link, $l2f2desc);
$l2f3name = mysqli_real_escape_string($link, $l2f3name);
$l2f3desc = mysqli_real_escape_string($link, $l2f3desc);
$l2f4name = mysqli_real_escape_string($link, $l2f4name);
$l2f4desc = mysqli_real_escape_string($link, $l2f4desc);
$l3f1name = mysqli_real_escape_string($link, $l3f1name);
$l3f1desc = mysqli_real_escape_string($link, $l3f1desc);
$l3f2name = mysqli_real_escape_string($link, $l3f2name);
$l3f2desc = mysqli_real_escape_string($link, $l3f2desc);
$l3f3name = mysqli_real_escape_string($link, $l3f3name);
$l3f3desc = mysqli_real_escape_string($link, $l3f3desc);
$l3f4name = mysqli_real_escape_string($link, $l3f4name);
$l3f4desc = mysqli_real_escape_string($link, $l3f4desc);
$l4f1name = mysqli_real_escape_string($link, $l4f1name);
$l4f1desc = mysqli_real_escape_string($link, $l4f1desc);
$l4f2name = mysqli_real_escape_string($link, $l4f2name);
$l4f2desc = mysqli_real_escape_string($link, $l4f2desc);
$l4f3name = mysqli_real_escape_string($link, $l4f3name);
$l4f3desc = mysqli_real_escape_string($link, $l4f3desc);
$l4f4name = mysqli_real_escape_string($link, $l4f4name);
$l4f4desc = mysqli_real_escape_string($link, $l4f4desc);
$l5f1name = mysqli_real_escape_string($link, $l5f1name);
$l5f1desc = mysqli_real_escape_string($link, $l5f1desc);
$l5f2name = mysqli_real_escape_string($link, $l5f2name);
$l5f2desc = mysqli_real_escape_string($link, $l5f2desc);
$l5f3name = mysqli_real_escape_string($link, $l5f3name);
$l5f3desc = mysqli_real_escape_string($link, $l5f3desc);
$l5f4name = mysqli_real_escape_string($link, $l5f4name);
$l5f4desc = mysqli_real_escape_string($link, $l5f4desc);
$l6f1name = mysqli_real_escape_string($link, $l6f1name);
$l6f1desc = mysqli_real_escape_string($link, $l6f1desc);
$l6f2name = mysqli_real_escape_string($link, $l6f2name);
$l6f2desc = mysqli_real_escape_string($link, $l6f2desc);
$l6f3name = mysqli_real_escape_string($link, $l6f3name);
$l6f3desc = mysqli_real_escape_string($link, $l6f3desc);
$l6f4name = mysqli_real_escape_string($link, $l6f4name);
$l6f4desc = mysqli_real_escape_string($link, $l6f4desc);
$l7f1name = mysqli_real_escape_string($link, $l7f1name);
$l7f1desc = mysqli_real_escape_string($link, $l7f1desc);
$l7f2name = mysqli_real_escape_string($link, $l7f2name);
$l7f2desc = mysqli_real_escape_string($link, $l7f2desc);
$l7f3name = mysqli_real_escape_string($link, $l7f3name);
$l7f3desc = mysqli_real_escape_string($link, $l7f3desc);
$l7f4name = mysqli_real_escape_string($link, $l7f4name);
$l7f4desc = mysqli_real_escape_string($link, $l7f4desc);
$l8f1name = mysqli_real_escape_string($link, $l8f1name);
$l8f1desc = mysqli_real_escape_string($link, $l8f1desc);
$l8f2name = mysqli_real_escape_string($link, $l8f2name);
$l8f2desc = mysqli_real_escape_string($link, $l8f2desc);
$l8f3name = mysqli_real_escape_string($link, $l8f3name);
$l8f3desc = mysqli_real_escape_string($link, $l8f3desc);
$l8f4name = mysqli_real_escape_string($link, $l8f4name);
$l8f4desc = mysqli_real_escape_string($link, $l8f4desc);
$l9f1name = mysqli_real_escape_string($link, $l9f1name);
$l9f1desc = mysqli_real_escape_string($link, $l9f1desc);
$l9f2name = mysqli_real_escape_string($link, $l9f2name);
$l9f2desc = mysqli_real_escape_string($link, $l9f2desc);
$l9f3name = mysqli_real_escape_string($link, $l9f3name);
$l9f3desc = mysqli_real_escape_string($link, $l9f3desc);
$l9f4name = mysqli_real_escape_string($link, $l9f4name);
$l9f4desc = mysqli_real_escape_string($link, $l9f4desc);
$l10f1name = mysqli_real_escape_string($link, $l10f1name);
$l10f1desc = mysqli_real_escape_string($link, $l10f1desc);
$l10f2name = mysqli_real_escape_string($link, $l10f2name);
$l10f2desc = mysqli_real_escape_string($link, $l10f2desc);
$l10f3name = mysqli_real_escape_string($link, $l10f3name);
$l10f3desc = mysqli_real_escape_string($link, $l10f3desc);
$l10f4name = mysqli_real_escape_string($link, $l10f4name);
$l10f4desc = mysqli_real_escape_string($link, $l10f4desc);
$l11f1name = mysqli_real_escape_string($link, $l11f1name);
$l11f1desc = mysqli_real_escape_string($link, $l11f1desc);
$l11f2name = mysqli_real_escape_string($link, $l11f2name);
$l11f2desc = mysqli_real_escape_string($link, $l11f2desc);
$l11f3name = mysqli_real_escape_string($link, $l11f3name);
$l11f3desc = mysqli_real_escape_string($link, $l11f3desc);
$l11f4name = mysqli_real_escape_string($link, $l11f4name);
$l11f4desc = mysqli_real_escape_string($link, $l11f4desc);
$l12f1name = mysqli_real_escape_string($link, $l12f1name);
$l12f1desc = mysqli_real_escape_string($link, $l12f1desc);
$l12f2name = mysqli_real_escape_string($link, $l12f2name);
$l12f2desc = mysqli_real_escape_string($link, $l12f2desc);
$l12f3name = mysqli_real_escape_string($link, $l12f3name);
$l12f3desc = mysqli_real_escape_string($link, $l12f3desc);
$l12f4name = mysqli_real_escape_string($link, $l12f4name);
$l12f4desc = mysqli_real_escape_string($link, $l12f4desc);
$l13f1name = mysqli_real_escape_string($link, $l13f1name);
$l13f1desc = mysqli_real_escape_string($link, $l13f1desc);
$l13f2name = mysqli_real_escape_string($link, $l13f2name);
$l13f2desc = mysqli_real_escape_string($link, $l13f2desc);
$l13f3name = mysqli_real_escape_string($link, $l13f3name);
$l13f3desc = mysqli_real_escape_string($link, $l13f3desc);
$l13f4name = mysqli_real_escape_string($link, $l13f4name);
$l13f4desc = mysqli_real_escape_string($link, $l13f4desc);
$l14f1name = mysqli_real_escape_string($link, $l14f1name);
$l14f1desc = mysqli_real_escape_string($link, $l14f1desc);
$l14f2name = mysqli_real_escape_string($link, $l14f2name);
$l14f2desc = mysqli_real_escape_string($link, $l14f2desc);
$l14f3name = mysqli_real_escape_string($link, $l14f3name);
$l14f3desc = mysqli_real_escape_string($link, $l14f3desc);
$l14f4name = mysqli_real_escape_string($link, $l14f4name);
$l14f4desc = mysqli_real_escape_string($link, $l14f4desc);
$l15f1name = mysqli_real_escape_string($link, $l15f1name);
$l15f1desc = mysqli_real_escape_string($link, $l15f1desc);
$l15f2name = mysqli_real_escape_string($link, $l15f2name);
$l15f2desc = mysqli_real_escape_string($link, $l15f2desc);
$l15f3name = mysqli_real_escape_string($link, $l15f3name);
$l15f3desc = mysqli_real_escape_string($link, $l15f3desc);
$l15f4name = mysqli_real_escape_string($link, $l15f4name);
$l15f4desc = mysqli_real_escape_string($link, $l15f4desc);
$l16f1name = mysqli_real_escape_string($link, $l16f1name);
$l16f1desc = mysqli_real_escape_string($link, $l16f1desc);
$l16f2name = mysqli_real_escape_string($link, $l16f2name);
$l16f2desc = mysqli_real_escape_string($link, $l16f2desc);
$l16f3name = mysqli_real_escape_string($link, $l16f3name);
$l16f3desc = mysqli_real_escape_string($link, $l16f3desc);
$l16f4name = mysqli_real_escape_string($link, $l16f4name);
$l16f4desc = mysqli_real_escape_string($link, $l16f4desc);
$l17f1name = mysqli_real_escape_string($link, $l17f1name);
$l17f1desc = mysqli_real_escape_string($link, $l17f1desc);
$l17f2name = mysqli_real_escape_string($link, $l17f2name);
$l17f2desc = mysqli_real_escape_string($link, $l17f2desc);
$l17f3name = mysqli_real_escape_string($link, $l17f3name);
$l17f3desc = mysqli_real_escape_string($link, $l17f3desc);
$l17f4name = mysqli_real_escape_string($link, $l17f4name);
$l17f4desc = mysqli_real_escape_string($link, $l17f4desc);
$l18f1name = mysqli_real_escape_string($link, $l18f1name);
$l18f1desc = mysqli_real_escape_string($link, $l18f1desc);
$l18f2name = mysqli_real_escape_string($link, $l18f2name);
$l18f2desc = mysqli_real_escape_string($link, $l18f2desc);
$l18f3name = mysqli_real_escape_string($link, $l18f3name);
$l18f3desc = mysqli_real_escape_string($link, $l18f3desc);
$l18f4name = mysqli_real_escape_string($link, $l18f4name);
$l18f4desc = mysqli_real_escape_string($link, $l18f4desc);
$l19f1name = mysqli_real_escape_string($link, $l19f1name);
$l19f1desc = mysqli_real_escape_string($link, $l19f1desc);
$l19f2name = mysqli_real_escape_string($link, $l19f2name);
$l19f2desc = mysqli_real_escape_string($link, $l19f2desc);
$l19f3name = mysqli_real_escape_string($link, $l19f3name);
$l19f3desc = mysqli_real_escape_string($link, $l19f3desc);
$l19f4name = mysqli_real_escape_string($link, $l19f4name);
$l19f4desc = mysqli_real_escape_string($link, $l19f4desc);
$l20f1name = mysqli_real_escape_string($link, $l20f1name);
$l20f1desc = mysqli_real_escape_string($link, $l20f1desc);
$l20f2name = mysqli_real_escape_string($link, $l20f2name);
$l20f2desc = mysqli_real_escape_string($link, $l20f2desc);
$l20f3name = mysqli_real_escape_string($link, $l20f3name);
$l20f3desc = mysqli_real_escape_string($link, $l20f3desc);
$l20f4name = mysqli_real_escape_string($link, $l20f4name);
$l20f4desc = mysqli_real_escape_string($link, $l20f4desc);



$sql = "INSERT INTO rpg_class_5e (`creator_id`, `sharing_cat`, `class_name`, `base_class_name`, `class_description`, `class_hp`, `caster_ability`, `caster_type`, `caster_spellslots`, `caster_spelllist`, `prof`, `prof1`, `prof2`, `prof3`, `prof4`, `prof5`, `prof6`, `prof7`, `prof8`, `prof9`, `prof10`, `prof11`, `prof12`, `prof13`, `prof14`, `prof15`, `prof16`, `prof17`, `prof18`, `prof19`, `prof20`, `num_skills`, `athletics`, `acrobatics`, `sleightofhand`, `stealth`, `arcana`, `history`, `investigation`, `nature`, `religion`, `animalhandling`, `insight`, `medicine`, `perception`, `survival`, `deception`, `intimidation`, `performance`, `persuasion`, `level1_feature1`, `level1_feature1_name`, `level1_feature1_uses`, `level1_feature1_replenish`, `level1_feature2`, `level1_feature2_name`, `level1_feature2_uses`, `level1_feature2_replenish`, `level1_feature3`, `level1_feature3_name`, `level1_feature3_uses`, `level1_feature3_replenish`, `level1_feature4`, `level1_feature4_name`, `level1_feature4_uses`, `level1_feature4_replenish`, `level2_feature1`, `level2_feature1_name`, `level2_feature1_uses`, `level2_feature1_replenish`, `level2_feature2`, `level2_feature2_name`, `level2_feature2_uses`, `level2_feature2_replenish`, `level2_feature3`, `level2_feature3_name`, `level2_feature3_uses`, `level2_feature3_replenish`, `level2_feature4`, `level2_feature4_name`, `level2_feature4_uses`, `level2_feature4_replenish`, `level3_feature1`, `level3_feature1_name`, `level3_feature1_uses`, `level3_feature1_replenish`, `level3_feature2`, `level3_feature2_name`, `level3_feature2_uses`, `level3_feature2_replenish`, `level3_feature3`, `level3_feature3_name`, `level3_feature3_uses`, `level3_feature3_replenish`, `level3_feature4`, `level3_feature4_name`, `level3_feature4_uses`, `level3_feature4_replenish`, `level4_feature1`, `level4_feature1_name`, `level4_feature1_uses`, `level4_feature1_replenish`, `level4_feature2`, `level4_feature2_name`, `level4_feature2_uses`, `level4_feature2_replenish`, `level4_feature3`, `level4_feature3_name`, `level4_feature3_uses`, `level4_feature3_replenish`, `level4_feature4`, `level4_feature4_name`, `level4_feature4_uses`, `level4_feature4_replenish`, `level5_feature1`, `level5_feature1_name`, `level5_feature1_uses`, `level5_feature1_replenish`, `level5_feature2`, `level5_feature2_name`, `level5_feature2_uses`, `level5_feature2_replenish`, `level5_feature3`, `level5_feature3_name`, `level5_feature3_uses`, `level5_feature3_replenish`, `level5_feature4`, `level5_feature4_name`, `level5_feature4_uses`, `level5_feature4_replenish`, `level6_feature1`, `level6_feature1_name`, `level6_feature1_uses`, `level6_feature1_replenish`, `level6_feature2`, `level6_feature2_name`, `level6_feature2_uses`, `level6_feature2_replenish`, `level6_feature3`, `level6_feature3_name`, `level6_feature3_uses`, `level6_feature3_replenish`, `level6_feature4`, `level6_feature4_name`, `level6_feature4_uses`, `level6_feature4_replenish`, `level7_feature1`, `level7_feature1_name`, `level7_feature1_uses`, `level7_feature1_replenish`, `level7_feature2`, `level7_feature2_name`, `level7_feature2_uses`, `level7_feature2_replenish`, `level7_feature3`, `level7_feature3_name`, `level7_feature3_uses`, `level7_feature3_replenish`, `level7_feature4`, `level7_feature4_name`, `level7_feature4_uses`, `level7_feature4_replenish`, `level8_feature1`, `level8_feature1_name`, `level8_feature1_uses`, `level8_feature1_replenish`, `level8_feature2`, `level8_feature2_name`, `level8_feature2_uses`, `level8_feature2_replenish`, `level8_feature3`, `level8_feature3_name`, `level8_feature3_uses`, `level8_feature3_replenish`, `level8_feature4`, `level8_feature4_name`, `level8_feature4_uses`, `level8_feature4_replenish`, `level9_feature1`, `level9_feature1_name`, `level9_feature1_uses`, `level9_feature1_replenish`, `level9_feature2`, `level9_feature2_name`, `level9_feature2_uses`, `level9_feature2_replenish`, `level9_feature3`, `level9_feature3_name`, `level9_feature3_uses`, `level9_feature3_replenish`, `level9_feature4`, `level9_feature4_name`, `level9_feature4_uses`, `level9_feature4_replenish`, `level10_feature1`, `level10_feature1_name`, `level10_feature1_uses`, `level10_feature1_replenish`, `level10_feature2`, `level10_feature2_name`, `level10_feature2_uses`, `level10_feature2_replenish`, `level10_feature3`, `level10_feature3_name`, `level10_feature3_uses`, `level10_feature3_replenish`, `level10_feature4`, `level10_feature4_name`, `level10_feature4_uses`, `level10_feature4_replenish`, `level11_feature1`, `level11_feature1_name`, `level11_feature1_uses`, `level11_feature1_replenish`, `level11_feature2`, `level11_feature2_name`, `level11_feature2_uses`, `level11_feature2_replenish`, `level11_feature3`, `level11_feature3_name`, `level11_feature3_uses`, `level11_feature3_replenish`, `level11_feature4`, `level11_feature4_name`, `level11_feature4_uses`, `level11_feature4_replenish`, `level12_feature1`, `level12_feature1_name`, `level12_feature1_uses`, `level12_feature1_replenish`, `level12_feature2`, `level12_feature2_name`, `level12_feature2_uses`, `level12_feature2_replenish`, `level12_feature3`, `level12_feature3_name`, `level12_feature3_uses`, `level12_feature3_replenish`, `level12_feature4`, `level12_feature4_name`, `level12_feature4_uses`, `level12_feature4_replenish`, `level13_feature1`, `level13_feature1_name`, `level13_feature1_uses`, `level13_feature1_replenish`, `level13_feature2`, `level13_feature2_name`, `level13_feature2_uses`, `level13_feature2_replenish`, `level13_feature3`, `level13_feature3_name`, `level13_feature3_uses`, `level13_feature3_replenish`, `level13_feature4`, `level13_feature4_name`, `level13_feature4_uses`, `level13_feature4_replenish`, `level14_feature1`, `level14_feature1_name`, `level14_feature1_uses`, `level14_feature1_replenish`, `level14_feature2`, `level14_feature2_name`, `level14_feature2_uses`, `level14_feature2_replenish`, `level14_feature3`, `level14_feature3_name`, `level14_feature3_uses`, `level14_feature3_replenish`, `level14_feature4`, `level14_feature4_name`, `level14_feature4_uses`, `level14_feature4_replenish`, `level15_feature1`, `level15_feature1_name`, `level15_feature1_uses`, `level15_feature1_replenish`, `level15_feature2`, `level15_feature2_name`, `level15_feature2_uses`, `level15_feature2_replenish`, `level15_feature3`, `level15_feature3_name`, `level15_feature3_uses`, `level15_feature3_replenish`, `level15_feature4`, `level15_feature4_name`, `level15_feature4_uses`, `level15_feature4_replenish`, `level16_feature1`, `level16_feature1_name`, `level16_feature1_uses`, `level16_feature1_replenish`, `level16_feature2`, `level16_feature2_name`, `level16_feature2_uses`, `level16_feature2_replenish`, `level16_feature3`, `level16_feature3_name`, `level16_feature3_uses`, `level16_feature3_replenish`, `level16_feature4`, `level16_feature4_name`, `level16_feature4_uses`, `level16_feature4_replenish`, `level17_feature1`, `level17_feature1_name`, `level17_feature1_uses`, `level17_feature1_replenish`, `level17_feature2`, `level17_feature2_name`, `level17_feature2_uses`, `level17_feature2_replenish`, `level17_feature3`, `level17_feature3_name`, `level17_feature3_uses`, `level17_feature3_replenish`, `level17_feature4`, `level17_feature4_name`, `level17_feature4_uses`, `level17_feature4_replenish`, `level18_feature1`, `level18_feature1_name`, `level18_feature1_uses`, `level18_feature1_replenish`, `level18_feature2`, `level18_feature2_name`, `level18_feature2_uses`, `level18_feature2_replenish`, `level18_feature3`, `level18_feature3_name`, `level18_feature3_uses`, `level18_feature3_replenish`, `level18_feature4`, `level18_feature4_name`, `level18_feature4_uses`, `level18_feature4_replenish`, `level19_feature1`, `level19_feature1_name`, `level19_feature1_uses`, `level19_feature1_replenish`, `level19_feature2`, `level19_feature2_name`, `level19_feature2_uses`, `level19_feature2_replenish`, `level19_feature3`, `level19_feature3_name`, `level19_feature3_uses`, `level19_feature3_replenish`, `level19_feature4`, `level19_feature4_name`, `level19_feature4_uses`, `level19_feature4_replenish`, `level20_feature1`, `level20_feature1_name`, `level20_feature1_uses`, `level20_feature1_replenish`, `level20_feature2`, `level20_feature2_name`, `level20_feature2_uses`, `level20_feature2_replenish`, `level20_feature3`, `level20_feature3_name`, `level20_feature3_uses`, `level20_feature3_replenish`, `level20_feature4`, `level20_feature4_name`, `level20_feature4_uses`, `level20_feature4_replenish`) VALUES ('$user_id', 'x', '$classname', '$baseclassname', '$classdescription', '$hitDie', '$castmod', '$casttype', '$spellslots', '$spelllist', '$profArray[0]', '$profArray[1]', '$profArray[2]', '$profArray[3]', '$profArray[4]', '$profArray[5]', '$profArray[6]', '$profArray[7]', '$profArray[8]', '$profArray[9]', '$profArray[10]', '$profArray[11]', '$profArray[12]', '$profArray[13]', '$profArray[14]', '$profArray[15]', '$profArray[16]', '$profArray[17]', '$profArray[18]', '$profArray[19]', '$profArray[20]', '$skillNum', '$athletics', '$acrobatics', '$sleightofhand', '$stealth', '$arcana', '$history', '$investigation', '$nature', '$religion', '$animalhandling', '$insight', '$medicine', '$perception', '$survival', '$deception', '$intimidation', '$performance', '$persuasion', '$l1f1desc', '$l1f1name', '$l1f1uses', '$l1f1rep', '$l1f2desc', '$l1f2name', '$l1f2uses', '$l1f2rep', '$l1f3desc', '$l1f3name', '$l1f3uses', '$l1f3rep', '$l1f4desc', '$l1f4name', '$l1f4uses', '$l1f4rep', '$l2f1desc', '$l2f1name', '$l2f1uses', '$l2f1rep', '$l2f2desc', '$l2f2name', '$l2f2uses', '$l2f2rep', '$l2f3desc', '$l2f3name', '$l2f3uses', '$l2f3rep', '$l2f4desc', '$l2f4name', '$l2f4uses', '$l2f4rep', '$l3f1desc', '$l3f1name', '$l3f1uses', '$l3f1rep', '$l3f2desc', '$l3f2name', '$l3f2uses', '$l3f2rep', '$l3f3desc', '$l3f3name', '$l3f3uses', '$l3f3rep', '$l3f4desc', '$l3f4name', '$l3f4uses', '$l3f4rep', '$l4f1desc', '$l4f1name', '$l4f1uses', '$l4f1rep', '$l4f2desc', '$l4f2name', '$l4f2uses', '$l4f2rep', '$l4f3desc', '$l4f3name', '$l4f3uses', '$l4f3rep', '$l4f4desc', '$l4f4name', '$l4f4uses', '$l4f4rep', '$l5f1desc', '$l5f1name', '$l5f1uses', '$l5f1rep', '$l5f2desc', '$l5f2name', '$l5f2uses', '$l5f2rep', '$l5f3desc', '$l5f3name', '$l5f3uses', '$l5f3rep', '$l5f4desc', '$l5f4name', '$l5f4uses', '$l5f4rep', '$l6f1desc', '$l6f1name', '$l6f1uses', '$l6f1rep', '$l6f2desc', '$l6f2name', '$l6f2uses', '$l6f2rep', '$l6f3desc', '$l6f3name', '$l6f3uses', '$l6f3rep', '$l6f4desc', '$l6f4name', '$l6f4uses', '$l6f4rep', '$l7f1desc', '$l7f1name', '$l7f1uses', '$l7f1rep', '$l7f2desc', '$l7f2name', '$l7f2uses', '$l7f2rep', '$l7f3desc', '$l7f3name', '$l7f3uses', '$l7f3rep', '$l7f4desc', '$l7f4name', '$l7f4uses', '$l7f4rep', '$l8f1desc', '$l8f1name', '$l8f1uses', '$l8f1rep', '$l8f2desc', '$l8f2name', '$l8f2uses', '$l8f2rep', '$l8f3desc', '$l8f3name', '$l8f3uses', '$l8f3rep', '$l8f4desc', '$l8f4name', '$l8f4uses', '$l8f4rep', '$l9f1desc', '$l9f1name', '$l9f1uses', '$l9f1rep', '$l9f2desc', '$l9f2name', '$l9f2uses', '$l9f2rep', '$l9f3desc', '$l9f3name', '$l9f3uses', '$l9f3rep', '$l9f4desc', '$l9f4name', '$l9f4uses', '$l9f4rep', '$l10f1desc', '$l10f1name', '$l10f1uses', '$l10f1rep', '$l10f2desc', '$l10f2name', '$l10f2uses', '$l10f2rep', '$l10f3desc', '$l10f3name', '$l10f3uses', '$l10f3rep', '$l10f4desc', '$l10f4name', '$l10f4uses', '$l10f4rep', '$l11f1desc', '$l11f1name', '$l11f1uses', '$l11f1rep', '$l11f2desc', '$l11f2name', '$l11f2uses', '$l11f2rep', '$l11f3desc', '$l11f3name', '$l11f3uses', '$l11f3rep', '$l11f4desc', '$l11f4name', '$l11f4uses', '$l11f4rep', '$l12f1desc', '$l12f1name', '$l12f1uses', '$l12f1rep', '$l12f2desc', '$l12f2name', '$l12f2uses', '$l12f2rep', '$l12f3desc', '$l12f3name', '$l12f3uses', '$l12f3rep', '$l12f4desc', '$l12f4name', '$l12f4uses', '$l12f4rep', '$l13f1desc', '$l13f1name', '$l13f1uses', '$l13f1rep', '$l13f2desc', '$l13f2name', '$l13f2uses', '$l13f2rep', '$l13f3desc', '$l13f3name', '$l13f3uses', '$l13f3rep', '$l13f4desc', '$l13f4name', '$l13f4uses', '$l13f4rep', '$l14f1desc', '$l14f1name', '$l14f1uses', '$l14f1rep', '$l14f2desc', '$l14f2name', '$l14f2uses', '$l14f2rep', '$l14f3desc', '$l14f3name', '$l14f3uses', '$l14f3rep', '$l14f4desc', '$l14f4name', '$l14f4uses', '$l14f4rep', '$l15f1desc', '$l15f1name', '$l15f1uses', '$l15f1rep', '$l15f2desc', '$l15f2name', '$l15f2uses', '$l15f2rep', '$l15f3desc', '$l15f3name', '$l15f3uses', '$l15f3rep', '$l15f4desc', '$l15f4name', '$l15f4uses', '$l15f4rep', '$l16f1desc', '$l16f1name', '$l16f1uses', '$l16f1rep', '$l16f2desc', '$l16f2name', '$l16f2uses', '$l16f2rep', '$l16f3desc', '$l16f3name', '$l16f3uses', '$l16f3rep', '$l16f4desc', '$l16f4name', '$l16f4uses', '$l16f4rep', '$l17f1desc', '$l17f1name', '$l17f1uses', '$l17f1rep', '$l17f2desc', '$l17f2name', '$l17f2uses', '$l17f2rep', '$l17f3desc', '$l17f3name', '$l17f3uses', '$l17f3rep', '$l17f4desc', '$l17f4name', '$l17f4uses', '$l17f4rep', '$l18f1desc', '$l18f1name', '$l18f1uses', '$l18f1rep', '$l18f2desc', '$l18f2name', '$l18f2uses', '$l18f2rep', '$l18f3desc', '$l18f3name', '$l18f3uses', '$l18f3rep', '$l18f4desc', '$l18f4name', '$l18f4uses', '$l18f4rep', '$l19f1desc', '$l19f1name', '$l19f1uses', '$l19f1rep', '$l19f2desc', '$l19f2name', '$l19f2uses', '$l19f2rep', '$l19f3desc', '$l19f3name', '$l19f3uses', '$l19f3rep', '$l19f4desc', '$l19f4name', '$l19f4uses', '$l19f4rep', '$l20f1desc', '$l20f1name', '$l20f1uses', '$l20f1rep', '$l20f2desc', '$l20f2name', '$l20f2uses', '$l20f2rep', '$l20f3desc', '$l20f3name', '$l20f3uses', '$l20f3rep', '$l20f4desc', '$l20f4name', '$l20f4uses', '$l20f4rep')";

echo $sql;

$result = mysqli_query($link, $sql);
if(!$result){
    echo '<div class="alert alert-danger">Error inserting class details into database</div>';
}else{
    echo 'success';
}








?>