<?php
	include "php/connect.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <script src="js/jquery-3.4.1.min.js"></script>
        <script src="https://kit.fontawesome.com/f5406f8a6e.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
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
                    <div id = "contact1"><a href="#contact"><i class="fas fa-envelope"></i> Contact</a></div>
                    <div id = "logout1"><a href="#logout"><i class="fas fa-sign-in-alt"></i><br>LogOut</a></div>
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
                        <div id="areYou" class='Text' style="font-size:4vw;">What are you?</div>
                        <div id='boy' class='Text boygirl' style="font-size:3vw;">Boy</div>
                        <label class="switch">
                            <input id = "genderCheckBox" type="checkbox">
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
                    <button id="sumbitB" button class="fsSubmitButton" onClick = insert();homey() style="font-size:5vw;">Submit</button>
                </div>

                <div id="home">
                    <div id = "hello" class="Text" style="font-size:6vw;">Hello</div>
                    <div class="grid-container">
                        <div class="grid-item" style="font-size:3vw;">1</div>
                        <div class="grid-item" style="font-size:3vw;">2</div>
                        <div class="grid-item" style="font-size:3vw;">3</div>
                        <div class="grid-item" style="font-size:3vw;">4</div>
                        <div class="grid-item" style="font-size:3vw;">5</div>
                        <div class="grid-item" style="font-size:3vw;" stall='1'></div>
                        <div class="grid-item" style="font-size:3vw;" stall='2'></div>
                        <div class="grid-item" style="font-size:3vw;" stall='3'></div>
                        <div class="grid-item" style="font-size:3vw;" stall='4'></div>
                        <div class="grid-item" style="font-size:3vw;" stall='5'></div>
                        <button id = "1" class = "button1" button onclick="document.getElementById('id01').style.display='block'">Sign in on Stall 1</button>
                        <button id = "2" class = "button1" button onclick="document.getElementById('id01').style.display='block'">Sign in on Stall 2</button>
                        <button id = "3" class = "button1" button onclick="document.getElementById('id01').style.display='block'">Sign in on Stall 3</button>
                        <button id = "4" class = "button1" button onclick="document.getElementById('id01').style.display='block'">Sign in on Stall 4</button>
                        <button id = "5" class = "button1" button onclick="document.getElementById('id01').style.display='block'">Sign in on Stall 5</button>
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
            <div class="w3-modal-content w3-modal-content w3-animate-zoom">
                <div class="w3-container">
                <span onclick="document.getElementById('id01').style.display='none'"
                class="w3-button w3-display-topright">&times;</span>
                <p>Start</p>
                <input type = "text" placeholder = "Hours" stlye = "width:2vh;height:2vh;"></input>
                <input type = "text" placeholder = "Minutes" stlye = "width:2vh;height:2vh;"></input>
                <div id="radioButtonModal">
                            <label class="container modalRadioText" style="font-size:3vw;">AM Hello
                                <input type="radio" checked="checked" name="radio">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container modalRadioText animate" style="font-size:3vw;">PM
                                <input type="radio" name="radio">
                                <span class="checkmark"></span>
                            </label>

                <p>Some text in the Modal..</p>
            </div>
         </div>
</div>
    
    </body>
    <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
    <script src='Js/shower.js'></script>
</html>