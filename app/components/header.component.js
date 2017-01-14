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
var HeaderComponent = (function () {
    function HeaderComponent() {
        this.isClassVisible = false;
    }
    HeaderComponent = __decorate([
        core_1.Component({
            selector: 'my-header',
            template: "\n  <header>\n                  <div id=\"dropdown-header-menu\" [class.open]=\"isClassVisible\">\n                      <div id=\"dropdown-back-img\"> <img src=\"img/wallpapers/2.jpg\"> </div>\n                      <div class=\"identity\">\n                      <div id=\"dropdown-front-img\"> <img src=\"img/3.png\" class=\"\" alt=\"\"> </div>\n                      <div id=\"dropdown-name\">\n                          <p>\n                              myName\n                          </p>\n                      </div>\n                      </div>\n                      <div id=\"dropdown-list\">\n                          <ul>\n                              <li><a routerLink=\"/\" title=\"\">Home</a></li>\n                              <li><a routerLink=\"/posts\" title=\"\">Previous Entries</a></li>\n                              <li><a href=\"logout.php\" title=\"\">Log out</a></li>\n                          </ul>\n                      </div>\n                  </div>\n                  <div id=\"header-menu-toggle\" (click)=\"isClassVisible = !isClassVisible\" [class.open]=\"isClassVisible\" > <span></span> </div>\n              </header>\n              \n  ",
        }), 
        __metadata('design:paramtypes', [])
    ], HeaderComponent);
    return HeaderComponent;
}());
exports.HeaderComponent = HeaderComponent;
//# sourceMappingURL=header.component.js.map