import {ModuleWithProviders} from '@angular/core';
import {Routes, RouterModule} from '@angular/router';


import {WriterComponent} from './components/writer.component';
import {PostsComponent} from './components/posts.component';
import {LoginComponent} from './components/login.component';

const appRoutes : Routes = [

    {
        path:'',
        component:WriterComponent
    },
    {
    	path:'posts',
    	component:PostsComponent
    },
    {
    	path:'login',
    	component:LoginComponent
    }
];

export const routing: ModuleWithProviders = RouterModule.forRoot(appRoutes);
