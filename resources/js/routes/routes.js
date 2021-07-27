import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Posts from '../components/Posts.vue';
import DetailComponent from '../components/DetailComponent.vue';

const routes=[
    {path:'/',component:Posts,name:'posts'},
    {path:'/posts/:id',component:DetailComponent,name:'post.detail'}
];//end of routes

const router =new VueRouter({
    routes,
    hashbang:false,
    mode: 'history',
})//end of router object

export default router;
