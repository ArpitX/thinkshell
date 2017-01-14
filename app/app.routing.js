"use strict";
var router_1 = require('@angular/router');
var writer_component_1 = require('./components/writer.component');
var posts_component_1 = require('./components/posts.component');
var login_component_1 = require('./components/login.component');
var appRoutes = [
    {
        path: '',
        component: writer_component_1.WriterComponent
    },
    {
        path: 'posts',
        component: posts_component_1.PostsComponent
    },
    {
        path: 'login',
        component: login_component_1.LoginComponent
    }
];
exports.routing = router_1.RouterModule.forRoot(appRoutes);
//# sourceMappingURL=app.routing.js.map