import {Component} from '@angular/core';
import {HeaderComponent} from './header.component';

@Component({
    moduleId:module.id,
    selector:'writer',
    templateUrl:'writer.component.html',

})

export class WriterComponent{
	
	date : string ;
	day : string;
	months : string[];
	days : string[];
	d : any ;
	constructor(){
		this.d = new Date();
		this.months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
		this.days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
		this.date = this.d.getDate() + " " + this.months[this.d.getMonth()] + " " + this.d.getFullYear(); 
		this.day = this.days[this.d.getDay()];
	}	

}
