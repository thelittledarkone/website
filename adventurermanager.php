<?php
session_start();
include('./php/connection.php');
//remember me
include('./php/rememberme.php');

$_SESSION['uri'] = $_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Adventure Manager - Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <meta name="description" content="#">
        <link rel="icon" href="#">
        <!-- Bootstrap & Fonts CSS -->
        <link rel="stylesheet" href="boot/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css2?family=Frijole&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Ceviche+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Waiting+for+the+Sunrise&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <!--        JQuery & Bootstrap JS Scripts-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<!--        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
        <script src="boot/js/bootstrap.min.js"></script>
<!--        JQuery UI-->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/eggplant/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<!--        Custom Styling-->
        <link rel="stylesheet" href="calendar/css/calendar.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/detectadventurestyle.css">
        <link rel="stylesheet" href="css/adventurermanagerstyle.css">
        
        
    </head>
    <body>
        <!--    Header-->
      <div class="jumbotron pageHeader" id="amPageHead">
        <div class="container headerContainer">
            <img src="css/images/pngfind.com-map-png-545029.png" class="logo">
            <h1>Adventure Manager</h1>  
        </div>
      </div>
<!--        Navigation-->
        <?php
        if(isset($_SESSION["user_id"])){
            include("navbarconnected.php");
            include("searchonly.php");
        }else{
            include("navbarnotconnected.php");
        }
        
        ?>
        
<!--        Main Content-->
        <div class="jumbotron" id="myContainer">
            <div id="tester"></div>
            <div id="intro" class="container-fluid">
                        <div class="carousel slide d-none d-md-block" id="myCarousel" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="myCarousel" data-slide-to="0" class="active"></li>
                                <li data-target="myCarousel" data-slide-to="1"></li>
                                <li data-target="myCarousel" data-slide-to="2"></li>
                                <li data-target="myCarousel" data-slide-to="3"></li>
                                <li data-target="myCarousel" data-slide-to="4"></li>
                                <li data-target="myCarousel" data-slide-to="5"></li>
                                <li data-target="myCarousel" data-slide-to="6"></li>
                                <li data-target="myCarousel" data-slide-to="7"></li>
                                <li data-target="myCarousel" data-slide-to="8"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="daicon" src="css/images/pngfind.com-map-png-545029.png">
                                    <h1>Welcome to <i class="tldoCarousel">thelittledarkone's</i> Adventurer Manager!</h1>
                                </div>
                                <div class="item">
                                    <img src="css/images/nearme.jpg">
                                    <h2>Create Parties for your RPG Campaign!</h2>
                                </div>
                                <div class="item">
                                    <img src="css/images/nearme.jpg">
                                    <h2>Make your own Characters and save them as Templates!</h2>
                                </div>
                                <div class="item">
                                    <img src="css/images/myevents.jpg">
                                    <h2>Choose from a Number of Games to Create Characters for!</h2>
                                </div>
                                <div class="item">
                                    <img class="daicon" src="css/images/pngfind.com-map-png-545029.png">
                                    <h1>Join Our Growing Community Now!</h1>
                                </div>
                                <div class="item">
                                    <img src="css/images/eventdetails.jpg">
                                    <h2>Manage your Characters as they Grow in Level!</h2>
                                </div>
                                <div class="item">
                                    <img class="daicon" src="css/images/pngfind.com-map-png-545029.png">
                                    <h1>Take Control of the Rules of your Campaign and Apply them to your Party!</h1>
                                </div>
                                <div class="item">
                                    <img src="css/images/nearme.jpg">
                                    <h2>Take Notes in your Journal and Save the Pages into a .pdf Document!</h2>
                                </div>
                                <div class="item">
                                    <img class="daicon" src="css/images/pngfind.com-map-png-545029.png">
                                    <h1>Get Started With <i>Adventurer Manager</i>!</h1>
                                </div>
                                <div class="item">
                                    <img src="css/images/eventdetails.jpg">
                                    <h2>Help us to Build your Local Board Game Community!</h2>
                                </div>
                            </div>
                            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>                
                        </div>
                    </div>
                    
            <?php
            if(!isset($_SESSION["user_id"])){
                echo "<button type='button' class='btn btn-lg btnColor btnSignup' data-target='#signupModal' data-toggle='modal'>Sign Up For Free!</button>";
            }else{
                echo ' 
                <div id="characterContainer">
                <div class="row">
                    <div class="col-xs-7 col-sm-offset-1 col-sm-5 centredCell">
                        <h2>My Characters and Parties</h2>
                    </div>
                </div>
                    <ul class="nav nav-pills pillsContainer eventPillsContainer navbar-center">
                          <li class="active"><a data-toggle="pill" href="#characters">My Characters</a></li>
                          <li><a data-toggle="pill" href="#parties">My Parties</a></li>
                          <li><a data-toggle="pill" href="#create">Create</a></li>
                        </ul>
                        <div class="tab-content">
                          <div id="characters" class="tab-pane fade active in">
                            <div class="container" id="myCharacterContainer">
                                <div id="alert" class="alert alert-danger collapse">
                                    <a class="close" data-dismiss="alert">&times;</a>
                                    <p id="alertContentNear"></p>
                                </div>
                                <div class="row eventContainerTitles">
                                    <div class="col-sm-6">
                                        <h2 class="searchTitle">My Characters:</h2>
                                    </div>
                                    <div class="col-sm-offset-1 col-sm-5">
                                        <div class="buttons inlineButtons pull-right">
                                            <button type="button" id="createCharacterBtn" class="btn btn-lg btnDone" data-toggle="modal" data-target="#createCharacterModal">Create Character</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div id="myCharacters" class="events">
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                            <div id="parties" class="tab-pane fade">
                              <div class="container" id="myPartiesContainer">
                                <div id="alert" class="alert alert-danger collapse">
                                    <a class="close" data-dismiss="alert">&times;</a>
                                    <p id="alertContent"></p>
                                </div>
                                <div class="row eventContainerTitles">
                                    <div class="col-sm-6">
                                        <h2>My Parties:</h2>
                                    </div>
                                    <div class="col-sm-offset-1 col-sm-5">
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div id="myParties" class="events">
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                            <div id="create" class="tab-pane fade">
                              <div class="container" id="createButtonContainer">
                                <div id="alert" class="alert alert-danger collapse">
                                    <a class="close" data-dismiss="alert">&times;</a>
                                    <p id="alertContent"></p>
                                </div>
                                <div class="row eventContainerTitles">
                                    <div class="col-sm-6">
                                        <h2>Create Something:</h2>
                                    </div>
                                    <div class="col-sm-offset-1 col-sm-5">
                                        
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="button" id="createClassBtn" class="btn btn-lg btnDone" data-toggle="modal" data-target="#createClassModal">Create Class</button>
                                        <button type="button" id="createRaceBtn" class="btn btn-lg btnDone" data-toggle="modal" data-target="#createRaceModal">Create Race</button>
                                        <button type="button" id="createBackgroundBtn" class="btn btn-lg btnDone" data-toggle="modal" data-target="#createBackgroundModal">Create Background</button>
                                        <button type="button" id="createItemBtn" class="btn btn-lg btnDone" data-toggle="modal" data-target="#createItemModal">Create Item</button>
                                        <button type="button" id="createSpellBtn" class="btn btn-lg btnDone" data-toggle="modal" data-target="#createSpellModal">Create Spell</button>
                                        <button type="button" id="createFeatBtn" class="btn btn-lg btnDone" data-toggle="modal" data-target="#createFeatModal">Create Feat</button>
                                    </div>
                                </div>
                            </div>
                          </div>
                          </ul>
                    
                </div>
                
                ';
            }
            ?>
        </div>
        
