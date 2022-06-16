<?php
ob_start();
session_start();
include('./php/connection.php');

//remember me
include('./php/rememberme.php');

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Help Centre - Contact Us</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <meta name="description" content="#">
        <link rel="icon" href="#">
        <!-- Bootstrap & Fonts CSS -->
        <link rel="stylesheet" href="boot/css/bootstrap.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href='https://fonts.googleapis.com/css?family=Arvo' rel='stylesheet' type='text/css'>
        <link href="https://fonts.googleapis.com/css2?family=Frijole&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Ceviche+One&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Waiting+for+the+Sunrise&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
        <!--        JQuery & Bootstrap JS Scripts-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="boot/js/bootstrap.min.js"></script>
<!--        JQuery UI-->
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/eggplant/jquery-ui.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://www.google.com/recaptcha/api.js"></script>
<!--        Custom Styling-->
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/forumstyle.css">
        
        
    </head>
    <body>
        <!--    Header-->
      <div class="jumbotron">
        <div class="container headerContainer">
            <img src="css/images/angel.png" class="logo">
            <h1 id="forumHeader">Contact Us</h1>  
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
      
      <div class="container" id="forumContainer">
            <div class="row">
                <div class="col-sm-6 col-sm-offset-1 contactForm">
                    <h1>Contact Us:</h1>
                    <p>Leave your details with us and one of our team will endeavour to<br /> get back to you later that day or as soon as possible.</p>
                    <p><emphasis>(*Required)</emphasis></p>
<?php
                    //reCaptcha stuff
                    function reCaptcha($recaptcha){
                      $secret = "6LdcFqwbAAAAAFBDcpllyANYjYe1mukTtpgv6KtU";
                      $ip = $_SERVER['REMOTE_ADDR'];

                      $postvars = array("secret"=>$secret, "response"=>$recaptcha, "remoteip"=>$ip);
                      $url = "https://www.google.com/recaptcha/api/siteverify";
                      $ch = curl_init();
                      curl_setopt($ch, CURLOPT_URL, $url);
                      curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                      curl_setopt($ch, CURLOPT_TIMEOUT, 10);
                      curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
                      $data = curl_exec($ch);
                      curl_close($ch);

                      return json_decode($data, true);
                    }

                    $recaptcha = $_POST['g-recaptcha-response'];
                    $res = reCaptcha($recaptcha);
                    if(!$res['success']){
                      // Error
                        $errors .= '<p><strong>reCAPTCHA thinks you\'re a Robot.</strong></p>';
                    }
                    
                    //User input variables
                    $name = $_POST["name"];
                    $email = $_POST["email"];
                    $tel = $_POST["tel"];
                    $message = $_POST["message"];
                    //Error messages
                    $missingName = "<p><strong>Please enter your name.</strong></p>";
                    $missingEmail = "<p><strong>Please enter your email address.</strong></p>";
                    $invalidEmail = "<p><strong>Please enter a valid email address.</strong></p>";
                    $missingMessage = "<p><strong>Please tell us a bit about the problem in the Message field.</strong></p>";
                    //if user has submitted the form
                    if($_POST["submit"]){
                        //check for errors
                        if(!$name){
                            $errors .= $missingName;
                        }else{
                            $name = filter_var($name, FILTER_SANITIZE_STRING);
                        }
                        if(!$email){
                            $errors .= $missingEmail;
                        }else{
                            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                                $errors .= $invalidEmail;
                            }
                        }
                        if(!$message){
                            $errors .= $missingMessage;
                        }else{
                            $message = filter_var($message, FILTER_SANITIZE_STRING);
                        }
                            //if there are any errors
                        if($errors){
                            $resultMessage = '<div class="alert alert-danger">' . $errors . '</div>';
                        }else{//no errors
                            $to = "cs@thelittledarkone.com";
                            $subject = "customer message from website";
                            $message = "
                            <p>Name: $name.</p>
                            <p>Email: $email.</p>
                            <p>Phone Number: $tel.</p>
                            <p>Message:</p>
                            <p><strong>$message</strong></p>";
                            $headers = "Content-type: text/html";
                            if(mail($to, $subject, $message, $headers)){
                                //print success message
                                $resultMessage = '<div class="alert alert-success">Thanks for your message. We will get back to you as soon as we are able.</div>';
                            }else{
                                //print warning message
                                $resultMessage = '<div class="alert alert-warning">Unable to send message. Please try again later.</div>';
                            }
                        }
                    //print result message
                        echo $resultMessage;
                    }
?>                    
                    <form action="contact.php" method="post">
                        <div class="form-group">
                            <label for="name">Name:*</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $_POST["name"];?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:*</label>
                            <input type="email" name="email" id="contactemail" class="form-control" value="<?php echo $_POST["email"];?>">
                        </div>
                        <div class="form-group">
                            <label for="tel">Phone Number:</label>
                            <input type="tel" name="tel" id="tel" class="form-control" value="<?php echo $_POST["tel"];?>">
                        </div>
                        <div class="form-group">
                            <label for="message">Message:*</label>
                            <textarea name="message" id="message" class="form-control" rows="5" placeholder="Please, briefly describe the problem for us"><?php echo $_POST["message"];?></textarea>
                        </div>
                        <div class="g-recaptcha brochure__form__captcha" data-sitekey="6LdcFqwbAAAAAGDW7gPBN-f7l5eiv3JF2e_CNVRT"></div>
                        <input type="submit" name="submit" class="btn btn-success btn-lg" value="Send Message">
                    </form>
                </div>
                <div class="col-sm-4 col-sm-offset-1 socialContainer">
                    <h2>Follow Us:</h2>
                    <p>Follow us on social media for service updates, instant chat, and more...</p>
                    <a href="http://www.facebook.com/thelittledark1"><img src="css/images/facebook_logo.png"></a>
                    <a href="https://www.twitter.com/theltldrk1"><img src="css/images/twitter_logo.png"></a>
                    <a href="https://www.reddit.com/user/thelittledark1"><img src="css/images/reddit_logo.png"></a>
                    <a href="https://www.patreon.com/thelittledarkone?fan_landing=true"><img src="css/images/patreon_mini_logo.png"></a>
                 </div>
            </div>
        </div>
      
      <!--        Login-->
        <form method="post" id="loginForm">
            <div class="modal" id="loginModal" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
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
                        <div class="modal-footer bg-info">
                            <input class="btn btnColor" name="login" type="submit" value="Login">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">Register</button>
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
                                <textarea name="moreinfo" class="form-control" id="moreinfo" rows="5" maxlength="300"></textarea>
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
                        <div class="modal-header bg-primary">
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
                        <div class="modal-footer bg-info">
                            <input class="btn btnColor" name="forgotpassword" type="submit" value="Submit">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">Register</button>
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
      <script src="js/forumcat.js"></script>
    
      </body>
</html>
<?php
ob_flush;
?>