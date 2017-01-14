import {Component} from '@angular/core';

@Component({
	moduleId:module.id,
    selector:'login',
    templateUrl: 'login.component.html',
    styleUrls: ['login.component.css']
})

export class LoginComponent{
	isClassVisible : boolean = false;
	addGoogleSignInScript : any = addGoogleSignIn();
}

function addGoogleSignIn(){
        var head = document.getElementsByTagName('head')[0];
        var script = document.createElement('script');
        script.src = "https://apis.google.com/js/platform.js";
        script.async = true;
        script.defer = true;
        head.appendChild(script);
    }