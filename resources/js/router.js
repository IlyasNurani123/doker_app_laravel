import Vue from 'vue';
import Router from 'vue-router';
import Login from './components/Auth/Login'
Vue.use(Router);

const routes = [
    {
        path:'/',
        component:Login
    }
];

export default new Router({
    mode:"history",
    routes
});