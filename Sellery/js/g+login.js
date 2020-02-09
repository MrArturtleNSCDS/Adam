var firstN;
var lastN;
var email_; 


function onSuccess(googleUser) {
    home();
    firstN = googleUser.getBasicProfile().getGivenName();
    lastN = googleUser.getBasicProfile().getFamilyName();
    email_ = googleUser.getBasicProfile().getEmail(); 
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