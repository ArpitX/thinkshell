import { NgModule }      from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import {FormsModule} from '@angular/forms';
import {HttpModule} from '@angular/http';

import { AppComponent }  from './app.component';

import { WriterComponent } from './components/writer.component';
import { PostsComponent } from './components/posts.component';
import { HeaderComponent } from './components/header.component';
import { LoginComponent } from './components/login.component';
import {routing} from './app.routing';

@NgModule({
  imports:      [ BrowserModule,FormsModule,HttpModule,routing ],
  declarations: [ AppComponent, WriterComponent,PostsComponent,HeaderComponent,LoginComponent ],
  bootstrap:    [ AppComponent ]
})
export class AppModule { }
