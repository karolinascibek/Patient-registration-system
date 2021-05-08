import Vue from "vue";
import Home from '../pages/Home';
import Login from '../components/auth/Login';
import Signup from '../components/auth/Signup';
import Dashboard from '../pages/Dashboard';
import Calendar from '../pages/Calendar';

const routes = [
    { path:"/", component:Home, name:"home"},
    { path:"/login", component:Login, name:"login"},
    { path:"/signup", component:Signup, name:"signup"},
    { path:"/dashboard", component:Dashboard, name:"dashboard"},
    { path:"/calendar/:id", component:Calendar, name:"calendar", props:true},


]

export default routes;
