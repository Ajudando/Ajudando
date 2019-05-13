window.fbAsyncInit = function () {
    FB.init({
        appId: 342469916472771,
        cookie: false,
        status: true,
        xfbml: true,
        version: 'v2.8'
    });
};

(function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
        return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "http://connect.facebook.net/pt_BR/sdk.js";
    js.src = "https://connect.facebook.net/pt_BR/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

function login() {
    FB.login(function(response) {

    // handle the response
    console.log("Response goes here!");

    }, {scope: 'read_stream,publish_stream,publish_actions,read_friendlists'});            
}

function logout() {
    FB.logout(function(response) {
      // user is now logged out
    });
}