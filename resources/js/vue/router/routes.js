import Vue from "vue";
import Home from '../pages/Home';
import Login from '../components/Login';
import Signup from '../components/Signup';
import Dashboard from '../pages/Dashboard';

const routes = [
    { path:"/", component:Home, name:"home"},
    { path:"/login", component:Login, name:"login"},
    { path:"/signup", component:Signup, name:"signup"},
    { path:"/dashboard", component:Dashboard, name:"dashboard"}

]

export default routes;
