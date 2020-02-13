var home = $("#home");
var registry = $("#registerPage")
var contact = $("#contact")
var welcome = $("#signInPage");
var sidebar = $("#sidebar1");
var timeInput = $(".timepicker");
var durationInput = $(".durationpicker");
var modal = $("#id01");
var gender_;
var userID_;

startUp();

function startUp(){
    $(home).hide();
    $(sidebar).hide();
    $(registry).hide();
    $(contact).hide();
    $(welcome).show();
}

function hideElements(element){
    $(element).delay(1500).fadeOut(100);
}

function showElements(element){
    //console.log(element);
    $(element).delay(1500).fadeIn();
}
function signUp(){
    showElements(registry);
    hideElements(contact);
    hideElements(home);
    hideElements(welcome);
    hideElements(info);
}

function homey(){
    hideElements(registry);
    hideElements(contact);
    showElements(home);
    hideElements(welcome);
}

$("#home1").click(function(){
    transition();
    hideElements(registry);
    hideElements(contact);
    showElements(home);
    hideElements(welcome);
});
$('#contact1').click(function(){
    transition();
    hideElements(registry);
    showElements(contact);
    hideElements(home);
    hideElements(welcome);
});
$('#logout1').click(function logOut(){
    transition();
    hideElements(registry);
    hideElements(contact);
    hideElements(home);
    hideElements(sidebar);
    showElements(welcome);
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });

});

function transition(){
   $("#bar1").animate({height:"100%"},1500).delay(100).animate({height:0},2000);
    $("#bar2").delay(200).animate({height:"100%"},1500).delay(100).animate({height:0},2000);
    $("#bar3").delay(400).animate({height:"100%"},1500).delay(100).animate({height:0},2000);
    $("#bar4").delay(600).animate({height:"100%"},1500).delay(100).animate({height:0},2000);
}


function checkInfo(first_, last_, email_){
    var checkI = $.ajax({
        url: "php/queries.php",
        type: "POST",
        data: {action:"check",firstCheck:first_, lastCheck:last_, emailCheck:email_},
        dataType: "xml"
    });

    checkI.done(function(success){
        console.log(success);
        userID_ = $(success).find('userID').text();
        gender_ = $(success).find('gender').text();
        
        console.log(userID_,gender_);
        if(gender_ >= 0){
           hideElements(welcome);
           showElements(home);
           showElements(sidebar);
           //$("#hello").text("Hello" + " " + first_ + " " + last_ + "!");
           getShowerInfo();
       } else{
            $("#fname").text(first_);
            $("#lname").text(last_);
            showElements(registry);
            hideElements(welcome);
        }
    
        $("#hello").text("Hello" + " " + first_ + " " + last_ + "!");
    });

    checkI.fail(function(jqXHR, textStatus) {
        alert( "Request failed: " + textStatus + " " + jqXHR.responseText);
    });
}

function insert(){
    isMale = ($('#genderCheckBox').prop('checked'));

    if(isMale){
        gender_ = 1; 
      } else{
          gender_ = 0;
      }

    var requestName = $.ajax({
        url: "php/queries.php",
        type: "POST",
        data: {action:"insert",first:first_, last:last_, gender:gender_, email:email_},
        dataType: "text"
    });

    requestName.done(function(success){
        console.log(success);
       if(success==="1"){
           transition();
           checkInfo(first_,last_, email_);
           getShowerInfo();
        }
    });

    requestName.fail(function(jqXHR, textStatus) {
        alert( "Request failed: " + textStatus + " " + jqXHR.responseText);
    });

}

function getShowerInfo(){
    var getInfo = $.ajax({
        url: "php/queries.php",
        type: "POST",
        data: {action:"showerInfo",gender:gender_},
        dataType: "xml"
    });

    getInfo.done(function(userXML){
        
        $('[stall]').html("");

        allUsers = $(userXML).find('user');
        console.log("Total Users:" + allUsers.length);
        allUsers.each(function(){
            var userFirst = $(this).find('first').text();
            var userLast = $(this).find('last').text();
            var userStall = $(this).find('stall').text();
            var userStartTime = $(this).find('start').text();
            var userEndTime = $(this).find('end').text();
            var minutes = $(this).find('minutes').text();
            
            var fontStyle = userFirst.length + minutes.length > 8?" smallFont":"";
            
            $('[stall=' + userStall + ']').append(
                    "<div class='stallUser" + fontStyle + "'>" + userFirst +  "<div class='minutes'>" + minutes  + " min</div>" + "</div>");

        })

    });

    getInfo.fail(function(jqXHR, textStatus) {
        alert( "Request failed: " + textStatus + " " + jqXHR.responseText);
    });
}

var stall_
$("[stallButton]").click(function(){
    stall_= $(this).attr('stallButton');
    $("#modalStallNum").text(stall_);
    modal.fadeIn();
    
    console.log(stall_);
});

//$('[stallButton]').bootstrapMaterialDatePicker({ date: false });

console.log($("#submitM").length);
$("#submitM").click(function(){
    console.log("submitted");
    
    var startTime = timeInput.val();
    var duration = durationInput.val().substr(-2);
    
    console.log(startTime);
    console.log(duration);
    waitingListInsert(stall_, startTime, duration);
    modal.fadeOut();
});

function waitingListInsert(stall_, start_, duration_){
    var waitingList = $.ajax({
        url: "php/queries.php",
        type: "POST",
        data: {action:"waitingListInsert", stall:stall_, userID:userID_, start:start_, duration:duration_},
        dataType: "text"
    });

    waitingList.done(function(success){
        if(success==="1"){
            console.log(success);
            getShowerInfo();
        }
    });

    waitingList.fail(function(jqXHR, textStatus) {
        alert( "Request failed: " + textStatus + " " + jqXHR.responseText);
    });
}

$(document).ready(function(){
    $('input.timepicker').timepicker({
        timeFormat: 'h:mm p',
        interval: 5,
        minTime: new Date(),
        maxTime: '11:55pm',
        defaultTime: new Date(),
        startTime: '1:00',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });
    
    $('input.durationpicker').timepicker({
        timeFormat: '00:mm',
        interval: 5,
        minTime: '0:05',
        maxTime: '0:30',
        defaultTime: '00:05',
        startTime: '00:05',
        dynamic: false,
        dropdown: true,
        scrollbar: true
    });
});
