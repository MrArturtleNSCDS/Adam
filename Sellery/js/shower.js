var other = $("#forNow");
var a = $("#signIn");
var registry = $("#registerPage")
var contact = $("#contact")
var welcome = $("#signInPage");
var info = $("#info");

startUp();

function startUp(){
    $(other).hide();
    $(registry).hide();
    $(contact).hide();
    $(welcome).show();
    $(info).hide();
}

function hideElements(element){
    $(element).delay(1800).fadeOut();
}

function showElements(element){
    $(element).delay(1800).fadeIn();
}

$("#home1").click(function(){
    //transition();
    showElements(registry);
    hideElements(contact);
    hideElements(other);
    hideElements(welcome);
    hideElements(info);
});
$('#info1').click(function(){
    //transition();
    hideElements(registry);
    hideElements(contact);
    hideElements(other);
    hideElements(welcome);
    showElements(info);
});
$('#contact1').click(function(){
    //transition();
    hideElements(registry);
    showElements(contact);
    hideElements(other);
    hideElements(welcome);
    showElements(info);
});
$('#logout1').click(function logOut(){
    //transition();
    hideElements(registry);
    showElements(contact);
    hideElements(other);
    hideElements(welcome);
    hideElements(info);
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
});
/*
function transition(){
    $("#bar1").animate({height:"100%"},1500).delay(100).animate({height:0},2000);
    $("#bar2").delay(200).animate({height:"100%"},1500).delay(100).animate({height:0},2000);
    $("#bar3").delay(400).animate({height:"100%"},1500).delay(100).animate({height:0},2000);
    $("#bar4").delay(600).animate({height:"100%"},1500).delay(100).animate({height:0},2000);
}
*/
function getName(){
    var firstName = $("#first").val();
    var lastName = $("#last").val();
    console.log(firstName,lastName);
    var isMale = ($('#genderCheckBox').prop('checked'));

    if(isMale){
        var gender_ = 1; 
      } else{
          gender_ = 0;
      }

    var requestName = $.ajax({
        url: "php/queries.php",
        type: "POST",
        data: {action:"insert",first:firstName, last:lastName, gender:gender_},
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

function getInfo(){
    var userId = $("#user").val();
    var getInfo = $.ajax({
        url: "php/queries.php",
        type: "POST",
        data: {action:"recieve",user:userId},
        dataType: "xml"
    });

    getInfo.done(function(userXML){
        allUsers = $(userXML).find('user');
        console.log("Total Users:" + allUsers.length);

        allUsers.each(function(){
            var userFirst = $(this).find('first').text();
            var userLast = $(this).find('last').text();
            var userStall = $(this).find('stall').text();
            var userStartTime = $(this).find('start').text();
            var userEndTime = $(this).find('end').text();
            var minutes = $(this).find('minutes').text();
            
            console.log(minutes);

            $('#container').append(
                    "<div class='userFirst'>" + userFirst + "</div><br>" +
                    "<div class='userLast'>" + userLast + "</div><br>" +
                    "<div class='userStall'>" + userStall + "</div><br>" +
                    "<div class='userStartTime'>" + userStartTime + "</div><br>" +
                    "<div class='userEndTime'>" + userEndTime + "</div><br>" +
                    "<div class='userEndTime'>" + minutes + "</div><br>");
        })

    });

    getInfo.fail(function(jqXHR, textStatus) {
        alert( "Request failed: " + textStatus + " " + jqXHR.responseText);
    });
}

function checkInfo(first_, last_, email_){
    var checkI = $.ajax({
        url: "php/queries.php",
        type: "POST",
        data: {action:"check",firstCheck:first_, lastCheck:last_, emailCheck:email_},
        dataType: "text"
    });

    checkI.done(function(success){
       // if(success==="1"){
            console.log(success);
        //}
    });

    checkI.fail(function(jqXHR, textStatus) {
        alert( "Request failed: " + textStatus + " " + jqXHR.responseText);
    });
}
