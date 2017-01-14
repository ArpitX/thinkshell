"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
var __metadata = (this && this.__metadata) || function (k, v) {
    if (typeof Reflect === "object" && typeof Reflect.metadata === "function") return Reflect.metadata(k, v);
};
var core_1 = require('@angular/core');
var WriterComponent = (function () {
    function WriterComponent() {
        this.d = new Date();
        this.months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        this.days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
        this.date = this.d.getDate() + " " + this.months[this.d.getMonth()] + " " + this.d.getFullYear();
        this.day = this.days[this.d.getDay()];
    }
    WriterComponent = __decorate([
        core_1.Component({
            moduleId: module.id,
            selector: 'writer',
            templateUrl: 'writer.component.html',
        }), 
        __metadata('design:paramtypes', [])
    ], WriterComponent);
    return WriterComponent;
}());
exports.WriterComponent = WriterComponent;
//# sourceMappingURL=writer.component.js.map