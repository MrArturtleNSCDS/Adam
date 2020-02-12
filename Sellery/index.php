<?php
	include "php/connect.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="https://kit.fontawesome.com/f5406f8a6e.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Abel&display=swap" rel="stylesheet">
        <link href="images/WisconsinShower.png" type="image/png" rel='icon'>
        <meta name="google-signin-scope" content="profile email">
        <meta name="google-signin-client_id" content="153584192754-qbp9uaam50pg8slsps3k0ig7t5u8788k.apps.googleusercontent.com">
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <script src="js/g+login.js" type="text/javascript" ></script>
        <link rel= 'stylesheet' href= 'css/shower.css'>
        <link rel= 'stylesheet' href= 'css/timepicker.min.css'>
        <script src='js/timepicker.min.js'></script>
        <title>Wisconsin Shower Sellery</title>
    </head>
    <body>
        <div id ="main">
            <div id= "barWrapper">
                <div id = "bar1" class = bara></div>
                <div id = "bar2" class = barb></div>
                <div id = "bar3" class = bara></div>
                <div id = "bar4" class = barb></div>
            </div>
            <div id="header">
                <img src="images/Madison.jpg" class= "campusPic" alt="campusP">
                <div class="sidebar">
                    <div id = "home1"><a href="#home"><i class="fas fa-home"></i></a></div>
                    <div id = "contact1"><a href="#contact"><i class="fas fa-envelope"></i></a></div>
                    <div id = "logout1"><a href="#logout"><i class="fas fa-sign-in-alt"></i></a></div>
                </div>
            </div>
            <div id='logWrapper'>
                <img src="images/WisconsinShower.png" id="background" alt="" class="center">
                <div id='mainText' style="font-size:8vw;" class='Text'>Sellery Shower</div>


                <div id="signInPage">
                    <div id="welcomeText" class="Text" style="font-size:8vw;">Hello!</div>
                    <div id="welcomeText1" class="Text" style="font-size:5vw;"><br>Sign in with Google</div>
                    <div id="my-signin2" style="display:inline-block;"></div>
                </div>


                <div id="registerPage">
                    <div id ="welcomeRegister" class='Text' style="font-size:5vw;">Welcome...</div>
                    <div id="fname" class='name allCheckBoxes' style="font-size:5vw;"></div>
                    <div id="lname" class= 'name allCheckBoxes' style="font-size:3vw;"></div>
                    <div id='switchboygirl'>
                        <div id="areYou" class='Text' style="font-size:4vw;">Are you?</div>
                        <div id='boy' class='Text boygirl' style="font-size:3vw;">Male</div>
                        <label class="switch">
                            <input id = "genderCheckBox" type="checkbox">
                            <span class="slider round"></span>
                        </label>
                        <div id='girl' class='Text boygirl' style="font-size:3vw;">Female</div>
                    </div>
                    <!--<div id="timeE">
                        <div id="timeExpected" class='Text' style="font-size:4vw;">How Long Does Your Shower Usually Take?</div>
                        <div id="radioButton">
                            <label class="container Text" style="font-size:3vw;">One Minute
                                <input type="radio" checked="checked" name="radio">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container Text animate" style="font-size:3vw;">Five Minutes
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container Text" style="font-size:3vw;">Ten Minutes
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container Text" style="font-size:3vw;">Fifteeen Minutes
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container Text" style="font-size:3vw;">Twenty Minutes
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>-->
                    <button id="sumbitB" button class="fsSubmitButton" onClick = insert();homey() style="font-size:5vw;">Submit</button>
                </div>

                <div id="home">
                    <div id = "hello" class="Text" style="font-size:6vw;">Hello</div>
                    <div class="grid-container">
                        <div class="grid-item grid-header" style="font-size:3vw;">1</div>
                        <div class="grid-item grid-header" style="font-size:3vw;">2</div>
                        <div class="grid-item grid-header" style="font-size:3vw;">3</div>
                        <div class="grid-item grid-header" style="font-size:3vw;">4</div>
                        <div class="grid-item grid-header" style="font-size:3vw;">5</div>
                        <div class="grid-item grid-stall scroll" style="font-size:3vw;" stall='1'></div>
                        <div class="grid-item grid-stall scroll" style="font-size:3vw;" stall='2'></div>
                        <div class="grid-item grid-stall scroll" style="font-size:3vw;" stall='3'></div>
                        <div class="grid-item grid-stall scroll" style="font-size:3vw;" stall='4'></div>
                        <div class="grid-item grid-stall scroll" style="font-size:3vw;" stall='5'></div>
                        <button id = "stall1" class = "button1" stallButton="1">Sign up</button>
                        <button id = "stall2" class = "button1" stallButton="2">Sign up</button>
                        <button id = "stall3" class = "button1" stallButton="3">Sign up</button>
                        <button id = "stall4" class = "button1" stallButton="4">Sign up</button>
                        <button id = "stall5" class = "button1" stallButton="5">Sign up</button>
                    </div>
                    <div class="drop"></div>
                </div>
                <div id="contact">
                    <div id="infoMain" class="Text" style="font-size:6vw;">My Contacts:</div><br><br><br>
                    <div class = "contactText" style="font-size:5vw;">Email or text me if you have any questions!</div>
                    <div class = "contactText" style="font-size:5vw;">Email: ATerhaerdt20@nscds.org</div><br>
                    <div class = "contactText" style="font-size:5vw;">Phone: 484-707-8812</div>

                </div>
            </div>
        </div>
        
        <div id="id01" class="w3-modal">
            <div class="w3-modal-content">
                <header class="w3-container modalHeader"> 
                    <span onclick="document.getElementById('id01').style.display='none'" 
                        class="w3-button w3-display-topright">&times;</span>
                    <h2>Pick a time for stall <span id='modalStallNum'></span></h2>
                </header>
                <div class="w3-container">
                    <div>Time <input class='timepicker' readonly></div>
                    <div>Duration <input class='durationpicker' readonly></div>
                </div>
                <footer class="w3-container modalHeader">
                    <button id='submitM'>Submit</button>
                </footer>
            </div>
        </div>
    
    </body>
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
    <script src='js/shower.js'></script>
</html>
