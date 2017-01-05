$(function(){
	//INDEX
	var $loginRegisterForm = $('#login-register-form');
	var $loginForm = $('#login-form');
	var $signupForm = $('#signup-form');
	var $loginButton = $('#login-button');
	var $registerButton = $('#register-button');
	var $backgroundImageIndex = $('#background-img-index');
	$loginButton.on('click',function(){
		$loginForm.slideToggle(400);
		$signupForm.hide();
	});
	$registerButton.on('click',function(){
		$signupForm.slideToggle(400);
		$loginForm.hide();
	})
	if($backgroundImageIndex.height()<$(window).height()){
		$backgroundImageIndex.hide();
	}
	//SHELL
	var $dropdownheadermenu = $('#dropdown-header-menu');
	var $headermenutoggle = $('#header-menu-toggle');
	var today = document.getElementById('page-date');
	var months = ["January","February","March","April","May","June","July","August","September","October","November","December"];
	var days = ["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
	$headermenutoggle.on('click', function(){
		if($(this).hasClass('open')){
			$(this).removeClass('open');	
		}
		else {
			$(this).addClass('open');
			$('#dropdown-name').fadeIn(900);
				
		}
		$dropdownheadermenu.animate({width:"toggle"},400);
	});
	var d = new Date();
	today.innerHTML = '<p>'+d.getDate()+' '+months[d.getMonth()]+" "+d.getFullYear()+'<br>'+'<span class="">'+days[d.getDay()]+'</span>'+'</p>';
	var datetimeString = d.getFullYear()+'-'+(d.getMonth()+1)+'-'+d.getDate()+' '+d.getHours()+':'+d.getMinutes()+':'+d.getSeconds();
    document.getElementById("datetimebox").value = datetimeString;
});