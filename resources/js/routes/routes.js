import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

//import Components
import Posts from '../components/Posts.vue';
import DetailComponent from '../components/DetailComponent.vue';
import RegisterComponent from '../components/RegisterComponent.vue';
import LoginComponent from '../components/LoginComponent.vue'

//make router
const routes=[
    {path:'/',component:Posts,name:'posts'},
    {path:'/posts/:id',component:DetailComponent,name:'post.detail'},
    {path:'/signup',component:RegisterComponent,name:'signup'},
    {path:'/login',component:LoginComponent,name:'login'}
];//end of routes

//create object VueRouter
const router =new VueRouter({
    routes,
    hashbang:false,
    mode: 'history',
})//end of router object

export default router;
