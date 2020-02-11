var first_;
var last_;
var email_; 


function onSuccess(googleUser) {
    first_ = googleUser.getBasicProfile().getGivenName();
    last_ = googleUser.getBasicProfile().getFamilyName();
    email_ = googleUser.getBasicProfile().getEmail();
    checkInfo(first_,last_,email_);
    transition();
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