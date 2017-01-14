$(function () {
    //INDEX
    var $loginRegisterForm = $('#login-register-form');
    var $loginForm = $('#login-form');
    var $signupForm = $('#signup-form');
    var $loginButton = $('#login-button');
    var $registerButton = $('#register-button');
    var $backgroundImageIndex = $('#background-img-index');
    $loginButton.on('click', function () {
        $loginForm.slideToggle(400);
        $signupForm.hide();
    });
    $registerButton.on('click', function () {
        $signupForm.slideToggle(400);
        $loginForm.hide();
    })
    if ($backgroundImageIndex.height() < $(window).height()) {
        $backgroundImageIndex.hide();
    }
    
    
});
