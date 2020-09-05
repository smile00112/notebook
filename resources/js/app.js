require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import Vuex from 'vuex';

import MainApp from './components/MainApp.vue';
//import LeftPanel from './components/LeftPanel.vue'; 
import {routes} from './routes';
Vue.use(VueRouter);
Vue.use(Vuex);

const router = new VueRouter({
    routes,
    mode: 'history',

});

//Vue.component() 

const app = new Vue({
    el: '#app',
    router,
     components: {
         MainApp,
        // LeftPanel,

     }
}); 
console.log('Component "app.js" mounted.') 