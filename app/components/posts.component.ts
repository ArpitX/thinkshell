import {Component} from '@angular/core';
import {HeaderComponent} from './header.component';
import {PostsService} from '../services/posts.service';

@Component({
	moduleId:module.id,
    selector:'posts',
    templateUrl: 'posts.component.html',
    providers: [PostsService]
})

export class PostsComponent{

	posts : Post[];

	constructor(private postsService : PostsService){
		this.postsService.getPosts().subscribe(posts => {
			this.posts = posts;
		});
	}
}

interface Post{
    id:number;
    title:string;
    body:string;
}