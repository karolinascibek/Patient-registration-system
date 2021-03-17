require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router';
import axios from 'axios';
import store from './vue/store/vuex.js';
import  './vue/axios.js';

//Main pages
import App from './vue/App';
import router from './vue/router/index';

Vue.use(VueRouter);

const app = new Vue({
    el: '#app',
    router,
    store,
    components: { App }
});
