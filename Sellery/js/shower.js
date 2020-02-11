var home = $("#home");
var registry = $("#registerPage")
var contact = $("#contact")
var welcome = $("#signInPage");
var sidebar = $("#sidebar1")
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
    $(element).delay(1800).fadeOut();
}

function showElements(element){
    $(element).delay(1800).fadeIn();
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
        userID = $(success).find('userID').text();
        gender_ = $(success).find('gender').text();
    
    console.log(gender_);
    if(gender_ >= 0){
       hideElements(welcome);
       showElements(homey);
       showElements(sidebar);
       $("#hello").text("Hello" + " " + first_ + " " + last_ + "!");
       getShowerInfo();
   } else{
        $("#fname").text(first_);
        $("#lname").text(last_);
        showElements(registry);
        hideElements(welcome);
        change();
    }
function change(){
$("#hello").text("Hello" + " " + first_ + " " + last_ + "!");
}

       
        /* if(success==="0"){
            console.log(success);
            homey();
            showElements(sidebar);
        } else if(sucess==="1"){
            
        } else{
            $("#fname").text(first_);
            $("#lname").text(last_);
            showElements(registry);
            hideElements(welcome);
        }*/
    });

    checkI.fail(function(jqXHR, textStatus) {
        alert( "Request failed: " + textStatus + " " + jqXHR.responseText);
    });
}

function insert(){
    //var firstName = $("#first").val();
    //var lastName = $("#last").val();
    //console.log(firstName,lastName);
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
       // if(success==="1"){
            console.log(success);
        //}
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
            
            
            if(userFirst.length + minutes.length > 8){
                $('[stall=' + userStall + ']').append(
                        "<div class='smallFont'>" + userFirst + "" +  "<br>" + minutes  + "min" + "</div>");
            } else{
                $('[stall=' + userStall + ']').append(
                    "<div class='stallUser grid-item'>" + userFirst + "<br>" 
                    +  minutes  + "</div>");
            }

        })

    });

    getInfo.fail(function(jqXHR, textStatus) {
        alert( "Request failed: " + textStatus + " " + jqXHR.responseText);
    });
}

var stall_
$("[stallButton]").click(function(){
    stall_= $(this).attr('stallButton');
    console.log(stall_);
});


$("#sumbitM").click(function(){
    console.log("submitted");
    var hours = parseInt($("hours").val);
    var minutes = parseInt($("minutes").val);
    var time = hours + ":" + minutes;
    var duration = parseInt($("duration").val);
    var endtime;
    var today = new Date();

    var isChecked = $("#PM").prop("checked");
    if(isChecked){
        hours + 12;
    }
    if(duration > 60){
        alert("That's too long of a shower!");
    }
    if(minutes + duration < 60){
        endtime = hours + ":" + minutes+duration;
    } else{
        endtime = hours+1 + ":" + (minutes+duration) - 60;
    }
    var dateStart = today.getFullYear() + '-' + today.getMonth() + '-' + today.getDay() + ' ' + time;
    var dateEnd = today.getFullYear() + '-' + today.getMonth() + '-' + today.getDay() + ' ' + endtime;
    console.log(dateStart);
    console.log(dateEnd);
    waitingListInsert(stall_, dateStart, dateEnd);
});

function waitingListInsert(stall_, start_, end_){
    var waitingList = $.ajax({
        url: "php/queries.php",
        type: "POST",
        data: {action:"waitingListInsert", stall:stall_, userID:userID_, start:start_, end:end_},
        dataType: "text"
    });

    waitingList.done(function(success){
        if(success==="1"){
            console.log(success);
        }
    });

    waitingList.fail(function(jqXHR, textStatus) {
        alert( "Request failed: " + textStatus + " " + jqXHR.responseText);
    });
}