<!--    Signup Button-->
      <div class="signup">
      <?php
            if(!isset($_SESSION["user_id"])){
                echo "<button type='button' class='btn btn-lg btnColor btnSignup' data-target='#signupModal' data-toggle='modal'>Sign Up For Free!</button>";
                include("signupmodals.php");
            }
            ?>
      </div>
      

       <!-- Create Character Modal -->
       <form method="post" id="createCharacterForm"> 
            <div class="modal fade modalMulti" id="createCharacterModal" tabindex="-1" role="dialog" aria-labelledby="createCharacterLabel">
              <div class="modal-dialog" role="document">

                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="createCharacterLabel">Create a Character</h4>
                      <div id="createCharacterMessage"></div>

                  </div>

                  <div class="modal-body">

                    <div class="modal-split">
                    <h2>Character Basics</h2>
                        <div class="form-group">
                            <label for="charactername" class="sr-only">Character Name</label>
                            <input class="form-control" type="text" id="charactername" name="charactername" placeholder="Character Name" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="race" id="raceLabel">Race:</label>
                            <select name="race" id="race" class="form-control">
                                <option value="" selected>Choose a Race</option>
                                <option value="1">Dragonborn</option>
                                <option disabled>Dwarf</option>
                                <option value="2">&nbsp;&nbsp;&nbsp;&nbsp;Hill Dwarf</option>
                                <option disabled>Elf</option>
                                <option value="3">&nbsp;&nbsp;&nbsp;&nbsp;High Elf</option>
                                <option disabled>Gnome</option>
                                <option value="4">&nbsp;&nbsp;&nbsp;&nbsp;Rock Gnome</option>
                                <option disabled>Halfling</option>
                                <option value="7">&nbsp;&nbsp;&nbsp;&nbsp;Lightfoot</option>
                                <option value="5">Half-Elf</option>
                                <option value="6">Half-Orc</option>
                                <option value="8">Human</option>
                                <option value="9">Tiefling</option>
                                
                                <option value="h">Public Homebrew</option>         
                                <option value="x">My Homebrew</option>         
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="class" id="classLabel">Class:</label>
                            <select name="class" id="class" class="form-control">
                                <option value="" selected>Choose a Class</option>
                                <option disabled>Barbarian</option>
                                <option value="1">&nbsp;&nbsp;&nbsp;&nbsp;Berserker</option>
                                <option disabled>Bard</option>
                                <option value="2">&nbsp;&nbsp;&nbsp;&nbsp;Lore</option>
                                <option disabled>Cleric</option>
                                <option value="3">&nbsp;&nbsp;&nbsp;&nbsp;Life</option>
                                <option disabled>Druid</option>
                                <option value="4">&nbsp;&nbsp;&nbsp;&nbsp;Land</option>
                                <option disabled>Fighter</option>
                                <option value="4">&nbsp;&nbsp;&nbsp;&nbsp;Champion</option>
                                <option disabled>Monk</option>
                                <option value="4">&nbsp;&nbsp;&nbsp;&nbsp;Open Hand</option>
                                <option disabled>Paladin</option>
                                <option value="4">&nbsp;&nbsp;&nbsp;&nbsp;Devotion</option>
                                <option disabled>Ranger</option>
                                <option value="4">&nbsp;&nbsp;&nbsp;&nbsp;Hunter</option>
                                <option disabled>Rogue</option>
                                <option value="4">&nbsp;&nbsp;&nbsp;&nbsp;Thief</option>
                                <option disabled>Sorcerer</option>
                                <option value="4">&nbsp;&nbsp;&nbsp;&nbsp;Draconic</option>
                                <option disabled>Warlock</option>
                                <option value="4">&nbsp;&nbsp;&nbsp;&nbsp;Fiend</option>
                                <option disabled>Wizard</option>
                                <option value="4">&nbsp;&nbsp;&nbsp;&nbsp;Evocation</option>
                                
                                <option value="h">Public Homebrew</option>         
                                <option value="x">My Homebrew</option>         
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="height" class="sr-only">Height</label>
                            <input class="form-control" type="text" id="height" name="height" placeholder="Height" maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="weight" class="sr-only">Weight</label>
                            <input class="form-control" type="text" id="weight" name="weight" placeholder="Weight" maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="age" class="sr-only">Age</label>
                            <input class="form-control" type="text" id="age" name="age" placeholder="Age" maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="eyes" class="sr-only">Eyes</label>
                            <input class="form-control" type="text" id="eyes" name="eyes" placeholder="Eye Colour" maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="skin" class="sr-only">Skin</label>
                            <input class="form-control" type="text" id="skin" name="skin" placeholder="Skin Colour" maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="hair" class="sr-only">Hair</label>
                            <input class="form-control" type="text" id="hair" name="hair" placeholder="Hair Colour" maxlength="10">
                        </div>
                        <div class="form-group">
                            <label for="distinguishingfeatures">Distinguishing Features: </label>
                            <textarea name="distinguishingfeatures" class="form-control" id="distinguishingfeatures" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="modal-split">
                    <h2>Character Background</h2>
                        <div class="form-group">
                            <label for="background" id="backgroundLabel">Background:</label>
                            <select name="background" id="background" class="form-control">
                                <option value="" selected>Choose a Background</option>
                                <option value="1">Acolyte</option>
                                                                
                                <option value="h">Public Homebrew</option>         
                                <option value="x">My Homebrew</option>         
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quirks">Personality Quirks: </label>
                            <textarea name="quirks" class="form-control" id="quirks" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="ideal">Ideal: </label>
                            <textarea name="ideal" class="form-control" id="ideal" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="bond">Bond: </label>
                            <textarea name="bond" class="form-control" id="bond" rows="2"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="flaws">Flaws: </label>
                            <textarea name="flaws" class="form-control" id="flaws" rows="4"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="alignment" id="alignmentLabel">Alignment:</label>
                            <select name="alignment" id="alignment" class="form-control">
                                <option value="" selected>Choose Alignment</option>
                                <option value="CE">Chaotic Evil</option>
                                <option value="CN">Chaotic Neutral</option>
                                <option value="CG">Chaotic Good</option>
                                <option value="NE">Neutral Evil</option>         
                                <option value="NN">True Neutral</option>         
                                <option value="NG">Neutral Good</option>         
                                <option value="LE">Lawful Evil</option>         
                                <option value="LN">Lawful Neutral</option>         
                                <option value="LG">Lawful Good</option>         
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="bio">Biography: </label>
                            <textarea name="bio" class="form-control" id="bio" rows="5"></textarea>
                        </div>
                    </div>
                    

                    <div class="modal-split">
                    <h2>Ability Scores</h2>
                        <div class="form-group">
                            <label>
                                <input type="radio" name="abilityGen" id="manualRoll" value="MR">
                                Manual Roll                          
                            </label>
                            <label>
                                <input type="radio" name="abilityGen" id="rng3d6" value="R3">
                                RNG 3d6                           
                            </label>
                            <label>
                                <input type="radio" name="abilityGen" id="rng4d6" value="R4">
                                RNG 4d6 <i>(drop lowest)</i>                         
                            </label>
                            <label>
                                <input type="radio" name="abilityGen" id="basicSpread" value="BS">
                                Basic Spread                           
                            </label>
                            <label>
                                <input type="radio" name="abilityGen" id="pointsBuy" value="PB">
                                Points Buy                           
                            </label>
                        </div>
                        <p><strong>Ability Scores to Distribute:</strong></p>
                        <ul>
                            <li id="ability1" value=""></li>
                            <li id="ability2" value=""></li>
                            <li id="ability3" value=""></li>
                            <li id="ability4" value=""></li>
                            <li id="ability5" value=""></li>
                            <li id="ability6" value=""></li>
                        </ul>
                        <div class="form-group">
                            <label for="str">Strength: </label>
                            <select name="str" id="str" class="form-control">
                                <option value="" selected>Choose Value</option>
                                <option id="str1" value=""></option>
                                <option id="str2" value=""></option>
                                <option id="str3" value=""></option>
                                <option id="str4" value=""></option>         
                                <option id="str5" value=""></option>         
                                <option id="str6" value=""></option>              
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dex">Dexterity: </label>
                            <select name="dex" id="dex" class="form-control">
                                <option value="" selected>Choose Value</option>
                                <option id="dex1" value=""></option>
                                <option id="dex2" value=""></option>
                                <option id="dex3" value=""></option>
                                <option id="dex4" value=""></option>         
                                <option id="dex5" value=""></option>         
                                <option id="dex6" value=""></option>              
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="con">Constitution: </label>
                            <select name="con" id="con" class="form-control">
                                <option value="" selected>Choose Value</option>
                                <option id="con1" value=""></option>
                                <option id="con2" value=""></option>
                                <option id="con3" value=""></option>
                                <option id="con4" value=""></option>         
                                <option id="con5" value=""></option>         
                                <option id="con6" value=""></option>              
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="intel">Intelligence: </label>
                            <select name="intel" id="intel" class="form-control">
                                <option value="" selected>Choose Value</option>
                                <option id="int1" value=""></option>
                                <option id="int2" value=""></option>
                                <option id="int3" value=""></option>
                                <option id="int4" value=""></option>         
                                <option id="int5" value=""></option>         
                                <option id="int6" value=""></option>              
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="wis">Wisdom: </label>
                            <select name="wis" id="wis" class="form-control">
                                <option value="" selected>Choose Value</option>
                                <option id="wis1" value=""></option>
                                <option id="wis2" value=""></option>
                                <option id="wis3" value=""></option>
                                <option id="wis4" value=""></option>         
                                <option id="wis5" value=""></option>         
                                <option id="wis6" value=""></option>              
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="cha">Charisma: </label>
                            <select name="cha" id="cha" class="form-control">
                                <option value="" selected>Choose Value</option>
                                <option id="cha1" value=""></option>
                                <option id="cha2" value=""></option>
                                <option id="cha3" value=""></option>
                                <option id="cha4" value=""></option>         
                                <option id="cha5" value=""></option>         
                                <option id="cha6" value=""></option>              
                            </select>
                        </div>
                    </div>
                      
                  </div>

                  <div class="modal-footer">
             
                  </div>
                </div>
              </div>
            </div>
        </form>
        
        <!-- Create Race Modal -->
       <form method="post" id="createRaceForm"> 
            <div class="modal fade modalMulti" id="createRaceModal" tabindex="-1" role="dialog" aria-labelledby="createRaceLabel">
              <div class="modal-dialog" role="document">

                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="createRaceLabel">Create a Race</h4>
                      <div id="createRaceMessage"></div>

                  </div>

                  <div class="modal-body">
                      <div class="modal-split">
                        <div class="form-group">
                            <label for="racename" class="sr-only">Race Name</label>
                            <input class="form-control" type="text" id="racename" name="racename" placeholder="Race Name" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="racedescription">Race Description:</label>
                            <textarea name="racedescription" class="form-control" id="racedescription" rows="3"></textarea>
                        </div>
                        <h3>ASI</h3>
                      <div class="form-group addasi1">
                            <label>
                                <input type="checkbox" name="addasi1" id="addasi1y" value="y">
                                Add ASI                         
                            </label>
                        </div>
                        <div class="form-group asi1">
                            <label>
                                <input type="radio" name="asi1" id="asi1str" value="str">
                                Str                         
                            </label>
                            <label>
                                <input type="radio" name="asi1" id="asi1dex" value="dex">
                                Dex                         
                            </label>
                            <label>
                                <input type="radio" name="asi1" id="asi1con" value="con">
                                Con                        
                            </label>
                            <label>
                                <input type="radio" name="asi1" id="asi1int" value="int">
                                Int                         
                            </label>
                            <label>
                                <input type="radio" name="asi1" id="asi1wis" value="wis">
                                Wis                         
                            </label>
                            <label>
                                <input type="radio" name="asi1" id="asi1cha" value="cha">
                                Cha                         
                            </label>
                            <label>
                                <input type="radio" name="asi1" id="asi1any" value="any">
                                Any                         
                            </label>
                        </div>
                        <div class="form-group asi1 asi1val">
                            <label for="asi1val" id="asi1Label" class="sr-only">ASI1:</label>
                            <select name="asi1val" id="asi1val" class="form-control">
                                <option value="" selected>Select Value</option>
                                <option value="1">+1</option>
                                <option value="2">+2</option>
                                <option value="3">+3</option>
                                <option value="4">+4</option>
                                <option value="5">+5</option>
                            </select>
                        </div>
                      <div id="asi1summary"></div>
                      
                      <div class="form-group addasi2">
                            <label>
                                <input type="checkbox" name="addasi2" id="addasi2y" value="y">
                                Add ASI                         
                            </label>
                        </div>
                      <div class="form-group asi2">
                            <label>
                                <input type="radio" name="asi2" id="asi2str" value="str">
                                Str                         
                            </label>
                            <label>
                                <input type="radio" name="asi2" id="asi2dex" value="dex">
                                Dex                         
                            </label>
                            <label>
                                <input type="radio" name="asi2" id="asi2con" value="con">
                                Con                        
                            </label>
                            <label>
                                <input type="radio" name="asi2" id="asi2int" value="intel">
                                Int                         
                            </label>
                            <label>
                                <input type="radio" name="asi2" id="asi2wis" value="wis">
                                Wis                         
                            </label>
                            <label>
                                <input type="radio" name="asi2" id="asi2cha" value="cha">
                                Cha                         
                            </label>
                            <label>
                                <input type="radio" name="asi2" id="asi2any" value="any">
                                Any                         
                            </label>
                        </div>
                        <div class="form-group asi2 asi2val">
                            <label for="asi2val" id="asi2Label" class="sr-only">ASI2:</label>
                            <select name="asi2val" id="asi2val" class="form-control">
                                <option value="" selected>Select Value</option>
                                <option value="1">+1</option>
                                <option value="2">+2</option>
                                <option value="3">+3</option>
                                <option value="4">+4</option>
                                <option value="5">+5</option>
                            </select>
                        </div>
                      <div id="asi2summary"></div>
                      
                    <div class="form-group addasi3">
                            <label>
                                <input type="checkbox" name="addasi3" id="addasi3y" value="y">
                                Add ASI                         
                            </label>
                        </div>
                        <div class="form-group asi3">
                            <label>
                                <input type="radio" name="asi3" id="asi3str" value="str">
                                Str                         
                            </label>
                            <label>
                                <input type="radio" name="asi3" id="asi3dex" value="dex">
                                Dex                         
                            </label>
                            <label>
                                <input type="radio" name="asi3" id="asi3con" value="con">
                                Con                        
                            </label>
                            <label>
                                <input type="radio" name="asi3" id="asi3int" value="intel">
                                Int                         
                            </label>
                            <label>
                                <input type="radio" name="asi3" id="asi3wis" value="wis">
                                Wis                         
                            </label>
                            <label>
                                <input type="radio" name="asi3" id="asi3cha" value="cha">
                                Cha                         
                            </label>
                            <label>
                                <input type="radio" name="asi3" id="asi3any" value="any">
                                Any                         
                            </label>
                        </div>
                        <div class="form-group asi3 asi3val">
                            <label for="asi3val" id="asi3Label" class="sr-only">ASI3:</label>
                            <select name="asi3val" id="asi3val" class="form-control">
                                <option value="" selected>Select Value</option>
                                <option value="1">+1</option>
                                <option value="2">+2</option>
                                <option value="3">+3</option>
                                <option value="4">+4</option>
                                <option value="5">+5</option>
                            </select>
                        </div>
                      <div id="asi3summary"></div>
                      
                    <div class="form-group addasi4">
                            <label>
                                <input type="checkbox" name="addasi4" id="addasi4y" value="y">
                                Add ASI                         
                            </label>
                        </div>
                        <div class="form-group asi4">
                            <label>
                                <input type="radio" name="asi4" id="asi4str" value="str">
                                Str                         
                            </label>
                            <label>
                                <input type="radio" name="asi4" id="asi4dex" value="dex">
                                Dex                         
                            </label>
                            <label>
                                <input type="radio" name="asi4" id="asi4con" value="con">
                                Con                        
                            </label>
                            <label>
                                <input type="radio" name="asi4" id="asi4int" value="intel">
                                Int                         
                            </label>
                            <label>
                                <input type="radio" name="asi4" id="asi4wis" value="wis">
                                Wis                         
                            </label>
                            <label>
                                <input type="radio" name="asi4" id="asi4cha" value="cha">
                                Cha                         
                            </label>
                            <label>
                                <input type="radio" name="asi4" id="asi4any" value="any">
                                Any                         
                            </label>
                        </div>
                        <div class="form-group asi4 asi4val">
                            <label for="asi4val" id="asi4Label" class="sr-only">ASI4:</label>
                            <select name="asi4val" id="asi4val" class="form-control">
                                <option value="" selected>Select Value</option>
                                <option value="1">+1</option>
                                <option value="2">+2</option>
                                <option value="3">+3</option>
                                <option value="4">+4</option>
                                <option value="5">+5</option>
                            </select>
                        </div>
                      <div id="asi4summary"></div>
                      
                    <div class="form-group addasi5">
                            <label>
                                <input type="checkbox" name="addasi5" id="addasi5y" value="y">
                                Add ASI                         
                            </label>
                        </div>
                        <div class="form-group asi5">
                            <label>
                                <input type="radio" name="asi5" id="asi5str" value="str">
                                Str                         
                            </label>
                            <label>
                                <input type="radio" name="asi5" id="asi5dex" value="dex">
                                Dex                         
                            </label>
                            <label>
                                <input type="radio" name="asi5" id="asi5con" value="con">
                                Con                        
                            </label>
                            <label>
                                <input type="radio" name="asi5" id="asi5int" value="intel">
                                Int                         
                            </label>
                            <label>
                                <input type="radio" name="asi5" id="asi5wis" value="wis">
                                Wis                         
                            </label>
                            <label>
                                <input type="radio" name="asi5" id="asi5cha" value="cha">
                                Cha                         
                            </label>
                            <label>
                                <input type="radio" name="asi5" id="asi5any" value="any">
                                Any                         
                            </label>
                        </div>
                        <div class="form-group asi5 asi5val">
                            <label for="asi5val" id="asi5Label" class="sr-only">ASI5:</label>
                            <select name="asi5val" id="asi5val" class="form-control">
                                <option value="" selected>Select Value</option>
                                <option value="1">+1</option>
                                <option value="2">+2</option>
                                <option value="3">+3</option>
                                <option value="4">+4</option>
                                <option value="5">+5</option>
                            </select>
                        </div>
                      <div id="asi5summary"></div>
                      
                    <div class="form-group addasi6">
                            <label>
                                <input type="checkbox" name="addasi6" id="addasi6y" value="y">
                                Add ASI                         
                            </label>
                        </div>
                        <div class="form-group asi6">
                            <label>
                                <input type="radio" name="asi6" id="asi6str" value="str">
                                Str                         
                            </label>
                            <label>
                                <input type="radio" name="asi6" id="asi6dex" value="dex">
                                Dex                         
                            </label>
                            <label>
                                <input type="radio" name="asi6" id="asi6con" value="con">
                                Con                        
                            </label>
                            <label>
                                <input type="radio" name="asi6" id="asi6int" value="intel">
                                Int                         
                            </label>
                            <label>
                                <input type="radio" name="asi6" id="asi6wis" value="wis">
                                Wis                         
                            </label>
                            <label>
                                <input type="radio" name="asi6" id="asi6cha" value="cha">
                                Cha                         
                            </label>
                            <label>
                                <input type="radio" name="asi6" id="asi6any" value="any">
                                Any                         
                            </label>
                        </div>
                        <div class="form-group asi6 asi6val">
                            <label for="asi6val" id="asi6Label" class="sr-only">ASI6:</label>
                            <select name="asi6val" id="asi6val" class="form-control">
                                <option value="" selected>Select Value</option>
                                <option value="1">+1</option>
                                <option value="2">+2</option>
                                <option value="3">+3</option>
                                <option value="4">+4</option>
                                <option value="5">+5</option>
                            </select>
                        </div>
                      <div id="asi6summary"></div>
                      </div>
                      
                      <div class="modal-split">
                      <h3>Proficencies</h3>
                      <div class="form-group addweapprof">
                            <label>
                                <input type="checkbox" name="addweapprof" id="addweapprofy" value="y">
                                Add Weapon Proficiency                         
                            </label>
                        </div>
                      <div class="form-group profweaptype">
                                <label>
                                    <input type="radio" name="profweap" id="profweapany" value="anyprof">
                                    Any                              
                                </label>
                                <label>
                                    <input type="radio" name="profweap" id="profweapselect" value="selectprof">
                                    Select                              
                                </label>
                        </div>
                      <div class="form-group profweapanynum">
                            <label for="profweapanynum" id="profweapanynumLabel" class="sr-only">Number of Proficiencies:</label>
                            <select name="profweapanynum" id="profweapanynum" class="form-control">
                                <option value="" selected>Select Value</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <div class="form-group weaponprof1">
                            <div class="checkbox checkbox-inline">
                                <label>
                                    <input type="checkbox" name="club1" id="club1" value="1">
                                    Club                               
                                </label>
                                <label>
                                    <input type="checkbox" name="dagger1" id="dagger1" value="1">
                                    Dagger                               
                                </label>
                                <label>
                                    <input type="checkbox" name="greatclub1" id="greatclub1" value="1">
                                    Greatclub                             
                                </label>
                                <label>
                                    <input type="checkbox" name="handaxe1" id="handaxe1" value="1">
                                    Handaxe                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="javelin1" id="javelin1" value="1">
                                    Javelin                               
                                </label>
                                <label>
                                    <input type="checkbox" name="lighthammer1" id="lighthammer1" value="1">
                                    Light Hammer                               
                                </label>
                                <label>
                                    <input type="checkbox" name="mace1" id="mace1" value="1">
                                    Mace                               
                                </label>
                                <label>
                                    <input type="checkbox" name="quarterstaff1" id="quarterstaff1" value="1">
                                    Quarterstaff                             
                                </label>
                                <label>
                                    <input type="checkbox" name="sickle1" id="sickle1" value="1">
                                    Sickle                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="spear1" id="spear1" value="1">
                                    Spear                               
                                </label>
                                <label>
                                    <input type="checkbox" name="lightcrossbow1" id="lightcrossbow1" value="1">
                                    Light Crossbow                               
                                </label>
                                <label>
                                    <input type="checkbox" name="dart1" id="dart1" value="1">
                                    Dart                               
                                </label>
                                <label>
                                    <input type="checkbox" name="shortbow1" id="shortbow1" value="1">
                                    Shortbow                             
                                </label>
                                <label>
                                    <input type="checkbox" name="sling1" id="sling1" value="1">
                                    Sling                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="battleaxe1" id="battleaxe1" value="1">
                                    Battleaxe                               
                                </label>
                                <label>
                                    <input type="checkbox" name="flail1" id="flail1" value="1">
                                    Flail                              
                                </label>
                                <label>
                                    <input type="checkbox" name="glaive1" id="glaive1" value="1">
                                    Glaive                               
                                </label>
                                <label>
                                    <input type="checkbox" name="greataxe1" id="greataxe1" value="1">
                                    Greataxe                             
                                </label>
                                <label>
                                    <input type="checkbox" name="greatsword1" id="greatsword1" value="1">
                                    Greatsword                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="halberd1" id="halberd1" value="1">
                                    Halberd                               
                                </label>
                                <label>
                                    <input type="checkbox" name="lance1" id="lance1" value="1">
                                    Lance                               
                                </label>
                                <label>
                                    <input type="checkbox" name="longsword1" id="longsword1" value="1">
                                    Longsword                               
                                </label>
                                <label>
                                    <input type="checkbox" name="maul1" id="maul1" value="1">
                                    Maul                             
                                </label>
                                <label>
                                    <input type="checkbox" name="morningstar1" id="morningstar1" value="1">
                                    Morningstar                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="pike1" id="pike1" value="1">
                                    Pike                               
                                </label>
                                <label>
                                    <input type="checkbox" name="rapier1" id="rapier1" value="1">
                                    Rapier                               
                                </label>
                                <label>
                                    <input type="checkbox" name="scimitar1" id="scimitar1" value="1">
                                    Scimitar                               
                                </label>
                                <label>
                                    <input type="checkbox" name="shortsword1" id="shortsword1" value="1">
                                    Shortsword                             
                                </label>
                                <label>
                                    <input type="checkbox" name="trident1" id="trident1" value="1">
                                    Trident                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="warpick1" id="warpick1" value="1">
                                    Warpick                               
                                </label>
                                <label>
                                    <input type="checkbox" name="warhammer1" id="warhammer1" value="1">
                                    Warhammer                              
                                </label>
                                <label>
                                    <input type="checkbox" name="whip1" id="whip1" value="1">
                                    Whip                               
                                </label>
                                <label>
                                    <input type="checkbox" name="blowgun1" id="blowgun1" value="1">
                                    Blowgun                             
                                </label>
                                <label>
                                    <input type="checkbox" name="handcrossbow1" id="handcrossbow1" value="1">
                                    Hand Crossbow                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="heavycrossbow1" id="heavycrossbow1" value="1">
                                    Heavy Crossbow                               
                                </label>
                                <label>
                                    <input type="checkbox" name="longbow1" id="longbow1" value="1">
                                    Longbow                              
                                </label>
                                <label>
                                    <input type="checkbox" name="net1" id="net1" value="1">
                                    Net                               
                                </label>
                            </div>
                        </div>
                      <div class="form-group weaponprof1">
                            <label for="otherweap1">Other Weapons: </label>
                            <textarea name="otherweap1" class="form-control" id="otherweap1" rows="2"></textarea>
                        </div>
                      
                      <div class="form-group addarmprof">
                            <label>
                                <input type="checkbox" name="addarmprof" id="addarmprofy" value="y">
                                Add Armour Proficiency                         
                            </label>
                        </div>
                      <div class="form-group armourprof1">
                            <div class="checkbox checkbox-inline">
                                <label>
                                    <input type="checkbox" name="lightarmour1" id="lightarmour1" value="1">
                                    Light                               
                                </label>
                                <label>
                                    <input type="checkbox" name="mediumarmour1" id="mediumarmour1" value="1">
                                    Medium                               
                                </label>
                                <label>
                                    <input type="checkbox" name="heavyarmour1" id="heavyarmour1" value="1">
                                    Heavy                             
                                </label>
                                <label>
                                    <input type="checkbox" name="shields1" id="shields1" value="1">
                                    Shields                               
                                </label>
                            </div>
                        </div>
                      
                      <div class="form-group addskilprof">
                            <label>
                                <input type="checkbox" name="addskilprof" id="addskilprofy" value="y">
                                Add Skill Proficiency                         
                            </label>
                        </div>
                      <div class="form-group profskiltype">
                                <label>
                                    <input type="radio" name="profskil" id="profskilany" value="anyprof">
                                    Any                              
                                </label>
                                <label>
                                    <input type="radio" name="profskil" id="profskilselect" value="selectprof">
                                    Select                              
                                </label>
                        </div>
                      <div class="form-group profskilanynum">
                            <label for="profskilanynum" id="profskilanynumLabel" class="sr-only">Number of Proficiencies:</label>
                            <select name="profskilanynum" id="profskilanynum" class="form-control">
                                <option value="" selected>Select Value</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                      <div class="form-group skillprof1">
                            <div class="checkbox checkbox-inline">
                                <label>
                                    <input type="checkbox" name="athletics1" id="athletics1" value="1">
                                    Athletics                              
                                </label>
                                <label>
                                    <input type="checkbox" name="acrobatics1" id="acrobatics1" value="1">
                                    Acrobatics                               
                                </label>
                                <label>
                                    <input type="checkbox" name="sleightofhand1" id="sleightofhand1" value="1">
                                    Sleight of Hand                             
                                </label>
                                <label>
                                    <input type="checkbox" name="stealth1" id="stealth1" value="1">
                                    Stealth                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="arcana1" id="arcana1" value="1">
                                    Arcana                               
                                </label>
                                <label>
                                    <input type="checkbox" name="history1" id="history1" value="1">
                                    History                              
                                </label>
                                <label>
                                    <input type="checkbox" name="investigation1" id="investigation1" value="1">
                                    Investigation                              
                                </label>
                                <label>
                                    <input type="checkbox" name="nature1" id="nature1" value="1">
                                    Nature                             
                                </label>
                                <label>
                                    <input type="checkbox" name="religion1" id="religion1" value="1">
                                    Religion                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="animalhandling1" id="animalhandling1" value="1">
                                    Animal Handling                               
                                </label>
                                <label>
                                    <input type="checkbox" name="insight1" id="insight1" value="1">
                                    Insight                             
                                </label>
                                <label>
                                    <input type="checkbox" name="medicine1" id="medicine1" value="1">
                                    Medicine                               
                                </label>
                                <label>
                                    <input type="checkbox" name="perception1" id="perception1" value="1">
                                    Perception                           
                                </label>
                                <label>
                                    <input type="checkbox" name="survival1" id="survival1" value="1">
                                    Survival                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="deception1" id="deception1" value="1">
                                    Deception                               
                                </label>
                                <label>
                                    <input type="checkbox" name="intimidation1" id="intimidation1" value="1">
                                    Intimidation                              
                                </label>
                                <label>
                                    <input type="checkbox" name="performance1" id="performance1" value="1">
                                    Performance                               
                                </label>
                                <label>
                                    <input type="checkbox" name="persuasion1" id="persuasion1" value="1">
                                    Persuasion                              
                                </label>
                            </div>
                        </div>
                      <div class="form-group">
                                <label>
                                    <input type="checkbox" name="common1" id="common1" value="1" checked>
                                    Speaks Common?                              
                                </label>
                        </div>
                      <div class="form-group addlangprof">
                            <label>
                                <input type="checkbox" name="addlangprof" id="addlangprofy" value="y">
                                Add Language Proficiency                         
                            </label>
                        </div>
                      <div class="form-group proflangtype">
                                <label>
                                    <input type="radio" name="proflang" id="proflangany" value="anyprof">
                                    Any                              
                                </label>
                                <label>
                                    <input type="radio" name="proflang" id="proflangselect" value="selectprof">
                                    Select                              
                                </label>
                        </div>
                      <div class="form-group proflanganynum">
                            <label for="proflanganynum" id="proflanganynumLabel" class="sr-only">Number of Proficiencies:</label>
                            <select name="proflanganynum" id="proflanganynum" class="form-control">
                                <option value="" selected>Select Value</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                      <div class="form-group langprof1">
                            <div class="checkbox checkbox-inline">
                                <label>
                                    <input type="checkbox" name="dwarvish1" id="dwarvish1" value="1">
                                    Dwarvish                               
                                </label>
                                <label>
                                    <input type="checkbox" name="elvish1" id="elvish1" value="1">
                                    Elvish                             
                                </label>
                                <label>
                                    <input type="checkbox" name="giant1" id="giant1" value="1">
                                    Giant                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="gnomish1" id="gnomish1" value="1">
                                    Gnomish                               
                                </label>
                                <label>
                                    <input type="checkbox" name="goblin1" id="goblin1" value="1">
                                    Goblin                              
                                </label>
                                <label>
                                    <input type="checkbox" name="halfling1" id="halfling1" value="1">
                                    Halfling                              
                                </label>
                                <label>
                                    <input type="checkbox" name="orc1" id="orc1" value="1">
                                    Orc                             
                                </label>
                                <label>
                                    <input type="checkbox" name="abyssal1" id="abyssal1" value="1">
                                    Abyssal                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="celestial1" id="celestial1" value="1">
                                    Celestial                               
                                </label>
                                <label>
                                    <input type="checkbox" name="deep1" id="deep1" value="1">
                                    Deepspeach                             
                                </label>
                                <label>
                                    <input type="checkbox" name="draconic1" id="draconic1" value="1">
                                    Draconic                               
                                </label>
                                <label>
                                    <input type="checkbox" name="infernal1" id="infernal1" value="1">
                                    Infernal                           
                                </label>
                                <label>
                                    <input type="checkbox" name="primordial1" id="primordial1" value="1">
                                    Primordial                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="sylvan1" id="sylvan1" value="1">
                                    Sylvan                               
                                </label>
                                <label>
                                    <input type="checkbox" name="undercommon1" id="undercommon1" value="1">
                                    Undercommon                              
                                </label>
                            </div>
                        </div>
                      <div class="form-group langprof1">
                            <label for="olang1">Other Languages: </label>
                            <textarea name="olang1" class="form-control" id="olang1" rows="2"></textarea>
                        </div>
                      
                      <div class="form-group addtoolprof">
                            <label>
                                <input type="checkbox" name="addtoolprof" id="addtoolprofy" value="y">
                                Add Tool Proficiency                         
                            </label>
                        </div>
                      <div class="form-group proftooltype">
                                <label>
                                    <input type="radio" name="proftool" id="proftoolany" value="anyprof">
                                    Any                              
                                </label>
                                <label>
                                    <input type="radio" name="proftool" id="proftoolselect" value="selectprof">
                                    Select                              
                                </label>
                        </div>
                      <div class="form-group proftoolanynum">
                            <label for="proftoolanynum" id="proftoolanynumLabel" class="sr-only">Number of Proficiencies:</label>
                            <select name="proftoolanynum" id="proftoolanynum" class="form-control">
                                <option value="" selected>Select Value</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                      <div class="form-group toolprof1">
                            <div class="checkbox checkbox-inline">
                                <label>
                                    <input type="checkbox" name="alchemistssupplies1" id="alchemistssupplies1" value="1">
                                    Alchemist's Supplies                              
                                </label>
                                <label>
                                    <input type="checkbox" name="brewerssupplies1" id="brewerssupplies1" value="1">
                                    Brewer's Supplies                               
                                </label>
                                <label>
                                    <input type="checkbox" name="calligrapherssupplies1" id="calligrapherssupplies1" value="1">
                                    Calligrapher's Supplies                             
                                </label>
                                <label>
                                    <input type="checkbox" name="carpenterstools1" id="carpenterstools1" value="1">
                                    Carpenter's Tools                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="cartographerstools1" id="cartographerstools1" value="1">
                                    Cartographer's Tools                               
                                </label>
                                <label>
                                    <input type="checkbox" name="cobblerstools1" id="cobblerstools1" value="1">
                                    Cobbler's Tools                               
                                </label>
                                <label>
                                    <input type="checkbox" name="cooksutensils1" id="cooksutensils1" value="1">
                                    Cook's Utensils                               
                                </label>
                                <label>
                                    <input type="checkbox" name="glassblowerstools1" id="glassblowerstools1" value="1">
                                    Glassblower's Tools                             
                                </label>
                                <label>
                                    <input type="checkbox" name="jewelerstools1" id="jewelerstools1" value="1">
                                    Jeweler's Tools                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="leatherworkerstools1" id="leatherworkerstools1" value="1">
                                    Leatherworker's Tools                               
                                </label>
                                <label>
                                    <input type="checkbox" name="masonstools1" id="masonstools1" value="1">
                                    Mason's Tools                              
                                </label>
                                <label>
                                    <input type="checkbox" name="painterstools1" id="painterstools1" value="1">
                                    Painter's Tools                               
                                </label>
                                <label>
                                    <input type="checkbox" name="potterstools1" id="potterstools1" value="1">
                                    Potter's Tools                             
                                </label>
                                <label>
                                    <input type="checkbox" name="smithstools1" id="smithstools1" value="1">
                                    Smith's Tools                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="tinkerstools1" id="tinkerstools1" value="1">
                                    Tinker's Tools                               
                                </label>
                                <label>
                                    <input type="checkbox" name="weaverstools1" id="weaverstools1" value="1">
                                    Weaver's Tools                              
                                </label>
                                <label>
                                    <input type="checkbox" name="woodcarverstools1" id="woodcarverstools1" value="1">
                                    Woodcarver's Tools                               
                                </label>
                                <label>
                                    <input type="checkbox" name="disguisekit1" id="disguisekit1" value="1">
                                    Disguise Kit                             
                                </label>
                                <label>
                                    <input type="checkbox" name="forgerykit1" id="forgerykit1" value="1">
                                    Forgery Kit                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="herbalismkit1" id="herbalismkit1" value="1">
                                    Herbalism Kit                               
                                </label>
                                <label>
                                    <input type="checkbox" name="navigatorstools1" id="navigatorstools1" value="1">
                                    Navigator's Tools                               
                                </label>
                                <label>
                                    <input type="checkbox" name="poisonerskit1" id="poisonerskit1" value="1">
                                    Poisoner's Kit                               
                                </label>
                                <label>
                                    <input type="checkbox" name="thievestools1" id="thievestools1" value="1">
                                    Thieves' Tools                             
                                </label>
                                <label>
                                    <input type="checkbox" name="vehiclesland1" id="vehiclesland1" value="1">
                                    Vehicles (Land)                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="vehicleswater1" id="vehicleswater1" value="1">
                                    Vehicles (Water)                               
                                </label>
                                <label>
                                    <input type="checkbox" name="vehiclesair1" id="vehiclesair1" value="1">
                                    Vehicles (Air)                               
                                </label>
                            </div>
                        </div>
                      <div class="form-group toolprof1">
                            <label for="gset1">Gaming Sets: </label>
                            <textarea name="gset1" class="form-control" id="gset1" rows="2"></textarea>
                        </div>
                        <div class="form-group toolprof1">
                            <label for="minstru1">Musical Instruments: </label>
                            <textarea name="minstru1" class="form-control" id="minstru1" rows="2"></textarea>
                        </div>
                      
                      <div class="form-group addwltprof">
                            <label>
                                <input type="checkbox" name="addwltprof" id="addwltprofy" value="y">
                                Add Any Weapon, Language or Tool Proficiency                         
                            </label>
                        </div>
                      <div class="form-group profwltanynum">
                            <label for="profwltanynum" id="profwltanynumLabel" class="sr-only">Number of Proficiencies:</label>
                            <select name="profwltanynum" id="profwltanynum" class="form-control">
                                <option value="" selected>How Many?</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>                  
                      </div>
                      
                      <div class="modal-split">
                      <h3>Racial Magic</h3>
                      <div class="form-group rm">
                            <label>
                                <input type="checkbox" name="rm" id="rmy" value="y">
                                Include Magic                          
                            </label>
                        </div>
                      <div class="form-group rmmod">
                            <label for="rmmodifier">Casting Ability:</label>
                            <select name="rmmodifier" id="rmmodifier" class="form-control">
                                <option value="" selected>Choose Ability</option>
                                <option value="i">Int</option>
                                <option value="w">Wis</option>               
                                <option value="c">Cha</option>                  
                                <option value="s">Choose</option>         
                            </select>
                        </div>
                      <div class="form-group rm1">
                            <label>
                                <input type="checkbox" name="rm1" id="rm1y" value="y">
                                Add Spell                          
                            </label>
                        </div>
                      <div class="form-group rm1spell">
                            <label for="r1spellname" class="sr-only">Spell Name</label>
                            <input class="form-control" type="text" id="r1spellname" name="r1spellname" placeholder="Spell Name" maxlength="50">
                        </div>
                      <div class="form-group rm1spelllevel">
                            <label for="r1spelllevel" class="sr-only">Level Attained</label>
                            <select name="r1spelllevel" id="r1spelllevel" class="form-control">
                                <option value="" selected>Choose Level</option>
                                <option value="1">Character Level 1</option>
                                <option value="2">Character Level 2</option>
                                <option value="3">Character Level 3</option>         
                                <option value="4">Character Level 4</option>         
                                <option value="5">Character Level 5</option>         
                            </select>
                        </div>
                      <div id="rm1summary"></div>
                      
                      <div class="form-group rm2">
                            <label>
                                <input type="checkbox" name="rm2" id="rm2y" value="y">
                                Add Spell                          
                            </label>
                        </div>
                      <div class="form-group rm2spell">
                            <label for="r2spellname" class="sr-only">Spell Name</label>
                            <input class="form-control" type="text" id="r2spellname" name="r2spellname" placeholder="Spell Name" maxlength="50">
                        </div>
                      <div class="form-group rm2spelllevel">
                            <label for="r2spelllevel" class="sr-only">Level Attained</label>
                            <select name="r2spelllevel" id="r2spelllevel" class="form-control">
                                <option value="" selected>Choose Level</option>
                                <option value="1">Character Level 1</option>
                                <option value="2">Character Level 2</option>
                                <option value="3">Character Level 3</option>         
                                <option value="4">Character Level 4</option>         
                                <option value="5">Character Level 5</option>         
                            </select>
                        </div>
                      <div id="rm2summary"></div>
                      
                      <div class="form-group rm3">
                            <label>
                                <input type="checkbox" name="rm3" id="rm3y" value="y">
                                Add Spell                          
                            </label>
                        </div>
                      <div class="form-group rm3spell">
                            <label for="r3spellname" class="sr-only">Spell Name</label>
                            <input class="form-control" type="text" id="r3spellname" name="r3spellname" placeholder="Spell Name" maxlength="50">
                        </div>
                      <div class="form-group rm3spelllevel">
                            <label for="r3spelllevel" class="sr-only">Level Attained</label>
                            <select name="r3spelllevel" id="r3spelllevel" class="form-control">
                                <option value="" selected>Choose Level</option>
                                <option value="1">Character Level 1</option>
                                <option value="2">Character Level 2</option>
                                <option value="3">Character Level 3</option>         
                                <option value="4">Character Level 4</option>         
                                <option value="5">Character Level 5</option>         
                            </select>
                        </div>
                      <div id="rm3summary"></div>
                      
                      <div class="form-group rm4">
                            <label>
                                <input type="checkbox" name="rm4" id="rm4y" value="y">
                                Add Spell                          
                            </label>
                        </div>
                      <div class="form-group rm4spell">
                            <label for="r4spellname" class="sr-only">Spell Name</label>
                            <input class="form-control" type="text" id="r4spellname" name="r4spellname" placeholder="Spell Name" maxlength="50">
                        </div>
                      <div class="form-group rm4spelllevel">
                            <label for="r4spelllevel" class="sr-only">Level Attained</label>
                            <select name="r4spelllevel" id="r4spelllevel" class="form-control">
                                <option value="" selected>Choose Level</option>
                                <option value="1">Character Level 1</option>
                                <option value="2">Character Level 2</option>
                                <option value="3">Character Level 3</option>         
                                <option value="4">Character Level 4</option>         
                                <option value="5">Character Level 5</option>         
                            </select>
                        </div>
                      <div id="rm4summary"></div>
                      
                      <div class="form-group rm5">
                            <label>
                                <input type="checkbox" name="rm5" id="rm5y" value="y">
                                Add Spell                          
                            </label>
                        </div>
                      <div class="form-group rm5spell">
                            <label for="r5spellname" class="sr-only">Spell Name</label>
                            <input class="form-control" type="text" id="r5spellname" name="r5spellname" placeholder="Spell Name" maxlength="50">
                        </div>
                      <div class="form-group rm5spelllevel">
                            <label for="r5spelllevel" class="sr-only">Level Attained</label>
                            <select name="r5spelllevel" id="r5spelllevel" class="form-control">
                                <option value="" selected>Choose Level</option>
                                <option value="1">Character Level 1</option>
                                <option value="2">Character Level 2</option>
                                <option value="3">Character Level 3</option>         
                                <option value="4">Character Level 4</option>         
                                <option value="5">Character Level 5</option>         
                            </select>
                        </div>
                      <div id="rm5summary"></div>
                      </div>
                      
                      <div class="modal-split">
                      <h3>Resistances</h3>
                      <div class="form-group res1">
                            <label>
                                <input type="checkbox" name="res1" id="res1y" value="y">
                                Add Resistance                          
                            </label>
                        </div>
                      <div class="form-group res1damtype">
                            <label for="res1type">Resistance Type:</label>
                            <select name="res1type" id="res1type" class="form-control">
                                <option value="" selected>Choose Damage Type</option>
                                <option value="poison">Poison</option>               
                                <option value="acid">Acid</option>                  
                                <option value="fire">Fire</option>         
                                <option value="cold">Cold</option>         
                                <option value="radiant">Radiant</option>         
                                <option value="necrotic">Necrotic</option>         
                                <option value="lightning">Lightning</option>         
                                <option value="thunder">Thunder</option>         
                                <option value="force">Force</option>         
                                <option value="psychic">Psychic</option>         
                                <option value="slashing">Slashing</option>         
                                <option value="piercing">Piercing</option>         
                                <option value="bludgeoning">Bludgeoning</option>
                            </select>
                        </div>
                      <div id="res1summary"></div>
                      
                      <div class="form-group res2">
                            <label>
                                <input type="checkbox" name="res2" id="res2y" value="y">
                                Add Resistance                          
                            </label>
                        </div>
                      <div class="form-group res2damtype">
                            <label for="res2type">Resistance Type:</label>
                            <select name="res2type" id="res2type" class="form-control">
                                <option value="" selected>Choose Damage Type</option>
                                <option value="poison">Poison</option>               
                                <option value="acid">Acid</option>                  
                                <option value="fire">Fire</option>         
                                <option value="cold">Cold</option>         
                                <option value="radiant">Radiant</option>         
                                <option value="necrotic">Necrotic</option>         
                                <option value="lightning">Lightning</option>         
                                <option value="thunder">Thunder</option>         
                                <option value="force">Force</option>         
                                <option value="psychic">Psychic</option>         
                                <option value="slashing">Slashing</option>         
                                <option value="piercing">Piercing</option>         
                                <option value="bludgeoning">Bludgeoning</option>
                            </select>
                        </div>
                      <div id="res2summary"></div>
                      
                      <div class="form-group res3">
                            <label>
                                <input type="checkbox" name="res3" id="res3y" value="y">
                                Add Resistance                          
                            </label>
                        </div>
                      <div class="form-group res3damtype">
                            <label for="res3type">Resistance Type:</label>
                            <select name="res3type" id="res3type" class="form-control">
                                <option value="" selected>Choose Damage Type</option>
                                <option value="poison">Poison</option>               
                                <option value="acid">Acid</option>                  
                                <option value="fire">Fire</option>         
                                <option value="cold">Cold</option>         
                                <option value="radiant">Radiant</option>         
                                <option value="necrotic">Necrotic</option>         
                                <option value="lightning">Lightning</option>         
                                <option value="thunder">Thunder</option>         
                                <option value="force">Force</option>         
                                <option value="psychic">Psychic</option>         
                                <option value="slashing">Slashing</option>         
                                <option value="piercing">Piercing</option>         
                                <option value="bludgeoning">Bludgeoning</option>
                            </select>
                        </div>
                      <div id="res3summary"></div>
                      
                      <h3>Immunities</h3>
                      <div class="form-group imm1">
                            <label>
                                <input type="checkbox" name="imm1" id="imm1y" value="y">
                                Add Immunity                         
                            </label>
                        </div>
                      <div class="form-group imm1damtype">
                            <label for="imm1type">Immunity Type:</label>
                            <select name="imm1type" id="imm1type" class="form-control">
                                <option value="" selected>Choose Immunity Type</option>
                                <h2>Conditions</h2>
                                <option value="blinded">Blinded</option>               
                                <option value="charmed">Charmed</option>   
                                <option value="deafened">Deafened</option>         
                                <option value="exhaustion">Exhaustion</option>         
                                <option value="frightened">Frightened</option>         
                                <option value="grappled">Grappled</option>         
                                <option value="incapacitated">Incapacitated</option>
                                <option value="invisible">Invisible</option>         
                                <option value="paralyzed">Paralyzed</option>         
                                <option value="petrified">Petrified</option>         
                                <option value="poisoned">Poisoned</option>         
                                <option value="prone">Prone</option>         
                                <option value="restrained">Restrained</option>
                                <option value="stunned">Stunned</option>
                                <option value="unconscious">Unconscious</option>
                                <option value="magicsleep">Magic Sleep</option>
                                <h2>Damages</h2>
                                <option value="poison">Poison</option>               
                                <option value="acid">Acid</option>                  
                                <option value="fire">Fire</option>         
                                <option value="cold">Cold</option>         
                                <option value="radiant">Radiant</option>         
                                <option value="necrotic">Necrotic</option>         
                                <option value="lightning">Lightning</option>         
                                <option value="thunder">Thunder</option>         
                                <option value="force">Force</option>         
                                <option value="psychic">Psychic</option>         
                                <option value="slashing">Slashing</option>         
                                <option value="piercing">Piercing</option>         
                                <option value="bludgeoning">Bludgeoning</option>
                            </select>
                        </div>
                      <div class="form-group imm2">
                            <label>
                                <input type="checkbox" name="imm2" id="imm2y" value="y">
                                Add Immunity                         
                            </label>
                        </div>
                      <div id="imm1summary"></div>
                      
                      <div class="form-group imm2damtype">
                            <label for="imm2type">Immunity Type:</label>
                            <select name="imm2type" id="imm2type" class="form-control">
                                <option value="" selected>Choose Immunity Type</option>
                                <h2>Conditions</h2>
                                <option value="blinded">Blinded</option>               
                                <option value="charmed">Charmed</option>   
                                <option value="deafened">Deafened</option>         
                                <option value="exhaustion">Exhaustion</option>         
                                <option value="frightened">Frightened</option>         
                                <option value="grappled">Grappled</option>         
                                <option value="incapacitated">Incapacitated</option>
                                <option value="invisible">Invisible</option>         
                                <option value="paralyzed">Paralyzed</option>         
                                <option value="petrified">Petrified</option>         
                                <option value="poisoned">Poisoned</option>         
                                <option value="prone">Prone</option>         
                                <option value="restrained">Restrained</option>
                                <option value="stunned">Stunned</option>
                                <option value="unconscious">Unconscious</option>
                                <option value="magicsleep">Magic Sleep</option>
                                <h2>Damages</h2>
                                <option value="poison">Poison</option>               
                                <option value="acid">Acid</option>                  
                                <option value="fire">Fire</option>         
                                <option value="cold">Cold</option>         
                                <option value="radiant">Radiant</option>         
                                <option value="necrotic">Necrotic</option>         
                                <option value="lightning">Lightning</option>         
                                <option value="thunder">Thunder</option>         
                                <option value="force">Force</option>         
                                <option value="psychic">Psychic</option>         
                                <option value="slashing">Slashing</option>         
                                <option value="piercing">Piercing</option>         
                                <option value="bludgeoning">Bludgeoning</option>
                            </select>
                        </div>
                      <div id="imm2summary"></div>
                      
                      <div class="form-group imm3">
                            <label>
                                <input type="checkbox" name="imm3" id="imm3y" value="y">
                                Add Immunity                         
                            </label>
                        </div>
                      <div class="form-group imm3damtype">
                            <label for="imm3type">Immunity Type:</label>
                            <select name="imm3type" id="imm3type" class="form-control">
                                <option value="" selected>Choose Immunity Type</option>
                                <h2>Conditions</h2>
                                <option value="blinded">Blinded</option>               
                                <option value="charmed">Charmed</option>   
                                <option value="deafened">Deafened</option>         
                                <option value="exhaustion">Exhaustion</option>         
                                <option value="frightened">Frightened</option>         
                                <option value="grappled">Grappled</option>         
                                <option value="incapacitated">Incapacitated</option>
                                <option value="invisible">Invisible</option>         
                                <option value="paralyzed">Paralyzed</option>         
                                <option value="petrified">Petrified</option>         
                                <option value="poisoned">Poisoned</option>         
                                <option value="prone">Prone</option>         
                                <option value="restrained">Restrained</option>
                                <option value="stunned">Stunned</option>
                                <option value="unconscious">Unconscious</option>
                                <option value="magicsleep">Magic Sleep</option>
                                <h2>Damages</h2>
                                <option value="poison">Poison</option>               
                                <option value="acid">Acid</option>                  
                                <option value="fire">Fire</option>         
                                <option value="cold">Cold</option>         
                                <option value="radiant">Radiant</option>         
                                <option value="necrotic">Necrotic</option>         
                                <option value="lightning">Lightning</option>         
                                <option value="thunder">Thunder</option>         
                                <option value="force">Force</option>         
                                <option value="psychic">Psychic</option>         
                                <option value="slashing">Slashing</option>         
                                <option value="piercing">Piercing</option>         
                                <option value="bludgeoning">Bludgeoning</option>
                            </select>
                        </div>
                      <div id="imm3summary"></div>
                      </div>
                      
                      <div class="modal-split">
                      <h3>Extra Features</h3>
                      <div class="form-group xfeat1">
                            <label>
                                <input type="checkbox" name="xfeat1" id="xfeat1y" value="y">
                                Add Feature                         
                            </label>
                        </div>
                        <div class="form-group xfeat1description">
                            <label for="xfeat1desc" class="sr-only">Feature:</label>
                            <textarea name="xfeat1desc" class="form-control" id="xfeat1desc" rows="4"></textarea>
                        </div>
                      <div class="form-group xfeat2">
                            <label>
                                <input type="checkbox" name="xfeat2" id="xfeat2y" value="y">
                                Add Feature                         
                            </label>
                        </div>
                        <div class="form-group xfeat2description">
                            <label for="xfeat2desc" class="sr-only">Feature:</label>
                            <textarea name="xfeat2desc" class="form-control" id="xfeat2desc" rows="4"></textarea>
                        </div>
                      <div class="form-group xfeat3">
                            <label>
                                <input type="checkbox" name="xfeat3" id="xfeat3y" value="y">
                                Add Feature                         
                            </label>
                        </div>
                        <div class="form-group xfeat3description">
                            <label for="xfeat3desc" class="sr-only">Feature:</label>
                            <textarea name="xfeat3desc" class="form-control" id="xfeat3desc" rows="4"></textarea>
                        </div>
                      <div class="form-group xfeat4">
                            <label>
                                <input type="checkbox" name="xfeat4" id="xfeat4y" value="y">
                                Add Feature                         
                            </label>
                        </div>
                        <div class="form-group xfeat4description">
                            <label for="xfeat4desc" class="sr-only">Feature:</label>
                            <textarea name="xfeat4desc" class="form-control" id="xfeat4desc" rows="4"></textarea>
                        </div>
                      <div class="form-group xfeat5">
                            <label>
                                <input type="checkbox" name="xfeat5" id="xfeat5y" value="y">
                                Add Feature                         
                            </label>
                        </div>
                        <div class="form-group xfeat5description">
                            <label for="xfeat5desc" class="sr-only">Feature:</label>
                            <textarea name="xfeat5desc" class="form-control" id="xfeat5desc" rows="4"></textarea>
                        </div>                        
                    </div>

                    </div>
                  <div class="modal-footer">
                    
                  </div>
                </div>
              </div>
            </div>
        </form>
        
        <!-- Create Class Modal -->
       <form method="post" id="createClassForm"> 
            <div class="modal fade modalMulti" id="createClassModal" tabindex="-1" role="dialog" aria-labelledby="createClassLabel">
              <div class="modal-dialog" role="document">

                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="createClassLabel">Create a Class</h4>
                      <div id="createClassMessage"></div>

                  </div>

                  <div class="modal-body">

                    <div class="modal-split">
                        <div class="form-group">
                            <label for="classname" class="sr-only">Class Name</label>
                            <input class="form-control" type="text" id="classname" name="classname" placeholder="Class Name" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="baseclassname" class="sr-only">Base Class Name</label>
                            <input class="form-control" type="text" id="baseclassname" name="baseclassname" placeholder="Base Class Name" maxlength="50">
                        </div>
                        <div class="form-group">
                            <label for="classdescription">Class Description:</label>
                            <textarea name="classdescription" class="form-control" id="classdescription" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="classhp" id="classhplabel" class="sr-only">Class HP:</label>
                            <select name="classhp" id="classhp" class="form-control">
                                <option value="" selected>Select Hit Die</option>
                                <option value="6">d6</option>
                                <option value="8">d8</option>
                                <option value="10">d10</option>
                                <option value="12">d12</option>
                            </select>
                        </div>
                        <div class="form-group addmagic">
                            <label>
                                <input type="checkbox" name="addmagic" id="addmagic" value="y">
                                Add Spellcasting?                         
                            </label>
                        </div>
                        <div class="form-group caster">
                            <label for="castmod">Casting Ability:</label>
                            <select name="castmod" id="castmod" class="form-control">
                                <option value="" selected>Choose Ability</option>
                                <option value="i">Int</option>
                                <option value="w">Wis</option>               
                                <option value="c">Cha</option>        
                            </select>
                        </div>
                        <div class="form-group caster">
                            <label for="casttype" id="casttypelabel">Type of Caster:</label>
                            <select name="casttype" id="casttype" class="form-control">
                                <option value="" selected>Casting Type?</option>
                                <option value="w">Spellbook</option>
                                <option value="s">Spells Known</option>
                                <option value="c">Divine Casting</option>
                                <option value="p">Pact Magic</option>
                            </select>
                        </div>
                        <div class="form-group caster">
                            <label for="spellslots" id="spellslotslabel">Spell Slots</label>
                            <select name="spellslots" id="spellslots" class="form-control">
                                <option value="" selected>Spell Slots</option>
                                <option value="f">Full Caster</option>
                                <option value="h">Half Caster</option>
                                <option value="t">Third Caster</option>
                                <option value="p">Pact Caster</option>
                            </select>
                        </div>
                      <div class="form-group caster">
                          <label for="spelllist" id="spelllistlabel">Spell List</label>
                            <select name="spelllist" id="spelllist" class="form-control">
                                <option value="" selected>Spell List</option>
                                <option value="bard">Bard</option>
                                <option value="cleric">Cleric</option>
                                <option value="druid">Druid</option>
                                <option value="paladin">Paladin</option>
                                <option value="ranger">Ranger</option>
                                <option value="sorcerer">Sorcerer</option>
                                <option value="warlock">Warlock</option>
                                <option value="wizard">Wizard</option>
                            </select>
                        </div>
                      </div>
                      
                      <div class="modal-split">
                        <h3>Proficencies</h3>
                          <h4>Skills</h4>
                      <div class="form-group profskilnum2">
                            <label for="profskilnum2" id="profskilnum2Label" class="sr-only">Number of Proficiencies:</label>
                            <select name="profskilnum2" id="profskilnum2" class="form-control">
                                <option value="" selected>How Many?</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                            </select>
                        </div>
                        <h5>Choices</h5>
                      <div class="form-group skillprof2">
                            <div class="checkbox checkbox-inline">
                                <label>
                                    <input type="checkbox" name="athletics2" id="athletics2" value="1">
                                    Athletics                              
                                </label>
                                <label>
                                    <input type="checkbox" name="acrobatics2" id="acrobatics2" value="1">
                                    Acrobatics                               
                                </label>
                                <label>
                                    <input type="checkbox" name="sleightofhand2" id="sleightofhand2" value="1">
                                    Sleight of Hand                             
                                </label>
                                <label>
                                    <input type="checkbox" name="stealth2" id="stealth2" value="1">
                                    Stealth                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="arcana2" id="arcana2" value="1">
                                    Arcana                               
                                </label>
                                <label>
                                    <input type="checkbox" name="history2" id="history2" value="1">
                                    History                              
                                </label>
                                <label>
                                    <input type="checkbox" name="investigation2" id="investigation2" value="1">
                                    Investigation                              
                                </label>
                                <label>
                                    <input type="checkbox" name="nature2" id="nature2" value="1">
                                    Nature                             
                                </label>
                                <label>
                                    <input type="checkbox" name="religion2" id="religion2" value="1">
                                    Religion                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="animalhandling2" id="animalhandling2" value="1">
                                    Animal Handling                               
                                </label>
                                <label>
                                    <input type="checkbox" name="insight2" id="insight2" value="1">
                                    Insight                             
                                </label>
                                <label>
                                    <input type="checkbox" name="medicine2" id="medicine2" value="1">
                                    Medicine                               
                                </label>
                                <label>
                                    <input type="checkbox" name="perception2" id="perception2" value="1">
                                    Perception                           
                                </label>
                                <label>
                                    <input type="checkbox" name="survival2" id="survival2" value="1">
                                    Survival                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="deception2" id="deception2" value="1">
                                    Deception                               
                                </label>
                                <label>
                                    <input type="checkbox" name="intimidation2" id="intimidation2" value="1">
                                    Intimidation                              
                                </label>
                                <label>
                                    <input type="checkbox" name="performance2" id="performance2" value="1">
                                    Performance                               
                                </label>
                                <label>
                                    <input type="checkbox" name="persuasion2" id="persuasion2" value="1">
                                    Persuasion                              
                                </label>
                            </div>
                        </div>
                        <h4>Weapons, Armour and Tools</h4>
                      <div class="form-group profweaptype2">
                                <label>
                                    <input type="checkbox" name="profweapsimple2" id="profweapsimple2" value="allsimple">
                                    All Simple Weapons                              
                                </label>
                                <label>
                                    <input type="checkbox" name="profweapmartial2" id="profweapmartial2" value="allmartial">
                                    All Martial Weapons                              
                                </label>
                                <label>
                                    <input type="checkbox" name="profweapselect2" id="profweapselect2" value="selectprof">
                                    Select                              
                                </label>
                        </div>
                        <div class="form-group weaponprof2">
                            <div class="checkbox checkbox-inline">
                                <label>
                                    <input type="checkbox" name="club2" id="club2" value="1">
                                    Club                               
                                </label>
                                <label>
                                    <input type="checkbox" name="dagger2" id="dagger2" value="1">
                                    Dagger                               
                                </label>
                                <label>
                                    <input type="checkbox" name="greatclub2" id="greatclub2" value="1">
                                    Greatclub                             
                                </label>
                                <label>
                                    <input type="checkbox" name="handaxe2" id="handaxe2" value="1">
                                    Handaxe                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="javelin2" id="javelin2" value="1">
                                    Javelin                               
                                </label>
                                <label>
                                    <input type="checkbox" name="lighthammer2" id="lighthammer2" value="1">
                                    Light Hammer                               
                                </label>
                                <label>
                                    <input type="checkbox" name="mace2" id="mace2" value="1">
                                    Mace                               
                                </label>
                                <label>
                                    <input type="checkbox" name="quarterstaff2" id="quarterstaff2" value="1">
                                    Quarterstaff                             
                                </label>
                                <label>
                                    <input type="checkbox" name="sickle2" id="sickle2" value="1">
                                    Sickle                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="spear2" id="spear2" value="1">
                                    Spear                               
                                </label>
                                <label>
                                    <input type="checkbox" name="lightcrossbow2" id="lightcrossbow2" value="1">
                                    Light Crossbow                               
                                </label>
                                <label>
                                    <input type="checkbox" name="dart2" id="dart2" value="1">
                                    Dart                               
                                </label>
                                <label>
                                    <input type="checkbox" name="shortbow2" id="shortbow2" value="1">
                                    Shortbow                             
                                </label>
                                <label>
                                    <input type="checkbox" name="sling2" id="sling2" value="1">
                                    Sling                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="battleaxe2" id="battleaxe2" value="1">
                                    Battleaxe                               
                                </label>
                                <label>
                                    <input type="checkbox" name="flail2" id="flail2" value="1">
                                    Flail                              
                                </label>
                                <label>
                                    <input type="checkbox" name="glaive2" id="glaive2" value="1">
                                    Glaive                               
                                </label>
                                <label>
                                    <input type="checkbox" name="greataxe2" id="greataxe2" value="1">
                                    Greataxe                             
                                </label>
                                <label>
                                    <input type="checkbox" name="greatsword2" id="greatsword2" value="1">
                                    Greatsword                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="halberd2" id="halberd2" value="1">
                                    Halberd                               
                                </label>
                                <label>
                                    <input type="checkbox" name="lance2" id="lance2" value="1">
                                    Lance                               
                                </label>
                                <label>
                                    <input type="checkbox" name="longsword2" id="longsword2" value="1">
                                    Longsword                               
                                </label>
                                <label>
                                    <input type="checkbox" name="maul2" id="maul2" value="1">
                                    Maul                             
                                </label>
                                <label>
                                    <input type="checkbox" name="morningstar2" id="morningstar2" value="1">
                                    Morningstar                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="pike2" id="pike2" value="1">
                                    Pike                               
                                </label>
                                <label>
                                    <input type="checkbox" name="rapier2" id="rapier2" value="1">
                                    Rapier                               
                                </label>
                                <label>
                                    <input type="checkbox" name="scimitar2" id="scimitar2" value="1">
                                    Scimitar                               
                                </label>
                                <label>
                                    <input type="checkbox" name="shortsword2" id="shortsword2" value="1">
                                    Shortsword                             
                                </label>
                                <label>
                                    <input type="checkbox" name="trident2" id="trident2" value="1">
                                    Trident                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="warpick2" id="warpick2" value="1">
                                    Warpick                               
                                </label>
                                <label>
                                    <input type="checkbox" name="warhammer2" id="warhammer2" value="1">
                                    Warhammer                              
                                </label>
                                <label>
                                    <input type="checkbox" name="whip2" id="whip2" value="1">
                                    Whip                               
                                </label>
                                <label>
                                    <input type="checkbox" name="blowgun2" id="blowgun2" value="1">
                                    Blowgun                             
                                </label>
                                <label>
                                    <input type="checkbox" name="handcrossbow2" id="handcrossbow2" value="1">
                                    Hand Crossbow                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="heavycrossbow2" id="heavycrossbow2" value="1">
                                    Heavy Crossbow                               
                                </label>
                                <label>
                                    <input type="checkbox" name="longbow2" id="longbow2" value="1">
                                    Longbow                              
                                </label>
                                <label>
                                    <input type="checkbox" name="net2" id="net2" value="1">
                                    Net                               
                                </label>
                            </div>
                        </div>
                      <div class="form-group weaponprof2">
                            <label for="otherweap2">Other Weapons: </label>
                            <textarea name="otherweap2" class="form-control" id="otherweap2" rows="2"></textarea>
                        </div>
                      
                      <div class="form-group addarmprof">
                            <label>
                                <input type="checkbox" name="addarmprof2" id="addarmprof2y" value="y">
                                Add Armour Proficiency                         
                            </label>
                        </div>
                      <div class="form-group armourprof2">
                            <div class="checkbox checkbox-inline">
                                <label>
                                    <input type="checkbox" name="lightarmour2" id="lightarmour2" value="1">
                                    Light                               
                                </label>
                                <label>
                                    <input type="checkbox" name="mediumarmour2" id="mediumarmour2" value="1">
                                    Medium                               
                                </label>
                                <label>
                                    <input type="checkbox" name="heavyarmour2" id="heavyarmour2" value="1">
                                    Heavy                             
                                </label>
                                <label>
                                    <input type="checkbox" name="shields2" id="shields2" value="1">
                                    Shields                               
                                </label>
                            </div>
                        </div>
                      
                      <div class="form-group addtoolprof">
                            <label>
                                <input type="checkbox" name="addtoolprof1" id="addtoolprofy1" value="y">
                                Add Tool Proficiency                         
                            </label>
                        </div>
                      <div class="form-group toolprof2">
                            <div class="checkbox checkbox-inline">
                                <label>
                                    <input type="checkbox" name="alchemistssupplies2" id="alchemistssupplies2" value="1">
                                    Alchemist's Supplies                              
                                </label>
                                <label>
                                    <input type="checkbox" name="brewerssupplies2" id="brewerssupplies2" value="1">
                                    Brewer's Supplies                               
                                </label>
                                <label>
                                    <input type="checkbox" name="calligrapherssupplies1" id="calligrapherssupplies2" value="1">
                                    Calligrapher's Supplies                             
                                </label>
                                <label>
                                    <input type="checkbox" name="carpenterstools2" id="carpenterstools2" value="1">
                                    Carpenter's Tools                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="cartographerstools2" id="cartographerstools2" value="1">
                                    Cartographer's Tools                               
                                </label>
                                <label>
                                    <input type="checkbox" name="cobblerstools2" id="cobblerstools2" value="1">
                                    Cobbler's Tools                               
                                </label>
                                <label>
                                    <input type="checkbox" name="cooksutensils2" id="cooksutensils2" value="1">
                                    Cook's Utensils                               
                                </label>
                                <label>
                                    <input type="checkbox" name="glassblowerstools2" id="glassblowerstools2" value="1">
                                    Glassblower's Tools                             
                                </label>
                                <label>
                                    <input type="checkbox" name="jewelerstools2" id="jewelerstools2" value="1">
                                    Jeweler's Tools                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="leatherworkerstools2" id="leatherworkerstools2" value="1">
                                    Leatherworker's Tools                               
                                </label>
                                <label>
                                    <input type="checkbox" name="masonstools2" id="masonstools2" value="1">
                                    Mason's Tools                              
                                </label>
                                <label>
                                    <input type="checkbox" name="painterstools2" id="painterstools2" value="1">
                                    Painter's Tools                               
                                </label>
                                <label>
                                    <input type="checkbox" name="potterstools2" id="potterstools2" value="1">
                                    Potter's Tools                             
                                </label>
                                <label>
                                    <input type="checkbox" name="smithstools2" id="smithstools2" value="1">
                                    Smith's Tools                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="tinkerstools2" id="tinkerstools2" value="1">
                                    Tinker's Tools                               
                                </label>
                                <label>
                                    <input type="checkbox" name="weaverstools2" id="weaverstools2" value="1">
                                    Weaver's Tools                              
                                </label>
                                <label>
                                    <input type="checkbox" name="woodcarverstools2" id="woodcarverstools2" value="1">
                                    Woodcarver's Tools                               
                                </label>
                                <label>
                                    <input type="checkbox" name="disguisekit2" id="disguisekit2" value="1">
                                    Disguise Kit                             
                                </label>
                                <label>
                                    <input type="checkbox" name="forgerykit2" id="forgerykit2" value="1">
                                    Forgery Kit                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="herbalismkit2" id="herbalismkit2" value="1">
                                    Herbalism Kit                               
                                </label>
                                <label>
                                    <input type="checkbox" name="navigatorstools2" id="navigatorstools2" value="1">
                                    Navigator's Tools                               
                                </label>
                                <label>
                                    <input type="checkbox" name="poisonerskit2" id="poisonerskit2" value="1">
                                    Poisoner's Kit                               
                                </label>
                                <label>
                                    <input type="checkbox" name="thievestools2" id="thievestools2" value="1">
                                    Thieves' Tools                             
                                </label>
                                <label>
                                    <input type="checkbox" name="vehiclesland2" id="vehiclesland2" value="1">
                                    Vehicles (Land)                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="vehicleswater2" id="vehicleswater2" value="1">
                                    Vehicles (Water)                               
                                </label>
                                <label>
                                    <input type="checkbox" name="vehiclesair2" id="vehiclesair2" value="1">
                                    Vehicles (Air)                               
                                </label>
                            </div>
                        </div>
                      <div class="form-group toolprof2">
                            <label for="gset2">Gaming Sets: </label>
                            <textarea name="gset2" class="form-control" id="gset2" rows="2"></textarea>
                        </div>
                        <div class="form-group toolprof2">
                            <label for="minstru2">Musical Instruments: </label>
                            <textarea name="minstru2" class="form-control" id="minstru2" rows="2"></textarea>
                        </div> 
                        
                        
                    </div>
                      

                    <div class="modal-split">
                    <h3>Level 1 Features</h3>
                        <div class="form-group addl1f1">
                            <label>
                                <input type="checkbox" name="addl1f1" id="addl1f1" value="y">
                                Add A Feature?                         
                            </label>
                        </div>
                        <div class="form-group l1f1name">
                            <label for="l1f1name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l1f1name" name="l1f1name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l1f1desc">
                            <label for="l1f1desc">Feature Description:</label>
                            <textarea name="l1f1desc" class="form-control" id="l1f1desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l1f1limited">
                            <label>
                                <input type="checkbox" name="l1f1limited" id="l1f1limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l1f1uses">
                            <label for="l1f1uses" id="l1f1useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l1f1uses" id="l1f1uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l1f1rep">
                            <label for="l1f1rep" id="l1f1replabel" class="sr-only">Replenshes When?</label>
                            <select name="l1f1rep" id="l1f1rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                        
                        <div class="form-group addl1f2">
                            <label>
                                <input type="checkbox" name="addl1f2" id="addl1f2" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l1f2name">
                            <label for="l1f2name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l1f2name" name="l1f2name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l1f2desc">
                            <label for="l1f2desc">Feature Description:</label>
                            <textarea name="l1f2desc" class="form-control" id="l1f2desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l1f2limited">
                            <label>
                                <input type="checkbox" name="l1f2limited" id="l1f2limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l1f2uses">
                            <label for="l1f2uses" id="l1f2useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l1f2uses" id="l1f2uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l1f2rep">
                            <label for="l1f2rep" id="l1f2replabel" class="sr-only">Replenshes When?</label>
                            <select name="l1f2rep" id="l1f2rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                      
                      <div class="form-group addl1f3">
                            <label>
                                <input type="checkbox" name="addl1f3" id="addl1f3" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l1f3name">
                            <label for="l1f3name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l1f3name" name="l1f3name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l1f3desc">
                            <label for="l1f3desc">Feature Description:</label>
                            <textarea name="l1f3desc" class="form-control" id="l1f3desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l1f3limited">
                            <label>
                                <input type="checkbox" name="l1f3limited" id="l1f3limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l1f3uses">
                            <label for="l1f3uses" id="l1f3useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l1f3uses" id="l1f3uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l1f3rep">
                            <label for="l1f3rep" id="l1f3replabel" class="sr-only">Replenshes When?</label>
                            <select name="l1f3rep" id="l1f3rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                    
                    <div class="form-group addl1f4">
                            <label>
                                <input type="checkbox" name="addl1f4" id="addl1f4" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l1f4name">
                            <label for="l1f4name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l1f4name" name="l1f4name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l1f4desc">
                            <label for="l1f4desc">Feature Description:</label>
                            <textarea name="l1f4desc" class="form-control" id="l1f4desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l1f4limited">
                            <label>
                                <input type="checkbox" name="l1f4limited" id="l1f4limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l1f4uses">
                            <label for="l1f4uses" id="l1f4useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l1f4uses" id="l1f4uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l1f4rep">
                            <label for="l1f4rep" id="l1f4replabel" class="sr-only">Replenshes When?</label>
                            <select name="l1f4rep" id="l1f4rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                    </div>
                  
                  
                      
                      <div class="modal-split">
                    <h3>Level 2 Features</h3>
                          <div class="form-group addl2f1">
                            <label>
                                <input type="checkbox" name="addl2f1" id="addl2f1" value="y">
                                Add A Feature?                         
                            </label>
                        </div>
                          <div class="form-group l2f1name">
                            <label for="l2f1name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l2f1name" name="l2f1name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l2f1desc">
                            <label for="l2f1desc">Feature Description:</label>
                            <textarea name="l2f1desc" class="form-control" id="l2f1desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l2f1limited">
                            <label>
                                <input type="checkbox" name="l2f1limited" id="l2f1limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l2f1uses">
                            <label for="l2f1uses" id="l2f1useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l2f1uses" id="l2f1uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l2f1rep">
                            <label for="l2f1rep" id="l2f1replabel" class="sr-only">Replenshes When?</label>
                            <select name="l2f1rep" id="l2f1rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                        
                        <div class="form-group addl2f2">
                            <label>
                                <input type="checkbox" name="addl2f2" id="addl2f2" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l2f2name">
                            <label for="l2f2name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l2f2name" name="l2f2name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l2f2desc">
                            <label for="l2f2desc">Feature Description:</label>
                            <textarea name="l2f2desc" class="form-control" id="l2f2desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l2f2limited">
                            <label>
                                <input type="checkbox" name="l2f2limited" id="l2f2limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l2f2uses">
                            <label for="l2f2uses" id="l2f2useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l2f2uses" id="l2f2uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l2f2rep">
                            <label for="l2f2rep" id="l2f2replabel" class="sr-only">Replenshes When?</label>
                            <select name="l2f2rep" id="l2f2rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                      
                      <div class="form-group addl2f3">
                            <label>
                                <input type="checkbox" name="addl2f3" id="addl2f3" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l2f3name">
                            <label for="l2f3name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l2f3name" name="l2f3name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l2f3desc">
                            <label for="l2f3desc">Feature Description:</label>
                            <textarea name="l2f3desc" class="form-control" id="l2f3desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l2f3limited">
                            <label>
                                <input type="checkbox" name="l2f3limited" id="l2f3limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l2f3uses">
                            <label for="l2f3uses" id="l2f3useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l2f3uses" id="l2f3uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l2f3rep">
                            <label for="l2f3rep" id="l2f3replabel" class="sr-only">Replenshes When?</label>
                            <select name="l2f3rep" id="l2f3rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                    
                    <div class="form-group addl2f4">
                            <label>
                                <input type="checkbox" name="addl2f4" id="addl2f4" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l2f4name">
                            <label for="l2f4name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l2f4name" name="l2f4name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l2f4desc">
                            <label for="l2f4desc">Feature Description:</label>
                            <textarea name="l2f4desc" class="form-control" id="l2f4desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l2f4limited">
                            <label>
                                <input type="checkbox" name="l2f4limited" id="l2f4limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l2f4uses">
                            <label for="l2f4uses" id="l2f4useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l2f4uses" id="l2f4uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l2f4rep">
                            <label for="l2f4rep" id="l2f4replabel" class="sr-only">Replenshes When?</label>
                            <select name="l2f4rep" id="l2f4rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>

                    </div>
                      
                      <div class="modal-split">
                    <h3>Level 3 Features</h3>
                          <div class="form-group addl3f1">
                            <label>
                                <input type="checkbox" name="addl3f1" id="addl3f1" value="y">
                                Add A Feature?                         
                            </label>
                        </div>
                          <div class="form-group l3f1name">
                            <label for="l3f1name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l3f1name" name="l3f1name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l3f1desc">
                            <label for="l3f1desc">Feature Description:</label>
                            <textarea name="l3f1desc" class="form-control" id="l3f1desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l3f1limited">
                            <label>
                                <input type="checkbox" name="l3f1limited" id="l3f1limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l3f1uses">
                            <label for="l3f1uses" id="l3f1useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l3f1uses" id="l3f1uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l3f1rep">
                            <label for="l3f1rep" id="l3f1replabel" class="sr-only">Replenshes When?</label>
                            <select name="l3f1rep" id="l3f1rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                        
                        <div class="form-group addl3f2">
                            <label>
                                <input type="checkbox" name="addl3f2" id="addl3f2" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l3f2name">
                            <label for="l3f2name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l3f2name" name="l3f2name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l3f2desc">
                            <label for="l3f2desc">Feature Description:</label>
                            <textarea name="l3f2desc" class="form-control" id="l3f2desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l3f2limited">
                            <label>
                                <input type="checkbox" name="l3f2limited" id="l3f2limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l3f2uses">
                            <label for="l3f2uses" id="l3f2useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l3f2uses" id="l3f2uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l3f2rep">
                            <label for="l3f2rep" id="l3f2replabel" class="sr-only">Replenshes When?</label>
                            <select name="l3f2rep" id="l3f2rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                      
                      <div class="form-group addl3f3">
                            <label>
                                <input type="checkbox" name="addl3f3" id="addl3f3" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l3f3name">
                            <label for="l3f3name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l3f3name" name="l3f3name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l3f3desc">
                            <label for="l3f3desc">Feature Description:</label>
                            <textarea name="l3f3desc" class="form-control" id="l3f3desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l3f3limited">
                            <label>
                                <input type="checkbox" name="l3f3limited" id="l3f3limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l3f3uses">
                            <label for="l3f3uses" id="l3f3useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l3f3uses" id="l3f3uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l3f3rep">
                            <label for="l3f3rep" id="l3f3replabel" class="sr-only">Replenshes When?</label>
                            <select name="l3f3rep" id="l3f3rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                    
                    <div class="form-group addl3f4">
                            <label>
                                <input type="checkbox" name="addl3f4" id="addl3f4" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l3f4name">
                            <label for="l3f4name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l3f4name" name="l3f4name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l3f4desc">
                            <label for="l3f4desc">Feature Description:</label>
                            <textarea name="l3f4desc" class="form-control" id="l3f4desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l3f4limited">
                            <label>
                                <input type="checkbox" name="l3f4limited" id="l3f4limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l3f4uses">
                            <label for="l3f4uses" id="l3f4useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l3f4uses" id="l3f4uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l3f4rep">
                            <label for="l3f4rep" id="l3f4replabel" class="sr-only">Replenshes When?</label>
                            <select name="l3f4rep" id="l3f4rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>


                    </div>
                      
                      <div class="modal-split">
                    <h3>Level 4 Features</h3>
                          <div class="form-group addl4f1">
                            <label>
                                <input type="checkbox" name="addl4f1" id="addl4f1" value="y">
                                Add A Feature?                         
                            </label>
                        </div>
                          <div class="form-group l4f1name">
                            <label for="l4f1name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l4f1name" name="l4f1name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l4f1desc">
                            <label for="l4f1desc">Feature Description:</label>
                            <textarea name="l4f1desc" class="form-control" id="l4f1desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l4f1limited">
                            <label>
                                <input type="checkbox" name="l4f1limited" id="l4f1limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l4f1uses">
                            <label for="l4f1uses" id="l4f1useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l4f1uses" id="l4f1uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l4f1rep">
                            <label for="l4f1rep" id="l4f1replabel" class="sr-only">Replenshes When?</label>
                            <select name="l4f1rep" id="l4f1rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                        
                        <div class="form-group addl4f2">
                            <label>
                                <input type="checkbox" name="addl4f2" id="addl4f2" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l4f2name">
                            <label for="l4f2name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l4f2name" name="l4f2name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l4f2desc">
                            <label for="l4f2desc">Feature Description:</label>
                            <textarea name="l4f2desc" class="form-control" id="l4f2desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l4f2limited">
                            <label>
                                <input type="checkbox" name="l4f2limited" id="l4f2limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l4f2uses">
                            <label for="l4f2uses" id="l4f2useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l4f2uses" id="l4f2uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l4f2rep">
                            <label for="l4f2rep" id="l4f2replabel" class="sr-only">Replenshes When?</label>
                            <select name="l4f2rep" id="l4f2rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                      
                      <div class="form-group addl4f3">
                            <label>
                                <input type="checkbox" name="addl4f3" id="addl4f3" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l4f3name">
                            <label for="l4f3name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l4f3name" name="l4f3name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l4f3desc">
                            <label for="l4f3desc">Feature Description:</label>
                            <textarea name="l4f3desc" class="form-control" id="l4f3desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l4f3limited">
                            <label>
                                <input type="checkbox" name="l4f3limited" id="l4f3limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l4f3uses">
                            <label for="l4f3uses" id="l4f3useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l4f3uses" id="l4f3uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l4f3rep">
                            <label for="l4f3rep" id="l4f3replabel" class="sr-only">Replenshes When?</label>
                            <select name="l4f3rep" id="l4f3rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                    
                    <div class="form-group addl4f4">
                            <label>
                                <input type="checkbox" name="addl4f4" id="addl4f4" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l4f4name">
                            <label for="l4f4name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l4f4name" name="l4f4name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l4f4desc">
                            <label for="l4f4desc">Feature Description:</label>
                            <textarea name="l4f4desc" class="form-control" id="l4f4desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l4f4limited">
                            <label>
                                <input type="checkbox" name="l4f4limited" id="l4f4limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l4f4uses">
                            <label for="l4f4uses" id="l4f4useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l4f4uses" id="l4f4uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l4f4rep">
                            <label for="l4f4rep" id="l4f4replabel" class="sr-only">Replenshes When?</label>
                            <select name="l4f4rep" id="l4f4rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>


                    </div>
                      
                      <div class="modal-split">
                    <h3>Level 5 Features</h3>
                          <div class="form-group addl5f1">
                            <label>
                                <input type="checkbox" name="addl5f1" id="addl5f1" value="y">
                                Add A Feature?                         
                            </label>
                        </div>
                          <div class="form-group l5f1name">
                            <label for="l5f1name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l5f1name" name="l5f1name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l5f1desc">
                            <label for="l5f1desc">Feature Description:</label>
                            <textarea name="l5f1desc" class="form-control" id="l5f1desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l5f1limited">
                            <label>
                                <input type="checkbox" name="l5f1limited" id="l5f1limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l5f1uses">
                            <label for="l5f1uses" id="l5f1useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l5f1uses" id="l5f1uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l5f1rep">
                            <label for="l5f1rep" id="l5f1replabel" class="sr-only">Replenshes When?</label>
                            <select name="l5f1rep" id="l5f1rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                        
                        <div class="form-group addl5f2">
                            <label>
                                <input type="checkbox" name="addl5f2" id="addl5f2" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l5f2name">
                            <label for="l5f2name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l5f2name" name="l5f2name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l5f2desc">
                            <label for="l5f2desc">Feature Description:</label>
                            <textarea name="l5f2desc" class="form-control" id="l5f2desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l5f2limited">
                            <label>
                                <input type="checkbox" name="l5f2limited" id="l5f2limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l5f2uses">
                            <label for="l5f2uses" id="l5f2useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l5f2uses" id="l5f2uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l5f2rep">
                            <label for="l5f2rep" id="l5f2replabel" class="sr-only">Replenshes When?</label>
                            <select name="l5f2rep" id="l5f2rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                      
                      <div class="form-group addl5f3">
                            <label>
                                <input type="checkbox" name="addl5f3" id="addl5f3" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l5f3name">
                            <label for="l5f3name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l5f3name" name="l5f3name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l5f3desc">
                            <label for="l5f3desc">Feature Description:</label>
                            <textarea name="l5f3desc" class="form-control" id="l5f3desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l5f3limited">
                            <label>
                                <input type="checkbox" name="l5f3limited" id="l5f3limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l5f3uses">
                            <label for="l5f3uses" id="l5f3useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l5f3uses" id="l5f3uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l5f3rep">
                            <label for="l5f3rep" id="l5f3replabel" class="sr-only">Replenshes When?</label>
                            <select name="l5f3rep" id="l5f3rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                    
                    <div class="form-group addl5f4">
                            <label>
                                <input type="checkbox" name="addl5f4" id="addl5f4" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l5f4name">
                            <label for="l5f4name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l5f4name" name="l5f4name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l5f4desc">
                            <label for="l5f4desc">Feature Description:</label>
                            <textarea name="l5f4desc" class="form-control" id="l5f4desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l5f4limited">
                            <label>
                                <input type="checkbox" name="l5f4limited" id="l5f4limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l5f4uses">
                            <label for="l5f4uses" id="l5f4useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l5f4uses" id="l5f4uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l5f4rep">
                            <label for="l5f4rep" id="l5f4replabel" class="sr-only">Replenshes When?</label>
                            <select name="l5f4rep" id="l5f4rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>


                    </div>
                      
                      <div class="modal-split">
                    <h3>Level 6 Features</h3>
                          <div class="form-group addl6f1">
                            <label>
                                <input type="checkbox" name="addl6f1" id="addl6f1" value="y">
                                Add A Feature?                         
                            </label>
                        </div>
                          <div class="form-group l6f1name">
                            <label for="l6f1name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l6f1name" name="l6f1name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l6f1desc">
                            <label for="l6f1desc">Feature Description:</label>
                            <textarea name="l6f1desc" class="form-control" id="l6f1desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l6f1limited">
                            <label>
                                <input type="checkbox" name="l6f1limited" id="l6f1limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l6f1uses">
                            <label for="l6f1uses" id="l6f1useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l6f1uses" id="l6f1uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l6f1rep">
                            <label for="l6f1rep" id="l6f1replabel" class="sr-only">Replenshes When?</label>
                            <select name="l6f1rep" id="l6f1rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                        
                        <div class="form-group addl6f2">
                            <label>
                                <input type="checkbox" name="addl6f2" id="addl6f2" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l6f2name">
                            <label for="l6f2name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l6f2name" name="l6f2name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l6f2desc">
                            <label for="l6f2desc">Feature Description:</label>
                            <textarea name="l6f2desc" class="form-control" id="l6f2desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l6f2limited">
                            <label>
                                <input type="checkbox" name="l6f2limited" id="l6f2limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l6f2uses">
                            <label for="l6f2uses" id="l6f2useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l6f2uses" id="l6f2uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l6f2rep">
                            <label for="l6f2rep" id="l6f2replabel" class="sr-only">Replenshes When?</label>
                            <select name="l6f2rep" id="l6f2rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                      
                      <div class="form-group addl6f3">
                            <label>
                                <input type="checkbox" name="addl6f3" id="addl6f3" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l6f3name">
                            <label for="l6f3name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l6f3name" name="l6f3name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l6f3desc">
                            <label for="l6f3desc">Feature Description:</label>
                            <textarea name="l6f3desc" class="form-control" id="l6f3desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l6f3limited">
                            <label>
                                <input type="checkbox" name="l6f3limited" id="l6f3limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l6f3uses">
                            <label for="l6f3uses" id="l6f3useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l6f3uses" id="l6f3uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l6f3rep">
                            <label for="l6f3rep" id="l6f3replabel" class="sr-only">Replenshes When?</label>
                            <select name="l6f3rep" id="l6f3rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                    
                    <div class="form-group addl6f4">
                            <label>
                                <input type="checkbox" name="addl6f4" id="addl6f4" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l6f4name">
                            <label for="l6f4name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l6f4name" name="l6f4name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l6f4desc">
                            <label for="l6f4desc">Feature Description:</label>
                            <textarea name="l6f4desc" class="form-control" id="l6f4desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l6f4limited">
                            <label>
                                <input type="checkbox" name="l6f4limited" id="l6f4limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l6f4uses">
                            <label for="l6f4uses" id="l6f4useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l6f4uses" id="l6f4uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l6f4rep">
                            <label for="l6f4rep" id="l6f4replabel" class="sr-only">Replenshes When?</label>
                            <select name="l6f4rep" id="l6f4rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>


                    </div>
                      
                      <div class="modal-split">
                    <h3>Level 7 Features</h3>
                          <div class="form-group addl7f1">
                            <label>
                                <input type="checkbox" name="addl7f1" id="addl7f1" value="y">
                                Add A Feature?                         
                            </label>
                        </div>
                          <div class="form-group l7f1name">
                            <label for="l7f1name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l7f1name" name="l7f1name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l7f1desc">
                            <label for="l7f1desc">Feature Description:</label>
                            <textarea name="l7f1desc" class="form-control" id="l7f1desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l7f1limited">
                            <label>
                                <input type="checkbox" name="l7f1limited" id="l7f1limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l7f1uses">
                            <label for="l7f1uses" id="l7f1useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l7f1uses" id="l7f1uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l7f1rep">
                            <label for="l7f1rep" id="l7f1replabel" class="sr-only">Replenshes When?</label>
                            <select name="l7f1rep" id="l7f1rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                        
                        <div class="form-group addl7f2">
                            <label>
                                <input type="checkbox" name="addl7f2" id="addl7f2" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l7f2name">
                            <label for="l7f2name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l7f2name" name="l7f2name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l7f2desc">
                            <label for="l7f2desc">Feature Description:</label>
                            <textarea name="l7f2desc" class="form-control" id="l7f2desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l7f2limited">
                            <label>
                                <input type="checkbox" name="l7f2limited" id="l7f2limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l7f2uses">
                            <label for="l7f2uses" id="l7f2useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l7f2uses" id="l7f2uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l7f2rep">
                            <label for="l7f2rep" id="l7f2replabel" class="sr-only">Replenshes When?</label>
                            <select name="l7f2rep" id="l7f2rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                      
                      <div class="form-group addl7f3">
                            <label>
                                <input type="checkbox" name="addl7f3" id="addl7f3" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l7f3name">
                            <label for="l7f3name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l7f3name" name="l7f3name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l7f3desc">
                            <label for="l7f3desc">Feature Description:</label>
                            <textarea name="l7f3desc" class="form-control" id="l7f3desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l7f3limited">
                            <label>
                                <input type="checkbox" name="l7f3limited" id="l7f3limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l7f3uses">
                            <label for="l7f3uses" id="l7f3useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l7f3uses" id="l7f3uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l7f3rep">
                            <label for="l7f3rep" id="l7f3replabel" class="sr-only">Replenshes When?</label>
                            <select name="l7f3rep" id="l7f3rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                    
                    <div class="form-group addl7f4">
                            <label>
                                <input type="checkbox" name="addl7f4" id="addl7f4" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l7f4name">
                            <label for="l7f4name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l7f4name" name="l7f4name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l7f4desc">
                            <label for="l7f4desc">Feature Description:</label>
                            <textarea name="l7f4desc" class="form-control" id="l7f4desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l7f4limited">
                            <label>
                                <input type="checkbox" name="l7f4limited" id="l7f4limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l7f4uses">
                            <label for="l7f4uses" id="l7f4useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l7f4uses" id="l7f4uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l7f4rep">
                            <label for="l7f4rep" id="l7f4replabel" class="sr-only">Replenshes When?</label>
                            <select name="l7f4rep" id="l7f4rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>


                    </div>
                      
                      <div class="modal-split">
                    <h3>Level 8 Features</h3>
                          <div class="form-group addl8f1">
                            <label>
                                <input type="checkbox" name="addl8f1" id="addl8f1" value="y">
                                Add A Feature?                         
                            </label>
                        </div>
                          <div class="form-group l8f1name">
                            <label for="l8f1name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l8f1name" name="l8f1name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l8f1desc">
                            <label for="l8f1desc">Feature Description:</label>
                            <textarea name="l8f1desc" class="form-control" id="l8f1desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l8f1limited">
                            <label>
                                <input type="checkbox" name="l8f1limited" id="l8f1limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l8f1uses">
                            <label for="l8f1uses" id="l8f1useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l8f1uses" id="l8f1uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l8f1rep">
                            <label for="l8f1rep" id="l8f1replabel" class="sr-only">Replenshes When?</label>
                            <select name="l8f1rep" id="l8f1rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                        
                        <div class="form-group addl8f2">
                            <label>
                                <input type="checkbox" name="addl8f2" id="addl8f2" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l8f2name">
                            <label for="l8f2name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l8f2name" name="l8f2name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l8f2desc">
                            <label for="l8f2desc">Feature Description:</label>
                            <textarea name="l8f2desc" class="form-control" id="l8f2desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l8f2limited">
                            <label>
                                <input type="checkbox" name="l8f2limited" id="l8f2limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l8f2uses">
                            <label for="l8f2uses" id="l8f2useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l8f2uses" id="l8f2uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l8f2rep">
                            <label for="l8f2rep" id="l8f2replabel" class="sr-only">Replenshes When?</label>
                            <select name="l8f2rep" id="l8f2rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                      
                      <div class="form-group addl8f3">
                            <label>
                                <input type="checkbox" name="addl8f3" id="addl8f3" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l8f3name">
                            <label for="l8f3name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l8f3name" name="l8f3name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l8f3desc">
                            <label for="l8f3desc">Feature Description:</label>
                            <textarea name="l8f3desc" class="form-control" id="l8f3desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l8f3limited">
                            <label>
                                <input type="checkbox" name="l8f3limited" id="l8f3limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l8f3uses">
                            <label for="l8f3uses" id="l8f3useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l8f3uses" id="l8f3uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l8f3rep">
                            <label for="l8f3rep" id="l8f3replabel" class="sr-only">Replenshes When?</label>
                            <select name="l8f3rep" id="l8f3rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                    
                    <div class="form-group addl8f4">
                            <label>
                                <input type="checkbox" name="addl8f4" id="addl8f4" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l8f4name">
                            <label for="l8f4name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l8f4name" name="l8f4name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l8f4desc">
                            <label for="l8f4desc">Feature Description:</label>
                            <textarea name="l8f4desc" class="form-control" id="l8f4desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l8f4limited">
                            <label>
                                <input type="checkbox" name="l8f4limited" id="l8f4limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l8f4uses">
                            <label for="l8f4uses" id="l8f4useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l8f4uses" id="l8f4uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l8f4rep">
                            <label for="l8f4rep" id="l8f4replabel" class="sr-only">Replenshes When?</label>
                            <select name="l8f4rep" id="l8f4rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>


                    </div>
                      
                      <div class="modal-split">
                    <h3>Level 9 Features</h3>
                          <div class="form-group addl9f1">
                            <label>
                                <input type="checkbox" name="addl9f1" id="addl9f1" value="y">
                                Add A Feature?                         
                            </label>
                        </div>
                          <div class="form-group l9f1name">
                            <label for="l9f1name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l9f1name" name="l9f1name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l9f1desc">
                            <label for="l9f1desc">Feature Description:</label>
                            <textarea name="l9f1desc" class="form-control" id="l9f1desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l9f1limited">
                            <label>
                                <input type="checkbox" name="l9f1limited" id="l9f1limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l9f1uses">
                            <label for="l9f1uses" id="l9f1useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l9f1uses" id="l9f1uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l9f1rep">
                            <label for="l9f1rep" id="l9f1replabel" class="sr-only">Replenshes When?</label>
                            <select name="l9f1rep" id="l9f1rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                        
                        <div class="form-group addl9f2">
                            <label>
                                <input type="checkbox" name="addl9f2" id="addl9f2" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l9f2name">
                            <label for="l9f2name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l9f2name" name="l9f2name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l9f2desc">
                            <label for="l9f2desc">Feature Description:</label>
                            <textarea name="l9f2desc" class="form-control" id="l9f2desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l9f2limited">
                            <label>
                                <input type="checkbox" name="l9f2limited" id="l9f2limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l9f2uses">
                            <label for="l9f2uses" id="l9f2useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l9f2uses" id="l9f2uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l9f2rep">
                            <label for="l9f2rep" id="l9f2replabel" class="sr-only">Replenshes When?</label>
                            <select name="l9f2rep" id="l9f2rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                      
                      <div class="form-group addl9f3">
                            <label>
                                <input type="checkbox" name="addl9f3" id="addl9f3" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l9f3name">
                            <label for="l9f3name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l9f3name" name="l9f3name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l9f3desc">
                            <label for="l9f3desc">Feature Description:</label>
                            <textarea name="l9f3desc" class="form-control" id="l9f3desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l9f3limited">
                            <label>
                                <input type="checkbox" name="l9f3limited" id="l9f3limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l9f3uses">
                            <label for="l9f3uses" id="l9f3useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l9f3uses" id="l9f3uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l9f3rep">
                            <label for="l9f3rep" id="l9f3replabel" class="sr-only">Replenshes When?</label>
                            <select name="l9f3rep" id="l9f3rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                    
                    <div class="form-group addl9f4">
                            <label>
                                <input type="checkbox" name="addl9f4" id="addl9f4" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l9f4name">
                            <label for="l9f4name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l9f4name" name="l9f4name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l9f4desc">
                            <label for="l9f4desc">Feature Description:</label>
                            <textarea name="l9f4desc" class="form-control" id="l9f4desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l9f4limited">
                            <label>
                                <input type="checkbox" name="l9f4limited" id="l9f4limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l9f4uses">
                            <label for="l9f4uses" id="l9f4useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l9f4uses" id="l9f4uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l9f4rep">
                            <label for="l9f4rep" id="l9f4replabel" class="sr-only">Replenshes When?</label>
                            <select name="l9f4rep" id="l9f4rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>


                    </div>
                      
                      <div class="modal-split">
                    <h3>Level 10 Features</h3>
                          <div class="form-group addl10f1">
                            <label>
                                <input type="checkbox" name="addl10f1" id="addl10f1" value="y">
                                Add A Feature?                         
                            </label>
                        </div>
                          <div class="form-group l10f1name">
                            <label for="l10f1name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l10f1name" name="l10f1name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l10f1desc">
                            <label for="l10f1desc">Feature Description:</label>
                            <textarea name="l10f1desc" class="form-control" id="l10f1desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l10f1limited">
                            <label>
                                <input type="checkbox" name="l10f1limited" id="l10f1limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l10f1uses">
                            <label for="l10f1uses" id="l10f1useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l10f1uses" id="l10f1uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l10f1rep">
                            <label for="l10f1rep" id="l10f1replabel" class="sr-only">Replenshes When?</label>
                            <select name="l10f1rep" id="l10f1rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                        
                        <div class="form-group addl10f2">
                            <label>
                                <input type="checkbox" name="addl10f2" id="addl10f2" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l10f2name">
                            <label for="l10f2name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l10f2name" name="l10f2name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l10f2desc">
                            <label for="l10f2desc">Feature Description:</label>
                            <textarea name="l10f2desc" class="form-control" id="l10f2desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l10f2limited">
                            <label>
                                <input type="checkbox" name="l10f2limited" id="l10f2limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l10f2uses">
                            <label for="l10f2uses" id="l10f2useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l10f2uses" id="l10f2uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l10f2rep">
                            <label for="l10f2rep" id="l10f2replabel" class="sr-only">Replenshes When?</label>
                            <select name="l10f2rep" id="l10f2rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                      
                      <div class="form-group addl10f3">
                            <label>
                                <input type="checkbox" name="addl10f3" id="addl10f3" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l10f3name">
                            <label for="l10f3name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l10f3name" name="l10f3name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l10f3desc">
                            <label for="l10f3desc">Feature Description:</label>
                            <textarea name="l10f3desc" class="form-control" id="l10f3desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l10f3limited">
                            <label>
                                <input type="checkbox" name="l10f3limited" id="l10f3limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l10f3uses">
                            <label for="l10f3uses" id="l10f3useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l10f3uses" id="l10f3uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l10f3rep">
                            <label for="l10f3rep" id="l10f3replabel" class="sr-only">Replenshes When?</label>
                            <select name="l10f3rep" id="l10f3rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                    
                    <div class="form-group addl10f4">
                            <label>
                                <input type="checkbox" name="addl10f4" id="addl10f4" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l10f4name">
                            <label for="l10f4name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l10f4name" name="l10f4name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l10f4desc">
                            <label for="l10f4desc">Feature Description:</label>
                            <textarea name="l10f4desc" class="form-control" id="l10f4desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l10f4limited">
                            <label>
                                <input type="checkbox" name="l10f4limited" id="l10f4limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l10f4uses">
                            <label for="l10f4uses" id="l10f4useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l10f4uses" id="l10f4uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l10f4rep">
                            <label for="l10f4rep" id="l10f4replabel" class="sr-only">Replenshes When?</label>
                            <select name="l10f4rep" id="l10f4rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>


                    </div>
                      
                      <div class="modal-split">
                    <h3>Level 11 Features</h3>
                          <div class="form-group addl11f1">
                            <label>
                                <input type="checkbox" name="addl11f1" id="addl11f1" value="y">
                                Add A Feature?                         
                            </label>
                        </div>
                          <div class="form-group l11f1name">
                            <label for="l11f1name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l11f1name" name="l11f1name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l11f1desc">
                            <label for="l11f1desc">Feature Description:</label>
                            <textarea name="l11f1desc" class="form-control" id="l11f1desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l11f1limited">
                            <label>
                                <input type="checkbox" name="l11f1limited" id="l11f1limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l11f1uses">
                            <label for="l11f1uses" id="l11f1useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l11f1uses" id="l11f1uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l11f1rep">
                            <label for="l11f1rep" id="l11f1replabel" class="sr-only">Replenshes When?</label>
                            <select name="l11f1rep" id="l11f1rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                        
                        <div class="form-group addl11f2">
                            <label>
                                <input type="checkbox" name="addl11f2" id="addl11f2" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l11f2name">
                            <label for="l11f2name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l11f2name" name="l11f2name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l11f2desc">
                            <label for="l11f2desc">Feature Description:</label>
                            <textarea name="l11f2desc" class="form-control" id="l11f2desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l11f2limited">
                            <label>
                                <input type="checkbox" name="l11f2limited" id="l11f2limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l11f2uses">
                            <label for="l11f2uses" id="l11f2useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l11f2uses" id="l11f2uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l11f2rep">
                            <label for="l11f2rep" id="l11f2replabel" class="sr-only">Replenshes When?</label>
                            <select name="l11f2rep" id="l11f2rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                      
                      <div class="form-group addl11f3">
                            <label>
                                <input type="checkbox" name="addl11f3" id="addl11f3" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l11f3name">
                            <label for="l11f3name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l11f3name" name="l11f3name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l11f3desc">
                            <label for="l11f3desc">Feature Description:</label>
                            <textarea name="l11f3desc" class="form-control" id="l11f3desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l11f3limited">
                            <label>
                                <input type="checkbox" name="l11f3limited" id="l11f3limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l11f3uses">
                            <label for="l11f3uses" id="l11f3useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l11f3uses" id="l11f3uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l11f3rep">
                            <label for="l11f3rep" id="l11f3replabel" class="sr-only">Replenshes When?</label>
                            <select name="l11f3rep" id="l11f3rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                    
                    <div class="form-group addl11f4">
                            <label>
                                <input type="checkbox" name="addl11f4" id="addl11f4" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l11f4name">
                            <label for="l11f4name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l11f4name" name="l11f4name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l11f4desc">
                            <label for="l11f4desc">Feature Description:</label>
                            <textarea name="l11f4desc" class="form-control" id="l11f4desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l11f4limited">
                            <label>
                                <input type="checkbox" name="l11f4limited" id="l11f4limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l11f4uses">
                            <label for="l11f4uses" id="l11f4useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l11f4uses" id="l11f4uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l11f4rep">
                            <label for="l11f4rep" id="l11f4replabel" class="sr-only">Replenshes When?</label>
                            <select name="l11f4rep" id="l11f4rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>


                    </div>
                      
                      <div class="modal-split">
                    <h3>Level 12 Features</h3>
                          <div class="form-group addl12f1">
                            <label>
                                <input type="checkbox" name="addl12f1" id="addl12f1" value="y">
                                Add A Feature?                         
                            </label>
                        </div>
                          <div class="form-group l12f1name">
                            <label for="l12f1name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l12f1name" name="l12f1name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l12f1desc">
                            <label for="l12f1desc">Feature Description:</label>
                            <textarea name="l12f1desc" class="form-control" id="l12f1desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l12f1limited">
                            <label>
                                <input type="checkbox" name="l12f1limited" id="l12f1limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l12f1uses">
                            <label for="l12f1uses" id="l12f1useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l12f1uses" id="l12f1uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l12f1rep">
                            <label for="l12f1rep" id="l12f1replabel" class="sr-only">Replenshes When?</label>
                            <select name="l12f1rep" id="l12f1rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                        
                        <div class="form-group addl12f2">
                            <label>
                                <input type="checkbox" name="addl12f2" id="addl12f2" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l12f2name">
                            <label for="l12f2name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l12f2name" name="l12f2name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l12f2desc">
                            <label for="l12f2desc">Feature Description:</label>
                            <textarea name="l12f2desc" class="form-control" id="l12f2desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l12f2limited">
                            <label>
                                <input type="checkbox" name="l12f2limited" id="l12f2limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l12f2uses">
                            <label for="l12f2uses" id="l12f2useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l12f2uses" id="l12f2uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l12f2rep">
                            <label for="l12f2rep" id="l12f2replabel" class="sr-only">Replenshes When?</label>
                            <select name="l12f2rep" id="l12f2rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                      
                      <div class="form-group addl12f3">
                            <label>
                                <input type="checkbox" name="addl12f3" id="addl12f3" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l12f3name">
                            <label for="l12f3name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l12f3name" name="l12f3name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l12f3desc">
                            <label for="l12f3desc">Feature Description:</label>
                            <textarea name="l12f3desc" class="form-control" id="l12f3desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l12f3limited">
                            <label>
                                <input type="checkbox" name="l12f3limited" id="l12f3limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l12f3uses">
                            <label for="l12f3uses" id="l12f3useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l12f3uses" id="l12f3uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l12f3rep">
                            <label for="l12f3rep" id="l12f3replabel" class="sr-only">Replenshes When?</label>
                            <select name="l12f3rep" id="l12f3rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                    
                    <div class="form-group addl12f4">
                            <label>
                                <input type="checkbox" name="addl12f4" id="addl12f4" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l12f4name">
                            <label for="l12f4name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l12f4name" name="l12f4name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l12f4desc">
                            <label for="l12f4desc">Feature Description:</label>
                            <textarea name="l12f4desc" class="form-control" id="l12f4desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l12f4limited">
                            <label>
                                <input type="checkbox" name="l12f4limited" id="l12f4limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l12f4uses">
                            <label for="l12f4uses" id="l12f4useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l12f4uses" id="l12f4uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l12f4rep">
                            <label for="l12f4rep" id="l12f4replabel" class="sr-only">Replenshes When?</label>
                            <select name="l12f4rep" id="l12f4rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>


                    </div>
                      
                      <div class="modal-split">
                    <h3>Level 13 Features</h3>
                          <div class="form-group addl13f1">
                            <label>
                                <input type="checkbox" name="addl13f1" id="addl13f1" value="y">
                                Add A Feature?                         
                            </label>
                        </div>
                          <div class="form-group l13f1name">
                            <label for="l13f1name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l13f1name" name="l13f1name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l13f1desc">
                            <label for="l13f1desc">Feature Description:</label>
                            <textarea name="l13f1desc" class="form-control" id="l13f1desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l13f1limited">
                            <label>
                                <input type="checkbox" name="l13f1limited" id="l13f1limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l13f1uses">
                            <label for="l13f1uses" id="l13f1useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l13f1uses" id="l13f1uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l13f1rep">
                            <label for="l13f1rep" id="l13f1replabel" class="sr-only">Replenshes When?</label>
                            <select name="l13f1rep" id="l13f1rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                        
                        <div class="form-group addl13f2">
                            <label>
                                <input type="checkbox" name="addl13f2" id="addl13f2" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l13f2name">
                            <label for="l13f2name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l13f2name" name="l13f2name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l13f2desc">
                            <label for="l13f2desc">Feature Description:</label>
                            <textarea name="l13f2desc" class="form-control" id="l13f2desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l13f2limited">
                            <label>
                                <input type="checkbox" name="l13f2limited" id="l13f2limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l13f2uses">
                            <label for="l13f2uses" id="l13f2useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l13f2uses" id="l13f2uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l13f2rep">
                            <label for="l13f2rep" id="l13f2replabel" class="sr-only">Replenshes When?</label>
                            <select name="l13f2rep" id="l13f2rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                      
                      <div class="form-group addl13f3">
                            <label>
                                <input type="checkbox" name="addl13f3" id="addl13f3" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l13f3name">
                            <label for="l13f3name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l13f3name" name="l13f3name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l13f3desc">
                            <label for="l13f3desc">Feature Description:</label>
                            <textarea name="l13f3desc" class="form-control" id="l13f3desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l13f3limited">
                            <label>
                                <input type="checkbox" name="l13f3limited" id="l13f3limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l13f3uses">
                            <label for="l13f3uses" id="l13f3useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l13f3uses" id="l13f3uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l13f3rep">
                            <label for="l13f3rep" id="l13f3replabel" class="sr-only">Replenshes When?</label>
                            <select name="l13f3rep" id="l13f3rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                    
                    <div class="form-group addl13f4">
                            <label>
                                <input type="checkbox" name="addl13f4" id="addl13f4" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l13f4name">
                            <label for="l13f4name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l13f4name" name="l13f4name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l13f4desc">
                            <label for="l13f4desc">Feature Description:</label>
                            <textarea name="l13f4desc" class="form-control" id="l13f4desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l13f4limited">
                            <label>
                                <input type="checkbox" name="l13f4limited" id="l13f4limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l13f4uses">
                            <label for="l13f4uses" id="l13f4useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l13f4uses" id="l13f4uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l13f4rep">
                            <label for="l13f4rep" id="l13f4replabel" class="sr-only">Replenshes When?</label>
                            <select name="l13f4rep" id="l13f4rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>



                    </div>
                      
                      <div class="modal-split">
                    <h3>Level 14 Features</h3>
                          <div class="form-group addl14f1">
                            <label>
                                <input type="checkbox" name="addl14f1" id="addl14f1" value="y">
                                Add A Feature?                         
                            </label>
                        </div>
                          <div class="form-group l14f1name">
                            <label for="l14f1name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l14f1name" name="l14f1name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l14f1desc">
                            <label for="l14f1desc">Feature Description:</label>
                            <textarea name="l14f1desc" class="form-control" id="l14f1desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l14f1limited">
                            <label>
                                <input type="checkbox" name="l14f1limited" id="l14f1limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l14f1uses">
                            <label for="l14f1uses" id="l14f1useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l14f1uses" id="l14f1uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l14f1rep">
                            <label for="l14f1rep" id="l14f1replabel" class="sr-only">Replenshes When?</label>
                            <select name="l14f1rep" id="l14f1rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                        
                        <div class="form-group addl14f2">
                            <label>
                                <input type="checkbox" name="addl14f2" id="addl14f2" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l14f2name">
                            <label for="l14f2name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l14f2name" name="l14f2name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l14f2desc">
                            <label for="l14f2desc">Feature Description:</label>
                            <textarea name="l14f2desc" class="form-control" id="l14f2desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l14f2limited">
                            <label>
                                <input type="checkbox" name="l14f2limited" id="l14f2limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l14f2uses">
                            <label for="l14f2uses" id="l14f2useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l14f2uses" id="l14f2uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l14f2rep">
                            <label for="l14f2rep" id="l14f2replabel" class="sr-only">Replenshes When?</label>
                            <select name="l14f2rep" id="l14f2rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                      
                      <div class="form-group addl14f3">
                            <label>
                                <input type="checkbox" name="addl14f3" id="addl14f3" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l14f3name">
                            <label for="l14f3name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l14f3name" name="l14f3name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l14f3desc">
                            <label for="l14f3desc">Feature Description:</label>
                            <textarea name="l14f3desc" class="form-control" id="l14f3desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l14f3limited">
                            <label>
                                <input type="checkbox" name="l14f3limited" id="l14f3limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l14f3uses">
                            <label for="l14f3uses" id="l14f3useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l14f3uses" id="l14f3uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l14f3rep">
                            <label for="l14f3rep" id="l14f3replabel" class="sr-only">Replenshes When?</label>
                            <select name="l14f3rep" id="l14f3rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                    
                    <div class="form-group addl14f4">
                            <label>
                                <input type="checkbox" name="addl14f4" id="addl14f4" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l14f4name">
                            <label for="l14f4name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l14f4name" name="l14f4name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l14f4desc">
                            <label for="l14f4desc">Feature Description:</label>
                            <textarea name="l14f4desc" class="form-control" id="l14f4desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l14f4limited">
                            <label>
                                <input type="checkbox" name="l14f4limited" id="l14f4limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l14f4uses">
                            <label for="l14f4uses" id="l14f4useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l14f4uses" id="l14f4uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l14f4rep">
                            <label for="l14f4rep" id="l14f4replabel" class="sr-only">Replenshes When?</label>
                            <select name="l14f4rep" id="l14f4rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>


                    </div>
                      
                      <div class="modal-split">
                    <h3>Level 15 Features</h3>
                          <div class="form-group addl15f1">
                            <label>
                                <input type="checkbox" name="addl15f1" id="addl15f1" value="y">
                                Add A Feature?                         
                            </label>
                        </div>
                          <div class="form-group l15f1name">
                            <label for="l15f1name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l15f1name" name="l15f1name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l15f1desc">
                            <label for="l15f1desc">Feature Description:</label>
                            <textarea name="l15f1desc" class="form-control" id="l15f1desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l15f1limited">
                            <label>
                                <input type="checkbox" name="l15f1limited" id="l15f1limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l15f1uses">
                            <label for="l15f1uses" id="l15f1useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l15f1uses" id="l15f1uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l15f1rep">
                            <label for="l15f1rep" id="l15f1replabel" class="sr-only">Replenshes When?</label>
                            <select name="l15f1rep" id="l15f1rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                        
                        <div class="form-group addl15f2">
                            <label>
                                <input type="checkbox" name="addl15f2" id="addl15f2" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l15f2name">
                            <label for="l15f2name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l15f2name" name="l15f2name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l15f2desc">
                            <label for="l15f2desc">Feature Description:</label>
                            <textarea name="l15f2desc" class="form-control" id="l15f2desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l15f2limited">
                            <label>
                                <input type="checkbox" name="l15f2limited" id="l15f2limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l15f2uses">
                            <label for="l15f2uses" id="l15f2useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l15f2uses" id="l15f2uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l15f2rep">
                            <label for="l15f2rep" id="l15f2replabel" class="sr-only">Replenshes When?</label>
                            <select name="l15f2rep" id="l15f2rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                      
                      <div class="form-group addl15f3">
                            <label>
                                <input type="checkbox" name="addl15f3" id="addl15f3" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l15f3name">
                            <label for="l15f3name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l15f3name" name="l15f3name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l15f3desc">
                            <label for="l15f3desc">Feature Description:</label>
                            <textarea name="l15f3desc" class="form-control" id="l15f3desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l15f3limited">
                            <label>
                                <input type="checkbox" name="l15f3limited" id="l15f3limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l15f3uses">
                            <label for="l15f3uses" id="l15f3useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l15f3uses" id="l15f3uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l15f3rep">
                            <label for="l15f3rep" id="l15f3replabel" class="sr-only">Replenshes When?</label>
                            <select name="l15f3rep" id="l15f3rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                    
                    <div class="form-group addl15f4">
                            <label>
                                <input type="checkbox" name="addl15f4" id="addl15f4" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l15f4name">
                            <label for="l15f4name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l15f4name" name="l15f4name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l15f4desc">
                            <label for="l15f4desc">Feature Description:</label>
                            <textarea name="l15f4desc" class="form-control" id="l15f4desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l15f4limited">
                            <label>
                                <input type="checkbox" name="l15f4limited" id="l15f4limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l15f4uses">
                            <label for="l15f4uses" id="l15f4useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l15f4uses" id="l15f4uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l15f4rep">
                            <label for="l15f4rep" id="l15f4replabel" class="sr-only">Replenshes When?</label>
                            <select name="l15f4rep" id="l15f4rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>


                    </div>
                      
                      <div class="modal-split">
                    <h3>Level 16 Features</h3>
                          <div class="form-group addl16f1">
                            <label>
                                <input type="checkbox" name="addl16f1" id="addl16f1" value="y">
                                Add A Feature?                         
                            </label>
                        </div>
                          <div class="form-group l16f1name">
                            <label for="l16f1name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l16f1name" name="l16f1name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l16f1desc">
                            <label for="l16f1desc">Feature Description:</label>
                            <textarea name="l16f1desc" class="form-control" id="l16f1desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l16f1limited">
                            <label>
                                <input type="checkbox" name="l16f1limited" id="l16f1limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l16f1uses">
                            <label for="l16f1uses" id="l16f1useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l16f1uses" id="l16f1uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l16f1rep">
                            <label for="l16f1rep" id="l16f1replabel" class="sr-only">Replenshes When?</label>
                            <select name="l16f1rep" id="l16f1rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                        
                        <div class="form-group addl16f2">
                            <label>
                                <input type="checkbox" name="addl16f2" id="addl16f2" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l16f2name">
                            <label for="l16f2name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l16f2name" name="l16f2name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l16f2desc">
                            <label for="l16f2desc">Feature Description:</label>
                            <textarea name="l16f2desc" class="form-control" id="l16f2desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l16f2limited">
                            <label>
                                <input type="checkbox" name="l16f2limited" id="l16f2limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l16f2uses">
                            <label for="l16f2uses" id="l16f2useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l16f2uses" id="l16f2uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l16f2rep">
                            <label for="l16f2rep" id="l16f2replabel" class="sr-only">Replenshes When?</label>
                            <select name="l16f2rep" id="l16f2rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                      
                      <div class="form-group addl16f3">
                            <label>
                                <input type="checkbox" name="addl16f3" id="addl16f3" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l16f3name">
                            <label for="l16f3name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l16f3name" name="l16f3name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l16f3desc">
                            <label for="l16f3desc">Feature Description:</label>
                            <textarea name="l16f3desc" class="form-control" id="l16f3desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l16f3limited">
                            <label>
                                <input type="checkbox" name="l16f3limited" id="l16f3limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l16f3uses">
                            <label for="l16f3uses" id="l16f3useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l16f3uses" id="l16f3uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l16f3rep">
                            <label for="l16f3rep" id="l16f3replabel" class="sr-only">Replenshes When?</label>
                            <select name="l16f3rep" id="l16f3rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                    
                    <div class="form-group addl16f4">
                            <label>
                                <input type="checkbox" name="addl16f4" id="addl16f4" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l16f4name">
                            <label for="l16f4name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l16f4name" name="l16f4name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l16f4desc">
                            <label for="l16f4desc">Feature Description:</label>
                            <textarea name="l16f4desc" class="form-control" id="l16f4desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l16f4limited">
                            <label>
                                <input type="checkbox" name="l16f4limited" id="l16f4limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l16f4uses">
                            <label for="l16f4uses" id="l16f4useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l16f4uses" id="l16f4uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l16f4rep">
                            <label for="l16f4rep" id="l16f4replabel" class="sr-only">Replenshes When?</label>
                            <select name="l16f4rep" id="l16f4rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>

                    </div>
                      
                      <div class="modal-split">
                    <h3>Level 17 Features</h3>
                          <div class="form-group addl17f1">
                            <label>
                                <input type="checkbox" name="addl17f1" id="addl17f1" value="y">
                                Add A Feature?                         
                            </label>
                        </div>
                          <div class="form-group l17f1name">
                            <label for="l17f1name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l17f1name" name="l17f1name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l17f1desc">
                            <label for="l17f1desc">Feature Description:</label>
                            <textarea name="l17f1desc" class="form-control" id="l17f1desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l17f1limited">
                            <label>
                                <input type="checkbox" name="l17f1limited" id="l17f1limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l17f1uses">
                            <label for="l17f1uses" id="l17f1useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l17f1uses" id="l17f1uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l17f1rep">
                            <label for="l17f1rep" id="l17f1replabel" class="sr-only">Replenshes When?</label>
                            <select name="l17f1rep" id="l17f1rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                        
                        <div class="form-group addl17f2">
                            <label>
                                <input type="checkbox" name="addl17f2" id="addl17f2" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l17f2name">
                            <label for="l17f2name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l17f2name" name="l17f2name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l17f2desc">
                            <label for="l17f2desc">Feature Description:</label>
                            <textarea name="l17f2desc" class="form-control" id="l17f2desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l17f2limited">
                            <label>
                                <input type="checkbox" name="l17f2limited" id="l17f2limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l17f2uses">
                            <label for="l17f2uses" id="l17f2useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l17f2uses" id="l17f2uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l17f2rep">
                            <label for="l17f2rep" id="l17f2replabel" class="sr-only">Replenshes When?</label>
                            <select name="l17f2rep" id="l17f2rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                      
                      <div class="form-group addl17f3">
                            <label>
                                <input type="checkbox" name="addl17f3" id="addl17f3" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l17f3name">
                            <label for="l17f3name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l17f3name" name="l17f3name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l17f3desc">
                            <label for="l17f3desc">Feature Description:</label>
                            <textarea name="l17f3desc" class="form-control" id="l17f3desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l17f3limited">
                            <label>
                                <input type="checkbox" name="l17f3limited" id="l17f3limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l17f3uses">
                            <label for="l17f3uses" id="l17f3useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l17f3uses" id="l17f3uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l17f3rep">
                            <label for="l17f3rep" id="l17f3replabel" class="sr-only">Replenshes When?</label>
                            <select name="l17f3rep" id="l17f3rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                    
                    <div class="form-group addl17f4">
                            <label>
                                <input type="checkbox" name="addl17f4" id="addl17f4" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l17f4name">
                            <label for="l17f4name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l17f4name" name="l17f4name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l17f4desc">
                            <label for="l17f4desc">Feature Description:</label>
                            <textarea name="l17f4desc" class="form-control" id="l17f4desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l17f4limited">
                            <label>
                                <input type="checkbox" name="l17f4limited" id="l17f4limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l17f4uses">
                            <label for="l17f4uses" id="l17f4useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l17f4uses" id="l17f4uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l17f4rep">
                            <label for="l17f4rep" id="l17f4replabel" class="sr-only">Replenshes When?</label>
                            <select name="l17f4rep" id="l17f4rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>


                    </div>
                      
                      <div class="modal-split">
                    <h3>Level 18 Features</h3>
                          <div class="form-group addl18f1">
                            <label>
                                <input type="checkbox" name="addl18f1" id="addl18f1" value="y">
                                Add A Feature?                         
                            </label>
                        </div>
                          <div class="form-group l18f1name">
                            <label for="l18f1name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l18f1name" name="l18f1name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l18f1desc">
                            <label for="l18f1desc">Feature Description:</label>
                            <textarea name="l18f1desc" class="form-control" id="l18f1desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l18f1limited">
                            <label>
                                <input type="checkbox" name="l18f1limited" id="l18f1limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l18f1uses">
                            <label for="l18f1uses" id="l18f1useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l18f1uses" id="l18f1uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l18f1rep">
                            <label for="l18f1rep" id="l18f1replabel" class="sr-only">Replenshes When?</label>
                            <select name="l18f1rep" id="l18f1rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                        
                        <div class="form-group addl18f2">
                            <label>
                                <input type="checkbox" name="addl18f2" id="addl18f2" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l18f2name">
                            <label for="l18f2name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l18f2name" name="l18f2name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l18f2desc">
                            <label for="l18f2desc">Feature Description:</label>
                            <textarea name="l18f2desc" class="form-control" id="l18f2desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l18f2limited">
                            <label>
                                <input type="checkbox" name="l18f2limited" id="l18f2limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l18f2uses">
                            <label for="l18f2uses" id="l18f2useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l18f2uses" id="l18f2uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l18f2rep">
                            <label for="l18f2rep" id="l18f2replabel" class="sr-only">Replenshes When?</label>
                            <select name="l18f2rep" id="l18f2rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                      
                      <div class="form-group addl18f3">
                            <label>
                                <input type="checkbox" name="addl18f3" id="addl18f3" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l18f3name">
                            <label for="l18f3name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l18f3name" name="l18f3name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l18f3desc">
                            <label for="l18f3desc">Feature Description:</label>
                            <textarea name="l18f3desc" class="form-control" id="l18f3desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l18f3limited">
                            <label>
                                <input type="checkbox" name="l18f3limited" id="l18f3limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l18f3uses">
                            <label for="l18f3uses" id="l18f3useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l18f3uses" id="l18f3uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l18f3rep">
                            <label for="l18f3rep" id="l18f3replabel" class="sr-only">Replenshes When?</label>
                            <select name="l18f3rep" id="l18f3rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                    
                    <div class="form-group addl18f4">
                            <label>
                                <input type="checkbox" name="addl18f4" id="addl18f4" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l18f4name">
                            <label for="l18f4name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l18f4name" name="l18f4name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l18f4desc">
                            <label for="l18f4desc">Feature Description:</label>
                            <textarea name="l18f4desc" class="form-control" id="l18f4desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l18f4limited">
                            <label>
                                <input type="checkbox" name="l18f4limited" id="l18f4limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l18f4uses">
                            <label for="l18f4uses" id="l18f4useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l18f4uses" id="l18f4uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l18f4rep">
                            <label for="l18f4rep" id="l18f4replabel" class="sr-only">Replenshes When?</label>
                            <select name="l18f4rep" id="l18f4rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>

                    </div>
                      
                      <div class="modal-split">
                    <h3>Level 19 Features</h3>
                          <div class="form-group addl19f1">
                            <label>
                                <input type="checkbox" name="addl19f1" id="addl19f1" value="y">
                                Add A Feature?                         
                            </label>
                        </div>
                          <div class="form-group l19f1name">
                            <label for="l19f1name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l19f1name" name="l19f1name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l19f1desc">
                            <label for="l19f1desc">Feature Description:</label>
                            <textarea name="l19f1desc" class="form-control" id="l19f1desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l19f1limited">
                            <label>
                                <input type="checkbox" name="l19f1limited" id="l19f1limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l19f1uses">
                            <label for="l19f1uses" id="l19f1useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l19f1uses" id="l19f1uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l19f1rep">
                            <label for="l19f1rep" id="l19f1replabel" class="sr-only">Replenshes When?</label>
                            <select name="l19f1rep" id="l19f1rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                        
                        <div class="form-group addl19f2">
                            <label>
                                <input type="checkbox" name="addl19f2" id="addl19f2" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l19f2name">
                            <label for="l19f2name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l19f2name" name="l19f2name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l19f2desc">
                            <label for="l19f2desc">Feature Description:</label>
                            <textarea name="l19f2desc" class="form-control" id="l19f2desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l19f2limited">
                            <label>
                                <input type="checkbox" name="l19f2limited" id="l19f2limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l19f2uses">
                            <label for="l19f2uses" id="l19f2useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l19f2uses" id="l19f2uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l19f2rep">
                            <label for="l19f2rep" id="l19f2replabel" class="sr-only">Replenshes When?</label>
                            <select name="l19f2rep" id="l19f2rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                      
                      <div class="form-group addl19f3">
                            <label>
                                <input type="checkbox" name="addl19f3" id="addl19f3" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l19f3name">
                            <label for="l19f3name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l19f3name" name="l19f3name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l19f3desc">
                            <label for="l19f3desc">Feature Description:</label>
                            <textarea name="l19f3desc" class="form-control" id="l19f3desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l19f3limited">
                            <label>
                                <input type="checkbox" name="l19f3limited" id="l19f3limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l19f3uses">
                            <label for="l19f3uses" id="l19f3useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l19f3uses" id="l19f3uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l19f3rep">
                            <label for="l19f3rep" id="l19f3replabel" class="sr-only">Replenshes When?</label>
                            <select name="l19f3rep" id="l19f3rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                    
                    <div class="form-group addl19f4">
                            <label>
                                <input type="checkbox" name="addl19f4" id="addl19f4" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l19f4name">
                            <label for="l19f4name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l19f4name" name="l19f4name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l19f4desc">
                            <label for="l19f4desc">Feature Description:</label>
                            <textarea name="l19f4desc" class="form-control" id="l19f4desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l19f4limited">
                            <label>
                                <input type="checkbox" name="l19f4limited" id="l19f4limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l19f4uses">
                            <label for="l19f4uses" id="l19f4useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l19f4uses" id="l19f4uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l19f4rep">
                            <label for="l19f4rep" id="l19f4replabel" class="sr-only">Replenshes When?</label>
                            <select name="l19f4rep" id="l19f4rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>

                    </div>
                      
                      <div class="modal-split">
                    <h3>Level 20 Features</h3>
                          <div class="form-group addl20f1">
                            <label>
                                <input type="checkbox" name="addl20f1" id="addl20f1" value="y">
                                Add A Feature?                         
                            </label>
                        </div>
                          <div class="form-group l20f1name">
                            <label for="l20f1name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l20f1name" name="l20f1name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l20f1desc">
                            <label for="l20f1desc">Feature Description:</label>
                            <textarea name="l20f1desc" class="form-control" id="l20f1desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l20f1limited">
                            <label>
                                <input type="checkbox" name="l20f1limited" id="l20f1limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l20f1uses">
                            <label for="l20f1uses" id="l20f1useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l20f1uses" id="l20f1uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l20f1rep">
                            <label for="l20f1rep" id="l20f1replabel" class="sr-only">Replenshes When?</label>
                            <select name="l20f1rep" id="l20f1rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                        
                        <div class="form-group addl20f2">
                            <label>
                                <input type="checkbox" name="addl20f2" id="addl20f2" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l20f2name">
                            <label for="l20f2name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l20f2name" name="l20f2name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l20f2desc">
                            <label for="l20f2desc">Feature Description:</label>
                            <textarea name="l20f2desc" class="form-control" id="l20f2desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l20f2limited">
                            <label>
                                <input type="checkbox" name="l20f2limited" id="l20f2limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l20f2uses">
                            <label for="l20f2uses" id="l20f2useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l20f2uses" id="l20f2uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l20f2rep">
                            <label for="l20f2rep" id="l20f2replabel" class="sr-only">Replenshes When?</label>
                            <select name="l20f2rep" id="l20f2rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                      
                      <div class="form-group addl20f3">
                            <label>
                                <input type="checkbox" name="addl20f3" id="addl20f3" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l20f3name">
                            <label for="l20f3name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l20f3name" name="l20f3name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l20f3desc">
                            <label for="l20f3desc">Feature Description:</label>
                            <textarea name="l20f3desc" class="form-control" id="l20f3desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l20f3limited">
                            <label>
                                <input type="checkbox" name="l20f3limited" id="l20f3limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l20f3uses">
                            <label for="l20f3uses" id="l20f3useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l20f3uses" id="l20f3uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l20f3rep">
                            <label for="l20f3rep" id="l20f3replabel" class="sr-only">Replenshes When?</label>
                            <select name="l20f3rep" id="l20f3rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>
                    
                    <div class="form-group addl20f4">
                            <label>
                                <input type="checkbox" name="addl20f4" id="addl20f4" value="y">
                                Add Another Feature?                         
                            </label>
                        </div>
                        <div class="form-group l20f4name">
                            <label for="l20f4name" class="sr-only">Feature Name</label>
                            <input class="form-control" type="text" id="l20f4name" name="l20f4name" placeholder="Feature Name" maxlength="50">
                        </div>
                        <div class="form-group l20f4desc">
                            <label for="l20f4desc">Feature Description:</label>
                            <textarea name="l20f4desc" class="form-control" id="l20f4desc" rows="3"></textarea>
                        </div>
                        <div class="form-group l20f4limited">
                            <label>
                                <input type="checkbox" name="l20f4limited" id="l20f4limited" value="y">
                                Limit Uses?                         
                            </label>
                        </div>
                        <div class="form-group l20f4uses">
                            <label for="l20f4uses" id="l20f4useslabel" class="sr-only">Number of Uses:</label>
                            <select name="l20f4uses" id="l20f4uses" class="form-control">
                                <option value="" selected>How Many Uses?</option>
                                <option value="92">Str Modifier</option>
                                <option value="93">Dex Modifier</option>
                                <option value="94">Con Modifier</option>
                                <option value="95">Int Modifier</option>
                                <option value="96">Wis Modifier</option>
                                <option value="97">Cha Modifier</option>
                                <option value="98">Proficiency Bonus</option>
                                <option value="99">Half Prof Bonus</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                            </select>
                        </div>
                        <div class="form-group l20f4rep">
                            <label for="l20f4rep" id="l20f4replabel" class="sr-only">Replenshes When?</label>
                            <select name="l20f4rep" id="l20f4rep" class="form-control">
                                <option value="" selected>Replenishes When?</option>
                                <option value="sr">Short Rest</option>
                                <option value="lr">Long Rest</option>
                                <option value="1w">1 Week</option>
                                <option value="4w">4 Weeks</option>
                            </select>
                        </div>


                    </div>
                    

                  <div class="modal-footer">
             
                  </div>
                </div>
              </div>
            </div>
           </div>
        </form>
        
        <!-- Create Background Modal -->
       <form method="post" id="createBackgroundForm"> 
            <div class="modal fade" id="createBackgroundModal" tabindex="-1" role="dialog" aria-labelledby="createBackgroundLabel">
              <div class="modal-dialog" role="document">

                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="createBackgroundLabel">Create a Background</h4>
                      <div id="createBackgroundMessage"></div>

                  </div>

                  <div class="modal-body">

                    <div class="modal-split">
                      </div>
                      
                    <div class="modal-split">
                    
                        
                    </div>
                    

                    <div class="modal-split">
                    
                    </div>
                      
                  </div>

                  <div class="modal-footer">
             
                  </div>
                </div>
              </div>
            </div>
        </form>
        
        <!-- Create Item Modal -->
       <form method="post" id="createItemForm"> 
            <div class="modal fade" id="createItemModal" tabindex="-1" role="dialog" aria-labelledby="createItemLabel">
              <div class="modal-dialog" role="document">

                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="createItemLabel">Create an Item</h4>
                      <div id="createItemMessage"></div>

                  </div>

                  <div class="modal-body">
                    
                    <div class="form-group">
                            <label for="itemname" class="sr-only">Item Name</label>
                            <input class="form-control" type="text" id="itemname" name="itemname" placeholder="Item Name" maxlength="50">
                        </div>
                    <div class="form-group">
                            <label for="itemdescription">Item Description:</label>
                            <textarea name="itemdescription" class="form-control" id="itemdescription" rows="3"></textarea>
                        </div>
                      <div class="form-group">
                            <label for="itemweight" class="sr-only">Item Weight</label>
                            <input class="form-control" type="number" id="itemweight" name="itemweight" placeholder="Item Weight(Lbs) (Numbers Only)" maxlength="6">
                        </div>
                      <div class="form-group">
                            <label for="itemcost" class="sr-only">Item Cost</label>
                            <input class="form-control" type="number" id="itemcost" name="itemcost" placeholder="Item Cost (Numbers Only)" maxlength="6">
                        </div>
                      <div class="form-group">
                            <label for="itemcostcoin" id="itemcostcoin" class="sr-only">Denomination:</label>
                            <select name="itemcostcoin" id="itemcostcoin" class="form-control">
                                <option value="" selected>Select Coin Type</option>
                                <option value="1">Copper</option>
                                <option value="10">Silver</option>
                                <option value="50">Electum</option>
                                <option value="100">Gold</option>
                                <option value="1000">Platinum</option>
                            </select>
                        </div>
                      <div class="form-group minability">
                            <label>
                                <input type="checkbox" name="minability" id="minability" value="y">
                                Add Ability Prerequisite?                         
                            </label>
                        </div>
                      <div class="form-group minabilitytype">
                            <label for="minabtype" id="minabtypelabel" class="sr-only">Which Ability:</label>
                            <select name="minabtype" id="minabtype" class="form-control">
                                <option value="" selected>Which Ability?</option>
                                <option value="1">Strength</option>
                                <option value="2">Dexterity</option>
                                <option value="3">Constitution</option>
                                <option value="4">Intelligence</option>
                                <option value="5">Wisdom</option>
                                <option value="6">Charisma</option>
                            </select>
                        </div>
                      <div class="form-group minabilitytype">
                            <label for="minabscore" id="minabscorelabel" class="sr-only">Min Ability Score:</label>
                            <select name="minabscore" id="minabscore" class="form-control">
                                <option value="" selected>Min Ability Score</option>
                                <option value="11">11</option>
                                <option value="13">13</option>
                                <option value="15">15</option>
                                <option value="17">17</option>
                                <option value="19">19</option>
                            </select>
                        </div>
                      <div class="form-group magicitem">
                            <label>
                                <input type="checkbox" name="magicitem" id="magicitem" value="y">
                                Magic Item?                         
                            </label>
                        </div>
                      <div class="form-group attunement">
                            <label>
                                <input type="checkbox" name="attunement" id="attunement" value="y">
                                Requires Attunement?                         
                            </label>
                        </div>
                      <div class="form-group sitemtype">
                            <label for="sitemtype" id="sitemtypelabel" class="sr-only">Item Type:</label>
                            <select name="sitemtype" id="sitemtype" class="form-control">
                                <option value="" selected>Select Item Type</option>
                                <option value="sa">Armour</option>
                                <option value="sw">Weapon</option>
                                <option value="se">Equipment</option>
                            </select>
                        </div>
                      <div class="form-group mitemtype">
                            <label for="mitemtype" id="mitemtypelabel" class="sr-only">Magic Item Type:</label>
                            <select name="mitemtype" id="mitemtype" class="form-control">
                                <option value="" selected>Select Item Type</option>
                                <option value="ma">Armour</option>
                                <option value="mw">Weapon</option>
                                <option value="mp">Potion</option>
                                <option value="mo">Wonderous</option>
                                <option value="ms">Scroll</option>
                                <option value="mr">Ring</option>
                                <option value="mz">Wand</option>
                            </select>
                        </div>
                      <div class="alert alert-warning" id="magicMessage">Please Place Additional Features in the Item Description.</div>
                      
