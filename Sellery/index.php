<?php
	include "Php/connect.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="https://kit.fontawesome.com/f5406f8a6e.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Lobster&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Abel&display=swap" rel="stylesheet">
        <meta name="google-signin-scope" content="profile email">
        <meta name="google-signin-client_id" content="153584192754-qbp9uaam50pg8slsps3k0ig7t5u8788k.apps.googleusercontent.com">
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        <script src="Js/g+login.js" type="text/javascript" ></script>
        <link rel= 'stylesheet' href= 'CSS/shower.css'>
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
            <img src="images/Madison.jpg" class= "campusPic" alt="campusP" width=100% height=20%>
            <div id="sidebar1">
                <div class="sidebar">
                    <div id = "home1"><a href="#home"><i class="fas fa-home"></i> Home</a></div>
                    <div id = "info1"><a href="#info"><i class="fas fa-address-card"></i><br>Info</a></div>
                    <div id = "contact1"><a href="#contact"><i class="fas fa-envelope"></i> Contact</a></div>
                    <div id = "logout1"><a href="#logout"><i class="fas fa-sign-in-alt"></i><br>LogOut</a></div>
                </div>
            </div>
            <div id='logWrapper'>
                <img src="images/WisconsinShower.png" id="background" alt="" class="center">
                <div id='mainText' style="font-size:8vw;" class='Text'>Sellery Shower</div>


                <div id="signInPage">
                    <div id="welcomeText" class="Text" style="font-size:8vw;">Hello!</div>
                    <div id="welcomeText" class="Text" style="font-size:5vw;"><br>Sign in with Google</div>
                    <div id="my-signin2"></div>
                </div>


                <div id="registerPage">
                    <div id ="welcomeRegister" class='Text' style="font-size:5vw;">Welcome...</div>
                    <div id="fname" class='name allCheckBoxes' style="font-size:5vw;"></div>
                    <div id="lname" class= 'name allCheckBoxes' style="font-size:3vw;"></div>
                    <div id='switchboygirl'>
                        <div id="areYou" class='Text' style="font-size:4vw;">What are you?</div>
                        <div id='boy' class='Text boygirl' style="font-size:3vw;">Boy</div>
                        <label class="switch">
                            <input type="checkbox">
                            <span class="slider round"></span>
                        </label>
                        <div id='girl' class='Text boygirl' style="font-size:3vw;">Girl</div>
                    </div>
                    <div id="timeE">
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
                    </div>
                    <button id="sumbitB" button class="fsSubmitButton" style="font-size:5vw;">Submit</button>
                </div>

                <div id="info">
                    <div id = "infoParagraph" class="Text">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt<br>
                            ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris <br>
                            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse <br>
                            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                            officia deserunt mollit anim id est laborum. </p>
                    </div>
                </div>

                <div id="forNow">
                    <div id="time" class='Text' style="font-size:4vw;">Expected Time</div>
                    <div class="box" style="font-size:4vw;">
                        <select>
                            <option>1 Minute</option>
                            <option>5 Minutes</option>
                            <option>10 Minutes</option>
                            <option>15 Minutes</option>
                            <option>30 Minutes</option>
                            <option>I'm Going To Be A While</option>
                        </select>
                    </div>
                    <div class="grid-container">
                        <div class="grid-item" style="font-size:3vw;">Current Boy User</div>
                        <div class="grid-item" style="font-size:3vw;" placeholder='None'>1</div>
                        <div class="grid-item" style="font-size:3vw;">2</div>
                        <div class="grid-item" style="font-size:3vw;">Current Girl User</div>  
                        <div class="grid-item" style="font-size:3vw;" placeholder='None'>1</div>
                        <div class="grid-item" style="font-size:3vw;">2</div>
                    </div>
                    <div class="drop"></div>
                </div>
                <div id="contact">
                    <div id="infoMain" class="Text" style="font-size:6vw;">My Contacts</div>
                </div>
            </div>
        </div>
    </body>
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
    <script src='Js/shower.js'></script>
</html>
