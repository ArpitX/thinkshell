import { Component } from '@angular/core';

@Component({
  selector: 'my-header',
  template: `
  <header>
                  <div id="dropdown-header-menu" [class.open]="isClassVisible">
                      <div id="dropdown-back-img"> <img src="img/wallpapers/2.jpg"> </div>
                      <div class="identity">
                      <div id="dropdown-front-img"> <img src="img/3.png" class="" alt=""> </div>
                      <div id="dropdown-name">
                          <p>
                              myName
                          </p>
                      </div>
                      </div>
                      <div id="dropdown-list">
                          <ul>
                              <li><a routerLink="/" title="">Home</a></li>
                              <li><a routerLink="/posts" title="">Previous Entries</a></li>
                              <li><a href="logout.php" title="">Log out</a></li>
                          </ul>
                      </div>
                  </div>
                  <div id="header-menu-toggle" (click)="isClassVisible = !isClassVisible" [class.open]="isClassVisible" > <span></span> </div>
              </header>
              
  `,
  
})
export class HeaderComponent  { 
    isClassVisible : boolean = false;
}