<!--                      Armour-->
                      <div class="form-group armourtype">
                            <label for="armourtype" id="armourtypelabel" class="sr-only">Armour Category:</label>
                            <select name="armourtype" id="armourtype" class="form-control">
                                <option value="" selected>Armour Category</option>
                                <option value="1">Light</option>
                                <option value="2">Medium</option>
                                <option value="3">Heavy</option>
                                <option value="4">Shield</option>
                            </select>
                        </div>
                      <div class="form-group armourac">
                            <label for="armourac" id="armouraclabel" class="sr-only">AC:</label>
                            <select name="armourac" id="armourac" class="form-control">
                                <option value="" selected>AC</option>
                                <option value="1">11</option>
                                <option value="2">12</option>
                                <option value="3">13</option>
                                <option value="4">14</option>
                                <option value="5">15</option>
                                <option value="6">16</option>
                                <option value="7">17</option>
                                <option value="8">18</option>
                                <option value="9">19</option>
                            </select>
                        </div>
                      <div class="form-group shieldac">
                            <label for="shieldac" id="shieldaclabel" class="sr-only">Shield AC:</label>
                            <select name="shieldac" id="shieldac" class="form-control">
                                <option value="" selected>Shield AC</option>
                                <option value="1">+1</option>
                                <option value="2">+2</option>
                                <option value="3">+3</option>
                                <option value="4">+4</option>
                            </select>
                        </div>
                      <div class="form-group stealthpen armourtype">
                            <label>
                                <input type="checkbox" name="stealthpen" id="stealthpen" value="y">
                                Disadvantage to Stealth?                         
                            </label>
                        </div>
                      
