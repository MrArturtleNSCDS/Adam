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
function home(){
    transition();
    showElements(registry);
    hideElements(contact);
    hideElements(other);
    hideElements(welcome);
    hideElements(info);
}
$("#home1").click(function(){
    transition();
    showElements(registry);
    hideElements(contact);
    hideElements(other);
    hideElements(welcome);
    hideElements(info);
});
$('#info1').click(function(){
    transition();
    hideElements(registry);
    hideElements(contact);
    hideElements(other);
    hideElements(welcome);
    showElements(info);
});
$('#contact1').click(function(){
    transition();
    hideElements(registry);
    showElements(contact);
    hideElements(other);
    hideElements(welcome);
    showElements(info);
});
$('#logout1').click(function logOut(){
    transition();
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



function transition(){
    $("#bar1").animate({height:"100%"},1500).delay(100).animate({height:0},2000);
    $("#bar2").delay(200).animate({height:"100%"},1500).delay(100).animate({height:0},2000);
    $("#bar3").delay(400).animate({height:"100%"},1500).delay(100).animate({height:0},2000);
    $("#bar4").delay(600).animate({height:"100%"},1500).delay(100).animate({height:0},2000);
}

function names(first_, last_, email_){
    function checkInfo(){
        var requestName = $.ajax({
            url: "queries.php",
            type: "POST",
            data: {action:"check",first:first_, last:last_, email:email_},
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
}


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
        url: "queries.php",
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

