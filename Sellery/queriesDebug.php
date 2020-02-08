//This is my Js to send it to the PHP

function checkInfo(first_, last_, email_){
    var requestName = $.ajax({
        url: "queries.php",
        type: "POST",
        data: {action:"check",firstCheck:first_, lastCheck:last_, emailCheck:email_},
        dataType: "text"
    });

    checkInfo.done(function(success){
       // if(success==="1"){
            console.log(success);
        //}
    });

    checkInfo.fail(function(jqXHR, textStatus) {
        alert( "Request failed: " + textStatus + " " + jqXHR.responseText);
    });
}


//This is my Google login Js that get the information

function onSuccess(googleUser) {
    var first_ = googleUser.getBasicProfile().getGivenName();
    var last_ = googleUser.getBasicProfile().getFamilyName();
    var email_ = googleUser.getBasicProfile().getEmail();
    checkInfo(first_,last_,email_);
}
    function onFailure(error) {
    console.log(error);
    }
    function renderButton() {
    gapi.signin2.render('my-signin2', {
        'scope': 'profile email',
        'width': 240,
        'height': 50,
        'longtitle': true,
        'theme': 'dark',
        'onsuccess': onSuccess,
        'onfailure': onFailure
    });
    }