<!--                      Magic Armour-->
                      <div class="form-group marmourtype">
                            <label for="acbonus" id="acbonuslabel" class="sr-only">AC Bonus:</label>
                            <select name="acbonus" id="acbonus" class="form-control">
                                <option value="" selected>AC Bonus</option>
                                <option value="1">+1</option>
                                <option value="2">+2</option>
                                <option value="3">+3</option>
                            </select>
                        </div>
                      <div class="alert alert-warning marmourtype" id="magicArmourMessage">Please Place Additional Features in the Item Description.</div>
                      
<!--                      Weapon-->
                      <div class="form-group weapontype">
                            <label for="weapontype" id="weapontypelabel" class="sr-only">Weapon Category:</label>
                            <select name="weapontype" id="weapontype" class="form-control">
                                <option value="" selected>Weapon Category</option>
                                <option value="1">Simple</option>
                                <option value="2">Martial</option>
                                <option value="3">Exotic</option>
                            </select>
                        </div>
                      <div class="form-group weapontype">
                            <label for="weapdamagedie" id="weapdamagedielabel" class="sr-only">Damage Die:</label>
                            <select name="weapdamagedie" id="weapdamagedie" class="form-control">
                                <option value="" selected>Damage Die</option>
                                <option value="d2">d2</option>
                                <option value="d3">d3</option>
                                <option value="d4">d4</option>
                                <option value="d6">d6</option>
                                <option value="d8">d8</option>
                                <option value="2d4">2d4</option>
                                <option value="d10">d10</option>
                                <option value="d12">d12</option>
                                <option value="2d6">2d6</option>
                                <option value="2d8">2d8</option>
                                <option value="d20">d20</option>
                                <option value="2d10">2d10</option>
                            </select>
                        </div>
                      <div class="form-group weapontype">
                            <label for="weapdamagetype" id="weapdamagetypelabel" class="sr-only">Damage Type:</label>
                            <select name="weapdamagetype" id="weapdamagetype" class="form-control">
                                <option value="" selected>Damage Type</option>
                                <option value="slashing">Slashing</option>         
                                <option value="piercing">Piercing</option>         
                                <option value="bludgeoning">Bludgeoning</option>
                                <option value="poison">Poison</option>               
                                <option value="acid">Acid</option>                  
                                <option value="fire">Fire</option>         
                                <option value="cold">Cold</option>         
                                <option value="radiant">Radiant</option>         
                                <option value="necrotic">Necrotic</option>         
                                <option value="lightning">Lightning</option>         
                                <option value="thunder">Thunder</option>         
                                <option value="force">Force</option>         
                                <option value="psychic">Psychic</option>         
                            </select>
                        </div>
                      <div class="form-group rangedweap weapontype">
                            <label>
                                <input type="checkbox" name="rangedweap" id="rangedweap" value="y">
                                Ranged?                         
                            </label>
                        </div>
                      <div class="form-group needammo">
                            <label>
                                <input type="checkbox" name="needammo" id="needammo" value="y">
                                Requires Ammo?                         
                            </label>
                        </div>
                      <div class="form-group ammotype">
                            <label for="ammoname" class="sr-only">Ammo Name</label>
                            <input class="form-control" type="text" id="ammoname" name="ammoname" placeholder="Ammo Name" maxlength="50">
                        </div>
                      <div class="form-group weaprange">
                            <label for="weapshortrange" class="sr-only">Short Range</label>
                            <input class="form-control" type="number" id="weapshortrange" name="weapshortrange" placeholder="Short Range(ft) (Numbers Only)" maxlength="3">
                        </div>
                      <div class="form-group weaprange">
                            <label for="weaplongrange" class="sr-only">Long Range</label>
                            <input class="form-control" type="number" id="weaplongrange" name="weaplongrange" placeholder="Long Range(ft) (Numbers Only)" maxlength="4">
                        </div>
                      
                      <div class="form-group addweapproperty weapontype">
                            <label>
                                <input type="checkbox" name="addweapproperty" id="addweapproperty" value="y">
                                Add Weapon Properties?                         
                            </label>
                        </div>
                      <div class="form-group weaponprop">
                            <div class="checkbox checkbox-inline">
                                <label>
                                    <input type="checkbox" name="weapfinesse" id="weapfinesse" value="1">
                                    Finesse                               
                                </label>
                                <label>
                                    <input type="checkbox" name="weapheavy" id="weapheavy" value="1">
                                    Heavy                             
                                </label>
                                <label>
                                    <input type="checkbox" name="weaplight" id="weaplight" value="1">
                                    Light                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="weaploading" id="weaploading" value="1">
                                    Loading                               
                                </label>
                                <label>
                                    <input type="checkbox" name="weapreach" id="weapreach" value="1">
                                    Reach                               
                                </label>
                                <label>
                                    <input type="checkbox" name="weapthrown" id="weapthrown" value="1">
                                    Thrown                              
                                </label>
                                <label>
                                    <input type="checkbox" name="weap2hand" id="weap2hand" value="1">
                                    Two-Handed                            
                                </label>
                                <label>
                                    <input type="checkbox" name="weapversatile" id="weapversatile" value="1">
                                    Versatile                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="weapsilvered" id="weapsilvered" value="1">
                                    Silvered                               
                                </label>
                            </div>
                        </div>
                      
                      <div class="form-group weaponprop">
                            <label for="specialweapprop">Special Properties: </label>
                            <textarea name="specialweapprop" class="form-control" id="specialweapprop" rows="2"></textarea>
                        </div>
                  </div>
                    
<!--                    Magic Weapon-->
                    <div class="form-group mweapontype">
                            <label for="weapbonus" id="weapbonuslabel" class="sr-only">Weapon Bonus:</label>
                            <select name="weapbonus" id="weapbonus" class="form-control">
                                <option value="" selected>Weapon Bonus</option>
                                <option value="1">+1</option>
                                <option value="2">+2</option>
                                <option value="3">+3</option>
                            </select>
                        </div>
                      <div class="alert alert-warning mweapontype" id="magicWeaponMessage">Please Place Additional Features in the Item Description.</div>

                  <div class="modal-footer">
                    <input class="btn btnColor" name="createitem" type="submit" value="Create">
                    <button type="button" class="btn cancelBtn" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
        </form>
        
        <!-- Create Spell Modal -->
       <form method="post" id="createSpellForm"> 
            <div class="modal fade modalMulti" id="createSpellModal" tabindex="-1" role="dialog" aria-labelledby="createSpellLabel">
              <div class="modal-dialog" role="document">

                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="createSpellLabel">Create a Spell</h4>
                      <div id="createSpellMessage"></div>

                  </div>

                  <div class="modal-body">
                    <div class="modal-split">
                    
                    <div class="form-group">
                            <label for="spellname" class="sr-only">Spell Name</label>
                            <input class="form-control" type="text" id="spellname" name="spellname" placeholder="Spell Name" maxlength="50">
                        </div>
                    <div class="form-group">
                            <label for="spelldescription">Spell Description:</label>
                            <textarea name="spelldescription" class="form-control" id="spelldescription" rows="3"></textarea>
                        </div>
                      <div class="form-group">
                            <label for="spelllevel" id="spelllevellabel" class="sr-only">Spell Level:</label>
                            <select name="spelllevel" id="spelllevel" class="form-control">
                                <option value="" selected>Spell Level</option>
                                <option value="c">Cantrip</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                            </select>
                        </div>
                      <div class="form-group">
                            <label for="spellschool" id="spellschoollabel" class="sr-only">Spell School:</label>
                            <select name="spellschool" id="spellschool" class="form-control">
                                <option value="" selected>Spell School</option>
                                <option value="abj">Abjuration</option>
                                <option value="con">Conjuration</option>
                                <option value="div">Divination</option>
                                <option value="enc">Enchantment</option>
                                <option value="evo">Evocation</option>
                                <option value="ill">Illusion</option>
                                <option value="nec">Necromancy</option>
                                <option value="tra">Transmutation</option>
                            </select>
                        </div>
                      <div class="form-group">
                            <label for="castingtime" id="castingtimelabel" class="sr-only">Casting Time:</label>
                            <select name="castingtime" id="castingtime" class="form-control">
                                <option value="" selected>Casting Time</option>
                                <option value="Bonus Action">Bonus Action</option>
                                <option value="Action">Action</option>
                                <option value="Full Turn">Full Turn</option>
                                <option value="Full Round">Full Round</option>
                                <option value="1 Minute">1 Minute</option>
                                <option value="10 Minutes">10 Minutes</option>
                                <option value="30 Minutes">30 Minutes</option>
                                <option value="1 Hour">1 Hour</option>
                                <option value="8 Hours">8 Hours</option>
                                <option value="24 Hours">24 Hours</option>
                            </select>
                        </div>
                      <div class="form-group ritualspell">
                            <label>
                                <input type="checkbox" name="ritualspell" id="ritualspell" value="y">
                                Ritual Spell?                         
                            </label>
                        </div>
                      <div class="form-group ritualcastingtime">
                            <label for="ritualcastingtime" id="ritualcastingtimelabel" class="sr-only">Casting Time:</label>
                            <select name="ritualcastingtime" id="ritualcastingtime" class="form-control">
                                <option value="" selected>Casting Time</option>
                                <option value="10 Minutes">10 Minutes</option>
                                <option value="30 Minutes">30 Minutes</option>
                                <option value="1 Hour">1 Hour</option>
                                <option value="8 Hours">8 Hours</option>
                                <option value="24 Hours">24 Hours</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="spellduration" id="spelldurationlabel" class="sr-only">Duration:</label>
                            <select name="spellduration" id="spellduration" class="form-control">
                                <option value="" selected>Duration</option>
                                <option value="Instant">Instantaneous</option>
                                <option value="Full Round">Full Round</option>
                                <option value="1 Minute">1 Minute</option>
                                <option value="10 Minutes">10 Minutes</option>
                                <option value="30 Minutes">30 Minutes</option>
                                <option value="1 Hour">1 Hour</option>
                                <option value="8 Hours">8 Hours</option>
                                <option value="24 Hours">24 Hours</option>
                                <option value="1 Week">1 Week</option>
                                <option value="1 Year">1 Year</option>
                                <option value="Permanent">Permanent</option>
                            </select>
                        </div>
                      <div class="form-group reqconcentrate">
                            <label>
                                <input type="checkbox" name="reqconcentrate" id="reqconcentrate" value="y">
                                Requires Concentration?                         
                            </label>
                        </div>
                        <h4>Who Can Use This Spell?</h4>
                      <div class="form-group spellcomp">
                            <div class="checkbox checkbox-inline">
                                <label>
                                    <input type="checkbox" name="bardspell" id="bardspell" value="1">
                                    Bard                              
                                </label>
                                <label>
                                    <input type="checkbox" name="clericspell" id="clericspell" value="1">
                                    Cleric                           
                                </label>
                                <label>
                                    <input type="checkbox" name="druidspell" id="druidspell" value="1">
                                    Druid                              
                                </label> 
                                <label>
                                    <input type="checkbox" name="paladinspell" id="paladinspell" value="1">
                                    Paladin                              
                                </label>
                                <label>
                                    <input type="checkbox" name="rangerspell" id="rangerspell" value="1">
                                    Ranger                          
                                </label>
                                <label>
                                    <input type="checkbox" name="sorcererspell" id="sorcererspell" value="1">
                                    Sorcerer                          
                                </label> 
                                <label>
                                    <input type="checkbox" name="warlockspell" id="warlockspell" value="1">
                                    Warlock                          
                                </label>
                                <label>
                                    <input type="checkbox" name="wizardspell" id="wizardspell" value="1">
                                    Wizard                          
                                </label> 
                            </div>
                        </div>
                    </div>
                      <div class="modal-split">
                          <h3>Range and AOE</h3>
                      <div class="form-group rangetouch">
                            <label>
                                <input type="checkbox" name="rangetouch" id="rangetouch" value="y">
                                Range of Touch?                         
                            </label>
                        </div>
                      <div class="form-group spellrange">
                            <label for="spellrange" class="sr-only">Spell Range</label>
                            <input class="form-control" type="number" id="spellrange" name="spellrange" placeholder="Spell Range(ft) (Numbers Only)" maxlength="3">
                        </div>
                      <div class="form-group addaoe">
                            <label>
                                <input type="checkbox" name="addaoe" id="addaoe" value="y">
                                Add Area of Effect?                         
                            </label>
                        </div>
                      <div class="form-group aoetemp">
                            <label for="aoetemp" id="aoetemplabel" class="sr-only">AOE Template:</label>
                            <select name="aoetemp" id="aoetemp" class="form-control">
                                <option value="" selected>Which AOE?</option>
                                <option value="cone">Cone</option>
                                <option value="cube">Cube</option>
                                <option value="cylinder">Cylinder</option>
                                <option value="line">Line</option>
                                <option value="sphere">Sphere</option>
                            </select>
                        </div>
                      <div class="form-group aoetemp">
                            <label for="aoerange" class="sr-only">AOE Range</label>
                            <input class="form-control" type="number" id="aoerange" name="aoerange" placeholder="AOE Range(ft) (Numbers Only)" maxlength="3">
                        </div>
                  </div>
                    <div class="modal-split">
                    
                      <h3>Components and Saves</h3>
                      <div class="form-group spellcomp">
                            <div class="checkbox checkbox-inline">
                                <label>
                                    <input type="checkbox" name="verbalcomp" id="verbalcomp" value="1">
                                    Verbal                               
                                </label>
                                <label>
                                    <input type="checkbox" name="somaticcomp" id="somaticcomp" value="1">
                                    Somatic                           
                                </label>
                                <label>
                                    <input type="checkbox" name="materialcomp" id="materialcomp" value="1">
                                    Material                              
                                </label> 
                            </div>
                        </div>
                      <div class="form-group materialspellcomp">
                            <label for="materialcost" class="sr-only">Material Cost</label>
                            <input class="form-control" type="number" id="materialcost" name="materialcost" placeholder="Material Cost (Numbers Only)" maxlength="6">
                        </div>
                      <div class="form-group materialspellcomp">
                            <label for="materialcostcoin" id="materialcostcoinlabel" class="sr-only">Denomination:</label>
                            <select name="materialcostcoin" id="materialcostcoin" class="form-control">
                                <option value="" selected>Select Coin Type</option>
                                <option value="1">Copper</option>
                                <option value="10">Silver</option>
                                <option value="50">Electum</option>
                                <option value="100">Gold</option>
                                <option value="1000">Platinum</option>
                            </select>
                        </div>
                      <div class="form-group materialspellcomp">
                            <label for="materialdescription">Material Description:</label>
                            <textarea name="materialdescription" class="form-control" id="materialdescription" rows="3"></textarea>
                        </div>
                        <div class="form-group spellsaveability">
                            <label>
                                <input type="checkbox" name="spellsaveability" id="spellsaveability" value="y">
                                Add Save?                         
                            </label>
                        </div>
                      <div class="form-group spellsavetype">
                            <label for="spellsavetype" id="spellsavetypelabel" class="sr-only">Which Ability:</label>
                            <select name="spellsavetype" id="spellsavetype" class="form-control">
                                <option value="" selected>Which Ability?</option>
                                <option value="strength">Strength</option>
                                <option value="dexterity">Dexterity</option>
                                <option value="constitution">Constitution</option>
                                <option value="intelligence">Intelligence</option>
                                <option value="wisdom">Wisdom</option>
                                <option value="charisma">Charisma</option>
                            </select>
                        </div>
                      </div>  
                    <div class="modal-split">
                        <h3>Damage, Healing and Status Effects</h3>
                      <div class="form-group">
                            <label>
                                <input type="checkbox" name="damagespell" id="damagespell" value="y">
                                Deals Damage/Healing?                         
                            </label>
                        </div>
                      <div class="form-group damagedealingspell">
                            <label for="spelldamagedie" id="spelldamagedielabel" class="sr-only">Damage Die:</label>
                            <select name="spelldamagedie" id="spelldamagedie" class="form-control">
                                <option value="" selected>Damage/Heal Die</option>
                                <option value="d2">d2</option>
                                <option value="d3">d3</option>
                                <option value="d4">d4</option>
                                <option value="d6">d6</option>
                                <option value="d8">d8</option>
                                <option value="d10">d10</option>
                                <option value="d12">d12</option>
                                <option value="d20">d20</option>
                            </select>
                        </div>
                      <div class="form-group damagedealingspell">
                            <label for="noofdamagedice" class="sr-only">Number of Damage Dice</label>
                            <input class="form-control" type="number" id="noofdamagedice" name="noofdamagedice" placeholder="Number of Dice (Numbers Only)" maxlength="6">
                        </div>
                      <div class="form-group damagedealingspell">
                            <label for="spelldamagetype" id="spelldamagetypelabel" class="sr-only">Damage Type:</label>
                            <select name="spelldamagetype" id="spelldamagetype" class="form-control">
                                <option value="" selected>Damage/Heal Type</option>
                                <option value="healing">Healing</option>         
                                <option value="slashing">Slashing</option>         
                                <option value="piercing">Piercing</option>         
                                <option value="bludgeoning">Bludgeoning</option>
                                <option value="poison">Poison</option>               
                                <option value="acid">Acid</option>                  
                                <option value="fire">Fire</option>         
                                <option value="cold">Cold</option>         
                                <option value="radiant">Radiant</option>         
                                <option value="necrotic">Necrotic</option>         
                                <option value="lightning">Lightning</option>         
                                <option value="thunder">Thunder</option>         
                                <option value="force">Force</option>         
                                <option value="psychic">Psychic</option>         
                            </select>
                        </div>
                        <div class="form-group damagedealingspell">
                            <label for="spelldamagefreq" id="spelldamagefreqlabel" class="sr-only">Damage Frequency:</label>
                            <select name="spelldamagefreq" id="spelldamagefreq" class="form-control">
                                <option value="" selected>Damage/Heal Frequency</option>
                                <option value="once">Once</option>         
                                <option value="round">Every Round</option>         
                                <option value="min">Every Minute</option>         
                                <option value="ten">Every 10 Minutes</option>
                                <option value="hour">Every Hour</option>
                                <option value="day">Every Day</option>        
                            </select>
                        </div>
                      <div class="form-group damagedealingspell">
                            <label>
                                <input type="checkbox" name="damagespell1" id="damagespell1" value="y">
                                Add More Damage/Healing?                         
                            </label>
                        </div>
                      <div class="form-group damagedealingspell1">
                            <label for="spelldamagedie1" id="spelldamagedielabel1" class="sr-only">Damage Die:</label>
                            <select name="spelldamagedie1" id="spelldamagedie1" class="form-control">
                                <option value="" selected>Damage/Heal Die</option>
                                <option value="d2">d2</option>
                                <option value="d3">d3</option>
                                <option value="d4">d4</option>
                                <option value="d6">d6</option>
                                <option value="d8">d8</option>
                                <option value="d10">d10</option>
                                <option value="d12">d12</option>
                                <option value="d20">d20</option>
                            </select>
                        </div>
                      <div class="form-group damagedealingspell1">
                            <label for="noofdamagedice1" class="sr-only">Number of Damage Dice</label>
                            <input class="form-control" type="number" id="noofdamagedice1" name="noofdamagedice1" placeholder="Number of Dice (Numbers Only)" maxlength="6">
                        </div>
                      <div class="form-group damagedealingspell1">
                            <label for="spelldamagetype1" id="spelldamagetypelabel1" class="sr-only">Damage Type:</label>
                            <select name="spelldamagetype1" id="spelldamagetype1" class="form-control">
                                <option value="" selected>Damage/Heal Type</option>
                                <option value="healing">Healing</option>         
                                <option value="slashing">Slashing</option>         
                                <option value="piercing">Piercing</option>         
                                <option value="bludgeoning">Bludgeoning</option>
                                <option value="poison">Poison</option>               
                                <option value="acid">Acid</option>                  
                                <option value="fire">Fire</option>         
                                <option value="cold">Cold</option>         
                                <option value="radiant">Radiant</option>         
                                <option value="necrotic">Necrotic</option>         
                                <option value="lightning">Lightning</option>         
                                <option value="thunder">Thunder</option>         
                                <option value="force">Force</option>         
                                <option value="psychic">Psychic</option>         
                            </select>
                        </div>
                        <div class="form-group damagedealingspell1">
                            <label for="spelldamagefreq1" id="spelldamagefreqlabel1" class="sr-only">Damage Frequency:</label>
                            <select name="spelldamagefreq1" id="spelldamagefreq1" class="form-control">
                                <option value="" selected>Damage/Heal Frequency</option>
                                <option value="once">Once</option>         
                                <option value="round">Every Round</option>         
                                <option value="min">Every Minute</option>         
                                <option value="ten">Every 10 Minutes</option>
                                <option value="hour">Every Hour</option>
                                <option value="day">Every Day</option>         
                            </select>
                        </div>
                      <div class="form-group damagedealingspell1">
                            <label>
                                <input type="checkbox" name="damagespell2" id="damagespell2" value="y">
                                Add More Damage/Healing?                         
                            </label>
                        </div>
                      <div class="form-group damagedealingspell2">
                            <label for="spelldamagedie2" id="spelldamagedielabel2" class="sr-only">Damage Die:</label>
                            <select name="spelldamagedie2" id="spelldamagedie2" class="form-control">
                                <option value="" selected>Damage/Heal Die</option>
                                <option value="d2">d2</option>
                                <option value="d3">d3</option>
                                <option value="d4">d4</option>
                                <option value="d6">d6</option>
                                <option value="d8">d8</option>
                                <option value="d10">d10</option>
                                <option value="d12">d12</option>
                                <option value="d20">d20</option>
                            </select>
                        </div>
                      <div class="form-group damagedealingspell2">
                            <label for="noofdamagedice2" class="sr-only">Number of Damage Dice</label>
                            <input class="form-control" type="number" id="noofdamagedice2" name="noofdamagedice2" placeholder="Number of Dice (Numbers Only)" maxlength="6">
                        </div>
                      <div class="form-group damagedealingspell2">
                            <label for="spelldamagetype2" id="spelldamagetypelabel2" class="sr-only">Damage Type:</label>
                            <select name="spelldamagetype2" id="spelldamagetype2" class="form-control">
                                <option value="" selected>Damage/Heal Type</option>
                                <option value="healing">Healing</option>         
                                <option value="slashing">Slashing</option>         
                                <option value="piercing">Piercing</option>         
                                <option value="bludgeoning">Bludgeoning</option>
                                <option value="poison">Poison</option>               
                                <option value="acid">Acid</option>                  
                                <option value="fire">Fire</option>         
                                <option value="cold">Cold</option>         
                                <option value="radiant">Radiant</option>         
                                <option value="necrotic">Necrotic</option>         
                                <option value="lightning">Lightning</option>         
                                <option value="thunder">Thunder</option>         
                                <option value="force">Force</option>         
                                <option value="psychic">Psychic</option>         
                            </select>
                        </div>
                        <div class="form-group damagedealingspell2">
                            <label for="spelldamagefreq2" id="spelldamagefreqlabel2" class="sr-only">Damage Frequency:</label>
                            <select name="spelldamagefreq2" id="spelldamagefreq2" class="form-control">
                                <option value="" selected>Damage/Heal Frequency</option>
                                <option value="once">Once</option>         
                                <option value="round">Every Round</option>         
                                <option value="min">Every Minute</option>         
                                <option value="ten">Every 10 Minutes</option>
                                <option value="hour">Every Hour</option>
                                <option value="day">Every Day</option>         
                            </select>
                        </div>
                      <div class="form-group">
                            <label>
                                <input type="checkbox" name="conditionspell" id="conditionspell" value="y">
                                Applies a Condition?                         
                            </label>
                        </div>
                      <div class="form-group conditiondealingspell">
                            <div class="checkbox checkbox-inline">
                                <label>
                                    <input type="checkbox" name="conblinded" id="conblinded" value="1">
                                    Blinded                               
                                </label>
                                <label>
                                    <input type="checkbox" name="concharmed" id="concharmed" value="1">
                                    Charmed                             
                                </label>
                                <label>
                                    <input type="checkbox" name="condeafened" id="condeafened" value="1">
                                    Deafened                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="conexhaustion" id="conexhaustion" value="1">
                                    Exhaustion                               
                                </label>
                                <label>
                                    <input type="checkbox" name="confrightened" id="confrightened" value="1">
                                    Frightened                               
                                </label>
                                <label>
                                    <input type="checkbox" name="congrappled" id="congrappled" value="1">
                                    Grappled                              
                                </label>
                                <label>
                                    <input type="checkbox" name="conincapacitated" id="conincapacitated" value="1">
                                    Incapacitated                           
                                </label>
                                <label>
                                    <input type="checkbox" name="coninvisible" id="coninvisible" value="1">
                                    Invisible                               
                                </label>
                                     <label>
                                    <input type="checkbox" name="conparalyzed" id="conparalyzed" value="1">
                                    Paralyzed                               
                                </label>
                                <label>
                                    <input type="checkbox" name="conpetrified" id="conpetrified" value="1">
                                    Petrified                               
                                </label>
                                <label>
                                    <input type="checkbox" name="conpoisoned" id="conpoisoned" value="1">
                                    Poisoned                               
                                </label>
                                <label>
                                    <input type="checkbox" name="conprone" id="conprone" value="1">
                                    Prone                               
                                </label>
                                <label>
                                    <input type="checkbox" name="conrestrained" id="conrestrained" value="1">
                                    Restrained                               
                                </label>
                                <label>
                                    <input type="checkbox" name="constunned" id="constunned" value="1">
                                    Stunned                               
                                </label>
                                <label>
                                    <input type="checkbox" name="conunconscious" id="conunconscious" value="1">
                                    Unconscious                               
                                </label>
                            </div>
                        </div>
                      <div class="alert alert-warning" id="magicSpellMessage">Please Place All Additional Effects in the Spell Description.</div>
                    </div>
                    
                </div>
                  <div class="modal-footer">
             
                  </div>
                </div>
              </div>
            </div>
        </form>
        
        <!-- Create Feat Modal -->
       <form method="post" id="createFeatForm"> 
            <div class="modal fade" id="createFeatModal" tabindex="-1" role="dialog" aria-labelledby="createFeatLabel">
              <div class="modal-dialog" role="document">

                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="createFeatLabel">Create a Feat</h4>
                      <div id="createFeatMessage"></div>

                  </div>

                  <div class="modal-body">
                      <div class="form-group">
                            <label for="featname" class="sr-only">Feat Name</label>
                            <input class="form-control" type="text" id="featname" name="featname" placeholder="Feat Name" maxlength="50">
                        </div>
                    <div class="form-group">
                            <label for="featdescription">Feat Description:</label>
                            <textarea name="featdescription" class="form-control" id="featdescription" rows="3"></textarea>
                        </div>
                    
                      
                  </div>

                  <div class="modal-footer">
             
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
        
<!--        Calender CDN-->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
        <script src="calendar/js/calendar.js"></script>

<!--        Custom JS        -->
        <script src="js/sticky.js"></script>
        <script src="js/nav.js"></script>
        <script src="js/adventuremanager.js"></script>
        <script src="js/user.js"></script>
        
    </body>